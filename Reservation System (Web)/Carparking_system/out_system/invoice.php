<html>
    <head>
        <title>invoice</title>
        <link rel="icon" type="image/png" href="../images/icons/favicon.png"/>
        <link href='https://fonts.googleapis.com/css?family=Roboto Condensed' rel='stylesheet'>
        <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Domine:wght@400;700&family=Open+Sans:ital,wght@0,400;0,600;0,700;1,400;1,600;1,700&family=Source+Sans+Pro:wght@600&display=swap" rel="stylesheet">        <link rel="stylesheet" type="text/css" href="../css/invoice.css">
    </head>
    <body>
        <p id="hedding">INVOICE</p>  
        <div class="base-container">
           <div id="left-container">
                <p class="invo_lbl">Invoice Number:</p>  
                <p class="invo_lbl">Slot ID:</p>  
                <p class="invo_lbl">Vehicle Number:</p>  
                <p class="invo_lbl">Date:</p>  
                <p class="invo_lbl">Check-In Time:</p>  
                <p class="invo_lbl">Check-Out Time:</p>  
           </div> 
           <div id="right-container">

               <!-- <p id="invoice_number" class="invo_val">333324</p>
               <p id="invoice_number" class="invo_val">01</p>
               <p id="invoice_number" class="invo_val">CAW2224</p>
               <p id="invoice_number" class="invo_val">2020-10-12</p>
               <p id="invoice_number" class="invo_val">17:00:00</p>
               <p id="invoice_number" class="invo_val">22:00:00</p> -->
               
                <?php 

					include '../DBconnections/invoice_data.php';
                    echo'
                        <p id="invoice_number" class="invo_val">'.$invoice_number.'</p>
                        <p id="slot_id" class="invo_val">'.$slot_id.'</p>
                        <p id="vehicle_number" class="invo_val">'.$vehicle_number.'</p>
                        <p id="parked_date" class="invo_val">'.$parked_date.'</p>
                        <p id="checkin_time" class="invo_val">'.$checkin_time.'</p>
                        <p id="checkout_time" class="invo_val">'.$checkout_time.'</p>

           </div>
        </div>
        <p id="cost">'.$cost.'</p>
        ';
        ?>
    </body>
</html>