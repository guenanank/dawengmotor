(function($) {


  $('select[name="leases"]').on('changed.bs.select', function() {
      console.log($(this).val());
  });
  
})(jQuery);
