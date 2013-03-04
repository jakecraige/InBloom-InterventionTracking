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
<body><div class="navbar navbar-inverse navbar-fixed-top">
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
                  <li><a href="#">My Classes</a></li>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Manage Class <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                      <li><a href="#"><i class="icon-arrow-up icon-white"></i> Students</a></li>
                      <li><a href="#">Interventions</a></li>
                    </ul>
                  </li>
                  </ul>
                  <ul class="nav  pull-right">
                    <li><a href="#"><i class="icon-arrow-up icon-white"></i> Parents</a></li>
                    <li><a href="#">Sign in</a></li>
                  </ul> <!-- .nav -->
              </div><!--/.nav-collapse -->
            </div>
          </div>
        </div>



<div class="container-fluid">
  <div class="row-fluid">
    <div class="span3">
    	<ul class="nav nav-list">
          <li class="nav-header">List header</li>
          <li class="active"><a href="#">Home</a></li>
          <li><a href="#">Students</a></li>
          <li><a href="#">Compare</a></li>
          <li><a href="#">Schedule</a></li>
          <li><a href="#">Absences</a></li>
          <li><a href="#">Assignments</a></li>
                  <li><a href="#">Missing Assignments</a></li>
                  <li><a href="#">Late Assignments</a></li>
          <li><a href="#">Discipline</a></li>
		</ul>

    </div>
    <div class="span9">
      <!--Body content-->
    </div>
  </div>
</div>
    
    
    
    
    
    
    
    
    
    
    
	{{ Asset::container('bootstrapper')->scripts() }}
</body>
</html>
