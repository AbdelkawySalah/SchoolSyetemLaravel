<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

// use App\Http\Controllers\authController;
// use App\Http\Controllers\adminController;
//  use App\Http\Controllers\adminController;

use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
// use App\Http\Controllers\Classrooms\ClassroomController;
// use App\Http\Controllers\Students\StudentController;
Route::group(
	[
		'prefix' => LaravelLocalization::setLocale(),
		'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath','auth' ]
	], function(){
		 
		Route::get('/dashboard/user', function () {
			return view('dashboard.User.dashboard');
		})->name('dashboard.user');

		Route::get('/dashboard/admin', function () {
			return view('dashboard.Admin.dashboard');
		})->name('dashboard.admin');
	});

	Route::group(
		[
			'prefix' => LaravelLocalization::setLocale(),
			'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath','auth:admin' ]
		], function(){
			 
			Route::get('/dashboard/admin', function () {
				return view('dashboard.Admin.dashboard');
			})->name('dashboard.admin');
		});
###############################Student dshboad#############################
Route::group(
	[
		'prefix' => LaravelLocalization::setLocale(),
		'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath','auth:student']
	], function(){
		 
		Route::get('/dashboard/student', function () {
			return view('dashboard.Student.dashboard');
		})->name('dashboard.student');
	});

################################Teacher Dashbord##########################
Route::group(
	[
		'prefix' => LaravelLocalization::setLocale(),
		'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath','auth:teacher']
	], function(){
		 
		
		Route::get('/dashboard/teacher', function () {
			return view('dashboard.Teacher.dashboard');
		})->name('dashboard.teacher');
	});
	Route::get('/getdata/{id}','TeacherSectionsController@getdata')->name('getdata');

################################Teacher Dashbord##########################


Route::group(
	[
		'prefix' => LaravelLocalization::setLocale(),
		'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath','auth:admin']
	], function(){
		 
		// Route::get('/dashboard', function () {
		// 	return view('dashboard');
		// })->name('dashboard');

		// Route::get('/dashboard/user', function () {
		// 	return view('dashboard.Admin.dashboard');
		// })->name('dashboard.user');


		Route::group(['namespace'=>'Grades'],function(){
			Route::resource('Grades',GradesController::class);
		});

		Route::group(['namespace'=>'Classrooms'],function(){
			 Route::resource('Classroom',ClassroomController::class);
			 Route::post('delete_all', 'ClassroomController@delete_all')->name('delete_all');
			 Route::post('Filter_Classes', 'ClassroomController@Filter_Classes')->name('Filter_Classes');

		});

		Route::group(['namespace'=>'Sections'],function(){
			Route::resource('Sections',SectionsController::class);
			//Route::get('/classes/{id}', [SectionController::class,"getclasses"]);
			Route::get('/classes/{id}', 'SectionsController@getclasses');

	 	});


		 Route::view('add_parent','livewire.show_Form')->name('add_parent');
		 Route::get('test',function(){
             return view('dashboard/test');
	});

     //Teachers Root
	 Route::group(['namespace'=>'Teachers'],function(){
		Route::resource('Teacher',TeacherController::class);
		Route::resource('TeacherSection',TeacherSectionsController::class);
	 });
	 
	//  //Students Root
	 Route::group(['namespace'=>'Students'],function(){
		Route::resource('Student',StudentController::class);
		 Route::get('/Get_classrooms/{id}', 'StudentController@Get_classrooms');
        Route::get('/Get_Sections/{id}', 'StudentController@Get_Sections');
		Route::post('Upload_attachment', 'StudentController@Upload_attachment')->name('Upload_attachment');
		Route::get('Download_attachment/{studentname}/{filename}', 'StudentController@Download_attachment')->name('Download_attachment');
		Route::get('view_attachment/{studentname}/{filename}', 'StudentController@Download_attachment')->name('Download_attachment');
		Route::post('Delete_attachment', 'StudentController@Delete_attachment')->name('Delete_attachment');
	});

	########################Subject###################################################

	Route::group(['namespace'=>'Subject'],function(){
		Route::resource('Subject',SubjectController::class);
	  });
  
  #########################################Quizzz#######################################3
  Route::group(['namespace'=>'Quizz'],function(){
	  Route::resource('Quizz',QuizzController::class);
	  Route::resource('Question',QuestionController::class);
  });


});


