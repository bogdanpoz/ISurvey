(function(){
    "use strict";

    var input = document.querySelector("#phone");

    if (input) {
        var iti = window.intlTelInput(input, {
            utilsScript: "../../frontend/js/utils.js"
        });

        document.querySelector("form").onsubmit = function() {
            input.value = iti.getNumber();
        };
    }
})();

$(function() {
    "use strict";

    var i=0;
    for (i = 0; i < 100; i++) {
        if($('.range-'+i).length > 0) {
            $('.range-'+i).rangeslider({
                polyfill: false,
                rangeClass: 'rangeslider',
                disabledClass: 'rangeslider--disabled',
                horizontalClass: 'rangeslider--horizontal',
                verticalClass: 'rangeslider--vertical',
                fillClass: 'rangeslider__fill',
                handleClass: 'rangeslider__handle',

                onInit: function() {},
                
                onSlide: function(position, value) {
            },

            // Callback function
                onSlideEnd: function(position, value) {}
            });


                
            const $input = $('.range-'+i);
            const $output = $('.slider-output-'+i);
            

            function updateOutput(value) {
                $output[0].textContent = value;  
            }
              
            $input.on('input', function(e) {
                updateOutput(e.target.value);
            });

            $('.range-'+i).on('change',function(e){
                $.each($(this), function(index, val) {
                    $('.'+val.className).parent().find('.slid-op').val($input[0].value);
                });
            });
              
            $input.rangeslider({
                polyfill: false
            });
              
            updateOutput($input[0].value);
        } 
    }     
});