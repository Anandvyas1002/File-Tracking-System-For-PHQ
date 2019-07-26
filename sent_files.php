<?php
session_start();
if ($_SESSION["logged_in"]=="true" && $_SESSION["privilage"]=="0") {
  include("menu/menu_user.php");
  include("notif/user_notif.php");
  include("php/config.php");
}
else {
  header('location: index.php');
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>File Tracking System | Sent Files</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimal-ui" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <!-- for ios 7 style, multi-resolution icon of 152x152 -->
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-barstyle" content="black-translucent">
  <link rel="apple-touch-icon" href="images/logo.png">
  <meta name="apple-mobile-web-app-title" content="Flatkit">
  <!-- for Chrome on Android, multi-resolution icon of 196x196 -->
  <meta name="mobile-web-app-capable" content="yes">
  <link rel="shortcut icon" sizes="196x196" href="images/logo.png">

  <!-- style -->
  <link rel="stylesheet" href="css/animate.css/animate.min.css" type="text/css" />
  <link rel="stylesheet" href="css/glyphicons/glyphicons.css" type="text/css" />
  <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="css/material-design-icons/material-design-icons.css" type="text/css" />
  <link rel="stylesheet" href="css/ionicons/css/ionicons.min.css" type="text/css" />
  <link rel="stylesheet" href="css/simple-line-icons/css/simple-line-icons.css" type="text/css" />
  <link rel="stylesheet" href="css/bootstrap/dist/css/bootstrap.min.css" type="text/css" />

  <!-- build:css css/styles/app.min.css -->
  <link rel="stylesheet" href="css/styles/app.css" type="text/css" />
  <link rel="stylesheet" href="css/styles/style.css" type="text/css" />
  <!-- endbuild -->
  <link rel="stylesheet" href="css/styles/font.css" type="text/css" />
</head>
<body>
  <div class="app" id="app">

<!-- ############ LAYOUT START-->

  <!-- aside -->
  <div id="aside" class="app-aside fade nav-dropdown black">
    <!-- fluid app aside -->
    <div class="navside dk" data-layout="column">
      <div class="navbar no-radius">
        <!-- brand -->
        <a href="admin.php" class="navbar-brand">
        	<span class="hidden-folded inline">FTS</span>
        </a>
        <!-- / brand -->
      </div>
      <div data-flex class="hide-scroll">
          <?php echo $nav; ?>
      </div>
      <div data-flex-no-shrink>
        <div class="nav-fold dropup">
        </div>
      </div>
    </div>
  </div>
  <!-- / -->

  <!-- content -->
  <div id="content" class="app-content box-shadow-z2 bg pjax-container" role="main">
    <div class="app-header white bg b-b">
          <div class="navbar" data-pjax>
                <a data-toggle="modal" data-target="#aside" class="navbar-item pull-left hidden-lg-up p-r m-a-0">
                  <i class="ion-navicon"></i>
                </a>
                <div class="navbar-item pull-left h5" id="pageTitle">Sent Files</div>
                <!-- nabar right -->
                <ul class="nav navbar-nav pull-right">
                  <li class="nav-item dropdown pos-stc-xs">
                    <a class="nav-link" data-toggle="dropdown">
                      <i class="ion-android-search w-24"></i>
                    </a>
                    <div class="dropdown-menu text-color w-md animated fadeInUp pull-right">
                      <!-- search form -->
                      <form class="navbar-form form-inline navbar-item m-a-0 p-x v-m" role="search">
                        <div class="form-group l-h m-a-0">
                          <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search projects...">
                            <span class="input-group-btn">
                              <button type="submit" class="btn white b-a no-shadow"><i class="fa fa-search"></i></button>
                            </span>
                          </div>
                        </div>
                      </form>
                      <!-- / search form -->
                    </div>
                  </li>
                  <li class="nav-item dropdown pos-stc-xs">
                    <a class="nav-link clear" data-toggle="dropdown">
                      <i class="ion-android-notifications-none w-24"></i>
                      <span class="label p-a-0 danger"></span>
                    </a>
                    <!-- dropdown -->
                    <div class="dropdown-menu pull-right w-xl animated fadeIn no-bg no-border no-shadow">
                        <?php echo $notif; ?>
                    </div>
                    <!-- / dropdown -->
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link clear" data-toggle="dropdown">
                      <span class="avatar w-32">
                        <img src="images/user.png" class="w-full rounded" alt="...">
                      </span>
                    </a>
                    <div class="dropdown-menu w dropdown-menu-scale pull-right">
                      <a class="dropdown-item" href="profile.php">
                        <span>Profile</span>
                      </a>
                      <a class="dropdown-item" href="settings.php">
                        <span>Settings</span>
                      </a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="docs.html">
                        Need help?
                      </a>
                      <a class="dropdown-item" href="php/logout.php">Sign out</a>
                    </div>
                  </li>
                </ul>
                <!-- / navbar right -->
          </div>
    </div>
    <div class="app-footer white bg p-a b-t">
      <div class="pull-right text-sm text-muted">Version <?php echo $version; ?></div>
      <span class="text-sm text-muted"><?php echo $footer_note; ?>.</span>
    </div>
    <div class="app-body">

<!-- ############ PAGE START-->




<div class="padding">
  <div class="box">
    <div class="box-header">
      <h2>Sent Files/जावक पँजिया </h2>
    </div>
    <div class="table-responsive" id="datatable">
      <!-- <table data-ui-jp="dataTable" data-ui-options="{
          sAjaxSource: 'api/file_sent.php',
          paging: false,
          lengthChange: false,
          buttons: [ 'copy', 'excel', 'pdf', 'colvis' ],
          aoColumns: [
            { mData: 'id' },
            { mData: 'file_no' },
            { mData: 'subject' },
            { mData: 'user_name' },
            { mData: 'file_type' },
            { mData: 'type' },
            { mData: 'dispatch_time' },
            { mData: 'status' }
          ],
          'initComplete': function () {
            this.api().buttons().container()
              .appendTo( '#datatable .col-md-6:eq(0)' );
              var api = this.api();
              api.$('tr').click( function () {
                  var id=$(this).closest('tr').find('td:eq(0)').text();
                  location.href = 'file_info.php?pid=1&tid='+id;
              } );
          }
        }" class="table table-striped b-t b-b table-hover"> -->
        <div class='container form-group'>
        <input type="text" id="myInput" class='form-control'  placeholder="Search Here" title="Type subject">
