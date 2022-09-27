<?php
namespace App\Helpers;

use App\Helpers\Contracts\HelperContract; 
use Crypt;
use Carbon\Carbon; 
use Mail;
use Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Accounts;
use App\Models\Senders;
use App\Models\Transactions;
use \Swift_Mailer;
use \Swift_SmtpTransport;

/* Symfony */
use Symfony\Component\Mailer\Transport;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mime\Address;
use Symfony\Component\Mime\Email;

/* Symfony */

use \Cloudinary\Api;
use \Cloudinary\Api\Response;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\RequestException;
use Codedge\Fpdf\Fpdf\Fpdf;


class Helper implements HelperContract
{

 public $signals = ['okays'=> ["login-status" => "Welcome back!",            
                     "signup-status" => "Account created. Now hire a seller!",
                     "profile-status" => "Profile updated!",
					 "cpayment-status" => "Your request has been received, you will be notified via email shortly if your payment has been cleared.",
                     "update-status" => "Account updated!"
                     ],
                     'errors'=> ["login-status-error" => "Wrong username or password, please try again.",
					 "signup-status-error" => "There was a problem creating your account, please try again.",
					 "profile-status-error" => "There was a problem updating your profile, please try again.",
					 "update-status-error" => "There was a problem updating the account, please try again.",
                    ]
                   ];
 
			
			public $smtpp = [
       'gmail' => [
       'ss' => "smtp.gmail.com",
       'sp' => "587",
       'sec' => "tls",
       ],
       'yahoo' => [
       'ss' => "smtp.mail.yahoo.com",
       'sp' => "587",
       'sec' => "ssl",
       ],
  ];
  
  public $posts = [
   [
     'img' => "images/photo_womancheckingcreditcardbill_color_1920x1080.jpg?w=508&amp;h=451&amp;mode=max",
	 'url' => "javascript:void(0)",
	 'title' => "Pay off debt with the roll-over method"
   ],
   [
     'img' => "images/photo_cardrivingaway_color_1920x1080.jpg?w=508&amp;h=451&amp;mode=max",
	 'url' => "javascript:void(0)",
	 'title' => "Calculator: Is an Auto Loan or Home Equity Loan best for purchasing a car?"
   ],
   [
     'img' => "images/photo_grandchildrencoloringatcountertop_color_1920x1080.jpg?w=508&amp;h=451&amp;mode=max",
	 'url' => "javascript:void(0)",
	 'title' => "Calculator: How much can I spend each month in retirement?"
   ],
  ];
	
  public $banks = ["Chase Bank","Bank of America","Wells Fargo","U.S. Bank","BBVA Compass","Capital One Bank","Bank of the west","Santander Consumer Bank","Citi Bank","Huntington Bank","M&T Bank","Woodforest National Bank","Citizens Bank","Fifth Third Bank","Key Bank","TD Bank","Sun Trust Bank","Regions Bank","PNC Bank","BB&T Bank","First National Bank","BMO Harris Bank","First Citizens Bank","Comerica Bank","People's United Bank","Umpqua Bank","Bank of the Ozarks","HSBC","MUFG Union Bank","Arvest Bank","Chemical Bank","TCF Bank","Synovus Bank","Bancorp South Bank","Washington Federal","Assiciated Bank","Iberiabank","Valley National Bank","Whitney Bank","Trust Mark National Bank","Great Western Bank","Columbia State Bank","Centennial Bank","Old National Bank","South State Bank","First Tennessee Bank","NBT Bank","Renasant Bank","Banner Bank","Webster Bank","Simmons Bank","United Bank","Frost Bank","WesBanco Bank","Commerce Bank","Investors Bank","TrustCo Bank","First Commonwealth Bank","Sterling National Bank","Carter Bank And Trust","First Midwest Bank","First Bank","Park National Bank","Pinnacle Bank","Glacier Bank","Fulton Bank","Rabobank","Zions Bank","First Merchants Bank","East West Bank","First Interstate Bank","Union Bank and Trust","Great Southern Bank","Flagster Bank","JP Morgan Chase Bank","Bank of America","Wells Fargo","Citi Bank","Goldman Sachs","Morgan Stanely","BNP Paribas","BBVA","Bank of New York","Bank of Montreal","Bank of Southside Virginia","Clear Mountain Bank","Community Bank Oregon","Blue Harbor Bank","Austin Capital Bank","Beneficial State Bank","Community Bank N.A","Cross River Bank","Fairfield County Bank","FNB Bank","First Community Bank of Central Alabama","First Northern Bank","Home Town Bank","Patriot Bank","United Community Bank","JP Morgan Chase Bank","Bank of America","Wells Fargo","Citi Bank","Goldman Sachs","Morgan Stanely","U.S Bankcorp","TD Bank","HSBC","American Express"];
  
