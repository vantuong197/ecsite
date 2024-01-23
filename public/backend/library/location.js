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
                $('.'+ option.target).html(res.html)
                if(district_id != '' && option.target == 'district'){
                    $('.district').val(district_id).trigger('change');
                }
                if(ward_id != '' && option.target == 'wards'){
                    $('.wards').val(ward_id).trigger('change');
                }
            },
            error: function(jqXHR, textStatus, errorThrown){
                console.log(jqXHR, textStatus, errorThrown)
            }
        })
    }
    HT.loadLocation = () =>{
        if(province_id != ''){
            $('.province').val(province_id).trigger('change');
        }
        if(district_id != ''){
            $('.district').val(district_id).trigger('change');
        }   
    }
    $(document).ready(function() {
        HT.location();
        HT.loadLocation();  

    })
})(jQuery);