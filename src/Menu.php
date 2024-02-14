<?php

namespace VienasBaitas\Menu;

class Menu
{
    use Concerns\Order,
        Concerns\MakesItem;

    public array $options = [];

    public array $items = [];

    public function options(array $options): Menu
    {
        $this->options = [];

        foreach ($options as $key => $value) {
            $this->option($key, $value);
        }

        return $this;
    }

    public function option($key, $value): Menu
    {
        $this->options[$key] = $value;

        return $this;
    }

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
