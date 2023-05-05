<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Auth;

class UserController extends Controller
{
    public function adduser(){
        return view('user.adduser');
    }

    public function store(Request $request){
        $request->validate(
            [
            'firstname' => 'required|min:3|max:20',
            'lastname' => 'required|min:3|max:20',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:8',
            'confirm_password' =>'required|min:8|required_with:pa
                ssword|same:password',
            'contact' => 'required|numeric|digits:10',
            'address' => 'required',
            'dob' => 'required|after:1990|before:today',
            'gender' => 'required',
            'active' => 'required',
            'roles' => 'required',
            'terms&condition' => 'required',
            ],
            [
                'firstname.required' => 'Please enter your firstname',
                'lastname.required' => 'Please enter your lastname',
                'email.required' => 'Please enter your email',
                'password.required' => 'Please enter your password',
                'password.min' => 'password Length Should Be More Than 8 Character',
                'confirm_password.required' => 'Please enter your confirm password',
                'confirm_password.same' => 'Password Confirmation should match the password',
                'confirm_password.confirm_password' => 'invalidate password',
                'contact.required' => 'Please enter your contact',
                'contact.digits' => 'contact length must be 10 character',
                'address.required' => 'Please enter your address',
                'dob.required' => 'Please select your date of birth',
                'gender.required' => 'Please select your gender',
                'active.required' => 'Please select your Status',
                'roles.required' => 'Please select your roles',
                'terms&condition.required' => 'Please accept your terms of service',
            ]);
            $user = new User;
            $user->firstname = $request['firstname'];
            $user->lastname = $request['lastname'];
            $user->email = $request['email'];
            $user->password = Hash::make($request['password']);
            $user->contact = $request['contact'];
            $user->address = $request['address'];
            $user->dob = $request['dob'];
            $user->gender = $request['gender'];
            $user->active = $request['active'];
            $user->roles = $request['roles'];
            // $user['created_by'] = Auth::user()->id;
            $user->save();
            return redirect()->route('user/list')->with('success','user created successfully.');
    }

    public function show(){
        $users = User::all();
        $users = User::latest()->paginate(3);
        return view('user.listuser',compact('users'));
    }

    public function edituser($id){
        $users = User::find($id);
        return view('user.edituser',compact('users'));
    }

    public function updateuser($id,Request $request){
        $users = User::find($id);
        $request->validate(
            [
            'firstname' => 'required|min:3|max:20',
            'lastname' => 'required|min:3|max:20',
            'email' => 'required|unique:users,email,'.$users->id,
            'contact' => 'required|numeric|digits:10',
            'address' => 'required',
            'dob' => 'required|after:1990|before:today',
            'gender' => 'required',
            'active' => 'required',
            'roles' => 'required',
            'terms&condition' => 'required',
            ],
            [
                'firstname.required' => 'Please enter firstname',
                'lastname.required' => 'Please enter lastname',
                'email.required' => 'Please enter email',
                'contact.required' => 'Please enter contact',
                'contact.digits' => 'contact length must be 10 character',
                'address.required' => 'Please enter address',
                'dob.required' => 'Please select date of birth',
                'gender.required' => 'Please select gender',
                'active.required' => 'Please select Status',
                'roles.required' => 'Please select roles',
                'terms&condition.required' => 'Please accept your terms of service',
            ]);
            $users->firstname = $request['firstname'];
            $users->lastname = $request['lastname'];
            $users->email = $request['email'];
            $users->contact = $request['contact'];
            $users->address = $request['address'];
            $users->dob = $request['dob'];
            $users->gender = $request['gender'];
            $users->active = $request['active'];
            $users->roles = $request['roles'];
            // $users['updated_by'] = Auth::user()->id;
            $users->save();
            return redirect()->route('user/list')->with('success','user update successfully.');
    }

    public function destroy($id){
        $users = User::find($id)->delete();
        return redirect()->back()->with('success', 'user successfully deleted.');
    }

}
