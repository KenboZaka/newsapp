<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Comment;

class CommentController extends Controller
{
//    public function show(){
//     return view('post_detail', ['post' => $post]);
//    }
   
   
    public function create(Request $request, Post $post, User $user){

    $user = User::first();

       $comment = new Comment;
       $comment->content = $request->content;
       $comment->post_id = $post->id;
       $comment->user_id = $user->id;
       $comment->save();
       return redirect("/detail/$post->id");
   }

   public function edit(Post $post, Comment $comment){
       return view('edit_comment', ['comment' => $comment, 'post'=>$post]);
   }

   public function update(Request $request, $id){
    
        $user = User::first();
        
        $comment = Comment::findOrFail($id);
       $comment->content = $request->content;
    //    $comment->post_id = $post->id;
       $comment->user_id = $user->id;
       $comment->save();
       return redirect("/detail/$comment->post_id");

   }

   public function delete(Comment $comment){
       $comment->delete();
       return redirect("/detail/$comment->post_id");
   }
}
