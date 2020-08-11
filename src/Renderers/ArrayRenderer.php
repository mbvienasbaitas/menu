<?php

namespace VienasBaitas\Menu\Renderers;

use VienasBaitas\Menu\Contracts\Renderer;
use VienasBaitas\Menu\Menu;
use VienasBaitas\Menu\MenuItem;

class ArrayRenderer implements Renderer
{
    public function render(Menu $menu)
    {
        return ['items' => array_map([$this, 'renderMenuItem'], $this->sort($menu->items))];
    }

    protected function renderMenuItem(MenuItem $menuItem): array
    {
        return [
            'title' => $menuItem->title,
            'path' => $menuItem->path,
            'is_active' => $menuItem->isActive,
            'target' => $menuItem->target,
            'children' => array_map([$this, 'renderMenuItem'], $this->sort($menuItem->children))
        ];
    }

    protected function sort(array $items): array
    {
        uasort($items, function (MenuItem $a, MenuItem $b) {
            return ($a->order ?? PHP_INT_MAX) >= ($b->order ?? PHP_INT_MAX);
        });

        return array_values($items);
    }
}
