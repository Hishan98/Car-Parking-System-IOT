<?php
session_start();

if (!isset($_SESSION['type'])) {
    header('Location: ../index.php');
} else if ($_SESSION['type'] != 'guard') {
    header('Location: ../index.php');
} else {
}
if (!isset($_SESSION['vnumber'])) {
    header('Location: ../in_system/Home.php');
}
?>
<html>
    <head>
        <title>Garage</title>
        <link rel="icon" type="image/png" href="../images/icons/favicon.png"/>
        <link href='https://fonts.googleapis.com/css?family=Roboto Condensed' rel='stylesheet'>
        <link rel="stylesheet" type="text/css" href="../css/garage.css">
        <link href="/your-path-to-fontawesome/css/all.css" rel="stylesheet">
    </head>
    <body>
        <div class="bg-image"></div>
        <form action="../DBconnections/garagedb.php" method="POST">    
                <div id="base-container">
                    <div id="left-container">  
                        <div class="managerslots" data-value="1" id="slot01">
                            <p id="txt">
                                Slot 01
                                <img src="../images/car top.png" class="img_size_upper" id="slot01-img">
                            </p>
                        </div>

                        <div class="slots"  data-value="2" id="slot02">
                            <p id="txt">
                                Slot 02
                                <img src="../images/car top.png" class="img_size_upper" id="slot02-img">
                            </p>
                        </div>

                        <div class="slots"  data-value="3" id="slot03">
                            <p id="txt">
                                Slot 03
                                <img src="../images/car top.png" class="img_size_upper" id="slot03-img">
                            </p>
                        </div>

                        <div class="slots"  data-value="4" id="slot04">
                            <p id="txt">
                                Slot 04
                                <img src="../images/car top.png" class="img_size_upper" id="slot04-img">
                            </p>
                        </div>

                        <div class="managerslots" data-value="5" id="slot05">
                            <p id="txt">
                                Slot 05
                                <img src="../images/car top.png" class="img_size_upper" id="slot05-img">
                            </p>
                        </div>

                        <div class="managerslots" data-value="6" id="slot06">
                            <p id="txt">
                                Slot 06
                                <img src="../images/car top.png" class="img_size_lower" id="slot06-img">
                            </p>
                        </div>

                        <div class="slots"  data-value="7" id="slot07">
                            <p id="txt">
                                Slot 07
                                <img src="../images/car top.png" class="img_size_lower" id="slot07-img">
                            </p>
                        </div>

                        <div class="slots"  data-value="8" id="slot08">
                            <p id="txt">
                                Slot 08
                                <img src="../images/car top.png" class="img_size_lower" id="slot08-img">
                            </p>
                        </div>

                        <div class="slots"  data-value="9" id="slot09">
                            <p id="txt">
                                Slot 09
                                <img src="../images/car top.png" class="img_size_lower" id="slot09-img">
                            </p>
                        </div>

                        <div class="slots"  data-value="10" id="slot10" >
                            <p id="txt">
                                Slot 10
                                <img src="../images/pngwing.png" class="img_size_disable" id="slot10-img">
                            </p>
                        </div>
                    </div>
                    <div id="right-container">
                        <label id="slots-hedding">Select Your Slot</label>
                        <label id="slots-title">You have selected :</label></br>
                        <label id="slots-value">None</label>
                        <input type="hidden" id="txt-slots-value" name="txt-slots-value">
                        <?php
                            echo '
                            <input type="hidden" id="txt-status-value" name="txt-status-value" value="'.$_SESSION['usr_status'].'">

                            <input type="hidden" id="txt-slot-01" name="txt-slot-01" value="'.$_SESSION['usr_stat0'].'">
                            <input type="hidden" id="txt-slot-02" name="txt-slot-02" value="'.$_SESSION['usr_stat1'].'">
                            <input type="hidden" id="txt-slot-03" name="txt-slot-03" value="'.$_SESSION['usr_stat2'].'">
                            <input type="hidden" id="txt-slot-04" name="txt-slot-04" value="'.$_SESSION['usr_stat3'].'">
                            <input type="hidden" id="txt-slot-05" name="txt-slot-05" value="'.$_SESSION['usr_stat4'].'">
                            <input type="hidden" id="txt-slot-06" name="txt-slot-06" value="'.$_SESSION['usr_stat5'].'">
                            <input type="hidden" id="txt-slot-07" name="txt-slot-07" value="'.$_SESSION['usr_stat6'].'">
                            <input type="hidden" id="txt-slot-08" name="txt-slot-08" value="'.$_SESSION['usr_stat7'].'">
                            <input type="hidden" id="txt-slot-09" name="txt-slot-09" value="'.$_SESSION['usr_stat8'].'">
                            <input type="hidden" id="txt-slot-10" name="txt-slot-10" value="'.$_SESSION['usr_stat9'].'">
                            ';
                        ?>
                        <button id="slots-btn" type = "submit" value = " Submit ">BOOK NOW</button>
                    </div>
                </div>
                </br>   
        </form>
    </body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="../js/garage.js"></script>
</html>