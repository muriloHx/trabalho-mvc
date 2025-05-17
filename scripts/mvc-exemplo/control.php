<?php
require_once("model.php");
class Control
{
    protected $modelo;
    public function __construct()
    {
        $this->modelo = new ItemModel();
    }
    public function getItems()
    {
        return ($this->modelo)->getItems();
    }
    public function addItem(string $item)
    {
        $this->modelo->addItem($item);
    }
    public function popItem()
    {
        $this->modelo->popItem();
    }
}
