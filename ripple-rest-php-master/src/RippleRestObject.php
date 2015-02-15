<?php
/**
 * Contains class RippleRestObject
 *
 * @license MIT
 */

/**
 * A super class for all schemas used in RippleRest.
 */
abstract class RippleRestObject {
    /**
     * @internal
     */
    protected static function _toString($x) { if(is_null($x)) return null; return (string) $x; }
    /**
     * @internal
     */
    protected static function _fromString($x) { if(is_null($x)) return null; return (string) $x; }
    /**
     * @internal
     */
    protected static function _checkString($x) { if(is_null($x)) return true; return true; }
    
    /**
     * @internal
     */
    protected static function _toStringPattern($x, $pattern) { if(is_null($x)) return null; return (string) $x; }
    /**
     * @internal
     */
    protected static function _fromStringPattern($x, $pattern) { if(is_null($x)) return null; return (string) $x; }
    /**
     * @internal
     */
    protected static function _checkStringPattern($x, $pattern) { if(is_null($x)) return true; return (bool) preg_match('`' . $pattern .'`', (string) $x); }
    
    /**
     * @internal
     */
    protected static function _toBoolean($x) { if(is_null($x)) return null; return (boolean) $x; }
    /**
     * @internal
     */
    protected static function _fromBoolean($x) { if(is_null($x)) return null; return (boolean) $x; }
    /**
     * @internal
     */
    protected static function _checkBoolean($x) { if(is_null($x)) return true; return true; }
    
    /**
     * @internal
     */
    protected static function _toFloat($x) { if(is_null($x)) return null; return (float) $x; }
    /**
     * @internal
     */
    protected static function _fromFloat($x) { if(is_null($x)) return null; return (float) $x; }
    /**
     * @internal
     */
    protected static function _checkFloat($x) { if(is_null($x)) return true; return true; }

    /**
     * The hex representation of a 256-bit hash
     */
    const PATTERN_TYPE_HASH256 = "^$|^[A-Fa-f0-9]{64}$";
    
    /**
     * @internal
     */
    protected static function _toHash256($x) { if(is_null($x)) return null; return self::_toStringPattern($x, self::PATTERN_TYPE_HASH256); }
    /**
     * @internal
     */
    protected static function _fromHash256($x) { if(is_null($x)) return null; return self::_fromStringPattern($x, self::PATTERN_TYPE_HASH256); }
    /**
     * @internal
     */
    protected static function _checkHash256($x) { if(is_null($x)) return true; return self::_checkStringPattern($x, self::PATTERN_TYPE_HASH256); }
    
    /**
     * The hex representation of a 128-bit hash
     */
    const PATTERN_TYPE_HASH128 = "^$|^[A-Fa-f0-9]{32}$";
    
    /**
     * @internal
     */
    protected static function _toHash128($x) { if(is_null($x)) return null; return self::_toStringPattern($x, self::PATTERN_TYPE_HASH128); }
    /**
     * @internal
     */
    protected static function _fromHash128($x) { if(is_null($x)) return null; return self::_fromStringPattern($x, self::PATTERN_TYPE_HASH128); }
    /**
     * @internal
     */
    protected static function _checkHash128($x) { if(is_null($x)) return true; return self::_checkStringPattern($x, self::PATTERN_TYPE_HASH128); }
    
    /**
     * An ISO 8601 combined date and time timestamp
     */
    const PATTERN_TYPE_TIMESTAMP = "^$|^[0-9]{4}-[0-1][0-9]-[0-3][0-9]T(2[0-3]|[01][0-9]):[0-5][0-9]:[0-5][0-9](Z|[+](2[0-3]|[01][0-9]):[0-5][0-9])$";
    
    /**
     * @internal
     */
    protected static function _toTimestamp($x) { if(is_null($x)) return null; return self::_toStringPattern($x, self::PATTERN_TYPE_TIMESTAMP); }
    /**
     * @internal
     */
    protected static function _fromTimestamp($x) { if(is_null($x)) return null; return self::_fromStringPattern($x, self::PATTERN_TYPE_TIMESTAMP); }
    /**
     * @internal
     */
    protected static function _checkTimestamp($x) { if(is_null($x)) return true; return self::_checkStringPattern($x, self::PATTERN_TYPE_TIMESTAMP); }
    
    /**
     * A Ripple account address
     */
    const PATTERN_TYPE_RIPPLEADDRESS = "^r[1-9A-HJ-NP-Za-km-z]{25,33}$";
    
