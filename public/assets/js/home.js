document.getElementById('change-excuse').addEventListener('click', function() {
    fetch('/api/excuses/random')
        .then(function(response) {
            return response.json();
        })
        .then(function(excuse) {
            document.getElementById('excuse-code').textContent = excuse.http_code + ' — ' + excuse.tag;
            document.getElementById('excuse-message').textContent = excuse.message;
        });
});