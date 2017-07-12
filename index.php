<?php
session_start();
require_once 'Task.php';
/*
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo ('POST');
    $name = isset($_POST['name']) ? $_POST['name'] : null;
    $description = isset($_POST['description']) ? $_POST['description'] : null;
        //if (isset($_POST['name']) && isset($_POST['description'])) {
           // new Task($name, $description) = serialize(new Task($name, $description));
        } else {
            echo("Niepoprawnie wprowadzone zadanie");
      //  }
}
*/
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = isset($_POST['name']) ? $_POST['name'] : null;
    $description = isset($_POST['description']) ? $_POST['description'] : null;
   // echo ('<br>');
   // echo $name;
   // echo ('<br>');
   // echo $description;

} else {
    echo("Niepoprawnie wprowadzone zadanie");
}


/*
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
$name = isset($_POST['name']) ? $_POST['name'] : null;
$description = isset($_POST['description']) ? $_POST['description'] : null;
if ($name && strlen($name)> 0 && $description && strlen($description >0)){
$_SESSION['tasks'][$name] = serialize(new Task($name, $description));
}else{
echo("Niepoprawnie wprowadzone zadanie");
}
}

?>
*/

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>To Do List</title>
</head>
<body>

<div style="background-color: #B4C6CC; border-radius: 5px; border 5px solid #DDE9ED;
height: 40px; width: 80px; margin: 0 auto; text-align: center; text-decoration: none;">
    <a href="Form.php">Tu stwórz zadanie</a>
</div>

</body>
</html>
