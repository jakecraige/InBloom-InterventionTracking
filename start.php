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

//https://localhost/api/rest/v1.1/teachers/<UUID>/teacherSectionAssociations/sections

//foreach($json as $students) {
//  $found = false;
//  foreach($students->links as $links) {
//    //echo $links->rel;
//    if ($links->rel == "getStudentSectionAssociations" && !$found) {
//      $url = $links->href;
//      //echo $url . "<br/>";
//      curl_setopt($ch, CURLOPT_URL, $url);
//      $sections_result = curl_exec($ch);
//      print_r($sections_result);
//      $found = true;  
//    }
//  }
//}

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
  <script src="js/boostrap.min.js"></script>
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
                <li><a href="#"><i class="icon-user"></i> Attendance/a></li>
                <li><a href="#">Participation</a></li>
              </ul>
            </li>

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Manage Class <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#"><i class="icon-arrow-up icon-white"></i> Students</a></li>
                <li><a href="#">Interventions</a></li>
              </ul>
            </li>

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Schedule <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#"><i class="icon-user"></i>Parent Teacher Conference/a></li>
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



  <div class="container-fluid" style="margin-top: 5%;">
    <div class="row-fluid">
      <div class="span3">
       <ul class="sidebar-nav sidebar-nav-fixed unstyled">
         <li class="active"><a href="/">Home</a></li>
         <div class="accordion-group">
          <div class="accordion-heading">
            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1"  href="#collapseOne" >
             <i class="icon-chevron-right"></i>Students
           </a>
         </div>
         <div id="collapseOne" class="accordion-body collapse">
          <div class="accordion-inner">
            <li><a href="#comparestudents">Progress</a></li>
            <li><a href="#comparestudents">Grades</a></li>
            <li><a href="#comparestudents">Compare</a></li>
            <li><a href="#comparestudents">Graded Assignments</a></li>
          </div>
        </div>
      </div>  
      <div class="accordion-group">
        <div class="accordion-heading">
          <a class="accordion-toggle" data-toggle="collapse" data-parent= "#accordion2"  href= "#collapseTwo" >
           <i class="icon-chevron-right"></i> Classroom Management
         </a>
       </div>
       <div id="collapseTwo" class="accordion-body collapse">
        <div class="accordion-inner">
          <li><a href="#Campaigns">Attendance</a></li>
          <li><a href="#Leads">Enter Grades</a></li>
          <li><a href="#Accounts">Discipline</a></li>
        </div>
      </div>
    </div>  
    <div class="accordion-group">
      <div class="accordion-heading">
        <a class="accordion-toggle" data-toggle="collapse" data-parent= "#accordion3"  href= "#collapseThree" >
          <i class="icon-chevron-right"></i>Communication
        </a>
      </div>
      <div id="collapseThree" class="accordion-body collapse">
        <div class="accordion-inner">
          <li><a href="#tasks">Comment on Assignments</a></li>
          <li><a href="#depttasks">History</a></li>
          <li><a href="#cotasks">Schedule a Conference</a></li>
        </div>
      </div>
    </div>  
  </div> 
</div>
<div class="span9">
  <!--Body content-->
</div>
</div>
</div>
</body>
</html>