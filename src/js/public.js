/*!
 * WordPress Development Environment (WPDE) v1.0.0
 * https://jindrichrucil.com
 * Author (c) 2024 Jindrich Rucil
 * Released under the MIT license
 */
;(function ($) {
    // Enable bootstrap tooltips
    // Magnific Popup
    // CF7 Button
    $(function () {
        $(window).on('load', function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
        $('.mfp-init').magnificPopup({
            delegate: '.mfp-item',
            type: 'image',
            mainClass: 'mfp-with-zoom',
            titleSrc: 'title',
            zoom: {
                enabled: true,
                duration: 300,
                easing: 'ease-in-out',

                opener: function (openerElement) {
                    return openerElement.is('img') ? openerElement : openerElement.find('img')
                },
            },
        })

        if ($('.wpcf7-submit').length) {
            $('.wpcf7-submit').addClass('btn btn-success')
        }

        $('.navbar-toggler').on('click', function () {
            $(this).find('#navbar-toggler-icon').toggleClass('fa-bars fa-xmark')
        })

        $('a[target="_blank"]:not(.btn)').each(function () {
            const icon = $('<i>', {
                class: 'fa-solid fa-up-right-from-square fa-sm ms-2',
            })
            $(this).append(icon)
        })

        if ($(window).width() < 991) {
            $('#navbar-actions').insertBefore('.navbar-collapse')
        }
    })

    // Headroom
    let lastScroll = 0
    const $headroom = $('.headroom')

    $(window).on('scroll', function () {
        const scroll = $(window).scrollTop()

        if ($headroom.length) {
            if (scroll <= 0) {
                $headroom.removeClass('d-none').addClass('d-block')
            } else if (scroll < lastScroll) {
                $headroom.addClass('d-block').removeClass('d-none')
            } else {
                $headroom.addClass('d-none').removeClass('d-block')
            }
        }

        lastScroll = scroll
    })

    // Theme
    $(function () {
        var theme = localStorage.getItem('theme')
        var toggler = $('#wpde-theme')

        if (theme !== null) {
            toggler.find('.dropdown-menu li a').removeClass('active')
        }
        toggler.find('.dropdown-menu li a[data-value="' + theme + '"]').addClass('active')

        if (theme === 'auto' || theme === null) {
            if (window.matchMedia('(prefers-color-scheme: dark)').matches) {
                $('html').attr('data-bs-theme', 'dark')
                $('body').removeClass('cc--lightmode').addClass('cc--darkmode')
            } else {
                $('html').attr('data-bs-theme', 'light')
                $('body').removeClass('cc--darkmode').addClass('cc--lightmode')
            }
            $(toggler).find('.dropdown-toggle').html('<i class="fa-solid fa-circle-half-stroke"></i>')
            if (theme === null) {
                localStorage.setItem('theme', 'auto')
            }
        }

        if (theme === 'light') {
            $('html').attr('data-bs-theme', 'light')
            $('body').removeClass('cc--darkmode').addClass('cc--lightmode')
            $(toggler).find('.dropdown-toggle').html('<i class="fa-solid fa-sun"></i>')
        }

        if (theme === 'dark') {
            $('html').attr('data-bs-theme', 'dark')
            $('body').removeClass('cc--lightmode').addClass('cc--darkmode')
            $(toggler).find('.dropdown-toggle').html('<i class="fa-solid fa-moon"></i>')
        }

        toggler.find('.dropdown-menu li a').click(function () {
            var selectedValue = $(this).data('value')

            $('.dropdown-menu li a').removeClass('active')
            $(this).addClass('active')

            if (selectedValue === 'auto') {
                if (window.matchMedia('(prefers-color-scheme: dark)').matches) {
                    $('html').attr('data-bs-theme', 'dark')
                    $('body').removeClass('cc--lightmode').addClass('cc--darkmode')
                } else {
                    $('html').attr('data-bs-theme', 'light')
                    $('body').removeClass('cc--darkmode').addClass('cc--lightmode')
                }
                $(toggler).find('.dropdown-toggle').html('<i class="fa-solid fa-circle-half-stroke"></i>')
                localStorage.setItem('theme', 'auto')
            } else if (selectedValue === 'light') {
                $('html').attr('data-bs-theme', 'light')
                $('body').removeClass('cc--darkmode').addClass('cc--lightmode')
                $(toggler).find('.dropdown-toggle').html('<i class="fa-solid fa-sun"></i>')
                localStorage.setItem('theme', 'light')
            } else if (selectedValue === 'dark') {
                $('html').attr('data-bs-theme', 'dark')
                $('body').removeClass('cc--lightmode').addClass('cc--darkmode')
                $(toggler).find('.dropdown-toggle').html('<i class="fa-solid fa-moon"></i>')
                localStorage.setItem('theme', 'dark')
            }
        })
    })
})(jQuery)
