<?php

	// this creates db tables and populates them

	include 'db.php';
	$path = '/match_entries_csv/';
 ?>

<html>
<head>
	<title>Date card</title>
	
	<!--Stylesheet-->
	<link rel="stylesheet" href="<?php echo $path ?>/assets/css/style.css">
	<link rel="stylesheet" href="https://bootswatch.com/flatly/bootstrap.css">

	<script src="http://cdn.ckeditor.com/4.7.1/standard/ckeditor.js"></script>
	
</head>
<body>
	<nav class="navbar navbar-inverse">
		<div class="container">
			<div class="navbar-header">
				<a class="navbar-brand" href="#"> Entry check</a>
			</div>
			<div id="navbar">
				<ul class="nav navbar-nav">
					<li><a href="#">Home</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
				  	
						<li><a href="#">Login</a></li>
						<li><a href="#">Logout</a></li>
				</ul>
			</div>
		</div>
	</nav>

	<div class="container">

		<div class="row">
			<nav class="navbar">
				<ul class="nav navbar-nav navbar-left" style="margin-left:100px;margin-top:30px;">
					<a href="<?php echo $path; ?>home0.php">Back</a>
				</ul>
				<ul class="nav navbar-nav navbar-right" style="margin-right:100px;margin-top:30px;">
					<a href="<?php echo $path; ?>home2.php">Next</a>
				</ul>	
			</nav>
		</div>

	
		<p> Aici citim fisierele si le incarcam in tabele in baza de date</p>

		<form action="home1.php" method="post">
    		<input type="submit" name="submit" value="Creaza tabele"><br />
		</form>


