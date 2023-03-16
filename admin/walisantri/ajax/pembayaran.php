<?php
require_once "../../include/function.php";
require('../../../vendor/autoload.php');


// Set your Merchant Server Key
\Midtrans\Config::$serverKey = 'SB-Mid-server-1KSU2ePL_QSJU1bzB-g5-xKx';
// Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
\Midtrans\Config::$isProduction = false;
// Set sanitization on (default)
\Midtrans\Config::$isSanitized = true;
// Set 3DS transaction for credit card to true
\Midtrans\Config::$is3ds = true;


$idsantri = $_POST['idsantri'];


$walisantri = ambilData("SELECT wali_santri.* FROM wali_santri INNER JOIN santri USING(id_wali_santri) WHERE id_santri = {$idsantri}")[0];



$item_details[] = [
    "id" =>  "SNTR",
    "price" => HARGA,
    "quantity" => 1,
    "name" => "Pembayaran Santri Baru dan Kebutuhan"
];



$id = generateRandomString(15);

$transaction_details = array(
    'order_id' => $id,
    'gross_amount' => HARGA, // no decimal allowed for creditcard
);

// // Optional
// $item_details = array($item1_details, $item2_details);


// Optional
$billing_address = array(
    'first_name'    =>  $walisantri['nama'],
    'phone'         =>  $walisantri['no_hp'],
    'country_code'  => 'IDN'
);

// Optional
$shipping_address = array(
    'first_name'    =>  $walisantri['nama'],
    'phone'         =>  $walisantri['no_hp'],
    'country_code'  => 'IDN'
);

// Optional
$customer_details = array(
    'first_name'    => $walisantri['nama'],
    'email'         => $walisantri['email'],
    'phone'         => $walisantri['no_hp'],
    'billing_address'  => $billing_address,
    'shipping_address' => $shipping_address
);

// Fill SNAP API parameter
$params = array(
    'transaction_details' => $transaction_details,
    'customer_details' => $customer_details,
    'item_details' => $item_details,
);

try {
    // Get Snap Payment Page URL
    // $paymentUrl = Snap::createTransaction($params)->redirect_url;
    $snapToken = \Midtrans\Snap::getSnapToken($params);
    echo json_encode(['token' => $snapToken]);

    // Redirect to Snap Payment Page
    // header('Location: ' . $paymentUrl);
} catch (Exception $e) {
    echo $e->getMessage();
}
