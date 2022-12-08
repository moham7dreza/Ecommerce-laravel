<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Setting\SettingRequest;
use App\Http\Services\Image\ImageService;
use App\Models\Setting\Setting;
use Database\Seeders\admin\SettingSeeder;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:permission-setting')->only(['index']);
        $this->middleware('can:permission-setting-edit')->only(['edit', 'update']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $settings = Setting::all();
        if ($settings === null) {
            $default = new SettingSeeder();
            $default->run();
            $settings = Setting::first();
        }
        return view('admin.setting.index', compact('settings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        return view('admin.setting.edit', compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param SettingRequest $request
     * @param Setting $setting
     * @param ImageService $imageService
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(SettingRequest $request, Setting $setting, ImageService $imageService): \Illuminate\Http\RedirectResponse
    {
        if ($request->hasFile('logo')) {
            if (!empty($setting->logo)) {
                $imageService->deleteImage($setting->logo);
            }
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'setting');
            $imageService->setImageName($setting->title . ' لوگو');
            $result = $imageService->save($request->file('logo'));
            if ($result === false) {
                return redirect()->route('admin.setting.index')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }
            $inputs['logo'] = $result;
        }
        if ($request->hasFile('icon')) {
            if (!empty($setting->icon)) {
                $imageService->deleteImage($setting->icon);
            }
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'setting');
            $imageService->setImageName($setting->title . ' آیکون');
            $result = $imageService->save($request->file('icon'));
            if ($result === false) {
                return redirect()->route('admin.setting.index')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }
            $inputs['icon'] = $result;
        }
        $inputs['address'] = ['addresses' => ['central_office' => $request->address],
            'postal_code' => $request->postal_code];
        $inputs['bank_account'] = ['name' => $request->bank_name, 'number' => $request->account_number,
            'shaba' => $request->shaba_number];
        $inputs['email'] = ['office_mail' => $request->email];
        $inputs['mobile'] = ['office_telephone' => $request->office_telephone, 'mobile' => $request->mobile];
        $inputs['social_media'] = ['instagram' => $request->instagram, 'telegram' => $request->telegram,
            'youtube' => $request->youtube, 'whatsapp' => $request->whatsapp];
        $inputs['description'] = $request->description;
        $inputs['keywords'] = $request->keywords;
        $inputs['title'] = $request->title;
        $inputs['postal_code'] = $request->postal_code;
        $setting_updated = $setting->update($inputs);
        return redirect()->route('admin.setting.index')->with('swal-success', 'تنظیمات سایت  شما با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
