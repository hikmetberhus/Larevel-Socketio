const http = require('http');
const socketio = require('socket.io');
const server = http.createServer();

server.listen(3000);

const io = socketio.listen(server);

const nsp_notification = io.of('/notification');

nsp_notification.on('connection', (socket) => {
    console.log('user connected');

    socket.on('joinRoom', (data) => {
        console.log(data);

        socket.join(data.room_id, () => {
            console.log('Connected. Room name: '+ data.room_id);
        });
        nsp_notification.to(data.room_id).emit('getNotificationData',data);

        //nsp.emit('herkese gonder', { name: 'Mehmet' });
    });
});

const getOnlineCount = (io, data) => {
    const room = io.sockets.adapter.rooms[data.room_id];
    return room ? room.length : 0;
};
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

