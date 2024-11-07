function updateDateTime() {
    const now = new Date();
    const days = ['Diumenge', 'Dilluns', 'Dimarts', 'Dimecres', 'Dijous', 'Divendres', 'Dissabte'];

    let hour = now.getHours();
    const minute = now.getMinutes().toString().padStart(2, '0');
    const second = now.getSeconds().toString().padStart(2, '0');
    const ampm = hour >= 12 ? 'PM' : 'AM';
    hour = hour % 12 || 12; // Convertir el formato 24 horas a 12 horas
    hour = hour.toString().padStart(2, '0'); // Añadir cero si es necesario

    const day = days[now.getDay()];
    const date = now.getDate();
    const month = now.getMonth() + 1; // Los meses en JavaScript son base 0, por eso sumamos 1
    const year = now.getFullYear();

    const dateTimeString = `${hour}:${minute}:${second} ${ampm} ${day} ${'\n'} ${date}/${month}/${year}`;

    document.getElementById('datetime').textContent = dateTimeString;
}

// Actualizar cada segundo
setInterval(updateDateTime, 1000);
updateDateTime(); // Inicializar al cargar la página
