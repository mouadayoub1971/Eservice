<div class="container-fluid d-flex flex-column " style="height: 100%;">
    <div class="row flex-grow-1 ">
        <div class="col-lg-8 col-sm-12 mb-3">
            <div class="container">
                <canvas id="myChart" width="1000" height="500"></canvas>
            </div>
        </div>
        <div class="col-lg-3 col-sm-12 mb-3"  >
            <div id="calendar-2"></div>
        </div>
    </div>
</div>
    <script>
        jSuites.calendar(document.getElementById('calendar-2'),{
            format: 'DD/MM/YYYY'
        });
    </script>
