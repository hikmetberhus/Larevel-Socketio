@extends('student.layouts.master')

@section('title','senEdu')

@section('head')
    <link rel="stylesheet" href="{{ asset('css/exam_launch.css') }}">
@endsection
@section('content')
    <div class="css-loader">
        <div class="row justify-content-center">
            <div class="col-md-3 col-sm-3">
                Sınavın başlatılması bekleniyor...
                <div class="sk-folding-cube">
                    <div class="sk-cube1 sk-cube"></div>
                    <div class="sk-cube2 sk-cube"></div>
                    <div class="sk-cube4 sk-cube"></div>
                    <div class="sk-cube3 sk-cube"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-start" >
        <div class="col-md-1 col-sm-1 ">
            <a href="#" class="btn-question">
                <i class="material-icons">
                    arrow_back_ios
                </i>
                <span>ÖNCEKİ</span>
            </a>
        </div>
        <div class="col-md-10 col-sm-10">
            <div class="card">
                <div class="card-body">
                    <form name="questionForm" method="" action="">
                        <div class="row justify-content-start">
                            <div class="col-md-2 col-sm-2">
                                <span>#Soru-<b>1</b></span>
                            </div>
                            <div class="col-md-6 col-sm-6"></div>
                            <div class="col-md-4 col-sm-4">
                                <span class="justify-content-start">Geçen süre: <b>00.12</b></span>
                                <span class="ml-5"><button class="btn btn-warning btn-round btn-sm">Sınavı bitir</button></span>
                            </div>

                        </div>
                        <hr>
                        <div class="row justify-content-start mb-3">
                            <div class="col-md-10 col-sm-10">
                                <h5 id="questionContent"><b>Soru içeriği buraya gelecek?</b></h5>
                            </div>
                        </div>
                        <div class="row justify-content-start mt-3">
                            <div class="col-md-10 col-sm-10">
                                <input class="option-checkbox"   id="option-A" type="radio" value="option-A" name="questionOption">
                                <label for="option-A">
                                    <span class="option-box">A</span>
                                    <span class="option-content">A seçeneği içeriği</span>
                                </label>
                            </div>
                        </div>
                        <div class="row justify-content-start mt-3">
                            <div class="col-md-10 col-sm-10">
                                <input class="option-checkbox"  id="option-B" type="radio" value="option-B" name="questionOption">
                                <label for="option-B">
                                    <span class="option-box">B</span>
                                    <span class="option-content">B seçeneği içeriği</span>
                                </label>
                            </div>
                        </div>
                        <div class="row justify-content-start mt-3">
                            <div class="col-md-10 col-sm-10">
                                <input class="option-checkbox"  id="option-C" type="radio" value="option-C" name="questionOption">
                                <label for="option-C">
                                    <span class="option-box">C</span>
                                    <span class="option-content">C seçeneği içeriği</span>
                                </label>
                            </div>
                        </div>
                        <div class="row justify-content-start mt-3">
                            <div class="col-md-10 col-sm-10">
                                <input class="option-checkbox"  id="option-D" type="radio" value="option-D" name="questionOption">
                                <label for="option-D">
                                    <span class="option-box">D</span>
                                    <span class="option-content">D seçeneği içeriği</span>
                                </label>
                            </div>
                        </div>
                        <div class="row justify-content-start mt-3">
                            <div class="col-md-10 col-sm-10">
                                <input class="option-checkbox"  id="option-E" type="radio" value="option-E" name="questionOption">
                                <label for="option-E">
                                    <span class="option-box">E</span>
                                    <span class="option-content">E seçeneği içeriği</span>
                                </label>
                            </div>
                        </div>
                        <div class="row justify-content-start mt-4">
                            <div class="col-md-10 col-sm-10">
                                <span id="qustionDescription">varsa sorunun açıklaması</span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-1 col-sm-1 ">
            <a href="#" class="btn-question">
                <span>SONRAKİ</span>
                <i class="material-icons">
                    arrow_forward_ios
                </i>

            </a>
        </div>
    </div>



