<?php

class RSAEnc extends RSA {
    private $result = false;

    /**
     * RSAEnc constructor.
     * @param $plain
     * @param $public
     */
    public function __construct($plain, $public)
    {
        $this->setPublic($public);
        $this->setPlain($plain);
        $obj = new stdClass();
        $obj->success = $this->encrypt();
        $obj->key = $this->getKey();
        $obj->result = $this->getEncrypted();
        $this->result = $obj;
    }

    /**
     * @return stdClass
     */
    public function result()
    {
        return $this->result;
    }
}

class RSADec extends RSA {
    private $result = false;

    /**
     * RSADec constructor.
     * @param $encrypted
     * @param $private
     * @param $key
     */
    public function __construct($encrypted, $private, $key)
    {
        $this->setPrivate($private);
        $this->setEncrypted($encrypted);
        $this->setKey($key);
        $obj = new stdClass();
        $obj->success = $this->decrypt();
        $obj->result = $this->getDecrypted();
        $this->result = $obj;
    }

    /**
     * @return stdClass
     */
    public function result()
    {
        return $this->result;
    }
}

class RSA
{
    private $private = "";
    private $public = "";
    private $key = "";
    private $plain = "";
    private $encrypted = "";
    private $decrypted = "";

    /**
     * use a public key
     * to encrypt a randomly generated
     * key which will be used
     * to encrypt a plain text
     * @return int the length of the plain text
     */
    public function encrypt()
    {
        $encrypted = "";
        $keys = array();
        $public[] = openssl_get_publickey($this->public);
        $res = openssl_seal($this->plain, $encrypted, $keys, $public);
        $this->key = isset($keys[0]) ? $keys[0] : "";
        $this->encrypted = $encrypted;
        return $res;
    }

    /**
     * use a private key to decrypt
     * a passed key which will be used
     * to decrypt the encrypted string
     * @return bool the result of the decryption process
     */
    public function decrypt()
    {
        $decrypted = "";
        $private = openssl_get_privatekey($this->private);
        $res = openssl_open($this->encrypted, $decrypted, $this->key, $private);
        $this->decrypted = $decrypted;
        return $res;
    }

    /**
     * @return string
     */
    public function getPrivate()
    {
        return $this->private;
    }

    /**
     * @param string $private
     */
    public function setPrivate($private)
    {
        $this->private = $private;
    }

    /**
     * @return string
     */
    public function getPublic()
    {
        return $this->public;
    }

    /**
     * @param string $public
     */
    public function setPublic($public)
    {
        $this->public = $public;
    }

    /**
     * @return string
     */
    public function getPlain()
    {
        return $this->plain;
    }

    /**
     * @param string $plain
     */
    public function setPlain($plain)
    {
        $this->plain = $plain;
    }

    /**
     * @return string
     */
    public function getEncrypted()
    {
        return $this->encrypted;
    }

    /**
     * @param string $encrypted
     */
    public function setEncrypted($encrypted)
    {
        $this->encrypted = $encrypted;
    }

    /**
     * @return string
     */
    public function getDecrypted()
    {
        return $this->decrypted;
    }

    /**
     * @param string $decrypted
     */
    public function setDecrypted($decrypted)
    {
        $this->decrypted = $decrypted;
    }

    /**
     * @return string
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @param $key
     */
    public function setKey($key)
    {
        $this->key = $key;
    }

}