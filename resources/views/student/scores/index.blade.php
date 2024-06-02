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

                                        <a href="{{--{{Route('cordinateur_filier.Module.download',['classe'=>Request::get('classe')])}}--}}" class="btn btn-outline-primary me-2"><i
                                                class="fas fa-download"></i> Download</a>

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
                                            <th>Score</th>


                                        </tr>
                                    </thead>
                                    <tbody>




                                        @foreach ($scores as $key => $score)
                                            <tr class=" fw-bolder">

                                                <td>
                                                    <div class="form-check check-tables">
                                                        <input class="form-check-input checkbox_elements" type="checkbox" value="something">
                                                    </div>
                                                </td>

                                                <td class="id">{{ $score->id }}</td>

                                                <td>{{ $score->name }}</td>
                                                <td>
                                                    <input type="number" max = 20 disabled class="text-center"  value="{{$score->score}}">
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
