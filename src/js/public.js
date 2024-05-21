(function ($) {
    // Enable bootstrap tooltips
    // Magnific Popup
    // CF7 Button
    $(function () {
        $(window).on("load", function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
        $(".mfp-img").magnificPopup({
            type: "image",
            mainClass: "mfp-with-zoom",
            titleSrc: "title",
            zoom: {
                enabled: true,
                duration: 300,
                easing: "ease-in-out",

                opener: function (openerElement) {
                    return openerElement.is("img") ? openerElement : openerElement.find("img")
                },
            },
        })
        if($('.wpcf7-submit').length) {
            $('.wpcf7-submit').addClass('btn btn-primary');
        }
    })

    // Set body font size based on data-fontsize attribute
    $("[data-fontsize]").on("click", function () {
        var fontsize = "";
        
        var fontsizeClass = $(this).data("fontsize");
        switch (fontsizeClass) {
            case "sm":
                fontsize = "14px";
                break;
            case "default":
                fontsize = "16px";
                break;
            case "lg":
                fontsize = "18px";
                break;
            default:
                fontsize = "16px"; 
        }
        
        $("body").css("font-size", fontsize);
        $(".nav-link").removeClass("text-primary");
        $(this).addClass("text-primary");
    });    

    // Headroom
    lastScroll = 0
    $(window).on("scroll", function () {
        var scroll = $(window).scrollTop()

        if ($(".headroom")[0]) {
            // Scroll 0
            if (scroll <= 0) {
                $(".navbar").removeClass("fixed-top").animate(100)
                // Scroll up
            } else if (lastScroll - scroll > 0) {
                $(".navbar").addClass("fixed-top").animate(100)
                // Scroll down
            } else if (lastScroll - scroll < 0) {
                $(".navbar").removeClass("fixed-top").animate(100)
            }
        }

        lastScroll = scroll
    })

    // Theme
    $(function () {
        var theme = localStorage.getItem('theme');

        if (theme === null) {
            $('select[name=wpde-theme]').val('auto');
        } else {
            $('select[name=wpde-theme]').val(theme);
        }
    
        if (theme === 'auto' || theme === null) {
            if (window.matchMedia('(prefers-color-scheme: dark)').matches) {
                document.documentElement.setAttribute('data-bs-theme', 'dark');
                $('body').removeClass('cc--lightmode').addClass('cc--darkmode');
            } else {
                document.documentElement.setAttribute('data-bs-theme', 'light'); 
                $('body').removeClass('cc--darkmode').addClass('cc--lightmode');
            }
            localStorage.setItem('theme', 'auto');
        }
    
        if (theme === 'light') {
            document.documentElement.setAttribute('data-bs-theme', 'light'); 
            $('body').removeClass('cc--darkmode').addClass('cc--lightmode');
        }
    
        if (theme === 'dark') {
            document.documentElement.setAttribute('data-bs-theme', 'dark'); 
            $('body').removeClass('cc--lightmode').addClass('cc--darkmode');
        }
    
        var select = document.querySelector('select[name=wpde-theme]');

        select.addEventListener('change', function () {
            var selectedValue = this.value;
    
            if (selectedValue === 'auto') {
                if (window.matchMedia('(prefers-color-scheme: dark)').matches) {
                    document.documentElement.setAttribute('data-bs-theme', 'dark');
                    $('body').removeClass('cc--lightmode').addClass('cc--darkmode');
                } else {
                    document.documentElement.setAttribute('data-bs-theme', 'light'); 
                    $('body').removeClass('cc--darkmode').addClass('cc--lightmode');
                }
                localStorage.setItem('theme', 'auto');
            } else if (selectedValue === 'light') {
                document.documentElement.setAttribute('data-bs-theme', 'light'); 
                $('body').removeClass('cc--darkmode').addClass('cc--lightmode');  
                localStorage.setItem('theme', 'light');
            } else if (selectedValue === 'dark') {
                document.documentElement.setAttribute('data-bs-theme', 'dark'); 
                $('body').removeClass('cc--lightmode').addClass('cc--darkmode');
                localStorage.setItem('theme', 'dark');
            }
        });
    });

})(jQuery)
