<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Repositories\Panel\BrandRepo;
use App\Http\Repositories\Panel\CategoryRepo;
use App\Http\Requests\Panel\BrandRequest;
use App\Http\Services\Image\ImageService;
use App\Http\Services\Panel\BrandService;
use App\Models\Market\Brand;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Share\Services\ShareService;

class BrandController extends Controller
{
    private string $class = Brand::class;

    public BrandRepo $repo;
    public BrandService $service;

    public function __construct(BrandRepo $brandRepo, BrandService $brandService)
    {
        $this->repo = $brandRepo;
        $this->service = $brandService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $brands = $this->repo->index()->paginate(5);
        return view('panel.brand.index', compact(['brands']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(CategoryRepo $categoryRepo)
    {
        $categories = $categoryRepo->getActiveCategories()->get();
        return view('panel.brand.create', compact(['categories']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param BrandRequest $request
     * @param ImageService $imageService
     * @return RedirectResponse
     */
    public function store(BrandRequest $request, ImageService $imageService): RedirectResponse
    {
        if ($request->hasFile('logo')) {
            $request->image = ShareService::uploadImage($request->file('logo'), 'panel-brand',
                'panel.brand.index', $imageService);
        }

        $this->service->store($request);
        return redirect()->route('panel.brand.index')->with('swal-success', 'برند با موفقیت اضافه شد.');
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
     * @param CategoryRepo $categoryRepo
     * @param int $id
     * @return Application|Factory|View
     */
    public function edit(CategoryRepo $categoryRepo, int $id)
    {
        $brand = $this->repo->findById($id);
        $categories = $categoryRepo->getActiveCategories()->get();

        return view('panel.brand.edit', compact(['categories', 'brand']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param BrandRequest $request
     * @param ImageService $imageService
     * @param int $id
     * @return RedirectResponse
     */
    public function update(BrandRequest $request,ImageService $imageService,int $id): RedirectResponse
    {
        $brand = $this->repo->findById($id);
        if ($request->hasFile('image')) {
            $result = ShareService::uploadNewImage($brand->image,$imageService,
                'panel-brand', $request->file('image'));
            if ($result === false) {
                return redirect()->route('panel.brand.index')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }
            $request->image = $result;
        } else {
            $request->image = ShareService::useCurrentImage($request->currentImage, $brand->image);
        }
        $this->service->update($request, $id);
        return redirect()->route('panel.brand.index')->with('swal-success', 'برند با موفقیت ویرایش شد.');
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
        return redirect()->route('panel.brand.index')->with('swal-success', 'برند با موفقیت حذف شد.');
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function changeStatus(int $id): RedirectResponse
    {
        $brand = $this->repo->findById($id);
        $this->repo->changeStatus($brand);

        return back()->with('swal-success', 'وضعیت برند با موفقیت تغییر کرد');
    }
}
