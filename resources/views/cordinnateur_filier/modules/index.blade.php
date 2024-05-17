@extends('layouts.app')

@section('title')
    Modules
@endsection

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-sub-header">
                            <h3 class="page-title">Modules</h3>

                        </div>
                    </div>
                </div>
            </div>

            <form action="">
                <div class="student-group-form p-4">
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Search by ID ..." name='id'
                                    value="{{ Request::get('id') }}">
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Search by Name ..." name='name'
                                    value="{{ Request::get('name') }}">
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">

                            <div class="form-group">
                                <select class="form-control" id="exampleFormControlSelect1" name="classe"
                                    value="{{ Request::get('classe') }}" >
                                    @if (!empty(Request::get('classe')))
                                        <option value="">Search by classe ...</option>
                                        <option selected hidden>{{ Request::get('classe') }}</option>
                                    @else
                                        <option selected  value="">Search by classe ...</option>
                                    @endif
                                    @foreach ($classes as $key => $classe)
                                        <option value="{{ $classe->name }}">{{ $classe->name }}</option>

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

                                        <a href="#" class="btn btn-outline-primary me-2"><i
                                                class="fas fa-download"></i> Download</a>



                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <form action="{{Route("cordinateur_filier.Module.save")}}"  method="POST">
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
                                            <th>Professeur</th>
                                            <th>classe</th>
                                            <th>Created at</th>

                                        </tr>
                                    </thead>
                                    <tbody>




                                        @foreach ($module_lists as $key => $module_list)
                                            <tr class=" fw-bolder">

                                                <td>
                                                    <div class="form-check check-tables">
                                                        <input class="form-check-input checkbox_elements" type="checkbox" value="something">
                                                    </div>
                                                </td>

                                                <td class="id">{{ $module_list->id }}</td>

                                                <td>{{ $module_list->module }}</td>
                                                <td>
                                                    <select class="form-select" aria-label="Default select example" name="{{$module_list->module_prof_id}}">
                                                        <option value="default" selected >{{ $module_list->prof}}</option>
                                                        @foreach($profs as $key => $prof)
                                                            <option value="{{ $prof->id}}"  >{{ $prof->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td>{{ $module_list->classe }}</td>
                                                <td>{{ $module_list->created_at }}</td>


                                            </tr>
                                        @endforeach





                                    </tbody>
                                </table>

                                            <button type="submit" class="btn btn-outline-success bg-success active m-4"> Save</button>

                                </form>
                                <div class="text-center text-danger font-monospace fw-bold">{{$message}}</div>
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
