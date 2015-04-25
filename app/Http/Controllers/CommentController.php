<?php namespace App\Http\Controllers;

use App\Comments;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class CommentController extends Controller {


    public function store(Request $request)
    {
        $this->validate($request,['name'=>'required|min:5', 'email'=>'required|regex:/^\w+([-+.\']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/',
                                    'comment'=>'required']);
        $comment=Comments::create($request->all());

        flash()->overlay('Comment Submitted',"Once reviewed by the administrator, it will be added on the page.");
        return redirect('articles/'.$comment->article_id);
    }

}
