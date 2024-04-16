<?php
include( "../../functions/function.php" );
include( "../../functions/connect.php" );

$pmenu = $cmenu = null;
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
<title>پروژه‌ها</title>

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
@includepage( "../inc_template/header" );
@includepage( "../inc_template/menuprojects" );
?>
<section id="main-content">
  <section class="wrapper"> 
    <!-- page start-->
    <div class="row">
      <div class="col-lg-12">
        <section class="panel">
          <header class="panel-heading">ثبت پروژه</header>
          <div class="panel-body">
            <form class="form-horizontal" role="form" method = "post" action="insertinfocustomer.php?page=infocustomers.php"  enctype="multipart/form-data">
			  <div class="form-group" style="margin-top:50px;">
				<label class="col-lg-2 control-label" style="width: 8%; margin-right: 60px; margin-top: -5px; margin-left: -50px;"><span style=" color: red; font-size: 15px;">*</span>نام</label>
				<div class="col-lg-10">
					<div class="row">
						<div class="col-lg-2">
								<input type="text" name="FName" id="FName" class="form-control" required title="پر کردن این فیلد الزامی است. ">
						</div>
						<label class="col-lg-2 control-label" style="width: 8.5%; margin-right: 60px; margin-top: -5px; margin-left: -18px;" ><span style=" color: red; font-size: 15px;">*</span>نام خانوادگی 
						</label>
						<div class="col-lg-2">
								<input type="text" name="LName" id="LName" class="form-control" style="margin-right: 23px;" required title="پر کردن این فیلد الزامی است. ">
						</div>
						<label class="col-lg-2 control-label" style="width: 15%;  margin-top: -5px; margin-right: 80px; width: 100px; height: 20px;"><span style=" color: red; font-size: 15px;">*</span>تلفن همراه</label>
						<div class="col-lg-2">
								<input type="tel" id="PhoneId" name="Phone" placeholder="09*********" pattern="[0][9][0-9]{9}" required title="شماره همراه را مطابق الگو وارد کنید." class="form-control">
						</div>
						<div class="form-group" style="margin-top:50px; margin-right: -60px;">
						<label class="col-lg-2 control-label" style="width: 5%;"><span style=" color: red; font-size: 15px;">*</span>آدرس</label>
							<div class="col-lg-10">
								<div class="row">
									<div class="col-lg-2">
									<textarea name="َAddress" id="َAddressid" class="form-control" cols="10" rows="5" style= "width: 907px; height: 81px; margin-right: 5px;"required title="پر کردن این فیلد الزامی است. "></textarea>
						
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
                            <label class="col-lg-2 control-label" style="width: 10%; margin-right: -40px;">تصاویر  پروژه</label>
                            <input type="file" class="file-pos" name="Picture[]" id="file-input" style="margin-right: -90px;" multiple>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label" style="width: 10%; margin-right: -40px;">فایل پروژه</label>
                            <input type="file" class="file-pos" name="FileProject" id="file-input" style="margin-right: -90px;">
                        </div>
					</div>
				</div>
			</div>
                
              <div class="panel-body">
          <div class="form-group" style="text-align: left; padding-left: 60px;">
            <button name = "submit" type="submit" class="btn btn-success" style="margin-left: 10px;">ثبت</button>
          </div>
        </div>
          </form>
        </section>
      
        <section class="panel" style="padding-bottom: 30px" >
           
          <header class="panel-heading"> لیست پروژه‌ها </header>
          <form class="form-horizontal" role="form" method="post" action="infocustomers.php" enctype="multipart/form-data">
          <table class="table sliders">
            <tbody style="display: flex; flex-direction: row;">
                <tr>
                  <td><div class="form-group" >
                    <label class="col-lg-2 control-label" style="width: 15%;  margin-top: -5px; margin-right: 100px; width: 80px; height: 20px;">نام</label></td>
                  <td><div class="col-lg-10">
                      <div class="row">
                        <div class="col-lg-2" style="width: 220px; height: 80px;">
                          <input type="text" name="FName" id="FNameId" class="form-control">
                        </div>
                      </div>
                    </div></td>
                </tr>
                  <tr>
                  <td><div class="form-group" >
                    <label class="col-lg-2 control-label" style="width: 15%;  margin-top: -5px; margin-right: 100px; width: 100px; height: 20px;">نام خانوادگی</label></td>
                  <td><div class="col-lg-10">
                      <div class="row">
                        <div class="col-lg-2" style="width: 220px; height: 80px;">
                          <input type="text" name="LName" id="LNameId" class="form-control">
                        </div>
                      </div>
                    </div></td>
                </tr>
            </tbody>
            </table>
            <div class="form-group">
              <div style="margin-top: -125px; margin-right:80%;display: flex;">
                <button type="submit" name="search_btn" class="btn btn-success" style="margin-left: 10px;">جست‌وجو</button>
                <button type="submit" name="clear_btn" class="btn btn-success" style="margin-left: -40px;">بازگشت</button>
              </div>
            </div>
                       
          </form>
          <table class="table table-striped border-top" id="sample_1 " style="text-align: center; margin-top: -30px;">

              <tr style="text-align: center;">
                <th style="width: 8px;"> </th>
                <th style="text-align: center;">ردیف</th>
                <th class="hidden-phone" style="text-align: center;">نام </th>
                <th class="hidden-phone" style="text-align: center;">نام خانوادگی</th>
                <th class="hidden-phone" style="text-align: center;">تلفن همراه</th>
                <th class="hidden-phone" style="text-align: center;">آدرس</th>
                <th class="hidden-phone" style="text-align: center;">تاریخ</th>
                <th class="hidden-phone" style="text-align: center;">هزینه کل</th>
                  <th class="hidden-phone" style="text-align: center;">عملیات</th>
              </tr>
      
            <tbody>
              <?php
              if ( isset( $_POST[ 'search_btn' ] ) ) {
                    $FName = $_POST[ 'FName' ];
                    $LName = $_POST[ 'LName' ];

              } elseif ( isset( $_POST[ 'clear_btn' ] ) ) {
                
                    $FName = null;
                    $LName = null;
                   
              }
              else {
                     $FName = null;
                    $LName = null;
              }
              if ( $FName != null or $LName != null ) {
            
                  $sql = "SELECT Id, FirstName,LastName,Phone,Address,CreateDate,Price FROM projects
                WHERE (FirstName LIKE '%$FName%' AND LastName LIKE '') 
                      OR (FirstName LIKE '' AND LastName LIKE '%$LName%') 
                      OR (FirstName='$FName' AND LastName='$LName')";
                  
                  
                
                } 
                else {
                $sql = "SELECT Id, FirstName,LastName,Phone,Address,CreateDate,Price FROM projects";
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
                <td class="hidden-phone"><?=$rows['Phone'];?></td>
                <td class="hidden-phone"><?=$rows['Address'];?></td>
                <td class="hidden-phone"><?=$rows['CreateDate'];?></td>
                <td class="hidden-phone"><?=$rows['Price'];?></td>
                <td >
                  <a href='editinfocustomers.php?id=<?= $rows['Id'];?>&page=infocustomers.php'>
                  <button class="btn btn-primary btn-xs"><i class="icon-pencil"></i></button>
                  </a> 
                  <a href='deleteinfocustomers.php?id=<?= $rows['Id'];?>&page=infocustomers.php'>
                  <button class="btn btn-danger btn-xs"><i class="icon-trash"></i></button>
                  </a>
                  <a href='projects.php?id=<?= $rows['Id'];?>'>
                  <button class="btn btn-products btn-xs" style="background-color:#9870df; border-color:#9870df;"><i class="icon-th-large" style="color:#ffff;"></i></button>
                  </a>
                   
                  </td>
              </tr>
            </tbody>
            <?php
            ++$i;
            }
            mysqli_close( $conn );
            ?>
          </table>
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
