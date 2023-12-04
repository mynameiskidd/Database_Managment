<?php 
require_once("db/db.php");//connection to sql table
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="include/text.css">
    <link rel="stylesheet" href="include/table.css">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Database View</title>	
</head>
<body>
<style>
    h2.success {
    color: #4CAF50; 
    font-size: 1.5em; 
    text-align: center; 
    margin: 20px 0; 
    }

button {


    align-items: center;
    background-color:   #4ca3af; 
    color: #fff; 
    padding: 10px 20px; 
    font-size: 1em; 
    border: none; 
    border-radius: 4px; 
    cursor: pointer; /* Add a pointer cursor on hover */
}


button:hover {
    background-color: #041e22; 
}

button {
    transition: background-color 0.3s ease;
}


</style>
<h2 class="success"> <?php echo @$_GET["id"]; ?> </h2>
<div class="">
    <fieldset>
        <form class="" action="db_data.php" method="GET">
        <input type="text" name="Search" value="" placeholder="Search by name / ssn"><br><br>
		<input class="Button" type="submit" name="SearchButton" value="Search record">
    </fieldset>
</div>
<!-- PHP for Search button -->
<?php
		if (isset($_GET["SearchButton"])) {
			global $ConnectingDB;
			$Search = $_GET["Search"];
			$sql = "SELECT * FROM employee WHERE name=:searcH OR ssn=:searcH";
			$stmt=$ConnectingDB->prepare($sql);
			$stmt->bindValue(':searcH',$Search);
			$stmt->execute();
			while ($row = $stmt->fetch()) {
				$id            = $row["id"];
				$name           = $row["name"];
				$ssn           = $row["ssn"];
				$dept           = $row["dept"];
				$salary        = $row["salary"];
				$homeaddress   = $row["homeaddress"];
				?>
<div>

<table>
    <caption>Search result</caption>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>SSN</th>
				<th>Department</th>
				<th>Salary</th>
				<th>Home Address</th>
			</tr>
    <tr>
        <td><?php echo $id; ?></td>
        <td><?php echo $name; ?></td>
        <td><?php echo $ssn; ?></td>
        <td><?php echo $dept; ?></td>
        <td><?php echo $salary; ?></td>
        <td><?php echo $homeaddress;?></td>
    </tr>
</table>
</div>

<?php	} //Ending of While Loop
}//Ending of Submit button

?>
	<table>
    <caption>DB managment</caption>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>SSN</th>
				<th>Department</th>
				<th>Salary</th>
				<th>Home Address</th>
			</tr>
<?php 
$ConnectingDB;
$sql = "SELECT * FROM employee";
$stmt = $ConnectingDB->query($sql);
while ($row = $stmt->fetch()){
    $id = $row["id"];
    $name= $row["name"];
    $ssn = $row["ssn"];
    $dept= $row["dept"];
    $salary = $row["salary"];
    $homeaddress = $row["homeaddress"];

?>
            <tr>
                <td><?php echo $id;?></td>
                <td><?php echo $name;?></td>
                <td><?php echo $ssn;?></td>
                <td><?php echo $dept;?></td>
                <td><?php echo $salary;?></td>
                <td><?php echo $homeaddress;?></td>
                <td class="button"> <a href="updatedb.php?id=<?php echo $id; ?>">Update</a> </td>
	            <td class="button"> <a href="delete.php?id=<?php echo $id; ?>">Delete</a></td>
            </tr>
<?php }//closing while l  oop ?>
    </table>
<button type="button" onclick="window.location.href='index.php'">Add New</button>
	
</body>
</html>


