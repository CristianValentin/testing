<?php 
	include 'db.php';
	$path = "/match_entries_csv/";
 ?>

<html>
<head>
	<title>Date card</title>
	
	<!--Stylesheet-->
	<link rel="stylesheet" href="<?php $path ?>assets/css/style.css">
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
				<ul class="nav navbar-nav navbar-right" style="margin-right:100px;margin-top:30px;">
					<a href="<?php $path ?>index.html">Next</a>
				</ul>	
			</nav>
		</div>
	
		<p> Acum sa stergem tabelele din baza de date si sa stergem si fisierele de pe server</p>

     
		
		<form action="home7.php" method="post">
    		<input type="submit" name="submit" value="Sterge tot"><br />
		</form>
		

<?php 


	if (isset($_POST['submit'])){

/*
$files = glob(dirname(__FILE__) . "/uploads/*.csv");


echo $files[0];
unlink($files[0]);
echo $files[0];
*/


			
                $link = mysqli_connect($servername,$username,$password,$dbname);
                if (!$link) {
                    die('E?ec la conectare: ' . mysqli_error());
                }
                $sql1 = "DELETE FROM `csv_tabel` WHERE 1";
                $sql2 = "DELETE FROM `csv_mol` WHERE 1";
                $query1  = mysqli_query($link,$sql1);
                $query2  = mysqli_query($link,$sql2);
				mysqli_close($link);  

				
				array_map('unlink', glob(dirname(__FILE__) . "/uploads/*.csv"));
				echo "<br>success<br>";

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