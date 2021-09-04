
<!DOCTYPE html>

<html lang="en">
	<!--begin::Head-->
	<head><base href="../../../">
		<meta charset="utf-8" />
		<title>School System | Login Page </title>
		<meta name="description" content="Login page example" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Page Custom Stylaes(used by this page)-->
		<link href="{{asset('assets/login/pages/login/login-1.css?v=7.0.5')}}" rel="stylesheet" type="text/css" />
		<!--end::Page Custom Styles-->
		<!--begin::Global Theme Styles(used by all pages)-->
		<link href="{{asset('assets/login/plugins/global/plugins.bundle.css?v=7.0.5')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('assets/login/plugins/custom/prismjs/prismjs.bundle.css?v=7.0.5')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('assets/login/css/style.bundle.css?v=7.0.5')}}" rel="stylesheet" type="text/css" />
		<!--end::Global Theme Styles-->
		<!--begin::Layout Themes(used by all pages)-->
		<link href="{{asset('assets/login/css/themes/layout/header/base/light.css?v=7.0.5')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('assets/login/css/themes/layout/header/menu/light.css?v=7.0.5')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('assets/login/css/themes/layout/brand/dark.css?v=7.0.5')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('assets/login/css/themes/layout/aside/dark.css?v=7.0.5')}}" rel="stylesheet" type="text/css" />
		<!--end::Layout Themes-->
		<link rel="shortcut icon" href="assets/media/logos/favicon.ico" />
		
<!-- Favicon -->
<link rel="shortcut icon" href="{{ URL::asset('assets/images/favicon.ico') }}" type="image/x-icon" />

<!-- Font -->
<link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Poppins:200,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900">

<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

<link href="{{ URL::asset('assets/css/wizard.css') }}" rel="stylesheet" id="bootstrap-css">


@yield('css')
<!--- Style css -->
<link href="{{ URL::asset('assets/css/style.css') }}" rel="stylesheet">

<!--- Style css -->
@if (App::getLocale() == 'en')
    <link href="{{ URL::asset('assets/css/ltr.css') }}" rel="stylesheet">
@else
    <link href="{{ URL::asset('assets/css/rtl.css') }}" rel="stylesheet">
@endif


		<style>
          .panel {display: none;}
        </style>
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
		<!--begin::Main-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Login-->
			<div class="login login-1 login-signin-on d-flex flex-column flex-lg-row flex-column-fluid bg-white" id="kt_login">
				<!--begin::Aside-->
				<div class="login-aside d-flex flex-column flex-row-auto" style="background-color: #F2C98A;">
					<!--begin::Aside Top-->
					<div class="d-flex flex-column-auto flex-column pt-lg-40 pt-15">
						<!--begin::Aside header-->
						<a href="#" class="text-center mb-10">
							<img src="assets/login/image/logo-letter-1.png" class="max-h-70px" alt="" />
						</a>
						<!--end::Aside header-->
						<!--begin::Aside title-->
						<h3 class="font-weight-bolder text-center font-size-h4 font-size-h1-lg" style="color: #986923;">Discover Amazing Metronic
						<br />with great build tools</h3>
						<!--end::Aside title-->
					</div>
					<!--end::Aside Top-->
					<!--begin::Aside Bottom-->
					<div class="aside-img d-flex flex-row-fluid bgi-no-repeat bgi-position-y-bottom bgi-position-x-center" style="background-image: url(assets/login/image/login-visual-1.svg)"></div>
					<!--end::Aside Bottom-->
				</div>
				<!--begin::Aside-->
				<!--begin::Content-->
				<div class="login-content flex-row-fluid d-flex flex-column justify-content-center position-relative overflow-hidden p-7 mx-auto">
					<!--begin::Content body-->
					<div class="d-flex flex-column-fluid flex-center">
						<!--begin::Signin-->
						<div class="login-form login-signin">

<!--for check errror-->
@if($errors->any())
<div class="alert alert-custom alert-outline-danger fade show mb-5" role="alert">
    <div class="alert-icon"><i class="flaticon-warning"></i></div>
	<ul>
       @foreach ($errors->all() as $error)
    <div class="alert-text">
	<li>{{$error}}</li>
	</div>
	@endforeach
	</ul>
    <div class="alert-close">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"><i class="ki ki-close"></i></span>
        </button>
    </div>
