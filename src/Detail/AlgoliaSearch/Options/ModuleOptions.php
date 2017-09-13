<?php

namespace Detail\AlgoliaSearch\Options;

use Zend\Stdlib\AbstractOptions;

class ModuleOptions extends AbstractOptions
{
    /**
     * @var string
     */
    protected $applicationId;

    /**
     * @var string
     */
    protected $apiKey;

    /**
     * @var array|null
     */
    protected $hosts;

    /**
     * @var array
     */
    protected $options = array();

    /**
     * {@inheritDoc}
     */
    public function __construct($options = null)
    {
        $this->__strictMode__ = false;

        parent::__construct($options);
    }

    /**
     * @return string
     */
    public function getApplicationId()
    {
        return $this->applicationId;
    }

    /**
     * @param string $applicationId
     */
    public function setApplicationId($applicationId)
    {
        $this->applicationId = $applicationId;
    }

    /**
     * @return string
     */
    public function getApiKey()
    {
        return $this->apiKey;
    }

    /**
     * @param string $apiKey
     */
    public function setApiKey($apiKey)
    {
        $this->apiKey = $apiKey;
    }

    /**
     * @return array|null
     */
    public function getHosts()
    {
        return $this->hosts;
    }

    /**
     * @param array|null $hosts
     */
    public function setHosts($hosts)
    {
        $this->hosts = $hosts;
    }

    /**
     * @return array
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * @param array $options
     */
    public function setOptions(array $options)
    {
        $this->options = $options;
    }
}
