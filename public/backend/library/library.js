(function(){
    "use strict";
    var HT = {};
    var _token = $('meta[name="csrf-token"]').attr('content');
    HT.switchery = () =>{
        $('.js-switch').each(function(){
            new Switchery(this, { color: '#1AB394' });
        })
        
    }

    HT.selected = () =>{
        if($('.selected2').length){
            $('.selected2').select2();
        }
        
    }

    HT.changeStatus= () =>{
        $(document).on('change', '.status', function(e){
            let _this = $(this);
            let option = {
                'value' : _this.val(),
                'modelId' : _this.attr('data-modelId'),
                'model' : _this.attr('data-model'),
                'field' : _this.attr('data-field'),
                '_token' : _token
            }

            $.ajax({
                url: 'ajax/dashboard/changeStatus',
                type: 'POST',
                data: option,
                dataType: 'json',
                success: function(res){
                    console.log(res);
                },
                error: function(jqXHR, textStatus, errorThrown){
                    console.log(jqXHR, textStatus, errorThrown)
                }
            })
        })
    }

    HT.checkAll = () =>{
        if($('#checkAll').length){
            $(document).on('click', '#checkAll', function (){
                let checkALlState = $(this).prop('checked');
                if(checkALlState){
                    $('.checkbox-item').prop('checked', checkALlState).closest('tr').addClass('active-bg');
                }else{
                    $('.checkbox-item').prop('checked', checkALlState).closest('tr').removeClass('active-bg');
                }
                
            })
        }
    }

    HT.checkBoxItem = () =>{
        if($('.checkbox-item').length){
            $(document).on('click', '.checkbox-item', function() {
                let _this = $(this);
                let checkState = _this.prop('checked');
                if(checkState){
                    _this.closest('tr').addClass('active-bg');
                }else{
                    _this.closest('tr').removeClass('active-bg');
                }
                let uncheckedCheckboxesExist = $('.checkbox-item:not(:checked)').length > 0;
                $('#checkAll').prop('checked', !uncheckedCheckboxesExist);

            })
        }
    }

    HT.changeStatusAll = (e) =>{
        if($('.changeStatusAll').length){
            $(document).on('click', '.changeStatusAll', function(e) {
                e.preventDefault();
                let _this = $(this);
                let id = [];
                $('.checkbox-item').each(function (){
                    let checkBox = $(this);
                    if(checkBox.prop('checked')){
                        id.push(checkBox.val());
                    }
                })

                let option = {
                    'value' : _this.attr('data-value'),
                    'id' : id,
                    'model' : _this.attr('data-model'),
                    'field' : _this.attr('data-field'),
                    '_token' : _token
                }

                let cssActive1 = 'background-color: rgb(26, 179, 148); border-color: rgb(26, 179, 148); box-shadow: rgb(26, 179, 148) 0px 0px 0px 16px inset; transition: border 0.4s ease 0s, box-shadow 0.4s ease 0s, background-color 1.2s ease 0s;'
                let cssActive2 = 'left: 20px; transition: background-color 0.4s ease 0s, left 0.2s ease 0s; background-color: rgb(255, 255, 255);'
                let cssUnactive1 = 'background-color: rgb(255, 255, 255); border-color: rgb(223, 223, 223); box-shadow: rgb(223, 223, 223) 0px 0px 0px 0px inset; transition: border 0.4s ease 0s, box-shadow 0.4s ease 0s;'
                let cssUnactive2 = 'left: 0px; transition: background-color 0.4s ease 0s, left 0.2s ease 0s;';

                if(id.length){
                    $.ajax({
                        url: 'ajax/dashboard/changeStatusAll',
                        type: 'POST',
                        data: option,
                        dataType: 'json',
                        success: function(res){
                            if(res.flag){
                                if(option.value == '1'){
                                    $('.active-bg').each(function (){
                                        $(this).find('span.switchery').attr('style', cssActive1).find('small').attr('style', cssActive2);
                                    })
                                }else{
                                    $('.active-bg').each(function (){
                                        $(this).find('span.switchery').attr('style', cssUnactive1).find('small').attr('style', cssUnactive2);
                                    })
                                }
                            }
                        },
                        error: function(jqXHR, textStatus, errorThrown){
                            console.log(jqXHR, textStatus, errorThrown)
                        }
                    })
                }
                
            })

        }
    }
    $(document).ready(function() {
        HT.switchery();
        HT.selected();
        HT.changeStatus();
        HT.checkAll();
        HT.checkBoxItem();
        HT.changeStatusAll();
    })
})(jQuery);