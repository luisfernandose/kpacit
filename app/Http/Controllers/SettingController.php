<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;

class SettingController extends Controller
{
    public function genreal()
    {
      $env_files = [
        'APP_URL' => env('APP_URL'),
        'APP_DEBUG' => env('APP_DEBUG'),
        'MAIL_FROM_NAME' => env('MAIL_FROM_NAME'),
        'MAIL_FROM_ADDRESS' => env('MAIL_FROM_ADDRESS'),
        'MAIL_DRIVER' => env('MAIL_DRIVER'),
        'MAIL_HOST' => env('MAIL_HOST'),
        'MAIL_PORT' => env('MAIL_PORT'),
        'MAIL_USERNAME' => env('MAIL_USERNAME'),
        'MAIL_PASSWORD' => env('MAIL_PASSWORD'),
        'MAIL_ENCRYPTION' => env('MAIL_ENCRYPTION'),
        'FACEBOOK_CLIENT_ID' => env('FACEBOOK_CLIENT_ID'),
        'FACEBOOK_CLIENT_SECRET' => env('FACEBOOK_CLIENT_SECRET'),
        'FACEBOOK_CALLBACK_URL' => env('FACEBOOK_CALLBACK_URL'),
        'GOOGLE_CLIENT_ID' => env('GOOGLE_CLIENT_ID'),
        'GOOGLE_CLIENT_SECRET' => env('GOOGLE_CLIENT_SECRET'),
        'GOOGLE_CALLBACK_URL' => env('GOOGLE_CALLBACK_URL'),
        'GITLAB_CLIENT_ID' => env('GITLAB_CLIENT_ID'),
        'GITLAB_CLIENT_SECRET' => env('GITLAB_CLIENT_SECRET'),
        'GITLAB_CALLBACK_URL' => env('GITLAB_CALLBACK_URL')
      ];
      $setting = Setting::first();
      $css = file_get_contents("css/custom-style.css");
      $js = file_get_contents("js/custom-js.js");
      $onboard=\DB::table('onboard')->get();
      if(count($onboard)>0){
        foreach ($onboard as $key => $value) {
          $value->image=\URL::to('/images/onboard/'.$value->image);
        }
      }
      return view('admin.setting.setting',compact('css','js','setting','env_files','onboard'));
    }

    public function store(Request $request)
    {
      $request->validate([
          'project_title' => 'required',
          'APP_URL' => 'required',
          'favicon' => 'mimes:ico,png',
          'logo' => 'mimes:png,jpeg,jpg'
        ],
        [
          'project_title.required' => 'Project Title is required',
          'APP_URL.required' => 'App URL is required'
        ]
        );

        $active = @file_get_contents(public_path().'/config.txt');

        if(!$active){
            $putS = 1;
            file_put_contents(public_path().'/config.txt',$putS);
        }

        $domain = \Request::getHost();
        return $this->extraupdate($request);
        // if($domain == 'localhost' || strstr( $domain, '192.168.0' ) || strstr( $domain, 'mediacity.co.in' )){
            
        //   }else{
        //     $token = (file_exists(public_path().'/intialize.txt') &&  file_get_contents(public_path().'/intialize.txt') != null) ? file_get_contents(public_path().'/intialize.txt') : 0;

        //     $code = (file_exists(public_path().'/code.txt') &&  file_get_contents(public_path().'/code.txt') != null) ? file_get_contents(public_path().'/code.txt') : 0;
        //     $body = json_decode($response);
        //     return $this->extraupdate($request);    

        //   }
        
      
    }

