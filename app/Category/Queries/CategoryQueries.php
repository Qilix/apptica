<?php

namespace App\Category\Queries;

use App\Common\Models\Category;

class CategoryQueries{

    public function getTopCategories($date)
    {
        return Category::where('date',$date)->get();

    }
}
