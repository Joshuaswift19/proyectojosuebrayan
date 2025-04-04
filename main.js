import config from 'config';

document.addEventListener('DOMContentLoaded', () => {
    // Initialize map
    var map = L.map('map').setView(config.mapCenter, config.mapZoom);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    // Add a marker (example)
    L.marker(config.mapCenter).addTo(map)
        .bindPopup('¡Estamos aquí!')
        .openPopup();

    // Coverage verification
    document.getElementById('verificar-cobertura').addEventListener('click', function () {
        const direccion = document.getElementById('direccion').value;
        if (direccion) {
            // Simulate coverage check (replace with actual API call)
            setTimeout(() => {
                Swal.fire({
                    title: '¡Cobertura Confirmada!',
                    text: `¡Felicidades! Tenemos cobertura en ${direccion}.`,
                    icon: 'success',
                    confirmButtonText: 'Contratar ahora'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '#planes'; // Redirect to plans section
                    }
                });
            }, 1000); // Simulate API delay
        } else {
            Swal.fire({
                title: 'Error',
                text: 'Por favor, ingresa tu dirección.',
                icon: 'error',
                confirmButtonText: 'Ok'
            });
        }
    });

    // WhatsApp button functionality (it's already a link, no JS needed for basic functionality)

    // Popup functionality
    const popup = document.getElementById('popup');
    const closeButton = document.querySelector('.close-button');

    // Show popup after 3 seconds
    setTimeout(() => {
        popup.style.display = 'flex';
    }, 3000);

    closeButton.addEventListener('click', () => {
        popup.style.display = 'none';
    });

    // Close popup if clicked outside the content
    window.addEventListener('click', (event) => {
        if (event.target == popup) {
            popup.style.display = 'none';
        }
    });

    //Form submission
    const contactForm = document.querySelector('.contact-form');
    contactForm.addEventListener('submit', function (event) {
        event.preventDefault(); // Prevent actual form submission
        Swal.fire({
            title: '¡Mensaje Enviado!',
            text: 'Gracias por contactarnos.  Te responderemos a la brevedad.',
            icon: 'success',
            confirmButtonText: 'Ok'
        });
        contactForm.reset(); // Clear the form
    });
});

