<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;


class PostController extends Controller // StudlyCase
{
   public function index() { //CamelCase
    //select*from Posts table
    $postsFromDB=Post::all();// collection object
    
      return view('posts.index',['posts'=>$postsFromDB]);
    
  }/* */
  
  public function show($postId){
    /* there are a lot of methods:
     select*from Post where id=$postId equal than :
    1)  $singlePost=Post::find($postId) = if you want one model object with this characters  
    2) $singlePost=Post::where('id','postId')->first() = if you want one model object with this characters 
    3) $singlePost=Post::where('id','postId')->get() = if you want more than one model object with this characters //collection object
*/
    $singlePostFromDB=Post::findOrFail($postId);// the rol of adding OrFail  that if we have not the page with the id that user search we make to him page not found

    /* there are other solution if the page not found
    is to redirect him to the index page :
    if(is_null($singlePostFromDB)){
    return to_route('posts.index')

    }*/
  return view ('posts.show',['post'=> $singlePostFromDB]);

  }

  /*   public function show(Post $post){
    
   with this method we have POst: the model and post is the parameter tha change {post
   }
    
    return view ('posts.show',['post'=> $post]);
  
    }

    this function called type hinting and with her you should not
    write all the code just with that it find the the data from DB and also make
    the not found page.
    */

public function create(){
  return view('posts.create');
}

public function store(){
  $data=request()->all();
  $title=request()->title;
  $description=request()->description;
  $postCreator=request()->post_creator;
  
}

public function edit(){

  
  return view('posts.edit');

}
public function update(){
  $title=request()->title;
  $description=request()->description;
  $postCreator=request()->post_creator;
  return to_route('posts.show',1);


  }

  public function destroy(){
    // delete post from db
    //redirection to index page
    return to_route('posts.index');
  
  
    }
}