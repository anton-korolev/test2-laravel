<?php

namespace App\Http\Controllers;

use App\Http\Requests\KeywordRequest;
use App\Http\Resources\ArticleListResource;
use App\Http\Resources\ArticleResource;
use App\Http\Resources\ArticleSearchResource;
use Illuminate\Http\Resources\Json\JsonResource;

// use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Displaying a list of all `Article` resources.
     *
     * @return \Illuminate\Http\Resources\Json\ResourceCollection
     */
    public function index(): JsonResource
    {
        return ArticleListResource::list();
    }

    /**
     * Displaying a list of all `Article` resources.
     *
     * @return \Illuminate\Http\Resources\Json\ResourceCollection
     */
    public function search(KeywordRequest $request): JsonResource
    {
        return ArticleSearchResource::search($request);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function import(KeywordRequest $request): JsonResource
    {
        return ArticleResource::import($request);
    }

    /**
     * Display the specified `Article` resource.
     *
     * @param string $id article id.
     *
     * @return \Illuminate\Http\Resources\Json\JsonResource
     */
    public function show(string $id): JsonResource
    {
        return ArticleResource::findById($id);
    }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(Request $request, string $id)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy(string $id)
    // {
    //     //
    // }
}
