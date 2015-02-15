<?php
/**
 * Contains class RippleRestAccountSettings
 *
 * @license MIT
 */


/**
 * An object 
 * @property string $account (RippleAddress) The Ripple address of the account in question
 * @property string $regularKey (RippleAddress) The hash of an optional additional public key that can be used for signing and verifying transactions
 * @property string $url (URL) The domain associated with this account. The ripple.txt file can be looked up to verify this information
 * @property string $emailHash (Hash128) The MD5 128-bit hash of the account owner's email address
 * @property string $messageKey (`/^([0-9a-fA-F]{2}){0,33}$/`) An optional public key, represented as hex, that can be set to allow others to send encrypted messages to the account owner
 * @property float $transferRate A number representation of the rate charged each time a holder of currency issued by this account transfers it. By default the rate is 100. A rate of 101 is a 1% charge on top of the amount being transferred. Up to nine decimal places are supported
 * @property boolean $requireDestinationTag If set to true incoming payments will only be validated if they include a destination_tag. This may be used primarily by gateways that operate exclusively with hosted wallets
 * @property boolean $requireAuthorization If set to true incoming trustlines will only be validated if this account first creates a trustline to the counterparty with the authorized flag set to true. This may be used by gateways to prevent accounts unknown to them from holding currencies they issue
 * @property boolean $disallowXrp If set to true incoming XRP payments will be allowed
 * @property string $transactionSequence (UINT32) A string representation of the last sequence number of a validated transaction created by this account
 * @property string $trustlineCount (UINT32) The number of trustlines owned by this account. This value does not include incoming trustlines where this account has not explicitly reciprocated trust
 * @property string $ledger (`/^[0-9]+$/`) The string representation of the index number of the ledger containing these account settings or, in the case of historical queries, of the transaction that modified these settings
 * @property string $hash (Hash256) If this object was returned by a historical query this value will be the hash of the transaction that modified these settings. The transaction hash is used throughout the Ripple Protocol to uniquely identify a particular transaction

 */
class RippleRestAccountSettings extends RippleRestObject {
    /**
     * @internal
     */
    protected static $__properties = array(
        "account" => "Account", 
        "regular_key" => "RegularKey", 
        "regularkey" => "RegularKey", 
        "url" => "Url", 
        "email_hash" => "EmailHash", 
        "emailhash" => "EmailHash", 
        "message_key" => "MessageKey", 
        "messagekey" => "MessageKey", 
        "transfer_rate" => "TransferRate", 
        "transferrate" => "TransferRate", 
        "require_destination_tag" => "RequireDestinationTag", 
        "requiredestinationtag" => "RequireDestinationTag", 
        "require_authorization" => "RequireAuthorization", 
        "requireauthorization" => "RequireAuthorization", 
        "disallow_xrp" => "DisallowXrp", 
        "disallowxrp" => "DisallowXrp", 
        "transaction_sequence" => "TransactionSequence", 
        "transactionsequence" => "TransactionSequence", 
        "trustline_count" => "TrustlineCount", 
        "trustlinecount" => "TrustlineCount", 
        "ledger" => "Ledger", 
        "hash" => "Hash"
    );
    
    /**
     * Pattern Rule for field `RippleRestAccountSettings::$messageKey`
     * @see RippleRestAccountSettings::$messageKey
     * @see RippleRestAccountSettings::setMessageKey
     * @see RippleRestAccountSettings::getMessageKey
     */
    const PATTERN_MESSAGE_KEY = "^([0-9a-fA-F]{2}){0,33}$";
    
    /**
     * Pattern Rule for field `RippleRestAccountSettings::$ledger`
     * @see RippleRestAccountSettings::$ledger
     * @see RippleRestAccountSettings::setLedger
     * @see RippleRestAccountSettings::getLedger
     */
    const PATTERN_LEDGER = "^[0-9]+$";
    

    
    /**
     * @internal
     */
    protected $__data = array();
    
