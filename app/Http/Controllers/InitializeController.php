<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
class InitializeController extends Controller
{
    public function verify(Request $request)
    {

        $d = \Request::getHost();
    $domain = str_replace("www.", "", $d);   
     
    $alldata = ['app_id' => "25613271", 'ip' => "127.0.0.1", 'domain' => $domain , 'code' => $request->code];
        $data = $this->make_request($alldata);
        if ($data['status'] == 1)
        {   
            $put = 1;
            file_put_contents(public_path().'/config.txt', $put);
            Session::put('license', 'OK');
            return redirect()->route('installApp');
        }
        elseif ($data['msg'] == 'Already Register')
        {   
            return redirect()->route('verifylicense')->withErrors(['User is already registered']);
        }
        else
        {
            
            return back()->withErrors([$data['msg']]);
        }
    }

    public function make_request($alldata)
    {
     $file = public_path() . '/intialize.txt';                
     file_put_contents(public_path() . '/code.txt', $alldata['code']);
     file_put_contents(public_path() . '/ddtl.txt', $alldata['domain']);
     return array(
        'status' => '1'
    );
 }

}

