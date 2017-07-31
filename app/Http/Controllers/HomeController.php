<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function indexAction()
    {
        $links = $this->getLinksForHomepage();

        return view('home.index', ['links' => $links]);
    }

    private function getLinksForHomepage(): array
    {
        $linksMock = [
            '1' => [
                'id' => 1,
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
                'id' => 1,
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
