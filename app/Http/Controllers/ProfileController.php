<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Mail\WelcomeEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Mail\Mailable;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
      $users = User::select('id', 'name', 'email', 'email_verified_at', 'is_admin','is_approved')->where('is_admin','0')->orderBy('id', 'desc')->get();
    //   echo '<pre>';print_r($users);
    //   dd($users);
      return view('list-profile', compact('users'));
    }

    public function edit(Request $request, $id)
    {
        $user_details = User::where('id',$id)->first();
        //echo '<pre>';print_r($user_details);echo '</pre>';
        return view('edit-profile', compact('user_details'));
    }


    // public function show(Request $request, $id)
    // {
    //     $driver_list = users::find($id);
    //     $vehicles = Vehicle::select('code', 'vehicle')->get();
    //     return view('driver.view', compact('driver_list', 'vehicles'));
    // }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);
        $user_profile = User::find($id);
        $user_profile->update($request->all());
        return redirect('/users')->with('success', 'User record updated successfully.');
    }
    public function destroy($id)
    {
        $user_records = User::find($id);
        $user_records->delete();
        return redirect('/users')->with('success', 'User record deleted successfully.');
    }
    public function isapproved($id)
    {
        if ($_POST['is_approved'] == 0) {
            $status = 1;
            $message="Congratulation your account in now succesfully Activated.";
        } else {
            $status = 0;
            $message="Contact with Administrator you account in deactivated";
        }
        User::where('id', $id)->update(array('is_approved' => $status));;
        $user_details=User::find($id);
        $useremail=$user_details->email;
        $data = [
            'email_id' =>  $useremail,
            'code' => 3,
            'message'=>$message,
        ];
        $sendmail = Mail::to($useremail)->send(new WelcomeEmail($data));
        return redirect('/users')->with('success', 'Users record deleted successfully.');
    }
}
