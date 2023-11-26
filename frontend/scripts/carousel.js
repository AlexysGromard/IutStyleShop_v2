const carousel = document.querySelector('.carousel');
const prevButton = document.querySelector('.prev');
const nextButton = document.querySelector('.next');
const imagesBox = document.querySelector('.carousel-images');
const images = document.querySelectorAll('.carousel-images img');
const imageHyperlinks = document.querySelectorAll('.carousel-images a');
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

/**
 * Get the initial position of the mouse or touch
 * @param {*} e mouse or touch event 
 */
function startTouch(e) {
  initialX = e.touches ? e.touches[0].clientX : e.clientX;
  isDragging = true;
}

/**
 * Move the carousel with the mouse or touch
 * @param {*} e  mouse or touch event
 */
function moveTouch(e) {
  // if imageBox is clicked
  if (isDragging){
    currentX = e.touches ? e.touches[0].clientX : e.clientX;
    // Update image position based on mouse position
    for (let i = 0; i < images.length; i++) {
      carousel.querySelector('.carousel-images').style.transform = `translateX(-${counter * 100 + (initialX - currentX) / 10}%)`;
    }
    isClickable(false)
  }
}

/**
 * Set the clickable state of the carousel
 * @param {*} state true or false
 */
function isClickable(state) {
  if (state === false) {
    imageHyperlinks.forEach(imageHyperlink => {
      imageHyperlink.style.pointerEvents = "none";
    });
  } else {
    imageHyperlinks.forEach(imageHyperlink => {
      imageHyperlink.style.pointerEvents = "auto";
    });
  }
}

/**
 * Move the carousel at the end of the mouse or touch event
 * @param {*} e  mouse or touch event
 */
function endTouch(e) {
  if (currentX && isDragging) {
    if (initialX > currentX) {
      nextButton.click();
    } else {
      prevButton.click();
    }
  }
  isClickable(true)
  isDragging = false;
}

/**
 * Prevent the drag of the image when the carousel is moving
 * @param {*} event mouse or touch event
 */
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

/**
 * Change the background color around the carousel
 */
function transitionStartHandler() {
  // Remove event listener after execution
  imagesBox.removeEventListener('transitionstart', transitionStartHandler);

  const imageShown = images[counter];
  const canvas = document.createElement('canvas');
  const ctx = canvas.getContext('2d');

  // Draw the image on the canvas
  ctx.drawImage(imageShown, 0, 0);

  // Get the colors at the left and right edges of the image
  const imageData = ctx.getImageData(0, 0, canvas.width, canvas.height);
  const leftColor = getColorAtPixel(imageData);
  const rightColor = getColorAtPixel(imageData);

  // Set the background color of #carousel-section with a linear gradient
  carouselSection.style.background = `linear-gradient(to right, rgb(${leftColor.join(', ')}), rgb(${rightColor.join(', ')}))`;
}

// Add the transition start event listener
imagesBox.addEventListener('transitionstart', () => {
  transitionStartHandler();
});
/**
 * Get the color of the pixel at the left and right of the image
 * @param {*} imageData 
 * @returns colors
 */
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

// When image move, delete the click event on <a>
imageHyperlinks.forEach(imageHyperlink => {
  imageHyperlink.addEventListener('click', (e) => {
    // If the cursor is moving, prevent the link from opening
    if (isDragging){
      e.stopPropagation();
    }
  });
});