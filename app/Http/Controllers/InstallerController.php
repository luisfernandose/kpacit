<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Artisan;
use App\Setting;
use Image;
use App\User;
use Hash;
use App\Currency;
use DB;

class InstallerController extends Controller
{
    public function verifylicense(){
        if(Session::get('servercheck')=='OK'){
          return view('install.verifylicense');
        }else{
          return redirect()->route('servercheck');
        }
    }

    public function verify(){

        if(env('IS_INSTALLED') == 0){
        
          if(Session::get('servercheck')== 'OK'){
            return view('install.verify');
          }else{
              return redirect()->route('servercheck');
          }
        
        }else{
          return redirect('/');
        }

    }

    public function eula(){

        if(env('IS_INSTALLED') == 0){
            return view('install.eula');
        }else{
            return redirect('/');
        }

    }

    public function storeserver(){

      if(env('IS_INSTALLED') == 0){
          Session::put('servercheck','OK');
          return redirect()->route('verifyApp');
      }else{
          return redirect('/');
      }

    }

  

    public function serverCheck(Request $request){

        if(env('IS_INSTALLED') == 0){
          if (Session::get('eulaaccept') == 1) {
              return view('install.servercheck');
          }else{
              return redirect()->route('eulaterm');
          }
        }else{
          return redirect('/');
        }
    }
  

    public function storeeula(Request $request){

      if (isset($request->eula)) {
          Session::put('eulaaccept',1);
          return redirect()->route('servercheck');

      }else{
        Session::flash('delete','Why you are not agree with our TOC !');
        return back();
      }
    }

    public function index(){
        if(env('IS_INSTALLED') == 0){
          if (Session::get('license') == 'OK' && Session::get('eulaaccept') == 1 && Session::get('servercheck') == 'OK') {
                return view('install.index');
          }elseif(Session::get('eulaaccept') != 1){
              return view('install.eula');
          }else{
              return view('install.servercheck');
          }
      }else{
        return redirect('/');
      }
    }

    public function step1(Request $request){
      
      $env_update = $this->changeEnv([
          'APP_NAME' => $string = preg_replace('/\s+/', '', $request->APP_NAME),
          'APP_URL' => $request->APP_URL,
          'MAIL_FROM_NAME' => $mail = preg_replace('/\s+/', '', $request->MAIL_FROM_NAME),
          'MAIL_FROM_ADDRESS' => $request->MAIL_FROM_ADDRESS,
          'MAIL_DRIVER' => $request->MAIL_DRIVER,
          'MAIL_HOST'  => $request->MAIL_HOST,
          'MAIL_PORT' => $request->MAIL_PORT,
          'MAIL_USERNAME' => $request->MAIL_USERNAME,
          'MAIL_PASSWORD' => $request->MAIL_PASSWORD,
          'MAIL_ENCRYPTION' => $request->MAIL_ENCRYPTION
        ]);

        Session::put('step1','stage1com');

        if($env_update) {
          return redirect()->route('get.step2');
        }

    }

    public function getstep2(){

        if(env('IS_INSTALLED') == 0){
          if (Session::get('step1') == 'stage1com') {
              return view('install.step2');
          }else{
             return redirect()->route('installApp');
          }
      }else{
          return redirect('/');
      }
      
    }

   
    public function step2(Request $request){

     
        $env_update = $this->changeEnv([
          'DB_HOST'     => $request->DB_HOST,
          'DB_PORT'     => $request->DB_PORT,
          'DB_DATABASE' => $request->DB_DATABASE,
          'DB_USERNAME' => $request->DB_USERNAME,
          'DB_PASSWORD' => $request->DB_PASSWORD
        ]);

        try
        {
            \DB::connection()->getPdo();
            if ($env_update)
            {
                Session::put('step2', 'stage2com');
                return redirect()->route('get.step3');
            }

        }catch(\Exception $e)
        {
          
          $errorcode = $e->getCode();
           if($errorcode){

              Session::flash('delete','Invalid Database details please check !');
              return view('install.step2');
           }
        }
        

    }