    /**
     * @internal
     */
    public function __set($name, $value)
    {
        if (isset(self::$__properties[strtolower($name)]))
        {
            $key = "set" . self::$__properties[strtolower($name)];
            return $this->$key($value);
        }
        else
        {
            return $this->__data[$name] = $value;
        }
    }

    /**
     * @internal
     */
    public function __get($name)
    {
        if (isset(self::$__properties[strtolower($name)]))
        {
            $key = "get" . self::$__properties[strtolower($name)];
            return $this->$key();
        }
        else
        {
            if (array_key_exists($name, $this->__data)) {
                return $this->data[$name];
            }

            $trace = debug_backtrace();
            trigger_error(
                'Undefined property via __get(): ' . $name .
                ' in ' . $trace[0]['file'] .
                ' on line ' . $trace[0]['line'],
                E_USER_NOTICE);
            return null;
        }
    }

    /**
     * @internal
     */
    public function __isset($name)
    {
        if (isset(self::$__properties[strtolower($name)]))
        {
            return true;
        }
        return isset($this->__data[$name]);
    }

    /**
     * @internal
     */
    public function __unset($name)
    {
        if (isset(self::$__properties[strtolower($name)]))
        {
            $key = "set" . self::$__properties[strtolower($name)];
            return $this->$key(null);
        }
        unset($this->__data[$name]);
    }
    
    /**
     * Create a new instance of RippleRestAccountSettings.
     * @param array $data (defaults to `null`) PHP Array (result of `json_decode($json, true)`)
     * @return RippleRestAccountSettings
     */
    public function __construct($data = null) 
    {
        if (is_array($data))
        {
            foreach($data as $name => $value)
            {
                if (isset(self::$__properties[strtolower($name)]))
                {
                    $key = "init" . self::$__properties[strtolower($name)];
                    $this->$key($value);
                }
                else
                {
                    $this->__data[$name] = $value;
                }
            }
        }
    }
    
    
    /**
     * @internal
     */
    protected $_Account;
    
    /**
     * The Ripple address of the account in question
     * @see RippleRestAccountSettings::$account
     * @see RippleRestAccountSettings::setAccount
     * @return string (RippleAddress) 
     */
    public function getAccount() {
        return $this->_Account;
    }
    
    /**
     * The Ripple address of the account in question
     * @see RippleRestAccountSettings::$account
     * @see RippleRestAccountSettings::getAccount
     * @param string $value (RippleAddress) 
     * @return null
     */
    public function setAccount($value) {
        try {
            if (!self::_checkRippleAddress($value)) throw new Exception("");
            $this->_Account = self::_fromRippleAddress($value);
        } catch(Exception $e) {
            throw new Exception("Cannot convert " . ((string)$value) . " to " . "string");
        }
    }
    
    /**
     * @internal
     */
    protected function initAccount($value) {
        $this->_Account = self::_fromRippleAddress($value);
    }
    
    /**
     * @internal
     */
    protected $_RegularKey;
    
    /**
     * The hash of an optional additional public key that can be used for signing and verifying transactions
     * @see RippleRestAccountSettings::$regularKey
     * @see RippleRestAccountSettings::setRegularKey
     * @return string (RippleAddress) 
     */
    public function getRegularKey() {
        return $this->_RegularKey;
    }
    
    /**
     * The hash of an optional additional public key that can be used for signing and verifying transactions
     * @see RippleRestAccountSettings::$regularKey
     * @see RippleRestAccountSettings::getRegularKey
     * @param string $value (RippleAddress) 
     * @return null
     */
    public function setRegularKey($value) {
        try {
            if (!self::_checkRippleAddress($value)) throw new Exception("");
            $this->_RegularKey = self::_fromRippleAddress($value);
        } catch(Exception $e) {
            throw new Exception("Cannot convert " . ((string)$value) . " to " . "string");
        }
    }
    
