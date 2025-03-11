<?php

namespace Ay4t\WatzapId\Config;

use Ay4t\RestClient\Config\Config;

class WatzapConfig extends Config
{
    /**
     * @var string
     */
    private string $apiKey;

    /**
     * @var string|null
     */
    private ?string $numberKey;

    public function __construct()
    {
        parent::__construct();
        $this->setBaseUri('https://api.watzap.id/v1');
    }

    /**
     * Set API Key
     * @param string $apiKey
     * @return self
     */
    public function setApiKey(string $apiKey): self
    {
        $this->apiKey = $apiKey;
        return $this;
    }

    /**
     * Get API Key
     * @return string
     */
    public function getApiKey(): string
    {
        return $this->apiKey;
    }

    /**
     * Set Number Key
     * @param string $numberKey
     * @return self
     */
    public function setNumberKey(string $numberKey): self
    {
        $this->numberKey = $numberKey;
        return $this;
    }

    /**
     * Get Number Key
     * @return string|null
     */
    public function getNumberKey(): ?string
    {
        return $this->numberKey;
    }
}
