<?php

namespace VienasBaitas\Menu\Tests\Renderers;

use PHPUnit\Framework\TestCase;
use VienasBaitas\Menu\Menu;
use VienasBaitas\Menu\MenuItem;
use VienasBaitas\Menu\Renderers\ArrayRenderer;

class ArrayRendererTest extends TestCase
{
    public function testCorrectlyRenderingMenu(): void
    {
        $menu = new Menu();

        $settings = $menu->item('Settings')->order(1)->path('/settings')->inactive();

        $menu->item('Dashboard')->order(0)->path('/dashboard')->active();

        $settings->child('General')->path('/settings/general')->target(MenuItem::TARGET_BLANK);

        $menu->item('Settings')->child('Advanced');

        $menu->item('Settings')->child('Extras');

        $menu->item('Settings')->child('Advanced')->child('Generic');

        $this->assertEquals([
            'items' => [
                [
                    'title' => 'Dashboard',
                    'path' => '/dashboard',
                    'is_active' => true,
                    'target' => null,
                    'children' => [],
                ],
                [
                    'title' => 'Settings',
                    'path' => '/settings',
                    'is_active' => false,
                    'target' => null,
                    'children' => [
                        [
                            'title' => 'General',
                            'path' => '/settings/general',
                            'is_active' => false,
                            'target' => MenuItem::TARGET_BLANK,
                            'children' => [],
                        ],
                        [
                            'title' => 'Advanced',
                            'path' => null,
                            'is_active' => false,
                            'target' => null,
                            'children' => [
                                [
                                    'title' => 'Generic',
                                    'path' => null,
                                    'is_active' => false,
                                    'target' => null,
                                    'children' => [],
                                ],
                            ],
                        ],
                        [
                            'title' => 'Extras',
                            'path' => null,
                            'is_active' => false,
                            'target' => null,
                            'children' => [],
                        ],
                    ],
                ],
            ],
        ], (new ArrayRenderer())->render($menu));
    }
}
