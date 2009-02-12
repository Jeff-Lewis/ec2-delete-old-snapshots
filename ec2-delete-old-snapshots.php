<?php

// Your EC2 credentials

define('AWS_ACCESS_KEY_ID', '<Your AWS Access Key>');
define('AWS_SECRET_ACCESS_KEY', '<Your AWS Secret Access Key>'); 

// parse options (vol-ids, older-than)

$opts = getopt("v:o:");
if  (($opts['v']) && !is_array($opts['v']))
	$volumes = array($opts['v']);
else
	$volumes = $opts['v'];
	
if (!is_array($opts['o']))
{
	$now = time();
	$days = $opts['o'];
	$older_than = $now - $days * 24 * 60 * 60;
}

if ((!$volumes) || (!$older_than))
	die("\n\nDid not provide vol-id or older-than-time.\nUsage: php ec2-delete-old-snapshots.php -v vol-id [-v vol-id ...] -o days\n\n");

echo "\n\n";
foreach ($volumes as $volume)
{
	echo "Will try to bulk delete for " . $volume . " older than " . date("Y/m/d H:i:s", $older_than) . "\n";
}
echo "\n\n";
	

// include required EC2 library elements 
require_once("Amazon/EC2/Client.php");
require_once("Amazon/EC2/Model/DescribeSnapshotsRequest.php");
require_once("Amazon/EC2/Model/DeleteSnapshotRequest.php");
// instantiate EC2 client
$service = new Amazon_EC2_Client(AWS_ACCESS_KEY_ID, AWS_SECRET_ACCESS_KEY);

// get all snapshots
$request = new Amazon_EC2_Model_DescribeSnapshotsRequest();
$response = $service->describeSnapshots($request);
$result = $response->getDescribeSnapshotsResult();
$snaps = $result->getSnapshot();

if (is_array($snaps))
{
	// first check we have at least 1 newer snapshot for every vol-id we got
	// we don't want to delete all snapshots of a vol and be left with no snapshots, 
	// this guarantees it. so we build a "go_ahead_volumes" array.
	foreach ($volumes as $volume)
	{
		foreach ($snaps as $snap)
		{
			$snapTimestamp = strtotime($snap->getStartTime());
			$snapStatus = $snap->getStatus();
			if (($snapTimestamp >= $older_than) && ($snapStatus=="completed"))
			{
				if ($snap->getVolumeId() == $volume)
				{
					$go_ahead_volumes[] = $volume;
					echo "We have go ahead on deletion for " . $volume . ":\n";
					echo "Snap " . $snap->getSnapshotId() . " is from " . $snap->getStartTime() .  "\n";
					break;
				}
			}
		}
	}
	echo "\n\n";
	
	// now go over all snaps, if encounter a snap for a go_ahead_volume which
	// is older than, well, older_than, delete it.
	foreach ($snaps as $snap)
	{
		$snapTimestamp = strtotime($snap->getStartTime());
		if ( (in_array($snap->getVolumeId(), $go_ahead_volumes)) && ($snapTimestamp < $older_than) )
		{
			echo "DELETING! For volume: " . $snap->getVolumeId() . " snapshot: " . $snap->getSnapshotId() . " From: " . $snap->getStartTime() . "\n";
			// and now really delete using EC2 library
			$request = new Amazon_EC2_Model_DeleteSnapshotRequest();
			$request->setSnapshotId($snap->getSnapshotId());
			$response = $service->deleteSnapshot($request);
		}
	}
	echo "\n\n";
}
else
{
	die ("\n\nNo snapshots found, quitting.\n\n");
}
