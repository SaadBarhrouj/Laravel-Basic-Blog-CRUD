<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;



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
  $allUsersFromDB=USER::all();
  return view('posts.create',['users'=>$allUsersFromDB]);
}

public function store(){

  request()->validate([
    'title'=> ['required', 'min:3'],
    'description'=>['required', 'min:3'],
    'post_creator'=>['required','exists:users,id'], // la Valeur de post_creator doit etre exist dans la table users exactement  dans column "id"
  ]);
  $data=request()->all();
  $title=request()->title;
  $description=request()->description;
  $postCreator=request()->post_creator;
  /*there are two methods to insert the data to the data base 
  the first: 
  $post=new Post;
  $post->title=$title;
  $post->description=$description;
  $post->save() ;
  the second:
   */
  Post::create([
    'title'=>$title,
    'description'=>$description,
    'user_id'=> $postCreator,
  ]);
  return to_route('posts.index');
  
  
}

public function edit(Post $post){

  $allUsersFromDB=USER::all();
  return view('posts.edit',['users'=>$allUsersFromDB,'post'=>$post]);

}
public function update($postId){
 
  $title=request()->title;
  $description=request()->description;
  $postCreator=request()->post_creator;

  $singlePostFromDB=Post::findOrFail($postId);
  $singlePostFromDB->update([
    'title'=> $title,
    'description'=> $description,
    'user_id'=>$postCreator,
    
  ]);
  return to_route('posts.show',$postId);


  }

  public function destroy($postId){
    // delete post from db
    //redirection to index page
    $singlePostFromDB=Post::findOrFail($postId);
    $singlePostFromDB->delete();
    /*
    second method :  Post::where('id','$postId')->delete();  but with this method you don[t get the model events ???*/
    return to_route('posts.index');
  
  
    }
}