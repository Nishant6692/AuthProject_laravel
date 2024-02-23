<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use File;



class AuthController extends Controller
{
    /**
     * signUp
     *
     * @return mixed view of Sign Up page .
     */
    public function signUp()
    {

        return view('signUp');
    }

    /**
     * login
     *
     * @return mixed view of LogIn Page.
     */
    public function login()
    {
        return view('logIn');
    }


    /**
     * Register a new user.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function registerUser(Request $request)
    {
        /**
         * Validate the incoming request data.
         */
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|max:16',
            'phone' => 'required|min:10|max:10',
            'role' => 'required',
            'image' => 'required'
        ]);

        /**
         * Create a new User instance and populate its attributes.
         *
         * @var \App\Models\User $user
         */
        
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->phone = $request->phone;
        $user->role = $request->role;
          $imageName = $request->name.time().".".File::extension($request->image);   //  Storage::put(asset('').)
          
        Storage::disk("public")->put('/'. $imageName, file_get_contents($request->file('image')));
        // Store the image path in the user model
        
        
        $imagePath = "assets/".$imageName;
        $user->user_image = $imagePath;

        /**
         * Save the user instance to the database.
         *
         * @var bool $response
         */
        $response = $user->save();

        /**
         * Check the response and redirect accordingly.
         */
        if ($response) {
            return redirect('login')->with('success', 'You have registered successfully');
        } else {
            return back()->with('fail', 'Something went wrong');
        }
    }
    /**
     * Authenticate a user and redirect based on their role.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function loginUser(Request $request)
    {
        /**
         * Validate the incoming request data.
         */
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8|max:16',
        ]);

        /**
         * Attempt to authenticate the user using provided credentials.
         *
         * @var array $credentials
         */
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            /**
             * Retrieve the authenticated user instance.
             *
             * @var \App\Models\User $user
             */
            $user = User::where('email', '=', $request->email)->first();
            Auth::login($user);

            /**
             * Redirect the user based on their role.
             */
            if (Auth::user()->role == '1') {
                return redirect()->route('admin-dashboard')->with('success', 'Welcome to Admin Dashboard');
            } else {
                return redirect('dashboard')->with('success', 'Welcome to Dashboard');
            }
        } else {
            return back()->with('fail', 'Invalid Email or Password');
        }
    }


    /**
     * dashboard
     *
     * @return mixed return view with data.
     */
    public function dashboard()
    {
        /**
         * @var array Variable store key=> value from  user table;
         */


        $data = array();
        if (Auth::check()) {
            $data = Auth::user();
        }

        return view('dashboard', compact('data'));
    }

    /**
     * logOutUser 
     *
     * @return mixed redirect to login page after destory/flush the session.
     */
    public function logOutUser()
    {
        if (Auth::check()) {

            Auth::logout();
            return redirect('login')->with('success', "user log Out successFully");

        }


    }


}
