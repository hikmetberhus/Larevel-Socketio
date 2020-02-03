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

    <div id="questionPage" class="row justify-content-start content-hide" >
        <div class="col-md-1 col-sm-1 ">
            <a href="#" id="prevBtnBig" onclick="prevQuestion()" class="btn-question">
                <i class="material-icons">
                    arrow_back_ios
                </i>
                <span>ÖNCEKİ</span>
            </a>
        </div>
        <div class="col-md-10 col-sm-10">
            <div class="card">
                <div class="card-body">

                        <input type="hidden" id="question_id" name="question_id" value="">
                        <div class="row justify-content-start">
                            <div class="col-md-2 col-sm-2">
                                <span id="questionSort">#Soru-<b>1</b></span>
                            </div>
                            <div class="col-md-8 col-sm-8"></div>
                            <div class="col-md-2 col-sm-2">
                                <span>
                                    <button id="examFinishBtn" onclick="examFinish()" class="btn btn-warning btn-round btn-sm">
                                        <i class="material-icons">
                                            power_settings_new
                                        </i>
                                        Sınavı bitir
                                    </button>
                                </span>
                            </div>

                        </div>
                        <hr>
                        <div class="row justify-content-start mb-3">
                            <div class="col-md-10 col-sm-10">
                                <h5 ><b><span id="questionContent">Soru içeriği buraya gelecek?</span></b></h5>
                            </div>
                        </div>
                        <div class="row justify-content-start mt-3">
                            <div class="col-md-10 col-sm-10">
                                <input class="option-checkbox" onclick="selectOnlyThis(this.id)"  id="option_A" type="checkbox" value="option_A" name="questionOption" >
                                <label for="option_A">
                                    <span class="option-box">A</span>
                                    <span id="opt-A" class="option-content">A seçeneği içeriği</span>
                                </label>
                            </div>
                        </div>
                        <div class="row justify-content-start mt-3">
                            <div class="col-md-10 col-sm-10">
                                <input class="option-checkbox" onclick="selectOnlyThis(this.id)"  id="option_B" type="checkbox" value="option_B" name="questionOption">
                                <label for="option_B">
                                    <span class="option-box">B</span>
                                    <span id="opt-B" class="option-content">B seçeneği içeriği</span>
                                </label>
                            </div>
                        </div>
                        <div class="row justify-content-start mt-3">
                            <div class="col-md-10 col-sm-10">
                                <input class="option-checkbox" onclick="selectOnlyThis(this.id)"  id="option_C" type="checkbox" value="option_C" name="questionOption">
                                <label for="option_C">
                                    <span class="option-box">C</span>
                                    <span id="opt-C" class="option-content">C seçeneği içeriği</span>
                                </label>
                            </div>
                        </div>
                        <div class="row justify-content-start mt-3">
                            <div class="col-md-10 col-sm-10">
                                <input class="option-checkbox" onclick="selectOnlyThis(this.id)"  id="option_D" type="checkbox" value="option_D" name="questionOption">
                                <label for="option_D">
                                    <span class="option-box">D</span>
                                    <span id="opt-D" class="option-content">D seçeneği içeriği</span>
                                </label>
                            </div>
                        </div>
                        <div class="row justify-content-start mt-3">
                            <div class="col-md-10 col-sm-10">
                                <input class="option-checkbox" onclick="selectOnlyThis(this.id)"  id="option_E" type="checkbox" value="option_E" name="questionOption">
                                <label for="option_E">
                                    <span class="option-box">E</span>
                                    <span id="opt-E" class="option-content">E seçeneği içeriği</span>
                                </label>
                            </div>
                        </div>
                        <div class="row justify-content-start mt-4">
                            <div class="col-md-10 col-sm-10">
                                <span id="qustionDescription">varsa sorunun açıklaması</span>
                            </div>
                        </div>

                </div>
            </div>
        </div>
        <div class="col-md-1 col-sm-1 ">
            <a id="nextBtnBig" href="#"  onclick="nextQuestion()" class="btn-question " >
                <span>SONRAKİ</span>
                <i class="material-icons">
                    arrow_forward_ios
                </i>

            </a>
        </div>
    </div>



