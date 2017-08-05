<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class DetailController extends Controller
{
    public function indexAction()
    {
        $linkdata = $this->getLinkData();

        return view('detail.index', ['linkdata' => $linkdata]);
    }

    private function getLinkData()
    {
        $linksMock = [
            'id' => 1,
            'detail_url' => 'detail/1',
            'language' => 'de_DE',
            'name' => 'Arbeitgeber dürfen nicht kündigen.',
            'label' => 'IT',
            'url' => [
                'protocol' => 'https',
                'subdomain' => 'www',
                'domainname' => 'golem',
                'tld' => 'de',
                'deeplink' => '/news/sysadmin-day-2017.html',
                'full' => 'https://www.golem.de/news/sysadmin-day-2017.html'
            ],
            'comments' => '20',
            'votes' => '15',
            'submitted_on' => '2017-07-31T19:10:52+00:00',
            'lastupdated_on' => '2017-07-31T19:10:52+00:00'
        ];

        return $linksMock;
    }
}
