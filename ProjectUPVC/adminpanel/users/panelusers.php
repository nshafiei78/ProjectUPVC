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
<title>کارتابل کاربران</title>

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
                        <section class="panel">
                            <header class="panel-heading">
                                کارتابل کاربران
                            </header>
                            <table class="table table-striped border-top" id="sample_1">
                                <thead>
                                    <tr>
                                        <th style="width: 8px;"></th>
                                        <th style="text-align: center;">ردیف</th>
                                        <th class="hidden-phone" style="text-align: center;">نام کاربر</th>
                                        <th class="hidden-phone" style="text-align: center;">محصول</th>
                                        <th class="hidden-phone" style="text-align: center;">نوع محصول</th>
                                        <th class="hidden-phone" style="text-align: center;">ابعاد</th>
                                        <th class="hidden-phone" style="text-align: center;">تاریخ</th>
                                        <th class="hidden-phone" style="text-align: center;">توضیحات</th>
                                        <th class="hidden-phone" style="text-align: center;">وضعیت</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                      if ( isset( $_POST[ 'search_btn' ] ) ) {
                                            $Products = $_POST[ 'Products' ];
                                            $TypeProducts = $_POST[ 'TypeProducts' ];
                                            $User = $_POST[ 'User' ];

                                      } elseif ( isset( $_POST[ 'clear_btn' ] ) ) {

                                            $Products = null;
                                            $TypeProducts = null;
                                            $User = null;
                                      }
                                      else {
                                            $Products = null;
                                            $TypeProducts = null;
                                            $User = null;
                                      }
									  $where_query = " ";
                                      if ( $Products != null  ) 
									  {
										  $where_query .= " and  kind.Name = '$Products' ";
									  }
									  if($TypeProducts != null )
									  {
 											$where_query .= " and Title = '$TypeProducts'";
									  }
									  if($User != null ) {

                                          $where_query .= " and CONCAT(users.FirstName, ' ', users.LastName) = '$User'" 

                                        } 
                                        
                                        $sql = "
                                        SELECT orders.Id, CONCAT(users.FirstName,' ',users.LastName) as FullName, kind.Name AS Name, types.Title AS Title,
                                        orders.Dimensions as Dimensions,orders.Discription as Discription, orders.`Date` as Date, cond.`Condition` as cond
                                        FROM `orders` 
                                        JOIN `users`ON orders.UserId = users.Id
                                        JOIN `kind` ON orders.KindId = kind.Id
                                        JOIN `types`ON orders.TypeId = types.Id
                                        JOIN `condition` cond ON orders.ConditionId = cond.Id 
                                        WHERE orders.ConditionId =1" . $where_query;
                                      
									
									
                                      $result = mysqli_query( $conn, $sql );
                                      $i = 1;
                                      while ( $rows = $result->fetch_assoc() ) {
                                    ?>
                                    <tr class="odd gradeX">
                                        <td></td>
                                        <td><?=$i;?></td>
                                        <td class="hidden-phone"><?=$rows['FullName'];?></td>
                                        <td class="hidden-phone"><?=$rows['Name'];?></td>
                                        <td class="hidden-phone"><?=$rows['Title'];?></td>
                                        <td class="hidden-phone"><?=$rows['Dimensions'];?></td>
                                        <td class="hidden-phone"><?=$rows['Discription'];?></td>
                                        <td class="hidden-phone"><?=$rows['Date'];?></td>
                                        <td ><span class="label label-info label-mini"><?=$rows['cond'];?></span></td>
                                      </tr>
                                    </tbody>
                                    <?php
                                    ++$i;
                                    }
                                    mysqli_close( $conn );
                                    ?>
                                  </table>
                            </section>
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
