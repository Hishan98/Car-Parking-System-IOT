$('#base-container .slots').click(function(){
    $(this).parent().find('.slots').removeClass('selected');
    $(this).addClass('selected');
    var val = $(this).attr('data-value');
    // alert(val);
    // document.getElementById("slots-value").value = val;
    document.getElementById('slots-value').innerHTML = "Slot Number "+val;
    if (val == 1) {
        document.getElementById("slot01-img").src = "images/car top_white.png";
    }
    else if(val == 2) {
        document.getElementById("slot02-img").src = "images/car top_white.png";
    }
    else if(val == 3) {
        document.getElementById("slot03-img").src = "images/car top_white.png";
    }
    else if(val == 4) {
        document.getElementById("slot04-img").src = "images/car top_white.png";
    }
    else if(val == 5) {
        document.getElementById("slot05-img").src = "images/car top_white.png";
    }
    else if(val == 6) {
        document.getElementById("slot06-img").src = "images/car top_white.png";
    }
    else if(val == 7) {
        document.getElementById("slot07-img").src = "images/car top_white.png";
    }
    else if(val == 8) {
        document.getElementById("slot08-img").src = "images/car top_white.png";
    }
    else if(val == 9) {
        document.getElementById("slot09-img").src = "images/car top_white.png";
    }

});
