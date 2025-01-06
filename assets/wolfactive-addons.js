document.addEventListener('DOMContentLoaded', function() {
    const langToggle = document.querySelector('.wolfactive-polylang-switcher');
    if (!langToggle) return;

    new SlimSelect({
        select: langToggle,
        settings: {
            showSearch: false,
        },
        events:{
            afterChange: (value) => {
                window.location.href = value[0].value;
            }
        }
    })
})
