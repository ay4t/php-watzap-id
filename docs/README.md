# Dokumentasi API Watzap.id

## Informasi Dasar
- Base URL: https://api.watzap.id/v1
- Format Data: JSON

## Prasyarat
1. API Key (dapat diambil di Member Area Integration > API Key & Apps)
2. Pengiriman data menggunakan format JSON

## Kode Response
| Kode | Deskripsi |
|------|-----------|
| 200  | Success |
| 1002 | Invalid API Key |
| 1003 | Invalid Number Key |
| 1004 | Pairing Failed, Access Denied |
| 1005 | Fatal Error with Dynamic Message |
| 1006 | Other Error |

## Endpoints


### Check API Status

#### Check API Status
- Method: `POST`
- URL: `https://api.watzap.id/v1/checking_key`

<p>Endpoint <strong>checking_key</strong> berguna untuk mengecek status API Key Anda, Apakah masih VALID atau TIDAK.</p>
<p>Contoh Script PHP:</p>
<pre class="click-to-expand-wrapper is-snippet-wrapper"><code class="language-php">$dataSending = Array();
$dataSending["api-key"] = "xxxx";
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL =&gt; 'https://api.watzap.id/v1/checking_key',
  CURLOPT_RETURNTRANSFER =&gt; true,
  CURLOPT_ENCODING =&gt; '',
  CURLOPT_MAXREDIRS =&gt; 10,
  CURLOPT_TIMEOUT =&gt; 0,
  CURLOPT_FOLLOWLOCATION =&gt; true,
  CURLOPT_HTTP_VERSION =&gt; CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST =&gt; 'POST',
  CURLOPT_POSTFIELDS =&gt; json_encode($dataSending),
  CURLOPT_HTTPHEADER =&gt; array(
    'Content-Type: application/json'
  ),
));
$response = curl_exec($curl);
curl_close($curl);
echo $response;

</code></pre>


**Headers:**
- `Content-Type`: application/json

**Request Body:**
```json
{
    "api_key": "YOUR-API-KEY"
}
```

**Response Example:**
```json
{
    "data": {
        "id": "XXXXXXXX",
        "name": "WatZap.id",
        "email": "yourmail@mail.com",
        "expires_on": "27 April 2022 (41 days remaining)",
        "plan": "WatZap Premium",
        "total_legacy_licenses": "AMOUNT OF LEGACY NUMBER AVAILABLE",
        "licenses_key": [
            {
                "id": "YOUR-NUMBERID",
                "key": "YOUR-KEY",
                "plan": "WatZap Premium",
                "active_from": "2021-05-04 00:00:00",
                "active_until": "2022-04-27 00:00:00",
                "limit_message_per_day": 0,
                "expires_on": "27 April 2022 (41 days remaining)",
                "limit_domain": "Unlimited",
                "wa_number": "628XXXXXXXX",
                "is_connected": true
            }
        ]
    },
    "status": true,
    "message": "Successfully"
}
```

---

### Validate WhatsApp Number

#### Validate WhatsApp Number
- Method: `POST`
- URL: `https://api.watzap.id/v1/validate_number`

<p>Endpoint ini berfungsi untuk mengecek suatu nomor apakah telah terdaftar di WhatsApp atau belum.</p>
<p>Untuk parameter <strong>Number Key</strong> bisa anda dapatkan juga pada halaman API Key &amp; Apps pada section Assigned Numbers for API</p>
<p>Contoh Script PHP:</p>
<pre class="click-to-expand-wrapper is-snippet-wrapper"><code class="language-php">$dataSending = Array();
$dataSending["api_key"] = "xxxx";
$dataSending["number_key"] = "xxxx";
$dataSending["phone_no"] = "628xxxx";
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL =&gt; 'https://api.watzap.id/v1/validate_number',
  CURLOPT_RETURNTRANSFER =&gt; true,
  CURLOPT_ENCODING =&gt; '',
  CURLOPT_MAXREDIRS =&gt; 10,
  CURLOPT_TIMEOUT =&gt; 0,
  CURLOPT_FOLLOWLOCATION =&gt; true,
  CURLOPT_HTTP_VERSION =&gt; CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST =&gt; 'POST',
  CURLOPT_POSTFIELDS =&gt; json_encode($dataSending),
  CURLOPT_HTTPHEADER =&gt; array(
    'Content-Type: application/json'
  ),
));
$response = curl_exec($curl);
curl_close($curl);
echo $response;

