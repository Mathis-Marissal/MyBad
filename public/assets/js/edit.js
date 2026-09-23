document.getElementById('edit-form').addEventListener('submit', function(event) {
    event.preventDefault();

    const form = this;
    const httpCode = form.dataset.httpCode;
    const formData = new FormData(form);

    fetch('/api/excuses/' + httpCode, {
        method: 'POST',
        body: formData
    })
        .then(function(response) {
            return response.json();
        })
        .then(function(data) {
            const toast = document.getElementById('toast');

            if (data.success) {
                toast.textContent = data.message;
                toast.classList.add('show');

                // On laisse le temps de voir le toast, puis on retourne
                // vers la liste pour voir la modification appliquée
                setTimeout(function() {
                    window.location.href = '/excuses/all';
                }, 1200);
            } else {
                toast.textContent = data.error;
                toast.classList.add('show');

                setTimeout(function() {
                    toast.classList.remove('show');
                }, 3000);
            }
        });
});
