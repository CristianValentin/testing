<?php 
	include 'db.php';
	$path = "/match_entries_csv/";
 ?>

<html>
<head>
	<title>Date card</title>
	
	<!--Stylesheet-->
	<link rel="stylesheet" href="<?php $path ?>/assets/css/style.css">
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

	<!-- pentru afisare tabele -->
	<div class="container">

		<div class="row">
			<nav class="navbar">
				<ul class="nav navbar-nav navbar-left" style="margin-left:100px;margin-top:30px;">
					<a href="<?php $path ?>home3.php">Back</a>
				</ul>
				<ul class="nav navbar-nav navbar-right" style="margin-right:100px;margin-top:30px;">
					<a href="<?php $path ?>home5.php">Next</a>
				</ul>	
			</nav>
		</div>
			<?php                 
				$link = mysqli_connect($servername,$username,$password,$dbname);

                if (!$link) {
                    die('E?ec la conectare: ' . mysql_error());
                }
                

                $sql = "select * from csv_tabel where 1";
                $query  = mysqli_query($link,$sql);
				$tabel = array();


                $sql2 = "select * from csv_mol where 1";
                $query2  = mysqli_query($link,$sql2);
                $mol = array();

                
				while($record = mysqli_fetch_array($query)){
					$tabel[]=$record;
					
				}
				/*
				foreach($tabel as $tab){
					echo $tab["Masina"]. "</br>";
					echo $tab["Data"]. "</br>";
					echo $tab["Localitate"]. "</br>";
					echo $tab["Tara"]. "</br>";
					echo $tab["Valuta"]. "</br>";
					echo $tab["TVA"]. "</br>";
					echo $tab["Litri"]. "</br>";
					echo $tab["Document"]. "</br>";
					echo $tab["Metoda Plata"]. "</br>";
					echo $tab["Card"]. "</br>";
					echo $tab["Validat"]. "</br>";
					echo $tab["Doc. Validare"]. "</br>";
					echo $tab["Data Doc Validare"]. "</br>";
				}
				*/
				while($record2 = mysqli_fetch_array($query2)){
					$mol[]=$record2;
					
				}

				
				/*
				foreach($mol as $mo){
					echo $mo["NR_Factura"]. "</br>";
					echo $mo["Data_Tranz"]. "</br>";
					echo $mo["Data_Livrarii_bunurilor"]. "</br>";
					echo $mo["Ora"]. "/br";
					echo $mo["NR_Inmatriculare"]. "</br>";
					echo $mo["Kilometraj"]. "</br>";
					echo $mo["Statia"]. "</br>";
					echo $mo["Denumire_produs"]. "</br>";
					echo $mo["Cantitate"]. "</br>";
					echo $mo["Pret_unitar"]. "</br>";
					echo $mo["Total"]. "</br>";
					echo $mo["TVA"]. "</br>";
				}
				*/

				//$tabel = array("a" => "green", "red", "blue", "red");
				//$mol = array("b" => "green", "yellow", "red");
				?>				
				<table style="width:100%;text-align:center;">
                	<tr>
						<th>NR_Inmatriculare</th>
						<th>Litri</th>
						<th>Valoare</th>
						<th>Data</th>
					</tr>
				<?php
				foreach($tabel as $tab){
					foreach ($mol as $mo){
						if($mo["Cantitate"] === $tab["Litri"]){ 
							?>
								<tr style="background-color:#66d9ff">
                				<?php  

									echo  "<td> " . $mo["NR_Inmatriculare"] . "</td><td> " . $mo["Cantitate"] . "</td><td> " . $mo["Total"] . "</td><td> " . $mo["Data_Tranz"] . "</td>"
								?>
								</tr>
								<tr style="background-color:#ff80ff">
								<?php
									echo  "<td> " . $tab["Masina"] . "</td><td> " . $tab["Litri"] . "</td><td> " . $tab["Valoare"] . "</td><td> " . $tab["Data"] . "</td>"									
								?>
								</tr>		
				

				<?php

						}
					}
				}
				?>
				</table>


				<?php
				/*
				foreach($mol as $mo){
					foreach($tabel as $tab){	
						if($mo["Cantitate"] === $tab["Litri"]){
							//echo "succes 2". "</br>";
							echo $tab["Litri"]. "</br>";		
						}
					}
				}
				*/
		

/*
				$result = mysqli_query($query);
				$data = mysqli_fetch_assoc($result);
				var_dump($data) $data;die();

					while ($row_user = mysqli_fetch_assoc($query))
					    $userinfo[] = $row_user;
					

					var_dump($userinfo[0]);die()

					/*

					[
					    [id => 1, name => 'gorge', code => '2123'],
					    [id => 2, name => 'flix', code => 'ksd02'],
					    [id => 3, name => 'jasmen', code => 'skaod2']
					]
					*/
/*
foreach ($userinfo as $user) {
    echo "Id: {$user[id]}<br />"
       . "Name: {$user[name]}<br />"
       . "Code: {$user[code]}<br /><br />";
}


					foreach ($userinfo as $user) {
					    echo "Id: {$user[id]}<br />"
					       . "Data_Tranz: {$user[Data_Tranz]}<br />"
					       . "Data_Livrarii_bunurilor: {$user[Data_Livrarii_bunurilor]}<br />"
					       . "NR_Inmatriculare: {$user[NR_Inmatricularel]}<br />"
					       . "Cantitate': {$user[Cantitate]}<br />"
					       . "Pret_unitar: {$user[Pret_unitar]}<br />"
					       . "Total: {$user[Total]}<br />"
					       . "TVA: {$user[TVA]}<br />"
					}
    			?> 

           

            	mysqli_close($link);
*/
			?>
  

	</div>


<nav class="navbar navbar-inverse" style="margin-bottom:0px;margin-top:50px;">
		<div class="container">
			
			<!-- This data will be edited later -->

			<!--
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
			-->
		</div>
	</nav>


</body>
</html>