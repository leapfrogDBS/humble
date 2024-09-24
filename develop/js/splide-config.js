document.addEventListener('DOMContentLoaded', function() {
    const splideElements = document.querySelectorAll('.splide');
  
    splideElements.forEach(function(splideElement) {
        // Create a new Splide instance for each element
        var splide = new Splide(splideElement);
  
        // Mount Splide with extensions if needed
        splide.mount(window.splide.Extensions);

    });
});
