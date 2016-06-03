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
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->    
  </head>
   <?php
        include ("contenttop.php");
      ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            小組管理
            <small>Group Management</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>首頁</a></li>
            <li><a href="#">系統管理</a></li>
            <li class="active">小組管理</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <button type="button" class="btn btn-primary" id="addGroup" onclick="showGroupBox();">新增小組+</button>
          <button type="button" class="btn btn-danger" style="display: none;" id="cancel" onclick="hideGroupBox()">取消</button>
          <div class="row" id="publishContentRow">
            <div class="col-md-12">
              <table class="table">
                <tbody id="groupContent">
                  <!-- 取得所有小組 -->
                  



                  
                </tbody>
              </table>
            </div><!-- /.col -->
          </div><!-- /.row -->
          <!-- row --><!-- 新增修改公告 -->
          <div class="row" id="groupFormRow" style="display: none;">
            <div class="col-md-12">
              <form method="POST" action="process/newGroup.php" name="groupForm">
                <div class="form-group">
                  <label for="grouptitle">小組名稱<span style="color:red; font-size: 12px;">(*)必填</span></label>
                  <input type="text" class="form-control" id="grouptitle" name="grouptitle" required />
                </div>
                <div class="form-group">
                  <label for="captainID">小組長編號<span style="color:red; font-size: 12px;">(*)必填</span></label>
                  <input type="text" class="form-control" id="captainID" name="captainID" required />
                </div>
                <input type="hidden" name="group_id" id="group_id" />
               
                
                <input type="button" class="btn btn-info pull-right" id="btnModify" onclick="sendModify()" value="修改" />
                <input type="submit" class="btn btn-primary pull-right" id="btnNew" value="新增" />
              </form>
            </div><!-- /.col -->
          </div><!-- /.row -->

          <div class="row">
            <div class="col-md-12">
                


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
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!--Custom-->
    <script src="js/groupmanage.js"></script>
    
  </body>
</html>
