<script type="text/javascript">
firebase.auth().onAuthStateChanged(function(user) {
  if (user) {
    // User is signed in.
    var user = firebase.auth().currentUser;

    if(user != null){

      var email_id = user.email;
      document.getElementById("user_para").innerHTML = email_id;
      //window.location.href = "home.php";
    }
  } else {
    // No user is signed in.
    window.location.href = "../login.php";
  }
});

function logout(){
  firebase.auth().signOut();
}




  var clock = document.getElementById('clock');
  function hexClock() {
  var time = new Date();
  var hours = (time.getHours() % 24).toString();
  var minutes = time.getMinutes().toString();
  var seconds = time.getSeconds().toString();

  if (hours.length < 2) {
    hours = '0' + hours;
  }

  if (minutes.length < 2) {
    minutes = '0' + minutes;
  }

  if (seconds.length < 2) {
    seconds = '0' + seconds;
  }

  var clockStr = hours + ' : ' + minutes + ' : ' + seconds;

  clock.textContent = clockStr;

}

hexClock();
setInterval(hexClock, 1000);
</script>

