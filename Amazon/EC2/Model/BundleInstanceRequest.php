<?php
/** 
 *  PHP Version 5
 *
 *  @category    Amazon
 *  @package     Amazon_EC2
 *  @copyright   Copyright 2008 Amazon Technologies, Inc.
 *  @link        http://aws.amazon.com
 *  @license     http://aws.amazon.com/apache2.0  Apache License, Version 2.0
 *  @version     2008-12-01
 */
/******************************************************************************* 
 *    __  _    _  ___ 
 *   (  )( \/\/ )/ __)
 *   /__\ \    / \__ \
 *  (_)(_) \/\/  (___/
 * 
 *  Amazon EC2 PHP5 Library
 *  Generated: Wed Dec 24 22:54:04 PST 2008
 * 
 */

/**
 *  @see Amazon_EC2_Model
 */
require_once ('Amazon/EC2/Model.php');  

    

/**
 * Amazon_EC2_Model_BundleInstanceRequest
 * 
 * Properties:
 * <ul>
 * 
 * <li>InstanceId: string</li>
 * <li>Storage: Amazon_EC2_Model_Storage</li>
 *
 * </ul>
 */ 
class Amazon_EC2_Model_BundleInstanceRequest extends Amazon_EC2_Model
{


    /**
     * Construct new Amazon_EC2_Model_BundleInstanceRequest
     * 
     * @param mixed $data DOMElement or Associative Array to construct from. 
     * 
     * Valid properties:
     * <ul>
     * 
     * <li>InstanceId: string</li>
     * <li>Storage: Amazon_EC2_Model_Storage</li>
     *
     * </ul>
     */
    public function __construct($data = null)
    {
        $this->_fields = array (
        'InstanceId' => array('FieldValue' => null, 'FieldType' => 'string'),
        'Storage' => array('FieldValue' => null, 'FieldType' => 'Amazon_EC2_Model_Storage'),
        );
        parent::__construct($data);
    }

        /**
     * Gets the value of the InstanceId property.
     * 
     * @return string InstanceId
     */
    public function getInstanceId() 
    {
        return $this->_fields['InstanceId']['FieldValue'];
    }

    /**
     * Sets the value of the InstanceId property.
     * 
     * @param string InstanceId
     * @return this instance
     */
    public function setInstanceId($value) 
    {
        $this->_fields['InstanceId']['FieldValue'] = $value;
        return $this;
    }

    /**
     * Sets the value of the InstanceId and returns this instance
     * 
     * @param string $value InstanceId
     * @return Amazon_EC2_Model_BundleInstanceRequest instance
     */
    public function withInstanceId($value)
    {
        $this->setInstanceId($value);
        return $this;
    }


    /**
     * Checks if InstanceId is set
     * 
     * @return bool true if InstanceId  is set
     */
    public function isSetInstanceId()
    {
        return !is_null($this->_fields['InstanceId']['FieldValue']);
    }

    /**
     * Gets the value of the Storage.
     * 
     * @return Storage Storage
     */
    public function getStorage() 
    {
        return $this->_fields['Storage']['FieldValue'];
    }

    /**
     * Sets the value of the Storage.
     * 
     * @param Storage Storage
     * @return void
     */
    public function setStorage($value) 
    {
        $this->_fields['Storage']['FieldValue'] = $value;
        return;
    }

    /**
     * Sets the value of the Storage  and returns this instance
     * 
     * @param Storage $value Storage
     * @return Amazon_EC2_Model_BundleInstanceRequest instance
     */
    public function withStorage($value)
    {
        $this->setStorage($value);
        return $this;
    }


    /**
     * Checks if Storage  is set
     * 
     * @return bool true if Storage property is set
     */
    public function isSetStorage()
    {
        return !is_null($this->_fields['Storage']['FieldValue']);

    }




}