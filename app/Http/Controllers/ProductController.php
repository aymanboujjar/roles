<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Null_;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('product.show');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        request()->validate([
            "name"=>"required",
            "description"=>"required",
            "image" => "nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
            "pdf" => "nullable|mimes:pdf|max:10000", 
       
        ]);
        
        $imageName = Null;
        if ($request->hasFile('image')) {
            $image = $request->image;
            
            
            $imageName = hash("sha256", file_get_contents($image)) . "." . $image->getClientOriginalExtension();
            
            
            $image->move(storage_path("app/public/images"), $imageName);
        }
        $fileName = Null;
        if ($request->hasFile('pdf')) {
            $file = $request->file;
            
            
            $fileName = hash("sha256", file_get_contents($file)) . "." . $file->getClientOriginalExtension();
            
            
            $file->move(storage_path("app/public/pdf"), $fileName);
        }
       Product::create([
            "name"=>$request->name,
            "description"=>$request->description,
            "image" => $imageName,
            "file" => $fileName,
        ]);
        return redirect(route('product'));

    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
        $product->delete();
        return back();
    }
}
