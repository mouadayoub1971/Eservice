@extends('layouts.app')

@section('title')
Create Module
@endsection

@section('content')
    <div class="bg-light p-4 rounded">
        <h1>Add Module</h1>
        @if(isset($error))
           <div class=" text-center  bg-danger">{{$error}}</div>
        @endif
        <div class="container mt-4 col-5">
            <form method="POST" action="">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label" name="module_name">Module Name</label>
                    <input
                        type="text"
                        class="form-control"
                        name="module_name"
                        placeholder="Name" required>


                </div>
                <div class="mb-3">
                    <select class="form-select" aria-label="Default select example" name="classe_id">
                        <option selected value="">Open this select menu</option>
                        @foreach($classes as $key => $classe)
                            <option value="{{$classe->id}}">{{$classe->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <select class="form-select" aria-label="Default select example" name="prof_id">
                        <option selected value="">Open this select menu</option>
                        @foreach($profs as $key => $prof)
                            <option value="{{$prof->id}}">{{$prof->name}}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Save</button>
                <a href="#" class="btn btn-default">Back</a>
            </form>
        </div>

    </div>
@endsection
