<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Repositories\LinkRepository;

class HomeController extends Controller
{
    public function indexAction()
    {
        $lr = new LinkRepository();
        $links = $lr->getAllLinks();

        return view('home.index', ['linkdata' => $links]);
    }
}