</div>

      <br>  
      <div class="container">  
      <table class='table table-responsive table-striped b-t b-b table-hover ' id='myTable'> 
      <thead>
          <tr>
            <th  style="width:5%">ID</th>
            <th  style="width:10%">File Number</th>
            <th  style="width:30%">Subject/विषय</th>
            <th  style="width:15%">Sent to/प्रेषक</th>
            <th  style="width:10%">File Type/फाइल प्रकार</th>
            <th  style="width:10%">Mail Type/प्रकार</th>
            <th  style="width:10%">Sent Time/समय</th>
            <th  style="width:10%">Report Time/समय</th>
            <th  style="width:5%">Status</th>
          </tr>
        </thead>
        <tbody id="myTableBody">
        <?php
          $user_id=$_SESSION["user_id"];
          $conn = new mysqli($servername, $username, $password, $dbname);
          // Check connection
          if ($conn->connect_error) {
            $response['error']=true;
            $response['message']="Connection Failed";
       //     die(json_encode($response));
          }
          $get_inbox='select t.id, f.file_no, f.subject, u.user_name, f.file_type, t.type, date(t.dispatch_time) as dispatch_time, t.report_time, "Sent" as "status" from user u inner join transactions t on t.receiver_id=u.user_id inner join files f on t.file_id=f.id where t.Sender_id='.$user_id.' and t.status=1;';
          $result = $conn->query($get_inbox);
          if ($result->num_rows > 0) {
              // output data of each row
              while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>".$row["id"]."</td>
                        <td>".$row["file_no"]."</td>
                        <td>".$row["subject"]."</td>
                        <td>".$row["user_name"]."</td>
                        <td>".$row["file_type"]."</td>
                        <td>".$row["type"]."</td>
                        <td>".$row["dispatch_time"]."</td>
                        <td>".$row["report_time"]."</td>
                        <td>".$row["status"]."</td>
                        
                     </tr>";
              }
          } 
          // else {
          //   $response['error']=true;
          // }
          $conn->close();
?>
        </tbody>
      </table>
      </div>
    </div>
  </div>