</code></pre>


**Headers:**
- `Content-Type`: application/json

**Request Body:**
```json
{
    "api_key": "YOUR-API-KEY",
    "number_key": "YOUR-NUMBER-KEY",
    "phone_no": "628xxxx"
}
```

**Response Example:**
```json
{
    "status": "200",
    "message": "Valid WhatsApp Number",
    "ack": "successfully"
}
```

---

### Group Contact Grabber

#### Group Contact Grabber
- Method: `POST`
- URL: `https://api.watzap.id/v1/groups`

<p>Enpoint ini befungsi untuk mendapatkan List Group yang ada pada WhatsApp anda.</p>
<p>Untuk parameter Number Key bisa anda dapatkan juga pada halaman API Key &amp; Apps pada section Assigned Numbers for API</p>
<p>Contoh Script PHP:</p>
<pre class="click-to-expand-wrapper is-snippet-wrapper"><code class="language-php">$dataSending = Array();
$dataSending["api_key"] = "xxxx";
$dataSending["number_key"] = "xxxx";
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL =&gt; 'https://api.watzap.id/v1/groups',
  CURLOPT_RETURNTRANSFER =&gt; true,
  CURLOPT_ENCODING =&gt; '',
  CURLOPT_MAXREDIRS =&gt; 10,
  CURLOPT_TIMEOUT =&gt; 0,
  CURLOPT_FOLLOWLOCATION =&gt; true,
  CURLOPT_HTTP_VERSION =&gt; CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST =&gt; 'POST',
  CURLOPT_POSTFIELDS =&gt; json_encode($dataSending),
  CURLOPT_HTTPHEADER =&gt; array(
    'Content-Type: application/json'
  ),
));
$response = curl_exec($curl);
curl_close($curl);
echo $response;

</code></pre>


**Headers:**
- `Content-Type`: application/json

**Request Body:**
```json
{
    "api_key": "YOUR-API-KEY",
    "number_key": "YOUR-NUMBER-KEY"
}
```

**Response Example:**
```json
{
    "status": "200",
    "ack": "successfully",
    "message": "Received (1) Groups",
    "groups": {
        "xxxxxxxxxxx@g.us": {
            "name": "Example Group",
            "participants": [
                {
                    "iscontact": false,
                    "name": "Participants A",
                    "number": "628xxxxxxx",
                    "role": "admin",
                    "groupname": "Example Group",
                    "groupid": "xxxxxxxxxxx@g.us"
                },
                {
                    "iscontact": false,
                    "name": "Participants B",
                    "number": "628xxxxxxx",
                    "role": "participants",
                    "groupname": "Example Group",
                    "groupid": "xxxxxxxxxxx@g.us"
                },
                {
                    "iscontact": false,
                    "name": "Participants C",
                    "number": "628xxxxxxx",
                    "role": "participants",
                    "groupname": "Example Group",
                    "groupid": "xxxxxxxxxxx@g.us"
                },
            ]
        }
    }
}
```

---

### Send Text Message

#### Send Text Message
- Method: `POST`
- URL: `https://api.watzap.id/v1/send_message`

