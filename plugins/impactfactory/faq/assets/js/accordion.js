$(document).ready(function () {
    $('.faq-nav-trigger').on('click', function() {
        const id = $(this).data('id');

        $('.faq-nav-trigger.is-active').removeClass('is-active');
        $('.faq-tab.is-active').removeClass('is-active');

        $(this).addClass('is-active');
        $('#tab-' + id).addClass('is-active');
    });

    $('.accordion li').click(function () {
        if ($(this).closest('.accordion').hasClass('one-open')) {
            $(this).closest('.accordion').find('li').removeClass('active');
            $(this).addClass('active');
        } else {
            $(this).toggleClass('active');
        }
        if (typeof window.mr_parallax !== "undefined") {
            setTimeout(mr_parallax.windowLoad, 500);
        }
    });

});