    /**
     * @internal
     */
    protected static function _toRippleAddress($x) { if(is_null($x)) return null; return self::_toStringPattern($x, self::PATTERN_TYPE_RIPPLEADDRESS); }
    /**
     * @internal
     */
    protected static function _fromRippleAddress($x) { if(is_null($x)) return null; return self::_fromStringPattern($x, self::PATTERN_TYPE_RIPPLEADDRESS); }
    /**
     * @internal
     */
    protected static function _checkRippleAddress($x) { if(is_null($x)) return true; return self::_checkStringPattern($x, self::PATTERN_TYPE_RIPPLEADDRESS); }
    
    /**
     * A client-supplied unique identifier (ideally a UUID) for this transaction used to prevent duplicate payments and help confirm the transaction's final status. All ASCII printable characters are allowed. Note that 256-bit hex strings are disallowed because of the potential confusion with transaction hashes.
     */
    const PATTERN_TYPE_RESOURCEID = "^(?!$|^[A-Fa-f0-9]{64})[ -~]{1,255}$";
    
    /**
     * @internal
     */
    protected static function _toResourceId($x) { if(is_null($x)) return null; return self::_toStringPattern($x, self::PATTERN_TYPE_RESOURCEID); }
    /**
     * @internal
     */
    protected static function _fromResourceId($x) { if(is_null($x)) return null; return self::_fromStringPattern($x, self::PATTERN_TYPE_RESOURCEID); }
    /**
     * @internal
     */
    protected static function _checkResourceId($x) { if(is_null($x)) return true; return self::_checkStringPattern($x, self::PATTERN_TYPE_RESOURCEID); }
    
    /**
     * A string representation of a floating point number
     */
    const PATTERN_TYPE_FLOATSTRING = "^[-+]?[0-9]*[.]?[0-9]+([eE][-+]?[0-9]+)?$";
    
    /**
     * @internal
     */
    protected static function _toFloatString($x) { if(is_null($x)) return null; return self::_toStringPattern($x, self::PATTERN_TYPE_FLOATSTRING); }
    /**
     * @internal
     */
    protected static function _fromFloatString($x) { if(is_null($x)) return null; return self::_fromStringPattern($x, self::PATTERN_TYPE_FLOATSTRING); }
    /**
     * @internal
     */
    protected static function _checkFloatString($x) { if(is_null($x)) return true; return self::_checkStringPattern($x, self::PATTERN_TYPE_FLOATSTRING); }
    
    /**
     * A standard URL
     */
    const PATTERN_TYPE_URL = "^(ftp://|http://|https://)?([A-Za-z0-9_]+:{0,1}[A-Za-z0-9_]*@)?(^([ \t\r\n\f])+)(:[0-9]+)?(/|/([[A-Za-z0-9_]#!:.?+=&%@!-/]))?$";
    
    /**
     * @internal
     */
    protected static function _toURL($x) { if(is_null($x)) return null; return self::_toStringPattern($x, self::PATTERN_TYPE_URL); }
    /**
     * @internal
     */
    protected static function _fromURL($x) { if(is_null($x)) return null; return self::_fromStringPattern($x, self::PATTERN_TYPE_URL); }
    /**
     * @internal
     */
    protected static function _checkURL($x) { if(is_null($x)) return true; return self::_checkStringPattern($x, self::PATTERN_TYPE_URL); }
    
    /**
     * The three-character code or hex string used to denote currencies
     */
    const PATTERN_TYPE_CURRENCY = "^([a-zA-Z0-9]{3}|[A-Fa-f0-9]{40})$";
    
    /**
     * @internal
     */
    protected static function _toCurrency($x) { if(is_null($x)) return null; return self::_toStringPattern($x, self::PATTERN_TYPE_CURRENCY); }
    /**
     * @internal
     */
    protected static function _fromCurrency($x) { if(is_null($x)) return null; return self::_fromStringPattern($x, self::PATTERN_TYPE_CURRENCY); }
    /**
     * @internal
     */
    protected static function _checkCurrency($x) { if(is_null($x)) return true; return self::_checkStringPattern($x, self::PATTERN_TYPE_CURRENCY); }
    
    /**
     * A string representation of an unsigned 32-bit integer (0-4294967295)
     */
    const PATTERN_TYPE_UINT32 = "^$|^(429496729[0-5]|42949672[0-8][0-9]|4294967[01][0-9]{2}|429496[0-6][0-9]{3}|42949[0-5][0-9]{4}|4294[0-8][0-9]{5}|429[0-3][0-9]{6}|42[0-8][0-9]{7}|4[01][0-9]{8}|[1-3][0-9]{9}|[1-9][0-9]{8}|[1-9][0-9]{7}|[1-9][0-9]{6}|[1-9][0-9]{5}|[1-9][0-9]{4}|[1-9][0-9]{3}|[1-9][0-9]{2}|[1-9][0-9]|[0-9])$";
    
