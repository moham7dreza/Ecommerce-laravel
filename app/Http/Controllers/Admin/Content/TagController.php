<?php

namespace App\Http\Controllers\Admin\Content;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Content\TagRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Spatie\Tags\Tag;

class TagController extends Controller
{
    private string $class = Tag::class;

    public function __construct()
    {
//        $this->middleware('can:role-admin')->only(['index']);
        $this->middleware('can:permission-tags')->only(['index']);
        $this->middleware('can:permission-tag-create')->only(['create', 'store']);
        $this->middleware('can:permission-tag-edit')->only(['edit', 'update']);
        $this->middleware('can:permission-tag-delete')->only(['destroy']);
        $this->middleware('can:permission-tag-status')->only(['status']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        $tags = Tag::query()->latest()->paginate(5);
        return view('admin.content.tag.index', compact(['tags']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        return view('admin.content.tag.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param TagRequest $request
     * @return RedirectResponse
     */
    public function store(TagRequest $request): RedirectResponse
    {
        $inputs = $request->all();
        Tag::query()->create($inputs);
        return redirect()->route('admin.content.tag.index')->with('swal-success', 'تگ جدید شما با موفقیت ثبت شد');
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
     * @param Tag $tag
     * @return Application|Factory|View
     */
    public function edit(Tag $tag): Application|Factory|View
    {
        return view('admin.content.tag.edit', compact(['tag']));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param TagRequest $request
     * @param Tag $tag
     * @return RedirectResponse
     */
    public function update(TagRequest $request, Tag $tag): RedirectResponse
    {

        $inputs = $request->all();
        $tag->update($inputs);
        return redirect()->route('admin.content.tag.index')->with('swal-success', 'تگ شما با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Tag $tag
     * @return RedirectResponse
     */
    public function destroy(Tag $tag): RedirectResponse
    {
        $result = $tag->delete();
        return redirect()->route('admin.content.tag.index')->with('swal-success', 'بنر  شما با موفقیت حذف شد');
    }


    /**
     * @param Tag $tag
     * @return JsonResponse
     */
    public function status(Tag $tag): JsonResponse
    {
        $tag->status = $tag->status == 0 ? 1 : 0;
        $result = $tag->save();
        if ($result) {
            if ($tag->status == 0) {
                return response()->json(['status' => true, 'checked' => false]);
            } else {
                return response()->json(['status' => true, 'checked' => true]);
            }
        } else {
            return response()->json(['status' => false]);
        }
    }
}
