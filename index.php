<?php

try{
    $pdo = new PDO('mysql:host=localhost;port=33060;dbname=copione','homestead','secret');
    $pdo->setAttribute(PDO::ATTR_ERRMODE,  PDO::ERRMODE_EXCEPTION);
    $pdo->exec('SET NAMES  "utf8"');

}
catch  (PDOException $e)
{    $output  =  'Невозможно подключиться к серверу баз данных.' .
    $e->getMessage();
    include 'output.php';
    exit();
}

if (isset($_GET['addcopione']))
{
    include 'addcopione.php';
    exit();
}
if(isset($_POST['text'])) {
    try {
        $sql = 'INSERT INTO copionetext SET
        text = :text,
        copionedate = CURRENT_DATE()';
        $s = $pdo->prepare($sql);
        $s->bindValue(':text', $_POST['text']);
        $s->execute();
    }
    catch (PDOException  $e)
    {
        $error = 'Ошибка добавления текста ' . $e->getMessage();
        include 'error.php';
        exit();
    }
    header('Location: .');
    exit();
}
if (isset($_GET['addcopione']))
{
    include 'addcopione.php';
    exit();
}
if(isset($_POST['text'])) {
    try {
        $sql = 'INSERT INTO copionetext SET
        text = :text,
        copionedate = CURRENT_DATE()';
        $s = $pdo->prepare($sql);
        $s->bindValue(':text', $_POST['text']);
        $s->execute();
    }
    catch (PDOException  $e)
    {
        $error = 'Ошибка добавления текста ' . $e->getMessage();
        include 'error.php';
        exit();
    }
    header('Location: .');
    exit();
}


try
{
    $sql  =  'SELECT copionetext.id, text, name, email FROM copionetext
              copionetext INNER JOIN author ON authorid = author.id';
    $result = $pdo->query($sql);
}
catch  (PDOException  $e)
{
    $error  =  'Ошибка при извлечении сценариев '  .  $e->getMessage();
    include 'error.php';
    exit();
}
while  ($row = $result->fetch())
{
    $scenari[]  = [
        'id'  =>  $row['id'],
        'text'  => $row['text'],
        'name' => $row['name'],
        'email' => $row['email']
    ];
}

if(isset($_GET['deletecopione']))
{
    try
{
    $sql = 'DELETE FROM copionetext WHERE id = :id';
    $s = $pdo->prepare($sql);
    $s->bindValue(':id', $_POST['id']);
    $s->execute();
}
    catch (PDOException  $e)
    {
        $error = 'Ошибка удаления текста ' . $e->getMessage();
        include 'error.php';
        exit();
    }
    header('Location: .');
    exit();
}

include 'scenari.php';

