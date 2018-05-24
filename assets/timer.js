countDown(8,"status");
function countDown(secs,elem){
    var element = document.getElementById(elem);
    element.innerHTML = "Time: "+secs+ " s";
    if(secs < 1){
        clearTimeout(timer);
        // element.innerHTML = '<br><br><h1 style="color:red;font-family:arial;">!! Test Completed !!</h1>';
        element.innerHTML += ' late than assigned Time!!';
        // CountDown();
    }
    secs--;
    var timer = setTimeout('countDown('+secs+',"'+elem+'")',1000);
    seconds= secs;
}