</div>	
@endif
<!--end check errror-->


<!--for check Save Data-->
@if(Session::has('message'))
 <p class="alert {{ Session::get('alert-class','alert-danger') }}">{{ Session::get('message') }}</p>
@endif
<!--end check Save Data-->
	<!--اختيار الدخول كــ-->
	<div class="form-group">
                            <label for="exampleFormControlSelect1">حدد طريقة الدخول</label>
                          <select class="custom-select my-1 mr-sm-2" id="sectionChooser">
                               <option value="" selected disabled>اختار من القائمة</option>
                              <option value="user">دخول طالب</option>
							  <option value="teacher"> دخول مدرس </option>
                              <option value="admin">الدخول أدمن </option>

                              </select>
  </div>
<div class="panel" id="user">
		<!--begin::Form-->
		<h4>Login as Student</h4>
    <form class="form" action="{{route('login.student')}}" method="post">
              
       @csrf
								<!--begin::Title-->
								<div class="pb-13 pt-lg-0 pt-5">
                  <!--
                  <span class="text-muted font-weight-bold font-size-h4">New Here?
									<a href="javascript:;" id="kt_login_signup" class="text-primary font-weight-bolder">Create an Account</a></span>
                  -->
                </div>
								<!--begin::Title-->
								<!--begin::Form group-->
								<div class="form-group">
									<label class="font-size-h6 font-weight-bolder text-dark">Email</label>
									<input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg" type="text" name="email" autocomplete="off" :value="old('email')" />
								</div>
								<!--end::Form group-->
								<!--begin::Form group-->
								<div class="form-group">
									<div class="d-flex justify-content-between mt-n5">
										<label class="font-size-h6 font-weight-bolder text-dark pt-5">Password</label>
									</div>
									<input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg" type="password" name="password" autocomplete="off" :value="old('password')" />
								</div>
								<!--end::Form group-->
								<!--begin::Action-->
								<div class="pb-lg-0 pb-5">
								<!--	<button type="button" id="kt_login_signin_submit" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">Sign In</button>-->
                  <input class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3" type="submit" value="Sign In" />

								</div>
								<!--end::Action-->
							</form>
							<!--end::Form-->
							</div>
<!-- ####################login Teacher ################################ -->
   
<div class="panel" id="teacher">
		<!--begin::Form-->
		<h4>Login as Teacher</h4>
    <form class="form" action="{{route('login.teacher')}}" method="post">
       @csrf
		 <!--begin::Title-->
				<div class="pb-13 pt-lg-0 pt-5">
                </div>
					 <div class="form-group">
						<label class="font-size-h6 font-weight-bolder text-dark">Email</label>
						<input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg" type="text" name="email" autocomplete="off" :value="old('email')" />
				 </div>
				 <div class="form-group">
					<div class="d-flex justify-content-between mt-n5">
					<label class="font-size-h6 font-weight-bolder text-dark pt-5">Password</label>
				 </div>
				 <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg" type="password" name="password" autocomplete="off" :value="old('password')" />
				 </div>
				 <div class="pb-lg-0 pb-5">
                  <input class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3" type="submit" value="Sign In" />
				 </div>
			</form>
		<!--end::Form-->
		</div>

