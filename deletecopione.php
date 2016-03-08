<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Удаление текста сценария</title>
    <link rel="stylesheet" href="css.css">
</head>
<body>

    <?php  foreach  ($scenari  as  $copione): ?>
    <form action="?deletecopione" method="post">
        <p>
            <?php echo htmlspecialchars($copione['text'],  ENT_QUOTES,  'UTF-8');?>
            <input type="hidden" name="id" value="<?php echo $copione['id'];?>">
            <input type="submit" value="Удалить">
        </p>
    </form>
    <?php endforeach;?>
</body>
</html>