# Lightweight menu management

This package allows you to add simple and easy menu management to your project.
Supports nested menu items. 

## Installation

```bash
composer require vienasbaitas/menu:^1.0
```

## Usage

In order to use menu you need to create menu instance, after that just push new menu items to it.

```php
$menu = new \VienasBaitas\Menu\Menu();

$menu->item('Dashboard')->path('/dashboard')->active();
$menu->item('Settings')->path('/settings')->order(0);
$menu->item('Blog')->path('/blog')->target(\VienasBaitas\Menu\MenuItem::TARGET_BLANK);
```

After menu has been initialized you can return whole menu object to your view, alternatively you can use built-in array renderer to render your menu as an array.

```php
$renderer = new \VienasBaitas\Menu\Renderers\ArrayRenderer();

$asArray = $renderer->render($menu);
```

## Available methods

### VienasBaitas\Menu\Menu

| Method | Description | 
|---|---|
| item(string $title): VienasBaitas\Menu\MenuItem | Returns existing or creates a new item with given title. |

### VienasBaitas\Menu\MenuItem

| Method | Description | 
|---|---|
| path(?string $path): VienasBaitas\Menu\MenuItem | Assigns path to menu item. |
| active(): VienasBaitas\Menu\MenuItem | Marks menu item as active. |
| inactive(): VienasBaitas\Menu\MenuItem | Marks menu item as inactive. |
| order(int $order): VienasBaitas\Menu\MenuItem | Sets menu item order. |
| target(?string $target): VienasBaitas\Menu\MenuItem | Sets menu item's target, for example `_blank`. |
| child(string $title): VienasBaitas\Menu\MenuItem | Returns existing or creates a new child item with given title. |
