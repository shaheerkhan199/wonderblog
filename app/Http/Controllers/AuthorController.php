<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function showAuthorProfile(){
        $author_data = Author::where('authorID',session('userid'))->first();
        return view('author.profile', compact('author_data'));
    }

    public function updateAuthorProfile(Request $req){
        $user = Author::find(session('userid'));
        $old_password = $user->password;
        if($req->password == $old_password){
            $user->fullName = $req->fullname;
            $user->email = $req->email;
            $user->password = $req->newpassword;
            $user->save();
            $req->session()->flash('profile_updated_success', 'Your profile is updated successfully');
        }else{
            $req->session()->flash('profile_updated_failed', 'You entered Wrong old password');
        }
        return redirect()->back();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $req)
    {
        // echo "Registering user as an author";
        $new_author = new Author();
        $new_author->fullName = $req->fullname;
        $new_author->email = $req->email;
        $new_author->password = $req->password;
        $new_author->gender = $req->gender;
        $new_author->save();
        // Adding some alert message to flash session
        $req->session()->flash('signup_successs_message', 'You have been registered successfully');
        return redirect()->back();
    }

    public function showLoginView(){
        if(session()->has('username')){
            return redirect('createPost');
        }else{
            return view('viewer.loginAndSignup');
        }
    }

    public function authenticate(Request $req){
        $email = $req->username;
        $pass = $req->password;
        // $matchThese = ['email' => $email, 'password' => $pass];
        $record = Author::where('email',$email)->where('password',$pass)->first();
        if($record){
            $req->session()->put('username', $record->fullName);
            $req->session()->put('userid', $record->authorID);
            return redirect('createPost');
        }
    	else{
            $req->session()->flash('invalid_login_message', 'Invalid Login might be username or password incorrect');
            return redirect('login');
    	}
    }

    public function logout(){
        if(session()->has('username')){
            session()->pull('username');
            session()->pull('userid');
        }
        return redirect('login');
    }

    public function authorAllPosts(){
        // $current_user_all_posts = Post::where('author_id',1)->first();
        $current_user_all_posts = Post::all()->where('author_id',session('userid'));
        // return $test;
        // var_dump($current_user_all_posts);
        return view('author.authorposts', compact('current_user_all_posts'));
    }

    public function allAuthors(){
        $all_authors = Author::all();
        
        return view('viewer.authors', compact('all_authors'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $author)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Author $author)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author)
    {
        //
    }
}
