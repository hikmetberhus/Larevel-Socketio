@extends('layouts.master')

@section('title','senEdu')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-warning card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">perm_contact_calendar</i>
                        </div>
                        <p class="card-category">Sınıflar</p>
                        <h3 class="card-title">{{ $room_count }}</h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons ">info</i>
                            <span>Yeni hesaplarda varsayılan olarak 1 sınıf oluşturulur.</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-success card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">assignment</i>
                        </div>
                        <p class="card-category">Sınavlar</p>
                        <h3 class="card-title">{{ $exam_count }}</h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons ">local_offer</i>
                            <span>Daha fazlası için sınıf Sınavlar sekmesine git.</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-primary card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">format_list_numbered</i>
                        </div>
                        <p class="card-category">Soru sayısı</p>
                        <h3 class="card-title">{{ $question_count }}</h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons ">supervisor_account</i>
                            <span>Tüm sınavlarda kayıtlı öğrenci sayısıdır.</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-info card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">supervisor_account</i>
                        </div>
                        <p class="card-category">Öğrenciler</p>
                        <h3 class="card-title">{{ $student_count }}</h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons ">supervisor_account</i>
                            <span>Tüm sınıflara kayıtlı öğrenci sayısıdır.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-header card-header-rose card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">settings_input_antenna</i>
                        </div>
                        <h4 class="card-title">Aktif Aktiviteler</h4>
                        <div id="examCloseBtn" class="card-header-text text-right " style="display: none">
                            <a href="#" id="examFinishBtn" onclick="examFinish()" class="btn btn-danger btn-round ">
                                <i class="material-icons" style="padding-right: 20px;">portable_wifi_off</i>
                                Sınavı Bitir
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <span id="studentCount"></span>
                        <div class="table-responsive " style="display: none;">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th class="text-center"><b>#</b></th>
                                    <th><b>İsim</b></th>
                                    <th><b>Soyisim</b> </th>
                                    <th><b>Email</b></th>
                                </tr>
                                </thead>
                                <tbody class="studentList">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('footer')
    <script src="https://cdn.socket.io/socket.io-1.3.4.js"></script>
    <script>
        const socket_exam = io.connect('http://localhost:3000/exam');

        const exam_broadcast_id = '{{$exam_broadcast_id}}';
        const room_id = '{{ $default_room  }}';

        socket_exam.emit('roomExistsRequest', {
            exam_broadcast_id: exam_broadcast_id,
            room_id: room_id
        });

        socket_exam.on('roomExistsResponse', (data) => {

            if (data.message === 'success') {
                $('#examCloseBtn').show();
                $('#studentCount').html('<h5>Sınavdaki öğrenci sayısı: <b> 0 </b></h5>');
                $('.table-responsive').show();

                getStudents();

            }else {
                $('#examCloseBtn').hide();
                $('#studentCount').html('<h5><b>Devam eden aktivite yok.</b></h5>');
                $('.table-responsive').hide();

            }
        });

        function getStudents() {

            let base_url = window.location.origin;

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: base_url + "/teacher/getStudent/"+exam_broadcast_id,
                async: false,
                method: 'get',
                success: function (result) {
                    if (result.success){

                        $('.studentList').html('');
                        $('#studentCount').html('<h5>Sınavdaki öğrenci sayısı: <b> '+ result.data.length +' </b></h5>');

                        result.data.map((data,index) => {
                            $('.studentList').append('<tr>\n' +
                                '      <td class="text-center">'+ (index+1) +'</td>\n' +
                                '      <td>'+ data.name +'</td>\n' +
                                '      <td>'+ data.surname +'</td>\n' +
                                '      <td>'+ data.email +'</td>\n' +
                                '</tr>')
                        });

                        setTimeout(function () {
                            getStudents();
                        },60000);

                    }
                }
            })
        }

        function examFinish(socket = socket_exam) {

            let base_url = window.location.origin;

            $('#examFinishBtn').click(function (e) {
               e.preventDefault();
            });

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: base_url + "/teacher/activityFinish",
                method: 'post',
                data: {
                    exam_broadcast_id: exam_broadcast_id
                },
                success: function (result) {
                    if (result.success){

                        socket.emit('teacherFinishesExam',{
                            exam_broadcast_id: exam_broadcast_id,
                            room_id: room_id
                        });

                        $('#examCloseBtn').hide();
                        $('#studentCount').html('<h5><b>Devam eden aktivite yok.</b></h5>');
                        $('.table-responsive').hide();

                        setTimeout(function () {
                            cloneAnswer();
                        },15000);

                        let timerInterval;
                        Swal.fire({
                            title: 'Sınav Sonlandırılıyor!',
                            html: 'Sınav sonlandırılana kadar lütfen bekleyin.',
                            timer: 15000,
                            timerProgressBar: true,
                            onBeforeOpen: () => {
                                Swal.showLoading()
                                timerInterval = setInterval(() => {
                                    const content = Swal.getContent()
                                    if (content) {
                                        const b = content.querySelector('b')
                                        if (b) {
                                            //b.textContent = Swal.getTimerLeft()
                                        }
                                    }
                                }, 1000)
                            },
                            onClose: () => {
                                clearInterval(timerInterval)
                            }
                        }).then((result) => {
                            /* Read more about handling dismissals below */
                            if (result.dismiss === Swal.DismissReason.timer) {
                                console.log('I was closed by the timer')
                            }
                        })
                    }
                }
            })
        }

        function cloneAnswer() {

            let base_url = window.location.origin;

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: base_url + "/teacher/cloneAnswers",
                method: 'post',
                data: {
                    exam_broadcast_id: exam_broadcast_id
                },
                success: function (result) {
                    if (result.success){
                        console.log(result.success);
                    }
                }
            })
        }

    </script>
@endsection