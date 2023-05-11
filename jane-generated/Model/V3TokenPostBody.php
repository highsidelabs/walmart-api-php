<?php

namespace Walmart\Model;

class V3TokenPostBody extends \ArrayObject
{
    /**
     * @var array
     */
    protected $initialized = array();
    public function isInitialized($property) : bool
    {
        return array_key_exists($property, $this->initialized);
    }
    /**
     * The type of access token to be issued
     *
     * @var string
     */
    protected $grantType = 'client_credentials';
    /**
     * The type of access token to be issued
     *
     * @return string
     */
    public function getGrantType() : string
    {
        return $this->grantType;
    }
    /**
     * The type of access token to be issued
     *
     * @param string $grantType
     *
     * @return self
     */
    public function setGrantType(string $grantType) : self
    {
        $this->initialized['grantType'] = true;
        $this->grantType = $grantType;
        return $this;
    }
}