document.getElementById('add-form').addEventListener('submit', function(event) {
    event.preventDefault();

    const formData = new FormData(this);
    const form = this;

    fetch('/api/excuses', {
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
                form.reset();
            } else {
                toast.textContent = data.error;
            }

            toast.classList.add('show');

            setTimeout(function() {
                toast.classList.remove('show');
            }, 3000);
        });
});
