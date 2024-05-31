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

            <?php

            $rand_id = rand(1,2);

            ?>
            <button type="button" aria-hidden="true" style="display: none" class="btn btn-success margin-10px-top me-2  modelButton" data-bs-toggle="modal" data-bs-target="#{{$rand_id}}">
                Edit
            </button>


            <!-- Modal -->
            <div class="modal fade" id="{{$rand_id}}"  data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered " >
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Alert</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>


                        <div class="modal-body text-center">

                            <div class=" text-center">
                                Are You Sure
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-danger deleteconfirm" >delete</button>
                        </div>

                    </div>
                </div>
            </div>

            <a href="{{Route('cordinateur_filier.TimeTable.download',['classe'=>$classe_id])}}" class="btn btn-outline-primary margin-10px-top me-2"><i
                    class="fas fa-download"></i> Download</a>

            <!-- Button trigger modal -->

            <?php

                $rand_id = rand(3,10000);
            ?>

            @if($classe_id != null)
            <button type="button" class="btn btn-success margin-10px-top me-2" data-bs-toggle="modal" data-bs-target="#{{$rand_id}}">
                Edit
            </button>
            @endif

            <!-- Modal -->
            <div class="modal fade" id="{{$rand_id}}"  data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered " style="max-width: 900px">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">module</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form method="post" action="">
                            @csrf
                              <div class="modal-body">


                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Module</label>
                                        <select id="inputState" class="form-control" name="module_id">
                                            <option  value ='' selected>Choose...</option>
                                            @foreach($modules as $module)
                                                <option value="{{$module->id}}">{{$module->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4">Type</label>
                                        <select id="inputState" class="form-control" name="type">
                                            <option value ='' selected>Choose...</option>
                                            <option>Cour</option>
                                            <option>tp/td</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                       <label for="inputAddress">Start at</label>
                                       <select id="inputState1" class="form-control" name="start_at">
                                        <option value ='' selected>Choose...</option>
                                        <option value="08:00:00">08:00</option>
                                        <option value="10:00:00">10:00</option>
                                        <option value="14:00:00">14:00</option>
                                        <option value="16:00:00">16:00</option>
                                       </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                       <label for="inputAddress2">End at</label>
                                       <select id="inputState2" class="form-control" name="end_at">
                                       </select>
                                    </div>
                                </div>


                                  <div class="row">
                                      <div class="form-group col-md-6">
                                          <label for="inputAddress">Day</label>
                                          <select id="inputState1" class="form-control" name="day">
                                              <option value ='' selected>Choose...</option>
                                              <option value="MONDAY">MONDAY</option>
                                              <option value="TUESDAY">TUESDAY</option>
                                              <option value="WEDNESDAY">WEDNESDAY</option>
                                              <option value="THURSDAY">THURSDAY</option>
                                              <option value="FRIDAY">FRIDAY</option>
                                              <option value="SATURDAY">SATURDAY</option>
                                          </select>
                                      </div>

                                  </div>

                               </div>
                            <div class="modal-footer">
                               <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <input type="submit" class="btn btn-success" value="save"/>

                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script>

        document.addEventListener('DOMContentLoaded', (event) => {
            const firstSelect = document.getElementById('inputState1');
            const secondSelect = document.getElementById('inputState2');
            const divs = document.querySelectorAll(".delete_id");
            const modelButton = document.querySelector(".modelButton");
            const deleteconfirm = document.querySelector(".deleteconfirm");

            for(let div in divs ) {
                divs[div].onclick = () => {


                    modelButton.click()
                    deleteconfirm.onclick = ()=>{

                        window.location.pathname= `cordinateur_filier/TimeTable/${divs[div].classList[1]}/delete`;
                    }


                }

            }


            const options = {
                "08:00:00": [
                    { value :"10:00:00", text: '10:00' },
                    { value :"12:00:00", text: '12:00' }
                ],
                "10:00:00": [
                    { value :"12:00:00", text: '12:00' }
                ],
                "14:00:00": [
                    { value :"16:00:00", text: '16:00' },
                    { value :"18:00:00", text: '18:00' },
                ],
                "16:00:00": [
                    { value :"18:00:00", text: '18:00' }
                ],
            };



            firstSelect.addEventListener('change', function () {
                // Clear the second select

                secondSelect.innerHTML = '<option value="">choose</option>';

                // Get the selected value from the first select
                const selectedValue = this.value;
                // Check if the selected value exists in the options object
                if (options[selectedValue]) {
                    // Populate the second select with the corresponding options
                    options[selectedValue].forEach(function(option) {
                        const newOption = document.createElement('option');
                        newOption.value = option.value;
                        newOption.text = option.text;
                        secondSelect.appendChild(newOption);
                    });
                }
            });
        });
    </script>

@endsection
