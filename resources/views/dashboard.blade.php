
<style>

    .jcalendar-header{
        color: #0A68FF;
    }
    .jcalendar-selected{
        color: #0A68FF;

    }
</style>

<div class="container-fluid d-flex flex-column " style="height: 100%;">
    <div class="row flex-grow-1 ">
    <div class="col-xl-3 col-md-6 mb-4" style="    padding: 0;
    border-radius: 9PX;
    border-left: .25rem solid #1cc88a ;
    ">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">

                        <div class="h5 mb-0 font-weight-bold text-success "><a class="text-success text-decoration-none"  href="demanderAttForm.php">Demandes</a></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-file-alt fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

    <div class="row flex-grow-1 ">
        <div class="col-lg-8 col-sm-12 mb-3">
            <div class="container">
                <canvas id="myChart" width="1000" height="500"></canvas>
            </div>
        </div>
        <div class="col-lg-3 col-sm-12 mb-3"  >
            <div id="calendar-2" class="fw-bold"></div>
        </div>
    </div>
</div>
    <script>
        jSuites.calendar(document.getElementById('calendar-2'),{
            format: 'DD/MM/YYYY'
        });
    </script>