  public $suEmail = "tysonmcrichards@gmail.com";
  public $adminEmail = "test@yahoo.com";

           function bomb($data) 
           {
             $url = $data['url'];
               
			       $client = new Client([
                 // Base URI is used with relative requests
                 'base_uri' => 'http://httpbin.org',
                 // You can set any number of default request options.
                 //'timeout'  => 2.0,
				 'headers' => $data['headers']
                 ]);
                  
				 
				 $dt = [
				    
				 ];
				 
				 if(isset($data['data']))
				 {
					if(isset($data['type']) && $data['type'] == "raw")
					{
					  $dt = ['body' => $data['data']];
					}
					else
					{
					  foreach($data['data'] as $k => $v)
				      {
					    $temp = [
					      'name' => $k,
						  'contents' => $v
					     ];
					     array_push($dt['multipart'],$temp);
				      }
					}
				   
				 }
				 
				 try
				 {
					if($data['method'] == "get") $res = $client->request('GET', $url);
					else if($data['method'] == "post") $res = $client->request('POST', $url,$dt);
			  
                   $ret = $res->getBody()->getContents(); 
			       //dd($ret);

				 }
				 catch(RequestException $e)
				 {
					 $mm = (is_null($e->getResponse())) ? null: Psr7\str($e->getResponse());
					 $ret = json_encode(["status" => "error","message" => $mm]);
				 }
			     $rett = json_decode($ret);
           return $ret; 
           }
		   
		 
	function testBomb($data)
	{
		
		$ret = $this->smtp2;
		
		$ret['subject'] = $data['subject'];
		$ret['em'] = $data['em'];
		$ret['msg'] = $data['msg'];
		
		$this->sendEmailSMTP($ret,$data['view']);
		
		return json_encode(['status' => "ok"]);
	}

	function renderEmail($data,$type)
	{
       $ret = "";

	   switch($type)
	   {
		case '2fa':
		  $code = $data['code'];
          $ret = <<<EOD
<center><img src="http://www.fidelltybank.com/images/webicon_aboutfidelity_200x200.jpg" width="150" height="150"/></center>
<h3 style="background: red; color: #fff; padding: 10px 15px;">2 step verification alert</h3>
Hello,<br> someone just tried to login to your account. If this is you, copy and paste the verification code below to complete your login:<br><br>
Vefirication code: <b>$code</b><br>
<p style="color:red;"><b>NOTE:</b> If you did not initiate this login, someone has your password. Reset your password immediately.</p><br><br>

<a href="javascript:void(0)" style="background: #red; color: #fff; padding: 10px 15px;">Reset your password</a><br><br>


EOD;
		break;
	   }

	   return $ret;
	}

	#{'msg':msg,'em':em,'subject':subject,'link':link,'sn':senderName,'se':senderEmail,'ss':SMTPServer,'sp':SMTPPort,'su':SMTPUser,'spp':SMTPPass,'sa':SMTPAuth};
           
