(function($) {

  var baseUrl = $('base').attr('href');
  var price = $('input[name="price"]');
  var downPayment = $('input[name="down_payment"]');
  var leaseId = $('select[name="lease_id"]');

  $('input[name="price"], input[name="down_payment"]').on('blur', function() {
    $('tbody#leases').html('').fadeOut('slow');
    // if(leaseId.selectpicker('val') === true) {
    leaseId.selectpicker('render');
    // }
  });

  leaseId.on('rendered.bs.select', function() {
    $.ajax({
      type: 'POST',
      url: baseUrl + 'credit/calculate',
      data: {
        lease_id: $(this).val(),
        price: price.val().replace(/,/g, ''),
        downPayment: downPayment.val().replace(/,/g, '')
      },
      beforeSend: function() {
        $('.loading').fadeIn();
      },
      success: function(credits) {
        $('div#leases').html('<h6 class="card-title">Angsuran</h6>');
        $('tbody#leases').html(tBody(credits)).fadeIn('slow');
      }
    }).always(function() {
      $('.loading').fadeOut();
    });
  });

  leaseId.on('changed.bs.select', function() {
    $('tbody#leases').html('').fadeOut('slow');

    if (price.val().length < 1 || downPayment.val().length < 1) {
      swal({
        title: '',
        text: 'Bidang harga dan uang muka harus di isi.',
        type: 'warning',
        showConfirmButton: false,
        timer: 3000
      });
    } else {
      $.ajax({
        type: 'POST',
        url: baseUrl + 'credit/calculate',
        data: {
          lease_id: $(this).val(),
          price: price.val().replace(/,/g, ''),
          downPayment: downPayment.val().replace(/,/g, '')
        },
        beforeSend: function() {
          $('.loading').fadeIn();
        },
        success: function(credits) {
          $('div#leases').html('<h6 class="card-title">Angsuran</h6>');
          $('tbody#leases').html(tBody(credits)).fadeIn('slow');
        }
      }).always(function() {
        $('.loading').fadeOut();
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
  };

  var tBody = function(credits) {
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
    return lists;
  };

  $('#product-description').summernote({
    height: 300,
    placeholder: $('#product-description').attr('placeholder'),
    toolbar: [
      ['style', ['bold', 'italic', 'underline']],
      ['para', ['ul', 'ol', 'paragraph']],
      ['misc', ['help']]
    ]
  });

  var fileinputObject = {
    theme: 'fa',
    uploadUrl: '',
    maxFileCount: 5,
    allowedFileTypes: ['image'],
    dropZoneEnabled: false,
    showRemove: true,
    showUpload: false,
    previewFileType: 'image',
    browseLabel: 'Cari Foto',
    elErrorContainer: '#feedback-photos',
    overwriteInitial: true
  };

  if ($('span#photos').text() !== '') {
    var url = [];
    var previewConfig = [];

    $.each($.parseJSON($('span#photos').text()), function(k, v) {
      url.push(v.url);
      previewConfig.push({
        caption: v.caption,
        downloadUrl: v.url,
        size: v.size,
        with: v.width,
        key: k + 1
      });
    });

    fileinputObject.initialPreview = url;
    fileinputObject.initialPreviewAsData = true;
    fileinputObject.initialPreviewConfig = previewConfig;
  }

  $('.krajee').fileinput(fileinputObject);


})(jQuery);