    public function getstep3(){

      try
        {
            \DB::connection()
                ->getPdo();

            if (env('IS_INSTALLED') == 0)
            {

                if (!\Schema::hasTable('genrals'))
                {
                    Artisan::call('migrate');
                    Artisan::call('db:seed');
                }

                if (Session::get('step1') == 'stage1com' && Session::get('step2') == 'stage2com')
                {
                    return view('install.step3');
                }
                else
                {

                    if (Session::get('step2') == 'stage2com')
                    {
                        return redirect()
                            ->route('get.step2');
                    }
                    else
                    {

                        return redirect()
                            ->route('installApp');
                    }
                }

            }
            else
            {
                return redirect('/');
            }

        }
        catch(\Exception $e)
        {

            $errorcode = $e->getCode();

            if ($errorcode == 1045 || $errorcode == 1049)
            {
              Session::flash('delete','Error Connecting in Database Please check details !');
              return redirect()->route('get.step2');

            }

            if ($errorcode == 2002 )
            {
              Session::flash('delete','Invalid Database host or port !');
              return redirect()->route('get.step2');
            }

            Session::flash('delete','Error Connecting to Database !');
              
            return redirect()->route('get.step2');

        }
       
        
      
    }

    public function storeStep3(Request $request){
        // store seo details

        $seo = Setting::first();

        $seo->project_title = $request->project_name;

        if ($request->project_desc !='') {
          $seo->meta_data_desc = $request->project_desc;
        }
        
        $seo->save();
        

        //store genral settings

        $newGenral = Setting::first();

        $newGenral->project_title = $request->project_name;

        if ($request->project_desc !='') {
          $newGenral->meta_data_desc = $request->project_desc;
        }
        
        $newGenral->wel_email   = $request->email;
        $newGenral->default_address = $request->address;
        $newGenral->default_phone = $request->mobile;

        

         if($file = $request->file('logo'))
        {
           $Logo = @file_get_contents('../public/images/logo/' . $newGenral->logo);

            if ($Logo)
            {
                unlink('../public/images/logo/' . $newGenral->logo);
            }
            
          

          $name = time().$file->getClientOriginalName();
          $file->move('images/logo', $name);
          $newGenral->logo = $name;
          
        }

        if($file = $request->file('favicon'))
        {
          $favicon = @file_get_contents('../public/images/favicon/' . $newGenral->fevicon);
          
        if ($favicon)
        {
            unlink('../public/images/favicon/' . $newGenral->fevicon);
        }
            
          

          $name = time().$file->getClientOriginalName();
          $file->move('images/favicon', $name);
          $newGenral->favicon = $name;
          
        }

        $newGenral->save();

        $data = Currency::first();
        $input = $request->all();

        if(isset($data))
        {
            $data->update($input);
        }
        else
        {
            $data = Currency::create($input);
            $data->save();
        }

        Session::put('step3','stage3com');

        return redirect()->route('get.step4');


    }

    public function getstep4(){

      if(env('IS_INSTALLED') == 0){
        if (Session::get('step1') == 'stage1com' && Session::get('step2') == 'stage2com' && Session::get('step3') == 'stage3com') {
            return view('install.step4');
        }else{
          if(Session::get('step3') == 'stage3com'){
              return redirect()->route('get.step3');
          }elseif(Session::get('step2') == 'stage2com'){
              return redirect()->route('get.step2');
          }else{
            return redirect()->route('installApp');
          }
        }
      }else{
        return redirect('/');
      }
      
    }

