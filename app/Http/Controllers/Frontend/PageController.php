<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function imprintAction()
    {
        return view('pages.imprint');
    }
}
