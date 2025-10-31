function registerDisabler(checkbox) {
    const inputs = document.getElementsByClassName("factureInput");
    for (let i = 0; i < inputs.length; i++) {
        if (checkbox.checked) {
            inputs[i].setAttribute("disabled", "true");
        } else {
            inputs[i].removeAttribute("disabled");
        }
    }
}
