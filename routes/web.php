<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\OurTeamController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\EmailSubscribeController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ApplyFormController;
use App\Http\Controllers\BlogCommentController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProjectDetailController;
use App\Http\Controllers\WriteReviewController;

use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [MainController::class, 'index_pages']);
Route::get('about-us', [MainController::class, 'about_us'])->name('about.us');
Route::get('services', [MainController::class, 'Services'])->name('Services');
Route::get('our-teams', [MainController::class, 'our_team'])->name('our.team');
Route::get('testimonial', [MainController::class, 'testimonial'])->name('testimonial');
Route::get('contact-us', [MainController::class, 'contact'])->name('contact');
Route::get('feedback', [MainController::class, 'feedback'])->name('feedback');
Route::post('contact-create', [ContactUsController::class, 'contact_create'])->name('contact.create');
Route::get('careers', [MainController::class, 'career'])->name('career');
Route::get('blogs', [MainController::class, 'blog'])->name('blog');
Route::get('aftab-login', [MainController::class, 'signin']);
Route::get('aftab-register', [MainController::class, 'aftab_register']);
Route::get('blog-single-page/{slug}', [MainController::class, 'blog_single_page']);
Route::get('resume-apply/{id}', [MainController::class, 'resume_apply']);
Route::post('resume-form', [ApplyFormController::class, 'resume_form'])->name('resume.form');
Route::post('email-subscribe-create', [EmailSubscribeController::class, 'email_subscribe'])->name('email.subscribe');
Route::get('project', [MainController::class, 'project'])->name('project');
Route::get('project-data-single-page/{slug}', [MainController::class, 'project_data_single_page']);
Route::post('review-create', [WriteReviewController::class, 'review_create'])->name('review.create');



