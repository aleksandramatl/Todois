<?php
session_start();

?>

<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="utf-8" />
    <title>Todois</title>
</head>
<body>
<form action="index.php" method="POST">
    <fieldset>
        <legend>Dodaj zadanie</legend>
        <p>Nazwa zadania</p>
        <input type="text" name="name"> <br/>
        <p>Treść zadania</p>
        <input type="text" name="description">
        <input type="submit" value="Wyślij">

    </fieldset>
</form>


</body>
</html>