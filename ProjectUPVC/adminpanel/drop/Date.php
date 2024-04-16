  <?php

include( "../functions/function.php" );
include( "../functions/connect.php" );
/*session_start();
if (!isset($_SESSION['userlogin']) || $_SESSION['userlogin'] !== true) {
    header("Location: login.php");
    exit;
}*/
/*session_start();
if(isset($_SESSION['userlogin'])){
	if(!$_SESSION['userlogin']==true){
		
         header("location:login.php");
        exit();
	}
}
else{
	
     header("location:login.php");
        exit();
}*/
?>
<!DOCTYPE html>
<html lang="en">
	
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="Mosaddek">
<meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
<link rel="shortcut icon" href="template/img/favicon.html">
<title>داشبورد</title>

<!-- Bootstrap core CSS -->
<link href="template/css/bootstrap.min.css" rel="stylesheet">
<link href="template/css/bootstrap-reset.css" rel="stylesheet">
	<!--
 <link href="template/Date/css/bootstrap.min.css" rel="stylesheet" /> -->
<link rel="stylesheet" href="template/Date/css/bootstrap-theme.min.css" />
<link rel="stylesheet" href="template/Date/css/jquery.Bootstrap-PersianDateTimePicker.css" />
	
<!-- <script src="template/Date/js/jquery-3.1.0.min.js" type="text/javascript"></script>-->
<script src="template/Date/js/bootstrap.min.js" type="text/javascript"></script>
<script src="template/Date/js/jalaali.js"></script>
	
<!--external css-->
<link href="template/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
<!-- Custom styles for this template -->
<link href="template/css/Mystyle.css" rel="stylesheet">
<link href="template/css/style.css" rel="stylesheet">
<link href="template/css/style-responsive.css" rel="stylesheet" />
	
	

<!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries --> 
<!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

	
	
<body>
    <?php
  //header start
  @includepage( "./inc_template/header" );
  //header end

  //sidbar start
  @includepage( "./inc_template/menu" );
  //sidbar end

?>

<section id="main-content">
            <section class="wrapper">
                <!-- page start-->
                <div class="row">
                    <div class="col-lg-12">
                                <section class="panel">
                                    <section class="panel" style="padding-bottom: 30px" >
                            <header class="panel-heading">
                                پیام‌های  ادمین
                         		<div style="padding-right: 1200px;">
								
								</div>
                            </header>
                            <form class="form-horizontal" role="form" method="post" action="index.php" enctype="multipart/form-data">
					
								
							<div style="margin-top: 50px; clear: both;"></div>
<div  style="max-width: 300px; margin-right: 60px; ">
    <div class="form-group">
        <label class="sr-only" for="exampleInput3">تاریخ</label>
        <div class="input-group">
            <div class="input-group-addon" data-mddatetimepicker="true" data-trigger="click" data-targetselector="#exampleInput3">
                <span class="glyphicon glyphicon-calendar"></span>
            </div>
            <input type="text" class="form-control" id="exampleInput3" placeholder="تاریخ" data-mddatetimepicker="true" data-placement="right" data-englishnumber="true" />
        </div>
    </div>
    
