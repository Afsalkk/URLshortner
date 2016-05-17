<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Str;

// default classes/facades
use Validator ;

// models
use App\Url;

class UrlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('urls');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [ 'url' => 'regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/' ]);
        
        // If validation fails, we return to the main page with an error info...
        if ($validator->fails()) {
            
            /*return redirect('/')
                ->withInput()
                ->withErrors($validator);*/
            return 2;
        } else { 
            // check the url already exist.if so, retrieve its hash value.
            $url = Url::where('url', '=', $request->url)->first();
            
            // if url exists return hash of it to the view.
            if ($url) {
                 
                /*return redirect::to('/')
                    ->withInput()
                    ->with('url', $url->hash);*/
                return $url->hash;
            } else {
                // create a new unique hash 
                $newHash = Url::getShortenedUrl($request->url);
                
                // add url to urls table
                Url::create([
                    'url' => $request->url,
                    'hash' => $newHash 
                    ]); 
                    # return with succes...
                /*return redirect::to('/')
                    ->withInput()
                    ->with('link', $newHash);*/
                return $newHash;
            } 
        }
    }
 
}
