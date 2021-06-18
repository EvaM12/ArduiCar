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
  var servo= new five.Servo(5);
  board.repl.inject({
      servo: servo
  });

  var proximity = new five.Proximity({
    controller: "HCSR04",
    pin: 9,
    freq: 1000
  });

  
  proximity.on("change", function(){
    const {centimeters} = proximity;
    servo.sweep();
    if(centimeters > 0 ){
      if(centimeters < 10){
          piezo.play({
              song: "B B B B - - B B B B - - B B B B - - B B B B - - B B B B",
              beats: 1 / 4,
              tempo: 150
          });
      } if(centimeters >= 10 && centimeters < 30 ){
          piezo.play({
              song: "F F F F - - F F F F - - F F F F - - F F F F - - F F F F",
              beats: 1 / 4,
              tempo: 150
          });
      } 
    }
    io.sockets.emit('proximity', centimeters);
    console.log("Proximity: ");
    console.log("  cm  : ", centimeters);
    console.log("-----------------");
  });

  var proximity2 = new five.Proximity({
    controller: "HCSR04",
    pin: 'A1',
    freq: 1000
  });
  
  proximity2.on("change", function(){
    const {centimeters} = proximity2;
    servo.sweep();
    if(centimeters > 0 ){
      if(centimeters < 10){
          piezo.play({
              song: "B B B B - - B B B B - - B B B B - - B B B B - - B B B B",
              beats: 1 / 4,
              tempo: 150
          });
      } if(centimeters >= 10 && centimeters < 30 ){
          piezo.play({
              song: "F F F F - - F F F F - - F F F F - - F F F F - - F F F F",
              beats: 1 / 4,
              tempo: 150
          });
      } 
    }
    io.sockets.emit('proximity2', centimeters);
    console.log("Proximity2: ");
    console.log("  cm  : ", centimeters);
    console.log("-----------------");
  });

  var piezo = new five.Piezo(6);
  board.repl.inject({
      piezo: piezo
  });

  var lightSensor = new five.Sensor({
    pin: "A3",
    freq: 1000
  });

  lightSensor.on("data", function(){
    const light = this.value;
    io.sockets.emit('light',light);
    console.log("Luz: ");
    console.log("  Intensidad  : ", light);
    console.log("-----------------");
  });
    

  // /* Definicion de la variable y asignación del pin que controlara el buzzer
  //    */
  // var piezo = new five.Piezo(6);
  // board.repl.inject({
  //     piezo: piezo
  // });

  // /* Definicion de la variable y asignación del pin que controlara
  //  * el sensor de proximidad delantero 
  //  */
  // var proximity = new five.Proximity({
  //   controller: "HCSR04",
  //   pin: 'A0',
  //   freq: 250
  // });

  // proximity.on("change", function(){
  //   const {centimeters} = proximity;
  //   if(centimeters > 0 ){
  //     if(centimeters < 10){
  //         piezo.play({
  //             song: "B B B B - - B B B B - - B B B B - - B B B B - - B B B B",
  //             beats: 1 / 4,
  //             tempo: 150
  //         });
  //     } if(centimeters >= 10 && centimeters < 30 ){
  //         piezo.play({
  //             song: "F F F F - - F F F F - - F F F F - - F F F F - - F F F F",
  //             beats: 1 / 4,
  //             tempo: 150
  //         });
  //     } 

  //   }
  //   io.sockets.emit('proximity', centimeters);
  //   console.log("Proximity: ");
  //   console.log("  cm  : ", centimeters);
  //   console.log("-----------------");
  // });

  // /* Definicion de la variable y asignación del pin que controlara
  //  * el sensor de proximidad trasero 
  //  */
  // var proximity2 = new five.Proximity({
  //   controller: "HCSR04",
  //   pin: 9,
  //   freq: 250
  // });
  
  // proximity2.on("change", function(){
  //   const {centimeters} = proximity2;
  //   if(centimeters > 0 ){
  //     if(centimeters < 10){
  //         piezo.play({
  //             song: "B B B B - - B B B B - - B B B B - - B B B B - - B B B B",
  //             beats: 1 / 4,
  //             tempo: 150
  //         });
  //     } if(centimeters >= 10 && centimeters < 30 ){
  //         piezo.play({
  //             song: "F F F F - - F F F F - - F F F F - - F F F F - - F F F F",
  //             beats: 1 / 4,
  //             tempo: 150
  //         });
  //     } 
  //   }
  //   io.sockets.emit('proximity2', centimeters);
  //   console.log("Proximity2: ");
  //   console.log("  cm  : ", centimeters);
  //   console.log("-----------------");
  // });

  // /* Definicion de la variable y asignación del pin que controlara
  //  * el sensor de proximidad superior
  //  */
  // var proximity3 = new five.Proximity({
  //   controller: "HCSR04",
  //   pin: "A4",
  //   freq: 250
  // });

  // proximity3.on("change", function(){
  //   const {centimeters} = proximity3;
  //   if(centimeters > 0 ){
  //     if(centimeters < 10){
  //         piezo.play({
  //             song: "B B B B - - B B B B - - B B B B - - B B B B - - B B B B",
  //             beats: 1 / 4,
  //             tempo: 150
  //         });
  //     } if(centimeters >= 10 && centimeters < 30 ){
  //         piezo.play({
  //             song: "F F F F - - F F F F - - F F F F - - F F F F - - F F F F",
  //             beats: 1 / 4,
  //             tempo: 150
  //         });
  //     } 
  //   }
  //   io.sockets.emit('proximity3', centimeters);
  //   console.log("Proximity3: ");
  //   console.log("  cm  : ", centimeters);
  //   console.log("-----------------");
  // });



  /* Definicion de la variables y asignación de los pines que controlan los motores */
    var speed, commands, motors;
    motors = {
        a: new five.Motor([3, 12]),
        b: new five.Motor([11, 13])
    };

    commands = null;
    speed = 255;

    /* Definicion de las variables y asignación de los pines que controlaran 
     * los faros delanteros y traseros
     */

    var farosDelan = new five.Pin({ 
        pin: 2
    })
  
    var farosTras = new five.Pin({ 
        pin: 4
    })

    //definicion de la variable y asignación del pin que controlara el servomotor
    var servo= new five.Servo(5);
    board.repl.inject({
        servo: servo
    });
  
    /* Definicion de la variable y asignación del pin que controlara el sensor
     * que mide la cantidad de luz
    */
    // var lightSensor = new five.Sensor({
    //     pin: "A3",
    //     freq: 1000
    // });

    io.on('connection', function (socket) {
        socket.on('start', function () {
            speed = 255;
            motors.a.fwd(speed);
            motors.b.fwd(speed);
        });

        socket.on('reverse', function () {
            speed = 255;
            motors.a.rev(speed);
            motors.b.rev(speed);
        });

        socket.on('left', function () {
            var aSpeed = 120;
            var bSpeed = 50;
            motors.b.fwd(bSpeed);
            motors.a.rev(aSpeed);
        });

        socket.on('right', function () {
            var aSpeed = 50;
            var bSpeed = 120;
            motors.b.rev(bSpeed);
            motors.a.fwd(aSpeed);
        });

        socket.on('stop', function () {
            motors.a.stop();
            motors.b.stop();
        });

        socket.on('farosOn', function(){
            farosDelan.high();
            farosTras.high();
        });

        socket.on('farosOff',function (){
            farosDelan.low();
            farosTras.low();
        });

        socket.on('servo', function(){
            servo.sweep();
        });
      });
});