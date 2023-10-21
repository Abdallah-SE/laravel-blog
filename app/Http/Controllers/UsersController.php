<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\Users\UpdateProfileRequest;
use Session;
class UsersController extends Controller
{
    public function index() {
        return view('users.index')->with('users', User::all());
    }
    
    public function makeAdmin(User $user) {
        $user->role = 'admin';
        $user->save();
        Session::flash('success', 'The user become admin.');
        return redirect()->route('users.index');
    }
    
    public function viewProfile() {
        return view('users.view')->with('user', auth()->user());
    }
    
    public function editProfile() {
        return view('users.edit')->with('user', auth()->user());
    }
    
    public function updateProfile(UpdateProfileRequest $request) {
        
        $user = auth()->user();
        
        $user->update([
            $user->name = $request->name,
            $user->about = $request->about
        ]);
        
        Session::flash('success', 'The user updated successfully');
        
        return redirect()->route('users.index');
    }
    
    
    public function adminPanel(){
        $usersCount = count(User::all());
        $postsCount = count(Post::all());
        $categoriesCount = count(Category::all());
        return view('dashboard')->
                with('usersCount', $usersCount)->
                with('postsCount', $postsCount)->
                with('categoriesCount', $categoriesCount);
    }
}
