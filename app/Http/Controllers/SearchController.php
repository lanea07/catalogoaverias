<?php

namespace App\Http\Controllers;

use App\Models\Product;

class SearchController extends Controller
{

    /**
     * Returns all products for a given category in search query param
     * 
     * @param string $string
     */
    public function search(string $q)
    {
        $allProducts = Product::where('categoria', 'like', '%' . $q . '%')->get();
        return view('search.results', [
            'query' => $q,
            'allProducts' => $allProducts
        ]);
    }

    public function categories()
    {
        $categories = Product::distinct('categoria')
        ->select('categoria')
        ->orderBy('categoria')
        ->get();
        return view('search.categories', [
            'categories' => $categories
        ]);
    }
}
