<?php
require '../vendor/autoload.php';
use Superior\Wallet;
use PhpParser\Node\Stmt\Echo_;
use function GuzzleHttp\json_decode;
use function Graze\GuzzleHttp\JsonRpc\json_encode;



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
    echo
    print_r ($array);

   // echo $array;

   
   // return Redirect::to('user/login')->with('message', 'Login Failed');
});