<p>Endpoint ini berfungsi untuk mengirim pesan teks only yang berisi konten promosi atau pesan yang ingin anda kirimkan kepada pengguna WhatsApp lain.</p>
<p>Untuk parameter <strong>Number Key</strong> bisa anda dapatkan juga pada halaman API Key &amp; Apps pada section Assigned Numbers for API</p>
<p>Contoh Script PHP:</p>
<pre class="click-to-expand-wrapper is-snippet-wrapper"><code class="language-php">$dataSending = Array();
$dataSending["api_key"] = "xxxx";
$dataSending["number_key"] = "xxxx";
$dataSending["phone_no"] = "628xxxx";
$dataSending["message"] = "YOUR-MESSAGE";
$dataSending["wait_until_send"] = "1"; //This is an optional parameter, if you use this parameter the response will appear after sending the message is complete
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL =&gt; 'https://api.watzap.id/v1/send_message',
  CURLOPT_RETURNTRANSFER =&gt; true,
  CURLOPT_ENCODING =&gt; '',
  CURLOPT_MAXREDIRS =&gt; 10,
  CURLOPT_TIMEOUT =&gt; 0,
  CURLOPT_FOLLOWLOCATION =&gt; true,
  CURLOPT_HTTP_VERSION =&gt; CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST =&gt; 'POST',
  CURLOPT_POSTFIELDS =&gt; json_encode($dataSending),
  CURLOPT_HTTPHEADER =&gt; array(
    'Content-Type: application/json'
  ),
));
$response = curl_exec($curl);
curl_close($curl);
echo $response;

</code></pre>


**Headers:**
- `Content-Type`: application/json

**Request Body:**
```json
{
    "api_key": "YOUR-API-KEY",
    "number_key": "YOUR-NUMBER-KEY",
    "phone_no": "628xxxx",
    "message": "YOUR-MESSAGE",
    "wait_until_send": "1" //Optional Parameter, If you use this parameter, the response will appear after sending the message is complete
}
```

**Response Example:**
```json
{
    "status": "200",
    "message": "Successfully",
    "ack": "successfully"
}
```

---

### Send Image (Caption)

#### Send Image (Caption)
- Method: `POST`
- URL: `https://api.watzap.id/v1/send_image_url`

<p>Endpoint ini berfungsi untuk mengirim pesan teks berserta gambar ataupun hanya gambar yang berisi konten promosi atau pesan yang ingin anda kirimkan kepada pengguna WhatsApp lain.</p>
<p>Untuk parameter <strong>Number Key</strong> bisa anda dapatkan juga pada halaman API Key &amp; Apps pada section Assigned Numbers for API</p>
<p>Contoh Script PHP:</p>
<pre class="click-to-expand-wrapper is-snippet-wrapper"><code class="language-php">$dataSending = Array();
$dataSending["api_key"] = "xxxx";
$dataSending["number_key"] = "xxxx";
$dataSending["phone_no"] = "628xxxx";
$dataSending["message"] = "YOUR-MESSAGE";
$dataSending["url"] = "YOUR-PUBLIC-IMAGE-URL";
$dataSending["separate_caption"] = "(0 for No, 1 for Yes)";
$dataSending["wait_until_send"] = "1"; //This is an optional parameter, if you use this parameter the response will appear after sending the message is complete
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL =&gt; 'https://api.watzap.id/v1/send_image_url',
  CURLOPT_RETURNTRANSFER =&gt; true,
  CURLOPT_ENCODING =&gt; '',
  CURLOPT_MAXREDIRS =&gt; 10,
  CURLOPT_TIMEOUT =&gt; 0,
  CURLOPT_FOLLOWLOCATION =&gt; true,
  CURLOPT_HTTP_VERSION =&gt; CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST =&gt; 'POST',
  CURLOPT_POSTFIELDS =&gt; json_encode($dataSending),
  CURLOPT_HTTPHEADER =&gt; array(
    'Content-Type: application/json'
  ),
));
$response = curl_exec($curl);
curl_close($curl);
echo $response;

</code></pre>


**Headers:**
- `Content-Type`: application/json

**Request Body:**
```json
{
    "api_key": "YOUR-API-KEY",
    "number_key": "YOUR-NUMBER-KEY",
    "phone_no": "628xxxx",
    "url": "YOUR-PUBLIC-IMAGE-URL",
    "message": "YOUR-MESSAGE",
    "separate_caption": "(0 for No, 1 for Yes)",
    "wait_until_send": "1" //Optional Parameter, If you use this parameter, the response will appear after sending the message is complete
}
```

