@extends('layouts.app')

@section('title')
    Student Scores
@endsection

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-sub-header">
                            <h3 class="page-title">Student Scores</h3>

                        </div>
                    </div>
                </div>
            </div>

            <form action="">
                <div class="student-group-form p-4">
                    <div class="row">

                        <div class="col-lg-3 col-md-6">

                            <div class="form-group">
                                <select class="form-control" id="exampleFormControlSelect1" name="module"  >
                                    @if (!empty(Request::get('module')))
                                        <option value="">shose module ...</option>
                                        <option selected hidden>{{ Request::get('module') }}</option>
                                    @else
                                        <option selected  value="">shose module ...</option>
                                    @endif
                                    @foreach ($modules as $key => $module)
                                        <option value="{{ $module->id }}">{{ $module->module_name }}</option>

                                    @endforeach
                                </select>
                            </div>


                        </div>
                        <div class="col-lg-2">
                            <div class="search-student-btn">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-table comman-shadow">
                        <div class="card-body">
                            <div class="page-header">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h3 class="page-title">Modules</h3>
                                    </div>
                                    <div class="col-auto text-end float-end ms-auto download-grp">
                                         {{--<a  href="#">
                                            <svg  width="50px" height="50px"">
                                                <use  xlink:href="{{ asset('icons/coreui.svg#cil-user') }}"></use>
                                            </svg>
                                            {{ __('teachers') }}
                                        </a>--}}

                                        <a href="{{--{{Route('cordinateur_filier.Module.download',['classe'=>Request::get('classe')])}}--}}" class="btn btn-outline-primary me-2"><i
                                                class="fas fa-download"></i> Download</a>



                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <form action="{{Route("professeur.scores.save" , ['module_id'=>Request::get('module') ])}}"  method="POST">
                                    @csrf
                                <table
                                    class="table border-0 star-student table-hover table-center mb-0 datatable table-striped">
                                    <thead class="student-thread">
                                        <tr>
                                            <th>
                                                <div class="form-check check-tables">
                                                    <input class="form-check-input check-input-all" type="checkbox" value="something">
                                                </div>
                                            </th>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Score</th>


                                        </tr>
                                    </thead>
                                    <tbody>




                                        @foreach ($students as $key => $student)
                                            <tr class=" fw-bolder">

                                                <td>
                                                    <div class="form-check check-tables">
                                                        <input class="form-check-input checkbox_elements" type="checkbox" value="something">
                                                    </div>
                                                </td>

                                                <td class="id">{{ $student->id }}</td>

                                                <td>{{ $student->name }}</td>
                                                <td>
                                                    <input type="number" max = 20   name="{{$student->id}}" value="{{$student->score}}">
                                                </td>

                                            </tr>
                                        @endforeach





                                    </tbody>
                                </table>

                                            <button type="submit" class="btn btn-outline-success bg-success active m-4"> Save</button>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>

        let allinput = document.querySelector('.check-input-all');

        let checkbox  =document.querySelectorAll('.checkbox_elements');



        allinput.addEventListener('click',()=>{

            for(var  key in checkbox){
                checkbox[key].checked = allinput.checked;
            }

        })

    </script>
@endsection
