document.addEventListener('DOMContentLoaded', () => {
    fetch('ajaxHandler.php?action=getContinents')
        .then(response => response.json())
        .then(data => {
            if (data.error) {
                console.error('Error:', data.error);
                return;
            }
            const select = document.querySelector('select[name="desti"]');
            data.forEach(continent => {
                const option = document.createElement('option');
                option.value = continent.id;
                option.textContent = continent.nombre;
                select.appendChild(option);
            });
        })
        .catch(error => console.error('Error:', error));
});