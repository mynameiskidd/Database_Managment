<?php 
require_once("db/db.php");
$SearchQueryParameter = $_GET["id"];
if (isset($_POST["submit"])) {
		$name = $_POST["name"];
		$ssn  = $_POST["ssn"];
		$dept  = $_POST["dept"];
		$salary  = $_POST["salary"];
		$homeaddress  = $_POST["homeaddress"];
		global $ConnectingDB;
		$sql ="DELETE FROM employee WHERE id='$SearchQueryParameter'";
		$Execute=$ConnectingDB->query($sql);
		if ($Execute) {
			echo '<script>window.open("db_data.php?id=Record Deleted Successfully","_self")</script>';
		}

}







?>
<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="include/text.css">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Delete</title>
	<style>
        .styled-line {
            color: red; 
            font-weight: bold; 
        }
		.styled-line2 {
            color: green; 
            font-weight: bold; 
        }
    </style>
	<link rel="stylesheet" href="include/style.css">
</head>
<body>


<?php
$ConnectingDB;
$sql ="SELECT * FROM employee WHERE id='$SearchQueryParameter'";
$stmt=$ConnectingDB->query($sql);
while ($row = $stmt->fetch()) {
	$id          = $row["id"];
	$name       = $row["name"];
	$ssn         = $row["ssn"];
	$dept  = $row["dept"];
	$salary      = $row["salary"];
	$homeaddress = $row["homeaddress"];
}
?>
	<form action="delete.php?id=<?php echo $SearchQueryParameter;?>"method="post">
	<fieldset>
		<span class="FieldInfo">Employee Name:</span>
		<br>
		<input type="text" name="name" value="<?php echo $name; ?>">
		<br>
		<span class="FieldInfo">SSN:</span>
		<br>
		<input type="text" name="ssn" value="<?php echo $ssn; ?>">
		<br>
		<span class="FieldInfo">Department:</span>
		<br>
		<input type="text" name="dept" value="<?php echo $dept; ?>">
		<br>
		<span class="FieldInfo">Salary:</span>
		<br>
		<input type="text" name="salary" value="<?php echo $salary; ?>">
		<br>
		<span class="FieldInfo">Home Address:</span>
        <br>
        <textarea  name="homeaddress" ><?php echo $homeaddress; ?></textarea>
		<br>
		<button type="submit" name="submit">Delete this form</button>

		<br>
</fieldset>
</form>
	
</body>
</html>