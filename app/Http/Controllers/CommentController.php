<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ValiRequest;
use App\Post;
use App\User;
use App\Comment;

class CommentController extends Controller
{
   
   
    public function create(ValiRequest $request, Post $post, User $user){
        
       $comment = new Comment;
       $comment->load('users', 'posts');
       $comment->content = $request->content;
       $comment->post_id = $request->post_id;
       $comment->user_id = $request->user_id;
       $comment->save();
       return redirect("/detail/$post->id");
   }


// commentでは編集・削除できない。
//    public function edit(Post $post, Comment $comment){
//        return view('edit_comment', ['comment' => $comment, 'post'=>$post]);
//    }
//    public function update(Request $request, $id){
    
//         $user = User::first();
        
//         $comment = Comment::findOrFail($id);
//        $comment->content = $request->content;
//     //    $comment->post_id = $post->id;
//        $comment->user_id = $user->id;
//        $comment->save();
//        return redirect("/detail/$comment->post_id");

//    }

//    public function delete(Comment $comment){
//        $comment->delete();
//        return redirect("/detail/$comment->post_id");
//    }
}
