window.addEventListener('load', function() {
    const searchBtn = document.getElementById('search-btn');
    const searchInput = document.getElementById('search-input');
    const resultDiv = document.getElementById('result');

    searchBtn.addEventListener('click', function() {
        const query = searchInput.value.trim();
        const url = 'superheroes.php?query=' + encodeURIComponent(query);

        fetch(url)
            .then(response => response.text())
            .then(data => {
                resultDiv.innerHTML = data;
            })
            .catch(error => {
                console.error('Error fetching data:', error);
            });
    });
});