<?php
  session_start();
  if (!isset($_SESSION["uid"])) {
    header("Location: Login/index.html");
  }
  if($_SESSION["code"] != "1"){
    echo "<script>var r = confirm('帳戶尚未啟動\\n請至Email點選起動連結');
            if(r == true){
              location.href='Login/index.html';
            }else{
              location.href='Login/index.html';
            }
          </script>";
  }
?>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
<!-- Main Header 外移-->
      <header class="main-header">
        
        <!-- Logo -->
        <a href="publish.php" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>D</b>AVID</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Nei hu </b>Grace</span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button 左側選單開關-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              <li class="dropdown messages-menu">
                <!-- Menu toggle button 郵件圖標-->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-envelope-o"></i>
                  <span class="label label-success">4</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 4 messages</li>
                  <li>
                    <!-- inner menu: contains the messages -->
                    <ul class="menu">
                      <li><!-- start message -->
                        <a href="#">
                          <div class="pull-left">
                            <!-- User Image -->
                            <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                          </div>
                          <!-- Message title and timestamp -->
                          <h4>
                            Support Team
                            <small><i class="fa fa-clock-o"></i> 5 mins</small>
                          </h4>
                          <!-- The message -->
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li><!-- end message -->
                    </ul><!-- /.menu -->
                  </li>
                  <li class="footer"><a href="#">See All Messages</a></li>
                </ul>
              </li><!-- /.messages-menu -->

              <!-- Notifications Menu 鈴鐺圖標-->
              <li class="dropdown notifications-menu">
                <!-- Menu toggle button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bell-o"></i>
                  <span class="label label-warning">10</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 10 notifications</li>
                  <li>
                    <!-- Inner Menu: contains the notifications -->
                    <ul class="menu">
                      <li><!-- start notification -->
                        <a href="#">
                          <i class="fa fa-users text-aqua"></i> 5 new members joined today
                        </a>
                      </li><!-- end notification -->
                    </ul>
                  </li>
                  <li class="footer"><a href="#">View all</a></li>
                </ul>
              </li>
              <!-- Tasks Menu 旗幟圖標-->
              <li class="dropdown tasks-menu">
                <!-- Menu Toggle Button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-flag-o"></i>
                  <span class="label label-danger">9</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 9 tasks</li>
                  <li>
                    <!-- Inner menu: contains the tasks -->
                    <ul class="menu">
                      <li><!-- Task item -->
                        <a href="#">
                          <!-- Task title and progress text -->
                          <h3>
                            Design some buttons
                            <small class="pull-right">20%</small>
                          </h3>
                          <!-- The progress bar -->
                          <div class="progress xs">
                            <!-- Change the css width attribute to simulate progress -->
                            <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                              <span class="sr-only">20% Complete</span>
                            </div>
                          </div>
                        </a>
                      </li><!-- end task item -->
                    </ul>
                  </li>
                  <li class="footer">
                    <a href="#">View all tasks</a>
                  </li>
                </ul>
              </li>

              <!-- User Account Menu 使用者帳戶選單-->
              <li class="dropdown user user-menu">
                <!-- Menu Toggle Button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <!-- The user image in the navbar-->
                  <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                  <!-- hidden-xs hides the username on small devices so only the image appears. -->
                  <span class="hidden-xs"><?php echo $_SESSION["name"]; ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- The user image in the menu -->
                  <li class="user-header">
                    <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                    <p>
                      <?php echo $_SESSION["name"]; ?>
                      <small>老子是總監</small>
                    </p>
                  </li>
                  <!-- Menu Body 
                  <li class="user-body">
                    <div class="row">
                      <div class="col-xs-4 text-center">
                        <a href="#">Followers</a>
                      </div>
                      <div class="col-xs-4 text-center">
                        <a href="#">Sales</a>
                      </div>
                      <div class="col-xs-4 text-center">
                        <a href="#">Friends</a>
                      </div>
                    </div>
                  </li>-->
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="profile.php" class="btn btn-default btn-flat">個人資料</a>
                    </div>
                    <div class="pull-right">
                      <a href="process/logout.php" class="btn btn-default btn-flat">登出</a>
                    </div>
                  </li>
                </ul>
              </li> <!-- /.User Account Menu 使用者帳戶選單-->
              <!-- Control Sidebar Toggle Button -->
              <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li>
            </ul>
          </div>
        </nav>
      </header><!-- /.Main Header -->

      <!-- Left side column. contains the logo and sidebar 左側選單-->
      <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

          <!-- Sidebar user panel (optional) -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php echo $_SESSION["name"]; ?></p>
              <!-- Status 狀態暫時不用
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>-->
            </div>
          </div>

          <!-- search form (Optional) 搜尋框也不用
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>-->
          <!-- /.search form -->
          <!-- Sidebar Menu -->
          <ul class="sidebar-menu">
            <li class="header">HEADER</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="active"><a href="publish.php"><i class="fa fa-link"></i> <span>公告事項</span></a></li>
            <li class="treeview">
              <a href="#"><i class="fa fa-link"></i> <span>詩歌管理</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="songSearch.php">詩歌查詢</a></li>
                <li><a href="newSong.php">詩歌新增</a></li>
                <li><a href="practiceSongList.php">詩歌清單</a></li>
              </ul>
            </li>
            <li><a href="#"><i class="fa icon-car"></i> <span>小組回報單</span></a></li>
            <li><a href="worshipform.php"><i class="fa fa-link"></i> <span>敬拜表單</span></a></li>
            <li><a href="#"><i class="fa fa-link"></i> <span>Another Link</span></a></li>
            
          </ul><!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
      </aside>