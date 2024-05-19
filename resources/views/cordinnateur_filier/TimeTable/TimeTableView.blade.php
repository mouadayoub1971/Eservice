<div class="container">
    <div class="timetable-img text-center">
        <img src="img/content/timetable.png" alt="">
    </div>
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
                        @if( $time->day=='MONDAY' && $isTimeInInterval($time->start_time,$time->end_time , '08:01:00'))
                            <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">{{$time->name}}</span>
                            <div class="margin-10px-top font-size14 fw-bold">{{$time->title}}</div>
                            <div class="font-size13 text-dark-gray">{{$time->prof}}</div>
                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach($timeTable as $time)

                        @if( $time->day=='TUESDAY' && $isTimeInInterval($time->start_time,$time->end_time , '08:01:00'))
                            <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">{{$time->name}}</span>
                            <div class="margin-10px-top font-size14 fw-bold">{{$time->title}}</div>

                            <div class="font-size13 text-dark-gray">{{$time->prof}}</div>
                        @endif
                    @endforeach
                </td>

                <td>
                    @foreach($timeTable as $time)
                        @if( $time->day=='WEDNESDAY' && $isTimeInInterval($time->start_time,$time->end_time , '08:01:00'))
                            <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">{{$time->name}}</span>
                            <div class="margin-10px-top font-size14 fw-bold">{{$time->title}}</div>

                            <div class="font-size13 text-dark-gray">{{$time->prof}}</div>
                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach($timeTable as $time)
                        @if( $time->day=='THURSDAY' && $isTimeInInterval($time->start_time,$time->end_time , '08:01:00'))
                            <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">{{$time->name}}</span>
                            <div class="margin-10px-top font-size14 fw-bold">{{$time->title}}</div>

                            <div class="font-size13 text-dark-gray">{{$time->prof}}</div>
                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach($timeTable as $time)
                        @if( $time->day=='FRIDAY' && $isTimeInInterval($time->start_time,$time->end_time , '08:01:00'))
                            <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">{{$time->name}}</span>
                            <div class="margin-10px-top font-size14 fw-bold">{{$time->title}}</div>

                            <div class="font-size13 text-dark-gray">{{$time->prof}}</div>
                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach($timeTable as $time)
                        @if( $time->day=='SATURDAY' && $isTimeInInterval($time->start_time,$time->end_time , '08:01:00'))
                            <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">{{$time->name}}</span>
                            <div class="margin-10px-top font-size14 fw-bold">{{$time->title}}</div>

                            <div class="font-size13 text-dark-gray">{{$time->prof}}</div>
                        @endif
                    @endforeach
                </td>

            </tr>


            <tr>
                <td class="align-middle">10:00 - 12:00</td>
                <td>

                    @foreach($timeTable as $time)
                        @if( $time->day=='MONDAY' && $isTimeInInterval($time->start_time,$time->end_time , '10:01:00'))
                            <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">{{$time->name}}</span>
                            <div class="margin-10px-top font-size14 fw-bold">{{$time->title}}</div>
                            <div class="font-size13 text-dark-gray">{{$time->prof}}</div>
                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach($timeTable as $time)

                        @if( $time->day=='TUESDAY' && $isTimeInInterval($time->start_time,$time->end_time , '10:01:00'))
                            <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">{{$time->name}}</span>
                            <div class="margin-10px-top font-size14 fw-bold">{{$time->title}}</div>
                            <div class="font-size13 text-dark-gray">{{$time->prof}}</div>
                        @endif
                    @endforeach
                </td>

                <td>
                    @foreach($timeTable as $time)
                        @if( $time->day=='WEDNESDAY' && $isTimeInInterval($time->start_time,$time->end_time , '10:01:00'))
                            <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">{{$time->name}}</span>
                            <div class="margin-10px-top font-size14 fw-bold">{{$time->title}}</div>
                            <div class="font-size13 text-dark-gray">{{$time->prof}}</div>
                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach($timeTable as $time)
                        @if( $time->day=='THURSDAY' && $isTimeInInterval($time->start_time,$time->end_time , '10:01:00'))
                            <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">{{$time->name}}</span>
                            <div class="margin-10px-top font-size14 fw-bold">{{$time->title}}</div>
                            <div class="font-size13 text-dark-gray">{{$time->prof}}</div>
                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach($timeTable as $time)
                        @if( $time->day=='FRIDAY' && $isTimeInInterval($time->start_time,$time->end_time , '10:01:00'))
                            <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">{{$time->name}}</span>
                            <div class="margin-10px-top font-size14 fw-bold">{{$time->title}}</div>
                            <div class="font-size13 text-dark-gray">{{$time->prof}}</div>
                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach($timeTable as $time)
                        @if( $time->day=='SATURDAY' && $isTimeInInterval($time->start_time,$time->end_time , '10:01:00'))
                            <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">{{$time->name}}</span>
                            <div class="margin-10px-top font-size14 fw-bold">{{$time->title}}</div>
                            <div class="font-size13 text-dark-gray">{{$time->prof}}</div>
                        @endif
                    @endforeach
                </td>
            </tr>

            <tr>
                <td class="align-middle">14:00 -16:00</td>
                <td>

                    @foreach($timeTable as $time)
                        @if( $time->day=='MONDAY' && $isTimeInInterval($time->start_time,$time->end_time , '14:01:00'))
                            <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">{{$time->name}}</span>
                            <div class="margin-10px-top font-size14 fw-bold">{{$time->title}}</div>
                            <div class="font-size13 text-dark-gray">{{$time->prof}}</div>
                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach($timeTable as $time)

                        @if( $time->day=='TUESDAY' && $isTimeInInterval($time->start_time,$time->end_time , '14:01:00'))
                            <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">{{$time->name}}</span>
                            <div class="margin-10px-top font-size14 fw-bold">{{$time->title}}</div>
                            <div class="font-size13 text-dark-gray">{{$time->prof}}</div>
                        @endif
                    @endforeach
                </td>

                <td>
                    @foreach($timeTable as $time)
                        @if( $time->day=='WEDNESDAY' && $isTimeInInterval($time->start_time,$time->end_time , '14:01:00'))
                            <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">{{$time->name}}</span>
                            <div class="margin-10px-top font-size14 fw-bold">{{$time->title}}</div>
                            <div class="font-size13 text-dark-gray">{{$time->prof}}</div>
                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach($timeTable as $time)
                        @if( $time->day=='THURSDAY' && $isTimeInInterval($time->start_time,$time->end_time , '14:01:00'))
                            <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">{{$time->name}}</span>
                            <div class="margin-10px-top font-size14 fw-bold">{{$time->title}}</div>
                            <div class="font-size13 text-dark-gray">{{$time->prof}}</div>
                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach($timeTable as $time)
                        @if( $time->day=='FRIDAY' && $isTimeInInterval($time->start_time,$time->end_time , '14:01:00'))
                            <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">{{$time->name}}</span>
                            <div class="margin-10px-top font-size14 fw-bold">{{$time->title}}</div>
                            <div class="font-size13 text-dark-gray">{{$time->prof}}</div>
                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach($timeTable as $time)
                        @if( $time->day=='SATURDAY' && $isTimeInInterval($time->start_time,$time->end_time , '14:01:00'))
                            <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">{{$time->name}}</span>
                            <div class="margin-10px-top font-size14 fw-bold">{{$time->title}}</div>
                            <div class="font-size13 text-dark-gray">{{$time->prof}}</div>
                        @endif
                    @endforeach
                </td>
            </tr>

            <tr>
                <td class="align-middle">16:00 - 18:00 </td>

                <td>

                    @foreach($timeTable as $time)
                        @if( $time->day=='MONDAY' && $isTimeInInterval($time->start_time,$time->end_time , '16:01:00'))
                            <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">{{$time->name}}</span>
                            <div class="margin-10px-top font-size14 fw-bold">{{$time->title}}</div>
                            <div class="font-size13 text-dark-gray">{{$time->prof}}</div>
                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach($timeTable as $time)

                        @if( $time->day=='TUESDAY' && $isTimeInInterval($time->start_time,$time->end_time , '16:01:00'))
                            <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">{{$time->name}}</span>
                            <div class="margin-10px-top font-size14 fw-bold">{{$time->title}}</div>
                            <div class="font-size13 text-dark-gray">{{$time->prof}}</div>
                        @endif
                    @endforeach
                </td>

                <td>
                    @foreach($timeTable as $time)
                        @if( $time->day=='WEDNESDAY' && $isTimeInInterval($time->start_time,$time->end_time , '16:01:00'))
                            <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">{{$time->name}}</span>
                            <div class="margin-10px-top font-size14 fw-bold">{{$time->title}}</div>
                            <div class="font-size13 text-dark-gray">{{$time->prof}}</div>
                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach($timeTable as $time)
                        @if( $time->day=='THURSDAY' && $isTimeInInterval($time->start_time,$time->end_time , '16:01:00'))
                            <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">{{$time->name}}</span>
                            <div class="margin-10px-top font-size14 fw-bold">{{$time->title}}</div>
                            <div class="font-size13 text-dark-gray">{{$time->prof}}</div>
                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach($timeTable as $time)
                        @if( $time->day=='FRIDAY' && $isTimeInInterval($time->start_time,$time->end_time , '16:01:00'))
                            <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">{{$time->name}}</span>
                            <div class="margin-10px-top font-size14 fw-bold">{{$time->title}}</div>
                            <div class="font-size13 text-dark-gray">{{$time->prof}}</div>
                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach($timeTable as $time)
                        @if( $time->day=='SATURDAY' && $isTimeInInterval($time->start_time,$time->end_time , '16:01:00'))
                            <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">{{$time->name}}</span>
                            <div class="margin-10px-top font-size14 fw-bold">{{$time->title}}</div>
                            <div class="font-size13 text-dark-gray">{{$time->prof}}</div>
                        @endif
                    @endforeach
                </td>
            </tr>


            </tbody>
        </table>
    </div>
</div>
