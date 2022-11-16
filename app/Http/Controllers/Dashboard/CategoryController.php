<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Repositories\Dashboard\CategoryRepo;
use App\Http\Requests\Dashboard\CategoryRequest;
use App\Http\Services\Dashboard\CategoryService;
use App\Http\Services\Image\ImageService;
use App\Models\Content\PostCategory;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Share\Services\ShareService;

class CategoryController extends Controller
{
    private string $class = PostCategory::class;

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
        return view('adminto.category.index', compact(['categories']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $categories = $this->repo->index()->get();
        return view('adminto.category.create', compact(['categories']));
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
            $request->image = ShareService::uploadImage($request->file('image'), 'adminto-post-category',
                'adminto.category.index', $imageService);
        }

        $this->service->store($request);
        return redirect()->route('adminto.category.index')->with('swal-success', 'دسته بندی با موفقیت اضافه شد.');
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
        $categories = $this->repo->index()->where('id', '!=', $postCategory->id)->get();

        return view('adminto.category.edit', compact(['categories', 'postCategory']));
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
                'adminto-post-category', $request->file('image'));
            if ($result === false) {
                return redirect()->route('adminto.category.index')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }
            $request->image = $result;
        } else {
            $request->image = ShareService::useCurrentImage($request->currentImage, $category->image);
        }
        $this->service->update($request, $id);
        return redirect()->route('adminto.category.index')->with('swal-success', 'دسته بندی با موفقیت ویرایش شد.');
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
        return redirect()->route('adminto.category.index')->with('swal-success', 'دسته بندی با موفقیت حذف شد.');
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function changeStatus($id): RedirectResponse
    {
        $category = $this->repo->findById($id);
        $this->repo->changeStatus($category);

        return back()->with('swal-success', 'وضعیت دسته بندی با موفقیت تغییر کرد');
    }
}
