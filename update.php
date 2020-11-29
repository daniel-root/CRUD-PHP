<?php
require 'database.php';

session_start();

$id = 0;

if(!empty($_GET['id']))
{
    $id = $_GET['id'];
    $result = $link->query("SELECT * FROM student WHERE id=$id") or die($link->error());
    $row = $result->fetch_array();
    $name = $row['name'];
    $course = $row['course'];
}

if (isset($_POST['update'])){
	$id = $_POST['id'];
	$name = $_POST['name'];
	$course = $_POST['course'];
	$link->query("UPDATE student SET name='$name', course='$course' WHERE id=$id") or
		die($link->error());
	$_SESSION['message']= "Atualizado com sucesso";
	header("Location: index.php");
}
?>


<html>
<body>
<form action="update.php" method="post">
<input type="hidden" name="id" value="<?php echo $id;?>" />
Nome: <input type="text" name="name" value="<?php echo $name ?>"><br>
Curso: <input type="text" name="course" value="<?php echo $course ?>"><br>
<input type="submit" name="update">
</form>

</body>
</html>  