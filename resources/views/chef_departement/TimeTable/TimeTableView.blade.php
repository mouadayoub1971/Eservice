
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

<div class="container">



    <div class="table-responsive">
        <table class="table table-bordered text-center">
            <thead>
            <tr class="bg-light-gray">
                <th class="text-uppercase">Time
                </th>
                <th class="text-uppercase">Monday</th>
                <th class="text-uppercase">Tuesday</th>
                <th class="text-uppercase">Wednesday</th>
                <th class="text-uppercase">Thursday</th>
                <th class="text-uppercase">Friday</th>
                <th class="text-uppercase">Saturday</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td class="align-middle">08:00 - 10:00</td>
                <td>
                    @foreach($timeTable as $time)
                        @if( $time->day=='MONDAY' && $isTimeInInterval->isTimeInInterval($time->start_time,$time->end_time , '08:01:00'))

                            <div class="delete_id {{$time->id}}">
                            <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">{{$time->name}}</span>
                            <div class="margin-10px-top font-size14 fw-bold">{{$time->title}}</div>
                            <div class="font-size13 text-dark-gray">{{$time->prof}}</div>
                            </div>

                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach($timeTable as $time)

                        @if( $time->day=='TUESDAY' && $isTimeInInterval->isTimeInInterval($time->start_time,$time->end_time , '08:01:00'))
                            <div class="delete_id {{$time->id}}">
                            <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">{{$time->name}}</span>
                            <div class="margin-10px-top font-size14 fw-bold">{{$time->title}}</div>
                            <div class="font-size13 text-dark-gray">{{$time->prof}}</div>
                            </div>
                        @endif
                    @endforeach
                </td>

                <td>
                    @foreach($timeTable as $time)
                        @if( $time->day=='WEDNESDAY' && $isTimeInInterval->isTimeInInterval($time->start_time,$time->end_time , '08:01:00'))
                            <div class="delete_id {{$time->id}}">
                            <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">{{$time->name}}</span>
                            <div class="margin-10px-top font-size14 fw-bold">{{$time->title}}</div>
                            <div class="font-size13 text-dark-gray">{{$time->prof}}</div>
                            </div>
                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach($timeTable as $time)
                        @if( $time->day=='THURSDAY' && $isTimeInInterval->isTimeInInterval($time->start_time,$time->end_time , '08:01:00'))
                            <div class="delete_id {{$time->id}}">
                            <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">{{$time->name}}</span>
                            <div class="margin-10px-top font-size14 fw-bold">{{$time->title}}</div>
                            <div class="font-size13 text-dark-gray">{{$time->prof}}</div>
                            </div>
                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach($timeTable as $time)
                        @if( $time->day=='FRIDAY' && $isTimeInInterval->isTimeInInterval($time->start_time,$time->end_time , '08:01:00'))
                            <div class="delete_id {{$time->id}}">
                            <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">{{$time->name}}</span>
                            <div class="margin-10px-top font-size14 fw-bold">{{$time->title}}</div>
                            <div class="font-size13 text-dark-gray">{{$time->prof}}</div>
                            </div>
                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach($timeTable as $time)
                        @if( $time->day=='SATURDAY' && $isTimeInInterval->isTimeInInterval($time->start_time,$time->end_time , '08:01:00'))
                            <div class="delete_id {{$time->id}}">
                            <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">{{$time->name}}</span>
                            <div class="margin-10px-top font-size14 fw-bold">{{$time->title}}</div>
                            <div class="font-size13 text-dark-gray">{{$time->prof}}</div>
                            </div>
                        @endif
                    @endforeach
                </td>

            </tr>


            <tr>
                <td class="align-middle">10:00 - 12:00</td>
                <td>

                    @foreach($timeTable as $time)
                        @if( $time->day=='MONDAY' && $isTimeInInterval->isTimeInInterval($time->start_time,$time->end_time , '10:01:00'))
                            <div class="delete_id {{$time->id}}">
                            <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">{{$time->name}}</span>
                            <div class="margin-10px-top font-size14 fw-bold">{{$time->title}}</div>
                            <div class="font-size13 text-dark-gray">{{$time->prof}}</div>
                            </div>
                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach($timeTable as $time)

                        @if( $time->day=='TUESDAY' && $isTimeInInterval->isTimeInInterval($time->start_time,$time->end_time , '10:01:00'))
                            <div class="delete_id {{$time->id}}">
                            <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">{{$time->name}}</span>
                            <div class="margin-10px-top font-size14 fw-bold">{{$time->title}}</div>
                            <div class="font-size13 text-dark-gray">{{$time->prof}}</div>
                            </div>
                        @endif
                    @endforeach
                </td>

                <td>
                    @foreach($timeTable as $time)
                        @if( $time->day=='WEDNESDAY' && $isTimeInInterval->isTimeInInterval($time->start_time,$time->end_time , '10:01:00'))
                            <div class="delete_id {{$time->id}}">
                            <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">{{$time->name}}</span>
                            <div class="margin-10px-top font-size14 fw-bold">{{$time->title}}</div>
                            <div class="font-size13 text-dark-gray">{{$time->prof}}</div>
                            </div>
                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach($timeTable as $time)
                        @if( $time->day=='THURSDAY' && $isTimeInInterval->isTimeInInterval($time->start_time,$time->end_time , '10:01:00'))
                            <div class="delete_id {{$time->id}}">
                            <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">{{$time->name}}</span>
                            <div class="margin-10px-top font-size14 fw-bold">{{$time->title}}</div>
                            <div class="font-size13 text-dark-gray">{{$time->prof}}</div>
                            </div>
                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach($timeTable as $time)
                        @if( $time->day=='FRIDAY' && $isTimeInInterval->isTimeInInterval($time->start_time,$time->end_time , '10:01:00'))
                            <div class="delete_id {{$time->id}}">
                            <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">{{$time->name}}</span>
                            <div class="margin-10px-top font-size14 fw-bold">{{$time->title}}</div>
                            <div class="font-size13 text-dark-gray">{{$time->prof}}</div>
                            </div>
                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach($timeTable as $time)
                        @if( $time->day=='SATURDAY' && $isTimeInInterval->isTimeInInterval($time->start_time,$time->end_time , '10:01:00'))
                            <div class="delete_id {{$time->id}}">
                            <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">{{$time->name}}</span>
                            <div class="margin-10px-top font-size14 fw-bold">{{$time->title}}</div>
                            <div class="font-size13 text-dark-gray">{{$time->prof}}</div>
                            </div>
                        @endif
                    @endforeach
                </td>
            </tr>

            <tr>
                <td class="align-middle">14:00 -16:00</td>
                <td>

                    @foreach($timeTable as $time)
                        @if( $time->day=='MONDAY' && $isTimeInInterval->isTimeInInterval($time->start_time,$time->end_time , '14:01:00'))
                            <div class="delete_id {{$time->id}}">
                            <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">{{$time->name}}</span>
                            <div class="margin-10px-top font-size14 fw-bold">{{$time->title}}</div>
                            <div class="font-size13 text-dark-gray">{{$time->prof}}</div>
                            </div>
                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach($timeTable as $time)

                        @if( $time->day=='TUESDAY' && $isTimeInInterval->isTimeInInterval($time->start_time,$time->end_time , '14:01:00'))
                            <div class="delete_id {{$time->id}}">
                            <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">{{$time->name}}</span>
                            <div class="margin-10px-top font-size14 fw-bold">{{$time->title}}</div>
                            <div class="font-size13 text-dark-gray">{{$time->prof}}</div>
                            </div>
                        @endif
                    @endforeach
                </td>

                <td>
                    @foreach($timeTable as $time)
                        @if( $time->day=='WEDNESDAY' && $isTimeInInterval->isTimeInInterval($time->start_time,$time->end_time , '14:01:00'))
                            <div class="delete_id {{$time->id}}">
                            <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">{{$time->name}}</span>
                            <div class="margin-10px-top font-size14 fw-bold">{{$time->title}}</div>
                            <div class="font-size13 text-dark-gray">{{$time->prof}}</div>
                            </div>
                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach($timeTable as $time)
                        @if( $time->day=='THURSDAY' && $isTimeInInterval->isTimeInInterval($time->start_time,$time->end_time , '14:01:00'))
                            <div class="delete_id {{$time->id}}">
                            <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">{{$time->name}}</span>
                            <div class="margin-10px-top font-size14 fw-bold">{{$time->title}}</div>
                            <div class="font-size13 text-dark-gray">{{$time->prof}}</div>
                            </div>
                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach($timeTable as $time)
                        @if( $time->day=='FRIDAY' && $isTimeInInterval->isTimeInInterval($time->start_time,$time->end_time , '14:01:00'))
                            <div class="delete_id {{$time->id}}">
                            <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">{{$time->name}}</span>
                            <div class="margin-10px-top font-size14 fw-bold">{{$time->title}}</div>
                            <div class="font-size13 text-dark-gray">{{$time->prof}}</div>
                            </div>
                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach($timeTable as $time)
                        @if( $time->day=='SATURDAY' && $isTimeInInterval->isTimeInInterval($time->start_time,$time->end_time , '14:01:00'))
                            <div class="delete_id {{$time->id}}">
                            <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">{{$time->name}}</span>
                            <div class="margin-10px-top font-size14 fw-bold">{{$time->title}}</div>
                            <div class="font-size13 text-dark-gray">{{$time->prof}}</div>
                            </div>
                        @endif
                    @endforeach
                </td>
            </tr>

            <tr>
                <td class="align-middle">16:00 - 18:00 </td>

                <td>

                    @foreach($timeTable as $time)
                        @if( $time->day=='MONDAY' && $isTimeInInterval->isTimeInInterval($time->start_time,$time->end_time , '16:01:00'))

                            <div class="delete_id {{$time->id}}">
                            <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">{{$time->name}}</span>
                            <div class="margin-10px-top font-size14 fw-bold">{{$time->title}}</div>
                            <div class="font-size13 text-dark-gray">{{$time->prof}}</div>
                            </div>
                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach($timeTable as $time)

                        @if( $time->day=='TUESDAY' && $isTimeInInterval->isTimeInInterval($time->start_time,$time->end_time , '16:01:00'))
                            <div class="delete_id {{$time->id}}">
                            <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">{{$time->name}}</span>
                            <div class="margin-10px-top font-size14 fw-bold">{{$time->title}}</div>
                            <div class="font-size13 text-dark-gray">{{$time->prof}}</div>
                            </div>
                        @endif
                    @endforeach
                </td>

                <td>
                    @foreach($timeTable as $time)
                        @if( $time->day=='WEDNESDAY' && $isTimeInInterval->isTimeInInterval($time->start_time,$time->end_time , '16:01:00'))
                            <div class="delete_id {{$time->id}}">
                            <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">{{$time->name}}</span>
                            <div class="margin-10px-top font-size14 fw-bold">{{$time->title}}</div>
                            <div class="font-size13 text-dark-gray">{{$time->prof}}</div>
                            </div>
                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach($timeTable as $time)
                        @if( $time->day=='THURSDAY' && $isTimeInInterval->isTimeInInterval($time->start_time,$time->end_time , '16:01:00'))
                            <div class="delete_id {{$time->id}}">
                            <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">{{$time->name}}</span>
                            <div class="margin-10px-top font-size14 fw-bold">{{$time->title}}</div>
                            <div class="font-size13 text-dark-gray">{{$time->prof}}</div>
                            </div>
                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach($timeTable as $time)
                        @if( $time->day=='FRIDAY' && $isTimeInInterval->isTimeInInterval($time->start_time,$time->end_time , '16:01:00'))
                            <div class="delete_id {{$time->id}}">
                            <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">{{$time->name}}</span>
                            <div class="margin-10px-top font-size14 fw-bold">{{$time->title}}</div>
                            <div class="font-size13 text-dark-gray">{{$time->prof}}</div>
                            </div>
                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach($timeTable as $time)
                        @if( $time->day=='SATURDAY' && $isTimeInInterval->isTimeInInterval($time->start_time,$time->end_time , '16:01:00'))
                            <div class="delete_id {{$time->id}}">
                            <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">{{$time->name}}</span>
                            <div class="margin-10px-top font-size14 fw-bold">{{$time->title}}</div>
                            <div class="font-size13 text-dark-gray">{{$time->prof}}</div>
                            </div>
                        @endif
                    @endforeach
                </td>
            </tr>


            </tbody>
        </table>
    </div>
</div>



