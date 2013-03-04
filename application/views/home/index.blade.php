<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Intervention Thingy</title>
	<meta name="viewport" content="width=device-width">
	{{ HTML::style('laravel/css/style.css') }}
	{{ Asset::container('bootstrapper')->styles() }}
    
</head>
<body><div class="navbar navbar-fixed-top">
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
                      </ul>
                      
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Schedule <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                          <li><a href="#"><i class="icon-user"></i>Parent Teacher Conference/a></li>
                          <li><a href="#">Office Hours</a></li>
                          <li><a href="#">In Class</a></li>
                          <li><a href="#">Detentions</a></li>
                        </ul>
                      </li>
                      
                      
                      
                      
                  <ul class="nav  pull-right">
                    <li><a href="#"><i class="icon-arrow-up"></i> Parents</a></li>
                    <li><a href="#">Sign in</a></li>
                  </ul> <!-- .nav -->
              </div><!--/.nav-collapse -->
            </div>
          </div>
        </div>



  <div class="container-fluid">
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
    
    
    
    
    
    
    
    
    
    
    
	{{ Asset::container('bootstrapper')->scripts() }}
</body>
</html>
