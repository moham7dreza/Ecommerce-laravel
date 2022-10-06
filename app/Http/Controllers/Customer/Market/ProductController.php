<?php

namespace App\Http\Controllers\Customer\Market;

use App\Models\Market\AmazingSale;
use App\Models\Market\ProductCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Market\Product;
use App\Models\Content\Comment;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function product(Product $product)
    {
        $relatedProducts = Product::all();
        // Auth::loginUsingId(15);
        return view('customer.market.product.product', compact('product', 'relatedProducts'));
    }

    public function addComment(Product $product, Request $request)
    {
        $request->validate([
            'body' => 'required|max:2000'
        ]);

        $inputs['body'] = str_replace(PHP_EOL, '<br/>', $request->body);
        $inputs['author_id'] = Auth::user()->id;
        $inputs['commentable_id'] = $product->id;
        $inputs['commentable_type'] = Product::class;
        Comment::create($inputs);
        return back();
    }


    public function addToFavorite(Product $product)
    {
        if (Auth::check()) {
            $product->user()->toggle([Auth::user()->id]);
            if ($product->user->contains(Auth::user()->id)) {
                return response()->json(['status' => 1]);
            } else {
                return response()->json(['status' => 2]);
            }
        } else {
            return response()->json(['status' => 3]);
        }
    }

    public function bestOffers()
    {
        $productsWithActiveAmazingSales = AmazingSale::where('start_date', '<', Carbon::now())->where('end_date', '>', Carbon::now())->where('status', 1)->
        where('percentage', '>=', 10)->get();
        return view('customer.market.product.best-offers', compact('productsWithActiveAmazingSales'));
    }

    public function categoryProducts(ProductCategory $productCategory)
    {
        $products = $productCategory->products()->orderBy('id', 'desc')->get();
        return view('customer.market.product.category-products', compact('products'));
    }
}
