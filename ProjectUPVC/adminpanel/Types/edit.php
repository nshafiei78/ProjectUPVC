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
<link rel="shortcut icon" href="../products/template/img/favicon.html">
<title>ویرایش نوع محصولات</title>

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
@includepage( "../inc_template/menutypeproducts" );
?>
    <?php
    if(isset($_GET['id'])){
        $Id = $_GET['id'];
        $sql = "SELECT * FROM `types` WHERE `Id`=$Id";
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
                               نوع محصولات
                            </header>
                            <div class="panel-body">
                                    <form class="form-horizontal" role="form" method="post" action="update.php?id=<?php echo $Id; ?>&page=<?php echo $Page; ?>" enctype="multipart/form-data">
											<div class="form-group" style="margin-top:50px;">
                    							
              									<div class="col-lg-10">
                									<div class="row">
                  										<label class="col-lg-2 control-label" style="width: 8.5%; margin-right: 60px; margin-top: -5px; margin-left: -18px;" ><span style=" color: red; font-size: 15px;">*</span>عنوان</label>
														<div class="col-lg-2">
													<input type="text" name="edit_title" id="edit_title" class="form-control" style="margin-right: 23px;" value="<?php echo $rows['Title']; ?>"  required title="پر کردن این فیلد الزامی است. ">
															</div>
														<label class="col-lg-2 control-label" style="width: 13%; margin-right: 60px; margin-top: -5px; margin-left: -18px;"><span style=" color: red; font-size: 15px;">*</span>نوع محصول</label>
														<select name="edit_KindId" id="edit_KindId" class="form-control bound-s" style="margin-right: 30px; width: 15%; height: 35px;"  required title="پر کردن این فیلد الزامی است. ">
                                                                    <option value="">بدون انتخاب</option>

                                                     	<?php
                                                            $sql = "SELECT * FROM `kind`";
                                                            $all_Item = mysqli_query($conn,$sql);
                                                            while ($Kind = mysqli_fetch_array($all_Item, MYSQLI_ASSOC)) {
                                                                $selected = ($Kind['Id'] == $rows['KindId']) ? 'selected' : ''; // بررسی برابری مقدار قبلی با مقدار فعلی
                                                                echo "<option value='" . $Kind['Id'] . "' " . $selected . ">" . $Kind['Name'] . "</option>";
                                                            }
                                                        ?>
                                                   
                                                		</select>
														
												
                									</div>
              									</div>
            								</div>
                                            
                                            <div class="panel-body">  
                                        		<div class="form-group" style="text-align: left; padding-left: 25px;">
                                               		<button name = "submit" type="submit" class="btn btn-success">ثبت</button>
													<a href=<?php echo $Page; ?>>
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
                                ?>
                                </table>        
                            </div>
                        </section>
                    
                                <section class="panel" style="padding-bottom: 30px">
                            <header class="panel-heading">
                            لیست نوع محصولات
                            </header>
                            <form class="form-horizontal" role="form" method="post" action="Types.php" enctype="multipart/form-data">
                                

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
                                        <td><label class="col-lg-2 control-label" style="width: 8.5%; margin-right: 60px; margin-top: -5px; margin-left: -18px;" >عنوان</label>
										</td>
										<td>
										<input type="text" name="Title_search" id="Title_search" class="form-control" style="margin-right: 23px;">
										</td>
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
										<th class="hidden-phone" style="text-align: center;">عنوان</th>
                                        <th class="hidden-phone" style="text-align: center;">عملیات</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
										$where_query = " where 1=1 ";
                                        if (isset($_POST['search_btn']))
                                        {
                                            $KindId_search = $_POST['KindId_search'];
											$Title_search = $_POST['Title_search'];
                                        }
                                       
                                       elseif(isset($_POST['clear_btn']))
									   {
                                            $KindId_search = null;
										    $Title_search = null;
                                       }
                                       else{
                                            $KindId_search = null;
										    $Title_search = null;
                                       }
									
                                       if($KindId_search != null )
                                       {
											$where_query .= " and KindId like '%$KindId_search%'";
                                       }
									   if($Title_search != null)
                                       {
											$where_query .= " and Title like '%$Title_search%'";
                                       }
									   
									   $sql = "select types.Id as Id, kind.`Name` as kind, types.Title as Title 
									   			FROM types JOIN kind on kind.Id = types.KindId ". $where_query;
                                       
                                        $result = mysqli_query( $conn, $sql );
                                              $i = 1;
                                              while ( $rows = $result->fetch_assoc() ) {
                                    ?>
                                      <tr class="odd gradeX">
                                        <td></td>
                                        <td><?=$i;?></td>
                                        <td class="hidden-phone"><?=$rows['kind'];?></td>
										<td class="hidden-phone"><?=$rows['Title'];?></td>
                                        <td >
                                            <a href='edit.php?id=<?= $rows['Id'];?>&page=Features.php'>
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