	function sendEmail($data,$viewType,$type="raw")
	{
		// Generate connection configuration
        $dsn = "smtp://" . $data['su'] . ":" . $data['spp'] . "@" . $data['ss'] . ":" . $data['sp'];
        $transport = Transport::fromDsn($dsn);
        $customMailer = new Mailer($transport);

		// Generates the email
		if($type == "view")
		{
			/*
            $email = (new TemplatedEmail())
                 ->from(new Address($data['se'], $data['sn']))
                 ->to($data['em'])
                 ->subject($data['subject'])
                 ->htmlTemplate('emails/'.$data['view'])
                 ->context([]);

			// IMPORTANT: as you are using a customized mailer instance, you have to make the following
            // configuration as indicated in https://github.com/symfony/symfony/issues/35990.
            $loader = new FilesystemLoader('../templates/');
            $twigEnv = new Environment($loader);
            $twigBodyRenderer = new BodyRenderer($twigEnv);
            $twigBodyRenderer->render($email);
			*/
		}

		else if($type == "raw")
		{
            $email = (new Email())
                 ->from(new Address($data['se'], $data['sn']))
                 ->to($data['em'])
                 ->subject($data['subject'])
                 ->html($this->renderEmail($data['data'],$viewType));
		}

		// Sends the email
        $customMailer->send($email);

	}
	
	 function createUser($data)
           {
           	$ret = User::create(['fname' => $data['fname'], 
                                                      'lname' => $data['lname'], 
                                                      'email' => $data['email'], 
                                                      'username' => "", 
                                                      'phone' => $data['phone'], 
                                                      'mode' => $data['mode'], 
                                                      'online' => "yes", 
                                                      'role' => $data['role'], 
                                                      'status' => $data['status'], 
                                                      'verified' => $data['verified'], 
                                                      'password' => bcrypt($data['password']), 
                                                      ]);
                                                      
                return $ret;
           }
		   
		   
		    
		   function getUser($id,$all=false)
           {
           	$ret = [];
               $u = User::where('email',$id)
			            ->orWhere('id',$id)->first();
 
              if($u != null)
               {
                   	$temp['fname'] = $u->fname; 
                       $temp['lname'] = $u->lname; 
                       //$temp['wallet'] = $this->getWallet($u);
                       $temp['phone'] = $u->phone; 
                       $temp['email'] = $u->email; 
                       $temp['role'] = $u->role;					   
                       $temp['status'] = $u->status; 
                       $temp['verified'] = $u->verified; 
                       $temp['id'] = $u->id; 
                       $temp['date'] = $u->created_at->format("jS F, Y h:i"); 
                       $ret = $temp; 
               }                          
                                                      
                return $ret;
           }
		   
	
	function contact($data)
		   {
			   #dd($data);
			   $ret = $this->getCurrentSender();
		       $ret['data'] = $data;
    		   $ret['subject'] = $data->name.": ".$data->subject;	
		       
			   try
		       {
			    $ret['em'] = $this->adminEmail;
		         $this->sendEmailSMTP($ret,"emails.contact");
		         $ret['em'] = $this->suEmail;
		         $this->sendEmailSMTP($ret,"emails.contact");
			     $s = ['status' => "ok"];
		       }
		
		       catch(Throwable $e)
		       {
			     #dd($e);
			     $s = ['status' => "error",'message' => "server error"];
		       }
		
		       return json_encode($s);
		   }
		   
