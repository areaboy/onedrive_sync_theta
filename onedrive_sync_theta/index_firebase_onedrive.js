

// initialize database
const db = firebase.database();


var timestamp = Date.now();


// send Onedrive API cREDENTIALS  to firebase db starts

$(document).ready(function(){
$("#save_btn").click(function(e) {

e.preventDefault();

var client_id = $('#client_id').val();
var client_secret = $('#client_secret').val();
var redirect_url = $('#redirect_url').val();


if(client_id ==''){
alert('CLIENT Id cannot be Empty');
}
else if(client_secret ==''){
alert('CLIENT Secret cannot be Empty');
}

else if(redirect_url ==''){
alert('Redirect URL cannot be Empty');
}
else{
$('#loaderx').fadeIn(400).html('<br><span style=""><img src="loader.gif" align="absmiddle">&nbsp; Submiting Data. Pls. Wait..</span>');

  // create db collection and send in the data
 var data =  db.ref("myapp_records_db/onedrive_credentials_settings/" + timestamp).set({
    client_id,
client_secret,
    redirect_url,
  });

console.log(data);
if(data== '[object Promise]'){
$("#loaderx").hide();
//$("#resultx").html(msg);
//setTimeout(function(){ $('#resultx(''); }, 5000);

 $("#client_id").val('');
 $("#client_secret").val('');
 $("#redirect_url").val('');
alert ('Data Submitted Successfully');

}


}


});
});


// send Onedrive API cREDENTIALS  to firebase db ENDS





$(document).ready(function(){
const fetchData = db.ref("myapp_records_db/onedrive_credentials_settings/");


// check for new messages using the onChildAdded event listener
fetchData.on("child_added", function (snapshot) {


 const messages = snapshot.val();
if(messages == '[object Object]'){
//alert('Data Found');
$("#resultx").html("<div style='background:green;color:white;padding:6px;border:none;'>OneDrive Credentials Already Set</div>");
$("#resultxx").html("<div style='background:green;color:white;padding:6px;border:none;'>OneDrive Credentials Already Set</div>");



const end = '...';
const m_client_id = messages.client_id.substring(0, 5) + end;
const m_client_secret = messages.client_secret.substring(0, 5) + end;


const result = `<div style='background:green;color:white;padding:6px;border:none;'><span><b>Client Id:</b> ${m_client_id} </span><br> <span><b>Client Secret:</b> ${m_client_secret} </span><br>  <span><b>Redirect URL:</b> ${messages.redirect_url} </span><br></div>`;
$('.result_final').html(result);


$('.client_idx').val(messages.client_id).value;
$('.client_secretx').val(messages.client_secret).value;
$('.redirect_urlx').val(messages.redirect_url).value;
$('.client_idxp').html(messages.client_id);


}else{
//alert('No Credentials yet');
$("#resultx").html("<div style='background:green;color:white;padding:6px;border:none;'>OneDrive Credentials Not Set Yet</div>");
$("#resultxx").html("<div style='background:green;color:white;padding:6px;border:none;'>OneDrive Credentials Not Set Yet</div>");
}
 
});
});








$(document).ready(function(){
$("#proceed_btn").click(function(e) {

e.preventDefault();

var client_id = $('.client_idx').val();
var redirect_url = $('.redirect_urlx').val();


if(client_id ==''){
alert('CLIENT Id cannot be Empty. Please Ensure that you completed Setup Step 1.');
}

else if(redirect_url ==''){
alert('Redirect URL cannot be Empty. Please Ensure that you completed Setup Step 1.');
}
else{
$('#loader_proceed').fadeIn(400).html('<br><span style=""><img src="loader.gif" align="absmiddle">&nbsp; Processing..</span>');



alert ('Data Processed Successfully');

const result = `<br><a target='_blank' style='background:#800000;color:white;padding:10px;border:none;font-size:20px' href='https://login.microsoftonline.com/common/oauth2/v2.0/authorize?client_id=${client_id}&scope=files.readwrite offline_access&response_type=code&redirect_uri=${redirect_url}'>Click to Authenticate via OneDrive Now</a><br>`;
$('.result_authenticate').html(result);

$("#loader_proceed").hide();

}


});
});



// get onedrive refresh and access token from firebase db






