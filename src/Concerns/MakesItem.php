<?php

namespace VienasBaitas\Menu\Concerns;

use VienasBaitas\Menu\MenuItem;

trait MakesItem
{
    protected function makeItem(string $title): MenuItem
    {
        return new MenuItem($title);
    }
}
