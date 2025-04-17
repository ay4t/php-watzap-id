<?php

namespace Ay4t\WatzapId;

use Ay4t\RestClient\Client;
use Ay4t\RestClient\Exceptions\ApiException;
use Ay4t\RestClient\Logger\DefaultLogger;
use Ay4t\WatzapId\Config\WatzapConfig;

class WatzapClient extends Client
{
    /**
     * @var WatzapConfig
     */
    protected $config;

    /**
     * @var string
     */
    private string $rootPath;

    public function __construct(WatzapConfig $config)
    {
        // Tentukan root path project
        $reflection = new \ReflectionClass(\Composer\Autoload\ClassLoader::class);
        $this->rootPath = dirname(dirname(dirname($reflection->getFileName())));

        // Cek dan buat file .env jika belum ada
        $envFile = $this->rootPath . '/.env';
        if (!file_exists($envFile)) {
            $envContent = "# Watzap.id API Configuration\n\n";
            $envContent .= "# Your Watzap.id API Key\n";
            $envContent .= "API_KEY=\n\n";
            $envContent .= "# Your Watzap.id Number Key\n";
            $envContent .= "NUMBER_KEY=\n";
            
            file_put_contents($envFile, $envContent);
            
            // Buat juga .env.example
            file_put_contents($this->rootPath . '/.env.example', $envContent);
        }

        $this->config = $config;
        $logger = new DefaultLogger($config->getLogFile());
        parent::__construct($config, $logger);
    }

    /**
     * Check API Status
     * @return array
     * @throws ApiException
     */
    public function checkApiStatus(): array
    {
        return $this->cmd('POST', 'checking_key', [
            'api_key' => $this->config->getApiKey()
        ]);
    }

    /**
     * Validate WhatsApp Number
     * @param string $phoneNumber
     * @return array
     * @throws ApiException
     */
    public function validateNumber(string $phoneNumber): array
    {
        return $this->cmd('POST', 'validate_number', [
            'api_key' => $this->config->getApiKey(),
            'number_key' => $this->config->getNumberKey(),
            'phone_no' => $phoneNumber
        ]);
    }

    /**
     * Send Text Message
     * @param string $phoneNumber
     * @param string $message
     * @param bool $waitUntilSend
     * @return array
     * @throws ApiException
     */
    public function sendMessage(string $phoneNumber, string $message, bool $waitUntilSend = false): array
    {
        $data = [
            'api_key' => $this->config->getApiKey(),
            'number_key' => $this->config->getNumberKey(),
            'phone_no' => $phoneNumber,
            'message' => $message
        ];

        if ($waitUntilSend) {
            $data['wait_until_send'] = '1';
        }

        return $this->cmd('POST', 'send_message', $data);
    }

    /**
     * Send Image with Caption
     * @param string $phoneNumber
     * @param string $imageUrl
     * @param string|null $caption
     * @return array
     * @throws ApiException
     */
    public function sendImage(string $phoneNumber, string $imageUrl, ?string $caption = null): array
    {
        $data = [
            'api_key' => $this->config->getApiKey(),
            'number_key' => $this->config->getNumberKey(),
            'phone_no' => $phoneNumber,
            'url' => $imageUrl
        ];

        if ($caption) {
            $data['caption'] = $caption;
        }

        return $this->cmd('POST', 'send_image', $data);
    }

    /**
     * Get Group List
     * @return array
     * @throws ApiException
     */
    public function getGroups(): array
    {
        return $this->cmd('POST', 'groups', [
            'api_key' => $this->config->getApiKey(),
            'number_key' => $this->config->getNumberKey()
        ]);
    }

    /**
     * Send Message to Group
     * @param string $groupId
     * @param string $message
     * @return array
     * @throws ApiException
     */
    public function sendGroupMessage(string $groupId, string $message): array
    {
        return $this->cmd('POST', 'send_message_group', [
            'api_key' => $this->config->getApiKey(),
            'number_key' => $this->config->getNumberKey(),
            'group_id' => $groupId,
            'message' => $message
        ]);
    }

    /**
     * Send Image to Group
     * @param string $groupId
     * @param string $imageUrl
     * @param string|null $caption
     * @return array
     * @throws ApiException
     */
    public function sendGroupImage(string $groupId, string $imageUrl, ?string $caption = null): array
    {
        $data = [
            'api_key' => $this->config->getApiKey(),
            'number_key' => $this->config->getNumberKey(),
            'group_id' => $groupId,
            'url' => $imageUrl
        ];

        if ($caption) {
            $data['caption'] = $caption;
        }

        return $this->cmd('POST', 'send_image_group', $data);
    }
}
