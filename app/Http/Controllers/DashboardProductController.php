<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\Admin\ProductRequest;
use App\Models\ProductGallery;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class DashboardProductController extends Controller
{
    public function index()
    {
        $products = Product::with(['galleries','category'])
                    ->where('users_id', Auth::user()->id)
                    ->get();
        return view('pages.dashboard-products',[
            'products' => $products
        ]);
    }


    public function details(Request $request, $id)   
    {
        $product = Product::with((['galleries','category','user']))->findOrFail($id);
        $categories = Category::all();
                
        return view('pages.dashboard-products-details',
        [
            'product' => $product,
            'categories' => $categories
        ]);
    }
    
    public function uploadGallery(Request $request)
    {
        $data = $request->all();

        // slug dibuat otomatis
        $data['photos'] = $request->file('photos')->store('storage/assets/product', 'public');

        ProductGallery::create($data);

        return redirect()->route('dashboard-products-details', $request->products_id);
    }

    public function deleteGallery(Request $request, $id)
    {
        $item = ProductGallery::findOrFail($id);
        $item->delete();

        return redirect()->route('dashboard-products-details', $item->products_id);
    
    }
    
    public function update(ProductRequest $request, string $id)
    {
        $data = $request->all();

        $item = Product::findOrFail($id);

        $data['slug'] = Str::slug($request->name);

        $item->update($data);

        return redirect()->route('dashboard-product');
    }

    public function create()
    {
        $categories = Category::all();
        return view('pages.dashboard-products-create',[
            'categories' => $categories
        ]);
    }
    // public function store(ProductRequest $request)
    // {
    //     $data = $request->all();

    //     // slug dibuat otomatis
    //     $data['slug'] = Str::slug($request->name);

    //     $product = Product::create($data);

    //     $gallery = [
    //         'products_id' => $product->id,
    //         'photos' => $request->file('photos')->store('assets/product', 'public')
    //     ];

    //     ProductGallery::create($gallery);

    //     return redirect()->route('dashboard-product');
    // }

            public function store(ProductRequest $request)
        {
            $data = $request->all();

            // Membuat slug secara otomatis dari nama produk
            $data['slug'] = Str::slug($request->name);

            // Menyimpan data produk
            $product = Product::create($data);

            // Memastikan file foto tersedia sebelum mencoba menyimpan
            if ($request->hasFile('photos')) {
                $gallery = [
                    'products_id' => $product->id,
                    'photos' => $request->file('photos')->store('storage/assets/product', 'public')
                ];

                // Menyimpan data galeri
                ProductGallery::create($gallery);
            }

            return redirect()->route('dashboard-product');
        }

}
