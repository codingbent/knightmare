<?php
require_once 'library/vendor/autoload.php';

// init configuration
$clientID = '763787810786-eeru65p87r2r987p12nsjlevjbs5s93i.apps.googleusercontent.com';
$clientSecret = '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';
$redirectUri = 'http://localhost/knightmare/index.php';

// create Client Request to access Google API
$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope("email");
$client->addScope("profile");

// authenticate code from Google OAuth Flow
if (isset($_GET['code'])) {
  $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
  $client->setAccessToken($token['access_token']);

  // get profile info
  $google_oauth = new Google_Service_Oauth2($client);
  $google_account_info = $google_oauth->userinfo->get();
  $email =  $google_account_info->email;
  $name =  $google_account_info->name;

  // now you can use this profile info to create account in your website and make user logged in.
} else {
  echo "<a href='".$client->createAuthUrl()."'>Google Login</a>";
}
?>