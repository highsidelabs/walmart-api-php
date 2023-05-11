<?php

namespace Walmart\Model;

class TokenDetailResponseScopes extends \ArrayObject
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
     * 
     *
     * @var string
     */
    protected $reports;
    /**
     * 
     *
     * @var string
     */
    protected $item;
    /**
     * 
     *
     * @var string
     */
    protected $shipping;
    /**
     * 
     *
     * @var string
     */
    protected $price;
    /**
     * 
     *
     * @var string
     */
    protected $lagtime;
    /**
     * 
     *
     * @var string
     */
    protected $feeds;
    /**
     * 
     *
     * @var string
     */
    protected $returns;
    /**
     * 
     *
     * @var string
     */
    protected $orders;
    /**
     * 
     *
     * @var string
     */
    protected $rules;
    /**
     * 
     *
     * @var string
     */
    protected $inventory;
    /**
     * 
     *
     * @var string
     */
    protected $content;
    /**
     * 
     *
     * @return string
     */
    public function getReports() : string
    {
        return $this->reports;
    }
    /**
     * 
     *
     * @param string $reports
     *
     * @return self
     */
    public function setReports(string $reports) : self
    {
        $this->initialized['reports'] = true;
        $this->reports = $reports;
        return $this;
    }
    /**
     * 
     *
     * @return string
     */
    public function getItem() : string
    {
        return $this->item;
    }
    /**
     * 
     *
     * @param string $item
     *
     * @return self
     */
    public function setItem(string $item) : self
    {
        $this->initialized['item'] = true;
        $this->item = $item;
        return $this;
    }
    /**
     * 
     *
     * @return string
     */
    public function getShipping() : string
    {
        return $this->shipping;
    }
    /**
     * 
     *
     * @param string $shipping
     *
     * @return self
     */
    public function setShipping(string $shipping) : self
    {
        $this->initialized['shipping'] = true;
        $this->shipping = $shipping;
        return $this;
    }
    /**
     * 
     *
     * @return string
     */
    public function getPrice() : string
    {
        return $this->price;
    }
    /**
     * 
     *
     * @param string $price
     *
     * @return self
     */
    public function setPrice(string $price) : self
    {
        $this->initialized['price'] = true;
        $this->price = $price;
        return $this;
    }
    /**
     * 
     *
     * @return string
     */
    public function getLagtime() : string
    {
        return $this->lagtime;
    }
    /**
     * 
     *
     * @param string $lagtime
     *
     * @return self
     */
    public function setLagtime(string $lagtime) : self
    {
        $this->initialized['lagtime'] = true;
        $this->lagtime = $lagtime;
        return $this;
    }
    /**
     * 
     *
     * @return string
     */
    public function getFeeds() : string
    {
        return $this->feeds;
    }
    /**
     * 
     *
     * @param string $feeds
     *
     * @return self
     */
    public function setFeeds(string $feeds) : self
    {
        $this->initialized['feeds'] = true;
        $this->feeds = $feeds;
        return $this;
    }
    /**
     * 
     *
     * @return string
     */
    public function getReturns() : string
    {
        return $this->returns;
    }
    /**
     * 
     *
     * @param string $returns
     *
     * @return self
     */
    public function setReturns(string $returns) : self
    {
        $this->initialized['returns'] = true;
        $this->returns = $returns;
        return $this;
    }
    /**
     * 
     *
     * @return string
     */
    public function getOrders() : string
    {
        return $this->orders;
    }
    /**
     * 
     *
     * @param string $orders
     *
     * @return self
     */
    public function setOrders(string $orders) : self
    {
        $this->initialized['orders'] = true;
        $this->orders = $orders;
        return $this;
    }
    /**
     * 
     *
     * @return string
     */
    public function getRules() : string
    {
        return $this->rules;
    }
    /**
     * 
     *
     * @param string $rules
     *
     * @return self
     */
    public function setRules(string $rules) : self
    {
        $this->initialized['rules'] = true;
        $this->rules = $rules;
        return $this;
    }
    /**
     * 
     *
     * @return string
     */
    public function getInventory() : string
    {
        return $this->inventory;
    }
    /**
     * 
     *
     * @param string $inventory
     *
     * @return self
     */
    public function setInventory(string $inventory) : self
    {
        $this->initialized['inventory'] = true;
        $this->inventory = $inventory;
        return $this;
    }
    /**
     * 
     *
     * @return string
     */
    public function getContent() : string
    {
        return $this->content;
    }
    /**
     * 
     *
     * @param string $content
     *
     * @return self
     */
    public function setContent(string $content) : self
    {
        $this->initialized['content'] = true;
        $this->content = $content;
        return $this;
    }
}