<?php

namespace VienasBaitas\Menu\Contracts;

use VienasBaitas\Menu\Menu;

interface Renderer
{
    public function render(Menu $menu);
}
