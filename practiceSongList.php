<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>詩歌清單</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    </script>
  </head>
      <?php
        include ("contenttop.php");
      ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            練習清單
            <small>Practice List</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>首頁</a></li>
            <li><a href="#">詩歌管理</a></li>
            <li><a href="#">練習清單</a></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="practiceListName">清單名稱</label>
                <input type="text" class="form-control" id="practiceListName" name="practiceListName" placeholder="清單名稱(練習日期+樂團)">
              </div>
              <div class="form-group">
                <label for="songID">請輸入歌曲編號</label>
                <input type="text" class="form-control" id="songIdList" name="songIdList" placeholder="歌曲編號以逗號隔開 ex. 20,33,21">
              </div>
              <button type="button" class="btn btn-info pull-right" id="btnSend">新增清單</button>
            </div>
          </div>
          <div class="row"><!-- 練習清單表格 -->
            <div class="col-md-12">
              <div class="box" id="boxAlbumList">
                <div class="box-header">
                  <h3 class="box-title">目前清單</h3>                  
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                  <table class="table">
                    <tbody id="practiceListContent">
                      


                      






                    </tbody>
                  </table>
                </div><!-- /.box-body -->                
              </div><!-- /.row練習清單表格 -->
            </div>
          </div>          
          <div id="message"></div>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <?php
        include("contentbottom.php");
      ?>

    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!--Custom-->
    <script src="js/practiceSongList.js"></script>
  </body>
</html>
