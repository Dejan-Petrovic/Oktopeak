<?php

namespace App\Http\Controllers;

use App\Models\Comment; 
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::take(9)->get();
        $comments = Comment::where('status', Comment::STATUS_APPROVED)->get();
        return view('front', compact('products', 'comments'));
    }
}
