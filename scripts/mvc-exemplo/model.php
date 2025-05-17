<?php
class ItemModel
{
    public function __construct()
    {
        if (!isset($_SESSION['items'])) {
            $_SESSION['items'] = [];
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
    public function popItem()
    {
        if ((count($_SESSION['items']) > 0)) {
            array_pop($_SESSION['items']);
        }
    }
}
