function notificationManager(){

    let inputs = document.getElementsByClassName("notification");

    setTimeout(function(){
        for (let i = 0; i < inputs.length; i++) {
            inputs[i].remove();
        }
    },5000)
}

