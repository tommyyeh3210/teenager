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
          <span class="logo-mini"><b>G</b>race</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>內湖</b>思恩堂</span>
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

              <!-- User Account Menu 使用者帳戶選單-->
              <li class="dropdown user user-menu">
                <!-- Menu Toggle Button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <!-- The user image in the navbar-->
                  <img src="dist/img/eagle.jpg" class="user-image" alt="User Image">
                  <!-- hidden-xs hides the username on small devices so only the image appears. -->
                  <span class="hidden-xs"><?php echo $_SESSION["name"]; ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- The user image in the menu -->
                  <li class="user-header">
                    <img src="dist/img/eagle.jpg" class="img-circle" alt="User Image">
                    <p>
                      <?php echo $_SESSION["name"]; ?>
                      <small><?php echo $_SESSION["group_name"]; ?></small>
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
              <img src="dist/img/eagle.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p style="font-size: 20px;"><?php echo $_SESSION["name"]; ?></p>
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
            <li class="header">主選單</li>
            <!-- Optionally, you can add icons to the links -->
            
            <li><a href="publish.php"><i class="fa fa-info-circle"></i> <span>公告事項</span></a></li>
            
            <?php
                if ($_SESSION["ministry"] == 1)
                {
            ?>		
            <li class="treeview">
              <a href="#"><i class="fa fa-music"></i> <span>詩歌管理</span> <i class="fa fa-angle-left pull-right"></i></a>
              
                  <ul class="treeview-menu">
                    <li><a href="songSearch.php"><i class="fa fa-search"></i>詩歌查詢</a></li>
                    <li><a href="newSong.php"><i class="fa fa-plus"></i>詩歌新增</a></li>
                    <li><a href="practiceSongList.php"><i class="fa fa-list"></i>詩歌清單</a></li>
                  </ul>              
            </li>
            <?php  
                }
            ?>
            <!--
            <li class="active"><a href="#"><i class="fa icon-car"></i> <span>小組回報單</span></a></li>            
            <li><a href="#"><i class="fa fa-link"></i> <span>Another Link</span></a></li>
            -->
            <li><a href="worshipForm.php"><i class="fa fa-hand-peace-o"></i> <span>敬拜表單</span></a></li>
            <?php
              if ($_SESSION["role"] == 3 || $_SESSION["role"] == 7)
              {
            ?>
            <li class="treeview">
              <a href="#"><i class="fa fa-gears"></i> <span>系統管理</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">                
                <li><a href="newpublish.php"><i class="fa fa-edit"></i>公告管理</a></li>
                
                <?php
                  if ($_SESSION["role"] == 7)
                  {
                ?>
                    <li><a href="groupManage.php"><i class="fa fa-tree"></i>小組管理</a></li>
                    <li><a href="authority.php"><i class="fa fa-unlock"></i>權限管理</a></li>
                    <li><a href="usermanage.php"><i class="fa fa-users"></i>使用者管理</a></li> 
                <?php  
                  }
                ?>                
              </ul>
            </li>
            <?php  
              }
            ?>
          </ul><!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
      </aside>