<?php

namespace App\Http\Controllers\Panel\Office;

use App\Http\Controllers\Controller;
use App\Http\Repositories\Panel\Office\CategoryRepo;
use App\Http\Requests\Panel\Office\CategoryRequest;
use App\Http\Services\Image\ImageService;
use App\Http\Services\Panel\Office\CategoryService;
use App\Models\ItCity\Office\ServiceCategory;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Share\Services\ShareService;

class CategoryController extends Controller
{
    private string $class = ServiceCategory::class;

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
        return view('panel.office.category.index', compact(['categories']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        $categories = $this->repo->index()->get();
        return view('panel.office.category.create', compact(['categories']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CategoryRequest $request
     * @param ImageService $imageService
     * @return RedirectResponse
     */
    public function store(CategoryRequest $request, ImageService $imageService): RedirectResponse
    {
        if ($request->hasFile('image')) {
            $result = ShareService::uploadNewImage(null,$imageService,
                'panel-service-category', $request->file('image'));
            if ($result === false) {
                return redirect()->route('panel.office.category.index')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }
            $request->image = $result;
        }
        $this->service->store($request);
        return redirect()->route('panel.office.category.index')->with('swal-success', 'دسته بندی با موفقیت ذخیره شد.');
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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
