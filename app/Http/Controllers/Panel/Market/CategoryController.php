<?php

namespace App\Http\Controllers\Panel\Market;

use App\Http\Controllers\Controller;
use App\Http\Repositories\Panel\Market\CategoryRepo;
use App\Http\Requests\Panel\Market\CategoryRequest;
use App\Http\Services\Image\ImageService;
use App\Http\Services\Panel\Market\CategoryService;
use App\Models\Market\ProductCategory;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Share\Services\ShareService;

class CategoryController extends Controller
{
    private string $class = ProductCategory::class;

    public CategoryRepo $repo;
    public CategoryService $service;

    public function __construct(CategoryRepo $categoryRepo, CategoryService $categoryService)
    {
        $this->repo = $categoryRepo;
        $this->service = $categoryService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $categories = $this->repo->index()->paginate(5);
        return view('panel.market.category.index', compact(['categories']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $categories = $this->repo->index()->get();
        return view('panel.market.category.create', compact(['categories']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CategoryRequest $request
     * @return RedirectResponse
     */
    public function store(CategoryRequest $request, ImageService $imageService): RedirectResponse
    {
        if ($request->hasFile('image')) {
            $request->image = ShareService::uploadImage($request->file('image'), 'panel-post-category',
                'panel.market.category.index', $imageService);
        }

        $this->service->store($request);
        return redirect()->route('panel.market.category.index')->with('swal-success', 'دسته بندی با موفقیت اضافه شد.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */
    public function edit(int $id)
    {
        $postCategory = $this->repo->findById($id);
        $categories = $this->repo->index()->whereNull('parent_id')->get()->except($id);

        return view('panel.market.category.edit', compact(['categories', 'postCategory']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CategoryRequest $request
     * @param ImageService $imageService
     * @param int $id
     * @return RedirectResponse
     */
    public function update(CategoryRequest $request, ImageService $imageService, int $id): RedirectResponse
    {
        $category = $this->repo->findById($id);
        if ($request->hasFile('image')) {
            $result = ShareService::uploadNewImage($category->image,$imageService,
                'panel-post-category', $request->file('image'));
            if ($result === false) {
                return redirect()->route('panel.market.category.index')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }
            $request->image = $result;
        } else {
            $request->image = ShareService::useCurrentImage($request->currentImage, $category->image);
        }
        $this->service->update($request, $id);
        return redirect()->route('panel.market.category.index')->with('swal-success', 'دسته بندی با موفقیت ویرایش شد.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        $this->repo->delete($id);
        return redirect()->route('panel.market.category.index')->with('swal-success', 'دسته بندی با موفقیت حذف شد.');
    }

    /**
     * @param int $id
     * @return RedirectResponse
     */
    public function changeStatus(int $id): RedirectResponse
    {
        $category = $this->repo->findById($id);
        $this->repo->changeStatus($category);

        return back()->with('swal-success', 'وضعیت دسته بندی با موفقیت تغییر کرد');
    }
}