$(document).ready(function(){
const fetchData2 = db.ref("myapp_records_db/onedrive_access_token/");

$('.loader_fetch').fadeIn(400).html('<br><span style="background:#ddd;color:black;padding:6px;border:none;"><img src="loader.gif" align="absmiddle">&nbsp;Please Wait Fetching OneDrive Token in Progress..</span>');


// check for new messages using the onChildAdded event listener
fetchData2.on("child_added", function (snapshot) {

 const res = snapshot.val();

//alert(res);

$('.refresh_tokenx').val(res.refresh_token).value;
$('.access_tokenx').val(res.access_token).value;
$('.access_token_onedrive').val(res.access_token).value;

const end = '...';
const m_refresh_tokenx = res.refresh_token.substring(0, 5) + end;
const m_access_tokenx = res.access_token.substring(0, 5) + end;

$('.client_id_rt').val(res.client_id).value;
$('.client_secret_rt').val(res.client_secret).value;
$('.refresh_token_rt').val(res.refresh_token).value;



  const result_x = `<div style='background:green;color:white;padding:6px;border:none;'><span><b>Access Token:</b> ${m_access_tokenx} </span><br> <span><b>Refresh_token:</b> ${m_refresh_tokenx} </span><br></div>`;
$('.result_final_x').html(result_x);


if(m_refresh_tokenx !=''){
//alert('OneDrive Access Token Successfully fetched.');
$(".loader_fetch").hide();
$('.result_fetch').html("<div style='background:green;color:white;padding:6px;border:none;'>OneDrive Access Token Successfully fetched</div>");

}

  
});

});












// send theta API Credentials to firebase db starts

$(document).ready(function(){
$("#theta_btn").click(function(e) {

e.preventDefault();

var theta_api_key = $('#theta_api_key').val();
var theta_api_secret = $('#theta_api_secret').val();



if(client_id ==''){
alert('Theta API Key cannot be Empty');
}
else if(theta_api_secret ==''){
alert('Theta API Secret cannot be Empty');
}

else if(redirect_url ==''){
alert('Redirect URL cannot be Empty');
}
else{
$('#loader_theta').fadeIn(400).html('<br><span style=""><img src="loader.gif" align="absmiddle">&nbsp; Submiting Data. Pls. Wait..</span>');

  // create db collection and send in the data
 var data =  db.ref("myapp_records_db/theta_credentials_settings/" + timestamp).set({
    theta_api_key,
theta_api_secret,
  });

console.log(data);
if(data== '[object Promise]'){
$("#loader_theta").hide();
//$("#result_theta").html(msg);
//setTimeout(function(){ $('#result_theta(''); }, 5000);

 $("#theta_api_key").val('');
 $("#theta_api_secret").val('');
alert ('Data Submitted Successfully');

}


}


});
});

// send theta API Credentials to firebase db ends






// fetch theta credentials from Firebase

$(document).ready(function(){
const fetchData3 = db.ref("myapp_records_db/theta_credentials_settings/");


$('.loader_fetch2').fadeIn(400).html('<br><span style="background:#ddd;color:black;padding:6px;border:none;"><img src="loader.gif" align="absmiddle">&nbsp;Please Wait. Fetching Theta API Credentials from Firebase in Progress..</span>');

// check for new data using the onChildAdded event listener
fetchData3.on("child_added", function (snapshot) {


 const rec_data = snapshot.val();
if(rec_data == '[object Object]'){
//alert('Data Found');
$("#resultx_nox").html("<div style='background:green;color:white;padding:6px;border:none;'>Theta Credentials Already Set</div>");
$("#resultxx_nox").html("<div style='background:green;color:white;padding:6px;border:none;'>Theta Credentials Already Set</div>");



const end = '...';
const m_theta_api_key = rec_data.theta_api_key.substring(0, 5) + end;
const m_theta_api_secret = rec_data.theta_api_secret.substring(0, 5) + end;


const result_theta = `<div style='background:green;color:white;padding:6px;border:none;'><span><b>Theta API key:</b> ${m_theta_api_key} </span><br> <span><b>Theta API Secret:</b> ${m_theta_api_secret} </span><br></div>`;
$('.result_final_theta').html(result_theta);


$('.theta_api_keyx').val(rec_data.theta_api_key).value;
$('.theta_api_secretx').val(rec_data.theta_api_secret).value;


if(m_theta_api_key !=''){
//alert('Theta API CREDENTIALS Successfully fetched.');
$(".loader_fetch2").hide();
$('.result_fetch2').html("<div style='background:green;color:white;padding:6px;border:none;'>Theta API CREDENTIALS Successfully fetched. You can now View Theta Videos</div>");

}


}else{
//alert('No Credentials yet');
$("#resultx_nox").html("<div style='background:green;color:white;padding:6px;border:none;'>Theta Credentials Not Set Yet</div>");
$("#resultxx_nox").html("<div style='background:green;color:white;padding:6px;border:none;'>Theta Credentials Not Set Yet</div>");
}
 
});
});


