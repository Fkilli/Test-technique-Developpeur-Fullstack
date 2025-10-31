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