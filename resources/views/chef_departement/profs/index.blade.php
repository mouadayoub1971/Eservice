@extends('layouts.app')

@section('title')
    User Modules
@endsection

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-sub-header">
                            <h3 class="page-title">Departement {{$departementName}} : Teachers</h3>
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
            {{-- @dd($profs); --}}
            {{-- <div class="student-group-form p-4"> --}}
                {{-- <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Search by ID ...">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Search by Name ...">
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="search-student-btn">
                            <button type="btn" class="btn btn-primary">Search</button>
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
                                        <a href="#" class=" btn btn-outline-gray me-2 active">
                                            <svg class="nav-icon">
                                                <use xlink:href="{{ asset('icons/coreui.svg#cil-image-plus') }}"></use>
                                            </svg>
                                        </a>
                                        <a href="#" class="btn btn-outline-gray me-2">
                                            <i class="fa fa-th" aria-hidden="true"></i>
                                        </a>
                                        <a href="#" class="btn btn-outline-primary me-2"><i
                                                class="fas fa-download"></i> Download</a>
                                        <a href="#" class="btn btn-primary"><i class="fas fa-plus"></i></a>
                                    </div>
                                </div>
                            </div> --}}


                                <div class="table-responsive">
                                    <table
                                    class="table border-0 star-student table-hover table-center mb-0 datatable table-striped">
                                    <thead class="student-thread">
                                        <tr>
                                            <th>
                                                <div class="form-check check-tables">
                                                    <input class="form-check-input" type="checkbox" value="something">
                                                </div>
                                            </th>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>image</th>
                                            <th>Email</th>
                                            <th>Gender</th>
                                            <th>Anne de recretement</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($profs as $prof)
                                    <tr>
                                        <td>
                                            <div class="form-check check-tables">
                                                <input class="form-check-input" type="checkbox" value="something">
                                            </div>
                                        </td>
                                        <td>{{$prof->id}}</td>
                                        <td>{{ $prof->name}}</td>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="student-details.html"class="avatar avatar-sm me-2">
                                                    <img class="avatar-img rounded-circle" src="{{$prof->avatar}}" alt="User Image">
                                                </a>
                                                <a href="student-details.html"></a>
                                            </h2>
                                        </td>
                                        <td>{{$prof->email}}</td>
                                        <td>{{$prof->gender}}</td>
                                        <td>{{$prof->anne}}</td>
                                        <td>
                                            <a href="{{ route('chef_departemenet.profs.destroy', ['prof' => $prof->id]) }}" onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this item?')) { document.getElementById('delete-form-{{$prof->id}}').submit(); }">
                                            <button type="button" class="btn btn-danger">Danger</button>
                                        </a>
                                        <form id="delete-form-{{$prof->id}}" action="{{ route('chef_departemenet.profs.destroy', ['prof' => $prof->id]) }}" method="POST" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form></td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <form action="{{route('chef_departemenet.profs.store')}}" method="POST" id="addProfForm">
    @csrf
    @method('POST')

    <button style="position: absolute; right:4%" type="button" class="btn btn-success mt-2 px-5" id="addProfButton">Add prof</button>
    <div class="mt-2" id="selectProfContainer" style="display: none;">
        <select class="form-select" aria-label="Default select example" name="chosenId" id="selectProf">
            @foreach ($otherProfs as $otherProf)
                <option value="{{$otherProf->id}}">{{$otherProf->name}}</option>
            @endforeach
        </select>
        <button style="position: absolute; right:4%" type="submit" class="btn btn-success mt-2 px-5" id="selectProfButton">Select prof</button>
    </div>
</form>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var addProfButton = document.getElementById('addProfButton');
        var selectProfContainer = document.getElementById('selectProfContainer');
        var selectProfButton = document.getElementById('selectProfButton');

        addProfButton.addEventListener('click', function() {
            addProfButton.style.display = 'none';
            selectProfContainer.style.display = 'block';
        });

        selectProfButton.addEventListener('click', function() {
            // Show the "Add prof" button again after form submission
            addProfButton.style.display = 'block';
            selectProfContainer.style.display = 'none';
        });
    });
</script>

                            </div>


                                                        {{-- </div> --}}
                                            {{-- </div> --}}
                                        {{-- </div> --}}
                                    {{-- </div> --}}
    </div>
</div>
@endsection
