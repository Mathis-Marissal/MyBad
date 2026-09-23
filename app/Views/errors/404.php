<div class="container error-page">
    <h1>404</h1>
    <p>Cette page n'existe pas... un peu comme les excuses valables de certains devs.</p>
    <img src="/assets/img/404.gif" alt="404 introuvable">
    <p>Retour à l'accueil dans <span id="countdown">5</span> secondes...</p>
    <a href="/" class="btn">Retour à l'accueil</a>
</div>

<script>
    let seconds = 5;
    const countdown = document.getElementById('countdown');

    setInterval(function() {
        seconds--;
        countdown.textContent = seconds;
    }, 1000);

    setTimeout(function() {
        window.location.href = '/';
    }, 5000);
</script>
