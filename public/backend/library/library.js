(function(){
    "use strict";
    var HT = {};

    HT.switchery = () =>{
        $('.js-switch').each(function(){
            new Switchery(this, { color: '#1AB394' });
        })
        
    }
    $(document).ready(function() {
        HT.switchery();
    })
})(jQuery);