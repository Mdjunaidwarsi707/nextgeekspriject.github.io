<?php

namespace App\Http\Controllers;

use App\Models\BlogComment;
use Illuminate\Http\Request;
use App\Models\Blog;

use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
// use DB;
// use Hash;
use Illuminate\Support\Arr;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Collection;
use Session;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

class BlogCommentController extends Controller
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
     * @param  \App\Models\BlogComment  $blogComment
     * @return \Illuminate\Http\Response
     */
    public function show(BlogComment $blogComment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BlogComment  $blogComment
     * @return \Illuminate\Http\Response
     */
    public function edit(BlogComment $blogComment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BlogComment  $blogComment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BlogComment $blogComment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BlogComment  $blogComment
     * @return \Illuminate\Http\Response
     */
    public function destroy(BlogComment $blogComment)
    {
        //
    }

    public function blog_comments_creates(Request $request)
    {
        $this->validate($request, [
            'cm_name' => 'required',
            'cm_email' => 'required',
            'cm_mobile' => 'required|min:10|max:10',
            'cm_comment' => 'required',
        ]);
   
        $input = $request->all();
        $blog_id=$input['blog_id'];
        $title_name=$input['title_name'];
        $cm_name=$input['cm_name'];
        $cm_email=$input['cm_email'];
        $cm_mobile=$input['cm_mobile'];
        $cm_comment=$input['cm_comment'];
       

        $blog_subid='';
        $re_name='';
        $re_email='';
        $re_mobile='';
        $re_comment='';

        BlogComment::create([
            'cm_blog_id' => $blog_id,
            'cm_blog_name' => $title_name,
            'cm_name' => $cm_name,
            'cm_email' => $cm_email,
            'cm_mobile' => $cm_mobile,
            'cm_comment' => $cm_comment,
            're_blog_subid' => $blog_subid,
            're_name' => $re_name,
            're_email' => $re_email,
            're_mobile' => $re_mobile,
            're_comment' => $re_comment
        ]);

        return redirect()->back()
                        ->with('success','Your Comment is submitted for this blog.');
    }
    public function blogcommentreply_create(Request $request)
    {
        $this->validate($request, [
            // 'email' => 'required|email|unique:users,email',
            // 'mobile_no' => 'required|min:10|max:10|unique:users,mobile_no|',
            're_name' => 'required',
            're_email' => 'required',
            're_mobile' => 'required|min:10|max:10',
            're_comment' => 'required'
        ]);
    die('ok');
        $input = $request->all();
        $blog_subid=$input['blog_subid'];
        $re_name=$input['re_name'];
        $re_email=$input['re_email'];
        $re_mobile=$input['re_mobile'];
        $re_comment=$input['re_comment'];

        $blog_id='';
        $cm_name='';
        $cm_email='';
        $cm_mobile='';
        $cm_comment='';

        BlogComment::create([
            're_blog_subid' => $blog_subid,
            're_name' => $re_name,
            're_email' => $re_email,
            're_mobile' => $re_mobile,
            're_comment' => $re_comment,
            'cm_blog_id' => $blog_id,
            'cm_name' => $cm_name,
            'cm_email' => $cm_email,
            'cm_mobile' => $cm_mobile,
            'cm_comment' => $cm_comment
        ]);

        return redirect()->back()
                        ->with('success','Your Comment replly submitted for this blog.');
    }
    public function blogscomment_view(Request $request)
    {
        $blog_comment = DB::table('blog_comments')->get();
        $total_blog_comment = DB::table('blog_comments')->Count();

        return view('Blogs-Comments.blogcomment-view',compact('blog_comment','total_blog_comment'));
    }
    public function maincomment_edit(Request $request ,$id)
    {
        $id=convert_uudecode(base64_decode($id));
        $blog_edit = DB::table('blog_comments')
            ->where('id','=',$id)
            ->get();
        
        return view('Blogs-Comments.maincomment-edit',compact('blog_edit'));
    }
    public function blogcomments_update(Request $request)
    {
        $this->validate($request, [
            // 'email' => 'required|email|unique:users,email',
            // 'mobile_no' => 'required|min:10|max:10|unique:users,mobile_no|',
            // 're_comment' => 'required',
        ]);
    
        $input = $request->all();
        $comment_id=$input['comment_id'];
        $re_blog_subid=$input['blog_id'];
        $re_name='Admin';
        $re_email='admin@gmail.com';
        $re_mobile='7008956263';
        $re_comment=$input['re_comment'];

        BlogComment::where('id','=',$comment_id)
            ->update([
                're_blog_subid' => $re_blog_subid,
                're_name' => $re_name,
                're_email' => $re_email,
                're_mobile' => $re_mobile,
                're_comment' => $re_comment
                    ]);

        return redirect()->route('blogscomment.view')
                        ->with('success','Your Comment replly submitted for this blog.');
    }
    public function maincomment_delete(Request $request,$id)
    {
        $id=convert_uudecode(base64_decode($id));
    
        BlogComment::where('id','=',$id)
            ->Delete();

        return redirect()->route('blogscomment.view')
                        ->with('success','This Comment is Delete .');
    }
    

}
