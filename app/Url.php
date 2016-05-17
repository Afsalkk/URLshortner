<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Url extends \Eloquent
{
    //
    protected $table = 'urls';
    protected $fillable = array('url','hash');

    /* function to create shortened url.
    *  new url = first character + fifth character .in/random string
    */
    public static function getShortenedUrl($url)
    { 
        $shortened = base_convert(rand(10000,99999), 10, 36);
        if ( static::whereUrl($shortened)->first() ) {
                return static::getShortenedUrl();
        }
        $data = explode('/', $url);
        $domain_string = $data[0];
        // get domain name only
        $domain_array = explode('.', $domain_string);
        $domain = $domain_array[1];
        $hash = $domain[0].$domain[4].'.in/'.$shortened;
        return $hash;
    }

}
