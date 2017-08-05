<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function indexAction()
    {
        $url = action('DetailController@indexAction', ['id' => 1]);
        $linkdata = $this->getLinksForHomepage();

        return view('home.index', ['linkdata' => $linkdata]);
    }

    private function getLinksForHomepage(): array
    {
        $linksMock = [
            '1' => [
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
            ],
            '2' => [
                'id' => 2,
                'detail_url' => 'detail/2',
                'language' => 'de_DE',
                'name' => 'Rofl Coptor',
                'label' => 'Markting',
                'url' => [
                    'protocol' => 'https',
                    'subdomain' => 'www',
                    'domainname' => 'golem',
                    'tld' => 'de',
                    'deeplink' => '/news/sysadmin-day-2017.html',
                    'full' => 'https://www.golem.de/news/sysadmin-day-2017.html'
                ],
                'comments' => '12',
                'votes' => '5',
                'submitted_on' => '2017-07-31T19:10:52+00:00',
                'lastupdated_on' => '2017-07-31T19:10:52+00:00'
            ]
        ];

        return $linksMock;
    }
}
