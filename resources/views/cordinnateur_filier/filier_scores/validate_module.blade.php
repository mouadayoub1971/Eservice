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
                            <h3 class="page-title">Modules status</h3>

                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-table comman-shadow">
                        <div class="card-body">
                            <div class="page-header">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h3 class="page-title">Modules</h3>
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
                                            <th>status</th>

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

                                                     {{ $module_list->prof}}

                                                </td>
                                                <td>{{ $module_list->classe }}</td>
                                                <td>@if($module_list->status)
                                                        <button class='btn bg-success'><a href="{{Route("cordinnateur_filier.scores",['module_id'=>$module_list->id])}}"> show</a> </button>
                                                    @else
                                                        <button class='btn bg-grey' disabled>pending..</button>

                                                @endif
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
