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
    public function search(string $query)
    {
        $allProducts = Product::where(function ($q) use ($query) {
            $q->where('categoria', 'like', '%' . $query . '%')
                ->orWhere('descripcion', 'like', '%' . $query . '%');
        })->get();
        return view('search.results', [
            'query' => $query,
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
