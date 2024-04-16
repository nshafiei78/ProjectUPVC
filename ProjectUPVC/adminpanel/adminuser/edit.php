<?php
include( "../../functions/function.php" );
include( "../../functions/connect.php" );
     //$KindId = $_GET['kind_id'];
     $Page = $_GET['page'];
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
<title> ویرایش کاربران ادمین</title>

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
@includepage( "../inc_template/menuadminusers" );
?>
    <?php
    if(isset($_GET['id'])){
        $Id = $_GET['id'];
        $sql = "SELECT * FROM admin_users WHERE IsArchive = 0 and Id=$Id";
        $result = mysqli_query( $conn, $sql );
        while($rows = $result->fetch_assoc()){
      
    ?>
<section id="main-content">
            <section class="wrapper">
                <!-- page start-->
                <div class="row">
                    <div class="col-lg-12">
                          <section class="panel">
                            <header class="panel-heading">
                               ویرایش
                            </header>
                            <div class="panel-body">
                                    <form class="form-horizontal" role="form" method="post" action="update.php?id=<?php echo $Id; ?>&page=<?php echo $Page; ?>" enctype="multipart/form-data">
                                            <div class="form-group" style="margin-top:50px;">
                    							<label class="col-lg-2 control-label" style="width: 8%; margin-right: 60px; margin-top: -5px; margin-left: -50px;">نام</label>
              									<div class="col-lg-10">
                									<div class="row">
                  						<div class="col-lg-2">
                    							<input type="text" name="edit_FirstName" id="edit_FirstName" class="form-control" value="<?php echo $rows['FirstName']; ?>">
                  						</div>
										<label class="col-lg-2 control-label" style="width: 8%; margin-right: 60px; margin-top: -5px; margin-left: -18px;">نام خانوادگی</label>
										<div class="col-lg-2">
                    							<input type="text" name="edit_LastName" id="edit_LastName" class="form-control" style="margin-right: 23px;"value="<?php echo $rows['LastName']; ?>">
                  						</div>
										<label class="col-lg-2 control-label" style="width: 8%; margin-right: 60px; margin-top: -5px; margin-left: -18px;">نام‌کاربری</label>
										<div class="col-lg-2">
                    							<input type="text" name="edit_UserName" id="edit_UserName" class="form-control" value="<?php echo $rows['UserName']; ?>">
                  						</div>
                					</div>
              									</div>
            								</div>
										  <div class="form-group" style="margin-top:50px;">
                    							<label class="col-lg-2 control-label" style="width: 6%; margin-right: 60px; margin-top: -5px; margin-left: -18px;">رمز عبور</label>
              									<div class="col-lg-10">
                									<div class="row">
														<div class="col-lg-2">
                    										<input type="password" name="edit_Password" id="edit_Password" class="form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" value="<?php echo $rows['Password']; ?>">
                  										</div>
														<label class="col-lg-2 control-label" style="width: 10%; margin-right: 57px; margin-top: -5px; margin-left: -18px;">تکرار رمز عبور </label>
														<div class="col-lg-2">
															<input type="password" name="password_repeat" id="password_repeat" class="form-control">
														</div>
													</div>
													</div>
											  </div>
                                            <div class="panel-body">  
                                        		<div class="form-group" style="text-align: left; padding-left: 60px;">
                                            		<button name = "submit" type="submit" class="btn btn-success">ثبت</button>
													<a href='AdminUser.php'>
                                                		<button name = "submit_back" type="button" class="btn btn-success">بازگشت</button>
                                            		</a>
                                       			</div>
                                            </div>
                            </div>
                    </div>
                                    <?php
                                }
    }
                                ?>
                                    </form>
                                    
                            </div>
                        </section>
                    
                                <section class="panel">
                            <header class="panel-heading">
                                لیست کاربران ادمین
                            </header>
                            <form class="form-horizontal" role="form" method="post" action="AdminUser.php" enctype="multipart/form-data">
							<div class="form-group" style="margin-top:50px;">
                    			<label class="col-lg-2 control-label" style="width: 8%; margin-right: 84px; margin-top: -5px; margin-left: -49px;">نام</label>
              					<div class="col-lg-10">
                					<div class="row">
                  						<div class="col-lg-2">
                    							<input type="text" name="Name_Search" id="Name_Search" class="form-control">
                  						</div>
										<label class="col-lg-2 control-label" style="width: 8%; margin-right: 60px; margin-top: -5px; margin-left: -18px;">نام خانوادگی</label>
										<div class="col-lg-2">
                    							<input type="text" name="LastName_Search" id="LastName_Search" class="form-control" style="margin-right: 23px;">
                  						</div>
										<label class="col-lg-2 control-label" style="width: 8%; margin-right: 60px; margin-top: -5px; margin-left: -18px;">نام‌کاربری</label>
										<div class="col-lg-2">
                    							<input type="text" name="Username_Search" id="Username_Search" class="form-control" >
                  						</div>
                					</div>
				  					<div class="row" style="text-align: left; padding-left: 25px;">
				  						<button type="submit" name="search_btn" class="btn btn-success">جست‌وجو</button>
                    					<button type="submit" name="clear_btn" class="btn btn-success">حذف فیلتر</button>
									</div>
              					</div>
            				</div>
                                      </form>

                            <table class="table table-striped border-top" id="sample_1 " style="text-align: center; margin-top: 130px;">
                                
                                <thead>
                                    <tr style="text-align: center;">
                                        <th style="width: 8px;">
                                            </th>
                                        <th style="text-align: center;">ردیف</th>
                                        <th class="hidden-phone" style="text-align: center;">نام</th>
										<th class="hidden-phone" style="text-align: center;">نام خانوادگی</th>
										<th class="hidden-phone" style="text-align: center;">نام کاربری</th>
                                        <th class="hidden-phone" style="text-align: center;">عملیات</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        if (isset($_POST['search_btn']))
                                        {
                                            $Name_Search = $_POST['Name_Search'];
											$LastName_Search = $_POST['LastName_Search'];
											$Username_Search = $_POST['Username_Search'];
                                        }
                                       
                                       elseif(isset($_POST['clear_btn']))
									   {
                                            $Name_Search = null;
										    $LastName_Search = null;
										    $Username_Search = null;
                                       }
                                       else{
                                            $Name_Search = null;
										    $LastName_Search = null;
										    $Username_Search = null;
                                       }
										$where_query = " ";
                                       if($Name_Search != null )
                                       {
											$where_query .= " and FirstName like '%$Name_Search%'";
										   
                                       }
									   if($LastName_Search != null)
                                       {
											$where_query .= " and LastName like '%$LastName_Search%'";
										   
                                       }
									   if($Username_Search != null)
                                       {
											$where_query .= " and UserName like '%$Username_Search%'";
										   
                                       }
									   
										$sql = "SELECT * FROM admin_users WHERE IsArchive = 0" . $where_query;
                                      
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
                                        <td >
                                            <a href='edit.php?id=<?= $rows['Id'];?>&page=AdminUser.php'>
                                          		<button class="btn btn-primary btn-xs"><i class="icon-pencil"></i></button>
                                            </a>
                                            
                                            <a href='delete.php?id=<?= $rows['Id'];?>&page=AdminUser.php'>
                                                <button class="btn btn-danger btn-xs"><i class="icon-trash"></i></button>
                                            </a>
                                        </td>
                                         
                                      </tr>
                                    </tbody>
                                    <?php
                                           ++$i;
                                    }
                                         mysqli_close($conn);
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
