<?php
require_once("control.php");
$controller = new Control();

$items = $controller->getItems();

if (isset($_POST['mensagem'])) {
    $msg = $_POST['mensagem'];
    $controller->addItem($msg);
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>

<body>
    <main>
        <ul>
            <?php
            foreach ($items as $nomes) {
                echo '<li>' . $nomes . '</li>';
            }
            ?>
        </ul>
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
            <h2>Adicione um item</h2>
            <input type="text" name="mensagem" id="">
            <input type="submit" value="Enviar">
        </form>
    </main>
</body>

</html>