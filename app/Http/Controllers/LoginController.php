<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\UserPj;
use App\Models\UserMusic;
use App\Mail\SendWelcomeClient;
use App\Mail\SendCodeMail;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendReinitPasswordMail;


class LoginController extends Controller
{
    //
    const PDP_IMG_PATH = 'assets\img\app\pdp\\';
    const PJ_IMG_PATH = 'assets\img\app\pj\\';

    public function __construct()
    {

        //$this->middleware('guest');
    }

    public function login(Request $request){
        
    	return view('account.login');
    }

    public function loginMail(Request $request){
        
        return view('account.login.login-mail');
    }


    public function register(Request $request){
    	return view('account.register');
    }

    public function registerMail(Request $request){
        return view('account.register-mail');
    }

    public function passwordforgot(Request $request) {
        return view('account.forgot_password');
    }

    public function processRegistration(Request $request) {

        $userData = $request->all();
        $lastStep = true;
        
        if(isset($userData['step'])) {
            switch ($userData['step']) {
                case '1': {
                  $validated = $request->validate([
                    'email' => 'required|email|unique:users',
                    'password' => 'required|confirmed'
                  ]);
                  $lastStep = false;
                  break;  
                }

                case '2': {
                  $validated = $request->validate([
                    'name' => 'required',
                    'age' => 'required|numeric|min:13',
                    'adresse' => 'required',
                    'ville' => 'required'

                  ]);
                  $lastStep = false;
                  break;  
                }
                case '3': {

                  $validated = $request->validate([
                    'telephone' => 'required|regex:/(0)[0-9]{9}$/',
                    'whatsapp' => 'nullable|regex:/(0)[0-9]{9}$/',
                    'fb_link' =>  'nullable|regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*/'

                  ]);
                  $lastStep = false;
                  break;  
                }

                case 'last': {
                  $lastStep = true;
                  break;  
                }
                    
                
                default:
                    $lastStep = false;
                    # code...
                    break;
            }
        }
        
    	
        if($lastStep) {
            $userData = $request->all();
            $userData['password'] = bcrypt($userData['password']);
            

            if($request->profil_image) {
                $imageName = time() . str_replace(' ', '', $userData['name']) . '.' . $request->profil_image->extension();
                $request->profil_image->move(public_path(self::PDP_IMG_PATH), $imageName);
                $userData['pdp'] = $imageName;
            } else {
                if($userData['sex'] == 0) {
                    $userData['pdp'] = 'pdp-F.png'; 
                } else {
                    $userData['pdp'] = 'pdp-H.png';
                } 
            } 

            $userData['aime_discuter'] = ($userData['aime_discuter'] == 'on') ? 1 : 0;
            $userData['aime_music_tout_long'] = ($userData['aime_music_tout_long'] == 'on') ? 1 : 0; 
            $user = User::create($userData);
            $this->savePJ($request, $user);
            $this->saveMusics($userData, $user);
            Auth::login($user);
            $this->sendWelcomeMail($user);
            $this->sendCodeMail($user);

            if(isset($userData['email'])) {
                return redirect()->route('covoiturage.user.mail.verify');
            }
            return redirect()->route('espace_client');


            /*if(is_login_redirected_last_url()) {
                $last_url = get_last_url();
                clear_last_url();
                return \Redirect::to($last_url);
            } else
                return redirect()->route('espace_client');*/
        }
        return response()->json([]);
    }

    private function saveMusics($data, $user)
    {
        if(isset($data['musics'])) {
            $musics = $data['musics'];
            foreach ($musics as $key => $music) {
                UserMusic::create([
                    'user_id' => $user->id,
                    'libelle' => $music
                ]);
            }

        }
    }

