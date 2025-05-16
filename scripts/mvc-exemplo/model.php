<?php
class ItemModel
{
    private $items = ['exemplo1']; // Armazena os itens
    // Adiciona um item à lista
    public function addItem($item)
    {
        array_push($this->items, $item);
    }

    // Retorna todos os itens
    public function getItems()
    {
        return $this->items;
    }
}
