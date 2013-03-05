<?php
session_start();
include_once 'settings.php';
include_once 'api.php';

$api = new API(BASE_API, $_SESSION['access_token'], $_SESSION['code']);
$json = $api->execute('system/session/check');
if ($json->code == '401') {
  header('Location: index.php');
  die();
}
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
        <a href="/" class="brand">Intervention Thingy <span class="label label-important">Alpha</span></a>
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

          <ul class="nav pull-right">
            <li><?php print '<a href="#">'.$json->full_name.'</a>'; ?></li>
          </ul> <!-- .nav -->
        </div><!--/.nav-collapse -->
      </div>
    </div>
  </div>