// preloader===================================

window.onload = function () {
    document.getElementById('preloader').style.display = 'none';
};

// ==============================================

const iframe = document.querySelector('iframe');

iframe.onload = () => {
    const iframeDoc = iframe.contentDocument || iframe.contentWindow.document;
    const el = iframeDoc.querySelector('.thumbs');
    if (el) el.style.display = 'none';
};
// hero text animation
const texts = ['Between you and a smart apartment', 'There is a project called Key1'];
let index = 0;
const element = document.getElementById('textChanger');

function changeText() {
    element.classList.add('fade-out');

    setTimeout(() => {
        index = (index + 1) % texts.length;
        element.textContent = texts[index];
        element.classList.remove('fade-out');
    }, 500); // Match the CSS transition time
}

element.textContent = texts[index]; // Set initial text
setInterval(changeText, 4000); // Every 3 seconds

// fixed header=================================

window.addEventListener('scroll', function () {
    const header = document.getElementById('header');
    const logo = document.getElementById('logo');
    if (window.scrollY > 10) {
        header.classList.add('bg-[#2E0B33]', 'shadow-md', 'lg:h-[116px]');
        header.classList.remove('bg-transparent', 'lg:h-[156px]');
        logo.classList.add('lg:w-[60px]');
        logo.classList.remove('lg:w-[75px]');
    } else {
        header.classList.remove('bg-[#2E0B33]', 'shadow-md', 'lg:h-[116px]');
        header.classList.add('bg-transparent', 'lg:h-[156px]');
        logo.classList.remove('lg:w-[60px]');
        logo.classList.add('lg:w-[75px]');
    }
});

// language selector====================
document.addEventListener('DOMContentLoaded', function () {
    const button = document.getElementById('langButton');
    const dropdown = document.getElementById('langDropdown');

    // Toggle dropdown visibility
    button.addEventListener('click', () => {
        dropdown.classList.toggle('hidden');
    });

    // When a language is clicked, update the button label
    document.querySelectorAll('.lang-option').forEach((option) => {
        option.addEventListener('click', function (e) {
            const lang = this.getAttribute('data-lang');
            button.textContent = lang;
        });
    });

    // Close dropdown if clicked outside
    document.addEventListener('click', function (e) {
        if (!button.contains(e.target) && !dropdown.contains(e.target)) {
            dropdown.classList.add('hidden');
        }
    });
});

// <!-- color-div animation -->
$(document).ready(function () {
    $('.button').first().addClass('active');

    $('.button').click(function () {
        var $this = $(this);
        ($siblings = $this.parent().children()), (position = $siblings.index($this));
        console.log(position);

        $('.content .color-div').removeClass('active').eq(position).addClass('active');

        $('.content').each(function () {
            $(this).find('.img').removeClass('active').eq(position).addClass('active');
        });

        $siblings.removeClass('active');
        $this.addClass('active');
    });
});

// img-sliders==================================================================================
$(document).ready(function () {
    $('.img-slider').slick({
        infinite: false,
        slidesToShow: 1,
        autoplay: false,
        autoplaySpeed: 2000,
        arrows: true,
        dots: true,
        // cssEase: 'ease-in-out'
        // fade: true,
    });
});

// 3D-sliders==================================================================================
$(document).ready(function () {
    $('.d3-slider').slick({
        infinite: false,
        slidesToShow: 1,
        autoplay: false,
        autoplaySpeed: 2000,
        arrows: true,
        dots: false,
        // cssEase: 'ease-in-out'
        // fade: true,
    });
});

// =============================================================================================

// <!-- copy contact to clipboard=============== -->
function copyURL(event, element) {
    event.preventDefault(); // Prevent the link from opening
    const url = element.getAttribute('href');

    navigator.clipboard
        .writeText(url)
        .then(() => {
            alert('URL copied to clipboard!');
        })
        .catch((err) => {
            console.error('Failed to copy URL:', err);
        });
}

// <!-- contact field -->

$(document).ready(function () {
    const input = document.querySelector('#mobile_code');

    // Add Gulf and European countries (ISO 2-letter codes)
    const allowedCountries = [
        'ae', 'bh', 'qa', 'sa', 'om', 'kw', // Gulf
        'gb', 'de', 'fr', 'it', 'es', 'pt', // Europe: UK, Germany, France, Italy, Spain, Portugal
        'ch', 'nl', 'be', 'at', 'se', 'no', // Switzerland, Netherlands, Belgium, Austria, Sweden, Norway
        'fi', 'dk', 'ie', 'pl', 'cz', 'gr', // Finland, Denmark, Ireland, Poland, Czechia, Greece
        'ro', 'bg', 'hu', 'hr', 'lt', 'lv', 'ee', // Romania, Bulgaria, Hungary, Croatia, Lithuania, Latvia, Estonia
    ];

    const iti = window.intlTelInput(input, {
        initialCountry: 'ae',
        separateDialCode: true,
        onlyCountries: allowedCountries,
        utilsScript: 'https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js',
    });

    $('form').on('submit', function () {
        const fullPhone = iti.getNumber(); // <-- now this will work
        $('#full_phone').val(fullPhone); // Set value to hidden input
    });
});
//  img gallery====================================

$(document).ready(function () {
    // Initially show only the first gallery-div
    $('.gallery-div').hide().slice(0, 1).show();

    // Event delegation for dynamic content
    $(document).on('click', '.loadMore', function (e) {
        e.preventDefault();

        // Hide current "View All" button
        $('.gallery-div:visible').last().find('.loadMore').parent().hide();

        // Show next hidden gallery-div
        const nextDiv = $('.gallery-div:hidden').first();
        if (nextDiv.length) {
            nextDiv.slideDown();
        }

        // If no more hidden gallery-divs, show "View Less" button in the last one
        // if ($('.gallery-div:hidden').length === 0) {
        //     $('.gallery-div:visible').last().append(`
        //             <div class="flex justify-center mt-[20px]">
        //                 <a href="#" class="viewLess font-20-28 tracking-[0.4px] font-normal flex items-center gap-[8px] text-[#05352D] header-btn border border-[#05352D] px-[24px] py-[10px] rounded-[99px]">
        //                     View Less
        //                 </a>
        //             </div>
        //         `);
        // }
    });

    // View Less button logic
    $(document).on('click', '.viewLess', function (e) {
        e.preventDefault();

        // Hide all except the first gallery-div
        $('.gallery-div').slice(1).slideUp();

        // Show View All button in the first gallery-div
        $('.gallery-div').first().find('.loadMore').parent().show();

        // Remove the View Less button
        $(this).closest('div').remove();
    });
});

// fixed except first and last sections======================

function toggleFixedDivVisibility() {
    const fixedDiv = document.getElementById('fixedDiv');
    const header = document.getElementById('top');
    const footer = document.getElementById('footer');
    const headerBottom = header.offsetTop + header.offsetHeight;
    const footerTop = footer.offsetTop;
    const scrollY = window.scrollY;
    const windowHeight = window.innerHeight;
    const scrollBottom = scrollY + windowHeight;

    if (scrollY < headerBottom || scrollBottom > footerTop) {
        fixedDiv.style.display = 'none';
    } else {
        fixedDiv.style.display = 'flex';
    }
}

// Run once when the page loads
window.addEventListener('load', toggleFixedDivVisibility);
// Run on scroll
window.addEventListener('scroll', toggleFixedDivVisibility);
