<?php
require '../vendor/autoload.php';
use Superior\Wallet;

$wallet = new Superior\Wallet();
$hostname = '127.0.0.1';
$port = '16037';
$wallet = new Superior\Wallet($hostname, $port);


Route::get('/', function () {
    return view('welcome');
});


Route::get('/getBalance', function () {
    $balance = $wallet->getBalance();
    echo json_encode($balance);

});
