<?php
	session_start();
?>

<!DOCTYPE html>
<!--AddHandler.php-->

<html>
<body>

<?php
$connection = @mysqli_connect (localhost, root, Jc2011368, login);
if(mysqli_connect_errno())
	mysqli_connect_error();


if(isset($_SESSION['email']))
	$email = $_SESSION['email'];

else{
	echo "User authentification failed";
	echo "<a href='Project.php'>Back to sign in</a>";
}

for ($i = 1; $i <=15; $i++){
	$ammt = "ammt$i";
	if (isset($_POST[$ammt])){
		${'ammt' .$i} =  $_POST[$ammt];
	} 
	if(empty(${'ammt' .$i})) {
	${'ammt' .$i} = "0";
	}
	$unit = "unit$i"; 
	if (isset($_POST[$unit])){	
		${'unit' .$i} = $_POST[$unit];
	}
	$ingredient = "ingredient$i";
	if (isset($_POST[$ingredient])){
		${'ingredient' .$i} = $_POST[$ingredient];
		${'ingredient' .$i} = ${'unit' .$i} ." ". ${'ingredient' .$i};
	}
}


$name = $_POST['name'];
$prep = $_POST['prep'];
$desc = $_POST['desc'];
$connection = @mysqli_connect (localhost, root, Jc2011368, login);


$query = "INSERT INTO food (name, ammt1, ingredient1, ammt2, ingredient2, ammt3, ingredient3, ammt4, ingredient4,ammt5, ingredient5, ammt6, ingredient6 ,ammt7, ingredient7 ,ammt8, ingredient8, ammt9, ingredient9, ammt10, ingredient10, ammt11, ingredient11, ammt12, ingredient12, ammt13, ingredient13, ammt14, ingredient14, ammt15, ingredient15, prep, description) VALUES ('$name', '$ammt1', '$ingredient1', '$ammt2', '$ingredient2', '$ammt3', '$ingredient3', '$ammt4', '$ingredient4','$ammt5', '$ingredient5', '$ammt6', '$ingredient6', '$ammt7', '$ingredient7', '$ammt8', '$ingredient8', '$ammt9', '$ingredient9', '$ammt10', '$ingredient10', '$ammt11', '$ingredient11', '$ammt12', '$ingredient12', '$ammt13', '$ingredient13', '$ammt14', '$ingredient14', '$ammt15', '$ingredient15',  '$prep', '$desc');";

$result = mysqli_query($connection, $query)or die(mysqli_error($connection));

$yourRecipeQuery = "INSERT INTO yourRecipes(food, login) VALUES('$name', '$email')";

$resultRecipe = mysqli_query($connection, $yourRecipeQuery)or die(mysqli_error($connection));

if($resultRecipe)
	echo "<script type='text/javascript'>alert('Successfully added recipe!');</script>";

include 'yourRecipes.php';
?>


