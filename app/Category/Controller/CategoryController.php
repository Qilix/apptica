<?php

namespace App\Category\Controller;

use App\Category\Actions\CategoryParserAction;

use App\Category\Presenters\CategoryPresenter;
use App\Category\Queries\CategoryQueries;
use App\Category\Services\CategoryServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;

class CategoryController
{
    public function getTop(Request $request, CategoryQueries $queries, CategoryPresenter $presenter)
    {
        $date = $request->query('date');
        $categories = $queries->getTopCategories($date);

        // storage\logs\laravel.log
        Log::info('Showing the categories: '.$categories);
        return Response::json([
            'status_code' => 200,
            'message' => 'ok',
            'data' => $presenter->collect($categories)
        ]);

    }

    public function save(CategoryServices $service, CategoryParserAction $action)
    {
        $array = $action->getMaxPositionArray();
        $service->saveCategory($array);
        return Response::json(['Success']);

    }
}
