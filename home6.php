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
					<a href="<?php $path ?>home5.php">Back</a>
				</ul>
				<ul class="nav navbar-nav navbar-right" style="margin-right:100px;margin-top:30px;">
					<a href="<?php $path ?>home7.php">Next</a>
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
				<table style="width:100%;text-align:center;font-size:14px;">
                	<tr>
						<th>NR_Factura</th>
						<th>Data_Tranz</th>			
						<th>NR_Inmatriculare</th>
						<th>Statia</th>
						<th>Denumire_produs</th>
						<th>Cantitate</th>
						<th>Pret_unitar</th>
						<th>Total</th>
						<th>TVA</th>
					
					</tr>
				<?php
				$count=0;
				foreach ($mol as $mo){
					$ok=0;
					foreach($tabel as $tab){
						if($mo["Cantitate"] === $tab["Litri"]){ 
							$ok=1;	
						}//endif
					}//endforeach mol
					if($ok===1){ ?>	
						<tr style="background-color:#ff80ff">
							<?php
								echo
										"<td> " . $mo["NR_Factura"] . "</td>
						                 <td> " . $mo["Data_Tranz"] . "</td>
						                 <td> " . $mo["NR_Inmatriculare"]. "</td>       
						                 <td> " . $mo["Statia"]. "</td>
						                 <td> " . $mo["Denumire_produs"]. "</td>
						                 <td> " . $mo["Cantitate"]. "</td>
						                 <td> " . $mo["Pret_unitar"]. "</td>
						                 <td> " . $mo["Total"]. "</td>
						                 <td> " . $mo["TVA"]. "</td>";
						    	$count++;								
									?>
									</tr>	
									<?php	
					}
					else{ ?>
						<tr style="background-color:#fff">
							<?php
								echo
										"<td> " . $mo["NR_Factura"] . "</td>
						                 <td> " . $mo["Data_Tranz"] . "</td>
						                 <td> " . $mo["NR_Inmatriculare"]. "</td>
						                 <td> " . $mo["Statia"]. "</td>
						                 <td> " . $mo["Denumire_produs"]. "</td>
						                 <td> " . $mo["Cantitate"]. "</td>
						                 <td> " . $mo["Pret_unitar"]. "</td>
						                 <td> " . $mo["Total"]. "</td>
						                 <td> " . $mo["TVA"]. "</td>";
						    									
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