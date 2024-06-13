<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImportArticleRequest;
use App\Http\Resources\ArticleCollection;
use App\Http\Resources\ArticleResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

// use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Displaying a list of all `Article` resources.
     *
     * @return \Illuminate\Http\Resources\Json\ResourceCollection
     */
    public function index(): ResourceCollection
    {
        return ArticleCollection::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function import(ImportArticleRequest $request): JsonResource
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
