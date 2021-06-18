/*en este fichero se recogen los eventos que se realizan 
 * en index.html y segun cual sea emite una señal concreta
 */

var socket = io();

function moveForward(){
    socket.emit('start');
    console.log('stop');
}

function turnRight(){
    socket.emit('right');
    console.log('rigth');
}

function turnLeft(){
    socket.emit('left');
    console.log('left');
}

function moveReverse(){
    socket.emit('reverse');
    console.log('reverse');
}

function stop(){
    socket.emit('stop');
    console.log('start');
}

document.getElementById('forward').onclick = moveForward;
document.getElementById('right').onclick = turnRight;
document.getElementById('left').onclick = turnLeft;
document.getElementById('reverse').onclick = moveReverse;
document.getElementById('stop').onclick = stop;

document.getElementById('faros').onclick = faros;

var faros_cont = 0;
function faros() {
    faros_cont = faros_cont;
    if(faros_cont % 2 == 0) {
        socket.emit('farosOn');
        faros_cont = faros_cont + 1;
        document.getElementById('faros').style.backgroundColor = '#1b2437';

    } else {
        socket.emit('farosOff');
        faros_cont = faros_cont + 1;
        document.getElementById('faros').style.backgroundColor = '#00c0a5';
    } 
}

setInterval('servo()',1);

function servo() {
    socket.emit('servo');
}