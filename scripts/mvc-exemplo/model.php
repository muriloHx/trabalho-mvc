<?php
class ItemModel
{
    public function __construct()
    {
        if (!isset($_SESSION['items'])) {
            $_SESSION['items'] = ['exemplo1'];
        }
    }

    public function addItem($item)
    {
        $_SESSION['items'][] = $item;
    }

    public function getItems()
    {
        return $_SESSION['items'];
    }
}
