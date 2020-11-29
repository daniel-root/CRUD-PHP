<?php
require 'database.php';

session_start();

if (isset($_POST['save'])){
	$name = $_POST['name'];
	$course = $_POST['course'];
	
	$link->query("INSERT INTO student (name, course) VALUES ('$name', '$course')") or
		die($link->error());
	$_SESSION['message']= "Criado com sucesso";
	header("Location: index.php");
}
?>


<html>
<body>

<form action="create.php" method="post">
Nome: <input type="text" name="name"><br>
Curso: <input type="text" name="course"><br>
<input type="submit" name="save">
</form>

</body>
</html>