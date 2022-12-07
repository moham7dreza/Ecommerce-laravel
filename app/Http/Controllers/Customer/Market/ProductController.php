<?php

namespace App\Http\Controllers\Customer\Market;

use App\Http\Controllers\Controller;
use App\Models\Content\Comment;
use App\Models\Market\AmazingSale;
use App\Models\Market\Brand;
use App\Models\Market\Product;
use App\Models\Market\ProductCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
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
        // برندها
        $brands = Brand::all();
        $productsWithActiveAmazingSales = AmazingSale::where('start_date', '<', Carbon::now())->where('end_date', '>', Carbon::now())->where('status', 1)->
        where('percentage', '>=', 1)->get();
        return view('customer.market.product.best-offers', compact('productsWithActiveAmazingSales', 'brands'));
    }

    public function categoryProducts(ProductCategory $productCategory)
    {
//        if ($productCategory->children()) {
//            $categoryChilds = $productCategory->children()->orderBy('id', 'desc')->get();
//            return view('customer.market.product.category-products', compact('categoryChilds'));
//        }
        // برندها
        $brands = Brand::all();
        $products = $productCategory->products()->orderBy('id', 'desc')->get();
        return view('customer.market.product.category-products', compact('productCategory', 'products', 'brands'));
    }


    public function queryProducts()
    {
        // برندها
        $brands = Brand::all();
        $queryResult = $queryTitle = null;
        if (isset(request()->inputQuery)) {
            switch (request()->inputQuery) {
                case 'productsWithActiveAmazingSales':
                    $queryTitle = 'محصولات فروش ویژه';
                    $amazingSales = AmazingSale::query()->where([
                        ['start_date', '<', Carbon::now()],
                        ['end_date', '>', Carbon::now()],
                        ['status', 1],
                        ['percentage', '>=', 1]
                    ])->get();
                    $queryResult = collect();
                    foreach ($amazingSales as $amazingSale) {
                        $queryResult->push($amazingSale->product);
                    }
                    break;
                case 'mostVisitedProducts':
                    $queryTitle = 'پربازدبدترین کالاها';
                    // پربازدید ترین کالاها
                    $queryResult = Product::query()->latest()->take(10)->get();
                    break;
                case 'offerProducts':
                    $queryTitle = 'محصولات پیشنهادی';
                    // کالاهای پیشنهادی
                    $queryResult = Product::query()->latest()->take(10)->get();
                    break;
                case 'newestProducts':
                    $queryTitle = 'جدیدترین محصولات';
                    $queryResult = Product::query()->latest()->take(10)->get();
                    break;
                default:

            }
        }

        return view('customer.market.product.query-products', compact('queryResult', 'queryTitle',
            'brands'));
    }
}
