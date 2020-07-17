var usr_status=document.getElementById("txt-status-value").value;

var usr_slot_01=document.getElementById("txt-slot-01").value;
var usr_slot_02=document.getElementById("txt-slot-02").value;
var usr_slot_03=document.getElementById("txt-slot-03").value;
var usr_slot_04=document.getElementById("txt-slot-04").value;
var usr_slot_05=document.getElementById("txt-slot-05").value;
var usr_slot_06=document.getElementById("txt-slot-06").value;
var usr_slot_07=document.getElementById("txt-slot-07").value;
var usr_slot_08=document.getElementById("txt-slot-08").value;
var usr_slot_09=document.getElementById("txt-slot-09").value;
var usr_slot_10=document.getElementById("txt-slot-10").value;

if(usr_status=="Customer"){
    if(usr_slot_02=="Booked"){

        $(document).ready(function(){
            $("#slot02").addClass("deactive");
        });
    }
    if(usr_slot_03=="Booked"){
        $(document).ready(function(){
            $("#slot03").addClass("deactive");
        });
    }
    if(usr_slot_04=="Booked"){
        $(document).ready(function(){
            $("#slot04").addClass("deactive");
        });
    }
    if(usr_slot_07=="Booked"){
        $(document).ready(function(){
            $("#slot07").addClass("deactive");
        });
    }
    if(usr_slot_08=="Booked"){

        $(document).ready(function(){
            $("#slot08").addClass("deactive");
        });
    }
    if(usr_slot_09=="Booked"){
        $(document).ready(function(){
            $("#slot09").addClass("deactive");
        });
    }
    if(usr_slot_10=="Booked"){
        $(document).ready(function(){
            $("#slot10").addClass("deactive");
        });
    }

    $(document).ready(function(){
        $(".managerslots").addClass("deactive");
    });
}
else{
    $('#base-container .managerslots').click(function(){
        $(this).parent().find('.managerslots').removeClass('selected');
        $(this).addClass('selected');
        var val = $(this).attr('data-value');

        document.getElementById('slots-value').innerHTML = "Slot Number "+val;
        myFunction(val)
    });
    $(document).ready(function(){
        $(".slots").addClass("deactive");
    });

    if(usr_slot_01=="Booked"){

    }
    if(usr_slot_05=="Booked"){

    }
    if(usr_slot_06=="Booked"){

    }
}
function myFunction(value) {
    document.getElementById("txt-slots-value").value = value;
}