<?php

namespace VienasBaitas\Menu;

class Menu
{
    use Concerns\Order,
        Concerns\MakesItem;

    public array $items = [];

    public function item(string $title): MenuItem
    {
        if (isset($this->items[$title])) {
            return $this->items[$title];
        }

        $menuItem = $this->makeItem($title);

        $menuItem->order($this->nextOrder($this->items));

        $this->items[$title] = $menuItem;

        return $menuItem;
    }
}
