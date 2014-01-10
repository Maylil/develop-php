<?php
	$tireqty = $_POST['tireqty'];
	$oilqty = $_POST['oilqty'];
	$sparkqty = $_POST['sparkqty'];
	$find = $_POST['find'];
	$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
	$date = date('H:i, jS F Y');
?>
<html>
<head>
  <title>Bob's Auto Parts - Order Results</title>
</head>
<body>
	<h1>Bob's Auto Parts</h1>
	<h2>Order Results</h2>
	<?php 
	  echo '<p>Order processed at ';
	  echo $date;
	  echo '</p>';
	  echo '<p>Your order is as follows: </p>';
	  echo '<strong>'.$tireqty.'</strong> tires<br />';
	  echo '<strong>'.$oilqty.'</strong> bottles of oil<br />';
	  echo '<strong>'.$sparkqty.'</strong> spark plugs<br />';
	
	  $totalqty = 0;
	  $totalamount = 0.00;
	  
	  $totalqty = $tireqty + $oilqty + $sparkqty;
	  echo 'Items ordered: '.$totalqty.'<br />';
	  
	  if($totalqty == 0){
	  	echo 'You did not order anything on the previous page!<br/>';
	  }else{
	  	if($tireqty > 0){
	  		echo '<strong>'.$tireqty.'</strong> tires<br/>';
	  	}
	  	if($oilqty > 0){
	  		echo '<strong>'.$oilqty.'</strong> bottles of oil<br/>';
	  	}
	  	if($sparkqty > 0){
	  		echo '<strong>'.$sparkqty.'</strong> spark plugs<br/>';
	  	}
	  }
	  define('TIREPRICE', 100);
	  define('OILPRICE', 10);
	  define('SPARKPRICE', 4);
	
	  $totalamount = $tireqty * TIREPRICE
	               		+ $oilqty * OILPRICE
	               		+ $sparkqty * SPARKPRICE;
	  $totalamount = number_format($totalamount,2,'.','');
	  
	  echo '<P>Total of order is <strong>$'.$totalamount.'</strong></p>';
	  echo '<P>Address to ship to is <strong>'.$find.'</strong></p>';
	
	  $outputstring = $date."\t".$tireqty." tires \t".$oilqty." oil\t"
 	  								.$sparkqty." spark plugs\t\$".$totalamount."\t".$find."\n";
	  
 	  @ $fp = fopen($DOCUMENT_ROOT.'/../orders/orders.txt', 'ab');
 	  //@ $fp = fopen('orders/orders.txt', 'ab');
	  if(!$fp){
			echo '<p><strong>Your order could not be processed at this time.'
	  				.'Please try again later.</strong></p></body></html>';
			exit;
		}
		flock($fp,LOCK_EX);
		fwrite($fp, $outputstring,strlen($outputstring));
		flock($fp, LOCK_UN);
		fclose($fp);
		echo '<p>Order written.</p>';
// 	  $taxrate = 0.10;  // local sales tax is 10%
// 	  $totalamount = $totalamount * (1 + $taxrate);
// 	  echo 'Total including tax: $'.number_format($totalamount,2).'<br />';
	?>
	<a href="orderform.php">退回</a>
</body>
</html>

