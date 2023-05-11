<?php

namespace Walmart\Model;

class TokenDetailResponse extends \ArrayObject
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
     * The timestamp when the token expires
     *
     * @var string
     */
    protected $expireAt;
    /**
     * The timestamp when the token is issued
     *
     * @var string
     */
    protected $issuedAt;
    /**
     * Whether the token is valid; boolean value of true or false
     *
     * @var bool
     */
    protected $isValid;
    /**
     * Whether the keys Seller used are correctly associated
     *
     * @var bool
     */
    protected $isChannelMatch;
    /**
     * The API categories with their corresponding access levels
     *
     * @var TokenDetailResponseScopes
     */
    protected $scopes;
    /**
     * The timestamp when the token expires
     *
     * @return string
     */
    public function getExpireAt() : string
    {
        return $this->expireAt;
    }
    /**
     * The timestamp when the token expires
     *
     * @param string $expireAt
     *
     * @return self
     */
    public function setExpireAt(string $expireAt) : self
    {
        $this->initialized['expireAt'] = true;
        $this->expireAt = $expireAt;
        return $this;
    }
    /**
     * The timestamp when the token is issued
     *
     * @return string
     */
    public function getIssuedAt() : string
    {
        return $this->issuedAt;
    }
    /**
     * The timestamp when the token is issued
     *
     * @param string $issuedAt
     *
     * @return self
     */
    public function setIssuedAt(string $issuedAt) : self
    {
        $this->initialized['issuedAt'] = true;
        $this->issuedAt = $issuedAt;
        return $this;
    }
    /**
     * Whether the token is valid; boolean value of true or false
     *
     * @return bool
     */
    public function getIsValid() : bool
    {
        return $this->isValid;
    }
    /**
     * Whether the token is valid; boolean value of true or false
     *
     * @param bool $isValid
     *
     * @return self
     */
    public function setIsValid(bool $isValid) : self
    {
        $this->initialized['isValid'] = true;
        $this->isValid = $isValid;
        return $this;
    }
    /**
     * Whether the keys Seller used are correctly associated
     *
     * @return bool
     */
    public function getIsChannelMatch() : bool
    {
        return $this->isChannelMatch;
    }
    /**
     * Whether the keys Seller used are correctly associated
     *
     * @param bool $isChannelMatch
     *
     * @return self
     */
    public function setIsChannelMatch(bool $isChannelMatch) : self
    {
        $this->initialized['isChannelMatch'] = true;
        $this->isChannelMatch = $isChannelMatch;
        return $this;
    }
    /**
     * The API categories with their corresponding access levels
     *
     * @return TokenDetailResponseScopes
     */
    public function getScopes() : TokenDetailResponseScopes
    {
        return $this->scopes;
    }
    /**
     * The API categories with their corresponding access levels
     *
     * @param TokenDetailResponseScopes $scopes
     *
     * @return self
     */
    public function setScopes(TokenDetailResponseScopes $scopes) : self
    {
        $this->initialized['scopes'] = true;
        $this->scopes = $scopes;
        return $this;
    }
}