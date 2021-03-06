<?php
// We need to use sessions, so you should always start sessions using the below code.
require_once 'vendor/autoload.php';
use Twilio\Rest\Client;
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit();
}

?>


<!DOCTYPE html>
<html>
<style>

.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.active {
  background-color: #4CAF50;
  color: white;
}

.topnav .icon {
  display: none;
}

.dropdown {
  float: left;
  overflow: hidden;
}

.dropdown .dropbtn {
  font-size: 17px;    
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.topnav a:hover, .dropdown:hover .dropbtn {
  background-color: #555;
  color: white;
}

.dropdown-content a:hover {
  background-color: #ddd;
  color: black;
}

.dropdown:hover .dropdown-content {
  display: block;
}

@media screen and (max-width: 600px) {
  .topnav a:not(:first-child), .dropdown .dropbtn {
    display: none;
  }
  .topnav a.icon {
    float: right;
    display: block;
  }
}

@media screen and (max-width: 600px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }
  .topnav.responsive .dropdown {float: none;}
  .topnav.responsive .dropdown-content {position: relative;}
  .topnav.responsive .dropdown .dropbtn {
    display: block;
    width: 100%;
    text-align: left;
  }
}

<body>




body {
  font-family: 'Roboto', sans-serif;
  //background: url(img/dark.jpg) no-repeat center center fixed ; 
 
  background-size: cover; 
}