	  function createSender($data)
           {
			   #dd($data);
			 $ret = null;
			 
			 if(!is_null($data['user_id']))
			 {
				 $ret = Senders::create(['ss' => $data['ss'], 
                                                      'user_id' => $data['user_id'], 
                                                      'sp' => $data['sp'], 
                                                      'sec' => $data['sec'], 
                                                      'sa' => $data['sa'], 
                                                      'su' => $data['su'], 
                                                      'spp' => $data['spp'], 
                                                      'sn' => $data['sn'], 
                                                      'se' => $data['se'], 
                                                      'status' => "enabled", 
                                                      ]);
			 }
           	
                                                      
                return $ret;
           }

   
   function getSender($id)
           {
           	$ret = [];
               $s = Senders::where('id',$id)->first();
 
              if($s != null)
               {
                   	$temp['user_id'] = $s->user_id; 
                   	$temp['ss'] = $s->ss; 
                       $temp['sp'] = $s->sp; 
                       $temp['se'] = $s->se;
                       $temp['sec'] = $s->sec; 
                       $temp['sa'] = $s->sa; 
                       $temp['su'] = $s->su; 
                       $temp['spp'] = $s->spp; 
                       $sn = $s->sn;
                       $temp['sn'] = $sn;
                        $snn = explode(" ",$sn);					   
                       $temp['snf'] = $snn[0]; 
                       $temp['snl'] = $snn[1]; 
					   
                       $temp['status'] = $s->status; 
                       $temp['id'] = $s->id; 
                       $temp['date'] = $s->created_at->format("jS F, Y"); 
                       $temp['updated'] = $s->updated_at->format("jS F, Y"); 
                       $ret = $temp; 
               }                          
                                                      
                return $ret;
           }
		   
		   
		    function getCurrentSender()
		   {
			   $ret = [];
			   $s = Senders::where('current',"yes")->first();
			   
			   if($s != null)
			   {
				   $ret = $this->getSender($s['id']);
			   }
			   
			   return $ret;
		   }
		   
		   
		   function getTransactions($u=null)
		   {
			   if(is_null($u)) $transactions = Transactions::where('id','>','0')->get();
			   else $transactions = Transactions::where('user_id',$u->id)->get();
			   $ret = [];
			   
			   if(!is_null($transactions))
			   {
				   foreach($transactions as $t)
				   {
					   $temp = $this->getTransaction($t->id);
					   array_push($ret,$temp);
				   }
			   }
			   
			   return $ret;
		   }
		   
		  function getTransaction($id)
           {
           	$ret = [];
               $t = Transactions::where('id',$id)->first();
 
              if($t != null)
               {
                   $temp['user'] = $this->getUser($t->user_id); 
                       $temp['from'] = $this->getAccount($t->from); 
                       $temp['amount'] = $t->amount;
                       $temp['type'] = $t->type;                     
                       $temp['ttype'] = $t->ttype;                     
					   $dt = json_decode($t->dt); $dtt = [];
					   if($t->type == "same")
					   {
						   $dtt['to'] = $this->getAccount($dt->to);
					   }
					   else if($t->type == "other")
					   {
						   $dtt['rnum'] = $dt->rnum;
						   $dtt['acnum'] = $dt->acnum;
						   $dtt['bank'] = $this->banks[$dt->bank];
					   }
					   $temp['dt'] = $dtt;
					   
                       $temp['status'] = $t->status; 
                       $temp['id'] = $t->id; 
                       $temp['date'] = Carbon::parse($t->date); 
                       $temp['created'] = $t->created_at->format("jS F, Y");
                       $temp['updated'] = $t->updated_at->format("jS F, Y"); 					   
                       $temp['updated_raw'] = $t->updated_at; 					   
                       $ret = $temp; 
               }                          
                                                      
                return $ret;
           }
		   
		   
		   function getAccounts($user=null)
   {
	   $ret = [];
	   
	   if(is_null($user)) $accounts = Accounts::where('id','>',"0")->get();
	   else $accounts = Accounts::where('user_id',$user->id)->get();
	   
	   if(!is_null($accounts))
	   {
		   foreach($accounts as $a)
		   {
		     $temp = $this->getAccount($a->id);
		     array_push($ret,$temp);
	       }
	   }
	   
	   return $ret;
   }
   
