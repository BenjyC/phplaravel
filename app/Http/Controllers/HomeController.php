<?php

namespace App\Http\Controllers;

use Goutte\Client;
use Symfony\Component\DomCrawler\Crawler;
use App\Http\Requests;
use GuzzleHttp\Client as GuzzleClient;
use Illuminate\Http\Request;

use Goutte\Client;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $client = new Client();

      $goutteClient = new Client();
      $crawler = $client->request('GET', 'https://www.appliancesdelivered.ie/small-appliances/audio/radios');
      $guzzleClient = new GuzzleClient(array(
          'timeout' => 60,
      ));
      $crawler->filter('.result__title .result__a')->each(function ($node) {
        dump($node->text());
        });
        return view('home');
    }
}
