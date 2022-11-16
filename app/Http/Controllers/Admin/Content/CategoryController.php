<?php

namespace App\Http\Controllers\Admin\Content;

use App\Http\Repositories\Admin\Content\PostCategoryRepo;
use App\Http\Services\Admin\Content\PostCategoryService;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Models\Content\PostCategory;
use App\Http\Services\Image\ImageService;
use App\Http\Requests\Admin\Content\PostCategoryRequest;
use Share\Services\ShareService;

class CategoryController extends Controller
{
    private string $class = PostCategory::class;

    public PostCategoryRepo $categoryRepo;
    public PostCategoryService $categoryService;

    public function __construct(PostCategoryRepo $postCategoryRepo, PostCategoryService $postCategoryService)
    {
        $this->categoryRepo = $postCategoryRepo;
        $this->categoryService = $postCategoryService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     * @throws AuthorizationException
     */
    public function index()
    {
        $this->authorize('postCategorySectionAccess', $this->class);
        $postCategories = $this->categoryRepo->index()->orderBy('created_at', 'desc')->paginate(5);
        return view('admin.content.category.index', compact('postCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        // $imageCache = new ImageCacheService();
        // return $imageCache->cache('1.png');

        $categories = $this->categoryRepo->index()->where('status', $this->class::STATUS_ACTIVE)->get();
        return view('admin.content.category.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PostCategoryRequest $request
     * @param ImageService $imageService
     * @return RedirectResponse
     */
    public function store(PostCategoryRequest $request, ImageService $imageService): RedirectResponse
    {
        $inputs = $request->all();

        if ($request->hasFile('image')) {
            $inputs['image'] = ShareService::uploadImage($request->file('image'), 'post-category',
                'admin.content.category.index', $imageService);
        }

        $postCategory = $this->categoryService->store($inputs);
        return ShareService::redirect('admin.content.category.index', 'دسته بندی شما با موفقیت ثبت شد');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param PostCategory $postCategory
     * @return Application|Factory|View
     */
    public function edit(PostCategory $postCategory)
    {
        $parent_categories = $this->categoryRepo->getParentCategories($postCategory->id);
        return view('admin.content.category.edit', compact(['postCategory', 'parent_categories']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PostCategoryRequest $request
     * @param PostCategory $postCategory
     * @param ImageService $imageService
     * @return RedirectResponse
     */
    public function update(PostCategoryRequest $request, PostCategory $postCategory, ImageService $imageService): RedirectResponse
    {
        $inputs = $request->all();

        // $inputs['slug'] = null;

        $inputs = ShareService::updateImage($request, 'post-category', 'admin.content.category.index',
            $imageService, $postCategory, $inputs);
        $this->categoryService->update($postCategory, $inputs);
        return ShareService::redirect('admin.content.category.index', 'دسته بندی شما با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param PostCategory $postCategory
     * @return RedirectResponse
     */
    public function destroy(PostCategory $postCategory): RedirectResponse
    {
        $this->categoryService->destroy($postCategory);
        return ShareService::redirect('admin.content.category.index', 'دسته بندی شما با موفقیت حذف شد');
    }


    public function status(PostCategory $postCategory)
    {
//        $postCategory = $this->categoryRepo->findById($postCategory->id);
        ShareService::changeStatus($postCategory);
    }
}
