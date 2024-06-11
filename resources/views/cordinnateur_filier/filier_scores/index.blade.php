@extends('layouts.app')

@section('title')
    Modules
@endsection

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">

            <section id="team" class="pb-5">
                <div class="container">
                    <h5 class="section-title h1">Classes</h5>
                    <div class="row">
                        <!-- Team member -->

                        @foreach($classes as $classe)
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <div class="image-flip" >
                                <div class="mainflip flip-0">
                                    <div class="frontside">
                                        <div class="card">
                                            <div class="card-body text-center">
                                                <h1 class="card-title"> {{$classe->name}}</h1>
                                                <p class="card-text">This is basic card with image on top, title, description and button.</p>
                                                <a href="{{Route('cordinnateur_filier.scores.validate_module',['classe_id'=>$classe->id])}}" class="btn  ">show</a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        @endforeach
                        <!-- ./Team member -->


                    </div>
                </div>
            </section>

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
