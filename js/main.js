window.onload = function() {
    
    let errorElements = document.querySelectorAll('.form-error');

    if (errorElements.length > 0) {
        
        errorElements[0].scrollIntoView({ behavior: 'smooth', block: 'center' });
    }

    
    errorElements.forEach(function(el) {
        
        setTimeout(function() {
            
            el.style.opacity = '0';
        }, 3000); 

        
        setTimeout(function() {
            el.remove();
        }, 3500); 
    });
};

