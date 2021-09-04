    <!-- edit_modal_Grade -->
    <div class="modal fade" id="edit{{ $My_Class->id }}" tabindex="-1" role="dialog"
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
                                            <form action="{{ route('Classroom.update', 'test') }}" method="post">
                                            {{method_field('patch')}}
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col">
                                                            <label for="Name"
                                                                   class="mr-sm-2">{{ trans('My_Classes_trans.Name_class') }}
                                                                :</label>
                                                            <input id="Name" type="text" name="Name"
                                                                   class="form-control"
                                                                   value="{{$My_Class->getTranslation('Name_Class', 'ar')}}"
                                                                   required>
                                                            <input id="id" type="hidden" name="id" class="form-control"
                                                                   value="{{ $My_Class->id }}">
                                                        </div>
                                                        <div class="col">
                                                            <label for="Name_en"
                                                                   class="mr-sm-2">{{ trans('My_Classes_trans.Name_class_en') }}
                                                                :</label>
                                                            <input type="text" class="form-control"
                                                                   value="{{$My_Class->getTranslation('Name_Class', 'en')}}"
                                                                   name="Name_en" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label
                                                            for="exampleFormControlTextarea1">{{ trans('My_Classes_trans.Name_Grade') }}
                                                            :</label>
                                                            <select class="form-control form-control-lg" name="Grade_id">
                                                               <option value="{{ $My_Class->Grades->id }}">
                                                                {{ $My_Class->Grades->Name }}
                                                                 </option>
                                                                @foreach ($Grades as $Grade)
                                                                <option value="{{ $Grade->id }}">{{ $Grade->Name }}</option>
                                                                @endforeach
                                                            </select>
                                                         
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