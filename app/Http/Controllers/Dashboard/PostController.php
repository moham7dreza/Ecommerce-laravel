<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Repositories\Dashboard\CategoryRepo;
use App\Http\Repositories\Dashboard\PostRepo;
use App\Http\Requests\Dashboard\PostRequest;
use App\Http\Services\Dashboard\PostService;
use App\Http\Services\Image\ImageService;
use App\Models\Content\Post;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Share\Services\ShareService;

class PostController extends Controller
{
    private string $class = Post::class;

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
    public function create(CategoryRepo $categoryRepo)
    {
        $categories = $categoryRepo->getActiveCategories()->get();

        return view('adminto.post.create', compact(['categories']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PostRequest $request
     * @param ImageService $imageService
     * @return RedirectResponse
     */
    public function store(PostRequest $request, ImageService $imageService): RedirectResponse
    {
        if ($request->hasFile('image')) {
            $result = ShareService::uploadNewImage(null,$imageService,
                'adminto-post', $request->file('image'));
            if ($result === false) {
                return redirect()->route('adminto.post.index')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }
            $request->image = $result;
        }
        $request->published_at = ShareService::dateFix($request->published_at);
        $this->service->store($request);
        return redirect()->route('adminto.post.index')->with('swal-success', 'پست با موفقیت ذخیره شد.');
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
    public function edit(int $id, CategoryRepo $categoryRepo)
    {
        $post = $this->repo->findById($id);
        $categories = $categoryRepo->getActiveCategories()->get();
        return view('adminto.post.edit', compact(['post', 'categories']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PostRequest $request
     * @param ImageService $imageService
     * @param int $id
     * @return RedirectResponse
     */
    public function update(PostRequest $request, ImageService $imageService, int $id): RedirectResponse
    {
        $post = $this->repo->findById($id);
        if ($request->hasFile('image')) {
            $result = ShareService::uploadNewImage($post->image,$imageService,
                'adminto-post', $request->file('image'));
            if ($result === false) {
                return redirect()->route('adminto.post.index')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }
            $request->image = $result;
        } else {
            $request->image = ShareService::useCurrentImage($request->currentImage, $post->image);
        }
        $request->published_at = ShareService::dateFix($request->published_at);
        $this->service->update($request, $id);
        return redirect()->route('adminto.post.index')->with('swal-success', 'پست با موفقیت ویرایش شد.');
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
        return redirect()->route('adminto.post.index')->with('swal-success', 'پست با موفقیت حذف شد.');
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function changeStatus($id): RedirectResponse
    {
        $post = $this->repo->findById($id);
        $this->repo->changeStatus($post);

        return redirect()->route('adminto.post.index')->with('swal-success', 'وضعیت پست با موفقیت تغییر کرد.');
    }
}
