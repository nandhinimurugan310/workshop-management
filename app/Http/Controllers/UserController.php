<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\User;

use App\Models\Role;

class UserController extends Controller
{
    public function index() {
        return view('user.index');
    }

    public function about() {
        return view('user.about');
    }

    public function gallery() {
        return view('user.gallery');
    }

    public function contact() {
        return view('user.contact');
    }

    public function login() {
        return view('user.login');
    }

    public function user()
    {
        $users = User::with('role')->get();
        $roles = Role::all(); // Fetch all roles from the database

        return view('admin.user.manage-users', ['users' => $users, 'roles' => $roles]); // Pass roles to the view
    }

    public function create()
    {
        $roles = Role::all(); // Fetch all roles from the database
        return view('admin.user.create', ['roles' => $roles]); // Pass roles to the view
    }
    public function store(Request $request)
    {
        // Uncomment this line to dump request data for debugging
        // dd($request->all());
    
        $request->validate([
            'username' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'role' => 'required|exists:roles,id',
            'profile_picture' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $profilePicturePath = null;
    
        if ($request->hasFile('profile_picture')) {
            $profilePicturePath = $request->file('profile_picture')->store('/admin_assets/assets/img/faces/profile', 'public');
        }
    
        $user = new User([
            'name' => $request->username, // Assuming your user model uses 'name' for the username
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'profile_pic' => $profilePicturePath ? $profilePicturePath : '/admin_assets/assets/img/faces/profile/profile-pic.png',
            'role_id' => $request->role,
        ]);
        
     
        
    
        $user->save();
    
        return redirect()->route('users.manage')->with('success', 'User created successfully!');
    }
    

    public function createRole()
    {
        $roles = Role::all();
        return view('user.createrole', ['roles' => $roles]);
    }

    public function storeRole(Request $request)
    {
        $request->validate([
            'role_name' => 'required|string|unique:roles,role',
        ]);

        $role = Role::create([
            'role' => $request->role_name,
        ]);

        return redirect()->back()->with('success', 'Role created successfully!');
    }
}
