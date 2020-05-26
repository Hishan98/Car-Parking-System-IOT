<style type="text/css">
body {
  background: #fff;
  padding: 0px;
  margin: 0px;
  font-family: 'Nunito', sans-serif;
  font-size: 16px;
}
header{
  height: 60px;background-color: #282923;
}
input, button {
  font-family: 'Nunito', sans-serif;
  font-weight: 700;
}

.loggedin-div {
  float: right;
}

.loggedin-div button {
  background: #DC143C;
  color: #fff;
  border: 1px solid #DC143C;
  border-radius: 5px;
  padding: 15px;
  display: block;
  width: 100%;
  transition: 0.3s;
  -webkit-transition: 0.3s;
  -moz-transition: 0.3s;
}
.loggedin-div button:hover {
  background: #fff;
  color: #DC143C;
  border: 1px solid #DC143C;
  cursor: pointer;
}

#container_table
{
  margin-top: 50px;
  margin-bottom: 50px;
  width: 100%;
}
#container_table td
{
  padding: 5px;
}
#container_table div{
  padding-top: 0px;
  background-color: LimeGreen;
  color: white;
  cursor: pointer;
  width: 120px;
  height: 160px;
  border-radius: 20px;
  -webkit-transition: 0.3s;
  -moz-transition: 0.3s;
  border: 1px solid LimeGreen;
}
#container_table div:hover{
  background-color: white;
  color: black;
  cursor: pointer;
}
#container_table label{
  display: none;
}

.model_container {
  padding: 16px;
}

/* The Modal (background) */
.modal {
  display: block; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}

/* Add Zoom Animation */
.animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)} 
  to {-webkit-transform: scale(1)}
}
  
@keyframes animatezoom {
  from {transform: scale(0)} 
  to {transform: scale(1)}
}
</style>