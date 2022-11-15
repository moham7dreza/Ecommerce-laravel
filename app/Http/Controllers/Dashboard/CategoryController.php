<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Repositories\Dashboard\CategoryRepo;
use App\Http\Requests\Dashboard\CategoryRequest;
use App\Http\Services\Dashboard\CategoryService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CategoryController extends Controller
{

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
        return view('adminto.category.index', compact(['categories']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $categories = $this->repo->index()->get();
        return view('adminto.category.create', compact(['categories']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CategoryRequest $request
     * @return RedirectResponse
     */
    public function store(CategoryRequest $request): RedirectResponse
    {
        $this->service->store($request);
        return redirect()->route('adminto.category.index')->with(['swal-success', 'دسته بندی با موفقیت اضافه شد.']);
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
     * @param int $id
     * @return Application|Factory|View
     */
    public function edit(int $id)
    {
        $category = $this->repo->findById($id);
        $categories = $this->repo->index()->where('id', '!=', $category->id)->get();

        return view('adminto.category.edit', compact(['categories', 'category']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(Request $request, int $id): RedirectResponse
    {
        $this->service->update($request, $id);
        return redirect()->route('adminto.category.index')->with(['swal-success', 'دسته بندی با موفقیت ویرایش شد.']);
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
        return redirect()->route('adminto.category.index')->with(['swal-success', 'دسته بندی با موفقیت حذف شد.']);
    }

    public function changeStatus($id): RedirectResponse
    {
        $category = $this->repo->findById($id);
        $this->repo->changeStatus($category);

        return back()->with(['swal-success' => 'وضعیت دسته بندی با موفقیت تغییر کرد']);
    }
}
