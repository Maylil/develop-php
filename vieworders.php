<?php
	$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
?>
<html>
<head>
  <title>Bob's Auto Parts - Customer Orders</title>
  <style>
	th{
		background: #ccf;
	}
	.ar{
		text-align: right;
	}
	table{
		border-collapse: collapse;
		border: 1px solid #eee;
	}
	td,th{
		border: 2px solid #eee;
	}
	</style>
</head>
<body>
<h1>Bob's Auto Parts</h1>
<h2>Customer Orders</h2>
<?php 
	/* @ $fp = fopen($DOCUMENT_ROOT.'/../orders/orders.txt', 'rb');
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
	ksort($price);
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
	$b = array('a','k'); */
	/**
		file_get_contents() 函数把整个文件读入一个字符串中。
		和 file() 一样，不同的是 file_get_contents() 把文件读入一个字符串。	
 */	
	$orders = file($DOCUMENT_ROOT.'/../orders/orders.txt');
	$number_of_orders = count($orders);
	if($number_of_orders == 0){
		echo '<p><strong>No orders pending.Please try again later.</strong></p>';
	}
?>
	<table>
		<tr><th>Ordr Date</th><th>Tires</th><th>Oil</th><th>Spark Plugs</th><th>Total</th><th>Find</th></tr>
<?php
	for($i = 0;$i < $number_of_orders;$i++){
		$line = explode("\t", $orders[$i]);
		$line[1] = intval($line[1]);
		$line[2] = intval($line[2]);
		$line[3] = intval($line[3]);
		echo '<tr>
						<td>'.$line[0].'</td>
						<td class="ar">'.$line[1].'</td>
						<td class="ar">'.$line[2].'</td>
						<td class="ar">'.$line[3].'</td>
						<td class="ar">'.$line[4].'</td>
						<td>'.$line[5].'</td>
					</tr>';
	}
?>
	</table>
</body>
</html>