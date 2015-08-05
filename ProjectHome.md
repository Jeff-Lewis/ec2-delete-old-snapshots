## Overview ##
At the time of writing this, deleting EBS snapshots from EC2 is currently a very tedious task. You can do it only one by one, and if you have a backup methodology of daily/hourly backup, you soon get too many snapshots.

This is a short script meant to imitate a "ec2-delete-old-snapshots" command, until the guys at AWS issue one themselves.

## Requirements ##
  * PHP 5
  * This script requires the Amazon EC2 PHP library, which is bundled here for convenience.(The library home is at: http://developer.amazonwebservices.com/connect/entry.jspa?externalID=1669)

## Installation ##
Fill in your AWS keys on the two top define statements on ec2-delete-old-snapshots.php:
```
define('AWS_ACCESS_KEY_ID', '<Your AWS Access Key>');
define('AWS_SECRET_ACCESS_KEY', '<Your AWS Secret Access Key>');
```

## Usage ##
Currently written in PHP for speedy development:
```
php ec2-delete-old-snapshots.php -v vol-id [-v vol-id ...] -o days
```

## Example ##
```
php ec2-delete-old-snapshots.php -v vol-aabbccdd -v vol-bbccddee -o 7
```
Will delete all snapshots older than 7 days for volumes vol-aabbccdd and vol-bbccddee.

## Failsafe ##
The program checks to see that each vol-id entered on the command line has at least one newer snapshot than the deletion date, to prevent deletion of all snapshots of a certain volume. The deletion process will commence for a volume only if such a snapshot was found.

## Disclaimer ##
This program is in development. Although it has been tested and worked on production environments, it can't be guaranteed to perform without unexpected results. Use at your own risk.