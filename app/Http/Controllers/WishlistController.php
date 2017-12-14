<?php

namespace App\Http\Controllers;

use Goutte\Client;
use Symfony\Component\DomCrawler\Crawler;
use App\Http\Requests;
use GuzzleHttp\Client as GuzzleClient;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class WishlistController extends Controller
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

  
    public function index($id)
    {
      $client = new Client();

      $goutteClient = new Client();
      $crawler = $client->request('GET', 'https://www.appliancesdelivered.ie/small-appliances/audio/radios');
      $guzzleClient = new GuzzleClient(array(
          'timeout' => 60,
      ));
      $goutteClient->setClient($guzzleClient);
      global $scrape;
      $scrape = array();

      $crawler->filter('div .col-xs-12 > h4 > a')->each(function ($node, $scrape) {
          global $scrape;
          $text = $node->text();
          array_push($scrape, $text);
        });

      return view('wishlist')->withName($scrape[$id]);
    }
}
