<?php
    include('dbconfig.php');
    if(isset($_POST['checkindate'])){

        $check_date = $_POST['checkindate'];
        // echo "<script type='text/javascript'>alert('');</script>";
        $sql="select * from report where parked_date='".$check_date."'";
        $result=$con-> query($sql);
    }
?>