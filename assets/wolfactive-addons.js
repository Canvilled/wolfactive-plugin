document.addEventListener('DOMContentLoaded', function() {
    console.log('wolfactive-addons.js loaded');
    const langToggle = document.querySelector('.pll-switcher-select');
    if (!langToggle) return;

    new SlimSelect({
        select: langToggle,
        settings: {
            showSearch: false,
        }
    })
})