// Route::group(
// 	[
// 		'prefix' => LaravelLocalization::setLocale(),
// 		'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath','auth:admin' ]
// 	], function(){
		 
// 		// Route::get('dashboard',[adminController::class,"index"]);

// 		Route::group(['namespace'=>'Grades'],function(){
// 			Route::resource('Grades',GradesController::class);
// 		});

// 		Route::group(['namespace'=>'Classrooms'],function(){
// 			Route::resource('Classroom',ClassroomController::class);
		
// 			 Route::post('delete_all', 'ClassroomController@delete_all')->name('delete_all');
// 			 Route::post('Filter_Classes', 'ClassroomController@Filter_Classes')->name('Filter_Classes');

// 		});

// 		Route::group(['namespace'=>'Sections'],function(){
// 			Route::resource('Sections',SectionsController::class);
// 			//Route::get('/classes/{id}', [SectionController::class,"getclasses"]);
// 			Route::get('/classes/{id}', 'SectionsController@getclasses');

// 	 	});
// 		 Route::group(['namespace'=>'Classrooms'],function(){
// 			Route::resource('Classroom',ClassroomController::class);
// 			//Route::post('delete_all',[ClassroomController::class,'delete_all'])->name('delete_all');
// 			 //Route::post('Filter_Classes',[ClassroomController::class,'Filter_Classes'])->name('Filter_Classes');
		
// 			 Route::post('delete_all', 'ClassroomController@delete_all')->name('delete_all');
// 			 Route::post('Filter_Classes', 'ClassroomController@Filter_Classes')->name('Filter_Classes');
		
// 		});

// 		 Route::view('add_parent','livewire.show_Form')->name('add_parent');
// 		 Route::get('test',function(){
//              return view('dashboard/test');
// 	});

//      //Teachers Root
// 	 Route::group(['namespace'=>'Teachers'],function(){
// 		Route::resource('Teacheers',TeacherController::class);
	

// 	 });
     
// 	//  //Students Root
// 	 Route::group(['namespace'=>'Students'],function(){
// 		Route::resource('Student',StudentController::class);
// 		 Route::get('/Get_classrooms/{id}', 'StudentController@Get_classrooms');
//         Route::get('/Get_Sections/{id}', 'StudentController@Get_Sections');
// 		Route::post('Upload_attachment', 'StudentController@Upload_attachment')->name('Upload_attachment');
// 		Route::get('Download_attachment/{studentname}/{filename}', 'StudentController@Download_attachment')->name('Download_attachment');
// 		Route::get('view_attachment/{studentname}/{filename}', 'StudentController@Download_attachment')->name('Download_attachment');
// 		Route::post('Delete_attachment', 'StudentController@Delete_attachment')->name('Delete_attachment');
// 	});
	

// 	########################Subject###################################################

// 	Route::group(['namespace'=>'Subject'],function(){
//       Route::resource('Subject',SubjectController::class);
// 	});

// #########################################Quizzz#######################################3
// Route::group(['namespace'=>'Quizz'],function(){
//     Route::resource('Quizz',QuizzController::class);
// 	Route::resource('Question',QuestionController::class);
// });

// 	});

######################################3teacher##########################
// Route::group(['namespace'=>'Teachers'],function(){
//     Route::get('/show/{id}','TeacherController@show')->middleware('auth.teacher3')
// 	->name('show');
// 	;
// });

Route::group(
	[
		'prefix' => LaravelLocalization::setLocale(),
		'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath','auth:teacher']
	], function(){
		Route::group(['namespace'=>'Teachers'],function(){
			Route::get('/getdata/{id}','TeacherSectionsController@getdata')->name('getdata');
		 });
		 Route::group(['namespace'=>'Quizz'],function(){
			Route::resource('Quizz',QuizzController::class);
		});
	});