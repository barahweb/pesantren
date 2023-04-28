<?php 
require_once "vendor/autoload.php";
require_once "admin/include/function.php";
// Set your Merchant Server Key
\Midtrans\Config::$serverKey = '<your server key>';
// Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
\Midtrans\Config::$isProduction = false;
// Set sanitization on (default)
\Midtrans\Config::$isSanitized = true;
// Set 3DS transaction for credit card to true
\Midtrans\Config::$is3ds = true;

$notif = new \Midtrans\Notification();

$transaction = $notif->transaction_status;


if($transaction === strtolower('SETTLEMENT')){
  mysqli_query($konekis, "UPDATE PEMBAYARAN SET STATUS = -1");
}


?>
