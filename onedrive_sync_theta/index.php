<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>OneDrive Video Sync With Theta</title>
  <link rel="apple-touch-icon" sizes="180x180" href="/favicons/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/favicons/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/favicons/favicon-16x16.png">
  <link rel="manifest" href="/site.webmanifest">
  <link rel="mask-icon" href="/favicons/safari-pinned-tab.svg" color="#e6511e">
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="theme-color" content="#ffffff">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="./css/style.css">
  <!-- Noty -->
  <link rel="stylesheet" href="lib/noty/noty.css">
  <link rel="stylesheet" href="lib/noty/nest.css">
  <style type="text/css">
    #user-div {
      display: none
    }

    #login-div {
      display: none
    }

    #registration-div {
      display: none
    }

    #send-verification-div {
      display: none
    }
  </style>


<link rel="stylesheet" href="bootstrap/bootstrap.min.css">
<script src="bootstrap/jquery.min.js"></script>
<script src="bootstrap/bootstrap.min.js"></script>



<style>

.imagelogo_li_remove {
list-style-type: none;
margin: 0;
 padding: 0;
}

.imagelogo_data{
 width:120px;
 height:80px;
}



  .navbar {
    letter-spacing: 1px;
    font-size: 14px;
    border-radius: 0;
    margin-bottom: 0;
   background-color: #B931B9;

    z-index: 9999;
    border: 0;
    font-family: comic sans ms;
//color:white;
  }



  
.navbar-toggle {
background-color:orange;
  }

.navgate {
padding:16px;color:white;

}



.navgate:hover{
 color: black;
 background-color: orange;

}


.navbar-header{
height:60px;
}

.navbar-header-collapse-color {
background:white;
}

.dropdown_bgcolor{

background: #B931B9;
color:white;
}

.dropdown_dashedline{
 border-bottom: 2px dotted white;
}

.navgate101:hover{
background:fuchsia;
color:white;

}




.theta_css{
 color: black;
 background-color: #ccc;
 padding:8px;
 border:none;
border-radius:20%;

}

.theta_css:hover{
 color: black;
 background-color: orange;

}


.category_css{
background-color:#B931B9;
padding: 6px;
color:white;
font-size:14px;
border-radius: 15%;
border: none;
cursor: pointer;
text-align: center;
z-index: -999;
}
.category_css:hover {
background: black;
color:white;
}	



</style>




<!-- start column nav-->


<div class="text-center">
<nav class="navbar navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navgator">
        <span class="navbar-header-collapse-color icon-bar"></span>
        <span class="navbar-header-collapse-color icon-bar"></span>
        <span class="navbar-header-collapse-color icon-bar"></span> 
        <span class="navbar-header-collapse-color icon-bar"></span>                       
      </button>
     
<li class="navbar-brand home_click imagelogo_li_remove" ><img class="img-rounded imagelogo_data" src="logo12.png"></li>
    </div>
    <div class="collapse navbar-collapse" id="navgator">



      <ul class="nav navbar-nav navbar-right">





      </ul>


    </div>
  </div>



</nav>


    </div><br /><br />

<!-- end column nav-->




</head>

<body>
<br />
<center><h2 style='color:purple'>OneDrive Video Sync With Theta </h2>

 <h3>An Interactive System that allows Users, Companies, Organisations etc. to easily migrate  <b>OneDrive Videos</b> to <b>Theta Video Decentralized Network</b> Powered By  <br>OneDrive API, Theta Video API, Google
 Firebase Authentication  & Firebase Realtime Database Storage.</h3>  </center><br>




  <div class="container">
    <div class="row well" id="registration-div" style=''>
      <div class="login-box"> 
<a class="btn btn-primary pull-right" style='cursor:pointer;' onclick="myFunction_reload2()" class="btn btn-primary float-right">Login</a>
        <h2>Create an Account</h2>
        <div class="user-box">
  <label>Email</label>
          <input class="form-control" type="email" id="user_email" required="" placeholder='Email'>
        
        </div>
        <div class="user-box">
    <label>Password</label>
          <input class="form-control" type="password" id="user_password" required="" placeholder='Password'>
      
        </div>
        <div class="user-box">
<label>Confirm Password</label>
          <input class="form-control" type="password" id="confirm_password" required="" placeholder='Confirm Password'>
          
        </div>
        <div class="user-box">

          
          <a class="btn btn-info"  style='cursor:pointer;' onclick="registration()" class="btn btn-primary">Register</a>

