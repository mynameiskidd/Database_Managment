<?php 
require_once("db/db.php");//connection to sql table
if ($_SERVER["REQUEST_METHOD"] == "POST") {//setting the connection to the HTML form presented below
    if (isset($_POST["submit"])) {
        if (!empty($_POST["name"]) && !empty($_POST["ssn"])) {
			//filtering and saving user input
			$name= filter_input(INPUT_POST,"name",FILTER_SANITIZE_SPECIAL_CHARS);// retrieving user input from an HTML form to filter and enhance the security of users
			$ssn= filter_input(INPUT_POST,"ssn",FILTER_SANITIZE_SPECIAL_CHARS);
			$dept= filter_input(INPUT_POST,"dept",FILTER_SANITIZE_SPECIAL_CHARS);
			$salary= filter_input(INPUT_POST, "salary", FILTER_VALIDATE_INT);
			$homeaddress= filter_input(INPUT_POST,"homeaddress",FILTER_SANITIZE_SPECIAL_CHARS);
			//inserting values to the table
			$ConnectingDB ;
			$sql = "INSERT INTO employee(name,ssn,dept,salary,homeaddress)
			VALUES(:namE,:ssN,:depT,:salarY,:homeaddresS)";
			//one way to filter user input
			$stmt = $ConnectingDB  ->prepare($sql);
			$stmt->bindValue('namE',$name);
			$stmt->bindValue('ssN',$ssn);
			$stmt->bindValue('depT',$dept);
			$stmt->bindValue('salarY',$salary);
			$stmt->bindValue('homeaddresS',$homeaddress);
			$Execute = $stmt->execute();
			if ($Execute) {
				echo '<p class="styled-line">' . "Record has been saved" . '</p>';
			}

            
        } else {
            
            echo '<p class="styled-line">' . "Name and/or SSN is missing" . '</p>';
        }

    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="include/text.css">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Database managment</title>
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
	<form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>"method="post">
	<fieldset>
		<span class="FieldInfo">Employee Name:</span>
		<br>
		<input type="text" name="name">
		<br>
		<span class="FieldInfo">SSN:</span>
		<br>
		<input type="text" name="ssn">
		<br>
		<span class="FieldInfo">Department:</span>
		<br>
		<input type="text" name="dept">
		<br>
		<span class="FieldInfo">Salary:</span>
		<br>
		<input type="text" name="salary">
		<br>
		<span class="FieldInfo">Home Address:</span>
        <br>
        <textarea rows="8" cols="80" name="homeaddress"></textarea>
		<br>
		<button type="submit" name="submit">Submit</button>
	
		<button type="button" onclick="window.location.href='db_data.php'">View Records</button>

		<br>
</fieldset>
</form>
	
</body>
</html>