



<?php
error_reporting(0);
if (isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {


 //$folder_name='documents';

 $access_token = trim($_POST['access_token_value']);
 $folder_name = $_POST['folder_name'];
 $ch = curl_init();
    
    curl_setopt($ch, CURLOPT_URL, "https://graph.microsoft.com/v1.0/me/drive/special/$folder_name/children");
    
    curl_setopt($ch, CURLOPT_POST, TRUE);
    
  

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

    $headers = array();
    $headers[] = "Authorization: Bearer $access_token";
  //$headers[] = "Content-Type: application/x-www-form-urlencoded";
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    
    //curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");



$http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);

// catch error message before closing
if (curl_errno($ch)) {
    //echo $error_msg = curl_error($ch);
}


    $data = curl_exec($ch);



if($data ==''){

echo "<div id='alertdata_uploadfiles_o' style='background:red;color:white;padding:10px;border:none;'>
 Please Ensure there is Internet Connections and Try Again</div><br>";
exit();
}


    
    //var_dump($data);


//$json = json_encode(json_decode($data, true));
//$json = json_decode(json_encode($data, true));
//print_r($json);



$json = json_decode($data, true);
$error = $json['error']['code'];
$error_msg = $json['error']['message'];
if($error=='InvalidAuthenticationToken'){
echo "<div class='alerts_fadesx_no' style='background:red;color:white;padding:10px;border:none;'>Invalid OneDrive Authentication Token. </div><br>";

echo "<div class='loader_rtt'></div>
<div class='result_rtt'></div>
<button type='button' class='refresh_token_rt_btn btn btn-danger btn-sm' title='Click to Get a New Access Token'>Click to Get a New Access Token</button>";

exit();

}


if($error=='invalidRequest'){
echo "<div class='alerts_fadesx' style='background:red;color:white;padding:10px;border:none;'>Error: $error_msg</div><br>";
exit();

}










$file_count = $json['@odata.count'];

if($file_count =='0'){

echo "<div id='alertdata_uploadfiles_o' style='background:red;color:white;padding:10px;border:none;'>
There is no File in this Directory/Folder <b>$folder_name</b>  </div><br>";
exit();
}



echo "<center><h3>Total File in Folder <b>$folder_name</b> is <b>$file_count</b></h3></center>";



echo '<table border="0" cellspacing="2" cellpadding="2" class="table table-striped_no table-bordered table-hover"> 
      <tr> 
          <th> <font face="Arial">Name</font> </th> 
          <th> <font face="Arial">Size</font> </th> 
 <th> <font face="Arial">Created DateTime</font> </th> 

          <th> <font face="Arial">Migrate to Theta</font> </th> 



      </tr>';



foreach ($json['value'] as $row) {
$idx = $row['id'];

$name = $row['name'];
$mime_type = $row['file']['mimeType'];
$size = $row['size'];
$createdDateTime = $row['createdDateTime'];
$fileurl = $row['@microsoft.graph.downloadUrl'];



// get only alphanumeric characters

$id = preg_replace("/[^a-zA-Z0-9]+/", "", $idx);


   echo "<tr> 
<td>$name</td>

                  <td>$size</td>  
<td>$createdDateTime</td>                
                  <td><b>Video URL:</b> $fileurl
<br>

<div id='loaderlz_$id'></div>
<div id='resultlz_$id'></div>

<div id='loaderlx_$id'></div>
<div id='resultlx_$id'></div>
<button type='button' class='file_migrate_btn btn btn-danger btn-sm' data-mime_type='$mime_type' data-id='$id' data-file='$fileurl' data-filename='$name' >Migrate Video to Theta Video Cloud</button>
</td>  
              </tr>";

}




}else{
echo "<div style='background:red;padding:8px;color:white;border:none;'>Direct Access to this Page Not Allowed...</div>";

}


?>