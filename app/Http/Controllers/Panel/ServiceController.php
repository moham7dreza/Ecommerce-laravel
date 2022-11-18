<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Repositories\Panel\ServiceRepo;
use App\Http\Requests\Panel\ServiceRequest;
use App\Http\Services\Image\ImageService;
use App\Http\Services\Panel\serviceService;
use App\Models\ItCity\Store\Service;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Share\Services\ShareService;

class ServiceController extends Controller
{
    private string $class = Service::class;

    public ServiceRepo $repo;
    public serviceService $service;

    public function __construct(ServiceRepo $serviceRepo, serviceService $serviceService)
    {
        $this->repo = $serviceRepo;
        $this->service = $serviceService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $services = $this->repo->index()->paginate(5);
        return view('panel.service.index', compact(['services']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $services = $this->repo->index()->get();
        return view('panel.service.create', compact(['services']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ServiceRequest $request
     * @param ImageService $imageService
     * @return RedirectResponse
     */
    public function store(ServiceRequest $request, ImageService $imageService): RedirectResponse
    {
        if ($request->hasFile('image')) {
            $request->image = ShareService::uploadImage($request->file('image'), 'panel-service',
                'panel.service.index', $imageService);
        }

        $this->service->store($request);
        return redirect()->route('panel.service.index')->with('swal-success', 'سرویس با موفقیت اضافه شد.');
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
        $service = $this->repo->findById($id);
        $parentServices = $this->repo->index()->whereNull('parent_id')->get()->except($id);

        return view('panel.service.edit', compact(['service', 'parentServices']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ServiceRequest $request
     * @param ImageService $imageService
     * @param int $id
     * @return RedirectResponse
     */
    public function update(ServiceRequest $request,ImageService $imageService, int $id): RedirectResponse
    {
        $service = $this->repo->findById($id);
        if ($request->hasFile('image')) {
            $result = ShareService::uploadNewImage($service->image,$imageService,
                'panel-service', $request->file('image'));
            if ($result === false) {
                return redirect()->route('panel.service.index')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }
            $request->image = $result;
        } else {
            $request->image = ShareService::useCurrentImage($request->currentImage, $service->image);
        }
        $this->service->update($request, $id);
        return redirect()->route('panel.service.index')->with('swal-success', 'سرویس با موفقیت ویرایش شد.');
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
        return redirect()->route('panel.service.index')->with('swal-success', 'سرویس با موفقیت حذف شد.');
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function changeStatus($id): RedirectResponse
    {
        $service = $this->repo->findById($id);
        $this->repo->changeStatus($service);

        return back()->with('swal-success', 'وضعیت سرویس با موفقیت تغییر کرد');
    }
}
