<?php
require 'database.php';

session_start();

$id = null;

if(!empty($_GET['id']))
{
    $id = $_REQUEST['id'];
}

if (null == $id){
	header("Location: index.php");
} else {
	$result = $link->query("SELECT * FROM student WHERE id=$id") or die($link->error());
	$row = $result->fetch_array();
   	$name = $row['name'];
	$course = $row['course'];
	
}
?>


<html>
<body>
<p><?php echo $id;?></p>
<p><?php echo $name;?></p>
<p><?php echo $course;?></p>

</body>
</html>