**Response Example:**
```json
{
    "status": "200",
    "message": "Successfully",
    "ack": "successfully"
}
```

---

### Send File

#### Send File
- Method: `POST`
- URL: `https://api.watzap.id/v1/send_file_url`

<p>Endpoint ini berfungsi untuk mengirim pesan file yang memiliki format pdf/word/excel/csv/video/gambar yang ingin anda kirimkan kepada pengguna WhatsApp lain.</p>
<p>Untuk parameter <strong>Number Key</strong> bisa anda dapatkan juga pada halaman API Key &amp; Apps pada section Assigned Numbers for API</p>
<p>Contoh Script PHP:</p>
<pre class="click-to-expand-wrapper is-snippet-wrapper"><code class="language-php">$dataSending = Array();
$dataSending["api_key"] = "xxxx";
$dataSending["number_key"] = "xxxx";
$dataSending["phone_no"] = "628xxxx";
$dataSending["url"] = "YOUR-PUBLIC-FILE-URL";
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL =&gt; 'https://api.watzap.id/v1/send_image_url',
  CURLOPT_RETURNTRANSFER =&gt; true,
  CURLOPT_ENCODING =&gt; '',
  CURLOPT_MAXREDIRS =&gt; 10,
  CURLOPT_TIMEOUT =&gt; 0,
  CURLOPT_FOLLOWLOCATION =&gt; true,
  CURLOPT_HTTP_VERSION =&gt; CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST =&gt; 'POST',
  CURLOPT_POSTFIELDS =&gt; json_encode($dataSending),
  CURLOPT_HTTPHEADER =&gt; array(
    'Content-Type: application/json'
  ),
));
$response = curl_exec($curl);
curl_close($curl);
echo $response;

</code></pre>


**Headers:**
- `Content-Type`: application/json

**Request Body:**
```json
{
    "api_key": "YOUR-API-KEY",
    "number_key": "YOUR-NUMBER-KEY",
    "phone_no": "628xxxx",
    "url": "YOUR-PUBLIC-FILE-URL"
}
```

**Response Example:**
```json
{
    "status": "200",
    "message": "Successfully",
    "ack": "successfully"
}
```

---

### Send Text Message (Group)

#### Send Text Message (Group)
- Method: `POST`
- URL: `https://api.watzap.id/v1/send_message_group`

<p>Endpoint ini berfungsi untuk mengirim pesan teks only yang berisi konten promosi atau pesan yang akan dikirim ke Group yang anda inginkan.</p>
<p>Untuk parameter <strong>Number Key</strong> bisa anda dapatkan juga pada halaman API Key &amp; Apps pada section Assigned Numbers for API</p>
<p>Contoh Script PHP:</p>
<pre class="click-to-expand-wrapper is-snippet-wrapper"><code class="language-php">$dataSending = Array();
$dataSending["api_key"] = "xxxx";
$dataSending["number_key"] = "xxxx";
$dataSending["group_id"] = "xxxxxxx@g.us";
$dataSending["message"] = "YOUR-MESSAGE";
$dataSending["wait_until_send"] = "1"; //This is an optional parameter, if you use this parameter the response will appear after sending the message is complete
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL =&gt; 'https://api.watzap.id/v1/send_message_group',
  CURLOPT_RETURNTRANSFER =&gt; true,
  CURLOPT_ENCODING =&gt; '',
  CURLOPT_MAXREDIRS =&gt; 10,
  CURLOPT_TIMEOUT =&gt; 0,
  CURLOPT_FOLLOWLOCATION =&gt; true,
  CURLOPT_HTTP_VERSION =&gt; CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST =&gt; 'POST',
  CURLOPT_POSTFIELDS =&gt; json_encode($dataSending),
  CURLOPT_HTTPHEADER =&gt; array(
    'Content-Type: application/json'
  ),
));
$response = curl_exec($curl);
curl_close($curl);
echo $response;