     public function storeStep4(Request $request){

        $request->validate([
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required',
            'mobile' => 'required',
            'profile_photo' => 'mimes:jpg,jpeg,png,bmp',
            'country' => 'required',
            'state_id' => 'required',
            'city_id' => 'required'
        ]);

        $useralready = User::first();

        if (isset($useralready)) {

            User::query()->truncate();

        }

        $dir = 'images/user_img';
        $leave_files = array('index.php');

        foreach( glob("$dir/*") as $file ) {
            if( !in_array(basename($file), $leave_files) ){
                unlink($file);
            }
        }

            $user = new User;

            $user->fname    = $request->fname;
            $user->lname    = $request->lname;
            $user->email    = $request->email;
            $user->role     = 'admin';
            $user->gender   = $request->gender;
            $user->password = Hash::make($request->password);
            $user->mobile   = $request->mobile;
            $user->country_id  = $request->country;
            $user->state_id = $request->state_id;
            $user->city_id  = $request->city_id;

            if($file = $request->file('profile_photo'))
            {

              if($user->user_img != "")
              {
                  unlink('images/user_img/'.$user->user_img);
              }
                
              $optimizeImage = Image::make($file);
              $optimizePath = public_path().'/images/user_img/';
              $image = time().$file->getClientOriginalName();
              $optimizeImage->save($optimizePath.$image, 72);
               
              $user->user_img = $image;
              
            }

            $user->save();
        
        
        Session::put('step4','stage4com');

        return redirect()->route('get.step5');

     }

     public function getstep5(){
      
      if(env('IS_INSTALLED') == 0){
         if (Session::get('step1') == 'stage1com' && Session::get('step2') == 'stage2com' && Session::get('step3') == 'stage3com' && Session::get('step4') == 'stage4com') {
          return view('install.step5');
        }else{
          if(Session::get('step3') == 'stage4com'){
             return redirect()->route('get.step4');
          }
          elseif(Session::get('step3') == 'stage3com'){
              return redirect()->route('get.step3');
          }elseif(Session::get('step2') == 'stage2com'){
              return redirect()->route('get.step2');
          }else{
            return redirect()->route('installApp');
          }
        }
      }else{
        return redirect('/');
      }
      

     }

     public function storeStep5(Request $request){
      
            $setting = Setting::first();

            if($request->rightclick == 'on')
            {
              $setting->rightclick = 1;
            }
            else{
              $setting->rightclick = 0;
            }

            if($request->inspect == 'on')
            {
              $setting->inspect = 1;
            }
            else{
              $setting->inspect = 0;
            }

            if($request->wel_email == 'on')
            {
              $setting->w_email_enable = 1;
            }
            else{
              $setting->w_email_enable = 0;
            }

            if($request->instructor_enable == 'on')
            {
              $setting->instructor_enable = 1;
            }
            else{
              $setting->instructor_enable = 0;
            }

            $setting->save();

            $apistatus = $this->update_status('1');

            if($apistatus == 1){
              $env_update = $this->changeEnv([
                'IS_INSTALLED' => '1'
              ]);

              Session::flush();

            \Artisan::call('cache:clear');
            \Artisan::call('view:cache');
            \Artisan::call('view:clear');

            return redirect('/'); 
            }else{
              \Artisan::call('cache:clear');
              \Artisan::call('view:cache');
              \Artisan::call('view:clear');
              return redirect()->route('get.step5');
            }

               

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

  public function update_status($status)
    {
        $token = (file_exists(public_path() . '/intialize.txt') && file_get_contents(public_path() . '/intialize.txt') != null) ? file_get_contents(public_path() . '/intialize.txt') : '0';

        $domain = \Request::getHttpHost();

        $ch = curl_init();

        $options = array(
            CURLOPT_URL => "https://mediacity.co.in/purchase/public/api/updatestatus",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 20,
            CURLOPT_POSTFIELDS => "status={$status}&domain={$domain}",
            CURLOPT_HTTPHEADER => array(
                'Accept: application/json',
                "Authorization: Bearer " . $token
            ) ,
        );

        curl_setopt_array($ch, $options);
        $response = curl_exec($ch);
        if (curl_errno($ch) > 0)
        {
            $message = "Error connecting to API.";
            return 2;
        }
        
        $responseCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if ($responseCode == 200)
        {
            $body = json_decode($response);
            return $body->status;
        }
        else
        {
            return 2;
        }
    }




}
