<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Repositories\Dashboard\PostRepo;
use App\Http\Services\Dashboard\PostService;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PostController extends Controller
{
    public PostRepo $repo;
    public PostService $service;

    public function __construct(PostRepo $postRepo, PostService $postService)
    {
        $this->repo = $postRepo;
        $this->service = $postService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $posts = $this->repo->index()->paginate(5);
        return view('adminto.post.index', compact(['posts']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('adminto.post.create', compact(['']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        return redirect()->route('adminto.post.index')->with(['swal-success' => 'پست با موفقیت ذخیره شد.']);
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
        $post = $this->repo->findById($id);
        return view('adminto.post.edit', compact(['post']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return RedirectResponse
     */
    public function update(Request $request, int $id): RedirectResponse
    {
        $post = $this->repo->findById($id);
        return redirect()->route('adminto.post.index')->with(['swal-success' => 'پست با موفقیت ویرایش شد.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        return redirect()->route('adminto.post.index')->with(['swal-success' => 'پست با موفقیت حذف شد.']);
    }

    /**
     * @param $id
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function changeStatus($id): RedirectResponse
    {
        $post = $this->repo->findById($id);
        $this->repo->changeStatus($post);

        return redirect()->route('adminto.post.index')->with(['swal-success' => 'وضعیت پست با موفقیت تغییر کرد.']);
    }
}
