!function(e){var t={};function n(r){if(t[r])return t[r].exports;var l=t[r]={i:r,l:!1,exports:{}};return e[r].call(l.exports,l,l.exports,n),l.l=!0,l.exports}n.m=e,n.c=t,n.d=function(e,t,r){n.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:r})},n.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},n.t=function(e,t){if(1&t&&(e=n(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var r=Object.create(null);if(n.r(r),Object.defineProperty(r,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var l in e)n.d(r,l,function(t){return e[t]}.bind(null,l));return r},n.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return n.d(t,"a",t),t},n.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},n.p="",n(n.s=0)}([function(e,t){var n=null,r=null,l=null,i=null,o=null,u=-1,a=-1;function d(){var e=(o=l.querySelector("img")).offsetWidth,t=o.offsetHeight,n=e/t;e>u&&(t=(e=u)/n),t>a&&(e=(t=a)*n),o.style.width=e+"px",o.style.height=t+"px",i.style.marginLeft=-e/2+"px",i.style.marginTop=-t/2+"px"}!function(){n=document.querySelectorAll(".post-video"),r=document.querySelectorAll(".post-gallery > .gallery-item, .zoomable-image"),null!==(l=document.querySelector(".gallery-popup"))&&(i=l.querySelector(".gallery-popup-content"));u=window.innerWidth-176,a=window.innerHeight-88;for(var e=0;e<n.length;e++){var t=n[e],c=t.parentElement.offsetWidth,s=t.getElementsByTagName("iframe");s.length<1||((s=s[0]).style.width=c+"px",s.style.height=c/1.777777+"px")}var f=function(e){var t=r[e],n=t.getAttribute("data-image");t.addEventListener("click",function(){if(null!==i){for(;i.firstElementChild;)i.removeChild(i.firstElementChild);var e=document.createElement("img"),t=new Image;e.src="/assets/loader.svg",t.src=n,t.onload=function(){i.removeChild(i.firstElementChild),o=t,i.appendChild(t),d()},o=e,i.appendChild(e),l.classList.add("visible"),e.addEventListener("load",function(){return d()})}})};for(e=0;e<r.length;e++)f(e);null!==i&&i.addEventListener("click",function(){return l.classList.remove("visible")});var g=document.querySelector(".header-slider");if(null!==g){var v=g.querySelectorAll(".header-slider-description"),m=g.querySelector(".slider-navigation-forward"),p=g.querySelector(".slider-navigation-previous"),y=0;function h(e){for(var t=0;t<v.length;t++)if(t!==e)v[t].classList.add("hidden");else{v[t].classList.remove("hidden");var n=v[t].getAttribute("data-background");g.style.backgroundImage="url("+n+")"}}null!==p&&null!==m&&(m.addEventListener("click",function(){++y>=v.length&&(y=0),h(y)}),p.addEventListener("click",function(){--y<0&&(y=v.length-1),h(y)})),setInterval(function(){m.click()},5e3);var b=v[0].getAttribute("data-background");g.style.backgroundImage="url("+b+")"}var S=document.querySelector(".hamburger-menu"),E=document.querySelector(".header-navigation ul");S.addEventListener("click",function(){E.classList.toggle("visible")})}()}]);