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
<title>نظرات</title>

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
@includepage( "../inc_template/menucomments" );
?> 

    
<section id="main-content">
            <section class="wrapper">
                <!-- page start-->
                <div class="row">
                    <div class="col-lg-12">
                                <section class="panel">
                            <header class="panel-heading">
                                لیست نظرات کاربران سایت
                            </header>
						<form class="form-horizontal" role="form" method="post" action="coment.php" enctype="multipart/form-data">
							<div class="form-group" style="margin-top:50px;">
                    			<label class="col-lg-2 control-label" style="width: 8%; margin-right: 84px; margin-top: -5px; margin-left: -49px;">نام</label>
              					<div class="col-lg-10">
                					<div class="row">
                  						<div class="col-lg-2">
                    							<input type="text" name="Name_Search" id="Name_Search" class="form-control">
                  						</div>
										<label class="col-lg-2 control-label" style="width: 8%; margin-right: 60px; margin-top: -5px; margin-left: -18px;">نام خانوادگی</label>
										<div class="col-lg-2">
                    							<input type="text" name="LastName_Search" id="LastName_Search" class="form-control">
                  						</div>
										<label class="col-lg-2 control-label" style="width: 8%; margin-right: 60px; margin-top: -5px; margin-left: -18px;">متن نظر</label>
										<div class="col-lg-2">
                    							<input type="text" name="text_Search" id="text_Search" class="form-control">
                  						</div>
                					</div>
									<div class="row" style="text-align: left; padding-left: 25px;">
				  						<button type="submit" name="search_btn" class="btn btn-success">جست‌وجو</button>
                    					<button type="submit" name="clear_btn" class="btn btn-success">حذف فیلتر</button>
									</div>
              					</div>
            				</div>
                                          
                                      </form>
                            <table class="table table-striped border-top" id="sample_1 " style="text-align: center; margin-top: 105px;">
                                
                                <thead>
                                    <tr style="text-align: center;">
                                        <th style="width: 8px;">
                                            </th>
                                        <th style="text-align: center;">ردیف</th>
                                        <th class="hidden-phone" style="text-align: center;"> نام و نام‌خانوادگی</th>
										<th class="hidden-phone" style="text-align: center;">نظر</th>
										<th class="hidden-phone" style="text-align: center;">تاریخ</th>
										<th class="hidden-phone" style="text-align: center;">راه ارتباطی</th>
                                        <th class="hidden-phone" style="text-align: center;">عملیات</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        if (isset($_POST['search_btn']))
                                        {
                                            $Name_Search = $_POST['Name_Search'];
											$LastName_Search = $_POST['LastName_Search'];
											$text_Search = $_POST['text_Search'];
											
                                        }
                                       
                                       elseif(isset($_POST['clear_btn']))
									   {
                                            $Name_Search = null;
										    $LastName_Search = null;
										    $text_Search = null;
                                       }
                                       else{
                                            $Name_Search = null;
										    $LastName_Search = null;
										    $text_Search = null;
                                       }
									
                                       if($Name_Search != null )
                                       {
											$sql = "SELECT comments.Id as Id,
													CONCAT( Firstname, ' ', Lastname ) AS fullname, comments.Description as Description, comments.Date as Date,
													CONCAT( users.Email , ' _ ' , users.Phone ) as Contact 
													FROM comments
													JOIN users on users.Id = comments.User_Id
													WHERE FirstName LIKE '%$Name_Search%'";
                                       }
									   elseif($LastName_Search != null)
                                       {
											$sql = "SELECT comments.Id as Id,
													CONCAT( Firstname, ' ', Lastname ) AS fullname, comments.Description as Description, comments.Date as Date,
													CONCAT( users.Email , ' _ ' , users.Phone ) as Contact 
													FROM comments
													JOIN users on users.Id = comments.User_Id
													WHERE Lastname LIKE '%$LastName_Search%'";
                                       }
									   elseif($text_Search != null)
                                       {
											$sql = "SELECT comments.Id as Id,
													CONCAT( Firstname, ' ', Lastname ) AS fullname, comments.Description as Description, comments.Date as Date,
													CONCAT( users.Email , ' _ ' , users.Phone ) as Contact 
													FROM comments
													JOIN users on users.Id = comments.User_Id
													WHERE Description LIKE '%$text_Search%'";
                                       }
									   elseif($Name_Search != null &&  $LastName_Search != null)
                                       {
											$sql = "SELECT comments.Id as Id,
													CONCAT( Firstname, ' ', Lastname ) AS fullname, comments.Description as Description, comments.Date as Date,
													CONCAT( users.Email , ' _ ' , users.Phone ) as Contact 
													FROM comments
													JOIN users on users.Id = comments.User_Id
													WHERE FirstName LIKE '%$Name_Search%' AND Lastname LIKE '%$LastName_Search%'";
                                       }
									   elseif($Name_Search != null && $text_Search != null)
									   {
											$sql = "SELECT comments.Id as Id,
													CONCAT( Firstname, ' ', Lastname ) AS fullname, comments.Description as Description, comments.Date as Date,
													CONCAT( users.Email , ' _ ' , users.Phone ) as Contact 
													FROM comments
													JOIN users on users.Id = comments.User_Id
													WHERE FirstName LIKE '%$Name_Search%' 
													AND Description LIKE '%$text_Search%'";
                                       }
										elseif($text_Search != null && $LastName_Search != null)
									   {
											$sql = "SELECT comments.Id as Id,
													CONCAT( Firstname, ' ', Lastname ) AS fullname, comments.Description as Description, comments.Date as Date,
													CONCAT( users.Email , ' _ ' , users.Phone ) as Contact 
													FROM comments
													JOIN users on users.Id = comments.User_Id
													WHERE Lastname LIKE '%$LastName_Search%' 
													AND Description LIKE '%$text_Search%'";
                                       }
									   elseif($Name_Search != null &&  $LastName_Search != null && $text_Search != null)
                                       {
											$sql = "SELECT comments.Id as Id,
													CONCAT( Firstname, ' ', Lastname ) AS fullname, comments.Description as Description, comments.Date as Date,
													CONCAT( users.Email , ' _ ' , users.Phone ) as Contact 
													FROM comments
													JOIN users on users.Id = comments.User_Id
													WHERE FirstName LIKE '%$Name_Search%' AND Lastname LIKE '%$LastName_Search%' 
													AND Description LIKE '%$text_Search%'";
                                       }
                                       else
                                       {
										$sql = "
												SELECT comments.Id as Id,
												CONCAT( Firstname, ' ', Lastname ) AS fullname, comments.Description as Description, comments.Date as Date, CONCAT( users.Email , ' _ ' , users.Phone ) as Contact 
												FROM comments
												JOIN users on users.Id = comments.User_Id";
									   }
									    $result = mysqli_query( $conn, $sql );
                                        
                                              $i = 1;
                                              while ( $rows = $result->fetch_assoc() ) {
												  
                                    ?>
                                      <tr class="odd gradeX">
                                        <td></td>
                                        <td><?=$i;?></td>
                                        <td class="hidden-phone"><?=$rows['fullname'];?></td>
										<td class="hidden-phone"><?=$rows['Description'];?></td>
										<td class="hidden-phone"><?=$rows['Date'];?></td>
										<td class="hidden-phone"><?=$rows['Contact'];?></td>
                                        <td >
                                            <a href='delete.php?id=<?= $rows['Id'];?>&page=coment.php'>
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
