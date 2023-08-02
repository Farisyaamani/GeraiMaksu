const openButton = document.getElementById('openButton');
const overlay = document.getElementById('overlay');
const closeButton = document.getElementById('closeButton');

openButton.addEventListener('click', () => {
    overlay.style.display = 'flex';
});

closeButton.addEventListener('click', () => {
    overlay.style.display = 'none';
});