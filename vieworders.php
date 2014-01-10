<?php
	$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
?>
<html>
<head>
  <title>Bob's Auto Parts - Customer Orders</title>
</head>
<body>
<h1>Bob's Auto Parts</h1>
<h2>Customer Orders</h2>
<?php 
	@ $fp = fopen($DOCUMENT_ROOT.'/../orders/orders.txt', 'rb');
	if(!$fp){
		echo '<p><strong>No orders pending.Please try again later.</strong></p>';
		exit;
	}
	echo 'file sizes: '.filesize($DOCUMENT_ROOT.'/../orders/orders.txt').'<br/>';
	while (!feof($fp)){
		$order = fgets($fp,999);
		echo $order.'<br/>';
	}
	$price = array('Tires'=>100,'oil'=>10,'Spank Plugs'=>4);
	foreach ($price as $key => $value){
		echo $key.'-'.$value.'<br/>';
	}
// 	while($element = each($price)){
// // 		echo $element['key'].'-'.$element['value'].'<br/>';
// 			echo $element['key'];  
// 　　	echo ' - ';
// 　　	echo $element['value'];
// 　　	echo '<br/>';
// 	}

// 	while(list($product,$price) = each($price)){
// 		echo "$product - $price<br/>";
// 	}
	$a = array('a','b','c','d');
	$b = array('a','k');
	var_dump($a + $b);
?>
</body>
</html>