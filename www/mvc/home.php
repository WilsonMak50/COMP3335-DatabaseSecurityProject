<?php session_start();
define('ROOT_DIR', realpath(__DIR__.'/..'));
require __DIR__.'/../mvc/model.php';

//use model;
if (! empty($_POST["login-btn"])) {
   // require_once '../db/model.php';
    $member = new model();
    $loginResult = $member->loginMember();
}
if(isset($_SESSION['attempt_again'])){
    $now = time();
    if($now >= $_SESSION['attempt_again']){
        unset($_SESSION['attempt']);
        unset($_SESSION['attempt_again']);
    }
}
?>


<!DOCTYPE html>
<html>
<head>
<title> Homepage </title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
body, html {
    height: 100%;
    margin: 0;
    font-family: Arial;
}

/* Style tab links */
.tablink {
    background-color: #9999ff;
    color: black;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    font-size: 17px;
    width: 25%;
}
.mySlides {display:none;}
.center {
  text-align: center;
  border: 10px solid red;
  background-color: black;
  color: white;
  font-weight: bold;
}

.tablink:hover {
    background-color: red;
}

/* Style the tab content (and add height:100% for full page content) */
.tabcontent {
    color: black;
    display: none;
    padding: 100px 20px;
    height: 100%;
}


#Home {background-color:#23395d;
  color:white;
}
#About us {background-color: red;}

#Login {background-color: #ADD8E6;}

</style>
</head>
<body>

  <div class="center"> <h1> PolyU COMP Game Store</h1></div>
	  <button class="tablink" onclick="openPage('Home', this, 'white')"id="defaultOpen">Home</button>
	  <button class="tablink" onclick="openPage('Access', this, 'orange')">How to Access?</button> 
    <button class="tablink" onclick="openPage('Login', this, 'orange')">Login</button> 
    <button class="tablink" onclick="openPage('Aboutus', this, 'orange')">About Us</button> <hr><br>

  <div id="Home" class="tabcontent"> 
  
    <h1>This is a  digital gaming software distribution platform</h1>
    <h3> Please click How to access and get into our platform </h3>
    <h2 class="w3-center">New Games</h2>
    <div class="w3-content w3-section" style="max-width:300px">
        <img class="mySlides" src="/image/robotgame.png" style="width:100%">
        <img class="mySlides" src="/image/fightinggame.png" style="width:100%">
        <img class="mySlides" src="/image/cookinggame.png" style="width:100%">
        <img class="mySlides" src="/image/drawinggame.png" style="width:100%">
        <img class="mySlides" src="/image/rpg.jfif" style="width:100%">
    </div>
  </div>


 <div id="Access" class="tabcontent"> 
      <h3> Please register here before placing any order</h3>
        <a href= "user-registration-form.php">userRegistration</a>
      <h3> Please login here if you had already registered with us</h3>
        <a href="login-form.php">login</a>
      <h4> Click here to go back homepage</h4>
        <a href="home.php">Home</a>
  </div>

  <div id="Aboutus" class="tabcontent"> 

    <h3>COMP3335 Group 17 
    <h3>Group members: Chan Sze Long </h3>
    <h3>Lia Man Lik </h3>
    <h3>Mak Wilson Ho-luen</h3>
    <h3>Yiu Pak Hei</h3>
    
    <p>Refernece : https://github.com/shravasam/ONLINE_SALES_WEBSITE </p>
  </div>


  <div id="Login" class="tabcontent">
    <div class="sign-up-container">
      <div class="login-signup">
        <a href="user-registration-form.php">Sign up</a>
      </div>

    <div class="signup-align">
      <form name="Login1" action="" method="post" onsubmit="return loginValidation()">
        <div class="signup-heading">Login</div>
        <?php if(!empty($loginResult)){?>
                            <div class="error-msg"><?php echo $loginResult;?></div>
                                 <?php }?>
        <div class="row">
          <div class="inline-block">
              <div class="form-label">
                  Username<span class="required error" id="username-info"></span>
              </div>
          <input class="input-box-330" type="text" name="username"id="username">
        </div>
    </div>

    <div class="row">
      <div class="inline-block">
        <div class="form-label">
          Password<span class="required error" id="signup-password-info"></span>
        </div>
      <input class="input-box-330" type="password"
          name="signup-password" id="signup-password">
      </div>
    </div>

    <div class="row">
      <input class="sign-up-btn" type="submit" name="login-btn"
          id="login-btn" value="Login">
    </div>

  </form>
</div>
</div>

    


<script>
var myIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}    
  x[myIndex-1].style.display = "block";  
  setTimeout(carousel, 2000); // Change image every 2 seconds
}
</script>

<script>
function openPage(pageName,elmnt,color) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablink");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].style.backgroundColor = "";
    }
    document.getElementById(pageName).style.display = "block";
    elmnt.style.backgroundColor = color;

}
// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
</body>
</html>
