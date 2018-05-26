<?php
require '../vendor/autoload.php';
use Superior\Wallet;
use PhpParser\Node\Stmt\Echo_;
use function GuzzleHttp\json_decode;
use function Graze\GuzzleHttp\JsonRpc\json_encode;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});


Route::get('/getBalance', function () {
    $wallet = new Superior\Wallet();
    $hostname = '127.0.0.1';
    $port = '16037';
    $wallet = new Superior\Wallet($hostname, $port);
    $balance = $wallet->getBalance();
    $response =  json_decode($wallet->getBalance());
    $array = json_decode(json_encode($response), true);
    echo "The Balance of your wallet is ".$array['balance'];
    echo "Your Unlocked Balance is" .$array['unlocked_balance'];
    print_r ($array);
});

Route::get('/getAddres', function () {
    $wallet = new Superior\Wallet();
    $hostname = '127.0.0.1';
    $port = '16037';
    $wallet = new Superior\Wallet($hostname, $port);
    $response =  json_decode($wallet->getBalance());
    $array = json_decode(json_encode($response), true);
    echo "The Hash of your Address is  ".$array['address'];
    print_r ($array);

});

Route::get('/transfer/{options}', function () {
    $wallet = new Superior\Wallet();
    $hostname = '127.0.0.1';
    $port = '16037';
    $wallet = new Superior\Wallet($hostname, $port);
    $options = Route::current()->options;
    $response =  json_decode($tx_hash = $wallet->transfer($options));
    $array = json_decode(json_encode($response), true);
    echo "The hash of transaction is ".$array['tx_hash'];
    print_r ($array);
});

Route::get('/transferSplit/{options}', function() {
    $wallet = new Superior\Wallet();
    $hostname = '127.0.0.1';
    $port = '16037';
    $wallet = new Superior\Wallet($hostname, $port);
    $options = Route::current()->options;
    $response =  json_decode($tx_hash = $wallet->transfer($options));
    $array = json_decode(json_encode($response), true);
    echo "The List of transaction ".$array['tx_hash_list'];    
});

Route::get('/getBulkPayments/{payment_id}{height}', function() {
    $wallet = new Superior\Wallet();
    $hostname = '127.0.0.1';
    $port = '16037';
    $wallet = new Superior\Wallet($hostname, $port);
    $payment_id = Route::current()->payment_id;
    $height = Route::current()->height;
    $payments = $wallet->getBulkPayments($payment_id, $height);
    $response =  json_decode($wallet->getBulkPayments($payment_id, $height));
    $array = json_decode(json_encode($response), true);
    echo "The paymants are ".$array['']; 
});

