var app = require('express')();
var http = require('http').createServer(app);
var io = require('socket.io')(http);

app.get('/', function(req, res){
    res.sendFile(__dirname + '/index.html');
  });

http.listen(3000, function(){
   console.log('http://localhost:3000');
});

var five = require("johnny-five");
var board = new five.Board({port : "COM5"});

board.on("ready", function(){
  var proximity = new five.Proximity({
    controller: "HCSR04",
    pin: "D7",
    freq: 2500
  });

  proximity.on("change", function(){
    const {centimeters} = proximity;
    io.sockets.emit('proximity', centimeters);
    console.log("Proximity: ");
    console.log("  cm  : ", centimeters);
    console.log("-----------------");
  });
});

/*añadir los comandos
  npm install nodebots-interchange -g
  interchange install hc-sr04 -a uno -p COM5 --firmata*/

/*
var five = require("johnny-five");
var board = new five.Board({port : "COM5"});

board.on("ready", function(){
  var proximity = new five.Proximity({
    controller: "HCSR04",
    pin: "D7",
    freq: 2500
  });

  proximity.on("change", () => {
    const {centimeters, inches} = proximity;
    console.log("Proximity: ");
    console.log("  cm  : ", centimeters);
    console.log("  in  : ", inches);
    console.log("-----------------");
  });
});
*/