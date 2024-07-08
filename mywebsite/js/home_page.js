function showAlert() {
    var alertDiv = document.getElementById('alertMessage');
    var alertContainer = document.getElementById('alertContainer');

    if (!localStorage.getItem('alertShown')) {
        alertDiv.style.display = 'block';

        setTimeout(function() {
            alertDiv.style.transition = 'opacity 1s ease-in-out';
            alertDiv.style.opacity = '0';

            setTimeout(function() {
                alertDiv.style.display = 'none';
                alertContainer.style.display = 'none';
            }, 1000);
        }, 2000);

        localStorage.setItem('alertShown', 'true');
    } else {
        alertContainer.style.display = 'none';
    }
}

showAlert();

function displayImage(input) {
    const preview = document.getElementById('imagePreview');
    const container = document.getElementById('imageContainer');

    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function (e) {
            container.style.display = 'block';
            preview.src = e.target.result;
        };
        reader.readAsDataURL(input.files[0]);
    }
}

function removeImage() {
    const preview = document.getElementById('imagePreview');
    const container = document.getElementById('imageContainer');
    const input = document.getElementById('uploadBtn');
    
    container.style.display = 'none';
    preview.src = '';
    input.value = '';
}

function openModal() {
    document.getElementById('editModal').style.display = 'block';
}

function closeModal() {
    document.getElementById('editModal').style.display = 'none';
}