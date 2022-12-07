<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Repositories\Dashboard\SettingRepo;
use App\Http\Requests\Dashboard\SettingRequest;
use App\Http\Services\Dashboard\SettingService;
use App\Http\Services\Image\ImageService;
use App\Models\Setting\Setting;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Share\Services\ShareService;

class SettingController extends Controller
{
    private string $class = Setting::class;

    public SettingRepo $repo;
    public SettingService $service;

    public function __construct(SettingRepo $settingRepo, SettingService $settingService)
    {
        $this->repo = $settingRepo;
        $this->service = $settingService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $setting = $this->repo->findById(3);
        return view('adminto.setting.index', compact(['setting']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
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
     * @param int $id
     * @return Application|Factory|View
     */
    public function edit(int $id)
    {
        $setting = $this->repo->findById($id);
        return view('adminto.setting.edit', compact(['setting']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param SettingRequest $request
     * @param ImageService $imageService
     * @param int $id
     * @return RedirectResponse
     */
    public function update(SettingRequest $request, ImageService $imageService, int $id): RedirectResponse
    {
        $setting = $this->repo->findById($id);
        if ($request->hasFile('logo')) {
            $result = ShareService::saveImageWithName($request->file('logo'), 'adminto-setting',
                $setting->title . '-لوگو', $setting->logo, $imageService);
            if ($result === false) {
                return redirect()->route('adminto.setting.index')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }
            $request->logo = $result;
        }
        if ($request->hasFile('icon')) {
            $result = ShareService::saveImageWithName($request->file('icon'), 'adminto-setting',
                $setting->icon . '-آیکون', $setting->icon, $imageService);
            if ($result === false) {
                return redirect()->route('adminto.setting.index')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }
            $request->icon = $result;
        }
        $this->service->update($request, $id);
        return redirect()->route('adminto.setting.index')->with('swal-success', 'تنظیمات با موفقیت ویرایش شد.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
