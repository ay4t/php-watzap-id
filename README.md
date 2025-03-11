# 📱 PHP Watzap.id Client

Library PHP untuk integrasi dengan layanan Watzap.id API. Dibuat dengan menggunakan [ay4t/php-rest-client](https://github.com/ay4t/php-rest-client) untuk penanganan HTTP request yang lebih baik.

## 🚀 Fitur Utama

- ✨ Integrasi mudah dengan Watzap.id API
- 🔄 Retry otomatis untuk request yang gagal
- 📝 Sistem logging yang lengkap
- ⚡ Penanganan error yang komprehensif
- 🔒 Konfigurasi yang fleksibel

## 📦 Instalasi

Install melalui Composer:

```bash
composer require ay4t/php-watzap-id
```

## ⚙️ Konfigurasi

1. Buat file `.env` di root project Anda:

```env
API_KEY=your_api_key_here
NUMBER_KEY=your_number_key_here
```

2. Load konfigurasi dalam kode PHP Anda:

```php
use Dotenv\Dotenv;
use Ay4t\WatzapId\Config\WatzapConfig;
use Ay4t\WatzapId\WatzapClient;

// Load environment variables
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Inisialisasi konfigurasi
$config = new WatzapConfig();
$config->setApiKey($_ENV['API_KEY'])
       ->setNumberKey($_ENV['NUMBER_KEY']);

// Buat instance WatzapClient
$watzap = new WatzapClient($config);
```

## 📚 Penggunaan

### 🔍 Cek Status API

```php
try {
    $status = $watzap->checkApiStatus();
    print_r($status);
} catch (ApiException $e) {
    echo "Error: " . $e->getMessage();
}
```

### ✅ Validasi Nomor WhatsApp

```php
try {
    $validation = $watzap->validateNumber('628123456789');
    print_r($validation);
} catch (ApiException $e) {
    echo "Error: " . $e->getMessage();
}
```

### 💬 Kirim Pesan Teks

```php
try {
    $message = $watzap->sendMessage(
        '628123456789',
        'Halo! Ini adalah pesan dari WatzapClient.',
        true // tunggu sampai pesan terkirim
    );
    print_r($message);
} catch (ApiException $e) {
    echo "Error: " . $e->getMessage();
}
```

### 🖼️ Kirim Gambar dengan Caption

```php
try {
    $imageMessage = $watzap->sendImage(
        '628123456789',
        'https://example.com/image.jpg',
        'Caption untuk gambar'
    );
    print_r($imageMessage);
} catch (ApiException $e) {
    echo "Error: " . $e->getMessage();
}
```

### 👥 Fitur Grup

```php
// Ambil daftar grup
try {
    $groups = $watzap->getGroups();
    print_r($groups);
} catch (ApiException $e) {
    echo "Error: " . $e->getMessage();
}

// Kirim pesan ke grup
try {
    $groupMessage = $watzap->sendGroupMessage(
        'GROUP-ID@g.us',
        'Halo semua! Ini adalah pesan grup.'
    );
    print_r($groupMessage);
} catch (ApiException $e) {
    echo "Error: " . $e->getMessage();
}

// Kirim gambar ke grup
try {
    $groupImage = $watzap->sendGroupImage(
        'GROUP-ID@g.us',
        'https://example.com/image.jpg',
        'Caption untuk gambar grup'
    );
    print_r($groupImage);
} catch (ApiException $e) {
    echo "Error: " . $e->getMessage();
}
```

## 🛠️ Penanganan Error

Library ini menggunakan sistem exception untuk menangani error. Semua error akan melempar `ApiException` yang menyediakan informasi detail:

```php
try {
    $response = $watzap->sendMessage('628123456789', 'Pesan');
} catch (ApiException $e) {
    echo "Error Message: " . $e->getMessage() . "\n";
    echo "HTTP Status: " . $e->getHttpStatusCode() . "\n";
    echo "Response Body: " . $e->getResponseBody() . "\n";
}
```

## 📋 Persyaratan

- PHP >= 7.4
- Ekstensi PHP Curl
- Akun aktif di [Watzap.id](https://watzap.id)
- API Key dan Number Key dari Watzap.id

## 🤝 Kontribusi

Kontribusi sangat diterima! Silakan buat pull request untuk:
- 🐛 Perbaikan bug
- ✨ Fitur baru
- 📚 Perbaikan dokumentasi
- ⚡ Peningkatan performa

## 📄 Lisensi

Project ini dilisensikan di bawah [MIT License](LICENSE).
