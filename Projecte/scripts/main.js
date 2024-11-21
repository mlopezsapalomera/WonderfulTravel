import { ofertas } from './ofertas.js';
import './rellotge.js';

// Función para mostrar las ofertas
function mostrarOfertas() {
    console.log('Ofertas disponibles:', ofertas);
    // Aquí puedes agregar la lógica para mostrar las ofertas en el HTML
}

// Inicializar la aplicación
document.addEventListener('DOMContentLoaded', () => {
    mostrarOfertas();
});