    /**
     * @internal
     */
    protected function initRegularKey($value) {
        $this->_RegularKey = self::_fromRippleAddress($value);
    }
    
    /**
     * @internal
     */
    protected $_Url;
    
    /**
     * The domain associated with this account. The ripple.txt file can be looked up to verify this information
     * @see RippleRestAccountSettings::$url
     * @see RippleRestAccountSettings::setUrl
     * @return string (URL) 
     */
    public function getUrl() {
        return $this->_Url;
    }
    
    /**
     * The domain associated with this account. The ripple.txt file can be looked up to verify this information
     * @see RippleRestAccountSettings::$url
     * @see RippleRestAccountSettings::getUrl
     * @param string $value (URL) 
     * @return null
     */
    public function setUrl($value) {
        try {
            if (!self::_checkURL($value)) throw new Exception("");
            $this->_Url = self::_fromURL($value);
        } catch(Exception $e) {
            throw new Exception("Cannot convert " . ((string)$value) . " to " . "string");
        }
    }
    
    /**
     * @internal
     */
    protected function initUrl($value) {
        $this->_Url = self::_fromURL($value);
    }
    
    /**
     * @internal
     */
    protected $_EmailHash;
    
    /**
     * The MD5 128-bit hash of the account owner's email address
     * @see RippleRestAccountSettings::$emailHash
     * @see RippleRestAccountSettings::setEmailHash
     * @return string (Hash128) 
     */
    public function getEmailHash() {
        return $this->_EmailHash;
    }
    
    /**
     * The MD5 128-bit hash of the account owner's email address
     * @see RippleRestAccountSettings::$emailHash
     * @see RippleRestAccountSettings::getEmailHash
     * @param string $value (Hash128) 
     * @return null
     */
    public function setEmailHash($value) {
        try {
            if (!self::_checkHash128($value)) throw new Exception("");
            $this->_EmailHash = self::_fromHash128($value);
        } catch(Exception $e) {
            throw new Exception("Cannot convert " . ((string)$value) . " to " . "string");
        }
    }
    
    /**
     * @internal
     */
    protected function initEmailHash($value) {
        $this->_EmailHash = self::_fromHash128($value);
    }
    
    /**
     * @internal
     */
    protected $_MessageKey;
    
    /**
     * An optional public key, represented as hex, that can be set to allow others to send encrypted messages to the account owner
     * @see RippleRestAccountSettings::$messageKey
     * @see RippleRestAccountSettings::setMessageKey
     * @return string (`/^([0-9a-fA-F]{2}){0,33}$/`) 
     */
    public function getMessageKey() {
        return $this->_MessageKey;
    }
    
    /**
     * An optional public key, represented as hex, that can be set to allow others to send encrypted messages to the account owner
     * @see RippleRestAccountSettings::$messageKey
     * @see RippleRestAccountSettings::getMessageKey
     * @param string $value (`/^([0-9a-fA-F]{2}){0,33}$/`) 
     * @return null
     */
    public function setMessageKey($value) {
        try {
            if (!self::_checkStringPattern($value, self::PATTERN_MESSAGE_KEY)) throw new Exception("");
            $this->_MessageKey = self::_fromStringPattern($value, self::PATTERN_MESSAGE_KEY);
        } catch(Exception $e) {
            throw new Exception("Cannot convert " . ((string)$value) . " to " . "string");
        }
    }
    
    /**
     * @internal
     */
    protected function initMessageKey($value) {
        $this->_MessageKey = self::_fromStringPattern($value, self::PATTERN_MESSAGE_KEY);
    }
    
    /**
     * @internal
     */
    protected $_TransferRate;
    
    /**
     * A number representation of the rate charged each time a holder of currency issued by this account transfers it. By default the rate is 100. A rate of 101 is a 1% charge on top of the amount being transferred. Up to nine decimal places are supported
     * @see RippleRestAccountSettings::$transferRate
     * @see RippleRestAccountSettings::setTransferRate
     * @return float 
     */
    public function getTransferRate() {
        return $this->_TransferRate;
    }
    
