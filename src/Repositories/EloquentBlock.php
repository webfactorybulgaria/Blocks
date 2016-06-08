<?php

namespace TypiCMS\Modules\Blocks\Repositories;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use TypiCMS\Modules\Core\Repositories\RepositoriesAbstract;

class EloquentBlock extends RepositoriesAbstract implements BlockInterface
{
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * Get all models.
     *
     * @param bool  $all  Show published or all
     * @param array $with Eager load related models
     *
     * @return Collection
     */
    public function all(array $with = [], $all = false)
    {
        $query = $this->make($with);

        if (!$all) {
            // take only translated items that are online
            $query->online();
        }

        // Query ORDER BY
        $query->order();

        // Get
        $models = $query->get();

        return $models;
    }

    /**
     * Get the content of a block.
     *
     * @param string $name unique name of the block
     * @param array  $with linked
     *
     * @return string html
     */
    public function render($name = null, array $with = [])
    {
        $block = $this->make($with)
            ->where('name', $name)
            ->online()
            ->first();

        if (!$block) {
            return;
        }

        return $block->present()->body;
    }
}