</div>
<!-- ############ PAGE END-->

    </div>
  </div>
  <!-- / -->


  <!-- ############ SWITHCHER START-->
    <div id="switcher">
      <div class="switcher dark-white" id="sw-theme">
        <a href="#" data-ui-toggle-class="active" data-ui-target="#sw-theme" class="dark-white sw-btn">
          <i class="fa fa-gear text-muted"></i>
        </a>
        <div class="box-header">

          <strong>Theme Switcher</strong>
        </div>
        <div class="box-divider"></div>
        <div class="box-body">
          <p id="settingLayout" class="hidden-md-down">
            <label class="md-check m-y-xs" data-target="folded">
              <input type="checkbox">
              <i></i>
              <span>Folded Aside</span>
            </label>
            <label class="m-y-xs pointer" data-ui-fullscreen data-target="fullscreen">
              <span class="fa fa-expand fa-fw m-r-xs"></span>
              <span>Fullscreen Mode</span>
            </label>
          </p>
          <p>Colors:</p>
          <p data-target="color">
            <label class="radio radio-inline m-a-0 ui-check ui-check-color ui-check-md">
              <input type="radio" name="color" value="primary">
              <i class="primary"></i>
            </label>
            <label class="radio radio-inline m-a-0 ui-check ui-check-color ui-check-md">
              <input type="radio" name="color" value="accent">
              <i class="accent"></i>
            </label>
            <label class="radio radio-inline m-a-0 ui-check ui-check-color ui-check-md">
              <input type="radio" name="color" value="warn">
              <i class="warn"></i>
            </label>
            <label class="radio radio-inline m-a-0 ui-check ui-check-color ui-check-md">
              <input type="radio" name="color" value="success">
              <i class="success"></i>
            </label>
            <label class="radio radio-inline m-a-0 ui-check ui-check-color ui-check-md">
              <input type="radio" name="color" value="info">
              <i class="info"></i>
            </label>
            <label class="radio radio-inline m-a-0 ui-check ui-check-color ui-check-md">
              <input type="radio" name="color" value="warning">
              <i class="warning"></i>
            </label>
            <label class="radio radio-inline m-a-0 ui-check ui-check-color ui-check-md">
              <input type="radio" name="color" value="danger">
              <i class="danger"></i>
            </label>
          </p>
          <p>Themes:</p>
          <div data-target="bg" class="clearfix">
            <label class="radio radio-inline m-a-0 ui-check ui-check-lg">
              <input type="radio" name="theme" value="">
              <i class="light"></i>
            </label>
            <label class="radio radio-inline m-a-0 ui-check ui-check-color ui-check-lg">
              <input type="radio" name="theme" value="grey">
              <i class="grey"></i>
            </label>
            <label class="radio radio-inline m-a-0 ui-check ui-check-color ui-check-lg">
              <input type="radio" name="theme" value="dark">
              <i class="dark"></i>
            </label>
            <label class="radio radio-inline m-a-0 ui-check ui-check-color ui-check-lg">
              <input type="radio" name="theme" value="black">
              <i class="black"></i>
            </label>
          </div>
        </div>
      </div>
    </div>
  <!-- ############ SWITHCHER END-->

<!-- ############ LAYOUT END-->
  </div>


<!-- build:js scripts/app.min.js -->
<!-- jQuery -->
  <script src="libs/jquery/dist/jquery.js"></script>
<!-- Bootstrap -->
  <script src="libs/tether/dist/js/tether.min.js"></script>
  <script src="libs/bootstrap/dist/js/bootstrap.js"></script>
<!-- core -->
  <script src="libs/jQuery-Storage-API/jquery.storageapi.min.js"></script>
  <script src="libs/PACE/pace.min.js"></script>
  <script src="libs/jquery-pjax/jquery.pjax.js"></script>
  <script src="libs/blockUI/jquery.blockUI.js"></script>
  <script src="libs/jscroll/jquery.jscroll.min.js"></script>

  <script src="scripts/config.lazyload.js"></script>
  <script src="scripts/ui-load.js"></script>
  <script src="scripts/ui-jp.js"></script>
  <script src="scripts/ui-include.js"></script>
  <script src="scripts/ui-device.js"></script>
  <script src="scripts/ui-form.js"></script>
  <script src="scripts/ui-modal.js"></script>
  <script src="scripts/ui-nav.js"></script>
  <script src="scripts/ui-list.js"></script>
  <script src="scripts/ui-screenfull.js"></script>
  <script src="scripts/ui-scroll-to.js"></script>
  <script src="scripts/ui-toggle-class.js"></script>
  <script src="scripts/ui-taburl.js"></script>
  <script src="scripts/app.js"></script>
  <script src="scripts/ajax.js"></script>
  <script src="scripts/myscript.js"></script>
<!-- endbuild -->
</body>
</html>
<script>

    
    var table1 = document.getElementById('myTable');
    
    for(var i = 1; i < table1.rows.length; i++)
    {
        table1.rows[i].onclick = function()
        {
            var id = this.cells[0].innerHTML;
            window.location='file_info.php?pid=1&tid='+id;
        };
    }


$( document ).ready(function(){
                var table = document.getElementById('myTable');
               
                for(var j = 1; j < table.rows.length; j++)
                {
                    id=table.rows[j].cells[7].innerHTML;     
                    var report_date = new Date(id);
                    var current_date = new Date();

         // time difference
                    var timeDiff =report_date.getTime() - current_date.getTime() ;

         // days difference
                    var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24));
                   // alert(typeof(diffDays));
                    
         // difference
         
                        if(diffDays>5 && diffDays<=10){
                            table.rows[j].style.backgroundColor = "#ff7733";
                            }
                        else if(diffDays<5){
                            table.rows[j].style.backgroundColor = "#ff6666";
                            }
                        else{
                            table.rows[j].style.backgroundColor = "#5c5cd6";
                            }    
                        
}
})

</script>
