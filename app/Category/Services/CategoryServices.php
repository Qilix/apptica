<?php

namespace App\Category\Services;

use App\Common\Models\Category;

class CategoryServices
{

    public function saveCategory($array)
    {

        for (reset($array); ($category_id = key($array)); next($array)) {
            foreach ($array[$category_id] as $date => $position) {

                $category = new Category();

                $category->category_id = $category_id;
                $category->position = $position;
                $category->date = $date;

            $category->save();
            }
        }
    }
}
