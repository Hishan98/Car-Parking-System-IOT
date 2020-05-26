var maintxt= document.getElementById("maintext");
var submitbtn= document.getElementById("submitBtn");

function submitfrom(){
    var firebaseRef = firebase.database().ref();
    firebaseRef.child("Slot_No").set("01");
}