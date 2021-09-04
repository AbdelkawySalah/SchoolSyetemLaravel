<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg" style="overflow: scroll">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <!-- menu item Dashboard-->
                    <li>
                        <a href="{{ url('/dashboard') }}">
                            <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">{{trans('main_trans.Dashboard')}}</span>
                            </div>
                            <div class="clearfix"></div>
                        </a>
                    </li>
                    <!-- menu title -->
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">{{trans('main_trans.Programname')}} </li>

                 
                  


   

                   

                    <!-- students-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#students-menu"><i class="fas fa-user-graduate"></i>{{trans('main_trans.students')}}<div class="pull-right"><i class="ti-plus"></i></div><div class="clearfix"></div></a>
                        <ul id="students-menu" class="collapse">
                            <li>
                                   <a href="{{route('Student.index')}}">{{trans('main_trans.list_students')}}</a>

                            </li>
                        </ul>
                    </li>
                    <!-- end students-->

                   <!-- Quizz-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Quizz-icon">
                            <div class="pull-left"><i class="fas fa-book-open"></i><span class="right-nav-text">الأختبارات</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Quizz-icon" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{route('Quizz.index')}}">قائمة الأختبارات</a> </li>
                            <li> <a href="{{route('Question.index')}}"> قائمة الأسئلة </a> </li>

                        </ul>
                    </li>

                </ul>
            </div>
        </div>

        <!-- Left Sidebar End-->

        <!--=================================
