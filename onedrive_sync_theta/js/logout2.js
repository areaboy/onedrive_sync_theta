/**
 * @file logout2.js
 * @author Sanjay Sunil
 * @license MIT
 */

function logout() {
  firebase.auth().signOut();
  
  sessionStorage.removeItem("access_email");  
sessionStorage.removeItem("access_uid"); 
sessionStorage.clear();

  successNotification("Successfully logged out now!");
  window.location='index.php';
  
}