<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InformationController extends Controller
{
    //
    //protected $nhsApiKey = '081fd12bb85e4a19ad223a94c28c5664';


    protected function index() {
        return view('loggedin.information');
    }

    protected function displayContent($page) {
        $content = $this->apiCall($page);


 
        if ($page != 'video' && $page != 'search' && $page != 'data') {
            foreach ($content->	mainEntityOfPage as $key => $val) {
                $val->url = str_replace(env('NHS_URL'), 'https://www.nhs.uk', $val->url);
            }
        }
        return view('loggedin.informationcontent', [
            'content' => $content
        ]);
    }

    protected function displaySearchApiContent(Request $request) {
        $request = $request->all();
        $content = $this->apiCallWithQuery($request['query']);
        return view('loggedin.informationcontentsearch', [
            'content' => $content
        ]);
    }

    protected function displayOrgApiContent(Request $request) {
        $request = $request->all();
        $content = $this->apiCallWithOrg($request['organisation']);
  
        return view('loggedin.informationcontentorg', [
            'content' => $content
        ]);
    }

    protected function apiCallWithOrg($o) {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => env('NHS_URL') . 'data/' . $o . '/all',
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
            // Request headers
            'subscription-key:'.env('NHS_PRIMARY_APIKEY'),
            'Accept: "application/json"',
            )
        ));
         
        $response = curl_exec($curl);
        $err  = curl_error($curl);
         
        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            return json_decode($response);
        }
    }

    protected function apiCallWithQuery($q) {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => env('NHS_URL') . 'search/?query=' . $q,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
            // Request headers
            'subscription-key:'.env('NHS_PRIMARY_APIKEY'),
            'Accept: "application/json"',
            )
        ));
         
        $response = curl_exec($curl);
        $err  = curl_error($curl);
         
        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            return json_decode($response);
        }
    }

    protected function apiCall($u) {
        $curl = curl_init();
        
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => env('NHS_URL') . $u,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
            // Request headers
            'subscription-key:'.env('NHS_SECONDARY_APIKEY'),
            'Accept: "application/json"',
            )
        ));
         
        $response = curl_exec($curl);
        $err  = curl_error($curl);
         
        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            return json_decode($response);
        }
    }

    
}
