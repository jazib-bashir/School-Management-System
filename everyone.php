  <?php
      include '_header.html';
      session_start();
      require("conection/connect.php");
      $tag="";
      if (isset($_GET['tag']))
      $tag=$_GET['tag'];
  ?>
  <div id="admin" class="col-md-10 col-md-offset-1">
  	<nav class="navbar navbar-inverse" role="navigation">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">School Managment System</a>
      </div>
  
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav navbar-right">
            <li><a href="?tag=home">Home</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"> Students <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="everyone.php?tag=student_entry">Student Entry</a>
                    </li>
                    <li>
                        <a href="everyone.php?tag=view_students">View Student</a>
                    </li>
                </ul>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"> Teachers <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="everyone.php?tag=teachers_entry">Teachers Entry</a>
                    </li>
                    <li>
                        <a href="everyone.php?tag=view_teachers">View Teachers</a>
                    </li>
                </ul>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"> Faculties <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="everyone.php?tag=faculties_entry">Faculties Entry</a>
                    </li>
                    <li>
                        <a href="everyone.php?tag=view_faculties">View Faculties</a>
                    </li>
                </ul>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"> Subject <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="everyone.php?tag=subject_entry">Subject Entry</a>
                    </li>
                    <li>
                        <a href="everyone.php?tag=view_subjects">View Subject</a>
                    </li>
                </ul>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"> Score <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="everyone.php?tag=score_entry">Score Entry</a>
                    </li>
                    <li>
                        <a href="everyone.php?tag=view_scores">View Score</a>
                    </li>
                </ul>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"> Users <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="everyone.php?tag=susers_entry">Users Entry</a>
                    </li>
                    <li>
                        <a href="everyone.php?tag=view_users">View Users</a>
                    </li>
                </ul>
              </li>
              <!-- <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"> Contact <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="#">Contact Entry</a>
                    </li>
                    <li>
                        <a href="#">View Contact</a>
                    </li>
                </ul>
 -->              </li>
                <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> admin <b class="caret"></b></a>
              <ul class="dropdown-menu">
                  <li>
                      <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                  </li>
                  <li>
                      <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                  </li>
                  <li>
                      <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                  </li>
                  <li class="divider"></li>
                  <li>
                      <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                  </li>
              </ul>
          </li>
        </ul>
      

  <ul class="nav navbar-nav side-nav visible-lg visible-md visible-sm">
      <li>
          <a href="everyone.php?tag=student_entry">Student Entry</a>
      </li>
      <li>
          <a href="everyone.php?tag=teachers_entry">Teacher Entry</a>
      </li>
      <li>
          <a href="everyone.php?tag=faculties_entry">Faculty Entry</a>
      </li>
      <li>
          <a href="everyone.php?tag=subject_entry">Subjects Entry</a>
      </li>
      <li>
          <a href="everyone.php?tag=score_entry">Scores Entry</a>
      </li>
      <li>
          <a href="everyone.php?tag=susers_entry">Users Entry</a>
      </li>
        </ul>
</div>
</nav>
  <div id="wrapper">
    <div id="page-wrapper">
        <?php
              if($tag=="home" or $tag=="")
              include("home.php");
              elseif($tag=="student_entry")
                  include("Students_Entry.php");
              elseif($tag=="teachers_entry")
                  include("Teachers_Entry.php");
              elseif($tag=="score_entry")
                  include("Score_Entry.php"); 
              elseif($tag=="subject_entry")
                  include("Subject_Entry.php");
              elseif($tag=="faculties_entry")
                  include("Faculties_Entry.php");
              elseif($tag=="susers_entry")
                  include("Users_Entry.php"); 
              elseif($tag=="view_students")
                  include("View_Students.php");
            elseif($tag=="view_teachers")
              include("View_Teachers.php");
            elseif($tag=="view_subjects")
              include("View_Subjects.php");
            elseif($tag=="view_scores")
              include("View_Scores.php");
            elseif($tag=="view_users")
              include("View_Users.php");
            elseif($tag=="view_faculties")
              include("View_Faculties.php");
            elseif($tag=="location_entry")
              include("Location_Entry.php");
            elseif($tag=="artical_entry")
              include("Artical_Entry.php");
            elseif($tag=="test_score")
              include("test_Scores .php");
            elseif($tag=="view_location")
              include("View_location.php");
            elseif($tag="view_artical")
              include("View_Articaly.php");
              /*$tag= $_REQUEST['tag'];
              
              if(empty($tag)){
                include ("Students_Entry.php");
              }
              else{
                include $tag;
              }*/
                  
                        ?>
      </div> 
    </div>
    </div>  
  <?php include '_footer.html'; ?>