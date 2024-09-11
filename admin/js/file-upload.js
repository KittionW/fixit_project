(function($) {
  'use strict';
  $(function() {
    $('.file-upload-browse').on('click', function() {
      var file = $(this).parent().parent().parent().find('.file-upload-default');
      file.trigger('click');
    });
    $('.file-upload-default').on('change', function() {
      // var numFiles = $("input", this)[0].files.length;
      let files = $(this)[0].files.length ;
      let show = "You have selected " + files + " images";
      $(this).parent().find('.form-control').val(show);
    });
  });
})(jQuery);