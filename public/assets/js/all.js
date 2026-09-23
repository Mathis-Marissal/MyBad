// Rend toute la ligne du tableau cliquable vers la page de détail
// (sauf si on a cliqué sur un lien, ex: "Modifier", qui garde sa propre destination)
document.querySelectorAll('.excuses-table tbody tr').forEach(function(row) {
    row.addEventListener('click', function(event) {
        if (event.target.tagName === 'A') {
            return;
        }
        window.location.href = '/excuses/' + row.dataset.httpCode;
    });
});
