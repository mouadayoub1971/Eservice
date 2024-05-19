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
                            <h3 class="page-title">TimeTable</h3>
                            <div class="student-group-form p-4">
                              <div class="col-lg-7 col-md-6">

                                <div class="form-group">

                                        @foreach ($classes as $key => $classe)

                                        <a href="{{Route("cordinateur_filier.TimeTable.index",['classe'=>$classe->id])}}" type="button" class="btn btn-outline-primary me-3 {{ request()->is('cordinateur_filier/TimeTable/'.$classe->id) ? 'active' : '' }}">{{$classe->name}}</a>

                                        @endforeach

                                </div>

                              </div>


                            </div>

                        </div>
                    </div>
                </div>
            </div>


            @include('cordinnateur_filier.TimeTable.TimeTableView')

            <a href="{{Route('cordinateur_filier.TimeTable.download',['classe'=>$classe_id])}}" class="btn btn-outline-primary margin-10px-top me-2"><i
                    class="fas fa-download"></i> Download</a>

        </div>
    </div>

@endsection
