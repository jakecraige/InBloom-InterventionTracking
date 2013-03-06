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
  <title>inComm - Alpha</title>
  <meta name="viewport" content="width=device-width">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="http://hunterskrasek.com/css/font-awesome.min.css">
  <link rel="stylesheet" href="http://hunterskrasek.com/css/shadowbox.css" type="text/css">
  <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
  <script src="http://hunterskrasek.com/js/shadowbox.js"></script>
  <script src="http://twitter.github.com/bootstrap/assets/js/bootstrap.js"></script>
  <script src="http://hunterskrasek.com/js/usergrid.min.js"></script>

  <script type="text/javascript">
  Shadowbox.init({viewportPadding:50});
  </script>

  <script type="text/javascript">
  $(document).ready(function(){
    $('.student').on("click", updateStudentAttendance);
    $('.student').dblclick(markTardy);
  });


  function updateStudentAttendance(event)
  {
    // alert($(this).attr('id'));
    if ($(this).hasClass('here')) {
      $(this).removeClass('here');
      $(this).addClass('absent');
    } else if ($(this).hasClass('absent')) {
      $(this).removeClass('absent');
      $(this).addClass('here');
    }
    
  }

  function markTardy(event)
  {
    if ($(this).hasClass('here')) {
      $(this).removeClass('here');
      $(this).addClass('tardy');
    } else if ($(this).hasClass('absent')) {
      $(this).removeClass('absent');
      $(this).addClass('tardy');
    }
  }
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

  .here {
    background: #468847;
  }

  .absent {
    background: #b94a48;
  }

  .tardy {
    background: #f89406;
  }

  .student:hover {
    border: solid 1px #CCC;
    -moz-box-shadow: 1px 1px 5px #999;
    -webkit-box-shadow: 1px 1px 5px #999;
    box-shadow: 1px 1px 5px #999;
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
            <!--************************************************************************************************-->
            <script type="text/javascript">

            var apigee = new Usergrid.Client({
             orgName:'sazua',
             appName:'sandbox'
           });

            $(document).ready(function () {



              setInterval(function () {
               var number=0;
                                  //a new Collection object that will be used to hold the full feed list
                                  var my_books = new Usergrid.Collection({ "client":apigee, "type":"comments" });//"qs":{"ql":"order by author"}
                                  //make sure messages are pulled back in order
                                  my_books.fetch(

                                                // Success Callback
                                                function(){

                                                 while(my_books.hasNextEntity())
                                                 {
                                                   var current_book = my_books.getNextEntity();

                                                   var theSender=current_book.get('sender');
                                                   if(theSender=="Parent")
                                                   {

                                                    number=number+1;
                                                  }

                                                }
                                                document.getElementById('badge2').innerHTML=number;                                       

                                              },

                                                 // Failure Callback
                                                 function(){
                                                   alert("NO");
                                                 }
                                                 );

},1000);








});



</script>

<!--***************************************************************************************************-->
<ul class="nav pull-right">
  <li><a href="#"><i class="icon-envelope"></i> Notifications <span id="badge2" class="badge">0</span></a></li>
  <li><?php print '<a href="#">'.$json->full_name.'</a>'; ?></li>
</ul> <!-- .nav -->
</div><!--/.nav-collapse -->
</div>
</div>
</div>
