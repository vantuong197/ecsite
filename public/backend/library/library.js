(function(){
    "use strict";
    var HT = {};

    HT.switchery = () =>{
        $('.js-switch').each(function(){
            new Switchery(this, { color: '#1AB394' });
        })
        
    }

    HT.selected = () =>{
        $(document).ready(function() {
            $('.selected2').select2();
        });
    }
    $(document).ready(function() {
        HT.switchery();
        HT.selected();
    })
})(jQuery);