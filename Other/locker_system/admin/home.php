<?php
include 'rs/css/css_home.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Locker System</title>
	<link rel="icon" type="image/png" href="../resources/locker.png">
  	<link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>


<header>

  <table style="float: left;color: white; height: 100%; font-size: 30px; font-family:Century Gothic ">
    <tr>
      <td><div id="clock"></div></td>
    </tr>
  </table>

    <table style="height: 100%;"  class="loggedin-div">
      <tr>
        <td style="padding-right: 20px;"><img src="../resources/officer.png" style="width: 50px;height: 50px;"></td>
        <td id="user_para" style="font-size: 100%;color: white;font-size: 20px; padding-right: 20px;"></td>
        <td><button onclick="logout()">Logout</button></td>
      </tr>
    </table>
</header>


<div id="id01" class="modal" >
  
  <div class="modal-content animate"  style="background-color: red;">

    <div class="model_container" style="background-color: blue;">

      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
    </div>


  </div>

</div>


<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

<table id="container_table">
  <tr>
    <td colspan="10">
      <center>
        <?php
        $xx = date("m");

        if ($xx == 01 ) {
          $mm= "January";
        }
        elseif ($xx == 02) {
          $mm= "February";
        }
        elseif ($xx == 03) {
          $mm= "March";
        }
        elseif ($xx == 04) {
          $mm= "April";
        }
        elseif ($xx == 05) {
          $mm= "May";
        }
        elseif ($xx == 06) {
          $mm= "June";
        }
        elseif ($xx == 07) {
          $mm= "July";
        }
        elseif ($xx == 08) {
          $mm= "August";
        }
        elseif ($xx == 09) {
          $mm= "September";
        }
        elseif ($xx == 10) {
          $mm= "October";
        }
        elseif ($xx == 11) {
          $mm= "November";
        }
        elseif ($xx == 12) {
          $mm= "December";
        }
        else{}

          echo "<h1>" . date("Y ") .$mm. date(" d") . "</h1>";
        ?>
      </center>
    </td>
  </tr>
  <tr>
    <td rowspan="6" style="width: 40%;padding: 30px;">
      <center>
      <div style="background-color: #ddd;width: 100%;border-radius: 0px;">
      </div>
    </center>
    </td>
  </tr>
  <tr>
    <td><center>L1
      <div onclick="document.getElementById('id01').style.display='block'">
        <center>
        
        <label id="l1_name">10622310</label>
        <label id="l1_uid">10622310</label>
        <label id="l1_uid">10622310</label>
      </center>
      </div></center></td>
    <td><center><div></div></center></td>
    <td><center><div></div></center></td>
    <td><center><div></div></center></td>
    <td><center><div></div></center></td>
    <td><center><div></div></center></td>
    <td><center><div></div></center></td>
    <td><center><div></div></center></td>
    <td rowspan="6" style="width: 40%;padding: 30px;" >
      <center>
      <div style="background-color: #ddd;width: 100%;border-radius: 0px;">
      </div>
    </center>
    </td>
  </tr>
  <tr>
    <td><center><div></div></center></td>
    <td><center><div></div></center></td>
    <td><center><div></div></center></td>
    <td><center><div></div></center></td>
    <td><center><div></div></center></td>
    <td><center><div></div></center></td>
    <td><center><div></div></center></td>
    <td><center><div></div></center></td>
  </tr>
  <tr>
    <td><center><div></div></center></td>
    <td><center><div></div></center></td>
    <td><center><div></div></center></td>
    <td><center><div></div></center></td>
    <td><center><div></div></center></td>
    <td><center><div></div></center></td>
    <td><center><div></div></center></td>
    <td><center><div></div></center></td>
  </tr>
  <tr>
    <td><center><div></div></center></td>
    <td><center><div></div></center></td>
    <td><center><div></div></center></td>
    <td><center><div></div></center></td>
    <td><center><div></div></center></td>
    <td><center><div></div></center></td>
    <td><center><div></div></center></td>
    <td><center><div></div></center></td>
  </tr>
  <tr>
    <td><center><div></div></center></td>
    <td><center><div></div></center></td>
    <td><center><div></div></center></td>
    <td><center><div></div></center></td>
    <td><center><div></div></center></td>
    <td><center><div></div></center></td>
    <td><center><div></div></center></td>
    <td><center><div></div></center></td>
  </tr>
  <tr>
    
  </tr>
</table>


<script src="https://www.gstatic.com/firebasejs/5.9.0/firebase.js"></script>
<script>
  // Initialize Firebase
  var config = {
    apiKey: "AIzaSyDoWcMJtVvvurVKnSU09TzISqtg9lYh5TQ",
    authDomain: "locker-system-34aec.firebaseapp.com",
    databaseURL: "https://locker-system-34aec.firebaseio.com",
    projectId: "locker-system-34aec",
    storageBucket: "",
    messagingSenderId: "685179520829"
  };
  firebase.initializeApp(config);
</script>

<?php
include 'rs/js/js_home.php';
?>
</body>
</html>
