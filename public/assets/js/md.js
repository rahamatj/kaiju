var images = document.querySelectorAll('.post-body img');
images.forEach(image => {
    if(image.src.match(window.location.origin) === window.location.origin) {
        var src = image.src.substr(image.src.lastIndexOf('/') + 1);
        image.src = window.location.origin + '/vendor/kaiju/assets/' + src;
    }
});