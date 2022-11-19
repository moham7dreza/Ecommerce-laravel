<?php

namespace App\Http\Controllers\Panel\Market;

use App\Http\Controllers\Controller;
use App\Http\Repositories\Panel\Market\BrandRepo;
use App\Http\Repositories\Panel\Market\CategoryRepo;
use App\Http\Repositories\Panel\Market\HardwareRepo;
use App\Http\Requests\Panel\Market\HardwareRequest;
use App\Http\Services\Image\ImageService;
use App\Http\Services\Panel\Market\HardwareService;
use App\Models\ItCity\Store\Hardware;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Share\Services\ShareService;

class HardwareController extends Controller
{
    private string $class = Hardware::class;

    public HardwareRepo $repo;
    public HardwareService $service;

    public function __construct(HardwareRepo $hardwareRepo, HardwareService $hardwareService)
    {
        $this->repo = $hardwareRepo;
        $this->service = $hardwareService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $hardwares = $this->repo->index()->paginate(5);
        return view('panel.market.hardware.index', compact(['hardwares']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(CategoryRepo $categoryRepo, BrandRepo $brandRepo)
    {
        $categories = $categoryRepo->getActiveCategories()->get();
        $brands = $brandRepo->index()->get();
        return view('panel.market.hardware.create', compact(['categories', 'brands']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param HardwareRequest $request
     * @param ImageService $imageService
     * @return RedirectResponse
     */
    public function store(HardwareRequest $request, ImageService $imageService): RedirectResponse
    {
        if ($request->hasFile('image')) {
            $result = ShareService::uploadNewImage(null,$imageService,
                'panel-hardware', $request->file('image'));
            if ($result === false) {
                return redirect()->route('panel.hardware.index')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }
            $request->image = $result;
        }
        $request->published_at = ShareService::dateFix($request->published_at);
        $this->service->store($request);
        return redirect()->route('panel.market.hardware.index')->with('swal-success', 'سخت افزار با موفقیت ذخیره شد.');
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
     * @param BrandRepo $brandRepo
     * @param int $id
     * @return Application|Factory|View
     */
    public function edit(CategoryRepo $categoryRepo, BrandRepo $brandRepo, int $id)
    {
        $hardware = $this->repo->findById($id);
        $categories = $categoryRepo->getActiveCategories()->get();
        $brands = $brandRepo->index()->get();
        return view('panel.market.hardware.edit', compact(['hardware', 'categories', 'brands']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param HardwareRequest $request
     * @param ImageService $imageService
     * @param int $id
     * @return RedirectResponse
     */
    public function update(HardwareRequest $request,ImageService $imageService, int $id): RedirectResponse
    {
        $hardware = $this->repo->findById($id);
        if ($request->hasFile('image')) {
            $result = ShareService::uploadNewImage($hardware->image,$imageService,
                'panel-hardware', $request->file('image'));
            if ($result === false) {
                return redirect()->route('panel.market.hardware.index')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }
            $request->image = $result;
        } else {
            $request->image = ShareService::useCurrentImage($request->currentImage, $hardware->image);
        }
        $request->published_at = ShareService::dateFix($request->published_at);
        $this->service->update($request, $id);
        return redirect()->route('panel.market.hardware.index')->with('swal-success', 'سخت افزار با موفقیت ویرایش شد.');
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
        return redirect()->route('panel.market.hardware.index')->with('swal-success', 'سخت افزار با موفقیت حذف شد.');
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function changeStatus(int $id): RedirectResponse
    {
        $hardware = $this->repo->findById($id);
        $this->repo->changeStatus($hardware);

        return redirect()->route('panel.market.hardware.index')->with('swal-success', 'وضعیت سخت افزار با موفقیت تغییر کرد.');
    }
}
