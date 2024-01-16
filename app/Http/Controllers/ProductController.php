<?php

namespace App\Http\Controllers;

use App\DataTables\ProductsDataTable;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Imports\ProductsImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('roles:Admin', ['except' => ['show']]);
        $this->middleware('verified', ['except' => ['show']]);
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
            if (isset($product['images'])) {
                foreach ($product['images'] as $key => $image) {
                    $image->storeAs(
                        "catalogoaverias/{$product['ticket']}",
                        'File' . '_' . $key . '.' . $image->extension(),
                        'google'
                    );
                }
                $product += ['img_path' => "catalogoaverias/{$product['ticket']}"];
            }
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
        if (Storage::disk('google')->exists("catalogoaverias/{$product['ticket']}")) {
            $images = Storage::disk('google')->files($product->img_path);
            foreach ($images as $key => $image) {
                $images[$key] = base64_encode(Storage::disk('google')->get($image));
            }
        } else {
            $images = [];
        }
        return view('products.show', [
            'product' => $product,
            'images' => $images
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
        $this->authorize('update', $product);
        $validated = $request->validated();

        try {
            if ($request->file('images')) {
                foreach ($validated['images'] as $key => $image) {
                    $image->storeAs(
                        "catalogoaverias/{$product['ticket']}",
                        $image->getClientOriginalName(),
                        'google'
                    );
                }
                $validated += ['img_path' => "catalogoaverias/{$product['ticket']}"];
            }
            $product = tap($product)->update($validated);
            $images = Storage::disk('google')->files($product->img_path);
            foreach ($images as $key => $image) {
                $images[$key] = Storage::disk('google')->url($image);
            }
        } catch (\Throwable $th) {
            return redirect()->route('products.edit', [
                'product' => $product
            ])->with('status', $th->getMessage());
        }
        return view('products.show', [
            'product' => $product,
            'images' => $images
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        try {
            $product->delete();
            if ($product->img_path) {
                Storage::disk('google')->deleteDirectory($product->img_path);
            }
            return redirect()->route('products.index');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /*Custom Methods*/
    public function massiveUpload()
    {
        return view('products.massive-import');
    }

    public function processMassiveUpload()
    {
        Excel::import(new ProductsImport, request()->file('file'));
        return redirect()->route('massive-upload')->with('status', __('Massive upload processed succesfully.'));
    }

    public function deleteImage(Request $request)
    {
        $product = Product::findOrFail($request->product_id);
        Storage::disk('google')->delete($request->imgPath);
        $images = Storage::disk('google')->files($product->img_path);
        if (!$images) {
            Storage::disk('google')->deleteDirectory($product->img_path);
            $product->update(['img_path' => null]);
        }
        return redirect()->back();
    }
}
