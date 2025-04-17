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

    /**
     * @var string|null Custom path for rest-client log
     */
    private ?string $logFile = null;

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

    /**
     * Set custom log file path
     * @param string $path
     * @return $this
     */
    public function setLogFile(string $path): self
    {
        $this->logFile = $path;
        return $this;
    }

    /**
     * Get custom log file path
     * @return string|null
     */
    public function getLogFile(): ?string
    {
        return $this->logFile;
    }
}
