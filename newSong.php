<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Advanced form elements</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="plugins/iCheck/all.css">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="plugins/colorpicker/bootstrap-colorpicker.min.css">
    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="plugins/timepicker/bootstrap-timepicker.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="plugins/select2/select2.min.css">
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
            新增歌曲
            <small>New Song</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>首頁</a></li>
            <li><a href="#">詩歌管理</a></li>
            <li class="active">新增歌曲</li>
          </ol>
        </section>

        <!-- 主要內容 -->
        <section class="content">

          <!-- 專輯選單 -->
          <div class="box box-default">            
            <div class="box-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>選擇專輯</label>
                    <select class="form-control select2" id="selectAlbum" style="width: 100%;" onchange="selectAlbum()">
                      

                    </select>
                  </div><!-- /.form-group -->
                </div><!-- /.col -->
                <div class="col-md-6">                  
	               <div class="form-group" id="boxAlbum" style="display:none;">
	                 <label>專輯名稱</label>
	                 <input type="text" class="form-control" id="albumName" placeholder="請輸入專輯名稱">
	                 <button type="button" class="btn btn-block btn-primary" onclick="addAlbum($('#albumName').val())">新增</button>
	               </div><!-- /.form-group -->
                  
	             </div><!-- /.col -->                
              </div><!-- /.row -->
              <div class="row"><!-- 專輯歌曲表格 -->
              	<div class="col-md-12">
	              	<div class="box" id="boxAlbumList" style="display:none;">
		                <div class="box-header">
		                  <h3 class="box-title" id="album_title"></h3>
		                  
		                </div><!-- /.box-header -->
		                <div class="box-body no-padding">
		                  <table class="table">
		                    <tbody id="ablumContent">
			                    



                          
			                  </tbody>
		                  </table>
		                </div><!-- /.box-body -->
		              </div>
		            </div>
              </div><!-- /.row專輯歌曲表格 -->


              <div class="row"><!-- row 修改歌曲表單-->
              	<div class="col-md-12">
	              	<div class="box box-success" id="modifyboxSongList" style="display:none;">
		                <div class="box-header with-border">
		                  <h3 class="box-title">修改歌曲</h3>
		                </div><!-- /.box-header -->
		                <div class="box-body">
                      <div class="progress active" id="modifyboxProgress" style="display:none;">
                          <div class="progress-bar progress-bar-success progress-bar-striped" style="z-index:2;" role="progressbar" id="modifyuploadProgress" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 10%"></div>
                          <div id="modifylabelProgress" style="margin-left:50%">0%</div>
                      </div>
		                  <form role="form" id="modifyformSong" name="modifyformSong" method="post" action="upload.php" enctype="multipart/form-data">
		                    <!-- text input -->
                        <input type="hidden" id="rID" name="rID" />
		                    <div class="form-group">
		                      <label for="modifySongChName">中文歌名</label>
		                      <input type="text" class="form-control" id="modifySongChName" name="modifySongChName" placeholder="請輸入中文歌名">
		                    </div>
		                    <div class="form-group">
		                      <label for="modifySongEnName">英文歌名</label>
		                      <input type="text" class="form-control" id="modifySongEnName" name="modifySongEnName" placeholder="請輸入英文歌名">
		                    </div>
		                    <div class="form-group">
		                      <label for="modifyPage">頁碼</label>
		                      <input type="text" class="form-control" id="modifyPage" name="modifyPage" placeholder="請輸入頁碼">
		                    </div>	                    
		                    <div class="form-group">
		                      <label for="modifyTune">調性</label>
		                      <input type="text" class="form-control" id="modifyTune" name="modifyTune" placeholder="請輸入調性">
		                    </div>
		                    <!-- textarea -->
		                    <div class="form-group">
		                      <label for="modifyLyrics">歌詞</label>
		                      <textarea class="form-control" rows="5" id="modifyLyrics" name="modifyLyrics" placeholder="請輸入歌詞"></textarea>
		                    </div>
		                    <!--檔案上傳-->
		                    <div class="form-group">
		                      <label for="fileToUpload">歌譜上傳(PDF)</label><!-- 使用Jquery upload file-->
		                      <input type="file" name="modifyfileToUpload[]" id="modifyfileToUpload" multiple>
		                    </div>
                        <div class="form-group">
                          <ul id="exitsFile">
                            

                          </ul>
                        </div>
		                    <div class="box-footer">
                          <button type="button" class="btn btn-danger pull-left" id="btnDelete">刪除</button>
			                    <button type="button" class="btn btn-info pull-right" id="btnModify">修改</button>
                          <button type="button" class="btn pull-right" id="btnCancel">取消</button>
		                  	</div>
		                  </form>
                      <div id="modifyProgressNumber"></div>
                      <div id="modifyMessage"></div>
		                </div><!-- /.box-body -->
		              </div>
		            </div>
              </div><!-- /.row 修改歌曲表單-->




              <div class="row"><!-- row 新增歌曲表單-->
                <div class="col-md-12">
                  <div class="box box-warning" id="boxSongList" style="display:none;">
                    <div class="box-header with-border">
                      <h3 class="box-title">新增歌曲</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                      <div class="progress active" id="boxProgress" style="display:none;">
                          <div class="progress-bar progress-bar-success progress-bar-striped" style="z-index:2;" role="progressbar" id="uploadProgress" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 10%"></div>
                          <div id="labelProgress" style="margin-left:50%">0%</div>
                      </div>
                      <form role="form" id="formSong" name="formSong" method="post" action="upload.php" enctype="multipart/form-data">
                        <!-- text input -->
                        <div class="form-group">
                          <label for="newSongChName">中文歌名</label>
                          <input type="text" class="form-control" id="newSongChName" name="newSongChName" placeholder="請輸入中文歌名">
                        </div>
                        <div class="form-group">
                          <label for="newSongEnName">英文歌名</label>
                          <input type="text" class="form-control" id="newSongEnName" name="newSongEnName" placeholder="請輸入英文歌名">
                        </div>
                        <div class="form-group">
                          <label for="newAlbumName">專輯</label>
                          <input type="text" class="form-control" id="newAlbumName" name="newAlbumName" placeholder="專輯名稱" readonly=true>
                          <input type="hidden" id="newAlbumID" name="newAlbumID">
                        </div>
                        <div class="form-group">
                          <label for="newPage">頁碼</label>
                          <input type="text" class="form-control" id="newPage" name="newPage" placeholder="請輸入頁碼">
                        </div>
                        <div class="form-group">
                          <label for="newTune">調性</label>
                          <input type="text" class="form-control" id="newTune" name="newTune" placeholder="請輸入調性">
                        </div>
                        <!-- textarea -->
                        <div class="form-group">
                          <label for="newLyrics">歌詞</label>
                          <textarea class="form-control" rows="5" id="newLyrics" name="newLyrics" placeholder="請輸入歌詞"></textarea>
                        </div>
                        <!--檔案上傳-->
                        <div class="form-group">
                          <label for="fileToUpload">歌譜上傳(PDF)</label><!-- 使用Jquery upload file-->
                          <input type="file" name="fileToUpload[]" id="fileToUpload" multiple>
                        </div>
                        <div class="box-footer">
                          <button type="button" class="btn btn-default" id="btnReset">清空</button>
                          <button type="button" class="btn btn-info pull-right" id="btnSubmit">送出</button>
                        </div>
                      </form>
                      <div id="progressNumber"></div>
                      <div id="message"></div>
                    </div><!-- /.box-body -->
                  </div>
                </div>
              </div><!-- /.row 新增歌曲表單-->







            </div><!-- /.box-body -->           
          </div><!-- /.box -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
	<?php
		include("contentbottom.php");
	?>
      
    <script src="js/newSong.js"></script>
    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- Select2 -->
    <script src="plugins/select2/select2.full.min.js"></script>
    <!-- InputMask -->
    <script src="plugins/input-mask/jquery.inputmask.js"></script>
    <script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
    <script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>
    <!-- date-range-picker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap color picker -->
    <script src="plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
    <!-- bootstrap time picker -->
    <script src="plugins/timepicker/bootstrap-timepicker.min.js"></script>
    <!-- SlimScroll 1.3.0 -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- iCheck 1.0.1 -->
    <script src="plugins/iCheck/icheck.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- Page script -->
    <script>
      $(function () {
        //Initialize Select2 Elements
        $(".select2").select2();

        //Datemask dd/mm/yyyy
        $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
        //Datemask2 mm/dd/yyyy
        $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
        //Money Euro
        $("[data-mask]").inputmask();

        //Date range picker
        $('#reservation').daterangepicker();
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
        //Date range as a button
        $('#daterange-btn').daterangepicker(
                {
                  ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                  },
                  startDate: moment().subtract(29, 'days'),
                  endDate: moment()
                },
        function (start, end) {
          $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
        );

        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
          checkboxClass: 'icheckbox_minimal-blue',
          radioClass: 'iradio_minimal-blue'
        });
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
          checkboxClass: 'icheckbox_minimal-red',
          radioClass: 'iradio_minimal-red'
        });
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
          checkboxClass: 'icheckbox_flat-green',
          radioClass: 'iradio_flat-green'
        });

        //Colorpicker
        $(".my-colorpicker1").colorpicker();
        //color picker with addon
        $(".my-colorpicker2").colorpicker();

        //Timepicker
        $(".timepicker").timepicker({
          showInputs: false
        });
      });
    </script>
  </body>
</html>
