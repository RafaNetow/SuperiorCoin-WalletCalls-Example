<!DOCTYPE html>
<html>
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  body {
      position: relative; 
  }
  #section1 {padding-top:50px;height:500px;color: #fff; background-color: #1E88E5;}
  #section2 {padding-top:50px;height:500px;color: #fff; background-color: #673ab7;}
  #section3 {padding-top:50px;height:500px;color: #fff; background-color: #ff9800;}
  #section4 {padding-top:50px;height:500px;color: #fff; background-color: #00bcd4;}
  #section42 {padding-top:50px;height:500px;color: #fff; background-color: #009688;}
  </style>
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="50">

<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand text-warning" href="#">Superior Coin</a>
    </div>
    <div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
          <li><a href="#section1">Balance</a></li>
          <li><a href="#section2">Address</a></li>
          <li><a href="#section3">Normal Transfer</a></li>
          <li><a href="#section4">SplitTransfer</a></li>
        </ul>
      </div>
    </div>
  </div>
</nav>    

<div id="section1" class="container-fluid">
  <h1>Get your Balance</h1>
  <p>Return Return the wallet's balance.
        Inputs: None.
        Outputs:balance - unsigned int; The total balance of the current monero-wallet-rpc in session. 
        unlocked_balance - unsigned int; Unlocked funds are those funds that are sufficiently deep enough 
        in the Monero blockchain to be considered safe to spend.</p>
    <footer>Superior Coin</footer>
  <a href="/getBalance" class="btn btn-info pull-right">Call</a>
</div>
<div id="section2" class="container-fluid">
  <h1>Get your Address</h1>
  <p>Return the wallet's address.
    Inputs: None.
    Outputs:
    address - string; The 95-character hex address string of the monero-wallet-rpc in session.</p>
    <a href="/getAddress" class="btn btn-info pull-right">Call</a>
</div>
<div id="section3" class="container-fluid">
  <h1>Make normal Transfer</h1>
  <form  action ="/transfer" method="POST">
  <label for="formGroupExampleInput">Adddres</label>
  <input name="address"type="text" class="form-control"  placeholder="Address">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <label for="formGroupExampleInput2">Amount</label>
  <input name="amount" type="text" class="form-control"  placeholder="Amount">

  <input class="btn btn-info pull-right" type="submit">
</form>
</div>
<div id="section4" class="container-fluid">
<h1>Split your transfer</h1>
<form  action ="/transferSplit" method="POST">
  <label for="formGroupExampleInput">Adddres</label>
  <input name="address"type="text" class="form-control"  placeholder="Address">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <label for="formGroupExampleInput2">Amount</label>
  <input name="amount" type="text" class="form-control"  placeholder="Amount">
  <input class="btn btn-info pull-right" type="submit">
</form>

</div>


</body>
</html>

  


