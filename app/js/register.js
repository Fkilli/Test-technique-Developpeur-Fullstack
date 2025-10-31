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

function passwordToggle() {
  var x = document.getElementById("togglePassword");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
} 

function notificationManager(){

    let inputs = document.getElementsByClassName("notification");

    setTimeout(function(){
        for (let i = 0; i < inputs.length; i++) {
            inputs[i].remove();
        }
    },5000)
}

document.getElementById('registerForm').addEventListener('submit', function(e) {
  e.preventDefault();

  const formData = new FormData(document.getElementById('registerForm'));
  formData.append('validateRegister', '1');

  fetch('./app/controllers/register.php', {
      method: 'POST',
      body: formData
  })
    .then(response => {
        if (!response.ok) {
            throw new Error('Erreur HTTP : ' + response.status);
        }
        return response.text();
        })
        .then(data => {
            document.getElementById('message').innerHTML = data;
            notificationManager();
        })
        .catch(error => {
        console.error('Erreur :', error);
        document.getElementById('message').textContent = 'Une erreur est survenue.';
        });
});
