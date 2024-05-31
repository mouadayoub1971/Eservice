@extends('layouts.app')

@section('title')
    Modules
@endsection

@section('content')



    @if(session('error') )
        <div class="alert alert-danger text-center" role="alert">
            {{session('error')}}
        </div>

    @endif

    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-sub-header">
                            <h3 class="page-title">TimeTable</h3>

                            <form  method="GET" action="">
                            <div class="student-group-form p-4">

                                <div class="row">
                                 <div class=" col-lg-3 col-md-6">

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
                                            <option value="{{ $classe->id }}">{{ $classe->name }}</option>
                                        @endforeach
                                    </select>

                                   </div>
                                 </div>
                                <div class=" col-lg-3 col-md-6">

                                  <div class="form-group">
                                    <select class="form-control" id="exampleFormControlSelect1" name="filier"
                                            value="{{ Request::get('filier') }}" >
                                        @if (!empty(Request::get('filier')))
                                            <option value="">Search by filier ...</option>
                                            <option selected hidden>{{ Request::get('filier') }}</option>
                                        @else
                                            <option selected  value="">Search by filier ...</option>
                                        @endif
                                        @foreach ($filiers as $key => $filier)
                                            <option value="{{ $filier->id }}">{{ $filier->name }}</option>
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