<?php 



	if (isset($_POST['submit'])){

			// WHYYYYYYY??????? why was this missing; noticed after 1 hour 	
                $link = mysqli_connect($servername,$username,$password,$dbname);
                if (!$link) {
                    die('E?ec la conectare: ' . mysql_error());
                }
            //...WHYYYYY???    


		// Here we create the two tables if they don't exist
		$sql1 = "CREATE TABLE IF NOT EXISTS `csv_mol` (
			`id` mediumint(8) unsigned NOT NULL PRIMARY KEY AUTO_INCREMENT,		
			`NR_Factura` varchar(65) CHARACTER SET utf8 NOT NULL,
			`Data_Tranz` varchar(65) CHARACTER SET utf8 NOT NULL,
			`Data_Livrarii_bunurilor` varchar(65) CHARACTER SET utf8 NOT NULL,
			`Ora` varchar(65) CHARACTER SET utf8 NOT NULL,
			`Cust_name` varchar(65) CHARACTER SET utf8 NOT NULL,
			`NR_Card` varchar(65) CHARACTER SET utf8 NOT NULL,
			`NR_Inmatriculare` varchar(16) CHARACTER SET utf8 NOT NULL,
			`Kilometraj` varchar(10) CHARACTER SET utf8 NOT NULL,
			`CentruCost` varchar(10) CHARACTER SET utf8 NOT NULL,
			`Statia` varchar(40) CHARACTER SET utf8 NOT NULL,
			`Cod_produs` varchar(64) CHARACTER SET utf8 NOT NULL,
			`Denumire_produs` varchar(30) CHARACTER SET utf8 NOT NULL,
			`UM` varchar(30) CHARACTER SET utf8 NOT NULL,
			`Cantitate`varchar(65) CHARACTER SET utf8 NOT NULL,
			`Pret_unitar` varchar(65) CHARACTER SET utf8 NOT NULL,
			`Total` varchar(65) CHARACTER SET utf8 NOT NULL,
			`TVA` varchar(65) CHARACTER SET utf8 NOT NULL,
			`Discount` varchar(65) CHARACTER SET utf8 NOT NULL,
			`TVA_Discount` varchar(65) CHARACTER SET utf8 NOT NULL,
			`NET_facturat` varchar(65) CHARACTER SET utf8 NOT NULL,
			`TVA_facturat` varchar(65) CHARACTER SET utf8 NOT NULL,
			`Total_facturat` varchar(65) CHARACTER SET utf8 NOT NULL 
			) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
		$query1  = mysqli_query($link,$sql1);
		$sql2 = "CREATE TABLE IF NOT EXISTS `csv_tabel` (	
			`id` mediumint(8) unsigned NOT NULL PRIMARY KEY AUTO_INCREMENT,		
			`Masina` varchar(40) CHARACTER SET ucs2 NOT NULL,
			`Data` varchar(40) CHARACTER SET ucs2 NOT NULL,
			`Localitate` varchar(40) CHARACTER SET ucs2 NOT NULL,
			`Tara` varchar(40) CHARACTER SET ucs2 NOT NULL,
			`Valoare` varchar(40) CHARACTER SET ucs2 NOT NULL,
			`Valuta` varchar(40) CHARACTER SET ucs2 NOT NULL,
			`TVa` varchar(40) CHARACTER SET ucs2 NOT NULL,
			`Litri` varchar(40) CHARACTER SET ucs2 NOT NULL,
			`Document` varchar(40) CHARACTER SET ucs2 NOT NULL,
			`Metoda Plata` varchar(40) CHARACTER SET ucs2 NOT NULL,
			`Card` varchar(40) CHARACTER SET ucs2 NOT NULL,
			`Validat` varchar(40) CHARACTER SET ucs2 NOT NULL,
			`Doc. Validare`  varchar(40) CHARACTER SET ucs2 NOT NULL,
			`Data Doc Validare`  varchar(40) CHARACTER SET ucs2 NOT NULL
			) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
		$query2  = mysqli_query($link,$sql2);
		// tables are now created


		// here I delete any previous data from the tables in case it wasn't erased already
		$sql_v1 ="DELETE FROM `csv_mol` WHERE 1";
		$sql_v2 ="DELETE FROM `csv_tabel` WHERE 1";
		$query_v1 = mysqli_query($link,$sql_v1);
		$query_v2 = mysqli_query($link,$sql_v2);
		// tables are now empty


					// here I upload the records to the database

					// first file
					$url1 = "http://fermierul.totuleaici.ro" .$path. "uploads/mol.csv";
					$csv1 = file_get_contents($url1);
					$lines1 = explode(PHP_EOL, $csv1);
					$array1 = array();
					foreach ($lines1 as $line) {
					    $array1[] = str_getcsv($line);
					}
					// we should check they exist somewhere aroud here
					// now we upload them
					$ok = 1;
					foreach ($array1 as $arr1) {		
							$fields = array();
							$i=0;
							foreach ($arr1 as $ar1) {
								//echo $ar1 . " ";
								$fields[$i]=$ar1;
								$i++;
							}
							$fieldVal1 = $fields[0];
							$fieldVal2 = $fields[1];
							$fieldVal3 = $fields[2];
							$fieldVal4 = $fields[3];
							$fieldVal5 = $fields[4];
							$fieldVal6 = $fields[5];	
							$fieldVal7 = $fields[6];
							$fieldVal8 = $fields[7];
							$fieldVal9 = $fields[8];
							$fieldVal10 = $fields[9];
							$fieldVal11 = $fields[10];
							$fieldVal12 = $fields[11];
							$fieldVal13 = $fields[12];
							$fieldVal14 = $fields[13];
							$fieldVal15 = $fields[14];
							$fieldVal16 = $fields[15];
							$fieldVal17 = $fields[16];
							$fieldVal18 = $fields[17];
							$fieldVal19 = $fields[18];
							$fieldVal20 = $fields[19];
							$fieldVal21 = $fields[20];
							$fieldVal22 = $fields[21];
							$sql1 = "INSERT INTO `csv_mol`
							(`NR_Factura`,
							`Data_Tranz`,
							`Data_Livrarii_bunurilor`,
							`Ora`,
							`Cust_name`,
							`NR_Card`,
							`NR_Inmatriculare`,
							`Kilometraj`,
							`CentruCost`,
							`Statia`,
							`Cod_produs`,
							`Denumire_produs`,
							`UM`,
							`Cantitate`,
							`Pret_unitar`,
							`Total`,
							`TVA`,
							`Discount`,
							`TVA_Discount`,
							`NET_facturat`,
							`TVA_facturat`,
							`Total_facturat`)
							VALUES 
							('$fieldVal1',
							'$fieldVal2',
							'$fieldVal3',
							'$fieldVal4',
							'$fieldVal5',
							'$fieldVal6',
							'$fieldVal7',
							'$fieldVal8',
							'$fieldVal9',
							'$fieldVal10',
							'$fieldVal11',
							'$fieldVal12',
							'$fieldVal13',
							'$fieldVal14',
							'$fieldVal15',
							'$fieldVal16',
							'$fieldVal17',
							'$fieldVal18',
							'$fieldVal19',
							'$fieldVal20',
							'$fieldVal21',
							'$fieldVal22'
							)";
							
							if($ok==1){
								echo "first line is skipped<br>";$ok++;
							}else{
								$query1 = mysqli_query($link,$sql1);
							}						
					}
					
					

					// remember to escape the data to prevent sql injection
					    //$fieldVal1 = mysqli_real_escape_string($array1[$ar1][0]);
					

					//second file
					$url2 = "http://fermierul.totuleaici.ro" . $path ."uploads/tabel.csv";
					$csv2 = file_get_contents($url2);
					$lines2 = explode(PHP_EOL, $csv2);
					$array2 = array();
					foreach ($lines2 as $line) {
					    $array2[] = str_getcsv($line);
					    //echo "success2"."</br>";
					}
					// we should check they exist somewhere aroud here
					// now we upload them
					
					$ok = 1;
					foreach ($array2 as $arr2) {		
							$fields = array();
							$i=0;
							foreach ($arr2 as $ar2) {
								//echo $ar1 . " ";
								$fields[$i]=$ar2;
								$i++;
								
							}
						$fieldVal1 = $fields[0];
					    $fieldVal2 = $fields[1];
					    $fieldVal3 = $fields[2];
					    $fieldVal4 = $fields[3];
					    $fieldVal5 = $fields[4];
					    $fieldVal6 = $fields[5];	
					    $fieldVal7 = $fields[6];
					    $fieldVal8 = $fields[7];
					    $fieldVal9 = $fields[8];
					    $fieldVal10 = $fields[9];
					    $fieldVal11 = $fields[10];
					    $fieldVal12 = $fields[11];
					    $fieldVal13 = $fields[12];
					    $fieldVal14 = $fields[13];

					    $sql2 = "INSERT INTO `csv_tabel`(
							`Masina`, 
							`Data`, 
							`Localitate`, 
							`Tara`, 
							`Valoare`, 
							`Valuta`, 
							`TVA`, 
							`Litri`, 
							`Document`, 
							`Metoda Plata`, 
							`Card`, 
							`Validat`, 
							`Doc. Validare`, 
							`Data Doc Validare`) 
							VALUES (
								'$fieldVal1',
								'$fieldVal2',
								'$fieldVal3',
								'$fieldVal4',
								'$fieldVal5',
								'$fieldVal6',
								'$fieldVal7',
								'$fieldVal8',
								'$fieldVal9',
								'$fieldVal10',
								'$fieldVal11',
								'$fieldVal12',
								'$fieldVal13',
								'$fieldVal14'
							)";
						
							if($ok==1){
								echo "first line is skipped<br>";$ok++;
							}else{
							$query2  = mysqli_query($link,$sql2);  
							}
					}

					// that sql injection needs to be fixed really!!!
				
						
	
			mysqli_close($link); 

			// and now everything is done and we are ready to move to the next step 	
			echo "Success";		

		}


?>

	</div>

	<!-- This data will be edited later -->
	<!--
<nav class="navbar navbar-inverse" style="margin-bottom:0px;margin-top:50px;">
		<div class="container">
			
		

			
			<div class="navbar-header">
				<a class="navbar-brand" href="#"> Entry check</a>
			</div>
			<div id="navbar">
				<ul class="nav navbar-nav">
					<li><a href="#">Home</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
				  	
						<li><a href="#">Login</a></li>
						<li><a href="#">Logout</a></li>
				</ul>
			</div>
		
		</div>
	</nav>
	-->

</body>
</html>