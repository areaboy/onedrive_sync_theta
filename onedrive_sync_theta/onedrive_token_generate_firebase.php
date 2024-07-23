



<?php
error_reporting(0);
if (isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {

$client_id = $_POST['client_id'];
$client_secret = $_POST['client_secret'];
$code = $_POST['auth_code'];
$redirect_uri = $_POST['redirect_url'];
$grant_type='authorization_code';



$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://login.microsoftonline.com/common/oauth2/v2.0/token");
curl_setopt($ch, CURLOPT_POST, TRUE);
$params = array(
    'client_id' => $client_id,
    'redirect_uri' => $redirect_uri,
    'client_secret' => $client_secret,
    'code' => $code,
    'grant_type' => 'authorization_code'
    );

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

    $headers = array();
  $headers[] = "Content-Type: application/x-www-form-urlencoded";
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");

    $data = curl_exec($ch);
    
   //var_dump($data);

$json = json_decode($data, true);
$error = $json['error'];

if($error !=''){
var_dump($data);
}

$access_token = $json['access_token'];
$refresh_token = $json['refresh_token'];
//echo $expires_in = $json['expires_in'];
if($access_token !=''){

//echo "<div style='background:green;padding:8px;color:white;border:none;'>OneDrive Access Token Successfully Generated...</div><br>";



// Send Refresh Token and Access Token to Firebase Database

echo "

<script>
$(document).ready(function(){

	$('.loader_send_tokenv').fadeIn(400).html('<br><div style=color:black;background:#ddd;padding:10px;><img src=loader.gif style=font-size:20px> &nbsp;Please Wait!. Sending Refresh Token and Access Token to Firebase Database</div>');
	
//var timestamp = Date.now();
var timestamp = '123456';
var access_token ='$access_token';
var refresh_token ='$refresh_token';
var client_id ='$client_id';
var client_secret ='$client_secret';

  // create db collection and send in the data
 var dataz =  db.ref('myapp_records_db/onedrive_access_token/' + timestamp).set({
    access_token,
refresh_token,
client_id,
client_secret,
  });

console.log(dataz);
//alert(dataz);
if(dataz== '[object Promise]'){
$('.loader_send_tokenv').hide();
$('.result_authv').html('<div style=background:green;padding:8px;color:white;border:none;>Access Token Successfully and  sent to Firebase DB. You can now access your OneDrive Video Files on the App</div><br>');
alert('Access Token Successfully and  sent to Firebase DB. You can now access your OneDrive Video Files on the App');
//window.location('');

}
	

});

</script>

<div class='loader_send_tokenv'></div>
<div class='result_authv'></div>
";

}




}else{
echo "<div style='background:red;padding:8px;color:white;border:none;'>Direct Access to this Page Not Allowed...</div>";

}


?>