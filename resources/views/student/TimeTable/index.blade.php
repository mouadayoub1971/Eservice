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

                        </div>
                    </div>
                </div>
            </div>


            @include('cordinnateur_filier.TimeTable.TimeTableView')

            <a href="{{Route('chef_departement.filiers.timetable.download',["classe_id"=>$classe_id , "filier_id" => $filier_id])}}" class="btn btn-outline-primary margin-10px-top me-2"><i
                    class="fas fa-download"></i> Download</a>



        </div>
    </div>



@endsection
