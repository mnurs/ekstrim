(function ($) {
    "use strict";

    //1st Preview image
    $('#putImage1').on('change', function () {
        var src = this;
        var target = document.getElementById('target1');
        target.style.width = '120px';
        target.style.height = '80px';
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#target1').attr('src', e.target.result);
        }
        reader.readAsDataURL(src.files[0]);
    });
    $(document).ready(function () {
        $(document).on('click', '.delete', function () {
            return confirm("Are You Sure To Delete This!");
        });
    });
})(jQuery);
