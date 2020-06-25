$('#base-container .slots').click(function(){
    $(this).parent().find('.slots').removeClass('selected');
    $(this).addClass('selected');
    var val = $(this).attr('data-value');
    // alert(val);
    document.getElementById('slots-value').innerHTML = "Slot Number "+val;
    myFunction(val)
});

function myFunction(value) {
    document.getElementById("txt-slots-value").value = value;
}