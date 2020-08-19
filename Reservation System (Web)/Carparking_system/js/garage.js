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

    $('#base-container .slots').click(function(){
        $(this).parent().find('.slots').removeClass('selected');
        $(this).addClass('selected');

        var val = $(this).attr('data-value');
        document.getElementById('slots-value').innerHTML = "Slot Number "+val;
        myFunction(val);
    });

    if(usr_slot_02=="Booked"){
        $("#slot02").addClass("deactive");
        $('div#slot02').click(function(){
            warning();
            $("#slot02").removeClass('selected');
            $("#slot02").addClass("deactive");

            var val = "";
            document.getElementById('slots-value').innerHTML = "None";
            myFunction(val)
        });
    }
    if(usr_slot_03=="Booked"){
        $("#slot03").addClass("deactive");
        $('div#slot03').click(function(){
            warning();
            $("#slot03").removeClass('selected');
            $("#slot03").addClass("deactive");

            var val = "";
            document.getElementById('slots-value').innerHTML = "None";
            myFunction(val)
        });
    }
    if(usr_slot_04=="Booked"){
        $("#slot04").addClass("deactive");
        $('div#slot04').click(function(){
            warning();
            $("#slot04").removeClass('selected');
            $("#slot04").addClass("deactive");

            var val = "";
            document.getElementById('slots-value').innerHTML = "None";
            myFunction(val)
        });
    }
    if(usr_slot_07=="Booked"){
        $("#slot07").addClass("deactive");
        $('div#slot07').click(function(){
            warning();
            $("#slot07").removeClass('selected');
            $("#slot07").addClass("deactive");

            var val = "";
            document.getElementById('slots-value').innerHTML = "None";
            myFunction(val)
        });
    }
    if(usr_slot_08=="Booked"){
        $("#slot08").addClass("deactive");
        $('div#slot08').click(function(){
            warning();
            $("#slot08").removeClass('selected');
            $("#slot08").addClass("deactive");

            var val = "";
            document.getElementById('slots-value').innerHTML = "None";
            myFunction(val)
        });
    }
    if(usr_slot_09=="Booked"){
        $("#slot09").addClass("deactive");
        $('div#slot09').click(function(){
            warning();
            $("#slot09").removeClass('selected');
            $("#slot09").addClass("deactive");

            var val = "";
            document.getElementById('slots-value').innerHTML = "None";
            myFunction(val)
        });
    }
    if(usr_slot_10=="Booked"){
        $("#slot10").addClass("deactive");
        $('div#slot10').click(function(){
            warning();
            $("#slot10").removeClass('selected');
            $("#slot10").addClass("deactive");

            var val = "";
            document.getElementById('slots-value').innerHTML = "None";
            myFunction(val)
        });
    }
    else{
        $('div#slot10').click(function(){
            disablewar();
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
        $("#slot01").addClass("deactive");
        $('div#slot01').click(function(){
            warning();
            $("#slot01").removeClass('selected');
            $("#slot01").addClass("deactive");

            var val = "";
            document.getElementById('slots-value').innerHTML = "None";
            myFunction(val)
        });
    }
    if(usr_slot_05=="Booked"){
        $("#slot05").addClass("deactive");
        $('div#slot05').click(function(){
            warning();
            $("#slot05").removeClass('selected');
            $("#slot05").addClass("deactive");

            var val = "";
            document.getElementById('slots-value').innerHTML = "None";
            myFunction(val)
        });
    }
        if(usr_slot_06=="Booked"){
        $("#slot06").addClass("deactive");
        $('div#slot06').click(function(){
            warning();
            $("#slot06").removeClass('selected');
            $("#slot06").addClass("deactive");

            var val = "";
            document.getElementById('slots-value').innerHTML = "None";
            myFunction(val)
        });
    }
}
function myFunction(value) {
    document.getElementById("txt-slots-value").value = value;
}

function warning() {
    alert("Already Booked..");
  }
function disablewar(){
    alert("This slot is reserved for customers with disability. Please proceed only if you match the criteria.");
}