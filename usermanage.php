<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>內湖思恩堂內部網站-新增公告</title>
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
    <!-- Select2 -->
    <link rel="stylesheet" href="plugins/select2/select2.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]--> 
    <style type="text/css">
      table tbody tr,th{
        text-align: center;
      }
    </style>   
  </head>
   <?php
        include ("contenttop.php");
      ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            使用者管理
            <small>User Management</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
            <li><a href="#">系統管理</a></li>
            <li class="active">使用者管理</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
                <div class="box">
                  <div class="box-header">
                    <h3 class="box-title"><b>使用者清單</b></h3>
                </div>
                  <!-- /.box-header -->
                  <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                      <tbody id="userList">
                        <!--<tr>
                          <th>姓名</th>
                          <th>Email</th>
                          <th>小組</th>
                          <th>事工</th>
                        </tr>
                        <tr>
                          <td>183</td>
                          <td>John Doe</td>
                          <td>
                             <select class="form-control">
                               <option>AAAA</option>
                               <option>VVVV</option>
                               <option>CCCC</option>
                             </select> 
                          </td>
                          <td>
                              <select class="form-control">
                               <option>AAAA</option>
                               <option>VVVV</option>
                               <option>CCCC</option>
                             </select> 
                          </td>
                        </tr>    -->            
                      </tbody>
                    </table>
                  </div>
            <!-- /.box-body -->
          </div>


            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->        
      </div><!-- /.content-wrapper -->

      
      <?php
        include("contentbottom.php");
      ?>

    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- Select2 -->
    <script src="plugins/select2/select2.full.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->    
    <script src="dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>    
    <!--Custom-->
    <script src="js/userManage.js"></script>
    
  </body>
</html>
