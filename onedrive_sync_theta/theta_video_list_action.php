<?php

error_reporting(0);



if (isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {


$api_key = $_POST['theta_api_key'];
$api_secret = $_POST['theta_api_secret'];


$url ="https://api.thetavideoapi.com/video/$api_key/list?page=1&number=100";


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




if($video_count =='0'){

echo "<div id='alertdata_uploadfiles_o' style='background:red;color:white;padding:10px;border:none;'>No Video Uploaded or Migrated to Theta Yet..</div><br>";
exit();
}


echo "<center><h3> Total Video Migrated to Theta is: ($video_count)</h3></center>";





echo '<table border="0" cellspacing="2" cellpadding="2" class="table table-striped_no table-bordered table-hover"> 
      <tr> 
          <th> <font face="Arial">Video Name</font> </th> 
          <th> <font face="Arial">Video State</font> </th> 
         <th> <font face="Arial">Video Progress</font> </th>
<th> <font face="Arial">Video PlayBack URL</font> </th>




      </tr>';


foreach ($json['body']['videos'] as $row) {

$video_id = $row['id'];
$video_playback_uri = $row['playback_uri'];
$video_file_name = $row['file_name'];
$video_state = $row['state'];
$video_create_time = $row['create_time'];
$video_progress = $row['progress'];
$video_file_name = $row['file_name'];
$video_src = "https://player.thetavideoapi.com/video/$video_id";
$video_mimetype = $row['metadata']['video_mimetype'];


 echo "<tr> 
<td>$video_file_name($video_mimetype)</td>

                  <td>$video_state</td>  
<td><b style='color:purple;'>$video_progress(%)</b></td>                
                  <td><b>Video URL:</b> $video_playback_uri
<br>

<button title='Play Video' data-toggle='modal' data-target='#myModal_theta' type='button' class='video_btn_theta btn btn-primary btn-sm' data-progress='$video_progress' data-src='$video_src' data-mime_type='$video_mimetype' data-id='$video_id' data-playback_uri='$video_playback_uri' data-filename='$video_file_name' >Play Video</button>
&nbsp;&nbsp;&nbsp;&nbsp;<button title='Embed Theta Video Code in Website' data-toggle='modal' data-target='#myModal_theta2' type='button' class='video_btn_theta2 btn btn-danger btn-sm' data-progress='$video_progress' data-src='$video_src' data-mime_type='$video_mimetype' data-id='$video_id' data-playback_uri='$video_playback_uri' data-filename='$video_file_name' >Embed Theta Video Code in Website</button>


</td>  
              </tr>";

}


}else{
echo "<div style='background:red;padding:8px;color:white;border:none;'>Direct Access to this Page Not Allowed...</div>";

}


?>