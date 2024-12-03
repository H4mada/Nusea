<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductGalleryRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\ProductGallery;
use Yajra\DataTables\Facades\DataTables;

class ProductGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $query = ProductGallery::with(['product']);

            return Datatables()->of($query)
                ->addColumn('action', function($item) {
                    return '
                        <div class="btn-group">
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle mr-1 mb-1"
                                    type="button"
                                    data-toggle="dropdown">
                                    Aksi
                                </button>
                                <div class="dropdown-menu">
                                    <form action="'. route('product-gallery.destroy', $item->id) .'" method="POST">
                                        '. method_field('delete') . csrf_field() .'
                                        <button type="submit" class="dropdown-item text-danger">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    ';
                })
                ->editColumn('photos', function($item) {
                    return $item->photos ? '<img src="'. Storage::url($item->photos) .'" style="max-height: 88px;" />' : '';
                })
                ->rawColumns(['action', 'photos'])
                ->make(true);
        }

        return view('pages.admin.product-gallery.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::all();
        return view('pages.admin.product-gallery.create', [
            'products' => $products
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductGalleryRequest $request)
    {
        $data = $request->all();

        // Menyimpan foto galeri produk
        if ($request->hasFile('photos')) {
            $data['photos'] = $request->file('photos')->store('assets/product/gallery', 'public');
        }

        ProductGallery::create($data);

        return redirect()->route('product-gallery.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Ambil data galeri produk yang ingin diedit
        $item = ProductGallery::findOrFail($id);
        $products = Product::all();

        return view('pages.admin.product-gallery.edit', [
            'item' => $item,
            'products' => $products
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductGalleryRequest $request, string $id)
    {
        $item = ProductGallery::findOrFail($id);
        $data = $request->all();

        // Menangani foto baru jika ada
        if ($request->hasFile('photos')) {
            // Hapus foto lama jika ada
            if ($item->photos) {
                Storage::delete('public/' . $item->photos);
            }

            // Upload foto baru
            $data['photos'] = $request->file('photos')->store('assets/product/gallery', 'public');
        }

        $item->update($data);

        return redirect()->route('product-gallery.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = ProductGallery::findOrFail($id);

        // Hapus foto galeri jika ada
        if ($item->photos) {
            Storage::delete('public/' . $item->photos);
        }

        $item->delete();

        return redirect()->route('product-gallery.index');
    }
}