</div>	
								
								
            <div class="form-group">
             <div style="margin-top: -100px; margin-right:85%;display: flex;">
                <button type="submit" name="search_btn" class="btn btn-success" style="margin-left: 10px;">جست‌وجو</button>
                <button type="submit" name="clear_btn" class="btn btn-success" style="margin-left: 600px;">حذف فیلتر</button>
              </div>
                
            </div>
      </form>
										<header class="Grid_Lable">لیست پیام‌ها</header>
                                 <table class="table table-striped border-top" id="sample_1" style="margin-top: 10px;">
                                
                                   
                                    <tr>
                                        <th style="width: 8px;"></th>
                                        <th style="text-align: center;">ردیف</th>
                                        <th class="hidden-phone" style="text-align: center;">کاربر</th>
                                        <th class="hidden-phone" style="text-align: center;">پیام</th>
                                        <th class="hidden-phone" style="text-align: center;">Email</th>
                                        <th class="hidden-phone" style="text-align: center;">تاریخ</th>
                                        <th class="hidden-phone" style="text-align: center;">پاسخ</th>
										
                                    </tr>
                               
                                <tbody>
                                    <?php
                                      if ( isset( $_POST[ 'search_btn' ] ) ) {
                                            $Condition = $_POST[ 'Condition' ];
                                            

                                      } elseif ( isset( $_POST[ 'clear_btn' ] ) ) {

                                            $Condition = null;
                                          
                                      }
                                      else {
                                            $Condition = null;
                                         
                                      }
                                      if ( $Condition != null) {

                                          $sql = "
                                        SELECT Id, CONCAT(FirstName,' ',LastName) as FullName, Message, Email,date
                                        FROM `contactsmessage`";

                                        } 
                                        else {
                                        $sql = "
                                        SELECT Id, CONCAT(FirstName,' ',LastName) as FullName, Message, Email,date
                                        FROM `contactsmessage`";
                                      }
                                      $result = mysqli_query( $conn, $sql );
                                      $i = 1;
                                      while ( $rows = $result->fetch_assoc() ) {
                                    ?>
                                    <tr class="odd gradeX">
                                        <td></td>
                                        <td><?=$i;?></td>
                                        <td class="hidden-phone"><?=$rows['FullName'];?></td>
                                        <td class="hidden-phone"><?=$rows['Message'];?></td>
                                        <td class="hidden-phone"><?=$rows['Email'];?></td>
                                        <td class="hidden-phone"><?=$rows['date'];?></td>
                                        <td ><span class="label label-info label-mini"><a href='ReplyMessage.php?Messageid=<?=$rows['Id'];?>' class="Request_Grid_bottum">پاسخ</span></td>
                                      </tr>
                                    </tbody>
                                    <?php
                                    ++$i;
                                    }
                                    mysqli_close( $conn );
                                    ?>
                                  </table>                     
                                        </div>
                                        
                                        </div>
                                        
                                      </section>

                    
                    </div> 
                
                </div>
                <!-- page end-->
            
            </section>
        </section>
        <!--main content end-->

                            <div class="panel-body"> </div>
                        </section>

<script type="text/javascript">
    $('#input1').change(function() {
        var $this = $(this),
                value = $this.val();
        alert(value);
    });
    $('#textbox1').change(function () {
        var $this = $(this),
                value = $this.val();
        alert(value);
    });
    $('[data-name="disable-button"]').click(function() {
        $('[data-mddatetimepicker="true"][data-targetselector="#input1"]').MdPersianDateTimePicker('disable', true);
    });
    $('[data-name="enable-button"]').click(function () {
        $('[data-mddatetimepicker="true"][data-targetselector="#input1"]').MdPersianDateTimePicker('disable', false);
    });
</script>

    <!-- js placed at the end of the document so the pages load faster --> 
<script src="template/js/jquery.js"></script> 
<script src="template/js/bootstrap.min.js"></script> 
<script src="template/js/jquery.scrollTo.min.js"></script> 
<script src="template/js/jquery.nicescroll.js" type="text/javascript"></script> 
<script type="text/javascript" src="template/assets/data-tables/jquery.dataTables.js"></script> 
<script type="text/javascript" src="template/assets/data-tables/DT_bootstrap.js"></script> 

<!--common script for all pages--> 
<script src="template/js/common-scripts.js"></script> 

<!--script for this page only--> 
<script src="template/js/dynamic-table.js"></script>

<script src="template/Date/js/jalaali.js" type="text/javascript"></script>
<script src="template/Date/js/jquery.Bootstrap-PersianDateTimePicker.js" type="text/javascript"></script>

</body>
</html>
