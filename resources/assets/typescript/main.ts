let videos = null;
let photos = null;
let galleryPopup:any = null;
let galleryPopupContent:any = null;
let popupImage = null;
let maxPopupImageWidth = -1;
let maxPopupImageHeight = -1;
const maxPopupImageOffset = 100;

function makeGalleryPopupContentCentered() {
  popupImage = galleryPopup.querySelector('img');
  let imageWidth = popupImage.offsetWidth;
  let imageHeight = popupImage.offsetHeight;

  const aspectRatio = imageWidth / imageHeight;

  if (imageWidth > maxPopupImageWidth) {
    imageWidth = maxPopupImageWidth;
    imageHeight = imageWidth / aspectRatio;
  }

  if (imageHeight > maxPopupImageHeight) {
    imageHeight = maxPopupImageHeight;
    imageWidth = imageHeight * aspectRatio;
  }

  popupImage.style.width = imageWidth + 'px';
  popupImage.style.height = imageHeight + 'px';

  galleryPopupContent.style.marginLeft = -imageWidth / 2 + 'px';
  galleryPopupContent.style.marginTop = -imageHeight / 2 + 'px';

}

(function () {
  videos = document.querySelectorAll('.post-video');
  photos = document.querySelectorAll('.post-gallery > .gallery-item, .zoomable-image');
  galleryPopup = document.querySelector('.gallery-popup');
  if (galleryPopup !== null) {
    galleryPopupContent = galleryPopup.querySelector('.gallery-popup-content');
  }
  const videoAspectRatio = 1.777777;

  maxPopupImageWidth = window.innerWidth - 88 * 2; // 88 - left and right paddings
  maxPopupImageHeight = window.innerHeight - 44 * 2; // 88 - left and right paddings

  for (let i = 0; i < videos.length; i++) {
    const video = videos[i];
    const videoParentWidth = video.parentElement.offsetWidth;
    let videoFrame: any = video.getElementsByTagName("iframe");
    if (videoFrame.length < 1) {
      continue;
    }
    videoFrame = videoFrame[0];
    videoFrame.style.width = videoParentWidth + 'px';
    videoFrame.style.height = (videoParentWidth / videoAspectRatio) + 'px';
  }

  for (let i = 0; i < photos.length; i++) {
    const photo = photos[i];
    const fullImageUrl = photo.getAttribute('data-image');
    photo.addEventListener('click', () => {
      if (galleryPopupContent === null) {
        return;
      }
      while (galleryPopupContent.firstElementChild) {
        galleryPopupContent.removeChild(galleryPopupContent.firstElementChild);
      }

      const imageTag = document.createElement('img');
      const image = new Image();
      imageTag.src = '/assets/loader.svg';
      image.src = fullImageUrl;
      image.onload = () => {
        galleryPopupContent.removeChild(galleryPopupContent.firstElementChild);
        popupImage = image;
        galleryPopupContent.appendChild(image);
        makeGalleryPopupContentCentered();
      };
      popupImage = imageTag;

      galleryPopupContent.appendChild(imageTag);
      galleryPopup.classList.add('visible');

      imageTag.addEventListener('load', () => makeGalleryPopupContentCentered());
    });
  }

  if (galleryPopupContent !== null) {
    galleryPopupContent.addEventListener('click', () => galleryPopup.classList.remove('visible'));
  }

  const headerSlider = document.querySelector('.header-slider');

  if (headerSlider !== null) {
    const elements = headerSlider.querySelectorAll('.header-slider-description');
    const sliderButtonForward = headerSlider.querySelector('.slider-navigation-forward');
    const sliderButtonBackward = headerSlider.querySelector('.slider-navigation-previous');

    let currentSliderElement = 0;

    function hideAllElementExpect(expect) {
      for (let i = 0; i < elements.length; i++) {
        if (i !== expect) {
          elements[i].classList.add('hidden');
        } else {
          elements[i].classList.remove('hidden');
          const backgroundImage = elements[i].getAttribute('data-background');
          (headerSlider as HTMLElement).style.backgroundImage = 'url(' + backgroundImage + ')';
        }
      }
    }

    if (sliderButtonBackward !== null && sliderButtonForward !== null) {
      sliderButtonForward.addEventListener('click', () => {
        currentSliderElement++;
        if (currentSliderElement >= elements.length) {
          currentSliderElement = 0;
        }
        hideAllElementExpect(currentSliderElement);
      });

      sliderButtonBackward.addEventListener('click', () => {
        currentSliderElement--;
        if (currentSliderElement < 0) {
          currentSliderElement = elements.length - 1;
        }
        hideAllElementExpect(currentSliderElement);
      });
    }

    setInterval(() => {
      (sliderButtonForward as HTMLDivElement).click();
    }, 5000);

    const backgroundImage = elements[0].getAttribute('data-background');
    (headerSlider as HTMLElement).style.backgroundImage = 'url(' + backgroundImage + ')';
  }

  const hamburgerMenu = document.querySelector('.hamburger-menu');
  const headerMenu = document.querySelector('.header-navigation ul');
  hamburgerMenu.addEventListener('click', () => {
    headerMenu.classList.toggle('visible');
  });

})();