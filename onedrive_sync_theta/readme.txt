OneDrive Video Sync For Theta

An is an Interactive System that allows Users, Companies, Organisations etc. to easily sync and migrate their videos in OneDrive Cloud Storage to Theta 
Video Decentralized Network. .

OneDrive Video Sync For Theta automatically offload the heavy task of Video Syncing and migration from OneDrive Cloud Storage to Theta Video Decentralized 
Ecosystem thus saving millions of Users, developers, Companies etc. time and energy while allowing them to focus on their other areas of businesses.

This application is powered by OneDrive API, Theta Video API, Google Firebase Authentication & Firebase Storage.

For Google Firebase Authentication, I leveraged MIT Open source sample Code 
https://github.com/SanjaySunil/firebase-login

Application SourceCode can be downloaded from https://github.com/areaboy/onedrive_sync_theta




How to Setup the Application:

1.) Visit Theta Video Decentralized Network at https://www.thetaedgecloud.com/ then signup, login to get your Theta Video API Keys and API Secrets.

2.) For OneDrive API Configuration, Full Instructions on how to configure and get your OneDrive API Credentials are fully detailed on our App Settings Page 
when you signup and login.

3.) To setup Google Firebase System. Goto https://firebase.google.com/pricing and

Select free plan and proceed. You will be required to enter project name. You can name it anything Eg. OnedrivesyncForTheta.

Next Click on Project Overview at top left eg https://console.firebase.google.com/project/YOUR-PRJECT-ID-HERE/overview. 
Then Scroll down Go to Authentication under Signin method and select Email/Password and click on Enable button.

Next Still on Project Overview at left top click on Settings icon ---> project settings --> under General tab scroll down the page then click Add App button 
and select (</>) symbol which is for Web Applications. Next, you will be required to register your App. 

So enter any name as your app nickname eg onedrivesync_theta_app and click on Register App Button (step 1.)

In (Step 2.) under Add Firebase SDK , select Use a <script> tag Then Copy your firebase credentials only eg:

const firebaseConfig = {

 apiKey: "xxxxxx",

    authDomain: "onedrivesyncxxxxxx",

    databaseURL: "https://onedrivesyncxxxxxxx-default-rtdb.firebaseio.com",

    projectId: "onedrivesync-xxxxx",

    storageBucket: "onedrivesync-xxxxx.appspot.com",

    messagingSenderId: "xxxxxxxxx",

    appId: "xxxxxxxxxxx",

    measurementId: "xxxxxxxxxxxx"
  };




Next go to our app source code and under the following directory onedrive_sync_theta/js/config/config.js and paste the above code there and save it. 
Ensure there is no empty line spaces in the config.js file. You are done.

Its time to configure Realtime Database: Click on Project Overview at left top eg.
 https://console.firebase.google.com/project/YOUR-PRJECT-ID-HERE/overview scroll down and click see all Firebase features and 
select Realtime Database next click on Create Database. next select Start in test mode and click Enable Button and Realtime Database button will 
appear on your project Page indicating that you have successfully Configured Firebase Realtime Database.

Finally,its time to setup your Real-time Database Security to prevent unauthorized Access. Click on Real-time Database button on your 
project Page ----> under Rules tab, delete what ever rule that is there and copy and paste the following code below and click on publish button

{
  "rules": {
    "myapp_records_db": {
      "onedrive_access_token": {
        ".read": true,
        ".write": true
      },
        "onedrive_credentials_settings": {
        ".read": true,
        ".write": true
      },
      "theta_credentials_settings": {
        ".read": true,
        ".write": true
      }
    }
  }
}


you are done. Everything is now fully configured

Just a hint, If you are a Developer, optionally, you can modify our SourceCode and create more deeper security rules. 

Firebase Security rules config can be found here https://firebase.google.com/docs/database/security



How To Test the Application:

This application was built with PHP, Ajax, JQUERY, Bootstraps, Css and is powered by OneDrive API, Theta Video API, 
Google Firebase Authentication & Firebase Storage.


1.) You will need Xampp Server Installed.  Ensure that PHP is installed and that Apache Server has been started from Xampp Control Panel.

2.) Extract and Copy the app sourcecode to xampp htdocs directory eg. C:\xampp\htdocs. Finally everything will look like
C:\xampp\htdocs\onedrive_sync_theta

3.) Edit Config.js file at the following directory onedrive_sync_theta/js/config/config.js and paste your firebase credentials there where appropriates
 and save it. Ensure there is no empty line spaces in the config.js file. 


See Firebase Credential above or see it here again


const firebaseConfig = {

 apiKey: "xxxxxx",

    authDomain: "onedrivesyncxxxxxx",

    databaseURL: "https://onedrivesyncxxxxxxx-default-rtdb.firebaseio.com",

    projectId: "onedrivesync-xxxxx",

    storageBucket: "onedrivesync-xxxxx.appspot.com",

    messagingSenderId: "xxxxxxxxx",

    appId: "xxxxxxxxxxx",

    measurementId: "xxxxxxxxxxxx"
  };



Save it. You are done.



4.) Callup the application on the browser Eg http://localhost/onedrive_sync_theta/index.php

