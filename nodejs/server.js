const app = require('express')();
const server = require('http').Server(app);
const io = require('socket.io')(server);
const redis = require('redis');

server.listen(8890);

io.on('connection', function (socket) {

    console.log("client connected");
    const redisClient = redis.createClient();
    redisClient.subscribe('notification');

    redisClient.on("notification", function(channel, data) {
        console.log("mew message add in queue "+ data['notification'] + " channel");
        socket.emit(channel,{name:'hikmet'});
    });

    socket.on('disconnect', function() {
        redisClient.quit();
    });

});