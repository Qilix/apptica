<?php

namespace App\Category\Presenters;

use App\Category\Resources\CategoryResource;
use App\Common\Models\Category;

class CategoryPresenter
{

    public function present(Category $category) : CategoryResource
    {
        $resource = new CategoryResource();

        $resource->category_id = $category->category_id;
        $resource->position = $category->position;

        return $resource;
    }

    public function collect($categories): array
    {
        return $categories->map(function (Category $category) {
            return $this->present($category);
        })->toArray();
    }
}
