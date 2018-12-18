/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = "./resources/assets/typescript/main.ts");
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/assets/typescript/main.ts":
/*!*********************************************!*\
  !*** ./resources/assets/typescript/main.ts ***!
  \*********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("var videos = null;\nvar photos = null;\nvar galleryPopup = null;\nvar galleryPopupContent = null;\nvar popupImage = null;\nvar maxPopupImageWidth = -1;\nvar maxPopupImageHeight = -1;\nvar maxPopupImageOffset = 100;\nfunction makeGalleryPopupContentCentered() {\n    popupImage = galleryPopup.querySelector('img');\n    var imageWidth = popupImage.offsetWidth;\n    var imageHeight = popupImage.offsetHeight;\n    var aspectRatio = imageWidth / imageHeight;\n    if (imageWidth > maxPopupImageWidth) {\n        imageWidth = maxPopupImageWidth;\n        imageHeight = imageWidth / aspectRatio;\n    }\n    if (imageHeight > maxPopupImageHeight) {\n        imageHeight = maxPopupImageHeight;\n        imageWidth = imageHeight * aspectRatio;\n    }\n    popupImage.style.width = imageWidth + 'px';\n    popupImage.style.height = imageHeight + 'px';\n    galleryPopupContent.style.marginLeft = -imageWidth / 2 + 'px';\n    galleryPopupContent.style.marginTop = -imageHeight / 2 + 'px';\n}\n(function () {\n    videos = document.querySelectorAll('.post-video');\n    photos = document.querySelectorAll('.post-gallery > .gallery-item, .zoomable-image');\n    galleryPopup = document.querySelector('.gallery-popup');\n    if (galleryPopup !== null) {\n        galleryPopupContent = galleryPopup.querySelector('.gallery-popup-content');\n    }\n    var videoAspectRatio = 1.777777;\n    maxPopupImageWidth = window.innerWidth - 88 * 2; // 88 - left and right paddings\n    maxPopupImageHeight = window.innerHeight - 44 * 2; // 88 - left and right paddings\n    for (var i = 0; i < videos.length; i++) {\n        var video = videos[i];\n        var videoParentWidth = video.parentElement.offsetWidth;\n        var videoFrame = video.getElementsByTagName(\"iframe\");\n        if (videoFrame.length < 1) {\n            continue;\n        }\n        videoFrame = videoFrame[0];\n        videoFrame.style.width = videoParentWidth + 'px';\n        videoFrame.style.height = (videoParentWidth / videoAspectRatio) + 'px';\n    }\n    var _loop_1 = function (i) {\n        var photo = photos[i];\n        var fullImageUrl = photo.getAttribute('data-image');\n        photo.addEventListener('click', function () {\n            if (galleryPopupContent === null) {\n                return;\n            }\n            while (galleryPopupContent.firstElementChild) {\n                galleryPopupContent.removeChild(galleryPopupContent.firstElementChild);\n            }\n            var imageTag = document.createElement('img');\n            var image = new Image();\n            imageTag.src = '/assets/loader.svg';\n            image.src = fullImageUrl;\n            image.onload = function () {\n                galleryPopupContent.removeChild(galleryPopupContent.firstElementChild);\n                popupImage = image;\n                galleryPopupContent.appendChild(image);\n                makeGalleryPopupContentCentered();\n            };\n            popupImage = imageTag;\n            galleryPopupContent.appendChild(imageTag);\n            galleryPopup.classList.add('visible');\n            imageTag.addEventListener('load', function () { return makeGalleryPopupContentCentered(); });\n        });\n    };\n    for (var i = 0; i < photos.length; i++) {\n        _loop_1(i);\n    }\n    if (galleryPopupContent !== null) {\n        galleryPopupContent.addEventListener('click', function () { return galleryPopup.classList.remove('visible'); });\n    }\n    var headerSlider = document.querySelector('.header-slider');\n    if (headerSlider !== null) {\n        var elements_1 = headerSlider.querySelectorAll('.header-slider-description');\n        var sliderButtonForward_1 = headerSlider.querySelector('.slider-navigation-forward');\n        var sliderButtonBackward = headerSlider.querySelector('.slider-navigation-previous');\n        var currentSliderElement_1 = 0;\n        function hideAllElementExpect(expect) {\n            for (var i = 0; i < elements_1.length; i++) {\n                if (i !== expect) {\n                    elements_1[i].classList.add('hidden');\n                }\n                else {\n                    elements_1[i].classList.remove('hidden');\n                    var backgroundImage_1 = elements_1[i].getAttribute('data-background');\n                    headerSlider.style.backgroundImage = 'url(' + backgroundImage_1 + ')';\n                }\n            }\n        }\n        if (sliderButtonBackward !== null && sliderButtonForward_1 !== null) {\n            sliderButtonForward_1.addEventListener('click', function () {\n                currentSliderElement_1++;\n                if (currentSliderElement_1 >= elements_1.length) {\n                    currentSliderElement_1 = 0;\n                }\n                hideAllElementExpect(currentSliderElement_1);\n            });\n            sliderButtonBackward.addEventListener('click', function () {\n                currentSliderElement_1--;\n                if (currentSliderElement_1 < 0) {\n                    currentSliderElement_1 = elements_1.length - 1;\n                }\n                hideAllElementExpect(currentSliderElement_1);\n            });\n        }\n        setInterval(function () {\n            sliderButtonForward_1.click();\n        }, 5000);\n        var backgroundImage = elements_1[0].getAttribute('data-background');\n        headerSlider.style.backgroundImage = 'url(' + backgroundImage + ')';\n    }\n    var hamburgerMenu = document.querySelector('.hamburger-menu');\n    var headerMenu = document.querySelector('.header-navigation ul');\n    hamburgerMenu.addEventListener('click', function () {\n        headerMenu.classList.toggle('visible');\n    });\n})();\n\n\n//# sourceURL=webpack:///./resources/assets/typescript/main.ts?");

/***/ })

/******/ });