<!-- ####################login Teacher ################################ --> 

		<div class="panel" id="admin">
		<!--begin::Form-->
		<h4>Login as Admin</h4>
    <form class="form" action="{{route('login.admin')}}" method="post">
              
       @csrf
								<!--begin::Title-->
								<div class="pb-13 pt-lg-0 pt-5">
                  <!--
                  <span class="text-muted font-weight-bold font-size-h4">New Here?
									<a href="javascript:;" id="kt_login_signup" class="text-primary font-weight-bolder">Create an Account</a></span>
                  -->
                </div>
								<!--begin::Title-->
								<!--begin::Form group-->
								<div class="form-group">
									<label class="font-size-h6 font-weight-bolder text-dark">Email</label>
									<input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg" type="text" name="email" autocomplete="off" :value="old('email')"/>
								</div>
								<!--end::Form group-->
								<!--begin::Form group-->
								<div class="form-group">
									<div class="d-flex justify-content-between mt-n5">
										<label class="font-size-h6 font-weight-bolder text-dark pt-5">Password</label>
									</div>
									<input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg" type="password" name="password" autocomplete="off" :value="old('password')"/>
								</div>
								<!--end::Form group-->
								<!--begin::Action-->
								<div class="pb-lg-0 pb-5">
								<!--	<button type="button" id="kt_login_signin_submit" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">Sign In</button>-->
                  <input class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3" type="submit" value="Sign In" />

								</div>
								<!--end::Action-->
							</form>
							<!--end::Form-->
							</div>

						</div>
						<!--end::Signin-->
					
				
					</div>
					<!--end::Content body-->
				</div>
				<!--end::Content-->
			</div>
			<!--end::Login-->
		</div>
		<!--end::Main-->
		<script>var HOST_URL = "https://keenthemes.com/metronic/tools/preview";</script>
		<!--begin::Global Config(global config for global JS scripts)-->
		<script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1400 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#3699FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#E4E6EF", "dark": "#181C32" }, "light": { "white": "#ffffff", "primary": "#E1F0FF", "secondary": "#EBEDF3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#3F4254", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#EBEDF3", "gray-300": "#E4E6EF", "gray-400": "#D1D3E0", "gray-500": "#B5B5C3", "gray-600": "#7E8299", "gray-700": "#5E6278", "gray-800": "#3F4254", "gray-900": "#181C32" } }, "font-family": "Poppins" };</script>
		<!--end::Global Config-->
		<!--begin::Global Theme Bundle(used by all pages)-->
		<script src="{{asset('assets/plugins/global/plugins.bundle.js?v=7.0.5')}}"></script>
		<script src="{{asset('assets/plugins/custom/prismjs/prismjs.bundle.js?v=7.0.5')}}"></script>
		<script src="{{asset('assets/js/scripts.bundle.js?v=7.0.5')}}"></script>
		<!--end::Global Theme Bundle-->
		<!--begin::Page Scripts(used by this page)-->
		<script src="{{asset('assets/js/pages/custom/login/login-general.js?v=7.0.5')}}"></script>
	
	<!-- #### -->
	<!-- jquery -->
<script src="{{ URL::asset('assets/js/jquery-3.3.1.min.js') }}"></script>
<!-- plugins-jquery -->
<script src="{{ URL::asset('assets/js/plugins-jquery.js') }}"></script>
<!-- plugin_path -->
<script type="text/javascript">var plugin_path = '{{ asset('assets/js') }}/';</script>

<!-- chart -->
<script src="{{ URL::asset('assets/js/chart-init.js') }}"></script>
<!-- calendar -->
<script src="{{ URL::asset('assets/js/calendar.init.js') }}"></script>
<!-- charts sparkline -->
<script src="{{ URL::asset('assets/js/sparkline.init.js') }}"></script>
<!-- charts morris -->
<script src="{{ URL::asset('assets/js/morris.init.js') }}"></script>
<!-- datepicker -->
<script src="{{ URL::asset('assets/js/datepicker.js') }}"></script>
<!-- sweetalert2 -->
<script src="{{ URL::asset('assets/js/sweetalert2.js') }}"></script>
<!-- toastr -->
@yield('js')
<script src="{{ URL::asset('assets/js/toastr.js') }}"></script>
<!-- validation -->
<script src="{{ URL::asset('assets/js/validation.js') }}"></script>
<!-- lobilist -->
<script src="{{ URL::asset('assets/js/lobilist.js') }}"></script>
<!-- custom -->
<script src="{{ URL::asset('assets/js/custom.js') }}"></script>


	<!-- ###### -->
		<!--end::Page Scripts-->
		<script>
        $('#sectionChooser').change(function(){
            var myID = $(this).val();
            $(".panel").each(function(){
                myID === $(this).attr('id') ? $(this).show() : $(this).hide();
            });
        });
    </script>
	</body>
	<!--end::Body-->
</html>