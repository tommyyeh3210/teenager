<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>內湖思恩堂內部網站-詩歌查詢</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- jQuery Mobile 1.3.2 
    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.css">-->
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- DataTables -->
  	<link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">    
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
    -->
    <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
    	input[type=checkbox]{
    	  -ms-transform: scale(2); /* IE */
		  -moz-transform: scale(2); /* FireFox */
		  -webkit-transform: scale(2); /* Safari and Chrome */
		  -o-transform: scale(2); /* Opera */
		  margin :10px;
    	} 
    	/*th:nth-child(7),td:nth-child(7){display: none};  隱藏某一欄位*/ 
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
			<b>詩歌查詢</b>
			<small>Search Song</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i>首頁</a></li>
			<li><a href="#">詩歌管理</a></li>
			<li class="active">詩歌查詢<li>
		</ol>
		</section>

		<!-- Main content -->
		<section class="content">
			<!--詩歌查詢 -->
			<div class="row">
				<!-- center column -->
				<div class="col-md-12">
					<div class="box box-primary">
						<div class="box-header with-border">
							<h3 class="box-title">詩歌查詢</h3>
						</div>
						<div class="box-body">
							<div class="col-md-12">								
								<div class="progress active" id="searchProgress" style="display: none;">
		                          <div class="progress-bar progress-bar-success progress-bar-striped" style="z-index:2;" role="progressbar" id="searchProgressValue" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 10%"></div>
		                          <div id="searchLabelProgress" style="margin-left:50%;margin-right:50%;">0%</div>
		                    	</div>
		                      <!--詩歌查詢-->
								<form action="searchSong.php" name="songSearchForm" id="songSearchForm" method="POST" >
									<div class="input-group">
										<input type="text" name="chQ" id="chQ" class="form-control" placeholder="中文搜尋..." />
										<span class="input-group-btn">
											<button type="button" name="searchChQ" id="searchChQ" class="btn btn-flat"><i class="fa fa-search"></i></button>
										</span>
									</div>
									<div class="input-group">
										<input type="text" name="enQ" id="enQ" class="form-control" placeholder="英文搜尋..." >
										<span class="input-group-btn">
											<button type="button" name="searchEnQ" id="searchEnQ" class="btn btn-flat"><i class="fa fa-search"></i></button>
										</span>
									</div>
									<div class="input-group">
										<input type="text" name="tuneQ" id="tuneQ" class="form-control" placeholder="調性搜尋..." >
										<span class="input-group-btn">
											<button type="button" name="searchTuneQ" id="searchTuneQ" class="btn btn-flat"><i class="fa fa-search"></i></button>
										</span>
									</div>
									<div class="input-group">
										<input type="text" name="lyricsQ" id="lyricsQ" class="form-control" placeholder="歌詞搜尋..." >
										<span class="input-group-btn">
											<button type="button" name="searchLyricsQ" id="searchLyricsQ" class="btn btn-flat"><i class="fa fa-search"></i></button>
										</span>
									</div>
									<button type="button" class="btn-block btn btn-primary " onclick="call()">搜尋</button>
									<button type="button" class="btn-block btn btn-success " onclick="refreshSongList()">載入所有歌曲</button>
								</form>
							</div>
							<!--End詩歌查詢-->
							<div class="col-md-12"><!--詩歌列表開始 -->
								<div class="panel-group" role="tablist" aria-multiselectable="true" id="allSongList">
									<!--
									<div class="panel panel-default">
										<div class="panel-heading" role="tab" id="headingX" style="padding:0px;">
											<h4 class="panel-title">
												<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseX" aria-expanded="false" aria-controls="collapseX">
													<table class="table table-bordered" style="margin-bottom:0px;">
														<tbody>
										                    <tr>
										                        <td style="width:50%;text-align:center;">信實的神</td>
										                        <td style="width:50%;text-align:center;">You are faithful</td>
										                    </tr>
										                </tbody>
									                </table>
												</a>
											</h4>
										</div>
										<div id="collapseX" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingX">
											<div class="panel-body">	-->													  
												<!-- 一開始，在行動設備上 column 會是 50% 寬度，提升至桌面大小後，寬度會平均為 33.3% -->
												<!--<div class="row">
													<div class="col-md-4"><b>歌詞：</b><br>主 我來尋求祢的面 求祢充滿我 來充滿我 主 我渴慕祢的同在 求祢潔淨我 來充滿我 耶穌 耶穌 耶穌 耶穌 祢的寶血洗淨我 耶穌 耶穌 耶穌 耶穌 祢以恩典我我冠冕</div>
													<div class="col-md-4" style="line-height: 22px;">
														<b>專輯：</b><span class="label label-success">讚美之泉 -深觸我心</span><br />
														<b>調性：</b><span class="label label-warning">D</span><br />
														<b>樂譜區：</b><br />
														<a href="#">樂譜一</a><br />
													</div>
													<div class="col-md-4">														
														<b>備註：</b><br />
														<a href="#">吉他教學</a><br />
														<a href="#">貝斯教學</a><br />
													</div>
												</div>															
											</div>
										</div>
									</div>
									-->



								</div>
							</div>
							<!--詩歌列表結束-->
						</div>
					</div>
				</div>							
			</div>
			<!--END詩歌查詢-->



