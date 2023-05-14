<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Helpers\Contracts\HelperContract; 
use Auth;
use Session; 
use Validator; 
use Carbon\Carbon; 
use App\User;

class LoginController extends Controller {

	protected $helpers; //Helpers implementation
    
    public function __construct(HelperContract $h)
    {
    	$this->helpers = $h;            
    }
	
		/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getRegister(Request $request)
    {
		 $user = null;
		$cart = [];
		if(Auth::check())
		{
			return redirect()->intended('dashboard');
		}
		$cart = $this->helpers->getCart($user);
		$signals = $this->helpers->signals;
		return view("register",compact(['user','cart','signals']));
    }
	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	 
    /**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getLogin(Request $request)
    {
 $user = null;
		$cart = [];
		if(Auth::check())
		{
			return redirect()->intended('dashboard');
		}
		//$cart = $this->helpers->getCart($user);
		$signals = $this->helpers->signals;
		return view("login",compact(['user','cart','signals']));
    }

 /**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getTestLogin(Request $request)
    {
 $user = null;
		$cart = [];
		if(Auth::check())
		{
			return redirect()->intended('dashboard');
		}
		//$cart = $this->helpers->getCart($user);
		$signals = $this->helpers->signals;
		return view("test-login",compact(['user','cart','signals']));
    }

  
	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
    public function postLogin(Request $request)
    {
        $req = $request->all();
        #dd($req);
        $ret = ['status' => "error"];
		
        $validator = Validator::make($req, [
                             'ltype' => 'required'
         ]);
         
         if($validator->fails())
         {
             $messages = $validator->messages();
            $ret['message'] = "validation";
             //dd($messages);
         }
         
         else
         {
			 if(isset($req['num'])) $req['phone'] = $req['num'];
         	$ret = $this->helpers->checkIfUserExists($req);
			
			if($ret['status'] == "ok")
			{
				$user = Auth::user();
				/*$code = $this->helpers->getRandomString(6);
				$user->update(['vcode' => $code]);
				 Auth::logout();
				 
				//send verification sms/email here
				switch($req['ltype'])
				{
					case "email":
					 $smtp = $this->helpers->getCurrentSender();
		             $smtp['data'] = ['email' => $req['u'], 'code' => $code];
    		         $smtp['subject'] = "URGENT: Someone just tried to login to your account";	
		       
			        try
		            {
			          $smtp['em'] = $req['u'];
		              $this->helpers->sendEmail($smtp,"2fa");
		            }
		
		            catch(Throwable $e)
		            {
			          #dd($e);
			          $ret = ['status' => "error",'message' => "server error"];
		            }
		
		            break;
					
					case "phone":
					 $txt = ['to' => $req['num'], 'msg' => "Your verification code is ".$code];
					 
					 try
					 {
						$this->helpers->textt($txt); 
					 }
					 catch(Throwable $e)
		             {
			          #dd($e);
			          $ret = ['status' => "error",'message' => "server error"];
		             }
					break;
				}
                */
			}
         }
         
         return json_encode($ret);		 
    }
	
	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
    public function postVerifyLogin(Request $request)
    {
        $req = $request->all();
        #dd($req);
        $ret = ['status' => "error"];
		
        $validator = Validator::make($req, [
                             'p' => 'required|min:6',
                             'ltype' => 'required',
         ]);
         
         if($validator->fails())
         {
             $messages = $validator->messages();
            $ret['message'] = "validation";
             //dd($messages);
         }
         
         else
         {
			 if(isset($req['num'])) $req['phone'] = $req['num'];
         	$ret = $this->helpers->verifyCode($req);
			
			if($ret['status'] == "ok")
			{
				$this->helpers->checkIfUserExists($req);
				$user = Auth::user();
				$user->update(['vcode' => ""]);
			}
         }
         
         return json_encode($ret);		 
    }


    
    
	
    public function postRegister(Request $request)
    {
        $req = $request->all();
      # dd($req);
        
        $validator = Validator::make($req, [
                             'password' => 'required|min:7|confirmed',
                             'email' => 'required|email',                            
                             'phone' => 'required|numeric',
                             'fname' => 'required',
                             'lname' => 'required',
                            // 'terms' => "required|accepted"
         ]);
         
         if($validator->fails())
         {
             $messages = $validator->messages();
             //dd($messages);
             
             return redirect()->back()->withInput()->with('errors',$messages);
         }
         
         else
         {
            $req['mode'] = "buyer";    
            $req['role'] = "user";    
            $req['phone'] = "";    
            $req['online'] = "yes";    
            $req['status'] = "enabled";           
            $req['verified'] = "yes";           
            
                       #dd($req);            

            $user =  $this->helpers->createUser($req); 
			Auth::login($user);
			$req['user_id'] = $user->id;
			$wallet =  $this->helpers->createWallet($user->id);
			
			/**
			 $req['company'] = "";
             $shippingDetails =  $this->helpers->createShippingDetails($req); 
            
           
                                                    
             //after creating the user, send back to the registration view with a success message
             #$this->helpers->sendEmail($user->email,'Welcome To Disenado!',['name' => $user->fname, 'id' => $user->id],'emails.welcome','view');
			**/
             session()->flash("signup-status", "ok");
			 return redirect()->intended('dashboard');
          }
    }

   
	public function getForgotUsername()
    {
		$layoutAd = $this->helpers->getAds();
         return view('forgot_username',compact(['layoutAd',]));
    }
    
    /**
     * Send username to the given user.
     * @param  \Illuminate\Http\Request  $request
     */
    public function postForgotUsername(Request $request)
    {
    	$req = $request->all(); 
        $validator = Validator::make($req, [
                             'email' => 'required|email'
                  ]);
                  
        if($validator->fails())
         {
             $messages = $validator->messages();
             //dd($messages);
             
             return redirect()->back()->withInput()->with('errors',$messages);
         }
         
         else{
         	$ret = $req['email'];

                $user = User::where('email',$ret)->first();

                if(is_null($user))
                {
                        return redirect()->back()->withErrors("This user doesn't exist!","errors"); 
                }
                
                #$this->helpers->sendEmail($user->email,'Your Username',['username' => $user->username],'emails.username','view');                                                         
            session()->flash("username-status","success");           
            return redirect()->intended('forgot-username');

      }
                  
    }    
    
    
    public function getForgotPassword()
    {
    	$user = null;
		
		if(Auth::check())
		{
			$user = Auth::user();
			return redirect()->intended('/');
		}
		$signals = $this->helpers->signals;
		$layoutAd = $this->helpers->getAds();
         return view('forgot-password', compact(['layoutAd','user','signals']));
    }
    
    /**
     * Send username to the given user.
     * @param  \Illuminate\Http\Request  $request
     */
    public function postForgotPassword(Request $request)
    {
    	$req = $request->all(); 
        $validator = Validator::make($req, [
                             'id' => 'required'
                  ]);
                  
        if($validator->fails())
         {
             $messages = $validator->messages();
             //dd($messages);
             
             return redirect()->back()->withInput()->with('errors',$messages);
         }
         
         else{
         	$ret = $req['id'];

                $user = User::where('email',$ret)
                                  ->orWhere('phone',$ret)->first();

                if(is_null($user) || ($user->role == 'user'))
                {
                        return redirect()->back()->withErrors("No admin account exists with that email or phone number!","errors"); 
                }
                
                //get the reset code 
                $code = $this->helpers->getPasswordResetCode($user);
              
                //Configure the smtp sender
                $sender = $this->helpers->emailConfig;              
                $sender['sn'] = 'KloudTransact Support'; 
                #$sender['se'] = 'kloudtransact@gmail.com'; 
                $sender['em'] = $user->email; 
                $sender['subject'] = 'Reset Your Password'; 
                $sender['link'] = 'www.kloudtransact.com'; 
                $sender['ll'] = url('reset').'?code='.$code; 
                
                //Send password reset link
                $this->helpers->sendEmailSMTP($sender,'emails.password','view');                                                         
            session()->flash("forgot-password-status","ok");           
            return redirect()->intended('forgot-password');

      }
                  
    }    
    
  
    /**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getPasswordReset(Request $request)
    {
       $user = null;
       $req = $request->all();
       $return = isset($req['return']) ? $req['return'] : '/';
		
		if(Auth::check())
		{
			$user = Auth::user();
			$return = 'dashboard';
			if($this->helpers->isAdmin($user)) $return = 'cobra';
			return redirect()->intended($return);
		} 
       else
        {
			if(isset($req['code']))
            {
            	$user = $this->helpers->verifyPasswordResetCode($req['code']);
                if($user == null)   
                { 
                	return redirect()->back()->withErrors("The code is invalid or has expired. ","errors"); 
                }
                $v = ($user->role == "user") ? 'reset' : 'admin.reset';
				$layoutAd = $this->helpers->getAds();
            	return view($v,compact(['layoutAd','user','return']));
            }
            
            else
            {
            	return redirect()->intended($return);
            }
         	
          }
    }
    
    
    /**
     * Send username to the given user.
     * @param  \Illuminate\Http\Request  $request
     */
    public function postPasswordReset(Request $request)
    {
    	$req = $request->all(); 
        $validator = Validator::make($req, [
                             'pass' => 'required|min:6|confirmed',
                             'acsrf' => 'required'
                  ]);
                  
        if($validator->fails())
         {
             $messages = $validator->messages();
             //dd($messages);
             
             return redirect()->back()->withInput()->with('errors',$messages);
         }
         
         else{
         	$id = $req['acsrf'];
             $ret = $req['pass'];

            $user = User::where('id',$id)->first();
            $user->update(['password' => bcrypt($ret)]);
                
            session()->flash("reset-status","ok");  
            $v = ($user->role == "user") ? 'login' : 'admin';         
            return redirect()->intended($v);

      }
                  
    }    

   
    
    public function getLogout()
    {
        if(Auth::check())
        {  
           Auth::logout();       	
        }
        
        return redirect()->intended('/');
    }

}