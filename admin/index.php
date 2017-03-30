<?php 
  include($_SERVER['DOCUMENT_ROOT'] . '/admin/config/connection.php');
  session_start();

  if(!isset($_SESSION['admin'])) {
    header('Location: login.php');
    die;
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="robots" content="noindex">

    <title>Admin Panel - WBUT PGET</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- DataTable -->
    

    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

    <style type="text/css">

    
      .nav-side-menu {
        overflow: auto;
        font-family: verdana;
        font-size: 12px;
        font-weight: 200;
        background-color: #2e353d;
        position: fixed;
        top: 0px;
        width: 220px;
        height: 100%;
        color: #e1ffff;
      }
      .nav-side-menu .brand {
        background-color: #23282e;
        line-height: 50px;
        display: block;
        text-align: center;
        font-size: 14px;
      }
      .nav-side-menu .toggle-btn {
        display: none;
      }
      .nav-side-menu ul,
      .nav-side-menu li {
        list-style: none;
        padding: 0px;
        margin: 0px;
        line-height: 35px;
        cursor: pointer;
        /*    
          .collapsed{
             .arrow:before{
                       font-family: FontAwesome;
                       content: "\f053";
                       display: inline-block;
                       padding-left:10px;
                       padding-right: 10px;
                       vertical-align: middle;
                       float:right;
                  }
           }
      */
      }
      .nav-side-menu ul :not(collapsed) .arrow:before,
      .nav-side-menu li :not(collapsed) .arrow:before {
        font-family: FontAwesome;
        content: "\f078";
        display: inline-block;
        padding-left: 10px;
        padding-right: 10px;
        vertical-align: middle;
        float: right;
      }
      .nav-side-menu ul .active,
      .nav-side-menu li .active {
        border-left: 3px solid #d19b3d;
        background-color: #4f5b69;
      }
      .nav-side-menu ul .sub-menu li.active,
      .nav-side-menu li .sub-menu li.active {
        color: #d19b3d;
      }
      .nav-side-menu ul .sub-menu li.active a,
      .nav-side-menu li .sub-menu li.active a {
        color: #d19b3d;
      }
      .nav-side-menu ul .sub-menu li,
      .nav-side-menu li .sub-menu li {
        background-color: #181c20;
        border: none;
        line-height: 28px;
        border-bottom: 1px solid #23282e;
        margin-left: 0px;
      }
      .nav-side-menu ul .sub-menu li:hover,
      .nav-side-menu li .sub-menu li:hover {
        background-color: #020203;
      }
      
      .nav-side-menu li .sub-menu li:before {
        font-family: FontAwesome;
        content: "\f105";
        display: inline-block;
        padding-left: 10px;
        padding-right: 10px;
        vertical-align: middle;
      }
      .nav-side-menu li {
        padding-left: 0px;
        border-left: 3px solid #2e353d;
        border-bottom: 1px solid #23282e;
      }
      .nav-side-menu li a {
        text-decoration: none;
        color: #e1ffff;
      }
      .nav-side-menu li a i {
        padding-left: 10px;
        width: 20px;
        padding-right: 20px;
      }
      .nav-side-menu li:hover {
        border-left: 3px solid #d19b3d;
        background-color: #4f5b69;
        -webkit-transition: all 1s ease;
        -moz-transition: all 1s ease;
        -o-transition: all 1s ease;
        -ms-transition: all 1s ease;
        transition: all 1s ease;
      }
      @media (max-width: 767px) {
        .nav-side-menu {
          position: relative;
          width: 100%;
          margin-bottom: 10px;
        }
        .nav-side-menu .toggle-btn {
          display: block;
          cursor: pointer;
          position: absolute;
          right: 10px;
          top: 10px;
          z-index: 10 !important;
          padding: 3px;
          background-color: #ffffff;
          color: #000;
          width: 40px;
          text-align: center;
        }
        .brand {
          text-align: left !important;
          font-size: 22px;
          padding-left: 20px;
          line-height: 50px !important;
        }
      }
      @media (min-width: 767px) {
        .nav-side-menu .menu-list .menu-content {
          display: block;
        }
      }
      body {
        margin: 0px;
        padding: 0px;
      }

      .main {
        
        padding-top: 3%;
        padding-left: 9%;

      }
      .menu a {
        display: block;
      }
      .content {
        display: none;
      }
    </style>
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <!-- jQuery UI -->
    <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

    <script src="http://cdn.bootcss.com/bootbox.js/4.4.0/bootbox.js"></script>
    <script src="http://vsn4ik.github.io/bootstrap-checkbox/dist/js/bootstrap-checkbox.min.js" defer></script>

    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.js"></script>

        
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" />
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />
    
</head>
<body>
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
  
  <div class="nav-side-menu">
      <div class="brand">Admin Panel</div>
      <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
    
          <div class="menu-list">
    
              <ul id="menu-content" class="menu-content collapse out">
                  <li>
                    <a href="" style="display: block">
                    <i class="fa fa-dashboard fa-lg"></i> Dashboard
                    </a>
                  </li>

                  <li data-toggle="collapse" data-target="#colleges" class="collapsed">
                    <a href="#"><i class="fa fa-university fa-lg"></i> College <span class="arrow"></span></a>
                  </li>
                  <ul class="sub-menu collapse menu" id="colleges">
                    <li><a href="#" data-page="page1"><i class="fa fa-angle-right"></i>View Colleges</a></li>
                    <li><a href="#" data-page="page2"><i class="fa fa-angle-right"></i>Add College</a></li>
                    <li><a href="#" data-page="page3"><i class="fa fa-angle-right"></i>Remove College</a></li>
                  </ul>

                  <li data-toggle="collapse" data-target="#student" class="collapsed">
                    <a href="#"><i class="fa fa-users fa-lg"></i> Student <span class="arrow"></span></a>
                  </li>
                  
                  <ul class="sub-menu collapse menu" id="student">
                    <li><a href="#" data-page="page4"><i class="fa fa-angle-right"></i>View Students</a></li>
                  </ul>

                  <li data-toggle="collapse" data-target="#counsellor" class="collapsed">
                    <a href="#"><i class="fa fa-user fa-lg"></i> Counsellor <span class="arrow"></span></a>
                  </li>
                  <ul class="sub-menu collapse menu" id="counsellor">
                    <li><a href="#" data-page="page7"><i class="fa fa-angle-right"></i>View Counsellor</a></li>
                    <li><a href="#" data-page="page8"><i class="fa fa-angle-right"></i>Add Counsellor</a></li>
                  </ul>

                  <li data-toggle="collapse" data-target="#news" class="collapsed">
                    <a href="#"><i class="fa fa-newspaper-o" aria-hidden="true"></i> News and Events<span class="arrow"></span></a>
                  </li>
                  <ul class="sub-menu collapse menu" id="news">
                    <li><a href="#" data-page="page10"><i class="fa fa-angle-right"></i>View News and Events</a></li>
                    <li><a href="#" data-page="page11"><i class="fa fa-angle-right"></i>Add News and Event</a></li>
                  </ul>

                  <li data-toggle="collapse" data-target="#date" class="collapsed">
                    <a href="#"><i class="fa fa-calendar" aria-hidden="true"></i> Important Dates <span class="arrow"></span></a>
                  </li>
                  <ul class="sub-menu collapse menu" id="date">
                    <li><a href="#" data-page="page13"><i class="fa fa-angle-right"></i>View Events</a></li>
                    <li><a href="#" data-page="page14"><i class="fa fa-angle-right"></i>Add Event</a></li>
                  </ul>
                   <li>
                    <a href="logout.php" style="display: block">
                    <i class="fa fa-lock" aria-hidden="true"></i> Logout
                    </a>
                  </li>
                   
              </ul>
       </div>
  </div>
  <div class="main">
    <!-- <center id="logo">
      <img src="images/bg4.jpg" align="center" border="0" style="text-align:center;" alt="" title=""  />
    </center> -->
    <div id="page1" class="content">
        <?php include('template/college.php'); ?>
    </div>
    <div id="page2" class="content">
        <?php include('template/add_college.php'); ?>
    </div>
    <div id="page3" class="content">
        <?php include('template/remove_college.php'); ?>
    </div>

    <div id="page4" class="content">
        <?php include('template/student.php'); ?>
    </div>
    <!-- <div id="page5" class="content">
         <h1>Show Page6</h1>
    </div>
    <div id="page6" class="content">
         <h1>Show Page6</h1>
    </div>-->
    <div id="page7" class="content">
         <?php include('template/counsellor.php'); ?>
    </div>
    <div id="page8" class="content">
         <?php include('template/add_counsellor.php'); ?>
    </div>
    <div id="page10" class="content">
         <?php include('template/news.php'); ?>
    </div>
    <div id="page11" class="content">
        <?php include('template/add_news.php'); ?>
    </div>
    <div id="page13" class="content">
         <?php include('template/event.php'); ?>
    </div>
    <div id="page14" class="content">
         <?php include('template/add_event.php'); ?>
    </div>
</div>
	<script type="text/javascript">
	  var selector = '.out li';

    $(selector).on('click', function(){
        $(selector).removeClass('active');
        $(this).addClass('active');
    });



    $(function() {
      var curPage="";
      $(".menu a").click(function() {
          if (curPage.length) { 
              $("#"+curPage).hide();
          }
          curPage=$(this).data("page");
          $("#"+curPage).show();
      });
  });
	</script>
  <script>
    $(document).ready(function() {
        $('#example').DataTable();
    } );
    
  </script>
</body>
</html>
