const express = require('express');
const app = express();
const io = require('socket.io')(app.listen(8081));
const five = require('johnny-five');

app.use(express.static(__dirname + '/app'));

app.get('/', function (req,res) {
    res.sendFile(__dirname + '/index.html');
});


const board = new five.Board({
    repl:false
});

board.on('ready', function () {
    let speed, commands, motors;
    const anode = new five.Led.RGB({
        pins: {
            red: 9,
            green: 11,
            blue: 10
        },
        isAnode: true
    });

    commands = null;

    anode.on();
    anode.color("#d260ff");

    anode.blink(1000);

    var blink = true;
    console.log("aqui");
    io.on('connection', function (socket) {
        socket.on('azul', function (){
            anode.on();
            anode.color("#3366CC");
            console.log('AZUL');
        });

        socket.on('verde', function (){
            anode.on();
            anode.color("#009900");
            console.log('VERDE');
        });

        socket.on('rojo', function (){
            anode.on();
            anode.color("#FF0000");
            console.log('ROJO');
        });

        socket.on('stop', function (){
            if (blink){
                anode.stop(); // to stop blinking
                blink = false;
                console.log('STOP');
            }
            else{
                anode.blink(1000);
                blink = true;
                console.log('BLINK');
            }
        });

        socket.on('off', function (){
            anode.off();  // to shut it off (stop doesn't mean "off")
            console.log('OFF');
        });

        socket.on('on', function (){
            anode.on(); // to turn on, but not blink
            console.log('ON');
        });
    console.log("final");
    });
});
