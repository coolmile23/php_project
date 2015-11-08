<!doctype html>
<html>
	<head>
		<title>Show Order</title>
		<meta charset="utf-8" />
	
		<style>
			h1,table {
				text-align: center;
				font-family: cursive;
			}

			#submited-data {
				margin: 0 auto;
				width: 50%;
				height: 50%;
			}
		</style>

		<?php
			$tires       = $_POST['tires'];
			$oil   	     = $_POST['oil'];
			$spark_plugs = $_POST['spark_plugs'];
			$find_way    = $_POST['find_way'];

			$totalqty    = 0;
			$totalqty    = $tires + $oil + $spark_plugs;
		
			$total_amount = 0.00;
			
			define('TIREPRICE', 100);
			define('OILPRICE', 10);
			define('SPARKPRICE', 4);

			$total_amount = $tires * TIREPRICE
				      + $oil * OILPRICE
				      + $spark_plugs * SPARKPRICE;

			
			
		?>
	</head>
	
	<body>
		<?php
			if ($totalqty == 0) {
				echo '<p>';
				echo "You didn't ordered anything.";
				echo '</p>';
				exit();
			}
		?>
		<h1>The Products As Follows.</h1>

	<div id="submited-data">
	<table border="1">
		<caption>Submit Table</caption>
		<tr>
			<th>Tires</th>
			<td><?php echo $_POST['tires'] ?></td>
		</tr>

		<tr>
			<th>Oil</th>
			<td><?php echo $_POST['oil'] ?></td>
		</tr>
	
		<tr>
			<th>Spark Plugs</th>
			<td><?php echo $_POST['spark_plugs'] ?></td>
		</tr>
	</table>

	<p>
		<?php echo 'Total Items: '.$totalqty.'<br />' ?>	
		<?php echo 'Total Amount: $'.number_format($total_amount, 2).'<br />' ?>
	</p>

	<?php
		switch($find_way) {
			case 'a':
				echo '<p>';
				echo 'you are a regular customer';
				echo '</p>';
				break;
			case 'b':
				echo '<p>';
				echo 'you find me from TV advertising';
				echo '</p>';
				break;
			case 'c':	
				echo '<p>';
				echo 'you find me from phone directory';
				echo '</p>';
				break;
			case 'd':
				echo '<p>';
				echo 'you find me from word of mouth';
				echo '</p>';
				break;
			default:
				echo '<p>';
				echo 'I do not know how you find me';
				echo '</p>';
				break;
		}
	?>

	<p>
		<?php 
			$date = date("H:i, jS F"); 
			echo $date;

			$document_root = $_SERVER['DOCUMENT_ROOT'];
			@$fp = fopen("$document_root", "a+");
			
			if (!$fp) {
				echo '<p>';
				echo "the order file temperarily not available, please try it later.\n";
				echo '</p>';
				exit;
			} 
			fwrite($fp, $date. "\t". $tires. "tires");

		?>
	</p>
	</div>
		
	</body>
</html>
