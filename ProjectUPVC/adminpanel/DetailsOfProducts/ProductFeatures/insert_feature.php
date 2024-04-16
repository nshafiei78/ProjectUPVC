<?php
include( "../../../functions/function.php" );
include( "../../../functions/connect.php" );
     //$KindId = $_GET['kind_id'];
     //$Page = $_GET['page'];
	 $Page_insert_feature = 'insert_feature.php';
	$have_message = null;
	if(isset($_GET['message']))
	{
		$message = null;
		$message = $_GET['message'];
		$have_message = 1;
	}
	
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
<title>ویژگی محصولات</title>

<!-- Bootstrap core CSS -->
<link href="../../template/css/bootstrap.min.css" rel="stylesheet">
<link href="../../template/css/bootstrap-reset.css" rel="stylesheet">
<!--external css-->
<link href="../../template/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
<!-- Custom styles for this template -->
<link href="../../template/css/style.css" rel="stylesheet">
<link href="../../template/css/style-responsive.css" rel="stylesheet" />

<!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries --> 
<!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<?php
@includepage( "../../inc_template/header" );
@includepage( "../../inc_template/menuproductfeatures" );
?>
    <?php
    if(isset($_GET['id'])){
		echo($_GET['id'] );
        $Id = $_GET['id'];
        $sql = "SELECT * FROM product WHERE `Id`=$Id";
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
                               انواع ویژگی‌ها
                            </header>
                            <div class="panel-body">
                                    <form class="form-horizontal" role="form" method="post" action="insert.php?id=<?php echo $Id; ?>&page=<?php echo $Page_insert_feature; ?>" enctype="multipart/form-data">
											<div class="form-group" style="margin-top:50px;">
              									<div class="col-lg-10">
                									<div class="row">
                  										
														<label class="col-lg-2 control-label" style="width: 8%; margin-right: 60px; margin-top: -5px; margin-left: -18px;"><span style=" color: red; font-size: 15px;">*</span>ویژگی‌ها</label>
														
														<select name = 'insert_feature[]' id="insert_feature" multiple size = 5 class="form-control bound-s" style="margin-right: 30px; width: 20%; height: 120px;" required title="انتخاب مقداری از این فیلد الزامی است.">   
														 <option value="">بدون انتخاب</option>
															<?php
																$where = $rows["KindId"];
																$query=mysqli_query($conn,"SELECT * FROM v_features WHERE KindId = $where");
																$cnt=1;
																while($row=mysqli_fetch_array($query))
																{
																?>
																	<option 
																			value="<?php echo $row["Id"];?>"> 
																		 <?php echo $row["typedetails_Title"];?> 
																	</option>
																<?php	
																}
															?> 
													   </select> 
														<?php
														if($have_message == 1)
														{
														?>
															<p> 
															   <font face='yekan, yekan,"Times New Roman"' size='+1' color='#ff0000' style="margin-right: 80px;"> ویژگی <?php echo $message;?>  تکراری است!</font> 
															</p>
														<?php
														}
														?>
                									</div>
              									</div>
            								</div>
                                            
                                            <div class="panel-body">  
                                        		<div class="form-group" style="text-align: left; padding-left: 25px;">
                                               		<button name = "submit" type="submit" class="btn btn-success">ثبت</button>
													<a href='ProductFeatures.php'>
                                                		<button name = "submit_back" type="button" class="btn btn-success">بازگشت</button>
                                            		</a>
                                        		</div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    </form>
                                <?php
			
                                }
    }
								$query1=mysqli_query($conn,"SELECT * FROM v_product WHERE Id = $Id");
									
									while($row1=mysqli_fetch_array($query1))
									{
										$name_p = $row1["kind_Name"];
												$type_p = $row1["Type"];
									}
                                ?>
                                </table>        
                            </div>
                        </section>
                    
                                <section class="panel">
                            <header class="panel-heading">
                                لیست انواع ویژگی‌ها
                            </header>     
									<div class="form-group" style="margin-top:50px;">
              							<div class="col-lg-10">
											<div class="row">
												<label class="col-lg-2 control-label" style="width: 8%; margin-right: 60px; margin-top: -5px; margin-left: -18px;">محصول: </label>
												<label class="col-lg-2 control-label" style="width: 8%; margin-right: 60px; margin-top: -5px; margin-left: -18px;"><?php echo $name_p?></label>
												<label class="col-lg-2 control-label" style="width: 8%; margin-right: 60px; margin-top: -5px; margin-left: -18px;"><?php echo $type_p?></label>
											</div>
										</div>
									</div>
									
                            <table class="table table-striped border-top" id="sample_1 " style="text-align: center; margin-top: 130px;">
                                
                                <thead>
                                    <tr style="text-align: center;">
                                        <th style="width: 8px;">
                                            </th>
                                        <th style="text-align: center;">ردیف</th>
										<th class="hidden-phone" style="text-align: center;">ویژگی</th>
                                        <th class="hidden-phone" style="text-align: center;">عملیات</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        
										$sql_product = "SELECT v_features.typedetails_Title as typedetails_Title, product_f.Id as Id  FROM product_f
												  JOIN v_features on product_f.FeaturesId = v_features.Id
												  WHERE ProductsId = $Id";
									    $result = mysqli_query( $conn, $sql_product );
                                        
                                              $i = 1;
                                              while ( $rows = $result->fetch_assoc() ) {
												  //$product_Id = $rows['Id'];
												
                                    ?>
                                      <tr class="odd gradeX">
                                        <td></td>
                                        <td><?=$i;?></td>
                                        <td class="hidden-phone"><?=$rows['typedetails_Title'];?></td>
                                        <td >
                                            <a href='delete.php?id=<?= $rows['Id'];?>&page=insert_feature.php'>
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
<script src="../../template/js/jquery.js"></script> 
<script src="../../template/js/bootstrap.min.js"></script> 
<script src="../../template/js/jquery.scrollTo.min.js"></script> 
<script src="../../template/js/jquery.nicescroll.js" type="text/javascript"></script> 
<script type="text/javascript" src="../../template/assets/data-tables/jquery.dataTables.js"></script> 
<script type="text/javascript" src="../../template/assets/data-tables/DT_bootstrap.js"></script> 

<!--common script for all pages--> 
<script src="../../template/js/common-scripts.js"></script> 

<!--script for this page only--> 
<script src="../../template/js/dynamic-table.js"></script>
</body>
</html>
