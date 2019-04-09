<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Mail\SendEmail;
use Mail;

class DemoEmailController extends Controller
{
    function index(){
    	return 1;
    }

    public function sendEmail(Request $request){

	    // $messages = [
	    //     'required' => 'Trường :attribute bắt buộc nhập.',
	    //     'email'    => 'Trường :attribute phải có định dạng email'
	    // ];
	    // $validator = Validator::make($request->all(), [
	    //     'to_email' => 'required|emails',
	    //     'subject'  => 'required',
	    //     'body'     => 'required'
	    // ], $messages);

	    // if ($validator->fails()) {
	    //     return redirect('admin/email')
	    //             ->withErrors($validator)
	    //             ->withInput();
	    // } else {
	        // $email_service = $request->input('email_service');
	        
	        config(['mail.driver' => 'smtp', 'mail.host' => 'smtp.gmail.com', 'mail.port' => 587, 'mail.username' => 'tranquangtanqt1190@gmail.com', 'mail.password' => 'oxksatmagyoegxdb', 'mail.encryption' => null]);

	        // $email_arr = explode(',', $request->input('to_email'));
	        // for ($i=0; $i < count($email_arr); $i++) { 
	        // 	$mailable = new SendEmail();
	        // 	Mail::to($email_arr[$i])->send($mailable);
	        // }
	        $email_arr = 'tranquangtanqt1990@gmail.com';
        	$mailable = new SendEmail();
        	Mail::to($email_arr)->send($mailable);
	        
	        // return redirect('admin/email')
	        //         ->with('message', 'Send email success!');
        	$status = "Thanh cong";
	        return response()->json($status, 200);
	    // }
	}
}
