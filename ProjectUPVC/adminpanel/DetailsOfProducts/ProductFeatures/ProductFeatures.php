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

    
<section id="main-content">
            <section class="wrapper">
                <!-- page start-->
                <div class="row">
                    <div class="col-lg-12">
                                <section class="panel" style="padding-bottom: 30px">
                            <header class="panel-heading">
                                ویژگی محصولات
                            </header>            
                            <table class="table table-striped border-top" id="sample_1 " style="text-align: center;">
                                
                                <thead>
                                    <tr style="text-align: center;">
                                        <th style="width: 8px;">
                                            </th>
                                        <th style="text-align: center;">ردیف</th>
                                        <th class="hidden-phone" style="text-align: center;">محصول</th>
										<th class="hidden-phone" style="text-align: center;">نوع</th>
										<th class="hidden-phone" style="text-align: center;">ویژگی</th>
										<th class="hidden-phone" style="text-align: center;">توضیحات</th>
                                        <th class="hidden-phone" style="text-align: center;">عملیات</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        
										$sql_product = "SELECT * FROM v_product";
									    $result = mysqli_query( $conn, $sql_product );
                                        
                                              $i = 1;
                                              while ( $rows = $result->fetch_assoc() ) {
												  $product_Id = $rows['Id'];
												  $sql_product_feature ="SELECT v_features.typedetails_Title as typedetails_Title FROM product_f
												  JOIN v_features on product_f.FeaturesId = v_features.Id
												  WHERE ProductsId = $product_Id";
                                        		  $result_product_feature = mysqli_query( $conn, $sql_product_feature );
												  $rows_feature = [];
												  $string_feature =" ";
												  while ( $rows_product_feature = $result_product_feature->fetch_assoc() ) {
													  //$rows_feature = $rows_product_feature;
													  $string_feature .= $rows_product_feature['typedetails_Title'] . '- ';
												  }
												  
                                    ?>
                                      <tr class="odd gradeX">
                                        <td></td>
                                        <td><?=$i;?></td>
                                        <td class="hidden-phone"><?=$rows['kind_Name'];?></td>
										<td class="hidden-phone"><?=$rows['Type'];?></td>
										<td class="hidden-phone"><?=$string_feature;?></td>
										<td class="hidden-phone"><?=$rows['Discription'];?></td>
                                        <td >
                                            <a href='insert_feature.php?id=<?= $rows['Id'];?>&page=ProductFeatures.php'>
                                          		<button class="btn btn-primary btn-xs" style="background-color:#9870df; border-color:#9870df; "><i class="icon-cogs" ></i></button>
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
