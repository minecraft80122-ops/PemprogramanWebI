var siteHeader = document.querySelector('header');
var topHoverZone = document.getElementById('topHoverZone');

var lastScrollY = window.scrollY;
var isMouseOverHeader = false;

function showHeader() {
    if (!siteHeader) return;
    siteHeader.classList.remove('is-hidden');
}

function hideHeader() {
    if (!siteHeader) return;
    if (!isMouseOverHeader && window.scrollY > 50) {
        siteHeader.classList.add('is-hidden');
    }
}

window.addEventListener('scroll', function () {
    var currentScrollY = window.scrollY;

    if (currentScrollY <= 50) {
        showHeader();
    } else if (currentScrollY > lastScrollY) {
        hideHeader();
    } else if (currentScrollY < lastScrollY) {
        showHeader();
    }

    lastScrollY = currentScrollY;
});

if (topHoverZone) {
    topHoverZone.addEventListener('mouseenter', function () {
        showHeader();
    });
}

if (siteHeader) {
    siteHeader.addEventListener('mouseenter', function () {
        isMouseOverHeader = true;
        showHeader();
    });

    siteHeader.addEventListener('mouseleave', function () {
        isMouseOverHeader = false;
        hideHeader();
    });
}