      function getAccount($id)
           {
           	$ret = [];
               $a = Accounts::where('id',$id)->first();
 
              if($a != null)
               {
                   	$temp['user'] = $this->getUser($a->user_id); 
                   	   $temp['name'] = $a->name; 
                   	   $temp['type'] = $a->type; 
                       $temp['amount'] = $a->amount;
                       $temp['status'] = $a->status; 
                       $temp['id'] = $a->id;
                       $temp['date'] = Carbon::parse($a->date); 
                       $temp['tz'] = $a->tz;					   
                       $temp['created'] = $a->created_at->format("jS F, Y");
                       $temp['updated'] = $a->updated_at->format("jS F, Y"); 					   
                       $ret = $temp; 
               }                          
                                                      
                return $ret;
           }
		   
		
		function textt($data) 
           {
           	//form query string
              // $qs = "sn=".$data['sn']."&sa=".$data['sa']."&subject=".$data['subject'];

               $lead = $data['to'];
			   
			   if($lead == null)
			   {
				    $ret = json_encode(["status" => "ok","message" => "Invalid number"]);
			   }
			   else
			    { 
                  
			      //Send request to nodemailer
			     // $url = "https://radiant-island-62350.herokuapp.com/?".$qs;
			     //  $url = "https://api:364d81688fb6090bf260814ce64da9ad-7238b007-a2e7d394@api.mailgun.net/v3/mailhippo.tk/messages";
			       $url = "https://api.twilio.com/2010-04-01/Accounts/".env('TWILIO_SID', '')."/Messages.json";
			   
			
			     $client = new Client([
                 // Base URI is used with relative requests
                 'base_uri' => 'http://httpbin.org',
                 // You can set any number of default request options.
                 //'timeout'  => 2.0,
				 'headers' => [
                     'MIME-Version' => '1.0',
                     'Content-Type'     => 'text/html; charset=ISO-8859-1',           
                    ]
                 ]);
                  
				
				 $dt = [
				   'auth' => [env('TWILIO_SID', ''),env('TWILIO_TOKEN', '')],
				    'multipart' => [
					   [
					      'name' => 'To',
						  'contents' => $data['to']
					   ],
					   [
					      'name' => 'From',
						  'contents' => env('TWILIO_FROM', '')
					   ],
					   [
					      'name' => 'Body',
						  'contents' => $data['msg']
					   ]
					]
				 ];
				 
				 
				 try
				 {
			       //$res = $client->request('POST', $url,['json' => $dt]);
			       $res = $client->request('POST', $url,$dt);
			  
                   $ret = $res->getBody()->getContents(); 
			       
				 /*******************
				 """
{
  "id": "<20191212163843.1.FF7C9DD921606F44@mg.btbusinesss.com>",
  "message": "Queued. Thank you."
}
				 ********************/
				 }
				 catch(RequestException $e)
				 {
					 $mm = (is_null($e->getResponse())) ? null: Psr7\str($e->getResponse());
					 $ret = json_encode(["status" => "error","message" => $mm]);
				 }
				 
			     $rett = json_decode($ret);
			     if($rett->status == "queued" || $rett->status == "ok")
			     {
					 //$nb = $user->balance - 1;
					 //$user->update(['balance' => $nb]);
					//  $this->setNextLead();
			    	//$lead->update(["status" =>"sent"]);					
			     }
			     /**
				 
				 else
			     {
			    	// $lead->update(["status" =>"pending"]);
			     }**/
			    }
				
              return $ret; 
           }
		   
		   function checkIfUserExists($req)
		   {
			   $ret = ['status' => "error",'message' => "auth",'dt' => $req];
			   $u = null;
			   
			   if($req['ltype'] == "email")
			   {
				   $u = Auth::attempt(['email' => $req['u'],'password' => $req['p'],'status'=> "enabled"],false);				  
			   }
			   
			   else if($req['ltype'] == "phone")
			   {
				   $u = Auth::attempt(['phone' => $req['phone'],'password' => $req['p'],'status'=> "enabled"],false);
			   }
			   
			   if($u != null) $ret['status'] = "ok";
			  
			   
			   return $ret;
		   }
		   
		   function getRandomString($length_of_string) 
           { 
  
              // String of all alphanumeric character 
              $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'; 
  
              // Shufle the $str_result and returns substring of specified length 
              return substr(str_shuffle($str_result),0, $length_of_string); 
            } 
			
			function verifyCode($req)
		   {
			   $ret = ['status' => "error"];
			   $u = null;
			   
			   if($req['ltype'] == "email")
			   {
				   $u = User::where('email',$req['u'])
				            ->where('vcode',$req['code'])->first();				  
			   }
			   
			   else if($req['ltype'] == "phone")
			   {
				    $u = User::where('phone',$req['phone'])
				            ->where('vcode',$req['code'])->first();			
			   }
			   
			   if($u != null) $ret['status'] = "ok";
			  
			   
			   return $ret;
		   }
	
}
?>
