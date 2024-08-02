/*!
 * WordPress Development Environment (WPDE) v1.0.0
 * https://jindrichrucil.com
 * Author (c) 2024 Jindrich Rucil
 * Released under the MIT license
 */
(function ($) {
    $(document).ready(function () {
        $('#wpcontent').prepend($('#wpde-modal'));
        $('#wpcontent').prepend($('#wpde-navbar'));

        // Add click event for the "Version" link
        $('#open-about').on('click', function (event) {
            event.preventDefault(); // Prevent default anchor behavior
            
            // Toggle the "show" class on the markdown content
            $('#wpde-modal').toggleClass('show');
        });
    });
})(jQuery);
