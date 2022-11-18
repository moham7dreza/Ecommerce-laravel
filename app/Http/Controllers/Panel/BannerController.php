<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Repositories\Panel\BannerRepo;
use App\Http\Requests\Panel\BannerRequest;
use App\Http\Services\Panel\BannerService;
use App\Http\Services\Image\ImageService;
use App\Models\Content\Banner;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Share\Services\ShareService;

class BannerController extends Controller
{
    private string $class = Banner::class;

    public BannerRepo $repo;
    public BannerService $service;

    public function __construct(BannerRepo $bannerRepo, BannerService $bannerService)
    {
        $this->repo = $bannerRepo;
        $this->service = $bannerService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $banners = $this->repo->index()->whereIn('position', [7,8,9])->paginate(5);
        return view('panel.banner.index', compact(['banners']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('panel.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param BannerRequest $request
     * @param ImageService $imageService
     * @return RedirectResponse
     */
    public function store(BannerRequest $request, ImageService $imageService): RedirectResponse
    {
        if ($request->hasFile('image')) {
            $result = ShareService::saveImage($request->file('image'),
                'panel-banner', $image = null,$imageService);
            if ($result === false) {
                return redirect()->route('panel.banner.index')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }
            $request->image = $result;
        }
        $this->service->store($request);
        return redirect()->route('panel.banner.index')->with('swal-success', 'بنر تبلیغاتی با موفقیت ذخیره شد.');
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
     * @param  int  $id
     * @return Application|Factory|View
     */
    public function edit(int $id)
    {
        $banner = $this->repo->findById($id);
        return view('panel.banner.edit', compact(['banner']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param BannerRequest $request
     * @param ImageService $imageService
     * @param int $id
     * @return RedirectResponse
     */
    public function update(BannerRequest $request, ImageService $imageService, int $id): RedirectResponse
    {
        $banner = $this->repo->findById($id);

        if ($request->hasFile('image')) {
            $result = ShareService::saveImage($request->file('image'),
                'panel-banner', $banner->image, $imageService);
            if ($result === false) {
                return redirect()->route('panel.banner.index')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }
            $request->image = $result;
        }

        $this->service->update($request, $id);
        return redirect()->route('panel.banner.index')->with('swal-success', 'بنر تبلیغاتی با موفقیت ویرایش شد.');
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
        return redirect()->route('panel.banner.index')->with('swal-success', 'بنر تبلیغاتی با موفقیت حذف شد.');
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function changeStatus($id): RedirectResponse
    {
        $banner = $this->repo->findById($id);
        $this->repo->changeStatus($banner);

        return back()->with('swal-success', 'وضعیت بنر با موفقیت تغییر کرد');
    }
}
