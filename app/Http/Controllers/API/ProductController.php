<?php

namespace App\Http\Controllers\API;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->id;
        $limit = $request->input('limit',6);
        $name = $request->name;
        $slug = $request->slug;
        $type = $request->type;
        $price_from = $request->price_from;
        $price_to = $request->price_to;

        if($id)
        {
            $product = Product::with('galleries')->find($id);

            if($product)
            {
                return ResponseFormatter::success($product,'Data produk berhasil di ambil');
            }
            else
            {
                return ResponseFormatter::error(null,'Data produk tidak ada', 404);
            }
        }

        if($slug)
        {
            $product = Product::with('galleries')->where('slug',$slug)->first();

            if($product)
            {
                return ResponseFormatter::success($product,'Data produk berhasil di ambil');
            }
            else
            {
                return ResponseFormatter::error(null,'Data produk tidak ada', 404);
            }
        }

        $product = Product::with('galleries');

        if($name)
        {
            $product->where('name', 'like', '%'.$name.'%');
        }

        if($type)
        {
            $product->where('type', 'like', '%'.$type.'%');
        }

        if($price_from)
        {
            $product->where('price', '>=', $price_from);
        }

        if($price_to)
        {
            $product->where('price', '<=', $price_to);
        }

        return ResponseFormatter::success($product->paginate($limit),'Data List Product Berhasil di Ambil');
    }
}
