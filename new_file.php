<?php
session_start();
if ($_SESSION["logged_in"]=="true" && $_SESSION["privilage"]=="0") {
  include("menu/menu_user.php");
  include("notif/user_notif.php");
  include("php/config.php");
  $user_id= $_SESSION['user_id'];
}
else {
  header('location: index.php');
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>File Tracking System | New File</title>
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
                <div class="navbar-item pull-left h5" id="pageTitle">New File</div>
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
<script type="text/javascript">
function select_check(val, input_name){
 var element=document.getElementById(input_name);
 if(val=='other')
   element.style.display='block';
 else
   element.style.display='none';
}

</script>
<div class="padding">
  <div class="row"></div>
  <form method="post" enctype="multipart/form-data">
        <div class="box">
          <div class="box-header">
            <h2>Register File/डाक पंजीकरण</h2>
          </div>
          <div class="box-body">
            <p class="text-muted">Please fill the information to continue</p>
            <div class="row">
              <div class="col-sm-3">
                <div class="form-group">
                  <label>File Type/डाक प्रकार</label>
                  <select name="type"  class="form-control select2" data-ui-jp="select2" data-ui-options="{theme: 'bootstrap'}" onchange="select_check(this.value, 'other_value_type');">
                    <option value="-1">Select Type</option>
                    <?php
                    $conn = mysqli_connect($servername,$username,$password,$dbname);
                    if (!$conn) {
                        die("Connection failed: " . mysqli_connect_error());
                    }
                    $sql='select distinct file_type from files order by file_type';
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                      // output data of each row
                      while($row = mysqli_fetch_assoc($result)) {
                        echo '<option value="'.$row['file_type'].'">'.$row['file_type'].'</option>';
                      }
                    } else {

                    }
                    ?>
                    <option value="other">Other</option>
                  </select>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="other_value_type" id="other_value_type" style='display:none;' placeholder="Enter new type">
                </div>
              </div>
              <div class="col-sm-3">
                <div class="form-group">
                  <label>File Number</label>
                  <input type="text" class="form-control" required name="file_no">
                </div>
              </div>
              <div class="col-sm-3">
                <div class="form-group">
                  <label>Sender/प्रेषक</label>
                  <select name="sender"  class="form-control select2" data-ui-jp="select2" data-ui-options="{theme: 'bootstrap'}" onchange="select_check(this.value, 'other_value_sender');">
                    <option value="-1">Select Sender</option>
                    <?php
                    $sql='select distinct sender from files order by sender';
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                      // output data of each row
                      while($row = mysqli_fetch_assoc($result)) {
                        echo '<option value="'.$row['sender'].'">'.$row['sender'].'</option>';
                      }
                    } else {

                    }
                    ?>
                    <option value="other">Other</option>
                  </select>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="other_value_sender" id="other_value_sender" style='display:none;' placeholder="Enter new sender">
                </div>
              </div>
              <div class="col-sm-3">
                <div class="form-group">
                  <label>Letter Number/पत्र क्रमांक</label>
                  <input type="text" class="form-control" required name="letter_no">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-3">
                <div class="form-group">
                  <label>DGP Office Number</label>
                  <input type="text" class="form-control" required name="dgp_no">
                </div>
              </div>
              <div class="col-sm-3">
                <div class="form-group">
                  <label>Letter Date/पत्र की दिनांक</label>
                  <div class="input-group date" data-ui-jp="datetimepicker" data-ui-options="{
                    format: 'DD/MM/YYYY',
                    icons: {
                      time: 'fa fa-clock-o',
                      date: 'fa fa-calendar',
                      up: 'fa fa-chevron-up',
                      down: 'fa fa-chevron-down',
                      previous: 'fa fa-chevron-left',
                      next: 'fa fa-chevron-right',
                      today: 'fa fa-screenshot',
                      clear: 'fa fa-trash',
                      close: 'fa fa-remove'
                    }
                  }">
                  <input type="text" class="form-control has-value" required name="date">
                  <span class="input-group-addon">
                      <span class="fa fa-calendar"></span>
                    </span>
                  </div>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="form-group">
                  <label>Subject/विषय</label>
                  <select name="subject"  class="form-control select2" data-ui-jp="select2" data-ui-options="{theme: 'bootstrap'}" onchange="select_check(this.value, 'other_value_subject');">
                    <option value="-1">Select Subject</option>
                    <?php
                    $sql='select distinct subject from files order by file_type';
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                      // output data of each row
                      while($row = mysqli_fetch_assoc($result)) {
                        echo '<option value="'.$row['subject'].'">'.$row['subject'].'</option>';
                      }
                    } else {

                    }
                    ?>
                    <option value="other">Other</option>
                  </select>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="other_value_subject" id="other_value_subject" style='display:none;' placeholder="Enter new subject">
                </div>
              </div>
              <div class="col-sm-3">
                <div class="form-group">
                  <label>Time Limit/समय सीमा</label>
                  <input type="date" class="form-control" required name="report_time">
                </div>
              </div>
              
            </div>
            <div class="row">
              <div class="col-sm-8">
                <div class="form-group">
                  <label>Description विवरण</label>
                  <input type="text" class="form-control" required name="description" placeholder="Description here">
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label>Add Notesheet/नोटशीट जोड़ें</label>
                  <select name="notesheet[]"  class="form-control select2-multiple" multiple data-ui-jp="select2" data-ui-options="{theme: 'bootstrap'}" onchange="select_check(this.value, 'other_value_subject');">
                    <option value="-1">Select Notesheet</option>
                    <?php
                    $sql='select id, subject from notesheet where file_id is NULL';
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                      // output data of each row
                      while($row = mysqli_fetch_assoc($result)) {
                        echo '<option value="'.$row['id'].'">'.$row['id'].' - '.$row['subject'].'</option>';
                      }
                    } else {

                    }
                    ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Select receipent/प्राप्त करने वाले का चयन करें</label>
                  <select name="send_to" class="form-control select2" data-ui-jp="select2" data-ui-options="{theme: 'bootstrap'}">
                    <option value="-1">None Selected</option>
                    <?php
                    $sql='select user_id, user_name from user where privilage=0 and user_id <> '.$user_id.' order by user_name';
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                      // output data of each row
                      while($row = mysqli_fetch_assoc($result)) {
                        echo '<option value="'.$row['user_id'].'">'.$row['user_name'].'</option>';
                      }
                    } else {

                    }
                    ?>
                  </select>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Remark/टिप्पणी</label>
                  <input type="text" class="form-control" required name="remark" placeholder="Remark here">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6 from-group">
                <label>Choose mail type/प्रकार</label><br>
                <label class="md-check">
                  <input type="radio" name="mail_type" checked value="Action">
                  <i class="blue"></i>
                  Send for action/कार्रवाई के लिए भेजें
                </label><br>
                <label class="md-check">
                  <input type="radio" name="mail_type" value="Information">
                  <i class="blue"></i>
                  Send for information/जानकारी के लिए भेजें
                </label>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Upload File/दस्तावेज अपलोड करें</label><br>
                  <label class="custom-file">
                    <input type="file" id="file" class="custom-file-input" name="file">
                    <span class="custom-file-control"></span>
                  </label>
                </div>
              </div>
            </div>
          </div>
          <div class=" p-a text-right">
            <input type="reset" class="btn default" value="Clear">
            <input type="submit" class="btn default" value="Save Draft" formaction="php/send_file.php?status=0">
            <input type="submit" class="btn btn-primary" value="Send/भेजें" formaction="php/send_file.php?status=1">
          </div>
        </div>
      </form>
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
<!-- endbuild -->
</body>
</html>
