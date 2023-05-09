<?php 
require_once "vendor/autoload.php";
require_once "admin/include/function.php";
// Set your Merchant Server Key
\Midtrans\Config::$serverKey = 'SB-Mid-server-C3lYocT94AWARbz1IMDL0JdX';
// Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
\Midtrans\Config::$isProduction = false;
// Set sanitization on (default)
\Midtrans\Config::$isSanitized = true;
// Set 3DS transaction for credit card to true
\Midtrans\Config::$is3ds = true;

$notif = new \Midtrans\Notification();

$transaction = $notif->transaction_status;


if($transaction === strtolower('SETTLEMENT')){
    mysqli_query($koneksi, "UPDATE tagihan SET STATUS = 1 where id_tagihan = '$notif->order_id'");
    echo 'PEMBAYARAN BERHASIL ORDER ID '. $notif->order_id. ' - '. $transaction;
}



?>
