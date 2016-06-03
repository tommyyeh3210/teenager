<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>內湖思恩堂內部網站-權限管理</title>
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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
      input[type=checkbox]{
        width: 25px;
        height: 25px;
      }
      th:nth-child(3),td:nth-child(3){text-align:center;};

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
            權限管理
            <small>Authority manage</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>首頁</a></li>
            <li class="active">系統管理</li>
            <li class="active">權限</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">          
          <div class="row">
            <div class="col-md-12">
              <div class="nav-tabs-custom">
              <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">小組員</a></li>
                <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">小組長</a></li>
                <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">事工負責人</a></li>
                <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">輔導</a></li>
                <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">傳道</a></li>
                <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">牧師</a></li>
                <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">系統管理員</a></li>
                <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
              </ul>
              <div class="tab-content">
                <div class="tab-pane active" id="tab_1">                  
                  <table id="example" class="display" cellspacing="0" width="100%">
                      <thead>
                          <tr>
                              <th>#</th>
                              <th>項目</th>
                              <th>勾選</th>                              
                          </tr>
                      </thead>                      
                      <tbody>
                          <tr>
                              <td>1</td>
                              <td>觀看公告事項</td>
                              <td><input type="checkbox" name="a1"/></td>
                          </tr>
                          <tr>
                              <td>2</td>
                              <td>使用詩歌查詢</td>
                              <td><input type="checkbox" name="a2"/></td>                              
                          </tr>
                      </tbody>
                  </table>

                  
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="tab_2">
                  The European languages are members of the same family. Their separate existence is a myth.
                  For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ
                  in their grammar, their pronunciation and their most common words. Everyone realizes why a
                  new common language would be desirable: one could refuse to pay expensive translators. To
                  achieve this, it would be necessary to have uniform grammar, pronunciation and more common
                  words. If several languages coalesce, the grammar of the resulting language is more simple
                  and regular than that of the individual languages.
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="tab_3">
                  Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                  Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                  when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                  It has survived not only five centuries, but also the leap into electronic typesetting,
                  remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset
                  sheets containing Lorem Ipsum passages, and more recently with desktop publishing software
                  like Aldus PageMaker including versions of Lorem Ipsum.
                </div>
                <!-- /.tab-pane -->
              </div>
              <!-- /.tab-content -->
            </div>



              
            </div>
          </div>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

    <?php
      include("contentbottom.php");
    ?>
      
    
    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <!-- DataTables -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- Slimscroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- fullCalendar 2.2.5 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>   
    <script>
      $(function() {
        $('#example').DataTable({
          "searching": false,
          "lengthChange": false,
          "paging":false,
          
        });
      });
      
    </script>
  </body>
</html>
