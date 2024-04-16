<?php
include( "../../../functions/function.php" );
include( "../../../functions/connect.php" );
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="Mosaddek">
<meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
<link rel="shortcut icon" href="../../template/img/favicon.html">
<title>ویژگی</title>

<!-- Bootstrap core CSS -->
<link href="../../template/css/bootstrap.min.css" rel="stylesheet">
<link href="../../template/css/bootstrap-reset.css" rel="stylesheet">
<!--external css-->
<link href="../../template/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
<!-- Custom styles for this template -->
<link href="../../template/css/style.css" rel="stylesheet">
<link href="../../template/css/style-responsive.css" rel="stylesheet" />

<!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries --> <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<?php
@includepage( "../../inc_template/header" );
@includepage( "../../inc_template/menufeatures" );
?> 

    
<section id="main-content">
            <section class="wrapper">
                <!-- page start-->
                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel">
                            
                            <header class="panel-heading">
                               ویژگی‌ها
                            </header>
                            <div class="panel-body">
                                    <form class="form-horizontal" role="form" method = "post" action="insert.php?page=Features.php"  enctype="multipart/form-data">
                                            <div class="form-group" style="margin-top:50px;">
              									<div class="col-lg-10">
                									<div class="row">
														<label class="col-lg-2 control-label" style="width: 13%; margin-right: 60px; margin-top: -5px; margin-left: -18px;"><span style=" color: red; font-size: 15px;">*</span>نوع محصول</label>
													   <select name="KindId" id="KindId" class="form-control bound-s" style="margin-right: 30px; width: 15%; height: 35px;" required title="انتخاب مقداری از این فیلد الزامی است.">
                                                       <option value="">بدون انتخاب</option>

                                                    	<?php
															$sql = "SELECT * FROM `kind`";
	                                                    	$all_Item = mysqli_query($conn,$sql);
															while ( $Gruop = mysqli_fetch_array(
                                                          	$all_Item, MYSQLI_ASSOC ) ): ;
                                                      	?>
                                                      		<option 
                                                              value="<?php echo $Gruop["Id"];?>"> 
                                                                     <?php echo $Gruop["Name"];?> 
                                                      		</option>
                                                      	<?php
															endwhile;
                                                             
                                                      	?>
                                                   	
                                            			</select>
														
														<label class="col-lg-2 control-label" style="width: 13%; margin-right: 60px; margin-top: -5px; margin-left: -18px;"><span style=" color: red; font-size: 15px;">*</span>ویژگی</label>
													   <select name="detailId" id="detailId" class="form-control bound-s" style="margin-right: 30px; width: 15%; height: 35px;" required title="انتخاب مقداری از این فیلد الزامی است.">
                                                        <option value="">بدون انتخاب</option>

                                                    	<?php
															$sql = "SELECT typedetails.Id as Id , CONCAT( details.Title, ' ', typedetails.Title ) as Title  FROM `typedetails`
                                                                    JOIN details ON details.Id = typedetails.IdDetails";
	                                                    	$all_Item = mysqli_query($conn,$sql);
															while ( $Gruop = mysqli_fetch_array(
                                                          	$all_Item, MYSQLI_ASSOC ) ): ;
                                                      	?>
                                                      		<option 
                                                              value="<?php echo $Gruop["Id"];?>"> 
                                                                     <?php echo $Gruop["Title"];?> 
                                                      		</option>
                                                      	<?php
															endwhile;
                                                             
                                                      	?>
                                                   	
                                            			</select>
														
                                                        <div class="form-group">
                                                          <label class="col-lg-2 control-label" style="width: 5%; margin-right: 75px;">توضیحات</label>
                                                          <div class="col-lg-10">
                                                          <textarea name="Discription" id="Discriptionid" class="form-control" cols="10" rows="5" style= "width: 967px; height: 108px; margin-right: 50px;"></textarea>
                									</div>
              									</div>
                									</div>
              									</div>
            								</div>
										
											
										
                                            <div class="panel-body">  
                                        		<div class="form-group" style="text-align: left; padding-left: 60px;">
                                            		<button name = "submit" type="submit" class="btn btn-success">ثبت</button>
                                       			</div>
                                            </div>
                            </div>
                    </div>
                                    
                                    </form>
                                    
                            </div>
                        </section>
                    
                                <section class="panel" style="padding-bottom: 30px">
                            <header class="panel-heading">
                            لیست ویژگی‌ها
                            </header>
                            <form class="form-horizontal" role="form" method="post" action="Features.php" enctype="multipart/form-data">
                                

                                 <table class="table sliders">
                                    <tbody style="display: flex; flex-direction: row;">
                                      <tr>
										<td><div style="margin-right: 50px;margin-top:10px">نوع محصول</div></td>

								        <td><select name="KindId_search" id="KindId_search" class="form-control bound-s" style="margin-right: 30px; width: 200px; height: 40px;">
                                            <option value="">بدون انتخاب</option>

												<?php
													$sql = "SELECT * FROM `kind`";
	                                                $all_Item = mysqli_query($conn,$sql);
													while ( $Gruop = mysqli_fetch_array(
                                                    $all_Item, MYSQLI_ASSOC ) ): ;
                                                    ?>
                                                      <option 
                                                        value="<?php echo $Gruop["Id"];?>"> 
                                                        <?php echo $Gruop["Name"];?> 
                                                      </option>
                                                      	<?php
															endwhile;
                                                      	?>
                                                   	
                                            </select></td>
                                        </tr>
                                        <td><div style="margin-right: 80px;margin-top:10px">ویژگی</div></td>

											  <td><select name="detailId_search" id="detailId_search" class="form-control bound-s" style="margin-right: 30px; width: 200px; height: 40px;">
                                               <option value="">بدون انتخاب</option>

												<?php
													$sql = "SELECT typedetails.Id as Id , CONCAT( details.Title, ' ', typedetails.Title ) as Title  FROM `typedetails`
                                                            JOIN details ON details.Id = typedetails.IdDetails";
													$all_Item = mysqli_query($conn,$sql);
													while ( $Gruop = mysqli_fetch_array(
													$all_Item, MYSQLI_ASSOC ) ): ;
												?>
													<option 
													  value="<?php echo $Gruop["Id"];?>"> 
															 <?php echo $Gruop["Title"];?> 
													</option>
												<?php
													endwhile;
												?>
											</select></td>
                                         </tr>
                                     </tbody>
                                     </table>
                				        <div class="form-group">
                                          <div style="margin-top: -95px; margin-right:80%;display: flex;">
                                            <button type="submit" name="search_btn" class="btn btn-success" style="margin-left: 10px;">جست‌وجو</button>
                                            <button type="submit" name="clear_btn" class="btn btn-success" style="margin-left: -40px;">حذف فیلتر</button>
                                          </div>
                                        </div>
                                      </form>

                                               
                            <table class="table table-striped border-top" id="sample_1 " style="text-align: center; margin-top: -30px;">
                                
                                <thead>
                                    <tr style="text-align: center;">
                                        <th style="width: 8px;">
                                            </th>
                                        <th style="text-align: center;">ردیف</th>
                                        <th class="hidden-phone" style="text-align: center;">نوع محصول</th>
										<th class="hidden-phone" style="text-align: center;">ویژگی</th>
										<th class="hidden-phone" style="text-align: center;">توضیحات</th>
                                        <th class="hidden-phone" style="text-align: center;">عملیات</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        if (isset($_POST['search_btn']))
                                        {
                                            $KindId_search = $_POST['KindId_search'];
											$detailId_search = $_POST['detailId_search'];
                                        }
                                       
                                       elseif(isset($_POST['clear_btn']))
									   {
                                            $KindId_search = null;
										    $detailId_search = null;
                                       }
                                       else{
                                            $KindId_search = null;
										    $detailId_search = null;
                                       }
									
                                       if($KindId_search != null )
                                       {
											$sql = "SELECT features.Id AS Id, kind.Name AS ProductKind, CONCAT(details.Title ,' ', typedetails.Title) typedetails_Title , features.Discription AS Discription 
                                                    FROM features
                                                    JOIN kind ON features.KindId = kind.Id
                                                    JOIN typedetails ON features.TypeDetailsId = typedetails.Id
                                                    JOIN details ON typedetails.IdDetails = details.Id
											        WHERE KindId = $KindId_search";
										   
                                       }
									   elseif($detailId_search != null)
                                       {
											$sql = "SELECT features.Id AS Id, kind.Name AS ProductKind, CONCAT(details.Title ,' ', typedetails.Title) typedetails_Title , features.Discription AS Discription 
                                                    FROM features
                                                    JOIN kind ON features.KindId = kind.Id
                                                    JOIN typedetails ON features.TypeDetailsId = typedetails.Id
                                                    JOIN details ON typedetails.IdDetails = details.Id
											        WHERE TypeDetailsId = $detailId_search";
										   
                                       }
									   elseif($KindId_search != null &&  $detailId_search != null)
                                       {
											$sql = "SELECT features.Id AS Id, kind.Name AS ProductKind, CONCAT(details.Title ,' ', typedetails.Title) typedetails_Title , features.Discription AS Discription 
                                                    FROM features
                                                    JOIN kind ON features.KindId = kind.Id
                                                    JOIN typedetails ON features.TypeDetailsId = typedetails.Id
                                                    JOIN details ON typedetails.IdDetails = details.Id
											        WHERE KindId = $KindId_search and TypeDetailsId = $detailId_search";
										   
                                       }
                                       else
                                       {
											$sql = "SELECT features.Id AS Id, kind.Name AS ProductKind, CONCAT(details.Title ,' ', typedetails.Title) typedetails_Title , features.Discription AS Discription 
                                                    FROM features
                                                    JOIN kind ON features.KindId = kind.Id
                                                    JOIN typedetails ON features.TypeDetailsId = typedetails.Id
                                                    JOIN details ON typedetails.IdDetails = details.Id";
                                       }
                                        $result = mysqli_query( $conn, $sql );
                                              $i = 1;
                                              while ( $rows = $result->fetch_assoc() ) {
                                    ?>
                                      <tr class="odd gradeX">
                                        <td></td>
                                        <td><?=$i;?></td>
                                        <td class="hidden-phone"><?=$rows['ProductKind'];?></td>
										<td class="hidden-phone"><?=$rows['typedetails_Title'];?></td>
										<td class="hidden-phone"><?=$rows['Discription'];?></td>
                                        <td >
                                            <a href='edit.php?id=<?= md5($rows['Id']);?>&page=Features.php'>
                                          		<button class="btn btn-primary btn-xs"><i class="icon-pencil"></i></button>
                                            </a>
                                            
                                            <a href='delete.php?id=<?= $rows['Id'];?>&page=Features.php'>
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
