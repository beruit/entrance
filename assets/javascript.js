function CountDown(){
    var today =new Date();
    var hrs = today.getHours();
    hrs = (hrs<12) ? hrs:(hrs-12);
    var min = today.getMinutes();
    var sec = today.getSeconds();
    hrs = (hrs<10) ? "0"+hrs:hrs;
    min = (min<10) ? "0"+min:min;
    sec = (sec<10) ? "0"+sec:sec;
    document.getElementById('hrs').innerHTML = hrs;
    document.getElementById('min').innerHTML = min;
    document.getElementById('sec').innerHTML = sec;
    setTimeout(CountDown,1000);



}