    public function extraupdate($request){
      
      $setting = Setting::first();

        $setting->project_title = $request->project_title;
        $setting->rightclick = $request->rightclick;
        $setting->inspect = $request->inspect;
        $setting->cpy_txt = $request->cpy_txt;
        $setting->wel_email = $request->wel_email;
        $setting->default_address = $request->default_address;
        $setting->default_phone = $request->default_phone;
        $setting->feature_amount = $request->feature_amount;
        $setting->live_url = $request->live_url;


        $env_update = $this->changeEnv([
            'APP_NAME' => $string = preg_replace('/\s+/', '', $request->project_title),
            'APP_URL' => $request->APP_URL,
            
        ]);


        if(isset($request->APP_DEBUG)){
          $env_update = $this->changeEnv([
            'APP_DEBUG' => 'true'
          ]);
        }else{
          $env_update = $this->changeEnv([
            'APP_DEBUG' => 'false'
          ]);
        }

        if(isset($request->zoom_enable)){
          $setting->zoom_enable = 1;
        }else{
           $setting->zoom_enable = 0;
        }

     
        if ($file = $request->file('logo')) {
          $name = 'logo_' . time() . $file->getClientOriginalName();
          if($setting->logo != null) {
            $content = @file_get_contents(public_path().'/images/logo/'.$setting->logo);
            if ($content) {
              unlink(public_path().'/images/logo/'.$setting->logo);
            }
          }
          $file->move('images/logo', $name);
          $setting['logo'] = $name;
          $setting->update([
          'logo' => $setting['logo']
          ]);

          $setting->logo_type = 'L';
        }

        if ($file = $request->file('favicon')) {
          $name = 'favicon.png';
          if ($setting->favicon != null) {
              $content = @file_get_contents(public_path().'/images/favicon/'.$setting->favicon);
              if ($content) {
                unlink(public_path().'/images/favicon/'.$setting->favicon);
              }
          }
          $file->move('images/favicon', $name);
          $setting['favicon'] = $name;
          $setting->update([
            'favicon' => $setting['favicon']
            ]);
        }
        

        if(isset($request->project_logo))
        {
          $setting->logo_type = 'L';
        }
        else
        {
          $setting->logo_type = 'T';
        }

        if(isset($request->rightclick))
        {
          $setting->rightclick = 1;
        }
        else
        {
          $setting->rightclick = 0;
        }

        if(isset($request->inspect))
        {
          $setting->inspect = 1;
        }
        else
        {
          $setting->inspect = 0;
        }

        if(isset($request->w_email_enable))
        {
          if (env('MAIL_USERNAME')!=null) {
             $setting->w_email_enable = '1';
          }else{
            return back()->with('delete', 'Update your mail API !!');
          }
        }
        else
        {
          $setting->w_email_enable = '0';
        }

        if(isset($request->verify_enable))
        {
          if (env('MAIL_USERNAME')!=null) {
             $setting->verify_enable = '1';
          }else{
            return back()->with('delete', 'Update your mail API !!');
          }
        }
        else
        {
          $setting->verify_enable = '0';
        }

        if(isset($request->instructor_enable))
        {
          $setting->instructor_enable = '1';
        }
        else
        {
          $setting->instructor_enable = '0';
        }

        if(isset($request->cat_enable))
        {
          $setting->cat_enable = '1';
        }
        else
        {
          $setting->cat_enable = '0';
        }

        if(isset($request->preloader_enable))
        {
          $setting->preloader_enable = '1';
        }
        else
        {
          $setting->preloader_enable = '0';
        }


        $setting->save();
        return redirect()->route('gen.set')->with('success','Settings Updated !');
    }

    public function updateMailSetting(Request $request)
    {
      
        $input = $request->all();
        $setting = Setting::first();
        
        
        $env_update = $this->changeEnv([
          'MAIL_FROM_NAME' => $input['MAIL_FROM_NAME'],
          'MAIL_FROM_ADDRESS' => $input['MAIL_FROM_ADDRESS'],
          'MAIL_DRIVER' => $input['MAIL_DRIVER'],
          'MAIL_HOST' => $input['MAIL_HOST'],
          'MAIL_PORT' => $input['MAIL_PORT'],
          'MAIL_USERNAME'=> $input['MAIL_USERNAME'],
          'MAIL_PASSWORD'=> $input['MAIL_PASSWORD'],
          'MAIL_ENCRYPTION'=> $input['MAIL_ENCRYPTION']
        ]);
        

        if($env_update) 
        {
          return back()->with('updated', 'Mail settings has been saved');
        } 
        else 
        {
          return back()->with('deleted', 'Mail settings could not be saved');
        }
    }

    public function updateSeo(Request $request)
    {

        $setting = Setting::first();
        $setting->meta_data_desc = $request->meta_data_desc;
        $setting->meta_data_keyword = $request->meta_data_keyword;
        $setting->google_ana = $request->google_ana;
        $setting->fb_pixel = $request->fb_pixel;

        $setting->save();
        return redirect()->route('gen.set')->with('success','Seo Setting Updated !');
    }

    public function storeCSS(Request $request)
    {
        $this->validate($request,array(
          'css' => 'required'
        ));
        $css = $request->css;
        file_put_contents("css/custom-style.css",$css.PHP_EOL, FILE_APPEND);
        return redirect()->route('gen.set')->with('success','Added Custom CSS !');
    }

