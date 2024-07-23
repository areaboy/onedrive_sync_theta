<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>OneDrive Video Sync With Theta</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



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



/* make modal appear at center of the page */
.modal-appear-center {
margin-top: 25%;
//width:40%;
}


/* make modal appear at center of the page */
.modal-appear-center1 {
margin-top: 15%;
//width:40%;
}
.modal-appear-center2 {
margin-top: 10%;
//width:40%;
}



.modal_head_color{
background-color: #B931B9;
padding: 6px;
color:white;
}


.modal_footer_color{
background-color: #B931B9;
padding: 6px;
color:white;
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

<script>

$(document).ready(function(){


var sess_uid_id = sessionStorage.getItem('access_uid');
var sess_email_id = sessionStorage.getItem('access_email');
$('#user_email_show').html(sess_email_id);
$('#user_uid_show').html(sess_uid_id);


if (sess_uid_id== null || sess_uid_id == undefined) {
  alert('You Must go to home Page To Access this Page');
window.location='index.php';
return false;
}



});

</script>



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




 <li class="navgate_no"><a title='Go Back To Dashboard' href="index.php" style="color:white;font-size:14px;">
<button class="category_css">Go Back To Dashboard</button></a></li>


 <li class="navgate_no"><a title='Logout' style="color:white;font-size:14px;">
<button onclick="logout()" class="category_css">Logout</button></a></li>


      </ul>


    </div>
  </div>



</nav>


    </div><br /><br />

<!-- end column nav-->




</head>

<body>
<br />

<br>
<div class="row">
     
<div class="alert alert-success">

            <h4 style='color:purple'>Welcome! <span id="user_email_show">Loading ...</span>.<h4>

      

       <center><h3>OneDrive Video Sync With Theta Cloud</h3></center><br>

<h3>Application Settings: ------  Steps to Follow:</h3>

Step 1.) <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal1">Enter OneDrive Access Credentials -- QuickStarts</button><br><br>



Step 2.) <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal2">Generate OneDrive Access Token</button><br><br>


Step 3.) <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal3">Theta Video API Credential Settings</button><br><br>




<div class='loader_refresh'></div>
<div class='result_refresh'></div>

          </div>
        </div>



<!-- start modal 1 -->


<!-- Modal -->
<div id="myModal1" class="modal fade  modal-appear-center2" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header modal_head_color">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">How to Get and Process  your OneDrive Access Credentials</h4>
      </div>
      <div class="modal-body">
        <p>
<h3>How to Get and Process  your OneDrive Access Credentials</h3>

1.) Goto <a target='_blank' href='https://aka.ms/AppRegistrations/?referrer=https%3A%2F%2Fdev.onedrive.com'> 
https://aka.ms/AppRegistrations/?referrer=https%3A%2F%2Fdev.onedrive.com </a>  to register your App.<br>

2.) Click on <b>New Registration</b> and enter Your App Name Eg. <b>Theta Video Migrator</b>. next select 

"<b>Accounts in this organizational directory only (Default Directory only - Single tenant)</b>" and then click on <b>register</b> button.

Later, you can view the app you created  by clicking  on <b>All Application</b> and then select your App.<br><br>



<h4>To get your OneDrive Access Credentials</h4>

You will need this 3 credentials

 <b>Client ID, Client Secret and Redirect URL.</b><br><br>



1.) Click on the App Name that you just registered eg  <b>Theta Video Migrator</b>.   Go to <b>Authentication</b>.----> under <b>Web Redirect URL</b>, 
enter your authentication redirect url  eg.  <b>http://localhost/onedrive_sync_theta/onedrive_url_redirect.php  or  
https://yoursite.com/onedrive_sync_theta/onedrive_url_redirect.php   </b>  scroll down and click on <b>Save</b>.<br>

2.) To get <b>Client ID</b>, click on the app <b>Overview</b><br>

3.) To get  <b>Client Secret</b>, goto <b>Manage</b> ---> then Click on <b>certificate and secrets.</b>  click on  <b>new client secret</b> button  and copy the <b>secret value</b> after creation

<br><br>

Once You are ready. Enter your OneDrive Access Credentials in the Form Below  and click on Save<br><br>

<div id='resultxx'></div><br>

<div class='result_final'></div>
  
      <form id="">


 

 <div class="form-group">
              <label>Client ID: </label>
        <input id="client_id" type="text" class="col-sm-12 form-control" placeholder="Client ID" />