    /**
     * A number representation of the rate charged each time a holder of currency issued by this account transfers it. By default the rate is 100. A rate of 101 is a 1% charge on top of the amount being transferred. Up to nine decimal places are supported
     * @see RippleRestAccountSettings::$transferRate
     * @see RippleRestAccountSettings::getTransferRate
     * @param float $value 
     * @return null
     */
    public function setTransferRate($value) {
        try {
            if (!self::_checkFloat($value)) throw new Exception("");
            $this->_TransferRate = self::_fromFloat($value);
        } catch(Exception $e) {
            throw new Exception("Cannot convert " . ((string)$value) . " to " . "float");
        }
    }
    
    /**
     * @internal
     */
    protected function initTransferRate($value) {
        $this->_TransferRate = self::_fromFloat($value);
    }
    
    /**
     * @internal
     */
    protected $_RequireDestinationTag;
    
    /**
     * If set to true incoming payments will only be validated if they include a destination_tag. This may be used primarily by gateways that operate exclusively with hosted wallets
     * @see RippleRestAccountSettings::$requireDestinationTag
     * @see RippleRestAccountSettings::setRequireDestinationTag
     * @return boolean 
     */
    public function getRequireDestinationTag() {
        return $this->_RequireDestinationTag;
    }
    
    /**
     * If set to true incoming payments will only be validated if they include a destination_tag. This may be used primarily by gateways that operate exclusively with hosted wallets
     * @see RippleRestAccountSettings::$requireDestinationTag
     * @see RippleRestAccountSettings::getRequireDestinationTag
     * @param boolean $value 
     * @return null
     */
    public function setRequireDestinationTag($value) {
        try {
            if (!self::_checkBoolean($value)) throw new Exception("");
            $this->_RequireDestinationTag = self::_fromBoolean($value);
        } catch(Exception $e) {
            throw new Exception("Cannot convert " . ((string)$value) . " to " . "boolean");
        }
    }
    
    /**
     * @internal
     */
    protected function initRequireDestinationTag($value) {
        $this->_RequireDestinationTag = self::_fromBoolean($value);
    }
    
    /**
     * @internal
     */
    protected $_RequireAuthorization;
    
    /**
     * If set to true incoming trustlines will only be validated if this account first creates a trustline to the counterparty with the authorized flag set to true. This may be used by gateways to prevent accounts unknown to them from holding currencies they issue
     * @see RippleRestAccountSettings::$requireAuthorization
     * @see RippleRestAccountSettings::setRequireAuthorization
     * @return boolean 
     */
    public function getRequireAuthorization() {
        return $this->_RequireAuthorization;
    }
    
    /**
     * If set to true incoming trustlines will only be validated if this account first creates a trustline to the counterparty with the authorized flag set to true. This may be used by gateways to prevent accounts unknown to them from holding currencies they issue
     * @see RippleRestAccountSettings::$requireAuthorization
     * @see RippleRestAccountSettings::getRequireAuthorization
     * @param boolean $value 
     * @return null
     */
    public function setRequireAuthorization($value) {
        try {
            if (!self::_checkBoolean($value)) throw new Exception("");
            $this->_RequireAuthorization = self::_fromBoolean($value);
        } catch(Exception $e) {
            throw new Exception("Cannot convert " . ((string)$value) . " to " . "boolean");
        }
    }
    
    /**
     * @internal
     */
    protected function initRequireAuthorization($value) {
        $this->_RequireAuthorization = self::_fromBoolean($value);
    }
    
    /**
     * @internal
     */
    protected $_DisallowXrp;
    
    /**
     * If set to true incoming XRP payments will be allowed
     * @see RippleRestAccountSettings::$disallowXrp
     * @see RippleRestAccountSettings::setDisallowXrp
     * @return boolean 
     */
    public function getDisallowXrp() {
        return $this->_DisallowXrp;
    }
    
