<?php

namespace App\Http\Controllers;

use Storage;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('posts')->paginate(10); // Eager load posts for efficiency
        return view('users.index', compact('users'));
    }
     // Show posts of a specific user
     public function posts(User $user)
     {
         $posts = $user->posts; // Get all posts for the user
         return view('users.posts', compact('user', 'posts'));
     }

     public function create()
     {
        return view('users.create');
     }
     public function store(Request $request)
    {
      //  dd($request);
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate profile image
        ]);
       

       
        $data = $request->all();
       

        if ($request->hasFile('profile_image')) {
            $data['profile_image'] = $request->file('profile_image')->store('profile_images', 'public'); // Store image in public storage
        }

        $data['password'] = bcrypt($request->password); // Hash the password

        User::create($data);

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }


    public function edit(User $user){

        $user_id = $user->id;
     
        return view('users.edit',compact('user'));

    }
    public function update(Request $request,User $user){
      //  dd($request->file('profile_image'));
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'. $user->id, // Exclude current user from unique check,
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate profile image
        ]);
       // $data = $request->only(['name', 'email']);
        $data = $request->all();
        
        

        if($request->hasFile('profile_image')){
          
            // Delete old image if it exists
            if($user->profile_image){
                Storage::disk('public')->delete($user->profile_image);
            }

            $data['profile_image'] = $request->file('profile_image')->store('profile_images','public'); 
        }
        
       

        $user->update($data);

        return redirect()->route('users.index')->with('success','User Updates successfully!');
    }

    public function destroy(User $user){
        $user->delete();
        return redirect()->route('users.index')->with('success','User deleted successfully.');
    }

}
