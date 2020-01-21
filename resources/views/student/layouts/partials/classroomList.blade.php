
@if($classrooms != null)

    @foreach($classrooms as $index=>$classroom)
        @php
            $color = ['success','primary','warning','rose'];
        @endphp

        <div class="col-md-3">
            <div class="card card-chart" >
                <div class="card-header card-header-{{ $color[$index%count($color)] }}" >
                    <h3><b>{{ $rooms[$index]->room_name }}</b></h3>
                    <h4> {{ $teacher_name[$index] }}</h4>
                </div>
                <div class="card-body">
                    <h4 class="card-title"><a href="{{ route('student.classroom.show',$rooms[$index]->room_id) }}"><b>Sınıfa git</b></a> </h4>
                    <p class="card-category">Devam eden aktivite: <b>Yok</b></p>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons">access_time</i> Yakın zamanda sınav yok.
                    </div>
                    <button id="exitBtn-{{ $rooms[$index]->room_id }}" type="button" onclick="exitToClassroom('{{ $rooms[$index]->room_id }}')" class="btn btn-danger btn-link " rel="tooltip" data-placement="bottom" title="" data-original-title="Sınıftan ayrıl">
                        <i class="material-icons " style="font-size: 20px;" >exit_to_app</i>
                    </button>
                </div>
            </div>
        </div>

    @endforeach

@endif