@endsection
@section('questionNumberBar')
    <footer class="footer ">
        <div class="container">
            <div class="row">
                <div class="col-md-1 col-sm-1">
                    <button class="btn btn-outline-primary btn-sm">
                        <i class="material-icons">arrow_back</i>
                        Geri
                    </button>
                </div>
                <div class="col-md-10 col-sm-12">
                    <ul class="question-number-bar">
                        <li class="question-number-item"><button class="btn btn-success btn-sm">1</button></li>
                        <li class="question-number-item"><button class="btn btn-success btn-sm">2</button></li>
                        <li class="question-number-item"><button class="btn btn-success btn-sm">3</button></li>
                        <li class="question-number-item"><button class="btn btn-default btn-sm">4</button></li>
                        <li class="question-number-item"><button class="btn btn-success btn-sm">5</button></li>
                        <li class="question-number-item"><button class="btn btn-default btn-sm">4</button></li>
                        <li class="question-number-item"><button class="btn btn-default btn-sm">4</button></li>
                        <li class="question-number-item"><button class="btn btn-success btn-sm">5</button></li>
                        <li class="question-number-item"><button class="btn btn-default btn-sm">4</button></li>
                        <li class="question-number-item"><button class="btn btn-success btn-sm">5</button></li>
                        <li class="question-number-item"><button class="btn btn-default btn-sm">4</button></li>
                        <li class="question-number-item"><button class="btn btn-success btn-sm">5</button></li>
                        <li class="question-number-item"><button class="btn btn-default btn-sm">4</button></li>
                        <li class="question-number-item"><button class="btn btn-success btn-sm">5</button></li>
                        <li class="question-number-item"><button class="btn btn-default btn-sm">4</button></li>
                        <li class="question-number-item"><button class="btn btn-success btn-sm">5</button></li>
                        <li class="question-number-item"><button class="btn btn-default btn-sm">4</button></li>
                        <li class="question-number-item"><button class="btn btn-success btn-sm">5</button></li>
                        <li class="question-number-item"><button class="btn btn-default btn-sm">4</button></li>
                        <li class="question-number-item"><button class="btn btn-success btn-sm">5</button></li>
                        <li class="question-number-item"><button class="btn btn-default btn-sm">4</button></li>
                        <li class="question-number-item"><button class="btn btn-success btn-sm">5</button></li>
                        <li class="question-number-item"><button class="btn btn-default btn-sm">4</button></li>
                        <li class="question-number-item"><button class="btn btn-success btn-sm">5</button></li>
                        <li class="question-number-item"><button class="btn btn-default btn-sm">4</button></li>
                        <li class="question-number-item"><button class="btn btn-success btn-sm">5</button></li>
                        <li class="question-number-item"><button class="btn btn-default btn-sm">4</button></li>
                        <li class="question-number-item"><button class="btn btn-success btn-sm">5</button></li>
                    </ul>
                </div>
                <div class="col-md-1 col-sm-1">
                    <button class="btn btn-outline-primary btn-sm">
                        İleri
                        <i class="material-icons">
                            arrow_forward
                        </i>
                    </button>
                </div>
            </div>

        </div>
    </footer>
@endsection

@section('footer')
    <script type="text/javascript" src="{{ asset('js/student/dashboard.js') }}" ></script>
    <script src="https://cdn.socket.io/socket.io-1.3.4.js"></script>
    <script>

        const socket = io.connect('http://localhost:3000/notification');

        let notifications = {!! json_encode($notification_broadcast) !!} ;
        let rooms = {!! json_encode($rooms) !!};
        let notificationCount=0;
        let notificationData = [];

        if(rooms.length !== 0)
        {
            for (var i=0;i<rooms.length;i++){
                socket.emit('joinRoom', rooms[i] );
            }

            if(notifications.length !== 0)
            {
                for (var i=0;i<notifications.length;i++){
                    socket.emit('joinRoom', notifications[i] );
                }
            }else{
                socket.emit('joinRoom', {room_id: '00000000'} );
            }
        }else{
            socket.emit('joinRoom', {room_id: '00000000'} );
        }


        socket.on('getNotificationData',function (data) {

            if (data.room_id === '00000000') {
                $('#nullNotification').html('<a  class="dropdown-item" href="#">Bildirim yok!</a>');
                $('#notificationCount').html('');
                notificationCount = 0;
            }

            if(data.notification_id !== undefined){

                notificationCount++;
                notificationData.push(data);

                $('#notificationsList').prepend('<a id="'+ data.notification_id +'" onclick="viewNotification('+ data.notification_id +')" class="dropdown-item" href="#">' +
                    '<b class="mr-1">'+ data.teacher_name +' '+ data.teacher_surname +'</b> bir duyuru yayınladı.</a>');
                $('#notificationCount').html('<span class="notification">' + notificationCount + '</span>');
                $('#nullNotification').html('');
            }
        });




        function viewNotification(notification_id = null,data = notificationData) {

            $('#'+notification_id).click(function (e) {
                e.preventDefault();
            });

            if (notification_id !== null)
            {
                for (var i = 0; i< data.length ; i++) {
                    if(notification_id === data[i].notification_id){
                        var oneData = data[i];
                    }
                }
                Swal.fire({
                    title: oneData.teacher_name+' '+oneData.teacher_surname,
                    html: '<p><b>Konu: </b>'+ oneData.subject+'<br>' +
                        '<b>Duyuru: </b>'+ oneData.content+'<br></p>',
                    showCloseButton: true,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Tamam',
                });
                console.log(oneData.room_id);
            }

        }
    </script>
    <script>
        var rad = document.questionForm.questionOption;
        var prev = null;
        for (var i = 0; i < rad.length; i++) {
            rad[i].addEventListener('change', function() {
                (prev) ? console.log(): null;
                if(prev !== null){
                    $("label[for='"+ prev.value +"'] > .option-box-selected").addClass('option-box');
                    $("label[for='"+ prev.value +"'] > .option-box").removeClass('option-box-selected');
                    $("label[for='"+ prev.value +"'] > .option-content-selected").addClass('option-content');
                    $("label[for='"+ prev.value +"'] > .option-content").removeClass('option-content-selected');

                }
                if (this !== prev) {
                    prev = this;
                }
                $("label[for='"+ this.value +"'] > .option-box").addClass('option-box-selected');
                $("label[for='"+ this.value +"'] > .option-box-selected").removeClass('option-box');
                $("label[for='"+ this.value +"'] > .option-content").addClass('option-content-selected');
                $("label[for='"+ this.value +"'] > .option-content-selected").removeClass('option-content');

            });
        }

    </script>
@endsection