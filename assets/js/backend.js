(function($) {

  var price = $('input[name="price"]').val().replace(/,/g , '');
  var downPayment = $('input[name="down_payment"]').val().replace(/,/g , '');
  var administration = $('input[name="administration"]').val().replace(/,/g , '');

  $('select[name="leases"]').on('changed.bs.select', function() {

      $.getJSON($('base').attr('href') + 'credit/get/' + $(this).val(), function(credit) {
        // var lists = '<ul class="list-group list-group-flush">';
        var lists = '';
        $.each(credit, function(k, v) {
            if(v.tenor == 11) {
              var pureDP, percent, netFinance, formula1, formula2, installment, flat;
              // console.log(price);
              // console.log(downPayment);
              // console.log(administration);
              // console.log(v.insurance);

              console.log(downPayment - administration);
              console.log(price * v.insurance);
              // console.log(v.insurance);
              pureDP = (downPayment - administration) - (price * v.insurance);
              percent = pureDP / price;
              netFinance = price + (v.insurance * price) + administration - downPayment;
              formula1 = v.effective_rate / 12;
              formula2 = (1 + formula1) ^ - v.tenor;
              installment = ((netFinance - v.effective_rate) * formula1) / (1 - formula2);
              // flat =
              // lists += '<li class="list-group-item">' + v.tenor + ' x ' + installment + '</li>';
              lists += '<p>' + v.tenor + ' x ' + pureDP + '</p>';

            }
        });

        lists += '';
        // console.log(lists);
        $('div#leases').html(lists);
      });

      lists = '';
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
