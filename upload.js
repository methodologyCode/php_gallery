document.addEventListener('DOMContentLoaded', function () {
    const uploadForm = document.getElementById('uploadForm');
    const uploadMessage = document.createElement('p');
    uploadForm.appendChild(uploadMessage);

    uploadForm.addEventListener('submit', async function (e) {
        e.preventDefault();

        const formData = new FormData(this);

        try {
            const response = await fetch('core.php', {
                method: 'POST',
                body: formData,
            });

            const data = await response.json();

            if (!data.photoId) {
                uploadMessage.textContent = 'Error uploading photo';
            }
                
            uploadMessage.textContent = 'Photo uploaded successfully!';

        } catch (error) {
            uploadMessage.textContent = 'Error uploading photo';
        }
    });
});


