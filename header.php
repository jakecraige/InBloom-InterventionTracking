<?php
session_start();

//open connection
$ch = curl_init();

$url = 'https://api.sandbox.inbloom.org/api/rest/v1.1/system/session/check';
//$url = 'https://api.sandbox.slcedu.org/api/rest/system/session/check';

$token = $_SESSION['access_token'];
$code = $_SESSION['code'];

$auth = sprintf('Authorization: bearer %s', $token);
//echo $auth;

$headers = array(
  'Content-Type: application/vnd.slc+json',
  'Accept: application/vnd.slc+json',
  $auth);

curl_setopt($ch, CURLOPT_URL, $url); 
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

if (DISABLE_SSL_CHECKS == TRUE) {
// WARNING: this would prevent curl from detecting a 'man in the middle' attack
// See note in settings.php 
  curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
  curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
}

//execute post
$result = curl_exec($ch);
// echo $result;
$json = json_decode($result);

// If response is '401 Unauthorized', redirect back to home page for authentication
if ($json->code == '401') {
  header('Location: index.php');
  die();
}

//close connection
curl_close($ch);


?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Intervention Thingy</title>
  <meta name="viewport" content="width=device-width">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
  <script src="http://twitter.github.com/bootstrap/assets/js/bootstrap.js"></script>
</head>
<body>
  <div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
      <div class="container">
        <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a href="/" class="brand">Intervention Thingy</a>
        <div class="nav-collapse collapse">
          <ul class="nav  pull-left">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">My Classes <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#"><i class="icon-user"></i> Attendance</a></li>
                <li><a href="#">Participation</a></li>
              </ul>
            </li>

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Manage Class <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#"><i class="icon-arrow-up"></i> Students</a></li>
                <li><a href="#">Interventions</a></li>
              </ul>
            </li>

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Schedule <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#"><i class="icon-user"></i>Parent Teacher Conference</a></li>
                <li><a href="#">Office Hours</a></li>
                <li><a href="#">In Class</a></li>
                <li><a href="#">Detentions</a></li>
              </ul>
            </li>
          </ul>

          <ul class="nav  pull-right">
            <li><a href="#"><i class="icon-arrow-up"></i> Parents</a></li>
            <li><p><?php echo $json->full_name; ?></p></li>
          </ul> <!-- .nav -->
        </div><!--/.nav-collapse -->
      </div>
    </div>
  </div>