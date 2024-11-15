let formato24 = false;

function updateDateTime() {
    const now = new Date();
    const days = ['Diumenge', 'Dilluns', 'Dimarts', 'Dimecres', 'Dijous', 'Divendres', 'Dissabte'];

    let hour = now.getHours();
    const minute = now.getMinutes().toString().padStart(2, '0');
    const second = now.getSeconds().toString().padStart(2, '0');
    let ampm = '';

    if(!formato24){
        ampm = hour >= 12 ? 'PM' : 'AM';
        hour = hour % 12 || 12;
    }

    hour = hour.toString().padStart(2, '0');
    const day = days[now.getDay()];
    const date = now.getDate();
    const month = now.getMonth() + 1;
    const year = now.getFullYear();

    const dateTimeString = `${hour}:${minute}:${second} ${ampm} ${day} \n ${date}/${month}/${year}`;

    document.getElementById('datetime').textContent = dateTimeString;
}

document.getElementById('datetime').addEventListener('dblclick', () => {
    formato24 = !formato24;
    updateDateTime();
});

setInterval(updateDateTime, 1000);
updateDateTime(); // Inicializar al cargar la página
