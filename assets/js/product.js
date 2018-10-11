(function($) {

  var base_url = $('base').attr('href');
  var price = $('input[name="price"]');
  var downPayment = $('input[name="down_payment"]');

  price.blur(function() {
    $('select[name="lease_id"]').selectpicker('refresh');
    $('tbody#leases').html('');
  });

  $('select[name="lease_id"]').on('changed.bs.select', function() {

    if (price.val().length < 1 || downPayment.val().length < 1) {
      swal({
        title: '',
        text: 'Bidang harga dan uang muka harus di isi.',
        type: 'warning',
        showConfirmButton: false,
        timer: 3000
      });

      $('tbody#leases').html('');

    } else {

      $('tbody#leases').html('');
      var id = $(this).val();
      $.ajax({
        type: 'POST',
        url: base_url + 'credit/calculate',
        data: {
          lease_id: id,
          price: price.val().replace(/,/g, ''),
          downPayment: downPayment.val().replace(/,/g, '')
        },
        success: function(credits) {
          $('div#leases').html('<h6 class="card-title">Angsuran</h6>');

          var lists = '';

          $.each(credits, function(k, item) {
            lists += '<tr>';

            lists += '<td class="text-center">' + item.tenor + 'x</td>';

            lists += '<td class="text-right">';
            lists += '<input type="hidden" name="credits[' + item.credit_id + '][installment]" value="' + item.installment + '">';
            lists += 'Rp. ' + numberFormat(item.installment) + ' / Bulan';
            lists += '</td>';

            lists += '<td class="text-center">';
            lists += '<input type="hidden" name="credits[' + item.credit_id + '][flat]" value="' + item.flat + '">';
            lists += item.flat + '% (Flat)';
            lists += '</td>';

            lists += '</tr>';
          });

          $('tbody#leases').append(lists).fadeIn('slow');
        }
      });
    }

  });

  var numberFormat = function(nStr) {
    nStr += '';
    x = nStr.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
      x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    return x1 + x2;
  }

  $('#product-description').summernote({
    height: 300,
    placeholder: $('#product-description').attr('placeholder'),
    toolbar: [
      ['style', ['bold', 'italic', 'underline']],
      ['para', ['ul', 'ol', 'paragraph']],
      ['misc', ['help']]
    ]
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
    browseLabel: 'Cari Foto'
  });
})(jQuery);