</code></pre>


**Headers:**
- `Content-Type`: application/json

**Request Body:**
```json
{
    "api_key": "YOUR-API-KEY",
    "number_key": "YOUR-NUMBER-KEY",
    "group_id": "xxxxxxx@g.us",
    "message": "YOUR-MESSAGE",
    "wait_until_send": "1" //Optional Parameter, If you use this parameter, the response will appear after sending the message is complete
}
```

**Response Example:**
```json
{
    "status": "200",
    "message": "Successfully",
    "ack": "successfully"
}
```

---

### Send Image (Group)

#### Send Image (Group)
- Method: `POST`
- URL: `https://api.watzap.id/v1/send_image_group`

<p>Endpoint ini berfungsi untuk mengirim pesan teks berserta gambar ataupun hanya gambar yang berisi konten promosi atau pesan yang akan dikirim ke Group yang anda inginkan.</p>
<p>Untuk parameter <strong>Number Key</strong> bisa anda dapatkan juga pada halaman API Key &amp; Apps pada section Assigned Numbers for API</p>
<p>Contoh Script PHP:</p>
<pre class="click-to-expand-wrapper is-snippet-wrapper"><code class="language-php">$dataSending = Array();
$dataSending["api_key"] = "xxxx";
$dataSending["number_key"] = "xxxx";
$dataSending["group_id"] = "xxxxxxx@g.us";
$dataSending["message"] = "YOUR-MESSAGE";
$dataSending["url"] = "YOUR-PUBLIC-IMAGE-URL";
$dataSending["separate_caption"] = "(0 for No, 1 for Yes)";
$dataSending["wait_until_send"] = "1"; //This is an optional parameter, if you use this parameter the response will appear after sending the message is complete
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL =&gt; 'https://api.watzap.id/v1/send_image_group',
  CURLOPT_RETURNTRANSFER =&gt; true,
  CURLOPT_ENCODING =&gt; '',
  CURLOPT_MAXREDIRS =&gt; 10,
  CURLOPT_TIMEOUT =&gt; 0,
  CURLOPT_FOLLOWLOCATION =&gt; true,
  CURLOPT_HTTP_VERSION =&gt; CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST =&gt; 'POST',
  CURLOPT_POSTFIELDS =&gt; json_encode($dataSending),
  CURLOPT_HTTPHEADER =&gt; array(
    'Content-Type: application/json'
  ),
));
$response = curl_exec($curl);
curl_close($curl);
echo $response;

</code></pre>


**Headers:**
- `Content-Type`: application/json

**Request Body:**
```json
{
    "api_key": "YOUR-API-KEY",
    "number_key": "YOUR-NUMBER-KEY",
    "group_id": "xxxxxxx@g.us",
    "url": "YOUR-PUBLIC-IMAGE-URL",
    "message": "YOUR-MESSAGE",
    "separate_caption": "(0 for No, 1 for Yes)",
    "wait_until_send": "1" //Optional Parameter, If you use this parameter, the response will appear after sending the message is complete
}
```

**Response Example:**
```json
{
    "status": "200",
    "message": "Successfully",
    "ack": "successfully"
}
```

---

### Send File (Group)

#### Send File (Group)
- Method: `POST`
- URL: `https://api.watzap.id/v1/send_file_group`

