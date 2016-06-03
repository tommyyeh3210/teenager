<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>內湖思恩堂內部網站-敬拜表單</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- fullCalendar 2.2.5-->
    <link rel="stylesheet" href="plugins/fullcalendar/fullcalendar.min.css">
    <link rel="stylesheet" href="plugins/fullcalendar/fullcalendar.print.css" media="print">
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
            敬拜表單
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Calendar</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">            
            <div class="col-md-12">
              <div class="box box-primary">
                <div class="box-body no-padding">
                  <!-- THE CALENDAR -->
                  <div id="calendar"></div>
                </div><!-- /.box-body -->
              </div><!-- /. box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
          <div class="row" id="worshipFormBox" style="display:none;">
            <div class="col-md-12">
              <div class="box box-warning">
                <div class="box-header with-border">
                  <h3 class="box-title">敬拜表單</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <form role="form" id="worshipForm" method="get">
                    <!-- text input -->
                    <div class="form-group">
                      <label>日期</label>
                      <input type="date" class="form-control" id="formDate" name="formDate">
                    </div>
                    <div class="form-group">
                      <label for="worshipSong">詩歌敬拜</label>
                      <select class="form-control" id="worshipSong" name="worshipSong">
                        <option value="0">No.X</option>
                        <option value="1">Yes.O</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="bibleScope">讀經範圍</label>
                      <input type="text" class="form-control" name="bibleScope" id="bibleScope" placeholder="ex.創1-5,出10-15"  maxlength="50" />
                    </div>
                    <div class="form-group">
                      <label for="summary">經文摘要(飯糰)</label>
                      <textarea class="form-control" rows="5" placeholder="請輸入經文摘要(飯糰)" id="summary" name="summary" maxlength="70" minlength="4"></textarea>
                    </div>
                    <!-- textarea -->
                    <div class="form-group">
                      <label>十架筆記</label>
                      <textarea class="form-control" rows="5" placeholder="請輸入十架筆記" id="cross" name="cross" maxlength="255" minlength="5"></textarea>
                    </div>
                    <div class="box-footer">
                      <button type="reset" class="btn btn-default">清空</button>
                      <button type="submit" class="btn btn-info pull-right">送出</button>
                    </div>
                  </form>
                </div><!-- /.box-body -->
              </div>
              <!--
                日期
                is讀經
                is靈修
                is詩歌
                十架筆記
              -->
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
    <script src="plugins/fullcalendar/fullcalendar.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.7.2/lang/zh-tw.js"></script>
    <!-- Page specific script -->
    <script>
      $(function () {

        var worshipForm = document.getElementById('worshipForm');
        worshipForm.onsubmit = function(event){
          var formData = new FormData(worshipForm);
          formData.append('id',<?php echo $_SESSION["uid"] ?>);
          var oReq = new XMLHttpRequest();
          //oReq.upload.addEventListener("progress", uploadProgress, false);
          oReq.open("POST", "process/addEvents.php", true);
          oReq.onload = function(oEvent) {
          if (oReq.status == 200) {
              console.log(oReq.responseText);              
            } else {
              console.log("Error " + oReq.status + " occurred when trying to upload your file.<br \/>");
            }
          };
          oReq.send(formData);
        }



        /* initialize the external events
         -----------------------------------------------------------------*/
        function ini_events(ele) {
          ele.each(function () {

            // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
            // it doesn't need to have a start or end
            var eventObject = {
              title: $.trim($(this).text()) // use the element's text as the event title
            };

            // store the Event Object in the DOM element so we can get to it later
            $(this).data('eventObject', eventObject);

            // make the event draggable using jQuery UI
            $(this).draggable({
              zIndex: 1070,
              revert: true, // will cause the event to go back to its
              revertDuration: 0  //  original position after the drag
            });

          });
        }
        ini_events($('#external-events div.external-event'));

        /* initialize the calendar
         -----------------------------------------------------------------*/
        //Date for the calendar events (dummy data)
        var date = new Date();
        var d = date.getDate(),
                m = date.getMonth(),
                y = date.getFullYear();                
        $('#calendar').fullCalendar({
          lang: 'zh-tw',
          header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
          },          
          eventSources: 'process/getAllEvents.php',
          events: [{
              id:0,
              title: 'DefaultEvent',
              start: '1970-01-01',
              worshipSong: 1,
              bibleScope: "ALL",
              summary: "Rice is Good",
              crossText:"Cross save me",
              allday:true,
              backgroundColor: "#FFFFFF", //red
              borderColor: "#FFFFFF" //red
            }],
          selectable: true,          
          dayClick: function(date, jsEvent, view) {
              var isEventsExits = false;
              var events = $('#calendar').fullCalendar('clientEvents');
              for (var i = 0; i < events.length; i++) {
                //console.log(date.format() +"------"+ events[i].start.format("YYYY-MM-DD")+"-----"+ events[i].title);
                if(date.format() == events[i].start.format("YYYY-MM-DD")){
                    isEventsExits = true;
                    $("#formDate").val(events[i].start.format("YYYY-MM-DD"));
                    $("#worshipSong")[0].selectedIndex = events[i].worshipSong;
                    $("#bibleScope").val(events[i].bibleScope);
                    $("#summary").val(events[i].summary);
                    $("#cross").val(events[i].crossText);
                    $("#worshipFormBox").css("display","block");
                    //console.log(events[i].title);
                    break;
                }else{
                  console.log("null");
                    $("#worshipForm")[0].reset();
                    $("#formDate").val(date.format());
                    $("#worshipFormBox").css("display","block");
                }
              }
          },
          eventClick: function (calEvent, jsEvent, view) {
              $("#worshipForm")[0].reset();
              $("#formDate").val(calEvent.start.format("YYYY-MM-DD"));
              $("#worshipSong")[0].selectedIndex = calEvent.worshipSong;
              $("#bibleScope").val(calEvent.bibleScope);
              $("#summary").val(calEvent.summary);
              $("#cross").val(calEvent.crossText);
              $("#worshipFormBox").css("display","block");
          },
          editable: true,
          //droppable: false, // this allows things to be dropped onto the calendar !!!

        });

      });
    </script>
  </body>
</html>
