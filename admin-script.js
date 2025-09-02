document.addEventListener('mouseenter', function(event) {
    if (!event.target || typeof event.target.closest !== 'function') {
        return;
    }
    const element = event.target.closest('[data-layout]');
    if (!element || element.classList.contains('layout')) {
        return;
    }
    if (!element.matches('[data-layout]')) {
        return;
    }

    var sectionName = element.getAttribute('data-layout');
    if (sectionName) {
        var imageUrl = '/wp-content/themes/xevel/sections/screenshots/' + sectionName + '.jpg';
        var tooltip = document.createElement('div');
        tooltip.className = 'custom-tooltip';
        var img = document.createElement('img');
        img.src = imageUrl;
        img.alt = sectionName + ' screenshot';
        img.style.width = '100%';
        img.style.height = 'auto';
        tooltip.appendChild(img);
        document.body.appendChild(tooltip);

        img.onload = function() {
            var rect = element.getBoundingClientRect();
            tooltip.style.width = '600px';
            tooltip.style.height = 'auto';
            tooltip.style.position = 'fixed';
            tooltip.style.bottom = '0'
            tooltip.style.left = '0';
            tooltip.style.zIndex = '9999';
            tooltip.style.opacity = 1;
            console.log('Tooltip positioned:', tooltip.style.top, tooltip.style.left);
        };
        img.onerror = function() {
            console.log('Image failed to load:', img.src);
        };
        tooltip.style.opacity = 0;
        tooltip.style.transition = 'opacity 0.2s';
    }
}, true);

document.addEventListener('mouseleave', function(event) {
    if (!event.target || typeof event.target.closest !== 'function') {
        return;
    }
    const element = event.target.closest('[data-layout]');
    if (!element) {
        return;
    }
    if (!element.matches('[data-layout]')) {
        return;
    }

    document.querySelectorAll('.custom-tooltip').forEach(function(tooltip) {
        tooltip.remove();
    });
}, true);