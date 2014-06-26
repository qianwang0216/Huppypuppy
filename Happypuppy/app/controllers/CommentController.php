<?php

class CommentController extends BaseController
{

    /* get functions */
    public function listComment()
    {
        $comments = Comment::with('post')->orderBy('idComments', 'desc')->paginate(20);
        //$this->layout->title = 'Comment Listings';
        //$this->layout->main = View::make('dash')->nest('content', 'comments.list', compact('comments'));
        return View::make('dash')->nest('content', 'comments.list', compact('comments'));
    }

    public function newComment(Post $post)
    {
        $comment = [
            'commenter' => Input::get('commenter'),
            'email' => Input::get('email'),
            'comment' => Input::get('comment'),
        ];
        $rules = [
            'commenter' => 'required',
            'email' => 'required | email',
            'comment' => 'required',
        ];
        $valid = Validator::make($comment, $rules);
        if ($valid->passes()) {
            $comment = new Comment($comment);
            //$comment->approved = 'no';
            $post->comments()->save($comment);
            log::info($post);
            $post->increment('comment_count');  
            /* redirect back to the form portion of the page */
            return Redirect::to(URL::previous() . '#reply')
                ->with('success', 'Comment has been submitted !');
        } else {
            return Redirect::to(URL::previous() . '#reply')->withErrors($valid)->withInput();
        }
    }

    public function showComment(Comment $comment)
    {
        /*
        if (Request::ajax()){
            return View::make('comments.show', compact('comment'));
        }
         * */
        //return View::make('comments.show', compact('comment'));
        // handle non-ajax calls here
        //else{}
        return View::make('dash')->nest('content','comments.show', compact('comment'));
    }
    

    public function deleteComment(Comment $comment)
    {
        $post = $comment->post;
        //$status = $comment->approved;
        $comment->delete();
        //($status === 'yes') ? $post->decrement('comment_count') : '';
        log::info($comment);
        log::info($post);
        $post->decrement('comment_count');
        return Redirect::back()->with('success', 'Comment deleted!');
    }

    /* post functions */

    public function updateComment(Comment $comment)
    {
        //$comment->approved = Input::get('status');
        $comment->save();
        //$comment->post->comment_count = Comment::where('idPosts', '=', $comment->post->idComments) ->where('approved', '=', 1)->count();
        log::info($comment);
        $comment->post->comment_count = Comment::where('idPosts', '=', $comment->post->idPosts) ->count();
        $comment->post->save();
        //return Redirect::back()->with('success', 'Comment ' . (($comment->approved === 'yes') ? 'Approved' : 'Disapproved'));
        return Redirect::back()->with('success');
    }

}