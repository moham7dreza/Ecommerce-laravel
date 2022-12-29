<?php


namespace Modules\Techzilla\Panel\Http\Controllers;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Modules\Techzilla\Share\Http\Controllers\Controller;

class PanelController extends Controller
{
    /**
     * Show the panel page & get some data.
     *
     * @return Application|Factory|View
     * @throws AuthorizationException
     */
    public function __invoke(): View|Factory|Application
    {
//        $this->authorize('manage', Panel::class);
        return view('Panel::index');
    }
}