    private function savePJ($request, $user)
    {
        if($request->cin_recto) {
            $filename = time() . 'cin_recto' . str_replace(' ', '', $user->nom) . '.' . $request->cin_recto->extension();
            $request->cin_recto->move(public_path(self::PJ_IMG_PATH), $filename);
            UserPj::create([
                'user_id' => $user->id,
                'recto_verso' => 'recto',
                'pj_name' => 'cin',
                'filename' => $filename
            ]);
        } 

        if($request->cin_verso) {
            $filename = time() . 'cin_verso' . str_replace(' ', '', $user->nom) . '.' . $request->cin_verso->extension();
            $request->cin_verso->move(public_path(self::PJ_IMG_PATH), $filename);

            UserPj::create([
                'user_id' => $user->id,
                'recto_verso' => 'verso',
                'pj_name' => 'cin',
                'filename' => $filename
            ]);
        } 

        if($request->permis_recto) {
            $filename = time() . 'permis_recto' . str_replace(' ', '', $user->nom) . '.' . $request->permis_recto->extension();
            $request->permis_recto->move(public_path(self::PJ_IMG_PATH), $filename);
            UserPj::create([
                'user_id' => $user->id,
                'recto_verso' => 'recto',
                'pj_name' => 'permis',
                'filename' => $filename
            ]);
        }

        if($request->permis_verso) {
            $filename = time() . 'permis_verso' . str_replace(' ', '', $user->nom) . '.' . $request->permis_verso->extension();
            $request->permis_verso->move(public_path(self::PJ_IMG_PATH), $filename);
            UserPj::create([
                'user_id' => $user->id,
                'recto_verso' => 'verso',
                'pj_name' => 'permis',
                'filename' => $filename
            ]);
        }

        if($request->residence) {
            $filename = time() . 'residence' . str_replace(' ', '', $user->nom) . '.' . $request->residence->extension();
            $request->residence->move(public_path(self::PJ_IMG_PATH), $filename);
            UserPj::create([
                'user_id' => $user->id,
                'recto_verso' => 'recto',
                'pj_name' => 'residence',
                'filename' => $filename
            ]);
        }
    }

    private function sendWelcomeMail($user)
    {
        Mail::to($user->email)->send(new SendWelcomeClient($user)); 
    }

    public function verifyAccount(Request $request) {
        $data = $request->all();
        $validated = $request->validate([
            'code' => 'required'
        ]);
        $code = \Session::get('code_verification');
        $user = User::find(\Auth::id());
        $user->update([
            'is_email_verified' => true,
            'email_verified_at' => date('Y-m-d H:i')
        ]);

        if($code == trim($request->code)) {
            return response()->json(['url' => route('espace_client')]); 
        } 
        else 
        {
            return response()->json(['error'=>'error']); 
        }
    }

    public function verify(Request $request,)
    {  
        return view('account.register.verify-mail');
    }

    private function sendCodeMail($user)
    {
        $code = randomNumber();
        \Session::put('code_verification', $code);
        $user->code = $code;
        Mail::to($user->email)->send(new SendCodeMail($user)); 
    }

    public function processLogin(Request $request) {

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        
        if(Auth::attempt($credentials)) {
            if(is_login_redirected_last_url()) {
                $last_url = get_last_url();
                clear_last_url();
                return \Redirect::to($last_url);
            } else
                return redirect()->route('espace_client');
        }
        
        return back()->withErrors([
            'message' => 'error',
        ]);
    }

    public function reinitPassword(Request $request)
    { 
        $validated = $request->validate([
            'email' => 'required'
        ]);
        $user = User::where('email', $request->email)->first();

        if($user) {
            $token = bcrypt($user->id . time());

            $user->update([
                'remember_token' => $token
            ]);


            $this->sendReinitPasswordMail($user);
            $request->session()->flash('message', 'message');
            return redirect()->back();

        } else {
            $request->session()->flash('message_error', 'message_error');
            return redirect()->back();
        }
    }

    private function sendReinitPasswordMail($user)
    {
        Mail::to($user->email)->send(new SendReinitPasswordMail($user)); 
    } 

    public function updateReinitPassword(Request $request)
    { 
        $user = User::where('remember_token', $request->token)->first();
        if($user) {
            return view('account.reinit-password', ['token' => $request->token]);
        } else {
            return redirect()->route('passwordforgot');
        }
    } 

     public function createPassword(Request $request)
    { 
       $validated = $request->validate([
            'password' => 'required|confirmed'
        ]);

       $user = User::where('remember_token', $request->token)->first();
        if($user) {
            
            $user->update(
                ['password' => bcrypt($request->password),
                'remember_token'=> null]
            );

            $request->session()->flash('message_create_password', 'message_create_password');
            return redirect()->route('login');
        } else {
            return redirect()->back();
        }
    } 
}
