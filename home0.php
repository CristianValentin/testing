<?php 

//with this step we will upload files to server

include 'db.php';
$path = '/match_entries_csv/';
 

// this will do the upload
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$ok = 0;
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {


// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $ok=1;
        //echo "Fisierul ". basename( $_FILES["fileToUpload"]["name"]). " a fost incarcat.";
    } else {
        $ok=2;
        //echo "Sorry, there was an error uploading your file.";
    }
}
// and that's it
}

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
					<a href="<?php echo $path ?>index.html">Back</a>
				</ul>
				<ul class="nav navbar-nav navbar-right" style="margin-right:100px;margin-top:30px;">
					<a href="<?php echo $path ?>home1.php">Next</a>
				</ul>	
			</nav>
		</div>

	
		<p> Aici vom incarca fisierele pe server

<form action="home0.php" method="post" enctype="multipart/form-data">
    Select file to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload" name="submit">
</form>
	</div>

	<p>
		<?php

			if($ok==1){
				echo "Fisierul ". basename( $_FILES["fileToUpload"]["name"]). " a fost incarcat.";
			} ?>

			<?php

			if($ok==2){
				echo "Sorry, there was an error uploading your file.";
			}
		?>

	</p>

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