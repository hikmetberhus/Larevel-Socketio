@extends('student.layouts.master')

@section('title','senEdu')

@section('content')
    <div class="row justify-content-start ml-5">
        @include('student.layouts.partials.classroomList')
    </div>
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
@endsection