<p>Endpoint ini berfungsi untuk mengirim pesan file yang memiliki format pdf/word/excel/csv/video/gambar yang akan dikirim ke Group yang anda inginkan.</p>
<p>Untuk parameter <strong>Number Key</strong> bisa anda dapatkan juga pada halaman API Key &amp; Apps pada section Assigned Numbers for API</p>
<p>Contoh Script PHP:</p>
<pre class="click-to-expand-wrapper is-snippet-wrapper"><code class="language-php">$dataSending = Array();
$dataSending["api_key"] = "xxxx";
$dataSending["number_key"] = "xxxx";
$dataSending["group_id"] = "xxxxxxx@g.us";
$dataSending["url"] = "YOUR-PUBLIC-FILE-URL";
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL =&gt; 'https://api.watzap.id/v1/send_file_group',
  CURLOPT_RETURNTRANSFER =&gt; true,
  CURLOPT_ENCODING =&gt; '',
  CURLOPT_MAXREDIRS =&gt; 10,
  CURLOPT_TIMEOUT =&gt; 0,
  CURLOPT_FOLLOWLOCATION =&gt; true,
  CURLOPT_HTTP_VERSION =&gt; CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST =&gt; 'POST',
  CURLOPT_POSTFIELDS =&gt; json_encode($dataSending),
  CURLOPT_HTTPHEADER =&gt; array(
    'Content-Type: application/json'
  ),
));
$response = curl_exec($curl);
curl_close($curl);
echo $response;

</code></pre>


**Headers:**
- `Content-Type`: application/json

**Request Body:**
```json
{
    "api_key": "YOUR-API-KEY",
    "number_key": "YOUR-NUMBER-KEY",
    "group_id": "xxxxxxx@g.us",
    "url": "YOUR-PUBLIC-FILE-URL"
}
```

**Response Example:**
```json
{
    "status": "200",
    "message": "Successfully",
    "ack": "successfully"
}
```

---

### Set Web Hook

#### Set Web Hook
- Method: `POST`
- URL: `https://api.watzap.id/v1/set_webhook`

<p>Endpoint ini berfungsi untuk mengatur Web Hook.</p>
<p>Untuk parameter <strong>Number Key</strong> bisa anda dapatkan juga pada halaman API Key &amp; Apps pada section Assigned Numbers for API</p>
<p>Contoh Script PHP:</p>
<pre class="click-to-expand-wrapper is-snippet-wrapper"><code class="language-php">$dataSending = Array();
$dataSending["api_key"] = "xxxx";
$dataSending["number_key"] = "xxxx";
$dataSending["endpoint_url"] = "yoursite.com";
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL =&gt; 'https://api.watzap.id/v1/set_webhook',
  CURLOPT_RETURNTRANSFER =&gt; true,
  CURLOPT_ENCODING =&gt; '',
  CURLOPT_MAXREDIRS =&gt; 10,
  CURLOPT_TIMEOUT =&gt; 0,
  CURLOPT_FOLLOWLOCATION =&gt; true,
  CURLOPT_HTTP_VERSION =&gt; CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST =&gt; 'POST',
  CURLOPT_POSTFIELDS =&gt; json_encode($dataSending),
  CURLOPT_HTTPHEADER =&gt; array(
    'Content-Type: application/json'
  ),
));
$response = curl_exec($curl);
curl_close($curl);
echo $response;

</code></pre>


**Headers:**
- `Content-Type`: application/json

**Request Body:**
```json
{
    "api_key": "YOUR-API-KEY",
    "number_key": "YOUR-NUMBER-KEY",
    "endpoint_url": "YOUR-ENDPOINT-URL"
}
```

**Response Example:**
```json
{
    "status": "200",
    "message": "Sucessfully set Web Hook to url: https://yoursite.com/webhook_receiver.php",
    "ack": "successfully"
}
```

---

### Get Web Hook

#### Get Web Hook
- Method: `POST`
- URL: `https://api.watzap.id/v1/get_webhook`

