const http = require('http');
const socketio = require('socket.io');
const server = http.createServer();
const axios = require('axios').default;

server.listen(3000);

const io = socketio.listen(server);

const nsp_notification = io.of('/notification');
const nsp_exam = io.of('/exam');

const baseUrl = 'http://127.0.0.1:8000/api';

const exam_questions = [];
const room_id = [];

nsp_notification.on('connection', (socket) => {

    console.log('user connected notification namespace');

    socket.on('joinRoom', (data) => {

        socket.join(data.room_id, () => {
            console.log('Connected notification room name: '+ data.room_id);
        });
        nsp_notification.to(data.room_id).emit('getNotificationData',data);

    });
});


nsp_exam.on('connection', (socket) => {

    console.log('User connected exam namespace');

    socket.on('examStart', (data) => {
        socket.join(data.exam_broadcast_id + data.room_id, () => {
            console.log('Connected exam room name: '+ data.exam_broadcast_id + data.room_id);

            exam_questions.push(data);
            room_id.push(data.room_id);
            //socket.emit('examStartConfirmed',{ message : 'success'});
            nsp_exam.to(data.exam_broadcast_id + data.room_id).emit('examStartConfirmed',{
                message : 'success' ,
                room_id : data.exam_broadcast_id + data.room_id
            });


        });
    });

    socket.on('studentConnectRequest', (data) => {

        if (exam_questions.length !== 0)
        {
            let index = room_id.indexOf(data.room_id);

            if (index !== -1)
            {
                let exam_broadcast_id = exam_questions[index].exam_broadcast_id;
                let sendToData = exam_questions[index].data;

                console.log(exam_questions[index].exam_broadcast_id);

                socket.join(exam_questions[index].exam_broadcast_id + exam_questions[index].room_id, () => {
                    socket.emit('room-'+data.room_id,{
                        status : 'authorized',
                        room_id: data.room_id,
                        exam_broadcast_id: exam_broadcast_id
                    });
                    console.log('odaya katıldı: '+ data.room_id);
                });

                socket.emit('studentConnectSuccessful',sendToData);

                axios.get(baseUrl+'/getTempAnswers/'+exam_broadcast_id+'/'+data.student_id)
                    .then(function (response) {
                        // handle success
                        socket.emit('getTempAnswers', response.data.data);
                    })
                    .catch(function (error) {
                        // handle error
                        console.log(error);
                    });

            }else{
                socket.emit('room-'+data.room_id,{ status : 'unauthorized', room_id: data.room_id });
            }
        }else{
            socket.emit('room-'+data.room_id,{ status : 'unauthorized', room_id: data.room_id });
        }
    });

    socket.on('saveQuestionAnswer', (data) => {
        axios.post(baseUrl+'/saveTempAnswer', {
            exam_broadcast_id: data.exam_broadcast_id,
            student_id: data.student_id,
            question_id: data.question_id,
            answer_given: data.answer_given
        }).then(function (response) {
            // handle success
            console.log(response);
        }).catch(function (error) {
            // handle error
            console.log(error);
        });
    });
});



/*io.sockets.on('connection', (socket) => {


    /!*socket.on('mesaj', (data) => {
        console.log(data.msg + socket.id);
    })*!/
    console.log("bağlanıldı.");
    socket.emit('mesaj',{"name":"hikoçer"});

    socket.on('sendNotification',function (data) {
        io.emit('notification',data);
    });
});*/

