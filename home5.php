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
					<a href="<?php $path ?>home4.php">Back</a>
				</ul>
				<ul class="nav navbar-nav navbar-right" style="margin-right:100px;margin-top:30px;">
					<a href="<?php $path ?>home6.php">Next</a>
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
				while($record2 = mysqli_fetch_array($query2)){
					$mol[]=$record2;
					
				}
				?>		
				<table style="width:100%;text-align:center;">
                	<tr>
						<th>Masina</th>
						<th>Data</th>
						<th>Localitate</th>
						<th>Tara</th>
						<th>Valoare</th>
						<th>Valuta</th>
						<th>TVA</th>
						<th>Litri</th>
						<th>Document</th>
						<th>Metoda Plata</th>
						<th>Card</th>
						<th>Validat</th>
						<!--<th>Doc. Validare</th>
						<th>Data Doc Validare</th>-->
					</tr>
				<?php
				foreach($tabel as $tab){
					$ok=0;
					foreach ($mol as $mo){
						if($mo["Cantitate"] === $tab["Litri"]){ 
							$ok=1;	
						}//endif
					}//endforeach mol
					if($ok===1){ ?>
						<tr style="background-color:#ff80ff">
							<?php
								echo
										"<td> " . $tab['Masina'] . "</td>
						                 <td> " . $tab['Data'] . "</td>
						                 <td> " . $tab['Localitate'] . "</td>
						                 <td> " . $tab['Tara'] . "</td>
						                 <td> " . $tab['Valoare']. "</td>
						                 <td> " . $tab['Valuta']. "</td>
						                 <td> " . $tab['TVA']. "</td>
						                 <td> " . $tab['Litri']. "</td>
						                 <td> " . $tab['Document']. "</td>
						                 <td> " . $tab['Metoda Plata']. "</td>
						                 <td> " . $tab['Card']. "</td>
						                 <td> " . $tab['Validat']. "</td>
						                 <!--<td> " . $tab['Doc. Validare']. "</td>-->
						                 <!--<td> " . $tab['Doc. Validare']. "</td>-->";
						    									
									?>
									</tr>	
									<?php	
					}
					else{ ?>
						<tr style="background-color:#fff">
							<?php
								echo
										"<td> " . $tab['Masina'] . "</td>
						                 <td> " . $tab['Data'] . "</td>
						                 <td> " . $tab['Localitate'] . "</td>
						                 <td> " . $tab['Tara'] . "</td>
						                 <td> " . $tab['Valoare']. "</td>
						                 <td> " . $tab['Valuta']. "</td>
						                 <td> " . $tab['TVA']. "</td>
						                 <td> " . $tab['Litri']. "</td>
						                 <td> " . $tab['Document']. "</td>
						                 <td> " . $tab['Metoda Plata']. "</td>
						                 <td> " . $tab['Card']. "</td>
						                 <td> " . $tab['Validat']. "</td>
						                 <!--<td> " . $tab['Doc. Validare']. "</td>-->
						                 <!--<td> " . $tab['Doc. Validare']. "</td>-->";
						    									
									?>
									</tr>	
					<?php }	
				}
				?>
				</table>
				<?php
            	mysqli_close($link);
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