<script>
function myFunction_reload2() {
  location.reload();
}
</script>


        </div>
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="row well alert alert-info" id="send-verification-div"  style=''>
      <div class="confirmation-box">
        <h2>Confirm Email</h2>
        <div class="user-box">
          <div id="user_para"></div>
          <p>To continue, please check your email and verify your account.</p>
          <a class="btn  btn-danger" style='cursor:pointer;' onclick="logout()">Logout</a>
        </div>
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="row  alert alert-info" id="login-div"   style=''>
      <div class="login-box">
 <a class="btn btn-primary pull-right"  style='cursor:pointer;' onclick="reg_account()">Register/Signup</a>
        <h2>Login</h2>
        <div class="user-box">
   <label>Email</label>
          <input class="form-control" type="email" id="email_field" name="email" id="" required=""   placeholder='Email'>
       
        </div>
        <div class="user-box">
  <label>Password</label>
          <input class="form-control" type="password" id="password_field" name="password" required=""  placeholder='Password'>
        
        </div>
        <div class="user-box">
          
          <a class="btn btn-info"  style='cursor:pointer;' onclick="login()">Login</a>
        </div>
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="row" id="user-div" >
      <div class="user-dashboard">
        <div class="grid-row  alert alert-success">
          <div class="grid-cell">

   
        <a class="btn btn-danger pull-right"  style='cursor:pointer;' onclick="logout()">Logout</a>

      
            <b>Welcome <span id="user_email_show">Loading ...</span> (<span id="user_uid_show">Loading ...</span>)</b>


          </div>
        </div>
   


<p>


<script>
$(document).ready(function(){
$(".onedrive_btn").click(function() {

var user_id = $('#onedrive_myInput_uid').val();
var user_email = $('#onedrive_myInput_email').val();
if(user_id ==''){
alert('User Login ID is Empty');
return false;
};


if(user_id != undefined){

sessionStorage.setItem('access_uid', user_id);
sessionStorage.setItem('access_email', user_email);

window.location='onedrive_settings.php';

}else{
alert('User Login ID Missing');
}

});
});



$(document).ready(function(){
$(".onedrive_btn2").click(function() {

var user_id = $('#onedrive_myInput_uid2').val();
var user_email = $('#onedrive_myInput_email2').val();
if(user_id ==''){
alert('User Login ID is Empty');
return false;
};


if(user_id != undefined){

sessionStorage.setItem('access_uid', user_id);
sessionStorage.setItem('access_email', user_email);

window.location='onedrive_dashboard.php';

}else{
alert('User Login ID Missing');
}

});
});


</script>


<div class='row'>

<div class='col-sm-6 theta_css'>

<center><h2>Step 1:</h2><h3>OneDrive API & Theta Video API Credential Settings</h3></center>
First Configure Your OneDrive API & Theta Video API Credential Settings....
<br>
<br>

<input type="hidden" id="onedrive_myInput_uid" />

<input  type="hidden" id="onedrive_myInput_email" />

<center><button title='Onedrive & Theta Video API Credential Settings'  class='onedrive_btn btn btn-primary'>Onedrive & Theta Video API Credential Settings</button></center>
</div>



<div class='col-sm-6 theta_css'>

<center><h2>Step 2:</h2><h3>Migrate OneDrive Videos Theta Video Cloud</h3></center>
Easily Migrate all your OneDrive Videos to Theta Video Clouds
<br>

<input type="hidden" id="onedrive_myInput_uid2" />

<input  type="hidden" id="onedrive_myInput_email2" />
<br>

<center><button title='Start Video Migration'  class='onedrive_btn2 btn btn-primary'>Start Video Migration</button></center>
</div>





</div>
</p>
      </div>
    </div>
    <div id="open-modal" class="modal-window">
      <div>
        <div class="login-box">
         
       
          <div class="user-box">
            <a class="button shift" id="" onclick=""></a>
            <!-- Save Information-->
          </div>
        </div>
      </div>
    </div>
</body>

<!-- Firebase -->
<script src="https://www.gstatic.com/firebasejs/5.7.0/firebase.js"></script>

<!-- Noty -->
<link href="lib/noty/noty.css" rel="stylesheet">
<link href="lib/noty/nest.css" rel="stylesheet">
<script src="lib/noty/noty.js" type="text/javascript"></script>

<!-- Firebase Config -->
<script type="text/javascript" src="./js/config/config.js"></script>

<!-- Functions -->
<script type="text/javascript" src="./js/notification.js"></script>
<script type="text/javascript" src="./js/login.js"></script>
<script type="text/javascript" src="./js/logout.js"></script>
<script type="text/javascript" src="./js/register.js"></script>
<script type="text/javascript" src="./js/sendVerification.js"></script>
<script type="text/javascript" src="./js/authState.js"></script>


</html>