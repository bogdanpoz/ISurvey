(function($) {
    "use strict";

    $('input[data-bootstrap-switch]').each(function() {
        $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })

    $('.survey-colorpicker').colorpicker();

    new ClipboardJS('.btn-clipboard');

    if($('.si-quadron').length > 0) {
    	$('.si-quadron').on('click', function(){ 
          $('.ims').val("");
        });
    }	
})(jQuery);


