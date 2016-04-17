<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | User Profile</title>
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
            個人資料
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> 首頁</a></li>
            <li class="active"><a href="#">個人資料</a></li>
            
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <div class="row">
            <div class="col-md-6">

              <!-- Profile Image -->
              <div class="box box-primary">
                <div class="box-body box-profile">
                  <img class="profile-user-img img-responsive img-circle" src="dist/img/user4-128x128.jpg" alt="User profile picture">
                  <h3 class="profile-username text-center"><?php echo $_SESSION["group_for"]; ?></h3>
                  <p class="text-muted text-center"><?php echo $_SESSION["role"]; ?></p>

                  <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                      <b>姓名</b> <a class="pull-right"><?php echo $_SESSION["name"]; ?></a>
                    </li>
                    <li class="list-group-item">
                      <b>性別</b> <a class="pull-right"><?php echo $_SESSION["sex"]; ?></a>
                    </li>
                    <li class="list-group-item">
                      <b>Email</b> <a class="pull-right"><?php echo $_SESSION["email"]; ?></a>
                    </li>
                    <li class="list-group-item">
                      <b>生日</b> <a class="pull-right"><?php echo $_SESSION["birthday"]; ?></a>
                    </li>
                    <li class="list-group-item">
                      <b>手機</b> <a class="pull-right"><?php echo $_SESSION["mobile"]; ?></a>
                    </li>
                    <li class="list-group-item">
                      <b>所屬小組</b> <a class="pull-right"><?php echo $_SESSION["group_for"]; ?></a>
                    </li>
                    <li class="list-group-item">
                      <b>所屬事工</b> <a class="pull-right"><?php echo $_SESSION["ministry"]; ?></a>
                    </li>
                  </ul>

                  <button class="btn btn-primary btn-block" id="btnShowModifyBox"><b>修改</b></button>
                  <button class="btn btn-danger btn-block" id="btnHideModifyBox" style="display:none"><b>取消</b></button>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
            <div class="col-md-6">
              <!-- About Me Box -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">About Me</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <strong><i class="fa fa-book margin-r-5"></i>教育程度</strong>
                  <p class="text-muted">
                    <?php echo $_SESSION["education"] ?>
                  </p>

                  <hr>

                  <strong><i class="fa fa-map-marker margin-r-5"></i>住址</strong>
                  <p class="text-muted"><?php echo $_SESSION["address"] ?></p>

                  <hr>

                  <strong><i class="fa fa-pencil margin-r-5"></i>專長</strong>
                  <p>
                    <span class="label label-danger">吃</span>
                    <span class="label label-success">喝</span>
                    <span class="label label-info">拉</span>
                    <span class="label label-warning">撒</span>
                    <span class="label label-primary">睡</span>
                  </p>

                  <hr>

                  <strong><i class="fa fa-file-text-o margin-r-5"></i>最愛經文</strong>
                  <p><?php echo $_SESSION["verse"] ?></p>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
            <div class="col-md-12">
            	<div class="box box-primary" id="modifyBox" style="display:none;">
	                <div class="box-header with-border">
	                  <h3 class="box-title">個人資料修改<span style="color:red; font-size: 12px;">(*)必填</span></h3>
	                </div><!-- /.box-header -->
	                <div class="box-body">
	                	<form class="form-horizontal" method="POST" action="process/updateProfile.php" name="profileForm" id="profileForm">
	                      <div class="form-group">
	                        <label for="inputName" class="col-sm-2 control-label">姓名<span style="color:red; font-size: 12px;">(*)</span></label>
	                        <div class="col-sm-10">
	                          <input type="text" class="form-control" id="inputName" name="inputName" placeholder="請輸入您的大名" maxlength="30" required>
	                        </div>
	                      </div>
	                      <div class="form-group">
	                        <label for="inputSex" class="col-sm-2 control-label">性別<span style="color:red; font-size: 12px;">(*)</span></label>
	                        <div class="col-sm-10">
	                          <select class="form-control" id="inputSex" name="inputSex" required>
                              <option value="">請選擇</option>
                              <option value="男">男</option>
                              <option value="女">女</option>                              
                            </select> 
	                        </div>
	                      </div>
	                      <div class="form-group">
	                        <label for="inputBirthday" class="col-sm-2 control-label">生日</label>
	                        <div class="col-sm-10">
	                          <input type="date" class="form-control" id="inputBirthday" name="inputBirthday" placeholder="生日">
	                        </div>
	                      </div>
	                      <div class="form-group">
	                        <label for="inputAddress" class="col-sm-2 control-label">住址</label>
	                        <div class="col-sm-10">
	                          <input type="text" class="form-control" id="inputAddress" name="inputAddress" placeholder="請輸入住址" maxlength="100">
	                        </div>
	                      </div>
                        <div class="form-group">
                          <label for="inputPhone" class="col-sm-2 control-label">電話</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputPhone" name="inputPhone" placeholder="請輸入電話。格式:02-27901497" maxlength="15" pattern="0[1-9]\-[0-9]*">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputMobile" class="col-sm-2 control-label">手機</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputMobile" name="inputMobile" placeholder="請輸入手機。格式:0912334507" maxlength="10" pattern="09[1-8][0-9]{7}">
                          </div>
                        </div>
	                      <div class="form-group">
	                        <label for="inputSkill" class="col-sm-2 control-label">專長</label>
	                        <div class="col-sm-10">
	                          <input type="text" class="form-control" id="inputSkill" name="inputSkill" placeholder="請輸入專長(以半形逗號分隔 ex. 讀經,禱告)" maxlength="50">
	                        </div>
	                      </div>
	                      <div class="form-group">
	                        <label for="inputEdu" class="col-sm-2 control-label">教育程度<span style="color:red; font-size: 12px;">(*)</span></label>
	                        <div class="col-sm-10">
                            <select class="form-control" id="inputEdu" name="inputEdu" required>
                              <option value="">請選擇</option>
                              <option value="小學">小學</option>
                              <option value="國中">國中</option>
                              <option value="高中/高職">高中/高職</option>
                              <option value="五專">五專</option>
                              <option value="大學">大學</option>
                              <option value="碩士">碩士</option>
                              <option value="博士">博士</option>
                            </select>	                          
	                        </div>
	                      </div>
	                      <div class="form-group">
	                        <label for="inputBible" class="col-sm-2 control-label">最愛經文</label>
	                        <div class="col-sm-10">
	                          <textarea class="form-control" id="inputBible" name="inputBible" placeholder="請輸入最愛經文" maxlength="150"></textarea>
	                        </div>
	                      </div>                      
	                      <div class="form-group">
	                        <div class="col-sm-offset-2 col-sm-10">
	                          <input type="reset" class="btn"/>
	                          <input type="submit" class="btn btn-primary pull-right" id="btnModifyProfile" />
	                        </div>
	                      </div>
	                  </form>
	                </div><!-- /.box-body -->
	              </div><!-- /.box -->
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
    <!--custom-->
    <script src="js/profile.js"></script>
  </body>
</html>
