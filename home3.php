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
				<a class="navbar-brand" href="#">Entry check</a>
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
					<a href="<?php $path ?>home2.php">Back</a>
				</ul>
				<ul class="nav navbar-nav navbar-right" style="margin-right:100px;margin-top:30px;">
					<a href="<?php $path ?>home4.php">Next</a>
				</ul>	
			</nav>
		</div>
			<?php                 
				$link = mysqli_connect($servername,$username,$password,$dbname);

                if (!$link) {
                    die('E?ec la conectare: ' . mysql_error());
                }
                

                $sql = "select * from csv_mol where 1";
                $query  = mysqli_query($link,$sql);
                

                /* This was to check if there are records in the table
                $nr_crt=0;
                $sql1= "select id_produs from stocuri order by id_produs desc limit 1";
                $query1 = mysqli_query($link,$sql1);
                while($record1 = mysqli_fetch_array($query1)){
                $nr_crt=$record1['id_produs'];
                }
                if($nr_crt!=0){
                    $nr_crt++;
                echo "<p>Au fost gasite " . $nr_crt . " criterii.</p>";
                }
                else{
                echo "<p style='color:red'>Nu au fost introduse date in tabel.</p>";
                }
                $max=0;
                */

                ?> 
               	
                <table style="width:100%;text-align:center;">
                <tr>
					<th>NR_Factura</th>
					<th>Data_Tranz</th>
					<th>Data_Livrarii_bunurilor</th>
					<!--<th>Ora</th>-->
					<th>NR_Inmatriculare</th>
					<!--<th>Kilometraj</th>-->
					<!--<th>Statia</th>-->
					<!--<th>Denumire_produs</th>-->
					<th>Cantitate</th>
					<th>Pret_unitar</th>
					<th>Total</th>
					<th>TVA</th>
                </tr>
                <?php    
                while($record = mysqli_fetch_array($query)){
                ?>
                <tr>

                <?php    
                 echo 
                  "<td> " . $record['NR_Factura'] . "</td>
                   <td> " . $record['Data_Tranz'] . "</td>
                   <td> " . $record['Data_Livrarii_bunurilor'] . "</td>
                   <!--<td> " . $record['Ora'] . "</td>-->
                   <td> " . $record['NR_Inmatriculare']. "</td>
                   <!--<td> " . $record['Kilometraj']. "</td>-->
                   <!--<td> " . $record['Statia']. "</td>-->
                   <!--<td> " . $record['Denumire_produs']. "</td>-->
                   <td> " . $record['Cantitate']. "</td>
                   <td> " . $record['Pret_unitar']. "</td>
                   <td> " . $record['Total']. "</td>
                   <td> " . $record['TVA']. "</td>";
                ?>

                </tr>
                
                <?php
                }

            	mysqli_close($link);

			?>
     		</table> 	

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