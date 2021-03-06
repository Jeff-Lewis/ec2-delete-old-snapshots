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
 * Amazon_EC2_Model_AttachVolumeResult
 * 
 * Properties:
 * <ul>
 * 
 * <li>Attachment: Amazon_EC2_Model_Attachment</li>
 *
 * </ul>
 */ 
class Amazon_EC2_Model_AttachVolumeResult extends Amazon_EC2_Model
{


    /**
     * Construct new Amazon_EC2_Model_AttachVolumeResult
     * 
     * @param mixed $data DOMElement or Associative Array to construct from. 
     * 
     * Valid properties:
     * <ul>
     * 
     * <li>Attachment: Amazon_EC2_Model_Attachment</li>
     *
     * </ul>
     */
    public function __construct($data = null)
    {
        $this->_fields = array (
        'Attachment' => array('FieldValue' => null, 'FieldType' => 'Amazon_EC2_Model_Attachment'),
        );
        parent::__construct($data);
    }

        /**
     * Gets the value of the Attachment.
     * 
     * @return Attachment Attachment
     */
    public function getAttachment() 
    {
        return $this->_fields['Attachment']['FieldValue'];
    }

    /**
     * Sets the value of the Attachment.
     * 
     * @param Attachment Attachment
     * @return void
     */
    public function setAttachment($value) 
    {
        $this->_fields['Attachment']['FieldValue'] = $value;
        return;
    }

    /**
     * Sets the value of the Attachment  and returns this instance
     * 
     * @param Attachment $value Attachment
     * @return Amazon_EC2_Model_AttachVolumeResult instance
     */
    public function withAttachment($value)
    {
        $this->setAttachment($value);
        return $this;
    }


    /**
     * Checks if Attachment  is set
     * 
     * @return bool true if Attachment property is set
     */
    public function isSetAttachment()
    {
        return !is_null($this->_fields['Attachment']['FieldValue']);

    }




}