    /**
     * If set to true incoming XRP payments will be allowed
     * @see RippleRestAccountSettings::$disallowXrp
     * @see RippleRestAccountSettings::getDisallowXrp
     * @param boolean $value 
     * @return null
     */
    public function setDisallowXrp($value) {
        try {
            if (!self::_checkBoolean($value)) throw new Exception("");
            $this->_DisallowXrp = self::_fromBoolean($value);
        } catch(Exception $e) {
            throw new Exception("Cannot convert " . ((string)$value) . " to " . "boolean");
        }
    }
    
    /**
     * @internal
     */
    protected function initDisallowXrp($value) {
        $this->_DisallowXrp = self::_fromBoolean($value);
    }
    
    /**
     * @internal
     */
    protected $_TransactionSequence;
    
    /**
     * A string representation of the last sequence number of a validated transaction created by this account
     * @see RippleRestAccountSettings::$transactionSequence
     * @see RippleRestAccountSettings::setTransactionSequence
     * @return string (UINT32) 
     */
    public function getTransactionSequence() {
        return $this->_TransactionSequence;
    }
    
    /**
     * A string representation of the last sequence number of a validated transaction created by this account
     * @see RippleRestAccountSettings::$transactionSequence
     * @see RippleRestAccountSettings::getTransactionSequence
     * @param string $value (UINT32) 
     * @return null
     */
    public function setTransactionSequence($value) {
        try {
            if (!self::_checkUINT32($value)) throw new Exception("");
            $this->_TransactionSequence = self::_fromUINT32($value);
        } catch(Exception $e) {
            throw new Exception("Cannot convert " . ((string)$value) . " to " . "string");
        }
    }
    
    /**
     * @internal
     */
    protected function initTransactionSequence($value) {
        $this->_TransactionSequence = self::_fromUINT32($value);
    }
    
    /**
     * @internal
     */
    protected $_TrustlineCount;
    
    /**
     * The number of trustlines owned by this account. This value does not include incoming trustlines where this account has not explicitly reciprocated trust
     * @see RippleRestAccountSettings::$trustlineCount
     * @see RippleRestAccountSettings::setTrustlineCount
     * @return string (UINT32) 
     */
    public function getTrustlineCount() {
        return $this->_TrustlineCount;
    }
    
    /**
     * The number of trustlines owned by this account. This value does not include incoming trustlines where this account has not explicitly reciprocated trust
     * @see RippleRestAccountSettings::$trustlineCount
     * @see RippleRestAccountSettings::getTrustlineCount
     * @param string $value (UINT32) 
     * @return null
     */
    public function setTrustlineCount($value) {
        try {
            if (!self::_checkUINT32($value)) throw new Exception("");
            $this->_TrustlineCount = self::_fromUINT32($value);
        } catch(Exception $e) {
            throw new Exception("Cannot convert " . ((string)$value) . " to " . "string");
        }
    }
    
    /**
     * @internal
     */
    protected function initTrustlineCount($value) {
        $this->_TrustlineCount = self::_fromUINT32($value);
    }
    
    /**
     * @internal
     */
    protected $_Ledger;
    
    /**
     * The string representation of the index number of the ledger containing these account settings or, in the case of historical queries, of the transaction that modified these settings
     * @see RippleRestAccountSettings::$ledger
     * @see RippleRestAccountSettings::setLedger
     * @return string (`/^[0-9]+$/`) 
     */
    public function getLedger() {
        return $this->_Ledger;
    }
    
    /**
     * The string representation of the index number of the ledger containing these account settings or, in the case of historical queries, of the transaction that modified these settings
     * @see RippleRestAccountSettings::$ledger
     * @see RippleRestAccountSettings::getLedger
     * @param string $value (`/^[0-9]+$/`) 
     * @return null
     */
    public function setLedger($value) {
        try {
            if (!self::_checkStringPattern($value, self::PATTERN_LEDGER)) throw new Exception("");
            $this->_Ledger = self::_fromStringPattern($value, self::PATTERN_LEDGER);
        } catch(Exception $e) {
            throw new Exception("Cannot convert " . ((string)$value) . " to " . "string");
        }
    }
    
