const carousel = document.querySelector('.carousel');
const prevButton = document.querySelector('.prev');
const nextButton = document.querySelector('.next');
const imagesBox = document.querySelector('.carousel-images');
const images = document.querySelectorAll('.carousel-images img');
const carouselSection = document.querySelector('#carousel-section');

let counter = 0;

// Click on the buttons
prevButton.addEventListener('click', () => {
  counter--;
  if (counter < 0) {
    counter = images.length - 1;
  }
  carousel.querySelector('.carousel-images').style.transform = `translateX(-${counter * 100}%)`;
});
nextButton.addEventListener('click', () => {
  counter++;
  if (counter >= images.length) {
    counter = 0;
  }
  carousel.querySelector('.carousel-images').style.transform = `translateX(-${counter * 100}%)`;
});

// Move with touch and mouse
imagesBox.addEventListener('mousedown', startTouch);
imagesBox.addEventListener('mouseup', endTouch);
imagesBox.addEventListener('mousemove', moveTouch);
imagesBox.addEventListener('mouseleave', endTouch);

imagesBox.addEventListener('touchstart', startTouch);
imagesBox.addEventListener('touchend', endTouch);
imagesBox.addEventListener('touchmove', moveTouch);


let isDragging = false;
let initialX;
let currentX;

function startTouch(e) {
  initialX = e.touches ? e.touches[0].clientX : e.clientX;
  isDragging = true;
}

function moveTouch(e) {
  // if imageBox is clicked
  if (isDragging){
    currentX = e.touches ? e.touches[0].clientX : e.clientX;
    // Mettre à jour position de l'image en fonction de la position de la souris
    for (let i = 0; i < images.length; i++) {
      carousel.querySelector('.carousel-images').style.transform = `translateX(-${counter * 100 + (initialX - currentX) / 10}%)`;
    }
  }
}

function endTouch(e) {
  if (currentX && isDragging) {
    if (initialX > currentX) {
      nextButton.click();
    } else {
      prevButton.click();
    }
  }
  isDragging = false;
}

// Removal of drag and drop for image buttons
function preventImageDrag(event) {
    event.preventDefault();
}
carousel.addEventListener('dragstart', preventImageDrag);

// Rotate the carousel automatically
if (!isDragging) {
  setInterval(() => {
    nextButton.click();
  }, 10000);
}

// Recover color at image ends
function transitionStartHandler() {
  // Supprimez l'écouteur d'événement après l'exécution
  imagesBox.removeEventListener('transitionstart', transitionStartHandler);

  const imageShown = images[counter];
  const canvas = document.createElement('canvas');
  const ctx = canvas.getContext('2d');

  // Dessinez l'image sur le canvas
  ctx.drawImage(imageShown, 0, 0);

  // Obtenez les couleurs aux bords gauche et droit de l'image
  const imageData = ctx.getImageData(0, 0, canvas.width, canvas.height);
  const leftColor = getColorAtPixel(imageData);
  const rightColor = getColorAtPixel(imageData);

  // Définissez la couleur de fond de #carousel-section avec un dégradé linéaire
  // changement de linear gradient smooth
  carouselSection.style.background = `linear-gradient(to right, rgb(${leftColor.join(', ')}), rgb(${rightColor.join(', ')}))`;
}

// Ajoutez l'écouteur d'événement de début de transition
imagesBox.addEventListener('transitionstart', () => {
  transitionStartHandler();
});
// Déplacez la fonction getColorAtPixel à l'intérieur de transitionStartHandler si elle n'est pas utilisée ailleurs
function getColorAtPixel(imageData) {
  const data = imageData.data;
  const colors = [data[0], data[1], data[2], data[3]];
  // Print in hexa the color
  return colors;
}

// When image are loaded, transitionStartHandler()
images.forEach(image => {
  image.addEventListener('load', transitionStartHandler);
});