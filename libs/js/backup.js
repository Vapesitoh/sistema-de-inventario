const cards = document.querySelectorAll('.card');

    cards.forEach(card => {
        card.addEventListener('mouseover', () => {
            card.style.transform = 'scale(1.1)';
        });

        card.addEventListener('mouseout', () => {
            card.style.transform = 'scale(1)';
        });
    });

    function updateFileName() {
        var archivo_respaldo = document.getElementById("archivo_respaldo");
        var nombre_respaldo = document.getElementById("nombre_respaldo");
        nombre_respaldo.value = archivo_respaldo.files[0].name;
    }
    