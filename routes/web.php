<?php
require '../vendor/autoload.php';
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
    $response =  json_decode($wallet->getBalance());
    $array = json_decode(json_encode($response), true);

    echo "The Balance of your wallet is ".$array['balance'] ."\n";
    echo("\n\t");
    echo " Your Unlocked Balance is " .$array['unlocked_balance'];
});

Route::get('/getAddress', function () {
    $wallet = new Superior\Wallet();
    $hostname = '127.0.0.1';
    $port = '16037';
    $wallet = new Superior\Wallet($hostname, $port);
    $response =  json_decode($wallet->getAddress());
    $array = json_decode(json_encode($response), true);
    echo "The Hash of your Address is  ".$array['address'];


});

Route::post('/transfer', function () {
    $wallet = new Superior\Wallet();
    $hostname = '127.0.0.1';
    $port = '16037';
    $wallet = new Superior\Wallet($hostname, $port);
    $options = [
        'destinations' => (object)[
        'amount' => $_POST['amount'],
        'address' => $_POST['address']
        ]
       ];
    
    $response =  json_decode( $wallet->transfer($options));
    $array = json_decode(json_encode($response), true);

    print_r ($array);
});
//transferSplit
Route::post('/transferSplit', function() {
    $wallet = new Superior\Wallet();
    $hostname = '127.0.0.1';
    $port = '16037';
    $wallet = new Superior\Wallet($hostname, $port);
    $options = [
        'destinations' => (object)[
        'amount' => $_POST['amount'],
        'address' => $_POST['address']
        ]
       ];
    $response =  json_decode($wallet->transferSplit($options));
    $array = json_decode(json_encode($response), true);
    print_r ($array);
   // echo "The List of transaction ".$array['tx_hash_list'];    
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

