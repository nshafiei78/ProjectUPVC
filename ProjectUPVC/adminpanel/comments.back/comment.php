<?php
include( "../../functions/function.php" );
include( "../../functions/connect.php" );
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="Mosaddek">
<meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
<link rel="shortcut icon" href="../template/img/favicon.html">
<title>درب‌ها</title>

<!-- Bootstrap core CSS -->
<link href="../template/css/bootstrap.min.css" rel="stylesheet">
<link href="../template/css/bootstrap-reset.css" rel="stylesheet">
<!--external css-->
<link href="../template/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
<!-- Custom styles for this template -->
<link href="../template/css/style.css" rel="stylesheet">
<link href="../template/css/style-responsive.css" rel="stylesheet" />

<!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries --> 
<!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<?php
//header start
@includepage( "../inc_template/header" );
//header end

//sidbar start
@includepage( "../inc_template/menucomments" );
//sidbar end
?>
<section id="main-content">
  <section class="wrapper"> 
    <!-- page start-->
    <div class="row">
      <div class="col-lg-12">
        <section class="panel">
          <header class="panel-heading"> لیست درب‌ها </header>
          <form class="form-horizontal" role="form" method="post" action="../comments/comment.php" enctype="multipart/form-data">
            <div class="form-group" style="margin-top:50px;">
                    <label class="col-lg-2 control-label" style="width: 6%; margin-right: 60px; margin-top: -5px">نام</label>
              <div class="col-lg-10">
                <div class="row">
                  <div class="col-lg-2">
                    <input type="text" name="FirstName" id="FirstNameId" class="form-control">
                  </div>
                        <label class="col-lg-2 control-label" style="width: 15%; margin-right: 60px; margin-top: -5px">نام خانوادگی</label>
                  <div class="col-lg-2">
                    <input type="text" name="LastName" id="LastNameId"  class="form-control" >
                  </div>
                        <label class="col-lg-2 control-label" style="width: 15%; margin-right: 60px; margin-top: -5px">نام کاربری</label>
                  <div class="col-lg-2">
                    <input type="text" name="UserName" id="UseNameId"class="form-control" >
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-offset-2 col-lg-10" style="margin-top: 30px; margin-right:10%;display: flex; justify-content: flex-end;">
                <button type="submit" name="search_btn" class="btn btn-success" style="margin-left: 10px;">جست‌وجو</button>
                <button type="submit" name="clear_btn" class="btn btn-success">بازگشت</button>
              </div>
            </div>
            <table class="table table-striped border-top" id="sample_1 " style="text-align: center; margin-top: 50px;">
              <thead>
                <tr style="text-align: center;">
                  <th style="width: 8px;"> </th>
                  <th style="text-align: center;">ردیف</th>
                  <th class="hidden-phone" style="text-align: center;">نام</th>
                  <th class="hidden-phone" style="text-align: center;">نام خانوادگی</th>
                  <th class="hidden-phone" style="text-align: center;">نام کاربری</th>
                  <th class="hidden-phone" style="text-align: center;">ایمیل</th>
                  <th class="hidden-phone" style="text-align: center;">توضیحات</th>
                  <th class="hidden-phone" style="text-align: center;">عملیات</th>
                </tr>
              </thead>
              <tbody>
              <div class="row">
                <div class="col-md-12">
                  <?php
                  if ( isset( $_POST[ 'search_btn' ] ) ) {
                    $FirstName = $_POST[ 'FirstName' ];
                    $LastName = $_POST[ 'LastName' ];
                    $UserName = $_POST[ 'UserName' ];

                  } elseif ( isset( $_POST[ 'clear_btn' ] ) ) {
                      $FirstName = null;
                      $LastName = null;
                      $UserName = null;
                  }
                  else {
                    $FirstName = null;
                      $LastName = null;
                      $UserName = null;
                  }
                  if ( $FirstName != null or $LastName != null or $UserName != null ) {
                    $sql = "SELECT Id,Username,FirstName, LastName, Email, Description FROM comments WHERE FirstName = '$FirstName' or LastName ='$LastName'  or UserName = '$UserName'";
                  } else {
                    $sql = "SELECT Id,Username,FirstName, LastName, Email, Description FROM comments";
                  }
                  $result = mysqli_query( $conn, $sql );
                  $i = 1;
                  while ( $rows = $result->fetch_assoc() ) {
                    ?>
                  <tr class="odd gradeX">
                    <td></td>
                    <td><?=$i;?></td>
                    <td class="hidden-phone"><?=$rows['FirstName'];?></td>
                    <td class="hidden-phone"><?=$rows['LastName'];?></td>
                    <td class="hidden-phone"><?=$rows['Username'];?></td>
                    <td class="hidden-phone"><?=$rows['Email'];?></td>
                    <td class="hidden-phone"><?=$rows['Description'];?></td>
                    <td><a href='../comments/delete.php?id=<?= $rows['Id'];?>&page=comment.php'>
                      <button class="btn btn-danger btn-xs"><i class="icon-trash"></i></button>
                      </a></td>
                  </tr>
                </div>
              </div>
              </tbody>
              
              <?php
              ++$i;
              }
              mysqli_close( $conn );
              ?>
            </table>
          </form>
        </section>
      </div>
    </div>
  </section>
  </div>
  </div>
  <!-- page end--> 
  
</section>
</section>
<!--main content end-->
</section>

<!-- js placed at the end of the document so the pages load faster --> 
<script src="../template/js/jquery.js"></script> 
<script src="../template/js/bootstrap.min.js"></script> 
<script src="../template/js/jquery.scrollTo.min.js"></script> 
<script src="../template/js/jquery.nicescroll.js" type="text/javascript"></script> 
<script type="text/javascript" src="../template/assets/data-tables/jquery.dataTables.js"></script> 
<script type="text/javascript" src="../template/assets/data-tables/DT_bootstrap.js"></script> 

<!--common script for all pages--> 
<script src="../template/js/common-scripts.js"></script> 

<!--script for this page only--> 
<script src="../template/js/dynamic-table.js"></script>
</body>
</html>
