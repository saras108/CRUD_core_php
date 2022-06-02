<html>
<head>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<title>Add Data</title>
</head>

<body>
<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['Submit'])) {	
	$name = mysqli_real_escape_string($mysqli, $_POST['name']);
	$age = mysqli_real_escape_string($mysqli, $_POST['age']);
	$email = mysqli_real_escape_string($mysqli, $_POST['email']);
	
	// checking empty fields
	if(empty($name) || empty($age) || empty($email)) {
				
		if(empty($name)) {
            echo "<p class='p-3 mb-2 bg-danger text-white'>Name field is empty.</p>";
		}
		
		if(empty($age)) {
            echo "<p class='p-3 mb-2 bg-danger text-white'>Age field is empty.</p>";
		}
		
		if(empty($email)) {
            echo "<p class='p-3 mb-2 bg-danger text-white'>Email field is empty.</p>";
		}
		
		//link to the previous page
        echo "<a href='javascript:self.history.back();'><button type='button' class='btn btn-warning btn-lg btn-block'>Go Back</button> </a>";

	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$result = mysqli_query($mysqli, "INSERT INTO users(name,age,email) VALUES('$name','$age','$email')");
		
		//display success message
		echo "<p class='p-3 mb-2 bg-success text-white'>Data Successfully Saved.</p>";
		
        echo "<a href='index.php'><button type='button' class='btn btn-Primary btn-lg btn-block'>View Result</button> </a>";
		// header("Location:index.php");

	}
}
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>
