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

                        </div>
                    </div>
                </div>
          </div>

      <div class="table-responsive">
          <table class="table border-0 star-student table-hover table-center mb-0 datatable table-striped">
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
                  <th>Action</th>
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

                     <img class="avatar-img rounded-circle" style="width: 3rem" src="{{url($prof->avatar)}}" alt="User Image">


             </h2>
         </td>
              <td>{{$prof->email}}</td>
              <td>{{$prof->gender}}</td>
              <td>{{$prof->anne}}</td>
              <td>
               <button type="button" class="btn btn-danger btn-sm px-3 py-2" data-bs-toggle="modal" data-bs-target="#{{$prof->id}}"> delete </button> <!-- Scrollable modal -->
                <div class="modal fade" id="{{$prof->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Decision définitive</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-center">
                                Vous souhaitez supprimer le professeur {{$prof->name}} de votre département
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                {!! Form::open(['method' => 'DELETE', 'route' => ['chef_departemenet.profs.destroy', ["prof"=>$prof->id]], 'style' => 'display:inline']) !!}
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
 </div>
</div>
@endsection
