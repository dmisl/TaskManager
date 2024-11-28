<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.index');
    }
    public function lang(Request $request)
    {
        $validated = $request->validate([
            'lang' => ['in:en,ua']
        ]);
        session(['locale' => $request->lang]);
        return back();
    }
    public function getImages($text, $limit = 1, $page = 1) : JsonResponse
    {

        $curl = curl_init();

        $queryParams = [
            'term' => $text,
            'page' => $page,
            'limit' => $limit,
            'filters[content_type][vector]' => 1,
            'filters[vector][style]' => 'flat',
            // 'filters[license][freemium]' => 1,
            // 'filters[license][premium]' => 1,
            'filters[ai-generated][excluded]' => 1,
        ];

        $queryString = http_build_query($queryParams);
        $url = "https://api.freepik.com/v1/resources?" . $queryString;

        // Log::info('Request URL: ' . $url);

        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "Accept-Language: uk-UA",
                "x-freepik-api-key: FPSXf55d7c1832254bc898fea32e415bea35"
            ],
            CURLOPT_SSL_VERIFYHOST => false, // Add this line
            CURLOPT_SSL_VERIFYPEER => false, // Add this line
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
            return response()->json(['error' => "cURL Error: " . $err], 500);
        }

        $decodedResponse = json_decode($response, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            return response()->json(['error' => 'Invalid JSON response from Freepik'], 500);
        }

        $images = [];

        foreach ($decodedResponse['data'] as $parent) {
            $images[] = $parent['image']['source']['url'];
        }

        return response()->json(['images' => $images ,'response' => $decodedResponse]);
    }
}
