<?php

namespace VienasBaitas\Menu;

class MenuItem
{
    use Concerns\Order,
        Concerns\MakesItem;

    const TARGET_BLANK = '_blank';

    public string $title;

    public ?string $path = null;

    public bool $isActive = false;

    public int $order;

    public ?string $target = null;

    public array $options = [];

    public array $children = [];

    public function __construct(string $title)
    {
        $this->title = $title;
    }

    public function path(?string $path): self
    {
        $this->path = $path;

        return $this;
    }

    public function inactive(): self
    {
        $this->isActive = false;

        return $this;
    }

    public function active(): self
    {
        $this->isActive = true;

        return $this;
    }

    public function order(int $order): self
    {
        $this->order = $order;

        return $this;
    }

    public function target(?string $target): self
    {
        $this->target = $target;

        return $this;
    }

    public function options(array $options): MenuItem
    {
        $this->options = $options;

        return $this;
    }

    public function option($key, $value): MenuItem
    {
        $this->options[$key] = $value;

        return $this;
    }

    public function child(string $title): MenuItem
    {
        if (isset($this->children[$title])) {
            return $this->children[$title];
        }

        $menuItem = $this->makeItem($title);

        $menuItem->order($this->nextOrder($this->children));

        $this->children[$title] = $menuItem;

        return $menuItem;
    }
}
