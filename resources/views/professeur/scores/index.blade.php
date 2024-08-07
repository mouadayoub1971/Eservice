@extends('layouts.app')

@section('title')
    Student Scores
@endsection

@section('content')
    <style>
        .btn{
            background-color:  #3D48AD;
            color: white;
        }
        .btn:hover{
            color: black;
            background-color: #626ed7;
        }

        td, th{
           vertical-align: middle
        }

        .name_img img {

            width: 45px;
            transition: all 0.5s ease;
            cursor: pointer;
        }

        /* Define the style for the enlarged image */
        .name_img img.opened {
            position: absolute;
            width: 300px ;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
        }


    </style>

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

            <form action="">
                <div class="student-group-form p-4">
                    @if(session('error'))
                        <div class="row ">
                            <div class="col-lg-12 col-md-12 alert alert-danger text-center">
                                <p >{{session('error')}}</p>
                            </div>
                        </div>
                    @endif
                    <div class="row">

                        <div class="col-lg-3 col-md-6">

                            <div class="form-group">
                                <select class="form-control" id="exampleFormControlSelect1" name="module"  >
                                    @if (!empty(Request::get('module')))
                                        <option value="">shose module ...</option>
                                        <option selected hidden>{{ Request::get('module') }}</option>
                                    @else
                                        <option selected  value="">shose module ...</option>
                                    @endif
                                    @foreach ($modules as $key => $module)
                                        <option value="{{ $module->id }}">{{ $module->module_name }}</option>

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


                                        <a href="{{--{{Route('cordinateur_filier.Module.download',['classe'=>Request::get('classe')])}}--}}" class="btn btn-outline-primary me-2"><i
                                                class="fas fa-download"></i> Download</a>



                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <form action="{{Route("professeur.scores.save" , ['module_id'=>Request::get('module') ])}}"  method="POST">
                                    @csrf
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
                                            <th>Ds</th>
                                            <th>final</th>

                                        </tr>
                                    </thead>
                                    <tbody>





                                        @foreach ($students as $key => $student)
                                            <tr class="fw-bolder m-auto">

                                                <td>
                                                    <div class="form-check check-tables">
                                                        <input class="form-check-input checkbox_elements" type="checkbox" value="something">
                                                    </div>
                                                </td>

                                                <td class="id">{{ $student->id }}</td>

                                                <td class="name_img"  ><div style="width: 45px ;height: 100% ;display: inline-block ;vertical-align: center" class="mx-2 img avatar-img"><img id= 'closed'src="{{url($student->avatar)}}" class="avatar-img" ></div> <p class="d-inline-block m-0">{{ $student->name }}</p></td>
                                                <td>

                                                    <input type="number" max = 20  {{ $student->status != 0 ? "disabled" : ''}}  name="{{$student->id}}[ds]" value="{{$student->score_ds}}">
                                                </td>
                                                <td>

                                                    <input type="number" max = 20  {{ $student->status != 0 ? "disabled" : ''}}  name="{{$student->id}}[final]" value="{{$student->score_final}}">
                                                </td>

                                            </tr>
                                        @endforeach





                                    </tbody>
                                </table>
                                    @if( !empty($student) && $students[0]->status == 0)

                                        <button type="submit" class="btn  m-4" name="save" value="save" > Save</button>
                                        <button type="submit" class="btn   m-4" name="validate" value="validate" >Validate</button>
                                    @endif


                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>



      let tds =   document.querySelectorAll('.name_img img');

      tds.forEach((elm) => {
          elm.addEventListener('click', (e) => {
              if (e.target.id === "closed") {
                  e.target.classList.add('opened');
                  e.target.id = "opened";
              } else {
                  e.target.classList.remove('opened');
                  e.target.id = "closed";
              }
          });
      });





        let allinput = document.querySelector('.check-input-all');

        let checkbox  =document.querySelectorAll('.checkbox_elements');



        allinput.addEventListener('click',()=>{

            for(var  key in checkbox){
                checkbox[key].checked = allinput.checked;
            }

        })

    </script>
@endsection
