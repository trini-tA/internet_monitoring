<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class FreeBoxController extends Controller{
    
    /**
     * For freebox Crystal
     */
    public function crystal(){
        
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', 'http://mafreebox.free.fr/pub/fbx_info.txt');
        if( $response->getStatusCode() == 200 ){
            //echo $response->getHeaderLine('content-type'); // 'application/json; charset=utf8'
            $contents =  $response->getBody(); // '{"id": 1420053, "name": "guzzle", ...}'
        } else {
            abort( 500 );
        }

        return response( $contents, 200 )->header('Content-Type', 'text/plain');
    }
}