@endsection
@section('questionNumberBar')
    <footer id="questionFooter" class="footer footer-hide">
        <div class="container">
            <div class="row">
                <div class="col-md-1 col-sm-1">
                    <button onclick="prevQuestion()" class="btn btn-outline-primary btn-sm">
                        <i class="material-icons">arrow_back</i>
                        Geri
                    </button>
                </div>
                <div class="col-md-10 col-sm-12">
                    <ul class="question-number-bar">

                    </ul>
                </div>
                <div class="col-md-1 col-sm-1">
                    <button onclick="nextQuestion()" class="btn btn-outline-primary btn-sm">
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
    <script src="https://unpkg.com/dexie@latest/dist/dexie.js"></script>
    <script>

        const socket_notification = io.connect('http://localhost:3000/notification');

        let notifications = {!! json_encode($notification_broadcast) !!} ;
        let rooms = {!! json_encode($rooms) !!};
        let notificationCount=0;
        let notificationData = [];

        if(rooms.length !== 0)
        {
            for (var i=0;i<rooms.length;i++){
                socket_notification.emit('joinRoom', rooms[i] );
            }

            if(notifications.length !== 0)
            {
                for (var i=0;i<notifications.length;i++){
                    socket_notification.emit('joinRoom', notifications[i] );
                }
            }else{
                socket_notification.emit('joinRoom', {room_id: '00000000'} );
            }
        }else{
            socket_notification.emit('joinRoom', {room_id: '00000000'} );
        }


        socket_notification.on('getNotificationData',function (data) {

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
        const socket_exam = io.connect('http://localhost:3000/exam');

        const room_id = window.location.pathname.split('/')[3];

        Dexie.delete('senedu');

        localStorage.setItem('student_id',{{ $student_id }});

        connectionStream();  // reqursive connection request

        socket_exam.on('room-'+room_id, (data) =>{

            if(data.status === 'unauthorized')
            {
                $('.css-loader').show();

                connectionStream();

            }else if(data.status === 'authorized')
            {
                localStorage.setItem('exam_broadcast_id',data.exam_broadcast_id);

                $('#questionPage').removeClass('content-hide');
                $('#questionFooter').removeClass('footer-hide');
                $('.css-loader').hide();
            }
        });

        socket_exam.on('studentConnectSuccessful', async (data, db = new Dexie('senedu')) => {
            console.log(data);
            db.version(1).stores({
                questions: 'question_id,exam_id,sort,content,option_A,option_B,option_C,option_D,option_E,description',
                answers: 'question_id,answer_given'
            });

            data.map((question) => {
                db.questions.put({
                    question_id: question.question_id,
                    exam_id: question.exam_id,
                    sort: question.sort,
                    content: question.content,
                    option_A: question.option_A,
                    option_B: question.option_B,
                    option_C: question.option_C,
                    option_D: question.option_D,
                    option_E: question.option_E,
                    description: question.description
                });

                db.answers.put({
                    question_id: question.question_id,
                    answer_given: null
                });
            });

        });

        socket_exam.on('getTempAnswers', (data, db = new Dexie('senedu')) => {
            db.version(1).stores({
                questions: 'question_id,exam_id,sort,content,option_A,option_B,option_C,option_D,option_E,description',
                answers: 'question_id,answer_given'
            });

            if(data !== null)
            {
                for (var i = 0; i < data.length; i++) {
                    db.answers.put({
                         question_id: data[i].question_id,
                         answer_given: data[i].answer_given
                    })
                }
            }

            createDefaultTemplate();

        });

        socket_exam.on('examFinishEvent', (data) => {
            if(data.message === 'finish')
            {
                saveAnswer();

                Dexie.delete('senedu');

                socket_exam.emit('studentLeave',{exam_broadcast_id: localStorage.getItem('exam_broadcast_id')+room_id});

                window.location.href = '/student';
            }
        });



        async function createDefaultTemplate(db = new Dexie('senedu')) {
            db.version(1).stores({
                questions: 'question_id,exam_id,sort,content,option_A,option_B,option_C,option_D,option_E,description',
                answers: 'question_id,answer_given'
            });


            const questions = await db.questions.toArray();
            const answers = await db.answers.toArray();

            let firstQuestion = await db.questions.where('sort').equals(1).first();
            let answer_exists = null;

            for(var i=0; i < answers.length ; i++){
                if(answers[i].answer_given !== null){
                    answer_exists = answers[i];
                    break;
                }
            }

            $("input[name='question_id']").val(firstQuestion.question_id);
            $("#questionSort").html('#Soru-<b>' + firstQuestion.sort + '</b>');
            $("#questionContent").text(firstQuestion.content);
            $("#opt-A").text(firstQuestion.option_A);
            $("#opt-B").text(firstQuestion.option_B);
            $("#opt-C").text(firstQuestion.option_C);
            $("#opt-D").text(firstQuestion.option_D);
            $("#opt-E").text(firstQuestion.option_E);
            $("#qustionDescription").text(firstQuestion.description);

            if (answer_exists !== null)
            {
                let id_list = ['option_A','option_B','option_C','option_D','option_E'];

                id_list.map((id) => {
                    document.getElementById(id).checked = false;
                    checkboxRemoveClass(id);
                });

                document.getElementById(answer_exists.answer_given).checked = true;
                checkboxAddClass(answer_exists.answer_given);
            }

            questions.map(async (question) => {
                let answer_exists = await db.answers.get(question.question_id);

                let class_name = answer_exists.answer_given === null ? 'btn-default' : 'btn-success';

                $('.question-number-bar').append(
                    '<li><button id="q-' + question.question_id + '" onclick="openQuestion(' + question.question_id + ')" class="btn ' + class_name + ' btn-sm">' + question.sort + '</button></li>'
                );
            });

        }

        async function saveAnswer(db = new Dexie('senedu')) {
            db.version(1).stores({
                questions: 'question_id,exam_id,sort,content,option_A,option_B,option_C,option_D,option_E,description',
                answers: 'question_id,answer_given'
            });

            let question_id = parseInt($('#question_id').val());
            let answer_given = $("input:checkbox:checked").val();
            let data = {
                exam_broadcast_id: localStorage.getItem("exam_broadcast_id"),
                student_id: localStorage.getItem("student_id"),
                question_id: question_id,
                answer_given: answer_given,
                room_id: window.location.pathname.split('/')[3]
            };

            if (answer_given === undefined)
            {
                saveQuestionEmit(data);

                db.answers.put({question_id, answer_given: null});

                $('#q-' + question_id).addClass('btn-default');
                $("#q-" + question_id).removeClass('btn-success');

            } else {
                let answer = await db.answers.get(question_id);

                if (answer.answer_given !== answer_given)
                {
                    saveQuestionEmit(data);

                    db.answers.put({question_id, answer_given: answer_given});

                    $('#q-' + question_id).removeClass('btn-default');
                    $("#q-" + question_id).addClass('btn-success');
                }

            }
        }

        function connectionStream(socket = socket_exam, room_id = window.location.pathname.split('/')[3]) {
            setTimeout(function(){
                socket.emit('studentConnectRequest', {
                    room_id : room_id,
                    student_id: localStorage.getItem('student_id')
                });
                console.log('istek yollandı');
            }, 1000);
        }

        function openQuestion(question_id = null , db = new Dexie('senedu')) {

            if (question_id !== null)
            {
                db.version(1).stores({
                    questions: 'question_id,exam_id,sort,content,option_A,option_B,option_C,option_D,option_E,description',
                    answers: 'question_id,answer_given'
                });

                saveAnswer();

                db.questions.get(question_id).then((question) =>{
                    $("input[name='question_id']").val(question.question_id);
                    $("#questionSort").html('#Soru-<b>'+ question.sort +'</b>');
                    $("#questionContent").text(question.content);
                    $("#opt-A").text(question.option_A);
                    $("#opt-B").text(question.option_B);
                    $("#opt-C").text(question.option_C);
                    $("#opt-D").text(question.option_D);
                    $("#opt-E").text(question.option_E);
                    $("#qustionDescription").text(question.description);
                });



                db.answers.get(question_id).then((question) => {

                    var id_list = ['option_A','option_B','option_C','option_D','option_E'];

                    if(question.answer_given === null){
                        for (var i = 0;i < id_list.length; i++)
                        {
                            document.getElementById(id_list[i]).checked = false;
                            checkboxRemoveClass(id_list[i]);
                        }
                    }else{

                        for (var i = 0;i < id_list.length; i++)
                        {
                            document.getElementById(id_list[i]).checked = false;
                            checkboxRemoveClass(id_list[i]);
                        }

                        document.getElementById(question.answer_given).checked = true;
                        checkboxAddClass(question.answer_given);
                    }
                });
            }
        }
        
        function nextQuestion(db = new Dexie('senedu')) {
            db.version(1).stores({
                questions: 'question_id,exam_id,sort,content,option_A,option_B,option_C,option_D,option_E,description',
                answers: 'question_id,answer_given'
            });

            let question_id = parseInt($('#question_id').val());

            saveAnswer();

            db.questions.get(question_id).then(async (question) => {
                let sort = question.sort;
                let next_id = await db.questions.where('sort').equals(sort + 1).first();

                openQuestion(next_id.question_id);
            })
        }

        function prevQuestion(db = new Dexie('senedu')) {
            db.version(1).stores({
                questions: 'question_id,exam_id,sort,content,option_A,option_B,option_C,option_D,option_E,description',
                answers: 'question_id,answer_given'
            });

            let question_id = parseInt($('#question_id').val());

            saveAnswer();

            db.questions.get(question_id).then(async (question) => {
                let sort = question.sort;

                if(sort !== 1){
                    var next_id = await db.questions.where('sort').equals(sort - 1).first();
                    openQuestion(next_id.question_id);
                }
            })
        }

        function saveQuestionEmit(data,socket = socket_exam) {
            socket.emit('saveQuestionAnswer',data);
        }

        function examFinish() {

            $('#examFinishBtn').click(function (e) {
                e.preventDefault();
            });

            Swal.fire({
                title: 'Sınavı bitirmek istediğine eminmisin?',
                text: "Cavapların kalıcı olarak saklanacaktır. ",
                icon: 'warning',
                showCancelButton: true,
                showCloseButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Evet, bitir!',
                cancelButtonText: 'İptal'
            }).then((result) => {
                if (result.value) {

                    saveAnswer();

                    Dexie.delete('senedu');

                    socket_exam.emit('studentLeave',{exam_broadcast_id: localStorage.getItem('exam_broadcast_id')+room_id})

                    window.location.href = '/student'
                }
            })
        }

    </script>
    <script>

        function selectOnlyThis(id) {

            if (document.getElementById(id).checked === false)
            {
                document.getElementById(id).checked = false;
                checkboxRemoveClass(id);

            }else{
                var id_list = ['option_A','option_B','option_C','option_D','option_E'];

                for (var i = 0;i < id_list.length; i++)
                {
                    document.getElementById(id_list[i]).checked = false;
                    checkboxRemoveClass(id_list[i]);
                }
                document.getElementById(id).checked = true;
                checkboxAddClass(id);
            }
        }

        function checkboxRemoveClass(id) {
            $("label[for='"+ id +"'] > .option-box-selected").addClass('option-box');
            $("label[for='"+ id +"'] > .option-box").removeClass('option-box-selected');
            $("label[for='"+ id +"'] > .option-content-selected").addClass('option-content');
            $("label[for='"+ id +"'] > .option-content").removeClass('option-content-selected');
        }

        function checkboxAddClass(id) {
            $("label[for='"+ id +"'] > .option-box").addClass('option-box-selected');
            $("label[for='"+ id +"'] > .option-box-selected").removeClass('option-box');
            $("label[for='"+ id +"'] > .option-content").addClass('option-content-selected');
            $("label[for='"+ id +"'] > .option-content-selected").removeClass('option-content');
        }


    </script>
@endsection