// ADMIN AND CPANEL LOGIN ADMIN FUNCTION AND LOGOUT PART HERE 
Route::group(['middleware' => 'prevent-back-history'],function(){
	Auth::routes();
	Route::group(['middleware' => 'auth'], function(){
    
		Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

		// Our Team
		Route::get('ourteam-form', [OurTeamController::class, 'ourteam_form'])->name('ourteam.form');
		Route::post('ourteam-create', [OurTeamController::class, 'ourteam_create'])->name('ourteam.create');
		Route::get('ourteam-view', [OurTeamController::class, 'ourteam_view'])->name('ourteam.view');
		Route::get('ourteam-edit/{id}', [OurTeamController::class, 'ourteam_edit'])->name('ourteam.edit');
		Route::post('ourteam-update', [OurTeamController::class, 'ourteam_update'])->name('ourteam.update');
		Route::get('ourteam-delete/{id}', [OurTeamController::class, 'ourteam_delete'])->name('ourteam.delete');

		// Testimonials
		Route::get('testimonial-form', [TestimonialController::class, 'testimonial_form'])->name('testimonial.form');
		Route::post('testimonial-create', [TestimonialController::class, 'testimonial_create'])->name('testimonial.create');
		Route::get('testimonial-view', [TestimonialController::class, 'testimonial_view'])->name('testimonial.view');
		Route::get('testimonial-edit/{id}', [TestimonialController::class, 'testimonial_edit'])->name('testimonial.edit');
		Route::post('testimonial-update', [TestimonialController::class, 'testimonial_update'])->name('testimonial.update');
		Route::get('testimonial-delete/{id}', [TestimonialController::class, 'testimonial_delete'])->name('testimonial.delete');

		// Career Opportunity
		Route::get('career-form', [CareerController::class, 'career_form'])->name('career.form');
		Route::post('career-create', [CareerController::class, 'career_create'])->name('career.create');
		Route::get('career-view', [CareerController::class, 'career_view'])->name('career.view');
		Route::get('career-edit/{id}', [CareerController::class, 'career_edit'])->name('career.edit');
		Route::post('career-update', [CareerController::class, 'career_update'])->name('career.update');
		Route::get('career-delete/{id}', [CareerController::class, 'career_delete'])->name('career.delete');

		// Contact Us
		// Route::get('contact/form', [ContactUsController::class, 'contact_form'])->name('contact.form');
		
		Route::get('contact-view', [ContactUsController::class, 'contact_view'])->name('contact.view');
		Route::get('contact-edit/{id}', [ContactUsController::class, 'contact_edit'])->name('contact.edit');
		Route::post('contact-update', [ContactUsController::class, 'contact_update'])->name('contact.update');
		Route::get('contact-delete/{id}', [ContactUsController::class, 'contact_delete'])->name('contact.delete');

		// Email Subscriber NewsLetter
		Route::get('email-subscribe-view', [EmailSubscribeController::class, 'emailsubscribe_view'])->name('emailsubscribe.view');
		


		// Blogs
		Route::get('blogs-form', [BlogController::class, 'blogs_form'])->name('blogs.form');
		Route::post('blogs-create', [BlogController::class, 'blogs_create'])->name('blogs.create');
		Route::get('blogs-view', [BlogController::class, 'blogs_view'])->name('blogs.view');
		Route::get('blogs-edit/{id}', [BlogController::class, 'blogs_edit'])->name('blogs.edit');
		Route::post('blogs-update', [BlogController::class, 'blogs_update'])->name('blogs.update');
		Route::get('blogs-delete/{id}', [BlogController::class, 'blogs_delete'])->name('blogs.delete');

		// Aply form
		
		Route::get('resume-view', [ApplyFormController::class, 'resume_view'])->name('resume.view');
		Route::get('resume-select/{id}', [ApplyFormController::class, 'resume_select'])->name('resume.select');
		Route::get('resume-reject/{id}', [ApplyFormController::class, 'resume_reject'])->name('resume.reject');
		Route::get('resume-delete/{id}', [ApplyFormController::class, 'resume_delete'])->name('resume.delete');
		Route::get('downloadresume/{resume}', [ApplyFormController::class, 'downloadresume']);
		Route::get('viewresume/{id}', [ApplyFormController::class, 'viewresume']);



		// Blog Comments
		Route::post('blogcomments-create', [BlogCommentController::class, 'blog_comments_creates'])->name('blogcomments.creates');
		Route::get('blogscomment-view', [BlogCommentController::class, 'blogscomment_view'])->name('blogscomment.view');
		Route::get('maincomment-edit/{id}', [BlogCommentController::class, 'maincomment_edit'])->name('maincomment.edit');
		Route::post('blogcomments-update', [BlogCommentController::class, 'blogcomments_update'])->name('blogcomments.update');
		Route::get('maincomment-delete/{id}', [BlogCommentController::class, 'maincomment_delete'])->name('maincomment.delete');

		// Blog Comment Reply create
		Route::post('blogcommentreply-create', [BlogCommentController::class, 'blogcommentreply_create'])->name('blogcommentreply.create');

		// Clients
		Route::get('clients-form', [ClientController::class, 'clients_form'])->name('clients.form');
		Route::post('clients-create', [ClientController::class, 'clients_create'])->name('clients.create');
		Route::get('clients-view', [ClientController::class, 'clients_view'])->name('clients.view');
		Route::get('clients-edit/{id}', [ClientController::class, 'clients_edit'])->name('clients.edit');
		Route::post('clients-update', [ClientController::class, 'clients_update'])->name('clients.update');
		Route::get('clients-delete/{id}', [ClientController::class,'clients_delete'])->name('clients.delete');

		// Project Details
		Route::get('project-form', [ProjectDetailController::class, 'project_form'])->name('project.form');
		Route::post('project-create', [ProjectDetailController::class, 'project_create'])->name('project.create');
		Route::get('project-view', [ProjectDetailController::class, 'project_view'])->name('project.view');
		Route::get('project-edit/{id}', [ProjectDetailController::class, 'project_edit'])->name('project.edit');
		Route::post('project-update', [ProjectDetailController::class, 'project_update'])->name('project.update');
		Route::get('project-delete/{id}', [ProjectDetailController::class,'project_delete'])->name('project.delete');

	});
});
