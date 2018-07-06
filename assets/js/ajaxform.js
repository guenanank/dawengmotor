/**
 * jQuery AJAX form
 *
 *
 * @author http://guenanank.com
 */

(function($) {

  $.fn.ajaxform = function(obj) {
    var setting = $.fn.extend({
      url: '',
      data: {}
    }, obj);

    return this.each(function() {
      
      var module = $(this).data('module_name')
      $.ajax({
        type: $(this).attr('method'),
        url: (setting.url) ? setting.url : $(this).attr('action'),
        // data: typeof setting.data == 'undefined' ? setting.data : new FormData(this),
        data: $(this).serialize(),
        beforeSend: function() {
          $('.loading').fadeIn();
        },
        statusCode: {
          200: function(data) {
            // console.log(data);
          },
          422: function(response) {
            $.each(response.responseJSON, function(k, v) {
              $('#' + module + '-' + k).addClass('is-invalid');
              $('#feedback-' + k).html(v).addClass('invalid-feedback');
            });
          }
        }
      }).always(function() {
        $('.loading').fadeOut();
      });

    });
  };

})(jQuery);