    /**
     * @internal
     */
    protected static function _toUINT32($x) { if(is_null($x)) return null; return self::_toStringPattern($x, self::PATTERN_TYPE_UINT32); }
    /**
     * @internal
     */
    protected static function _fromUINT32($x) { if(is_null($x)) return null; return self::_fromStringPattern($x, self::PATTERN_TYPE_UINT32); }
    /**
     * @internal
     */
    protected static function _checkUINT32($x) { if(is_null($x)) return true; return self::_checkStringPattern($x, self::PATTERN_TYPE_UINT32); }
    
    /**
     * @internal
     */
    protected static function _toNotification($x) { if(is_null($x)) return null; return $x->toArray(); }
    /**
     * @internal
     */
    protected static function _fromNotification($x) { if(is_null($x)) return null; return ($x instanceof RippleRestNotification) ? $x : new RippleRestNotification($x); }
    /**
     * @internal
     */
    protected static function _checkNotification($x) { if(is_null($x)) return true; return ($x instanceof RippleRestNotification); }
    
    /**
     * @internal
     */
    protected static function _toOrder($x) { if(is_null($x)) return null; return $x->toArray(); }
    /**
     * @internal
     */
    protected static function _fromOrder($x) { if(is_null($x)) return null; return ($x instanceof RippleRestOrder) ? $x : new RippleRestOrder($x); }
    /**
     * @internal
     */
    protected static function _checkOrder($x) { if(is_null($x)) return true; return ($x instanceof RippleRestOrder); }
    
    /**
     * @internal
     */
    protected static function _toAccountSettings($x) { if(is_null($x)) return null; return $x->toArray(); }
    /**
     * @internal
     */
    protected static function _fromAccountSettings($x) { if(is_null($x)) return null; return ($x instanceof RippleRestAccountSettings) ? $x : new RippleRestAccountSettings($x); }
    /**
     * @internal
     */
    protected static function _checkAccountSettings($x) { if(is_null($x)) return true; return ($x instanceof RippleRestAccountSettings); }
    
    /**
     * @internal
     */
    protected static function _toPayment($x) { if(is_null($x)) return null; return $x->toArray(); }
    /**
     * @internal
     */
    protected static function _fromPayment($x) { if(is_null($x)) return null; return ($x instanceof RippleRestPayment) ? $x : new RippleRestPayment($x); }
    /**
     * @internal
     */
    protected static function _checkPayment($x) { if(is_null($x)) return true; return ($x instanceof RippleRestPayment); }
    
    /**
     * @internal
     */
    protected static function _toBalance($x) { if(is_null($x)) return null; return $x->toArray(); }
    /**
     * @internal
     */
    protected static function _fromBalance($x) { if(is_null($x)) return null; return ($x instanceof RippleRestBalance) ? $x : new RippleRestBalance($x); }
    /**
     * @internal
     */
    protected static function _checkBalance($x) { if(is_null($x)) return true; return ($x instanceof RippleRestBalance); }
    
    /**
     * @internal
     */
    protected static function _toAmount($x) { if(is_null($x)) return null; return $x->toArray(); }
    /**
     * @internal
     */
    protected static function _fromAmount($x) { if(is_null($x)) return null; return ($x instanceof RippleRestAmount) ? $x : new RippleRestAmount($x); }
    /**
     * @internal
     */
    protected static function _checkAmount($x) { if(is_null($x)) return true; return ($x instanceof RippleRestAmount); }
    
    /**
     * @internal
     */
    protected static function _toTrustline($x) { if(is_null($x)) return null; return $x->toArray(); }
    /**
     * @internal
     */
    protected static function _fromTrustline($x) { if(is_null($x)) return null; return ($x instanceof RippleRestTrustline) ? $x : new RippleRestTrustline($x); }
    /**
     * @internal
     */
    protected static function _checkTrustline($x) { if(is_null($x)) return true; return ($x instanceof RippleRestTrustline); }
    
    /**
     * @internal
     */
    protected static function _toArrayAmount($x) { if(is_null($x)) return null; return array_map(function($y) { return self::_toAmount($y); }, $x); }
    /**
     * @internal
     */
    protected static function _fromArrayAmount($x) { if(is_null($x)) return null; return array_map(function($y) { return self::_fromAmount($y); }, $x); }
    /**
     * @internal
     */
    protected static function _checkArrayAmount($x) { if(is_null($x)) return true; return is_array($x) && count(array_filter($x, function($y) { return !self::_checkAmount($y); })) == 0; }
    
  
    /**
     * @internal
     */
    abstract public function toArray();
}
