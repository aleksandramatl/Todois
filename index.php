<?php
session_start();
require_once 'src/Task.php';

if (isset($_POST['delete'])) {
    session_unset();
}

if (isset($_SESSION['taskList'])) {
    $taskTable = unserialize($_SESSION['taskList']);
} else {
    $taskTable = array();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['name']) && isset($_POST['description']) && $_POST['name'] != '' && $_POST['description'] != '') {
        $name = trim($_POST['name']);
        $description = trim($_POST['description']);
        if (isset($_POST['prioryty']) && isset($_POST['deadline'])) {
            $task = new Task($name, $description, $_POST['prioryty'], $_POST['deadline']);
        } elseif (isset($_POST['prioryty'])) {
            $task = new Task($name, $description, $_POST['prioryty']);
        } else {
            $task = new Task($name,$description);
        }
        if (!isset($_SESSION['taskList'])) {
            $taskTable = array();
            $taskTable[] = $task;
            $_SESSION['taskList'] = serialize($taskTable);
        } else {
            $taskTable[] = $task;
            $_SESSION['taskList'] = serialize($taskTable);
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['finish'])) {
    foreach ($taskTable as $value) {
        if ($value->getName() == $_GET['finish']) {
            $value->finishTask();
        }
    }
    $_SESSION['taskList'] = serialize($taskTable);
}
?>
<!DOCTYPE html>
<html>
  <head>
      <meta charset="utf-8">
      <title>Todois</title>
      <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
  </head>
  <body>

   <div class="container" style="margin-top: 25px">
    <form action="#" method="POST">
        <input type="submit" class="btn btn-warning btn-lg" name="delete" value="Usun zadania">
    </form>
</div>
<div class="container" style="margin-top: 25px">
        <form action="addTask.php" method="POST">
            <input type="submit" class="btn btn-primary btn-lg" name="addTask" value="Dodaj zadanie">
            <input type="submit" class="btn btn-primary btn-lg" name="addPriorytyTask" value="Dodaj zadanie z priorytetem">
            <input type="submit" class="btn btn-primary btn-lg" name="addDatePriorytyTask" value="Dodaj zadanie z priorytetem i terminem">
        </form>
        <h2>Lista Twoich zadań:</h2><br>
        <table class="table table-striped">
            <tr>
                <th>Priorytet</th>
                <th>Nazwa zadania</th>
                <th>Treść zadania</th>
                <th>Termin</th>
                <th></th>
            </tr>
            <?php
            if (empty($taskTable)) {
                echo "Brak zadań"."<br><br>";
            } else {
                foreach ($taskTable as $key => $value) {
                    echo '<tr>';
                    echo $value->displayPrioryty();
                    echo $value->viewName();
                    echo $value->viewDescription();
                    echo $value->displayDate();
                    echo '<td><form action="#" method="GET"><input type="submit" class="btn btn-info" value="Zakończ">
                          <input type="hidden" name="finish" value="'.$value->getName().'"></form></td>';
                    echo '</tr>';
                }
            }
            ?>
        </table>
</div>

  </body>
</html>
