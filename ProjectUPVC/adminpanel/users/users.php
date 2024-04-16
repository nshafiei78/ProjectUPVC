  <?php
include( "../../functions/function.php" );
include( "../../functions/connect.php" );
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
<title>کاربران سایت</title>

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
@includepage( "../inc_template/menuusers" );
?>

<section id="main-content">
            <section class="wrapper">
                <!-- page start-->
                <div class="row">
                    <div class="col-lg-12">
                                <section class="panel">
                                    <section class="panel" style="padding-bottom: 30px" >
                            <header class="panel-heading">
                              لیست کاربران سایت
                         
                            </header>
                          
                                <form class="form-horizontal" role="form" method="post" action="users.php" enctype="multipart/form-data">
                                    <div class="form-group" style="margin-top:30px;">
                              <label class="col-lg-2 control-label" style="width: 8%; margin-right: 47px; margin-top: -5px; margin-left: -49px;">نام</label>
                              <div class="col-lg-2">
                                <input type="text" name="Fname" id="FnameId" class="form-control">
                              </div>
                                    
                              <label class="col-lg-2 control-label" style="width: 8%; margin-right: 50px; margin-top: -5px; margin-left: -49px;">نام خانوادگی</label>
                              <div class="col-lg-2">
                                <input type="text" name="Lname" id="LnameId" class="form-control" style="margin-right: 50px;">
                              </div>
                              <label class="col-lg-2 control-label" style="width: 8%; margin-right: 120px; margin-top: -5px; margin-left: -18px;">نام کاربری</label>
                              <select name="Username" id="UsenameId" class="form-control bound-s" style="margin-right: 30px; width: 15%; height: 35px;">
                                  <option value="">بدون انتخاب</option>
                                <?php
                                $sql = "SELECT * FROM `users`";
                                $all_Item = mysqli_query( $conn, $sql );
                                while ( $users = mysqli_fetch_array(
                                    $all_Item, MYSQLI_ASSOC ) ): ;
                                ?>
                                <option 
                                    value="<?php echo $users["Id"];?>"> <?php echo $users["UserName"];?> </option>
                                <?php
                                endwhile;

                                ?>
                              </select>
                              </div>
                                     <div class="form-group">
                                      <div style="margin-top: -60px; margin-right:85%;display: flex;">
                                        <button type="submit" name="search_btn" class="btn btn-success" style="margin-left: 10px;">جست‌وجو</button>
                                        <button type="submit" name="clear_btn" class="btn btn-success" style="margin-left: -40px;">حذف فیلتر</button>
                                      </div>
                                    </div>
                                
                              </form>
                           
                                 <table class="table table-striped border-top" id="sample_1">
                                
                                   
                                    <tr>
                                        <th style="width: 8px;"></th>
                                        <th style="text-align: center;">ردیف</th>
                                        <th class="hidden-phone" style="text-align: center;">نام</th>
                                        <th class="hidden-phone" style="text-align: center;">نام خانوادگی</th>
                                        <th class="hidden-phone" style="text-align: center;">نام کاربری</th>
                                        <th class="hidden-phone" style="text-align: center;">تلفن</th>
                                        <th class="hidden-phone" style="text-align: center;">ایمیل</th>
                                    </tr>
                               
                                <tbody>
                                    <?php
                                      if ( isset( $_POST[ 'search_btn' ] ) ) {
                                            $Fname = $_POST[ 'Fname' ];
                                         
                                            $Lname = $_POST[ 'Lname' ];
                                            $Username = $_POST[ 'Username' ];
                                          
                                          

                                      } elseif ( isset( $_POST[ 'clear_btn' ] ) ) {

                                            $Fname = null;
                                            $Lname = null;
                                            $Username = null;
                                      }
                                      else {
                                            $Fname = null;
                                            $Lname = null;
                                            $Username = null;
                                      }
                                        $where_query = "where 1=1";
                                      if ( $Fname != null ){
                                          
                                          $where_query .=" and FirstName LIKE '%$Fname%'";
                                      } 
                                        if($Lname != null){
                                            
                                            $where_query .=" and LastName LIKE '%$Lname%'";
                                            
                                        } if($Username != null ) {
                                            
                                            $where_query .=" and UserName LIKE '%$Username%'";
                                         
                                        } 

                                        $sql = "SELECT Id,FirstName,LastName,UserName,Phone,Email FROM `users`" .$where_query ;
                                        
                                        $result = mysqli_query( $conn, $sql );
                                        $i = 1;
                                        while ( $rows = $result->fetch_assoc() ) {
                                        ?>
                                        <tr class="odd gradeX">
                                            <td></td>
                                            <td><?=$i;?></td>
                                            <td class="hidden-phone"><?=$rows['FirstName'];?></td>
                                            <td class="hidden-phone"><?=$rows['LastName'];?></td>
                                            <td class="hidden-phone"><?=$rows['UserName'];?></td>
                                            <td class="hidden-phone"><?=$rows['Phone'];?></td>
                                            <td class="hidden-phone"><?=$rows['Email'];?></td>
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
