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
                            {{-- <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Modules</a></li>
                                <li class="breadcrumb-item active">All Students</li>
                            </ul> --}}
                        </div>
                    </div>
                </div>
            </div>
            {{-- message --}}
            {{-- {!! Toastr::message() !!} --}}
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
                                        <a href="#" class="btn btn-outline-gray me-2">
                                            <i class="fa fa-th" aria-hidden="true"></i>
                                        </a>
                                        <a href="#" class="btn btn-outline-primary me-2"><i
                                                class="fas fa-download"></i> Download</a>



                                        <a href="{{ Route('chef_departement.module.create',['filier_id'=>$filier_id])}}"
                                            class="btn btn-primary">+add</a>


                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive">
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
                                            <th>Action</th>
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
                                                <td>{{ $module_list->prof }}</td>
                                                <td>{{ $module_list->classe }}</td>
                                                <td>{{ $module_list->created_at }}</td>

                                                <td class="text-end">



                                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#{{$module_list->id}}">
                                                        delete
                                                    </button>

                                                    <!-- Scrollable modal -->
                                                    <div class="modal fade" id="{{$module_list->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">!</h1>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body text-center">
                                                                    Are you sur ??
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                                                    {!! Form::open(['method' => 'DELETE', 'route' => ['chef_departement.filiers.module.delete', ["filier_id"=>$filier_id,"module_id"=>$module_list->id,'prof_id'=>$module_list->prof_id]], 'style' => 'display:inline']) !!}
                                                                    {!! Form::submit('Yes', ['class' => 'btn btn-danger ']) !!}
                                                                    {!! Form::close() !!}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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
