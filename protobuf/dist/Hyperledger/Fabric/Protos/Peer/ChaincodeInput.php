<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: peer/chaincode.proto

namespace Hyperledger\Fabric\Protos\Peer;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Carries the chaincode function and its arguments.
 * UnmarshalJSON in transaction.go converts the string-based REST/JSON input to
 * the []byte-based current ChaincodeInput structure.
 *
 * Generated from protobuf message <code>protos.ChaincodeInput</code>
 */
class ChaincodeInput extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>repeated bytes args = 1;</code>
     */
    private $args;

    public function __construct() {
        \GPBMetadata\Peer\Chaincode::initOnce();
        parent::__construct();
    }

    /**
     * Generated from protobuf field <code>repeated bytes args = 1;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getArgs()
    {
        return $this->args;
    }

    /**
     * Generated from protobuf field <code>repeated bytes args = 1;</code>
     * @param string[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setArgs($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::BYTES);
        $this->args = $arr;

        return $this;
    }

}

