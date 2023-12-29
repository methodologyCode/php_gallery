document.addEventListener('DOMContentLoaded', function () {
    const photoList = document.getElementById('photoList');

    async function loadPhotos() {
        try {
            const response = await fetch('core.php', { method: 'GET' });
            const photos = await response.json();

            // Проверяем, что photos является массивом
            if (Array.isArray(photos)) {
                photos.forEach(photo => {
                    const img = document.createElement('img');
                    img.src = photo.filename;
                    img.alt = photo.description;
                    img.classList.add('photo');
                    photoList.appendChild(img);
                });
            } else {
                console.error('Invalid response format. Expected an array.');
            }
        } catch (error) {
            console.error('Error loading photos:', error);
        }
    }

    // Загружаем фотографии при загрузке страницы
    loadPhotos();

});