.notificacion {
  //background: #108dc7 !important;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #ef8e38, #108dc7) !important;  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #09eaaa, #0b61e6) !important; /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

   border-radius: 0.8em;
  -moz-border-radius: 0.8em;
  -webkit-border-radius: 0.8em;
  color: #000000;
  display: inline-block;
  font-weight: bold;
  line-height: 1.6em;
  margin-right: 15px;
  text-align: center;
  //width: 800px; 
  padding: 30px;
  
}
hr.dotted {
 // border-top: 3px dashed #bbb;
}
/*the container must be positioned relative:*/
.content form{
    //background-color: #0f100fe6;
    background-color: #485461;
    background-image: linear-gradient(315deg, #485461 0%, #28313b 74%);
    //background-image: radial-gradient(circle, #101010, #15121f, #18132e, #1b143c, #1f134a, #202361, #1b3379, #004491, #0066ac, #0085ac, #009f94, #0db56f);
   // background-image: linear-gradient(to top right, #00ff99 18%, #ccff33 64%);
   //background: linear-gradient(to bottom, #66ffcc 0%, #ccff99 100%);
    width: 30%;
    margin: auto;
    border-radius: 45px;
    padding: 30px;
    //opacity: 0.90;
    box-shadow: 10px 20px 20px #362525;
    
}
.custom-select2 {
  position: relative;
  font-family: Arial;
  display: block;
  margin: 0 auto;
}

.custom-select2 select {
  display: none; /*hide original SELECT element:*/
}

.custom-select1 {
  position: relative;
  font-family: Arial;
  display: block;
  margin: 0 auto;
}

.custom-select1 select {
  display: none; /*hide original SELECT element:*/
}

.custom-select {
  position: relative;
  font-family: Arial;
  display: block;
  margin: 0 auto;
}

.custom-select select {
  display: none; /*hide original SELECT element:*/
}

.select-selected {
  background-color: #089499;
}

/*style the arrow inside the select element:*/
.select-selected:after {
  position: absolute;
  content: "";
  top: 14px;
  right: 10px;
  width: 0;
  height: 0;
  border: 6px solid transparent;
  border-color: #fff transparent transparent transparent;
}

/*point the arrow upwards when the select box is open (active):*/
.select-selected.select-arrow-active:after {
  border-color: transparent transparent #fff transparent;
  top: 7px;
}

/*style the items (options), including the selected item:*/
.select-items div,.select-selected {
  color: #ffffff;
  padding: 8px 16px;
  border: 1px solid transparent;
  border-color: transparent transparent rgba(0, 0, 0, 0.1) transparent;
  cursor: pointer;
  user-select: none;
}

/*style items (options):*/
.select-items {
  position: absolute;
  background-color: #084245;
  top: 100%;
  left: 0;
  right: 0;
  z-index: 99;
}

/*hide the items when the select box is closed:*/
.select-hide {
  display: none;
}

.select-items div:hover, .same-as-selected {
  background-color: rgba(0, 0, 0, 0.1);
}

table {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 1000px;
  margin-left:auto; 
  margin-right:auto; 
  box-shadow: 10px 10px 10px #362525;
  
}

td {
  border: 1px solid #ddd;
  padding: 15px;
  text-align: center;
}
 th {
  border: 1px solid #ddd;
  padding: 15px;
  text-align: center;
}
input[type=text] {
    border: 0px solid ;
    color: #fff;
    background: #0053d4eb;
    padding: 10px 14px;
    border-radius: 3px;
    display: block;
    margin: 0 auto;
    margin-bottom: 0.5em;
    font-family: Arial;
    text-align: center; 
    font-weight: 550;
}
::placeholder {
  color: white;
}
input[type=submit] {
    border: 0px solid ;
    color: #fff;
    background: grey;
    padding: 10px 20px;
    border-radius: 3px;
    text-align: center;
    display: block;
    margin: 0 auto;
    font-weight: 550;
    
}
input[type=submit]:hover {
    background: #f44c0e;
    cursor: pointer;
}
tr:nth-child(even){background-color: #f2f2f2;}
tr:nth-child(odd){background-color: #a6a4a4;}
tr:hover {background-color: #7ad8f5;}

 th {
  padding-top: 12px;
  padding-bottom: 12px;
  
  background-color: #1ab040;
  color: white;
}
@-ms-viewport{
  width: device-width;
}
</style>

	<head>
        <link rel="icon" href="img/favicon.ico">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Home Page</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
        
	</head>
	<body class="loggedin">

  <nav class="navtop">
			<div>
				<h1><img src="logo.png" alt="Cinque Terre" width="100" height="60" align="left">&nbsp;KISAAN - NETRA</h1>
				<a href="home.php"><i class="fas fa-sun"></i>Weather</a>
                <a href="adminStock.php"><i class="fas fa-store"></i><em>Stock</em></a>
                <a href="adminConsultant.php"><i class="fas fa-envelope"></i><em>Consultant</em></a>
				<a href="adminPhoneNumber.php"><i class="fa fa-address-book" aria-hidden="true"></i>Phone-Book</a>
                <a href="profile.php"><i class="fas fa-user-circle"></i>Profile</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
                
			</div>
		</nav>



<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>
		<br>
		<div class="content">
			<h2>WEATHER UPDATES </h2>
			<p>Welcome back, <em><?=$_SESSION['name']?>!</em> </p>
		
	</body>
</html>
<table>
  <?php
$DATABASE_HOST = 'sql212.freecluster.eu';
$DATABASE_USER = 'epiz_25041824';
$DATABASE_PASS = 'XEXxRwaCxjJDO';
$DATABASE_NAME = 'epiz_25041824_test';
/*
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'accounts';
*/
// Create connection
$conn = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS);
$db = mysqli_select_db($conn, $DATABASE_NAME); 
  require_once ('vendor/autoload.php');
  use \Statickidz\GoogleTranslate;
  $trans = new GoogleTranslate();

  if (isset($_POST['search']))
  {
    $id = $_POST['id'];
    
    $query = "SELECT * FROM expert_weather WHERE weather_id = '$id'";
    $query_run = mysqli_query($conn, $query);
    

    while ($rows = mysqli_fetch_array($query_run))
    {
if(isset($_POST['search']))
{
  // Authorisation details.
  $username = "kisaannetra@gmail.com";
  $hash = "50db1fde63dc0a74e6cdc5f5276295a06800d5fe27487f3c3ef5a08ed927a3eb";
  $sender = "TXTLCL";
  $unicode = "1";
  // Config variables. Consult http://api.textlocal.in/docs for more info.
  $test = "0";
    
  // Data for text message. This is the text message data.
  // This is who the message appears to be from.
  include_once('phonedb.php'); 
  $numbers = "$phone"; // A single number or a comma-seperated list of numbers

  $a = "Today's temperature will be between  " ;
  $b = $rows['weather_temperature'];
  $c = " Degrees! ";
  $d = ucfirst(strtolower($rows['comment']));
  $message = $a.$b.$c.$d;
  $target = $_POST['target'];


  $message = $trans->translate("en", $target, $message);  
$final = "Sent Message: ".$message;
  // 612 chars or less
  // A single number or a comma-seperated list of numbers
  $message = urlencode($message);
  $data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test."&unicode=1";
  //api.textlocal.in/send/?apikey=jxslui0FkGo-1rPMwGvOGQYWiLuU7r6fDxXBtUqJXP&sender=TXTLCL&numbers=919711191064&message=नमस्कार&unicode=1
  $ch = curl_init('http://api.textlocal.in/send/?');
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $result = curl_exec($ch); // This is the result from the API
  curl_close($ch);
 echo '<script language="javascript">';
echo 'alert("Message Sent Successfully!")';
echo '</script>';
  echo '<div class="notificacion">', $final,'</div>';
}

      ?>
      <br> <br>
       <tr>
    <th>Weather_id</th>
    <th>weather_temperature</th>
    <th>State</th>
    <th>Date</th>
    <th>Status</th>
    
  </tr> 
      <tr>
        <td> <?php echo $rows['weather_id']; ?></td>
        <td> <?php echo $rows['weather_temperature']; ?></td>
        <td> <?php echo $rows['state']; ?></td>
        <td> <?php echo $rows['date']; ?></td>
        <td> Message Sent</td>

      </tr>
      

<br>
      <?php 

    }

  }

  ?>
  </table>
<table>
 
<?php


if(isset($_POST['voice']))
{
    $arrayPhone = explode(",",$_POST['phone']);
    
     require_once('voice.php');
     

}


?>
<br><br>


</table>

  
<?php
$DATABASE_HOST = 'sql212.freecluster.eu';
$DATABASE_USER = 'epiz_25041824';
$DATABASE_PASS = 'XEXxRwaCxjJDO';
$DATABASE_NAME = 'epiz_25041824_test';
/*
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'accounts';
*/
// Create connection
$conn = new mysqli($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM `expert_weather` ORDER BY `expert_weather`.`weather_id` ASC";

if ($_GET['sort'] == 'id')
{
    
$sql = "SELECT * FROM `expert_weather` ORDER BY `expert_weather`.`weather_id` ASC";
}
elseif ($_GET['sort'] == 'state')
{
    $sql = "SELECT * FROM `expert_weather` ORDER BY `expert_weather`.`state` ASC";
}
elseif ($_GET['sort'] == 'date')
{
    $sql = " SELECT * FROM `expert_weather` ORDER BY `expert_weather`.`date` DESC";
}

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>Weather_id</th><th>Username</th><th>Temperature</th><th>State/UT</th><th>Date [Submission]</th><th>Message [Special]</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["weather_id"]. "</td><td>" . $row["username_fk"]. "</td><td>" . $row["weather_temperature"]. "</td><td> ". $row["state"]. " </td><td>" . $row["date"]. "</td><td>" . $row["comment"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
?>
</div>
        <div class="content2" style="width:250px;"><p><strong>SORT BY:</strong>
        <th><a href="home.php?sort=id" style="text-decoration: none;"><strong>ID</strong></a></th>&nbsp;
        <th><a href="home.php?sort=state" style="text-decoration: none;"><strong>STATE</strong></a></th>&nbsp;
        <th><a href="home.php?sort=date" style="text-decoration: none;"><strong>DATE</strong></a></th>
       </p> </div>
<br><br>
<div class="content">

<form method = "POST">
 <input type = "text" name = "id" placeholder = "Enter Weather_id (TEXT)">
 
<body>


<!--surround the select box with a "custom-select" DIV element. Remember to set the width:-->

 <div class="custom-select" style="width:200px;">
 <select name="target">   
    <option value="hi" selected>Language Selection (Default: Hindi)</option>
    <option value="hi">Hindi</option>
    <option value="pa">Punjabi</option>
    <option value="bn">Bengali</option>
    <option value="en">English</option>
 </select>
 
</div>

<script>
var x, i, j, selElmnt, a, b, c;
/*look for any elements with the class "custom-select":*/
x = document.getElementsByClassName("custom-select");
for (i = 0; i < x.length; i++) {
  selElmnt = x[i].getElementsByTagName("select")[0];
  /*for each element, create a new DIV that will act as the selected item:*/
  a = document.createElement("DIV");
  a.setAttribute("class", "select-selected");
  a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
  x[i].appendChild(a);
  /*for each element, create a new DIV that will contain the option list:*/
  b = document.createElement("DIV");
  b.setAttribute("class", "select-items select-hide");
  for (j = 1; j < selElmnt.length; j++) {
    /*for each option in the original select element,
    create a new DIV that will act as an option item:*/
    c = document.createElement("DIV");
    c.innerHTML = selElmnt.options[j].innerHTML;
    c.addEventListener("click", function(e) {
        /*when an item is clicked, update the original select box,
        and the selected item:*/
        var y, i, k, s, h;
        s = this.parentNode.parentNode.getElementsByTagName("select")[0];
        h = this.parentNode.previousSibling;
        for (i = 0; i < s.length; i++) {
          if (s.options[i].innerHTML == this.innerHTML) {
            s.selectedIndex = i;
            h.innerHTML = this.innerHTML;
            y = this.parentNode.getElementsByClassName("same-as-selected");
            for (k = 0; k < y.length; k++) {
              y[k].removeAttribute("class");
            }
            this.setAttribute("class", "same-as-selected");
            break;
          }
        }
        h.click();
    });
    b.appendChild(c);
  }
  x[i].appendChild(b);
  a.addEventListener("click", function(e) {
      /*when the select box is clicked, close any other select boxes,
      and open/close the current select box:*/
      e.stopPropagation();
      closeAllSelect(this);
      this.nextSibling.classList.toggle("select-hide");
      this.classList.toggle("select-arrow-active");
    });
}
function closeAllSelect(elmnt) {
  /*a function that will close all select boxes in the document,
  except the current select box:*/
  var x, y, i, arrNo = [];
  x = document.getElementsByClassName("select-items");
  y = document.getElementsByClassName("select-selected");
  for (i = 0; i < y.length; i++) {
    if (elmnt == y[i]) {
      arrNo.push(i)
    } else {
      y[i].classList.remove("select-arrow-active");
    }
  }
  for (i = 0; i < x.length; i++) {
    if (arrNo.indexOf(i)) {
      x[i].classList.add("select-hide");
    }
  }
}
/*if the user clicks anywhere outside the select box,
then close all select boxes:*/
document.addEventListener("click", closeAllSelect);
</script>

</body>
</html> <br>
 <input type = "submit" name = "search" value = "Send Text Message">
 <br>
<hr class="dotted">
<br>
 <input type = "text" name = "id1" placeholder = "Enter Weather_id (VOICE)">
 <div class="custom-select1" style="width:200px;">

 <select name="phone">
  <option value="+918588850630">Select a User for the Voice Message!</option>
  <option value="+918588850630">Sarthak</option>
  <option value="+919711191064">Naveen</option>
  <option value="+918860481459">Prateek</option>
  <option value="+918588850630,+919711191064,+918860481459">All</option>
  </select>
  
</div>

<script>
var x, i, j, selElmnt, a, b, c;
/*look for any elements with the class "custom-select":*/
x = document.getElementsByClassName("custom-select1");
for (i = 0; i < x.length; i++) {
  selElmnt = x[i].getElementsByTagName("select")[0];
  /*for each element, create a new DIV that will act as the selected item:*/
  a = document.createElement("DIV");
  a.setAttribute("class", "select-selected");
  a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
  x[i].appendChild(a);
  /*for each element, create a new DIV that will contain the option list:*/
  b = document.createElement("DIV");
  b.setAttribute("class", "select-items select-hide");
  for (j = 1; j < selElmnt.length; j++) {
    /*for each option in the original select element,
    create a new DIV that will act as an option item:*/
    c = document.createElement("DIV");
    c.innerHTML = selElmnt.options[j].innerHTML;
    c.addEventListener("click", function(e) {
        /*when an item is clicked, update the original select box,
        and the selected item:*/
        var y, i, k, s, h;
        s = this.parentNode.parentNode.getElementsByTagName("select")[0];
        h = this.parentNode.previousSibling;
        for (i = 0; i < s.length; i++) {
          if (s.options[i].innerHTML == this.innerHTML) {
            s.selectedIndex = i;
            h.innerHTML = this.innerHTML;
            y = this.parentNode.getElementsByClassName("same-as-selected");
            for (k = 0; k < y.length; k++) {
              y[k].removeAttribute("class");
            }
            this.setAttribute("class", "same-as-selected");
            break;
          }
        }
        h.click();
    });
    b.appendChild(c);
  }
  x[i].appendChild(b);
  a.addEventListener("click", function(e) {
      /*when the select box is clicked, close any other select boxes,
      and open/close the current select box:*/
      e.stopPropagation();
      closeAllSelect(this);
      this.nextSibling.classList.toggle("select-hide");
      this.classList.toggle("select-arrow-active");
    });
}
function closeAllSelect(elmnt) {
  /*a function that will close all select boxes in the document,
  except the current select box:*/
  var x, y, i, arrNo = [];
  x = document.getElementsByClassName("select-items");
  y = document.getElementsByClassName("select-selected");
  for (i = 0; i < y.length; i++) {
    if (elmnt == y[i]) {
      arrNo.push(i)
    } else {
      y[i].classList.remove("select-arrow-active");
    }
  }
  for (i = 0; i < x.length; i++) {
    if (arrNo.indexOf(i)) {
      x[i].classList.add("select-hide");
    }
  }
}
/*if the user clicks anywhere outside the select box,
then close all select boxes:*/
document.addEventListener("click", closeAllSelect);
</script>
<br>



 <div class="custom-select2" style="width:200px;">

  <select name="target1">   
    <option value="hi" selected>Language Selection (Default: Hindi)</option>
    <option value="hi">Hindi</option>
    <option value="en">English</option>
 </select>
  
</div>

<script>
var x, i, j, selElmnt, a, b, c;
/*look for any elements with the class "custom-select":*/
x = document.getElementsByClassName("custom-select2");
for (i = 0; i < x.length; i++) {
  selElmnt = x[i].getElementsByTagName("select")[0];
  /*for each element, create a new DIV that will act as the selected item:*/
  a = document.createElement("DIV");
  a.setAttribute("class", "select-selected");
  a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
  x[i].appendChild(a);
  /*for each element, create a new DIV that will contain the option list:*/
  b = document.createElement("DIV");
  b.setAttribute("class", "select-items select-hide");
  for (j = 1; j < selElmnt.length; j++) {
    /*for each option in the original select element,
    create a new DIV that will act as an option item:*/
    c = document.createElement("DIV");
    c.innerHTML = selElmnt.options[j].innerHTML;
    c.addEventListener("click", function(e) {
        /*when an item is clicked, update the original select box,
        and the selected item:*/
        var y, i, k, s, h;
        s = this.parentNode.parentNode.getElementsByTagName("select")[0];
        h = this.parentNode.previousSibling;
        for (i = 0; i < s.length; i++) {
          if (s.options[i].innerHTML == this.innerHTML) {
            s.selectedIndex = i;
            h.innerHTML = this.innerHTML;
            y = this.parentNode.getElementsByClassName("same-as-selected");
            for (k = 0; k < y.length; k++) {
              y[k].removeAttribute("class");
            }
            this.setAttribute("class", "same-as-selected");
            break;
          }
        }
        h.click();
    });
    b.appendChild(c);
  }
  x[i].appendChild(b);
  a.addEventListener("click", function(e) {
      /*when the select box is clicked, close any other select boxes,
      and open/close the current select box:*/
      e.stopPropagation();
      closeAllSelect(this);
      this.nextSibling.classList.toggle("select-hide");
      this.classList.toggle("select-arrow-active");
    });
}
function closeAllSelect(elmnt) {
  /*a function that will close all select boxes in the document,
  except the current select box:*/
  var x, y, i, arrNo = [];
  x = document.getElementsByClassName("select-items");
  y = document.getElementsByClassName("select-selected");
  for (i = 0; i < y.length; i++) {
    if (elmnt == y[i]) {
      arrNo.push(i)
    } else {
      y[i].classList.remove("select-arrow-active");
    }
  }
  for (i = 0; i < x.length; i++) {
    if (arrNo.indexOf(i)) {
      x[i].classList.add("select-hide");
    }
  }
}
/*if the user clicks anywhere outside the select box,
then close all select boxes:*/
document.addEventListener("click", closeAllSelect);
</script>
<br>
 <input type="submit"  id="SubmitForm" name= "voice" value="Send Voice Message"/>
</form>


<br><br>

</body>
</html>
