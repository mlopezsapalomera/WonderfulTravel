const base_url = window.location.origin + window.location.pathname.substring(0, window.location.pathname.lastIndexOf('/'));

export const imagenesPaises = {
    // África (continent_id: 1)
    1: `${base_url}/img/paises/nigeria.jpg`,
    2: `${base_url}/img/paises/sudafrica.jpg`,
    3: `${base_url}/img/paises/egipto.jpg`,
    
    // América del Norte (continent_id: 2)
    4: `${base_url}/img/paises/eeuu.jpg`,
    5: `${base_url}/img/paises/canada.jpg`,
    6: `${base_url}/img/paises/mexico.jpg`,
    
    // América del Sur (continent_id: 3)
    7: `${base_url}/img/paises/brasil.jpg`,
    8: `${base_url}/img/paises/argentina.jpg`,
    9: `${base_url}/img/paises/chile.jpg`,
    
    // Asia (continent_id: 5)
    13: `${base_url}/img/paises/china.jpg`,
    14: `${base_url}/img/paises/japon.jpg`,
    15: `${base_url}/img/paises/india.jpg`,
    
    // Europa (continent_id: 6)
    16: `${base_url}/img/paises/francia.jpg`,
    17: `${base_url}/img/paises/alemania.jpg`,
    18: `${base_url}/img/paises/italia.jpg`,
    
    // Oceanía (continent_id: 7)
    10: `${base_url}/img/paises/australia.jpg`,
    11: `${base_url}/img/paises/nueva-zelanda.jpg`,
    12: `${base_url}/img/paises/fiyi.jpg`
};