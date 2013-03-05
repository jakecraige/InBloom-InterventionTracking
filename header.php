<?php
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
  <title>inComm</title>
  <meta name="viewport" content="width=device-width">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="http://hunterskrasek.com/css/font-awesome.min.css">
  <link rel="stylesheet" href="http://www.cs.stedwards.edu/~sazua/cosc4157/shadowbox-3.0.3/shadowbox-3.0.3/shadowbox.css" type="text/css">
  <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
  <script src="http://www.cs.stedwards.edu/~sazua/cosc4157/shadowbox-3.0.3/shadowbox-3.0.3/shadowbox.js"></script>
  <script src="http://twitter.github.com/bootstrap/assets/js/bootstrap.js"></script>
  <script type="text/javascript">
    Shadowbox.init();
  </script>

  <style type="text/css">
      html, body {
        height: 100%;
        /* The html and body elements cannot have any padding or margin. */
      }

      /* Wrapper for page content to push down footer */
      #wrap {
        min-height: 100%;
        height: auto !important;
        height: 100%;
        /* Negative indent footer by it's height */
        margin: 0 auto -60px;
      }

      #push,
      #footer {
        height: 60px;
      }
      #footer {
        background-color: #000;
      }

      /* Lastly, apply responsive CSS fixes as necessary */
      @media (max-width: 767px) {
        #footer {
          margin-left: -20px;
          margin-right: -20px;
          padding-left: 20px;
          padding-right: 20px;
        }
      }

      .container .credit {
        margin: 20px 0;
      }
  </style>
</head>
<body>
  <div id="wrap">
    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a href="/" class="brand"><img src="img/incommlogo-small.png"> <span class="label label-important">Alpha</span></a>
          <div class="nav-collapse collapse">
            <ul class="nav  pull-left">
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-pencil"></i> Manage Class <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="#"><i class="icon-arrow-up"></i> Students</a></li>
                  <li><a href="#"><i class="icon-italic"></i> Interventions</a></li>
                </ul>
              </li>

              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-calendar"></i>Schedule <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="#"><i class="icon-user"></i> Parent Teacher Conference</a></li>
                  <li><a href="#"><i class="icon-time"></i> Office Hours</a></li>
                  <li><a href="#"><i class="icon-home"></i> In Class</a></li>
                  <li><a href="#"><i class="icon-lock"></i> Detentions</a></li>
                </ul>
              </li>
            </ul>

            <ul class="nav pull-right">
              <li><a href="#"><i class="icon-envelope"></i> Notifications <span class="badge">0</span></a></li>
              <li><?php print '<a href="#">'.$json->full_name.'</a>'; ?></li>
            </ul> <!-- .nav -->
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>