(function($) {

  var price = $('input[name="price"]').val().replace(/,/g , '');
  var downPayment = $('input[name="down_payment"]').val().replace(/,/g , '');
  var administration = $('input[name="administration"]').val().replace(/,/g , '');

  $('select[name="leases"]').on('changed.bs.select', function() {
      var lists = '<ul class="list-group list-group-flush">';

      $.getJSON($('base').attr('href') + 'credit/get/' + $(this).val(), function(credit) {

        $.each(credit, function(k, v) {
            // console.log(v);
            lists += '<li class="list-group-item">' + v.tenor + '</li>';
        });

      });

      lists += '</ul>';
      console.log(lists);
  });



  $('.krajee').fileinput({
    theme: 'fa',
    uploadUrl: '',
    maxFileCount: 5,
    allowedFileExtensions: ['jpg', 'jpeg', 'png', 'gif'],
    dropZoneEnabled: false,
    showRemove: false,
    showUpload: false,
    previewFileType: 'image',
    browseLabel: 'Upload Foto'
  });
})(jQuery);
