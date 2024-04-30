<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\WelcomeEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Mail\Mailable;

class InviteController extends Controller
{
    public function inviteindex(){
        return view('invite');
    }
    public function send_invite(Request $request){
        $request->validate([
            'email_id' => ['required', 'string', 'email', 'max:255'],
        ],);
        $email_id=$_POST['email_id'];
        $data = [
            'email_id' =>  base64_encode($email_id),
            'code' => 1,
        ];
        $sendmail = Mail::to($email_id)->send(new WelcomeEmail($data));
        if($sendmail){
            return back()->with('success', 'Invitation Link is successfully send');
        }
        
    }
}

