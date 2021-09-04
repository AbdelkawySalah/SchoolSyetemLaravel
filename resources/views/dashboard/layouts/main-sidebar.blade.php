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

                    <!-- Grades-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Grades-menu">
                            <div class="pull-left"><i class="fas fa-building"></i><span
                                    class="right-nav-text">{{trans('main_trans.Grades')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Grades-menu" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{route('Grades.index')}}">{{trans('main_trans.Grades_list')}}</a></li>

                        </ul>
                    </li>
                    <!-- classes-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#classes-menu">
                            <div class="pull-left"><i class="fa fa-building"></i><span
                                    class="right-nav-text">{{trans('main_sidebar_trans.ClassesRooms')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="classes-menu" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{route('Classroom.index')}}">{{trans('main_sidebar_trans.ClassesRooms_List')}}</a></li>
                        </ul>
                    </li>


                    <!-- sections-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#sections-menu">
                            <div class="pull-left"><i class="fas fa-building"></i></i><span
                                    class="right-nav-text">{{trans('main_sidebar_trans.Sections')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="sections-menu" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{route('Sections.index')}}">{{trans('main_sidebar_trans.Sections_List')}}</a></li>
                        </ul>
                    </li>

 <!-- Teachers-->
 <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Teachers-menu">
                            <div class="pull-left"><i class="fas fa-building"></i></i><span
                                    class="right-nav-text">{{trans('main_trans.Teachers')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Teachers-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{route('Teacher.index')}}">{{trans('main_trans.List_Teachers')}}</a> </li>
                            <li> <a href="{{route('TeacherSection.index')}}">فصول المدرسين</a> </li>
                        </ul>
                    </li>


                    <!-- Parents-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Parents-menu">
                            <div class="pull-left"><i class="fas fa-user-tie"></i><span
                                    class="right-nav-text">{{trans('main_trans.Parents')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Parents-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{url('add_parent')}}">{{trans('main_trans.List_Parents')}}</a> </li>
                        </ul>
                    </li>

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

                   
                   
                  
              <!-- Subjects-->
                   <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Subject-icon">
                            <div class="pull-left"><i class="fas fa-book-open"></i><span class="right-nav-text">المواد الدراسية</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Subject-icon" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{route('Subject.index')}}">قائمة المواد الدراسية</a> </li>
                           
                        </ul>
                    </li>
                  

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
