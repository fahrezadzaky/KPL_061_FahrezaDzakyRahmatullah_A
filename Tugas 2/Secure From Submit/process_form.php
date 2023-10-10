<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifikasi reCAPTCHA
    $recaptchaSecretKey = "6LfaG44oAAAAADNND2LGZudhpOqmephEvyiigQfW";
    $recaptchaResponse = $_POST['g-recaptcha-response'];
    $url = 'https://www.google.com/recaptcha/api/siteverify';
    $data = [
        'secret' => $recaptchaSecretKey,
        'response' => $recaptchaResponse,
        'remoteip' => $_SERVER['REMOTE_ADDR']
    ];

    $options = [
        'http' => [
            'header' => "Content-type: application/x-www-form-urlencoded\r\n",
            'method' => 'POST',
            'content' => http_build_query($data)
        ]
    ];

    $context = stream_context_create($options);
    $response = file_get_contents($url, false, $context);
    $result = json_decode($response);

    if (!$result->success) {
        die("reCAPTCHA verification failed. Please go back and try again.");
    }

    // Proses formulir jika reCAPTCHA valid
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Lakukan tindakan yang sesuai dengan formulir kontak di sini, misalnya, kirim email

    // Redirect ke halaman terima kasih
    header("Location: thank_you.php");
} else {
    // Jika bukan metode POST, tindakan lainnya di sini (mungkin redirect ke halaman formulir)
}
?>
