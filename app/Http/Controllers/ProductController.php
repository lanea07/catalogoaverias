<?php

namespace App\Http\Controllers;

use App\DataTables\ProductsDataTable;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Imports\ProductsImport;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('roles:Admin');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(ProductsDataTable $dataTable)
    {
        return $dataTable->render('products.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create', [
            'product' => new Product
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $this->authorize('create', Product::class);
        $product = $request->validated();
        try {
            $product = Product::create($product);
        } catch (\Throwable $th) {
            return redirect()->route('products.create', [
                'product' => $product
            ])->with('status', $th->getMessage());
        }
        return redirect()->route('products.show', [
            'product' => $product->id
        ])->with('status', __('Saved.'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('products.show', [
            'product' => $product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('products.edit', [
            'product' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        try {
            $product->delete();
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /*Custom Methods*/
    public function massive_upload()
    {
        return view('products.massive-import');
    }

    public function process_massive_upload()
    {
        Excel::import(new ProductsImport, request()->file('file'));
        return redirect()->route('massive-upload')->with('status', __('Massive upload processed succesfully.'));
    }
}
