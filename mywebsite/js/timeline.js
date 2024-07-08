document.addEventListener('DOMContentLoaded', function () {
    const popupTrigger = document.querySelectorAll('.popup-trigger');
    const popupImage = document.querySelector('.popup-image');
    const imagePopup = document.querySelector('.image-popup');

    popupTrigger.forEach(function (trigger) {
        trigger.addEventListener('click', function () {
            const imgUrl = this.getAttribute('src');
            popupImage.setAttribute('src', imgUrl);
            imagePopup.style.display = 'flex';
        });
    });

    imagePopup.addEventListener('click', function (event) {
        if (event.target.classList.contains('image-popup')) {
            imagePopup.style.display = 'none';
        }
    });
});

