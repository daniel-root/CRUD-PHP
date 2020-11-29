<html>
<body>
<?php
session_start();
if (isset($_SESSION['message'])):
	echo $_SESSION['message'];
	unset($_SESSION['message']);

endif
?>

 <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Curso</th>
	    <th>Ações</th>
        </tr>

        
<?php
require 'database.php';
$result = $link->query("SELECT * FROM student") or die($link->error);
foreach($result as $row)
{
	    echo '<tr>';
            echo '<td>'. $row['id'] . '</td>';
            echo '<td>'. $row['name'] . '</td>';
            echo '<td>'. $row['course'] . '</td>';
            echo '<td>';
            echo '<a href="read.php?id='.$row['id'].'">Ver</a>';
	    echo ' ';
            echo '<a href="update.php?id='.$row['id'].'">Atualizar</a>';
	    echo ' ';
            echo '<a href="delete.php?id='.$row['id'].'">Excluir</a>';
	    echo '</td>';
	    echo '</tr>';
}
?>

    </table>
<?php

echo '<a href="create.php">Novo</a>';
?>
</body>
</html>