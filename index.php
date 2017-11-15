<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="VGS-Dice - Provably Fair Dice Game, Open Source, Written by Nigel Todman">
    <meta name="author" content="Nigel Todman">
    <link rel="icon" href="/favicon.ico">
    <title>VGS-Dice - Provably Fair Dice Game, Open Source, Written by Nigel Todman</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <!-- Custom styles for this template 
    <link href="/starter-template.css" rel="stylesheet">-->
		<script type="text/javascript">
		bal = '';
		bet = document.getElementById('bet');
		odds = document.getElementById('odds');
		function toFixed(value, precision) {
		    var power = Math.pow(10, precision || 0);
		    return (Math.round(value * power) / power).toFixed(precision);
		}
		function sleep(ms) {
		  return new Promise(resolve => setTimeout(resolve, ms));
		}
		function add(){
		     bet = bet + 0.00000001;
		     document.getElementById('betdisplay').innerHTML = '<input type="text" formmethod="post" name="bet" id="bet" class="form-control input-sm" value="' + toFixed(bet,8) + ' BTC" min=0.00000001 max=0.01>';
		}
		function sub(){
		     bet = bet - 0.00000001;
		     document.getElementById('betdisplay').innerHTML = '<input type="text" formmethod="post" name="bet" id="bet" class="form-control input-sm" value="' + toFixed(bet,8) + ' BTC" min=0.00000001 max=0.01>';
		}
		function addodds(){
		     odds = odds + 2;
		     document.getElementById('oddsdisplay').innerHTML = '<input type="text" formmethod="post" id="odds" name="odds" class="form-control input-sm" value="' + toFixed(odds,2) + '" min="0.01" max="95"><p class="form-control-static">' + (toFixed(odds,2) / 25) + '</p>';
		}
		function subodds(){
		     odds = odds - 2;
		     document.getElementById('oddsdisplay').innerHTML = '<input type="text" formmethod="post" id="odds" name="odds" class="form-control input-sm" value="' + toFixed(odds,2) + '" min="0.01" max="95"><p class="form-control-static">' + (toFixed(odds,2) / 25) + '</p>';
		}
		function roll1(){
			document.getElementById('rollactiondiv').innerHTML = '<form enctype="multipart/form-data" action="http://www.nigeltodman.com/dev/index.php?roll=1" method="post" name="rollactionform" id="rollactionform">';
			rollactionform.submit();
		}
		function roll2(){
			document.getElementById('rollactiondiv').innerHTML = '<form enctype="multipart/form-data" action="http://www.nigeltodman.com/dev/index.php?roll=2" method="post" name="rollactionform" id="rollactionform">';
			rollactionform.submit();
		}
		function refill(){
			rollactionform.submit();
		}
		</script>
  </head>


  <body>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
      <a class="navbar-brand" href="#">VGS-Dice</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="http://www.nigeltodman.com/dev/" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Menu</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </li>
        </ul>
      </div>
    </nav>

    <main role="main" class="container">
            <h1>VGS-Dice</h1><br>
        <p class="lead">Provably Fair Dice Game, Open Source (PHP/JavaScript)<br> Written by <a href="http://www.NigelTodman.com/">Nigel Todman</a> (<a href="http://www.github.com/Veritas83">GitHub</a>)</p>
   <br>
<div class="container">
<?php
$ver = "0.0.1-r04 Last Modified: 11/15/2017 3:27:15 AM";

$roll = -1;
$bal = 0.00000500;
$bet = 0.00000001;

echo '<div class="form-group row"><form action="index.php?refill=1" method="post"><b><p class="form-control-static">Balance: '. number_format($bal,8) . ' BTC</p></div></b>&nbsp;';

if(isset($_GET['roll']) > '0') {
	#Roll High
	if ($_GET['roll'] == '2') {
		$roll = rand(0,99.99);
		echo "<b>DEBUG: High<br></b>";
	}
	#Roll Low
	if ($_GET['roll'] == '1') {
		$roll = rand(0,99.99);
		echo "<b>DEBUG: Low<br></b>";
	}
	if(isset($_POST['odds']) > '0') {
		echo "<b>DEBUG: Odds at ". $_POST['odds'] ."<br></b>";
	}
}

echo "Roll (POST): ". $_POST['roll'] ." Roll (GET): ". $_GET['roll']." Odds (POST): ". $_POST['odds'] ." Odds (GET): ". $_GET['odds'];
?>

	
		<button type="button" class="btn btn-warning btn-sm" onclick="refill()">Refill</button>
	</form>
</div>
<br><br>

<div name="rollactiondiv" id="rollactiondiv"><form action="http://www.nigeltodman.com/dev/index.php" name="rollactionform" id="rollactionform" method="post"></div>
<div class="form-group row">
	<label for="bet"><button type="button" class="btn btn-danger btn-number" onclick="sub()">-</button><button type="button" class="btn btn-success btn-number" onclick="add()">+</button>&nbsp;Bet Amount:&nbsp;</label>
	<div class="col-xs-3">
		<div id=betdisplay>
			<input type="text" id="bet" name="bet" class="form-control input-sm" value="0.00000001 BTC" min="0.00000001" max="0.01">
		</div>
	</div>
</div>

<div class="form-group row">
	<label for="odds"><button type="button" class="btn btn-danger btn-number" onclick="subodds()">-</button><button type="button" class="btn btn-success btn-number" onclick="addodds()">+</button>&nbsp;Win Chance:&nbsp;</label>
	<div class="col-xs-3">
		<div id=oddsdisplay>
			<input type="text" id="odds" name="odds" class="form-control input-sm" value="50.00" min="0.01" max="95">Payout: <p class="form-control-static">2X</p>
		</div>
	</div>
</div>
	<div class="form-group row" id="roll">
		<button type="submit" class="btn btn-warning btn-number" onclick="roll1()">Roll Low</button>&nbsp;<button type="submit" class="btn btn-warning btn-number" onclick="roll2()">Roll High</button>&nbsp;<?php echo 'Roll: '. $roll;	?>
	</div>
</form>

<br>

<?php
echo '<font size=1>Version: '. $ver.'</font>';
?>		
    </div></main><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
  </body>
</html>