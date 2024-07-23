<?php
error_reporting(0);
if (isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {

$file = $_POST['file'];
$filename = $_POST['filename'];
$api_key = $_POST['theta_api_keyx'];
$api_secret = $_POST['theta_api_secretx'];

$uploaded_video_url = $file;

$mime_type = $_POST['mime_type'];
$onedrive_video_id = $_POST['id'];



if ($uploaded_video_url == ''){
echo "<div class='alert alert-danger' id='alerts_reg'><font color=red>Uploaded Video URL is empty</font></div>";
exit();
}


// Check if this Onedrive Video has been Migrated to Theta Video Cloud Before


$url ="https://api.thetavideoapi.com/video/$api_key/search?key=$onedrive_video_id";


$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, TRUE);
curl_setopt($ch, CURLOPT_HTTPHEADER, array("x-tva-sa-id: $api_key", "x-tva-sa-secret: $api_secret", 'Content-Type: application/json'));  
//curl_setopt($ch, CURLOPT_POSTFIELDS, $data_param);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
//curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$output = curl_exec($ch); 



$http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);

// catch error message before closing
if (curl_errno($ch)) {
    //echo $error_msg = curl_error($ch);
}

curl_close($ch); 


$json = json_decode($output, true);
$video_status = $json['status'];
$video_count = $json['body']['pagination']['count'];

$error_message = $json['message'];

if($output ==''){

echo "<div id='alertdata_uploadfiles_o' style='background:red;color:white;padding:10px;border:none;'>
 Please Ensure there is Internet Connections and Try Again</div><br>";
exit();
}


if($video_status =='error'){

echo "<div id='alertdata_uploadfiles_o' style='background:red;color:white;padding:10px;border:none;'>
Error:  $error_message </div><br>";
exit();
}



//if($video_count =='1'){
if($video_count > '0'){

echo "<div id='alertdata_uploadfiles_o' style='background:red;color:white;padding:10px;border:none;'>
This Video is Already migrated/Uploaded to Theta Cloud...</div><br>";
exit();
}




// Upload and Migrate Onedrive Video to Theta Cloud

$data_param = '{
       "source_uri": "'.$uploaded_video_url.'",
    "playback_policy": "public",
    "nft_collection": "0x5d0004fe2e0ec6d002678c7fa01026cabde9e793",
    "file_name":  "'.$filename.'",
     "metadata": {
    		"key": "'.$onedrive_video_id.'",
                "video_mimetype": "'.$mime_type.'"
    }

}';

$url ="https://api.thetavideoapi.com/video";


$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, TRUE);
curl_setopt($ch, CURLOPT_HTTPHEADER, array("x-tva-sa-id: $api_key", "x-tva-sa-secret: $api_secret", 'Content-Type: application/json'));  
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_param);
//curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
 $output = curl_exec($ch); 



$http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);

// catch error message before closing
if (curl_errno($ch)) {
    //echo $error_msg = curl_error($ch);
}

curl_close($ch); 


$json = json_decode($output, true);
$video_status = $json['status'];
$video_id = $json['body']['videos'][0]['id'];
$video_progress = $json['body']['videos'][0]['progress'];
$video_state = $json['body']['videos'][0]['state'];
$file_name = $json['body']['videos'][0]['file_name'];
$error_message = $json['message'];

if($output ==''){

echo "<div id='alertdata_uploadfiles_o' style='background:red;color:white;padding:10px;border:none;'>
 Please Ensure there is Internet Connections and Try Again</div><br>";
exit();
}


if($video_status =='error'){

echo "<div id='alertdata_uploadfiles_o' style='background:red;color:white;padding:10px;border:none;'>
Error:  $error_message </div><br>";
exit();
}



if($video_status == 'success'){

echo "<div style='background:green;padding:8px;color:white;border:none;'>Video Successfully Uploaded to Theta Video Cloud</div>";

}

              else {
echo "<div style='background:red;padding:8px;color:white;border:none;'>Video  Uploads to Theta Failed</div>";
                }






}else{
echo "<div style='background:red;padding:8px;color:white;border:none;'>Direct Access to this Page Not Allowed...</div>";

}


?>