function registerDisabler(checkbox){
    if(checkbox.checked == true){
        let input = document.getElementsByClassName("factureInput");
        for(key in input){
            input[key].setAttribute("disabled", "true");
        }
    } else{
        let input = document.getElementsByClassName("factureInput");
        for(key in input){
            input[key].removeAttribute("disabled");
        }
    }
}