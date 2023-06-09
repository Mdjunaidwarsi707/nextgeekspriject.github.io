<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProjectDetail;
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

date_default_timezone_set('Asia/Kolkata');

class MainController extends Controller
{
    public function index_pages(Request $request)
    {
        $testimonial=DB::table('testimonials')->take(4)->get();
        $our_team=DB::table('our_teams')->take(4)->get();

        return view('home_index.index',compact('testimonial','our_team'));
    }
    public function about_us(Request $request)
    {
        
        return view('home_index.abouts');
    }
    public function Services(Request $request)
    {
        
        return view('home_index.Services');
    }
    public function our_team(Request $request)
    {
        $our_team=DB::table('our_teams')->get();

        return view('home_index.our_team',compact('our_team'));
    }
    public function testimonial(Request $request)
    {
        $testimonial=DB::table('testimonials')->get();

        return view('home_index.testimonial',compact('testimonial'));
    }
    public function contact(Request $request)
    {
        
        return view('home_index.contact');
    }
    public function feedback(Request $request)
    {
        
        return view('home_index.feedback');
    }
    public function career(Request $request)
    {
        $career=DB::table('careers')->get();
        
        return view('home_index.career',compact('career'));
    }
    public function signin(Request $request)
    {
        
        return view('home_index.login');
    }
    
    public function aftab_register(Request $request)
    {
        
        return view('auth.register');
    }
    public function blog(Request $request)
    {
        $blog=DB::table('blogs')->get();

        // $data=DB::table('blogs')->first('created_at');
        // $data1=$data->created_at;
        // $exp=explode(' ',$data1);
        // $today = date("Y-m-d");
        // $old=$exp[0];

        // $diff = abs(strtotime($today) - strtotime($old));

        // $years = floor($diff / (365*60*60*24));
        // $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
        // $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

        // printf("%d months, %d days\n", $months, $days);
        // // die();                                                          
        return view('home_index.blog',compact('blog'));
    }
    public function blog_single_page(Request $request, $slug)
    {
        $id=Blog::where('slug','=',$slug)->pluck('id')->first();
        // $check_slug=Blog::where('slug','=',$slug)->pluck('slug')->first();
        $blog_single=DB::table('blogs')
            ->where('id','=',$id)
            ->get();
        $zero='0';
        $blog_comments=DB::table('blog_comments')
            ->where('cm_blog_id','=',$id)
            // ->where('re_blog_subid','=',$zero)
            ->get();
        $total_comment=DB::table('blog_comments')
            ->where('cm_blog_id','=',$id)
            ->Count();
        $replly_comments=DB::table('blog_comments')
            ->where('cm_blog_id','=',$id)
            ->where('re_blog_subid','=',$id)
            ->get();

        
        return view('home_index.blog-single-page',compact('blog_single','blog_comments','total_comment','replly_comments'));
    }
    public function resume_apply(Request $request, $id)
    {
        $apply=DB::table('careers')
        ->where('id','=',$id)
        ->get();
        
        return view('home_index.apply',compact('apply'));
    }
    public function project(Request $request)
    {
        $project_data=DB::table('project_details')->get();

        return view('home_index.project',compact('project_data'));
    }
    // public function project_data_single_page(Request $request, $slug, $id, $client_id)
    public function project_data_single_page(Request $request, $slug)
    {
        // $id=convert_uudecode(base64_decode($id));
        // $client_id=convert_uudecode(base64_decode($client_id));
        $id = ProjectDetail::where('slug', '=', $slug)->pluck('id')->first();
        $check_slug = ProjectDetail::where('slug', '=', $slug)->pluck('slug')->first();
        $client_id=ProjectDetail::where('slug','=',$slug)->pluck('client_id')->first();

        $blog_single=DB::table('project_details')
            ->where('slug','=',$slug)
            ->where('id','=',$id)
            ->where('client_id','=',$client_id)
            ->get();
        $show_review=DB::table('write_reviews')
            ->where('r_project_id','=',$id)
            ->where('r_client_id','=',$client_id)
            ->get();
        $total_show_review=DB::table('write_reviews')
            ->where('r_project_id','=',$id)
            ->where('r_client_id','=',$client_id)
            ->Count();
 
        return view('home_index.project-single-page',compact('blog_single','show_review','total_show_review'));
    }
}
