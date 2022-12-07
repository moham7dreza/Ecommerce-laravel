<?php

namespace App\Http\Controllers\Panel\Office;

use App\Http\Controllers\Controller;
use App\Http\Repositories\Panel\Market\CategoryRepo;
use App\Http\Repositories\Panel\Office\ServiceRepo;
use App\Http\Requests\Panel\Office\ServiceRequest;
use App\Http\Services\Image\ImageService;
use App\Http\Services\Panel\Office\serviceService;
use App\Models\ItCity\Office\Service;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
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
    public function index(): Factory|View|Application
    {
        $services = $this->repo->index()->paginate(5);
        return view('panel.office.service.index', compact(['services']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(CategoryRepo $categoryRepo): View|Factory|Application
    {
        $services = $this->repo->index()->whereNull(['parent_id'])->get();
        $categories = $categoryRepo->index()->get();
        return view('panel.office.service.create', compact(['services', 'categories']));
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
            $result = ShareService::uploadNewImage(null, $imageService,
                'panel-service', $request->file('image'));
            if ($result === false) {
                return redirect()->route('panel.office.service.index')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }
            $request->image = $result;
        }
        if (isset($request->available_date))
            $request->available_date = ShareService::dateFix($request->available_date);
        $this->service->store($request);
        return redirect()->route('panel.office.service.index')->with('swal-success', 'سرویس با موفقیت ذخیره شد.');
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
        $service = $this->repo->findById($id);
        $parentServices = $this->repo->index()->whereNull('parent_id')->get()->except($id);

        return view('panel.office.service.edit', compact(['service', 'parentServices']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ServiceRequest $request
     * @param ImageService $imageService
     * @param int $id
     * @return RedirectResponse
     */
    public function update(ServiceRequest $request, ImageService $imageService, int $id): RedirectResponse
    {
        $service = $this->repo->findById($id);
        if ($request->hasFile('image')) {
            $result = ShareService::uploadNewImage($service->image, $imageService,
                'panel-service', $request->file('image'));
            if ($result === false) {
                return redirect()->route('panel.office.service.index')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }
            $request->image = $result;
        } else {
            $request->image = ShareService::useCurrentImage($request->currentImage, $service->image);
        }
        $this->service->update($request, $id);
        return redirect()->route('panel.office.office.service.index')->with('swal-success', 'سرویس با موفقیت ویرایش شد.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        $this->repo->delete($id);
        return redirect()->route('panel.office.service.index')->with('swal-success', 'سرویس با موفقیت حذف شد.');
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
