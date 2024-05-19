@extends('layouts.app')

@section('title')
    Modules
@endsection

@section('content')
    <style>

        .bg-light-gray {
            background-color: #f7f7f7;
        }
        .table-bordered thead td, .table-bordered thead th {
            border-bottom-width: 2px;
        }
        .table thead th {
            vertical-align: bottom;
            border-bottom: 2px solid #dee2e6;
        }
        .table-bordered td, .table-bordered th {
            border: 1px solid #dee2e6;
        }


        .bg-sky.box-shadow {
            box-shadow: 0px 5px 0px 0px #00a2a7
        }

        .bg-orange.box-shadow {
            box-shadow: 0px 5px 0px 0px #af4305
        }

        .bg-green.box-shadow {
            box-shadow: 0px 5px 0px 0px #4ca520
        }

        .bg-yellow.box-shadow {
            box-shadow: 0px 5px 0px 0px #dcbf02
        }

        .bg-pink.box-shadow {
            box-shadow: 0px 5px 0px 0px #e82d8b
        }

        .bg-purple.box-shadow {
            box-shadow: 0px 5px 0px 0px #8343e8
        }

        .bg-lightred.box-shadow {
            box-shadow: 0px 5px 0px 0px #d84213
        }


        .bg-sky {
            background-color: #02c2c7
        }

        .bg-orange {
            background-color: #e95601
        }

        .bg-green {
            background-color: #5bbd2a
        }

        .bg-yellow {
            background-color: #f0d001
        }

        .bg-pink {
            background-color: #ff48a4
        }

        .bg-purple {
            background-color: #9d60ff
        }

        .bg-lightred {
            background-color: #ff5722
        }

        .padding-15px-lr {
            padding-left: 15px;
            padding-right: 15px;
        }
        .padding-5px-tb {
            padding-top: 5px;
            padding-bottom: 5px;
        }
        .margin-10px-bottom {
            margin-bottom: 10px;
        }
        .border-radius-5 {
            border-radius: 5px;
        }

        .margin-10px-top {
            margin-top: 10px;
        }
        .font-size14 {
            font-size: 14px;
        }

        .text-light-gray {
            color: #d6d5d5;
        }
        .font-size13 {
            font-size: 13px;
        }

        .table-bordered td, .table-bordered th {
            border: 1px solid #dee2e6;
        }
        .table td, .table th {
            padding: .75rem;
            vertical-align: top;
            border-top: 1px solid #dee2e6;
        }
    </style>


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

            <a href="{{Route('cordinateur_filier.Module.download',['classe'=>Request::get('classe')])}}" class="btn btn-outline-primary margin-10px-top me-2"><i
                    class="fas fa-download"></i> Download</a>

        </div>
    </div>

@endsection
