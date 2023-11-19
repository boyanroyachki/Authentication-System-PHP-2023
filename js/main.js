window.onload = function() {
    // Select all elements with the class 'form-error'
    let errorElements = document.querySelectorAll('.form-error');

    if (errorElements.length > 0) {
        // Scroll to the first error message
        errorElements[0].scrollIntoView({ behavior: 'smooth', block: 'center' });
    }

    // Iterate over each error element
    errorElements.forEach(function(el) {
        // Set a timeout to fade out the error message
        setTimeout(function() {
            // Start fading out
            el.style.opacity = '0';
        }, 3000); // Adjust time as needed (3000 milliseconds = 3 seconds)

        // Remove the element from DOM after fade out
        setTimeout(function() {
            el.remove();
        }, 3500); // Make sure this is slightly longer than the fade-out duration
    });
};


