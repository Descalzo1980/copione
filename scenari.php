<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Scenari</title>
</head>
<body>


<p>Вот все сценарии что есть в базе данных:</p>

<?php  foreach  ($scenari  as  $copione): ?>
    <form action="?deletecopione" method="post">
           <h3>
            <?php echo htmlspecialchars($copione['text'],  ENT_QUOTES,  'UTF-8');?>
            <input type="hidden" name="id" value="<?php echo $copione['id'];?>">
            <input type="submit" value="Удалить">
        </h3>
    </form>
<?php endforeach;?>

<br>

<a href="?addcopione">Добавьте свой текст</a>
</body>
</html>






