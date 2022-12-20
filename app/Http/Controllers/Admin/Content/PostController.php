<?php

namespace App\Http\Controllers\Admin\Content;

use App\Http\Controllers\Controller;
use App\Http\Repositories\Admin\Content\PostCategoryRepo;
use App\Http\Repositories\Admin\Content\PostRepo;
use App\Http\Requests\Admin\Content\PostRequest;
use App\Http\Services\Admin\Content\PostService;
use App\Http\Services\Image\ImageService;
use App\Models\Content\Post;
use App\Models\Content\PostCategory;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Share\Services\ShareService;
use Spatie\Tags\Tag;

class PostController extends Controller
{
    private string $class = Post::class;

    public PostRepo $postRepo;
    public PostService $postService;

    public function __construct(PostRepo $postRepo, PostService $postService)
    {
        $this->postRepo = $postRepo;
        $this->postService = $postService;

        $this->middleware('can:permission-posts')->only(['index']);
        $this->middleware('can:permission-post-create')->only(['create', 'store']);
        $this->middleware('can:permission-post-edit')->only(['edit', 'update']);
        $this->middleware('can:permission-post-delete')->only(['destroy']);
        $this->middleware('can:permission-post-status')->only(['status']);
        $this->middleware('can:permission-post-status')->only(['status']);
        $this->middleware('can:permission-post-set-tags')->only(['setTags']);
        $this->middleware('can:permission-post-update-tags')->only(['updateTags']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     * @throws AuthorizationException
     */
    public function index()
    {
        $this->authorize('postSectionAccess', $this->class);

        $posts = $this->postRepo->index()->orderBy('created_at', 'desc')->paginate(5);
        return view('admin.content.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(PostCategoryRepo $postCategoryRepo)
    {
        $postCategories = $postCategoryRepo->index()->where('status', PostCategory::STATUS_ACTIVE)->get();
        return view('admin.content.post.create', compact('postCategories'));
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
        $inputs = $request->all();

        //date fixed
        $realTimestampStart = substr($request->published_at, 0, 10);
        $inputs['published_at'] = date("Y-m-d H:i:s", (int)$realTimestampStart);

        if ($request->hasFile('image')) {
            $inputs['image'] = ShareService::uploadImage($request->file('image'), 'post',
                'admin.content.post.index', $imageService);
        }
        $inputs['author_id'] = auth()->user()->id;
        $post = $this->postService->store($inputs);
//        $post->setTranslation('title', 'fa', 'Name in English')->setTranslation('name', 'en', 'Name in English');

        return ShareService::redirect('admin.content.post.index', 'پست شما با موفقیت ثبت شد');
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
     * @param Post $post
     * @param PostCategoryRepo $postCategoryRepo
     * @return Application|Factory|View
     */
    public function edit(Post $post, PostCategoryRepo $postCategoryRepo)
    {
        $postCategories = $postCategoryRepo->index()->where('status', PostCategory::STATUS_ACTIVE)->get();
        return view('admin.content.post.edit', compact(['post', 'postCategories']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PostRequest $request
     * @param Post $post
     * @param ImageService $imageService
     * @return RedirectResponse
     */
    public function update(PostRequest $request, Post $post, ImageService $imageService): RedirectResponse
    {
        $inputs = $request->all();
        //date fixed
        $realTimestampStart = substr($request->published_at, 0, 10);
        $inputs['published_at'] = date("Y-m-d H:i:s", (int)$realTimestampStart);

        $inputs = ShareService::updateImage($request, 'post', 'admin.content.post.index',
            $imageService, $post, $inputs);
        $this->postService->update($post, $inputs);
//        $post->attachTags(explode(',', $inputs['tags']));
        return ShareService::redirect('admin.content.post.index', 'پست شما با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Post $post
     * @return RedirectResponse
     */
    public function destroy(Post $post): RedirectResponse
    {
        $this->postService->destroy($post);
        return ShareService::redirect('admin.content.post.index', 'پست شما با موفقیت حذف شد');
    }


    public function status(Post $post)
    {

        $post->status = $post->status == 0 ? 1 : 0;
        $result = $post->save();
        if ($result) {
            if ($post->status == 0) {
                return response()->json(['status' => true, 'checked' => false]);
            } else {
                return response()->json(['status' => true, 'checked' => true]);
            }
        } else {
            return response()->json(['status' => false]);
        }
    }


    public function commentable(Post $post)
    {

        $post->commentable = $post->commentable == 0 ? 1 : 0;
        $result = $post->save();
        if ($result) {
            if ($post->commentable == 0) {
                return response()->json(['commentable' => true, 'checked' => false]);
            } else {
                return response()->json(['commentable' => true, 'checked' => true]);
            }
        } else {
            return response()->json(['commentable' => false]);
        }
    }

    /**
     * @param Post $post
     * @return Factory|View|Application
     */
    public function setTags(Post $post): Factory|View|Application
    {
        $tags = Tag::query()->latest()->get();
        return view('admin.content.post.set-tags', compact(['tags', 'post']));
    }

    /**
     * @param PostRequest $request
     * @param Post $post
     * @return RedirectResponse
     */
    public function updateTags(PostRequest $request, Post $post): RedirectResponse
    {
        $inputs = $request->all();
        $inputs['tags'] = $inputs['tags'] ?? [];
//        $post->syncTags($inputs['tags']);
        $post->tags()->sync($inputs['tags']);
        return ShareService::redirect('admin.content.post.index', 'تگ ها با موفقیت به پست تخصیص یافت.');
    }
}