    public function storeJS(Request $request)
    {
      $this->validate($request,array(
        'js' => 'required'
      ));

      $js = $request->js;
      file_put_contents("js/custom-js.js",$js.PHP_EOL, FILE_APPEND);
      return redirect()->route('gen.set')->with('success','Added Javascript !');
    }

    public function slfb(Request $request)
    {
       $setting = Setting::first();

        if(isset($request->fb_enable))
        {
          $setting->fb_login_enable = "1";
        }else
        {
          $setting->fb_login_enable = "0";
        }
       
        $env_update = $this->changeEnv([
          'FACEBOOK_CLIENT_ID' => $request->FACEBOOK_CLIENT_ID,
          'FACEBOOK_CLIENT_SECRET' => $request->FACEBOOK_CLIENT_SECRET,
          'FACEBOOK_CALLBACK_URL' => $request->FACEBOOK_CALLBACK_URL
          
        ]);


       $setting->save();

       return redirect()->route('gen.set')->with('success','Facebook Login Setting Updated !');
    }

    public function slgl(Request $request)
    {
        $setting = Setting::first();

        if(isset($request->google_enable))
        {
          $setting->google_login_enable = "1";
        }else
        {
          $setting->google_login_enable = "0";
        }
       
        $env_update = $this->changeEnv([
          'GOOGLE_CLIENT_ID' => $request->GOOGLE_CLIENT_ID,
          'GOOGLE_CLIENT_SECRET' => $request->GOOGLE_CLIENT_SECRET,
          'GOOGLE_CALLBACK_URL' => $request->GOOGLE_CALLBACK_URL
          
        ]);

        $setting->save();

        return redirect()->route('gen.set')->with('success','Google Login Setting Updated !');
    }

    public function slgit(Request $request)
    {
        $setting = Setting::first();

        if(isset($request->gitlab_enable))
        {
          $setting->gitlab_login_enable = "1";
        }else
        {
          $setting->gitlab_login_enable = "0";
        }
       
        $env_update = $this->changeEnv([
          'GITLAB_CLIENT_ID' => $request->GITLAB_CLIENT_ID,
          'GITLAB_CLIENT_SECRET' => $request->GITLAB_CLIENT_SECRET,
          'GITLAB_CALLBACK_URL' => $request->GITLAB_CALLBACK_URL
          
        ]);

        $setting->save();

        return redirect()->route('gen.set')->with('success','GitLab Login Setting Updated !');
    }

    protected function changeEnv($data = array()){
    {
        if ( count($data) > 0 ) {

            // Read .env-file
            $env = file_get_contents(base_path() . '/.env');

            // Split string on every " " and write into array
            $env = preg_split('/\s+/', $env);;

            // Loop through given data
            foreach((array)$data as $key => $value){
              // Loop through .env-data
              foreach($env as $env_key => $env_value){
                // Turn the value into an array and stop after the first split
                // So it's not possible to split e.g. the App-Key by accident
                $entry = explode("=", $env_value, 2);

                // Check, if new key fits the actual .env-key
                if($entry[0] == $key){
                    // If yes, overwrite it with the new one
                    $env[$env_key] = $key . "=" . $value;
                } else {
                    // If not, keep the old one
                    $env[$env_key] = $env_value;
                }
              }
            }

            // Turn the array back to an String
            $env = implode("\n\n", $env);

            // And overwrite the .env with the new data
            file_put_contents(base_path() . '/.env', $env);

            return true;

        } else {

          return false;
        }
    }
  }
   public function updateOnboard(Request $request)
    {
      
        if(count($request['id'])>0){
          foreach ($request['id'] as $key => $value) {
            $data=[];
            if(isset($request['image'][$key]) && $request['image'][$key]!=''){
            $file = $request->file('image')[$key];
              $destinationPath  = public_path('images/onboard/');
              $filename = $file->getClientOriginalName();
              $extension  = $file->getClientOriginalExtension(); 
              $newfilename  = time().'.'.str_replace(' ', '_', $filename);            

              $uploadSuccess  = $file->move($destinationPath, $newfilename);
              $data['image'] = $newfilename;
            }
            

             $data['name']=$request['name'][$key];
            $data['description']=$request['description'][$key];
            print_r($data);
            \DB::table('onboard')->where('id',$value)->update($data);
          }
        }
        return redirect()->route('gen.set')->with('success','Onboard Setting Updated !');
    }
}
