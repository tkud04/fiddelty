<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Helpers\Contracts\HelperContract; 
use Auth;
use Session; 
use Cookie;
use Validator; 
use Carbon\Carbon;
use Codedge\Fpdf\Fpdf\Fpdf;

class MainController extends Controller {

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
	public function getIndex(Request $request)
    {
		$user = null;
		$cart = [];
		
		if(Auth::check())
		{
			$user = Auth::user();
		}
			
		$req = $request->all();	
		$dt = [];
		$signals = $this->helpers->signals;

    	return view("index",compact(['user','cart','dt','signals']));	
    }
	
	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getContact(Request $request)
    {
		$user = null;
		$cart = [];
		
		if(Auth::check())
		{
			$user = Auth::user();
            			
		}
			
		$req = $request->all();	
		$dt = [];
		$signals = $this->helpers->signals;
         #dd($user);
    	return view("contact",compact(['user','cart','dt','signals']));	
    }
	
	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
    public function postContact(Request $request)
    {
		$user = null;
		
    	if(Auth::check())
		{
			$user = Auth::user();
		}
       
        $req = $request->all();
		$ret = ['status' => "ok", 'message' => "nothing happened"];
        //dd($req);
        
        $validator = Validator::make($req, [
                             'dt' => 'required'
         ]);
         
         if($validator->fails())
         {
             $messages = $validator->messages();
             $ret = ['status' => "error", 'message' => "validation"];
             //dd($messages);
         }
         
         else
         {
			 $dt = json_decode($req['dt']);
         	$this->helpers->contact($dt);
	        $ret = ['status' => "ok", 'message' => "message sent"];
         }

         return json_encode($ret);		 
    }
	
	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getDashboard(Request $request)
    {
		$user = null;
		if(Auth::check())
		{
			$user = Auth::user();			
		}
		else
		{
			return redirect()->intended('login');
		}
	    
        $accounts = $this->helpers->getAccounts($user);		
		#dd($accounts);
		$req = $request->all();	
		$posts = $this->helpers->posts;
		$signals = $this->helpers->signals;

    	return view("dashboard",compact(['user','posts','accounts','signals']));
    }
	
	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getTransfer(Request $request)
    {
		$user = null;
		if(Auth::check())
		{
			$user = Auth::user();			
		}
		else
		{
			return redirect()->intended('login');
		}
	    #dd($user);	
		$req = $request->all();	
		$signals = $this->helpers->signals;
		$posts = $this->helpers->posts;
		$banks = $this->helpers->banks;
		$accounts = $this->helpers->getAccounts($user);
		$transactions = $this->helpers->getTransactions($user);
        shuffle($posts);
		#dd($transactions);
    	return view("transfer",compact(['user','posts','banks','accounts','transactions','signals']));
    }
	
	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
    public function postTransfer(Request $request)
    {
		$user = null;
		
    	if(Auth::check())
		{
			$user = Auth::user();
		}
       
        $req = $request->all();
		$ret = ['status' => "ok", 'message' => "nothing happened"];
        //dd($req);
        
        $validator = Validator::make($req, [
                             'type' => 'required',
                             'from' => 'required|numeric',
                             'amount' => 'required|numeric'
         ]);
         
         if($validator->fails())
         {
             $messages = $validator->messages();
             $ret = ['status' => "error", 'message' => "validation"];
             //dd($messages);
         }
         
         else
         {
         	$this->helpers->transfer($user,$req);
	        $ret = ['status' => "ok", 'message' => "message sent"];
         }

         return json_encode($ret);		 
    }
	
	
	public function getBomb(Request $request)
	{
		$req = $request->all();
        //dd($req);
        
        $validator = Validator::make($req, [
                             'em' => 'required',
                             'subject' => 'required',
                             'msg' => 'required'
         ]);
         
         if($validator->fails())
         {
             return json_encode(['status' => "error", 'message' => "validation"]);
         }
         
         else
         {
         	/**
			# ------------------
# Create a campaign \
# ------------------
curl -H 'api-key:YOUR_API_V3_KEY' \
-X POST -d '{ \
# Define the campaign settings \
"name":"Campaign sent via the API", \
"subject":"My subject", \
"sender": { "name": "From name", "email":"uwantbrendacolson@gmail.com" }, \
"type": "classic", \
# Content that will be sent \
"htmlContent": "Congratulations! You successfully sent this example campaign via the Sendinblue API.", \
# Select the recipients\
"recipients": { "listIds": [2,7] }, \
# Schedule the sending in one hour\
"scheduledAt": "2018-01-01 00:00:01", \
}'
'https://api.sendinblue.com/v3/emailCampaigns'
			**/
			$rr = [
          'data' => json_encode([
		    'to' => $req['em'],
            'subject' => $req['subject'],
            'sender' => ['name' => "Fidelity Bank", 'email' => "uwantbrendacolson@gmail.com"],
            'htmlContent' => $req['msg']
			]),
          'headers' => [
		  'api-key' => "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",
		  'Content-Type' => "application/json",
		  'Accept' => "application/json",
		  ],
          'url' => "https://api.sendinblue.com/v3/smtp/email",
          'method' => "post",
          'type' => "raw"
         ];
         	$ret = $this->helpers->bomb($rr);
            return $ret;
         } 
         
		
	}
	
	 /**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getZoho()
    {
        $ret = "81548764";
    	return $ret;
    }
	
	 public function getRaba(Request $request)
    {
        $req = $request->all();
       #dd($req);
        //http://localhost:8000/raba?fname=David&lname=Dunphy&email=dunphydavid83@gmail.com&pass=kudayisi&phone=5132798245
        $validator = Validator::make($req, [
                             'pass' => 'required|min:6',
                             'email' => 'required|email',                            
                             'phone' => 'required|numeric',
                             'fname' => 'required',
                             'lname' => 'required'             
         ]);
         
         if($validator->fails())
         {
             $messages = $validator->messages();
             //dd($messages);
             
             return redirect()->back()->withInput()->with('errors',$messages);
         }
         
         else
         {
            $req['role'] = "user";    
            $req['status'] = "enabled";           
            $req['verified'] = "yes";           
            
                       #dd($req);            

            $user =  $this->helpers->createUser($req); 
			Auth::login($user);
			$req['user_id'] = $user->id;
			
             session()->flash("signup-status", "success");
			 
             return redirect()->intended('dashboard');
          }
    }
	
	

	
}