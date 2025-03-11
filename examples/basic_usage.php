<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Ay4t\WatzapId\Config\WatzapConfig;
use Ay4t\WatzapId\WatzapClient;
use Ay4t\RestClient\Exceptions\ApiException;

// Tambahkan di bagian atas file
require_once __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

// Modifikasi inisialisasi konfigurasi
$config = new WatzapConfig();
$config->setApiKey($_ENV['API_KEY'])
       ->setNumberKey($_ENV['NUMBER_KEY']);

/* var_dump($config);
die; */

// Buat instance WatzapClient
$watzap = new WatzapClient($config);

try {
    // 1. Cek status API
    echo "Mengecek status API...\n";
    $status = $watzap->checkApiStatus();
    print_r($status);
    die;

    // 2. Validasi nomor WhatsApp
    echo "\nMemvalidasi nomor WhatsApp...\n";
    $validation = $watzap->validateNumber('628123456789');
    print_r($validation);
    die;

    // 3. Kirim pesan teks
    echo "\nMengirim pesan teks...\n";
    $message = $watzap->sendMessage(
        '628123456789',
        'Halo! Ini adalah pesan dari WatzapClient.',
        true // tunggu sampai pesan terkirim
    );
    print_r($message);
    die;

    // 4. Kirim gambar dengan caption
    echo "\nMengirim gambar dengan caption...\n";
    $imageMessage = $watzap->sendImage(
        '628123456789',
        'https://example.com/image.jpg',
        'Ini adalah caption untuk gambar'
    );
    print_r($imageMessage);
    die;

    // 5. Ambil daftar grup
    echo "\nMengambil daftar grup...\n";
    $groups = $watzap->getGroups();
    print_r($groups);
    die;

    // 6. Kirim pesan ke grup (gunakan ID grup dari hasil getGroups)
    echo "\nMengirim pesan ke grup...\n";
    $groupMessage = $watzap->sendGroupMessage(
        'GROUP-ID@g.us',
        'Halo semua! Ini adalah pesan grup dari WatzapClient.'
    );
    print_r($groupMessage);
    die;

} catch (ApiException $e) {
    echo "Terjadi kesalahan:\n";
    echo "- Pesan: " . $e->getMessage() . "\n";
    echo "- HTTP Status: " . $e->getHttpStatusCode() . "\n";
    echo "- Response Body: " . $e->getResponseBody() . "\n";
}