    /**
     * @internal
     */
    protected function initLedger($value) {
        $this->_Ledger = self::_fromStringPattern($value, self::PATTERN_LEDGER);
    }
    
    /**
     * @internal
     */
    protected $_Hash;
    
    /**
     * If this object was returned by a historical query this value will be the hash of the transaction that modified these settings. The transaction hash is used throughout the Ripple Protocol to uniquely identify a particular transaction
     * @see RippleRestAccountSettings::$hash
     * @see RippleRestAccountSettings::setHash
     * @return string (Hash256) 
     */
    public function getHash() {
        return $this->_Hash;
    }
    
    /**
     * If this object was returned by a historical query this value will be the hash of the transaction that modified these settings. The transaction hash is used throughout the Ripple Protocol to uniquely identify a particular transaction
     * @see RippleRestAccountSettings::$hash
     * @see RippleRestAccountSettings::getHash
     * @param string $value (Hash256) 
     * @return null
     */
    public function setHash($value) {
        try {
            if (!self::_checkHash256($value)) throw new Exception("");
            $this->_Hash = self::_fromHash256($value);
        } catch(Exception $e) {
            throw new Exception("Cannot convert " . ((string)$value) . " to " . "string");
        }
    }
    
    /**
     * @internal
     */
    protected function initHash($value) {
        $this->_Hash = self::_fromHash256($value);
    }


    /**
     * Convert this object to PHP native Array for serializing to JSON.
     * @return array
     */
    public function toArray()
    {
        $array = array();
    
        $array["account"] = self::_toRippleAddress($this->_Account);
        if (is_null($array["account"]))
            throw new Exception("Field Account is required in RippleRestAccountSettings");
    
        $array["regular_key"] = self::_toRippleAddress($this->_RegularKey);
        if (is_null($array["regular_key"])) unset($array["regular_key"]);
    
        $array["url"] = self::_toURL($this->_Url);
        if (is_null($array["url"])) unset($array["url"]);
    
        $array["email_hash"] = self::_toHash128($this->_EmailHash);
        if (is_null($array["email_hash"])) unset($array["email_hash"]);
    
        $array["message_key"] = self::_toStringPattern($this->_MessageKey, self::PATTERN_MESSAGE_KEY);
        if (is_null($array["message_key"])) unset($array["message_key"]);
    
        $array["transfer_rate"] = self::_toFloat($this->_TransferRate);
        if (is_null($array["transfer_rate"])) unset($array["transfer_rate"]);
    
        $array["require_destination_tag"] = self::_toBoolean($this->_RequireDestinationTag);
        if (is_null($array["require_destination_tag"])) unset($array["require_destination_tag"]);
    
        $array["require_authorization"] = self::_toBoolean($this->_RequireAuthorization);
        if (is_null($array["require_authorization"])) unset($array["require_authorization"]);
    
        $array["disallow_xrp"] = self::_toBoolean($this->_DisallowXrp);
        if (is_null($array["disallow_xrp"])) unset($array["disallow_xrp"]);
    
        $array["transaction_sequence"] = self::_toUINT32($this->_TransactionSequence);
        if (is_null($array["transaction_sequence"])) unset($array["transaction_sequence"]);
    
        $array["trustline_count"] = self::_toUINT32($this->_TrustlineCount);
        if (is_null($array["trustline_count"])) unset($array["trustline_count"]);
    
        $array["ledger"] = self::_toStringPattern($this->_Ledger, self::PATTERN_LEDGER);
        if (is_null($array["ledger"])) unset($array["ledger"]);
    
        $array["hash"] = self::_toHash256($this->_Hash);
        if (is_null($array["hash"])) unset($array["hash"]);

        return $array;
    }


}
