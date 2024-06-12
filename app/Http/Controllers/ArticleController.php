<?php

namespace App\Http\Controllers;

use App\Http\Resources\ArticleCollection;
use App\Http\Resources\ArticleResource;
// use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Displaying a list of all `Article` resources.
     *
     * @return \App\Http\Resources\ArticleCollection
     */
    public function index(): ArticleCollection
    {
        return ArticleCollection::all();
    }

    // /**
    //  * Store a newly created resource in storage.
    //  */
    // public function store(Request $request)
    // {
    //     //
    // }

    /**
     * Display the specified `Article` resource.
     *
     * @param string $id article id.
     *
     * @return \App\Http\Resources\ArticleResource
     */
    public function show(string $id): ArticleResource
    {
        return ArticleResource::findOrFail($id);
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
