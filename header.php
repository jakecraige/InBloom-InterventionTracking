<?php
    require('includes.php');
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>inComm - Beta</title>
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

    $('.studentP button.up').on("click", markStudentParticipationUp);
    $('.studentP button.down').on("click", markStudentParticipationDown);
    // $('.studentP').on("click", markStudentParticipation);
    // $('.studentP').dblclick(markTardy);
  });

  function markStudentParticipationUp()
  {
    if( $(this).parent().hasClass('nuetral'))
    {
      $(this).parent().removeClass('nuetral');
      $(this).parent().addClass('participation');
    }
    else if($(this).parent().hasClass('noparticipation'))
    {
      $(this).parent().removeClass('noparticipation');
      $(this).parent().addClass('nuetral');
    } 
  }

  function markStudentParticipationDown()
  {
    if( $(this).parent().hasClass('nuetral'))
    {
      $(this).parent().removeClass('nuetral');
      $(this).parent().addClass('noparticipation');
    }
    else if($(this).parent().hasClass('participation'))
    {
      $(this).parent().removeClass('participation');
      $(this).parent().addClass('nuetral');
    }
  }

  function updateStudentAttendance(event)
  {
    if ($(this).hasClass('here')) {
      $(this).removeClass('here');
      $(this).addClass('absent');
      var schoolId = $(this).children('p').attr('id');
      var studentId = $(this).attr('id');
      postAttendance(studentId, schoolId, 'Absent');
    } else if ($(this).hasClass('absent')) {
      $(this).removeClass('absent');
      $(this).addClass('tardy');
      var schoolId = $(this).children('p').attr('id');
      var studentId = $(this).attr('id');
      postAttendance(studentId, schoolId, 'Tardy');
    } else if ($(this).hasClass('tardy')) {
      $(this).removeClass('tardy');
      $(this).addClass('here');
      var schoolId = $(this).children('p').attr('id');
      var studentId = $(this).attr('id');
      postAttendance(studentId, schoolId, 'Here');
    }
    
  }

  function postAttendance(studentId, schoolId, attendanceEvent)
  {
    // var url = 'attendance.php?studentId=' + studentId + "&schoolId=" + schoolId + "&event=" + attendanceEvent;
    $.post('post_attendance.php', {
      'studentId': studentId,
      'schoolId': schoolId,
      'event': attendanceEvent
    }, function(data) {
      // alert(data);
    });
  }

  function markTardy(event)
  {
    if ($(this).hasClass('here')) {
      $(this).removeClass('here');
      $(this).addClass('tardy');
      var schoolId = $(this).children('p').attr('id');
      var studentId = $(this).attr('id');
      postAttendance(studentId, schoolId, 'Tardy');
    } else if ($(this).hasClass('absent')) {
      $(this).removeClass('absent');
      $(this).addClass('tardy');
      var schoolId = $(this).children('p').attr('id');
      var studentId = $(this).attr('id');
      postAttendance(studentId, schoolId, 'Tardy');
    }
  }

  function markAllNotParticipating()
  {
    if($('.studentP').hasClass('participating')) {
      $('.studentP').addClass('noparticipation');
      $('.studentP').removeClass('participation');
    }
  }

  function markAllParticipating()
  {
    if($('.studentP').hasClass('noparticipation')) {
      $('.studentP').addClass('participation');
      $('.studentP').removeClass('noparticipation');
    }
  }

  function markAllAbsent()
  {
    if($('.student').hasClass('here')) {
      $('.student').addClass('absent');
      $('.student').removeClass('here');
    }
  }

  function markAllPresent()
  {
    if($('.student').hasClass('absent')) {
      $('.student').addClass('here');
      $('.student').removeClass('absent');
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

  .here, .participation {
    background: #468847;
  }

  .absent, .noparticipation {
    background: #b94a48;
  }

  .tardy, .someparticipation {
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
          <a href="/projects/inComm" class="brand"><img src="img/incommlogo-small.png"> <span class="label label-success">Beta</span></a>
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
                                  var my_books = new Usergrid.Collection({ "client":apigee, "type":"updates","qs":{"ql":"select * where sender='Parent' and read=false"} });
                                  //make sure messages are pulled back in order
                                  my_books.fetch(

                                                // Success Callback
                                                function(){

                                                 while(my_books.hasNextEntity())
                                                 {
                                                   var current_book = my_books.getNextEntity();


                                                   number=number+1;


                                                 }
                                                 document.getElementById('badge2').innerHTML=number;   
						if(number>0)
						{
					document.getElementById('badge2').setAttribute("class","badge badge-important");
						}else
						{
						document.getElementById('badge2').setAttribute("class", "badge");
						}


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
  <li><a href="http://inbloom.hunterskrasek.com/notes.html" rel="shadowbox; width=500; height=400"><i class="icon-envelope"></i> Notifications <span id="badge2" class="badge">0</span></a></li>
  <li><?php print '<a href="#">'.$json->full_name.'</a>'; ?></li>
</ul> <!-- .nav -->
</div><!--/.nav-collapse -->
</div>
</div>
</div>
