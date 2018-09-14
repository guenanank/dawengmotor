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
      var $t = $(this);
      var module = $t.data('module');

      $.ajax({
        type: $t.attr('method'),
        dataType: 'json',
        url: (setting.url) ? setting.url : $t.attr('action'),
        data: typeof setting.data == 'undefined' ? setting.data : $t.serialize(),
        beforeSend: function() {
          $('.loading').fadeIn();
        },
        statusCode: {
          200: function(data) {
            swal({
              type: 'success',
              title: 'Sukses!',
              text: 'Data Berhasil Disimpan.',
              showConfirmButton: false,
              timer: 2000
            }, function() {
              location.reload(true);
            });
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
