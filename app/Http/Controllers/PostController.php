<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Author;
use App\Models\Category;

use Illuminate\Http\Request;

class PostController extends Controller
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

    public function getClickedAuthorPosts(){
        // echo "All post of clicked Author";
        $author_id = $_GET['author_id'];
        $author_name = Author::find($author_id)->fullName;
        // return $author_name;
        $all_posts_of_clicked_author = Post::where("author_id", $author_id)->get();
        // return $all_posts_of_clicked_author;
        return view('viewer.clickedAuthorPosts', compact('all_posts_of_clicked_author', 'author_name'));
    }

    public function showCreatePostView(){
        $all_categories = Category::all();
        return view('author.createPost', compact('all_categories'));
    }

    public function addPostInDB(Request $req){
        // echo "You post has been published";
        $new_post = new Post();
        $new_post->postTitle = $req->title;
        $new_post->description = $req->description;
        $new_post->author_id = session('userid');
        $new_post->category_id = $req->category;
        $new_post->save();
        $req->session()->flash('post_publish_message', 'Your post has been published successfully');
        return redirect()->back();
    }

    public function deletePost(Request $req, Post $post){
        // echo $post;
        $post->delete();
        $req->session()->flash('post_delete_message', 'Your post has been deleted successfully');
        return redirect()->back();
    }

    public function editPost(Post $post){
        // echo "Post Editing";
        // echo $post;
        $all_categories = Category::all();
        return view('author.editPost', compact("post", "all_categories"));
    }

    public function renderIndexPageWithLatestPost(){
        // $all_posts = Post::latest()->get();
        $all_posts = Post::latest()->paginate(5);
        // $all_posts = Post::orderBy('created_at', 'desc')->get();
        return view('viewer.index', compact('all_posts'));
    }

    public function getSearchResults(Request $req){
        $searchQuery = $req->searchQuery;
        $searchResults = Post::where('postTitle','LIKE','%'.$searchQuery.'%')->get();
        // return $searchResult;
        // echo "Search results will go here";
        // return $req->searchQuery;
        return view('viewer.searchResults', compact('searchResults','searchQuery'));
    }

    public function viewPost(){
        $clicked_post = Post::find($_GET['post_id']);
        // return $clicked_post;
        $author = Author::find($clicked_post->author_id);
        $category = Category::find($clicked_post->category_id);
        return view('viewer.post', compact('clicked_post', 'author', 'category'));
    }

    public function updatePost(Request $req, Post $post){
        // echo $post;
        // echo "Updating Post";
        $post->postTitle = $req->title;
        $post->description = $req->description;
        $post->category_id = $req->category;
        $post->save();
        $req->session()->flash('post_updated_message', 'Your post has been Updated successfully');
        return redirect('author');

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
