document.addEventListener('DOMContentLoaded', () => {
    // Cargar continentes
    fetch('controlador/ajax-handler.php?action=ajaxContinents')
        .then(response => response.json())
        .then(data => {
            if (data.error) {
                console.error('Error:', data.error);
                return;
            }
            const continentSelect = document.querySelector('select[name="continent"]');
            data.forEach(continent => {
                const option = document.createElement('option');
                option.value = continent.id;
                option.textContent = continent.nom_continent;
                continentSelect.appendChild(option);
            });
        })
        .catch(error => console.error('Error:', error));
    
    // Cargar países al seleccionar un continente
    document.getElementById('continent').addEventListener('change', (event) => {
        const continentId = event.target.value;
        const paisSelect = document.getElementById('pais');
        paisSelect.innerHTML = '<option value="">-- Selecciona el país --</option>';
        document.getElementById('preu').value = '';  // Limpiar campo de precio

        if (continentId) {
            paisSelect.disabled = false;
            fetch(`controlador/ajax-handler.php?action=ajaxCountries&continent_id=${continentId}`)
                .then(response => response.json())
                .then(data => {
                    data.forEach(pais => {
                        const option = document.createElement('option');
                        option.value = pais.id;
                        option.textContent = pais.nom_pais;
                        paisSelect.appendChild(option);
                    });
                })
                .catch(error => console.error('Error:', error));
        } else {
            paisSelect.disabled = true;
        }
    });

    // Mostrar el precio al seleccionar un país
    document.getElementById('pais').addEventListener('change', (event) => {
        const paisId = event.target.value;
        if (paisId) {
            fetch(`controlador/ajax-handler.php?action=ajaxPrice&pais_id=${paisId}`)
                .then(response => response.json())
                .then(data => {
                    if (data && data.preu) {
                        document.getElementById('preu').value = data.preu;
                    }
                })
                .catch(error => console.error('Error:', error));
        } else {
            document.getElementById('preu').value = '';
        }
    });
    // njdinvjeinvjewnvjiewnjnfijewn
});
