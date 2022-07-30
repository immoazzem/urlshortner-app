<?php

namespace App\Http\Controllers;

use App\Models\Url;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;



class UrlController extends Controller
{
    public function index(Request $request)
    {

    }

    public function shortlink(Request $request){
        // $user = $request->user();
        // $userId = $user->id;
        // $this->validate($request, [
        //     'link' => 'required'
        // ]);

        if(Auth::check()){
            $userId = Auth::id();
        } else {
            $userId = null;
        }


        $letter = array_merge(range('a', 'z'), range('A', 'Z'));
        $randint = rand(0,9);
        $hkey = $letter[rand(0, 51)] . $randint . Str::random(6);

        $createSurl = Url::create([
            'org_url' => $request->org_url,
            'hkey' => $hkey,
            'user_id' => $userId
        ]);

        if($createSurl){
            return response()->json([
                'success' => true,
                'message' => 'Link shorted successfully',
                'data' => $createSurl
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Failed',
                'data' => $userId
            ]);
        }
    }


    public function redirectUrl($hkey){

        $url = Url::where('hkey', $hkey)->first();
        // dd($url);
        $mainUrl = '';
        $mainUrl = $url->org_url;

        // return $mainUrl;

        // return Redirect::to($mainUrl);
        return redirect()->to($mainUrl);

        // if($url){
        //     $url->increment('view_counter');
        //     return redirect()->to($url->org_url);
        // } else {
        //     return response()->json([
        //     'success' => false,
        //     'message' => $url
        //     ]);
        // }
    }
}
