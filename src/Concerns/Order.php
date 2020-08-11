<?php

namespace VienasBaitas\Menu\Concerns;

trait Order
{
    protected function nextOrder(array $items): int
    {
        $max = null;

        foreach ($items as $item) {
            if (is_null($max)) {
                $max = $item->order;
            }

            if ($item->order > $max) {
                $max = $item->order;
            }
        }

        return is_null($max) ? 0 : $max + 1;
    }
}
