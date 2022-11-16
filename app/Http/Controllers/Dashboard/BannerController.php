<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Repositories\Dashboard\BannerRepo;
use App\Http\Services\Dashboard\BannerService;
use App\Models\Content\Banner;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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
        $banners = $this->repo->index()->paginate(5);
        return view('adminto.banner.index', compact(['banners']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('adminto.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $this->service->store($request, $imagePath, $imageName);
        return redirect()->route('adminto.banner.index')->with(['swal-success' => 'بنر تبلیغاتی با موفقیت ذخیره شد.']);
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
        return view('adminto.banner.edit', compact(['banner']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $banner = $this->repo->findById($id);
        $this->service->update($request, $id, $imagePath, $imageName);
        return redirect()->route('adminto.banner.index')->with(['swal-success' => 'بنر تبلیغاتی با موفقیت ویرایش شد.']);
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
        return redirect()->route('adminto.banner.index')->with(['swal-success' => 'بنر تبلیغاتی با موفقیت حذف شد.']);
    }
}
