<?php
session_start();
require_once("control.php");

$controller = new Control();
$items = $controller->getItems();

if (isset($_POST['mensagem']) && trim($_POST['mensagem']) !== '') {
    $msg = $_POST['mensagem'];
    $controller->addItem($msg);

    header("Location: " . $_SERVER['PHP_SELF']); // para que as alterações sejam mostradas sem a necessiade de reiniciar a pag
    exit;
}

if (isset($_POST['limpar'])) {
    unset($_SESSION['items']);
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

if (isset($_POST['pop'])) {
    $controller->popItem();
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
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

        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
            <h2>Adicione um item</h2>
            <input type="text" name="mensagem" id="">
            <input type="submit" value="Enviar">
            <input type="submit" name="limpar" value="Limpar Lista">
            <input type="submit" name="pop" value="Remover ultimo">
        </form>
        <ul>
            <?php
            foreach ($items as $nomes) {
                echo '<li>' . htmlspecialchars($nomes) . '</li>';
            }
            ?>
        </ul>
    </main>
</body>

</html>