<div class="box" id="allSongBox" style="display:block;">
    <div class="box-header">
        <!--<h3 class="box-title">歌曲列表</h3>--> 
        <h3 class="box-title">        
        	<div class="col-xs-12 col-md-12">顯示：</div>
	        <div class="col-xs-6 col-md-4"><input type="checkbox" class="scaleChecbox" name="tableCol" id="enCol" onclick="dataShow(this);"><span style="margin-left:8px;">英文歌名</span></input></div>
	        <div class="col-xs-6 col-md-4"><input type="checkbox" class="scaleChecbox" name="tableCol" id="pageCol" onclick="dataShow(this);"><span style="margin-left:8px;">頁碼</span></input></div>
	        <div class="col-xs-6 col-md-4"><input type="checkbox" class="scaleChecbox" name="tableCol" id="tuneCol" onclick="dataShow(this);"><span style="margin-left:8px;">調性</span></input></div>
	        <div class="col-xs-6 col-md-4"><input type="checkbox" class="scaleChecbox" name="tableCol" id="albumCol" onclick="dataShow(this);"><span style="margin-left:8px;">專輯</span></input></div>
	        <div class="col-xs-6 col-md-4"><input type="checkbox" class="scaleChecbox" name="tableCol" id="lyricsCol" onclick="dataShow(this);"><span style="margin-left:8px;">歌詞</span></input></div>
	        <div class="col-xs-6 col-md-4"><input type="checkbox" class="scaleChecbox" name="tableCol" id="sheetCol" onclick="dataShow(this);"><span style="margin-left:8px;">歌譜</span></input></div>		       
        </h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap table-responsive no-padding">            
            <div class="row">
                <div class="col-sm-12">
                    <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                        <thead>
                            <tr role="row">
                            	<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Song ID: activate to sort column ascending">編號</th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Chinese Name: activate to sort column ascending">中文歌名</th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="English Name: activate to sort column ascending">英文歌名</th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Pages: activate to sort column ascending">頁碼</th>
                                <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Tune: activate to sort column descending" aria-sort="ascending">調性</th>
                                <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Album: activate to sort column descending" aria-sort="ascending">專輯</th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Lyrics: activate to sort column ascending">歌詞</th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Sheet: activate to sort column ascending">歌譜</th>
                            </tr>
                        </thead>
                        <tbody id="AllSong">
                            <!--<tr role="row" class="odd">
                                <td class="">Gecko</td>
                                <td class="">Netscape 7.2</td>
                                <td class="">Win 95+ / Mac OS 8.6-9.2</td>
                                <td class="sorting_1">1.7</td>
                                <td>A</td>
                                <td>B</td>
                                <td>C</td>
                                <td>D</td>
                            </tr>-->
                            
                        </tbody>                        
                    </table>
                </div>
            </div>            
        </div>
    </div>
    <!-- /.box-body -->
</div>








		</section>
		<!-- /.content -->
      </div>
      <!-- /.content-wrapper -->

    <?php
    	include("contentbottom.php");
    ?>

    <!-- REQUIRED JS SCRIPTS -->
    <script src="js/searchSong.js"></script>
    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    
    <!-- DataTables -->
	<script src="plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
	<!-- SlimScroll -->
	<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
	<!-- FastClick -->
	<script src="plugins/fastclick/fastclick.js"></script>
	<!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    

    
	

    <!-- Optionally, you can add Slimscroll and FastClick plugins.
         Both of these plugins are recommended to enhance the
         user experience. Slimscroll is required when using the
         fixed layout. -->
  </body>
</html>