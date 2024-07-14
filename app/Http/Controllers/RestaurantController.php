<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RestaurantController extends Controller
{
    public function login(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        try {
            $user = User::where('email', $request->email)->firstOrFail();

            if (Hash::check($request->password, $user->password)) {
                Auth::login($user);
                return redirect('/');
            } else {
                return redirect()->back()->withErrors(['email' => 'Invalid Credentials']);
            }
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return back()->withErrors(['email' => 'Invalid Credentials']);
        }
    }

    public function destroy(Request $request)
    {
        Auth::guard()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    public function signup(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'contact' => 'required|string|min:10|max:10',
            'dob' => 'required|date',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
            'address' => 'required|string|max:255',
           // 'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            DB::beginTransaction();

            $user = new User;

            if ($request->hasFile('profile_image')) {
                $file = $request->file('profile_image');
                $filename = date('Ymd') . '_' . time() . '.' . $file->getClientOriginalExtension();
                $file->storeAs('public/uploads', $filename);
                $user->profile_image = $filename;
            }

            $user->name = $request->name;
            $user->email = $request->email;
            $user->contact = $request->contact;
            $user->dob = $request->dob;
            $user->gender = $request->gender;
            $user->address = $request->address;
            $user->password = Hash::make($request->password);

            $user->save();

            DB::commit();

            Auth::login($user);

            return redirect('/');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => 'Failed to add user']);
        }
    }
    public function adduser(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'contact'=>'required',
            'password'=>'required',
            'role' => 'required',
        ]);
        try{
            DB::beginTransaction();
            $user = new User;
            if($request->hasFile('profile_image'))
            {
                $file = $request->profile_image->getClientOriginalExtension();
                $filename = date('Ymd').time().'.'.$file;

                $request->profile_image->storeAs('public/uploads'.$filename);
                $user->profile_image = $filename;
            }
            $user->name= $request['name'];
            $user->email= $request['email'];
            $user->password= $request['password'];
            $user->contact= $request['contact'];
            $user->role= $request['role'];
            $user->save();

            DB::commit();
        }
        catch(\Exception $e)
        {
            DB::rollback();
            return redirect()->back()->withErrors(['error'=>'Failed to Add Employee']);
        }
        return redirect('/adduser')->with('success', 'Employee Added Successfully');
    }
    public function profile(Request $request)
    {
        $users = User::all();
        return view('profile', compact('users'));
    }
    public function list(Request $request)
    {
        $users = User::orderBy('id', 'asc')->paginate(10);
        return view('list', compact('users'));
    }

    public function delete_user($userid)
    {
        $user = User::find($userid)->delete();
        return redirect()->back();
    }

    public function edit_profile($userid)
    {
        $users = User::find($userid);
        if (!is_null($users)) {
            $user = compact('users', 'userid');
            return view('update_profile')->with($user);
        } else {
            return redirect(route('res.profile'));
        }
    }

    public function update_profile(Request $request, $userid)
    {
        $user = User::find($userid);
        if ($request->hasFile('profile_image')) {
            $filename = $request->profile_image->getClientOriginalName();
            //Save Image to Folder
            $request->profile_image->storeAs('public/uploads', $filename);
            $user->profile  = $filename;
        }
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'contact' => 'required|max:10|min:10',
            'dob' => 'required',
            'address' => 'required',
        ]);
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->contact = $request['contact'];
        $user->dob = $request['dob'];
        $user->gender = $request['gender'];
        $user->address = $request['address'];
        $user->save();

            return redirect('/profile')->with('success', 'Profile Updated Seccessfully');
        
    }
    

}
