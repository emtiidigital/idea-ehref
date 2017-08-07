<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Repositories\LinkRepository;

class HomeController extends Controller
{
    protected $linkRepository;

    public function __construct(
        LinkRepository $linkRepository
    ) {
        $this->linkRepository = $linkRepository;
    }

    public function indexAction()
    {
        $allLinks = $this->linkRepository->getPaginatedLinks();

        return view('home.index', ['links' => $allLinks]);
    }
}
