<div class="modal fade" id="editteachersection{{ $TeacherSection->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                {{ trans('My_Classes_trans.edit_class') }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- add_form  -->
                                            <form action="{{ route('TeacherSection.update', 'test') }}" method="post">
                                            {{method_field('patch')}}
                                                    @csrf
                                                    <div class="row">
                                                   
                                                    <div class="col">
                                                        <div class="form-group">
                                                        <label
                                                            for="exampleFormControlTextarea1">اسم المعلم
                                                            :</label>
                                                            <select class="form-control form-control-lg" name="Teacher_id" disabled>
                                                            <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>
                                                                @foreach ($teachers as $teachers)
                                                                <option value="{{ $teachers->id }}" {{$teachers->id==$TeacherSection->teacher_id?'selected':''}}>{{ $teachers->Name }}</option>
                                                                @endforeach
                                                            </select>
                                                            <input type="hidden" name="TeacherSectionid" value="{{$TeacherSection->id}}" />
                                                            <input type="hidden" name="Teacherid" value="{{$TeacherSection->teacher_id}}" />
                                                          </div>
                                                        </div>

                                                        <div class="col">
                                                        <div class="form-group">
                                                        <label
                                                            for="exampleFormControlTextarea1">المرحلة الدراسية
                                                            :</label>
                                                            <select class="form-control form-control-lg" name="Grade_id" required>
                                                            <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>
                                                                @foreach ($grades as $grades)
                                                                <option value="{{ $grades->id }}" {{$grades->id==$TeacherSection->Grade_id?'selected':''}}>{{ $grades->Name }}</option>
                                                                @endforeach
                                                            </select>
                                                          </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                    <div class="col">
                                                        <div class="form-group">
                                                        <label
                                                            for="exampleFormControlTextarea1">الصف الدراسي
                                                            :</label>
                                                            <select name="Class_id" class="custom-select" required>
                                                              <option value="{{$TeacherSection->Classroom_id}}">{{$TeacherSection->classroom->Name_Class}}</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group">
                                                        <label
                                                            for="exampleFormControlTextarea1">الفصل 
                                                            :</label>
                                                            <select class="form-control form-control-lg" name="section_id" required>
                                                                <option value="{{ $TeacherSection->section_id }}">{{ $TeacherSection->section->Name_Section }}</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="row">
                                                    <div class="col">
                                                        <div class="form-group">
                                                        <label
                                                            for="exampleFormControlTextarea1">المادة الدراسية
                                                            :</label>
                                                            
                                                            <select name="subject_id" class="custom-select" required>
                                                                @foreach ($subjects as $subjects)
                                                                <option value="{{ $subjects->id }}" {{$subjects->id==$TeacherSection->subject_id?'selected':''}}>{{ $subjects->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <br><br>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">{{ trans('My_Classes_trans.Close') }}</button>
                                                        <button type="submit"
                                                                class="btn btn-success">{{ trans('My_Classes_trans.Edit') }}</button>
                                                    </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                           