</div>


 <div class="form-group">
              <label>Client Secret: </label>
 <input id="client_secret" type="password" class="col-sm-12 form-control"  placeholder="Client Secret"  />
</div>


 <div class="form-group">
              <label>Redirect URL Eg.: (http://localhost/onedrive_sync_theta/onedrive_url_redirect.php  or  
https://yoursite.com/onedrive_sync_theta/onedrive_url_redirect.php) </label>

 <input id="redirect_url" type="text" class="col-sm-12 form-control"  placeholder=" Redirect URL Eg. http://localhost/onedrive_sync_theta/onedrive_url_redirect.php  or  
https://yoursite.com/onedrive_sync_theta/onedrive_url_redirect.php"  />

</div>

<div class="col-sm-12">
<div id='loaderx'></div>
<br>
        <button id="save_btn" type="submit" class="btn btn-primary">Save</button>
</div>


<br>
<div id='resultx' class="col-sm-12"></div>

<div class='result_final'></div>
      </form>
   


</p>
      </div>
      <div class="modal-footer modal_footer_color">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
 
<!-- end modal 1 -->








<!-- start modal 2 -->


<!-- Modal -->
<div id="myModal2" class="modal fade  modal-appear-center2" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header modal_head_color">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Generate OneDrive Access Token</h4>
      </div>
      <div class="modal-body">
        <p>
<h3>How to Generate OneDrive Access Token & Refresh Token Respectively....</h3>


<div class='result_final_no'></div>
<div class='result_final_x' class="col-sm-12"></div>



  
      <form id="">

 
<input class="client_idx" type="hidden" value=''/>

<input class="client_secretx" type="hidden" value=''/>

<input class="redirect_urlx" type="hidden" value=''/>






<div class="col-sm-12">
<div id='loader_proceed'></div>
<div class='result_authenticate'></div>

<br>
        <button id="proceed_btn" type="submit" class="btn btn-primary">Proceed Now</button>
</div>


<br>
<div id='resultx' class="col-sm-12"></div>


      </form>
   


</p>
      </div>
      <div class="modal-footer modal_footer_color">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
 
<!-- end modal 2 -->









<!-- start modal 3 -->


<!-- Modal -->
<div id="myModal3" class="modal fade  modal-appear-center2" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header modal_head_color">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Theta Video API Credential Settings</h4>
      </div>
      <div class="modal-body">
        <p>
<h3>Set Your Theta Video API Keys and Secrets</h3>

<div class='result_final_theta' class="col-sm-12"></div>



  
      <form id="">


 <div class="form-group">
              <label>Theta API Keys: </label>
 <input id="theta_api_key" type="text" class="col-sm-12 form-control"  placeholder="Theta API Keys"  />
</div>


 <div class="form-group">
              <label>Theta API Secret: </label>
 <input id="theta_api_secret" type="password" class="col-sm-12 form-control"  placeholder="Theta API Secret"  />
</div>
 

<div class="col-sm-12">
<div id='loader_theta'></div>
<div class='result_theta'></div>

<br>
        <button id="theta_btn" type="submit" class="btn btn-primary">Save</button>
</div>


<br>
<div id='resultx' class="col-sm-12"></div>


      </form>
   


</p>
      </div>
      <div class="modal-footer modal_footer_color">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
 
<!-- end modal 3 -->



</body>



    <!-- firebase scripts -->
    <script src="https://www.gstatic.com/firebasejs/8.2.1/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.2.1/firebase-database.js"></script>
  

<!-- Firebase -->
<script src="https://www.gstatic.com/firebasejs/5.7.0/firebase.js"></script>

<!-- Noty -->
<link href="lib/noty/noty.css" rel="stylesheet">
<link href="lib/noty/nest.css" rel="stylesheet">
<script src="lib/noty/noty.js" type="text/javascript"></script>

<!-- Firebase Config -->
<script type="text/javascript" src="./js/config/config.js"></script>
  <script src="index_firebase_onedrive.js"></script>

<!-- Functions -->
<script type="text/javascript" src="./js/notification.js"></script>
<script type="text/javascript" src="./js/login.js"></script>
<script type="text/javascript" src="./js/logout2.js"></script>
<script type="text/javascript" src="./js/register.js"></script>
<script type="text/javascript" src="./js/sendVerification.js"></script>
<script type="text/javascript" src="./js/authState.js"></script>





</html>