$(document).ready(function () {
    console.log( "ready!" );
    var form = $('.pessoa');
    
    form.submit(function () {'use strict',

        $this = $(this);    
        console.log($this);
        return;
        $.post($(this).attr('action'), $this.serialize(), function(data) {
            $this.prev().text(data.message).fadeIn().delay(3000).fadeOut();
        },'json');
        return false;
    });
});