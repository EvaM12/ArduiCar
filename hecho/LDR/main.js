var app = require('express')();
var http = require('http').createServer(app);
var io = require('socket.io')(http);

app.get('/', function(req, res){
    res.sendFile(__dirname + '/index.html');
  });

http.listen(3000, function(){
   console.log('http://localhost:3000');
});

var five = require('johnny-five');
var board = new five.Board({port : "COM5"})

board.on("ready", function() {
    var light_status= new five.Pin(13);
    var lightSensor = new five.Sensor({
        pin: "A0",
        freq: 250
    });
    lightSensor.on("data", function(){
        console.log(this.value);
        io.sockets.emit('lightSensor', lightSensor.value);
        if(this.value>=70){
            light_status.low();
        }
        else{
            light_status.high();
            console.log("no veo nada");
        }
    });
});