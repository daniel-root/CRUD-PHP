<?php
require 'database.php';

session_start();

$id = 0;

if(!empty($_GET['id']))
{
    $id = $_REQUEST['id'];
}

if (isset($_POST['delete'])){
	$id = $_POST['id'];
	$link->query("DELETE FROM student WHERE id=$id") or die($link->error());
	$_SESSION['message']= "Exluido com sucesso";
	header("Location: index.php");
}
?>


<html>
<body>

<form action="delete.php" method="post">
Você tem certeza que deseja excluir?
<input type="hidden" name="id" value="<?php echo $id;?>" />
<input type="submit" name="delete">
</form>

</body>
</html>