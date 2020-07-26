<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
   public function show( $id){
    $product = Product::with('category')->findOrFail($id);

//code in model product
    $similar_products = $product->getSimilar();


    return view('product-details',[
        'product'=>$product,
        'similar_products'=>$similar_products,
    ]);
   }
}
