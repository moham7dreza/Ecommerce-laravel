<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Repositories\Dashboard\CommentRepo;
use App\Http\Services\Dashboard\CommentService;
use App\Models\Content\Comment;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    private string $class = Comment::class;

    public CommentRepo $repo;
    public CommentService $service;

    public function __construct(CommentRepo $commentRepo, CommentService $commentService)
    {
        $this->repo = $commentRepo;
        $this->service = $commentService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $comments = $this->repo->index()->paginate(5);
        return view('adminto.comment.index', compact(['comments']));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
        return redirect()->route('adminto.comment.index')->with(['swal-success' => 'نظر با موفقیت حذف شد.']);
    }


    public function active($id)
    {
        $this->authorize('manage', $this->class);
        $this->repo->changeStatus($id, Comment::STATUS_ACTIVE);

        alert()->success('فعال کردن وضعیت کامنت', 'عملیات با موفقیت انجام شد')->persistent('باشه');
        return to_route('comments.index');
    }
}
