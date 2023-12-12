(function(){
    "use strict";
    var HT = {};

    HT.location = () =>{
        $(document).on('change', '.location', function(){
            let _this = $(this);
            let option = {
                'data' : {
                    'location_id' : _this.val(),
                },

                'target' : _this.attr('data-target')
                
            }
            HT.sendDataToGetLoction(option);
            
        })
    }

    HT.sendDataToGetLoction = (option) =>{
        $.ajax({
            url: 'ajax/location/getLocation',
            type: 'GET',
            data: option,
            dataType: 'json',
            success: function(res){
                console.log(res);
                $('.'+ option.target).html(res.html)
            },
            error: function(jqXHR, textStatus, errorThrown){
                console.log(jqXHR, textStatus, errorThrown)
            }
        })
    }
    $(document).ready(function() {
        HT.location();
    })
})(jQuery);