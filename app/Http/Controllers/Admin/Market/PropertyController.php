<?php

namespace App\Http\Controllers\Admin\Market;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Market\CategoryAttributeRequest;
use App\Models\Market\ProductCategory;
use App\Models\Market\CategoryAttribute;

class PropertyController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:permission-product-properties')->only(['index']);
        $this->middleware('can:permission-product-property-create')->only(['create', 'store']);
        $this->middleware('can:permission-product-property-edit')->only(['edit', 'update']);
        $this->middleware('can:permission-product-property-delete')->only(['destroy']);
        $this->middleware('can:permission-product-property-status')->only(['status']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category_attributes = CategoryAttribute::all();
        return view('admin.market.property.index', compact('category_attributes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category_attributes = CategoryAttribute::query()->whereNull('parent_id')->get();
        $productCategories = ProductCategory::all();
        return view('admin.market.property.create', compact('productCategories', 'category_attributes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryAttributeRequest $request)
    {
        $inputs = $request->all();
        $attribute = CategoryAttribute::create($inputs);
        return redirect()->route('admin.market.property.index')->with('swal-success', 'فرم جدید شما با موفقیت ثبت شد');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoryAttribute $categoryAttribute)
    {
        $category_attributes = CategoryAttribute::query()->whereNull('parent_id')->get();
        $productCategories = ProductCategory::all();
        return view('admin.market.property.edit', compact('categoryAttribute', 'productCategories', 'category_attributes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryAttributeRequest $request, CategoryAttribute $categoryAttribute)
    {
        $inputs = $request->all();
        $categoryAttribute->update($inputs);
        return redirect()->route('admin.market.property.index')->with('swal-success', 'فرم شما با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoryAttribute $categoryAttribute)
    {
        $result = $categoryAttribute->delete();
        return redirect()->route('admin.market.property.index')->with('swal-success', 'فرم شما با موفقیت حذف شد');
    }
}
