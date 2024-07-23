/**
 * @file authState.js
 * @author Sanjay Sunil
 * @license MIT
 */

 
		    
firebase.auth().onAuthStateChanged(function (user) {
  if (user) {
    var user = firebase.auth().currentUser;
    globalEmail = user.email;
    if (user != null) {
      var email_id = user.email;
      var email_verified = user.emailVerified;
	  var displayName = user.displayName;
	    
            var photoURL = user.photoURL;
            var uid = user.uid;
            var phoneNumber = user.phoneNumber;
            var providerData = user.providerData;
			var accessToken = user.getIdToken;
			   user.getIdToken().then(function(accessToken) {
             var accessToken1 = accessToken;
			 var refreshToken = refreshToken;
          
            });
			
			
      if (email_verified != true) {
        // User Verification Box displayed
        console.log("Waiting for verification ...")
        document.getElementById("user-div").style.display = "none";
        document.getElementById("login-div").style.display = "none";
        document.getElementById("registration-div").style.display = "none";
        document.getElementById("send-verification-div").style.display =
          "block";
        document.getElementById("user_para").innerHTML = "Email : " + email_id;
        send_verification();
      } else {
        // User is logged in
        console.log("User is logged in.")
        successNotification("Welcome, " + email_id + "!")
		
        document.getElementById("user-div").style.display = "block";
        document.getElementById("login-div").style.display = "none";
        document.getElementById("registration-div").style.display = "none";
        document.getElementById("send-verification-div").style.display = "none";
        document.getElementById("user_email_show").innerHTML = email_id;
        document.getElementById("user_uid_show").innerHTML = uid;
    
        document.getElementById("onedrive_myInput_uid").value = uid;
        document.getElementById("onedrive_myInput_email").value = email_id;

        document.getElementById("onedrive_myInput_uid2").value = uid;
        document.getElementById("onedrive_myInput_email2").value = email_id;


      }
    }
  } else {
    // No user is signed in.
    console.log("You are currently not logged in to any account.")
    document.getElementById("user-div").style.display = "none";
    document.getElementById("login-div").style.display = "block";
    document.getElementById("registration-div").style.display = "none";
    document.getElementById("send-verification-div").style.display = "none";
  }
});

function reg_account() {
  document.getElementById("registration-div").style.display = "block";
  document.getElementById("login-div").style.display = "none";
  document.getElementById("send-verification-div").style.display = "none";
}