<p>Endpoint ini berfungsi untuk melihat Web Hook yang telah di set.</p>
<p>Untuk parameter <strong>Number Key</strong> bisa anda dapatkan juga pada halaman API Key &amp; Apps pada section Assigned Numbers for API</p>
<p>Contoh Script PHP:</p>
<pre class="click-to-expand-wrapper is-snippet-wrapper"><code class="language-php">$dataSending = Array();
$dataSending["api_key"] = "xxxx";
$dataSending["number_key"] = "xxxx";
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL =&gt; 'https://api.watzap.id/v1/get_webhook',
  CURLOPT_RETURNTRANSFER =&gt; true,
  CURLOPT_ENCODING =&gt; '',
  CURLOPT_MAXREDIRS =&gt; 10,
  CURLOPT_TIMEOUT =&gt; 0,
  CURLOPT_FOLLOWLOCATION =&gt; true,
  CURLOPT_HTTP_VERSION =&gt; CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST =&gt; 'POST',
  CURLOPT_POSTFIELDS =&gt; json_encode($dataSending),
  CURLOPT_HTTPHEADER =&gt; array(
    'Content-Type: application/json'
  ),
));
$response = curl_exec($curl);
curl_close($curl);
echo $response;

</code></pre>


**Headers:**
- `Content-Type`: application/json

**Request Body:**
```json
{
    "api_key": "YOUR-API-KEY",
    "number_key": "YOUR-NUMBER-KEY"
}
```

**Response Example:**
```json
{
    "status": "200",
    "message": "https://yoursite.com/webhook_receiver.php",
    "ack": "successfully"
}
```

---

### Unset Web Hook

#### Unset Web Hook
- Method: `POST`
- URL: `https://api.watzap.id/v1/unset_webhook`

<p>Endpoint ini berfungsi untuk menghapus Web Hook yang telah di set.</p>
<p>Untuk parameter <strong>Number Key</strong> bisa anda dapatkan juga pada halaman API Key &amp; Apps pada section Assigned Numbers for API</p>
<p>Contoh Script PHP:</p>
<pre class="click-to-expand-wrapper is-snippet-wrapper"><code class="language-php">$dataSending = Array();
$dataSending["api_key"] = "xxxx";
$dataSending["number_key"] = "xxxx";
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL =&gt; 'https://api.watzap.id/v1/unset_webhook',
  CURLOPT_RETURNTRANSFER =&gt; true,
  CURLOPT_ENCODING =&gt; '',
  CURLOPT_MAXREDIRS =&gt; 10,
  CURLOPT_TIMEOUT =&gt; 0,
  CURLOPT_FOLLOWLOCATION =&gt; true,
  CURLOPT_HTTP_VERSION =&gt; CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST =&gt; 'POST',
  CURLOPT_POSTFIELDS =&gt; json_encode($dataSending),
  CURLOPT_HTTPHEADER =&gt; array(
    'Content-Type: application/json'
  ),
));
$response = curl_exec($curl);
curl_close($curl);
echo $response;

</code></pre>


**Headers:**
- `Content-Type`: application/json

**Request Body:**
```json
{
    "api_key": "YOUR-API-KEY",
    "number_key": "YOUR-NUMBER-KEY"
}
```

**Response Example:**
```json
{
    "status": "200",
    "message": "Successfully Unset Web Hook",
    "ack": "successfully"
}
```

---

### Example Web Hook Request

#### Example Web Hook Request
- Method: `POST`
- URL: `https://yoursite.com/webhook_receiver.php`

<p>Untuk URL WebHook anda bisa membuatnya terlebih dahulu dengan metode penerimaan data POST Json Raw</p>


**Headers:**
- `Content-Type`: application/json

**Request Body:**
```json
{
    "type": "incoming_chat",
    "data": {
        "chat_id": "XXXXXXXXX",
        "message_id": "XXXXXXXXX",
        "name": "Nitami",
        "profile_picture": "https://example.com",
        "timestamp": 9283828329,
        "message_body": "Hi There",
        "message_ack": "PENDING",
        "has_media": false,
        "media_mime": "",
        "media_name": "",
        "location_attached": {
            "lat": null,
            "lng": null
        },
        "is_forwading": false,
        "is_from_me": false
    }
}
```

---

## Raw Data
Semua data mentah tersimpan di folder `raw/` dengan timestamp. Data yang tersimpan meliputi:
- HTML halaman utama
- Response headers dari setiap request
- Metadata API
- Data collection API

## Penggunaan
Dokumentasi lengkap tersimpan dalam file `watzap_api_docs.json`
