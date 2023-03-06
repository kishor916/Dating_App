import './bootstrap';
import { Loader } from "@googlemaps/js-api-loader"

const loader = new Loader({
  apiKey: "AIzaSyDsDbf6HI9VCkiCZaR3udlrz8lslseyC5o",
  version: "weekly",
  ...additionalOptions,
});

loader.load().then(() => {
  map = new google.maps.Map(document.getElementById("map"), {
    center: { lat: -34.397, lng: 150.644 },
    zoom: 8,
  });
});

// owlCarousel part 
$('.testi10').owlCarousel({
    loop: true,
    margin: 30,
    nav: false,
    dots: false,
    autoplay: true,
    responsiveClass: true,
    responsive: {
      0: {
        items: 1

      },
      1650: {
        items: 1
      }
    }
  })

  // model section
  document.addEventListener("DOMContentLoaded", function() {
    var myModal = new bootstrap.Modal(document.getElementById('signupModal'), {
      keyboard: false
    });
  });
  
 
