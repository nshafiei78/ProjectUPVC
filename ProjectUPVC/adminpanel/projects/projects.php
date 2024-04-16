<?php
include( "../../functions/function.php" );
include( "../../functions/connect.php" );
$Projectid = $_GET['id'];

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
<title>محصولات پروژه</title>

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
      <header class="panel-heading">ثبت محصولات پروژه</header>
      <div class="panel-body">
        <table class="table sliders">
          <form class="form-horizontal" role="form" method = "post" action="insertprojects.php?Projectid=<?php echo $Projectid; ?>"  enctype="multipart/form-data">
          
          <tbody style="display: flex; flex-direction: row;">
            <tr>
              <td><div style="margin-right: 10px;"><span style=" color: red; font-size: 15px;">*</span>محصول</div></td>
              <td><select name="Product" id="ProductId" class="form-control bound-s" style="margin-right: 10px; width: 200px; height: 40px;" required title="انتخاب مقداری از این فیلد الزامی است.">
                  <option value="">بدون انتخاب</option>
                  <?php
                  $sql = "SELECT product.Id as Id, CONCAT(kind.Name ,' ',types.Title,' ', typeskind.Type) as Products
                            FROM product 
                            JOIN kind ON product.KindId = kind.Id 
                            JOIN types ON product.TypId = types.Id 
                            JOIN typeskind ON product.TypesKind = typeskind.Id";
                  $all_Item = mysqli_query( $conn, $sql );
                  while ( $Kind = mysqli_fetch_array(
                      $all_Item, MYSQLI_ASSOC ) ): ;
                  ?>
                 <option 
                         
                    value="<?php echo $Kind["Id"];?>"> <?php echo $Kind["Products"];?> </option>
                  
                  <?php
                  
                  endwhile;
                  
                  ?>
                </select></td>
            </tr>
               <td><div style="margin-right: 50px;"><span style=" color: red; font-size: 15px;">*</span>ویژگی محصول</div></td>
               <td><select name="detailId" id="detailId" class="form-control bound-s" style="margin-right:20px; width: 200px; height: 35px;" required title="انتخاب مقداری از این فیلد الزامی است.">
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
              </tbody>
              </table>
              <table class="table sliders">
              <tbody style="display: flex; flex-direction: row;">
            <tr>
              <td><div class="form-group" >
                     <td><div style="margin-right: 10px;"><span style=" color: red; font-size: 15px;">*</span>ابعاد</div></td>
                  <td><div class="col-lg-10">
                      <div class="row">
                        <div class="col-lg-2" style="width: 220px; height: 80px;">
                          <input type="text" name="Dimensions" id="DimensionsId" class="form-control" required title="پر کردن این فیلد الزامی است. ">
                        </div>
                      </div>
                    </div>
                  </td>
               </tr>
            <tr>
              <td><div class="form-group" >
                     <td><div style="margin-right: 70px;"><span style=" color: red; font-size: 15px;">*</span>تعداد</div></td>
                  <td><div class="col-lg-10">
                      <div class="row">
                        <div class="col-lg-2" style="width: 220px; height: 80px;">
                          <input type="text" name="Number" id="NumberId" class="form-control" required title="پر کردن این فیلد الزامی است. ">
                        </div>
                      </div>
                    </div>
                  </td>
               </tr>
            <tr>
              <td><div class="form-group" >
                     <td><div style="margin-right: 70px;"><span style=" color: red; font-size: 15px;">*</span>قیمت</div></td>
                  <td><div class="col-lg-10">
                      <div class="row">
                        <div class="col-lg-2" style="width: 220px; height: 80px;">
                          <input type="text" name="Cost" id="CostId" class="form-control" required title="پر کردن این فیلد الزامی است. ">
                        </div>
                      </div>
                    </div>
                  </td>
               </tr>
          </tbody>
          
        </table>
        <div class="panel-body">
         <div style="margin-top: -50px; margin-right:90%;display: flex;">
            <button name = "submit" type="submit" class="btn btn-success" style="margin-left: 10px;">ثبت</button>
             <button type="submit" name="return" class="btn btn-success" style="margin-left: 600px;"><a href="infocustomers.php" style=" color: #FFFFFF;"> بازگشت</a></button>
          </div>
        </div>
                  
      </div>
      </div>
      </form>
      </table>
      </div>
    </section>
    <section class="panel" style="padding-bottom: 30px" >
      <header class="panel-heading">لیست محصولات ثبت شده پروژه</header>
      <form class="form-horizontal" role="form" method="post" action="projects.php?id=<?php echo $Projectid; ?>" enctype="multipart/form-data">
        <table class="table sliders">
            <tbody style="display: flex; flex-direction: row;">
              <tr>
                <td><div style="margin-right: 50px;">محصول</div></td>
                <td><select name="Product_Search" id="ProductId_Search" class="form-control bound-s" style="margin-right: 30px; width: 200px; height: 40px;">
                    <option value="">بدون انتخاب</option>
                   <?php
                  $sql = "SELECT product.Id as Id, CONCAT(kind.Name ,' ',types.Title,' ', typeskind.Type) as Products
                            FROM product 
                            JOIN kind ON product.KindId = kind.Id 
                            JOIN types ON product.TypId = types.Id 
                            JOIN typeskind ON product.TypesKind = typeskind.Id";
                  $all_Item = mysqli_query( $conn, $sql );
                  while ( $Kind = mysqli_fetch_array(
                      $all_Item, MYSQLI_ASSOC ) ): ;
                  ?>
                 <option 
                         
                    value="<?php echo $Kind["Id"];?>"> <?php echo $Kind["Products"];?> </option>
                  
                  <?php
                  
                  endwhile;
                  
                  ?>
                  </select></td>
              </tr>
                <tr>
                 <td><div style="margin-right: 50px;">ویژگی محصول</div></td>
               <td><select name="Details_Search" id="DetailsId_Search" class="form-control bound-s" style="margin-right:20px; width: 200px; height: 35px;">
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
             <div style="margin-top: -90px; margin-right:85%;display: flex;">
                <button type="submit" name="search_btn" class="btn btn-success" style="margin-left: 10px;">جست‌وجو</button>
                <button type="submit" name="clear_btn" class="btn btn-success" style="margin-left: 600px;">حذف فیلتر</button>
              </div>
                
            </div>
      </form>
      <table class="table table-striped border-top" id="sample_1 " style="text-align: center; margin-top: 50px;">
        <thead>
          <tr style="text-align: center;">
            <th style="width: 8px;"> </th>
            <th style="text-align: center;">ردیف</th>
            <th class="hidden-phone" style="text-align: center;">محصول</th>
            <th class="hidden-phone" style="text-align: center;">ویژگی محصول</th>
            <th class="hidden-phone" style="text-align: center;">ابعاد</th>
            <th class="hidden-phone" style="text-align: center;">تعداد</th>
            <th class="hidden-phone" style="text-align: center;">قیمت</th>
            <th class="hidden-phone" style="text-align: center;">عملیات</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if ( isset( $_POST[ 'search_btn' ] ) ) {
            $Product_Search = $_POST[ 'Product_Search' ];
            $Details_Search = $_POST[ 'Details_Search' ];

          }
			elseif ( isset( $_POST[ 'clear_btn' ] ) ) {
            $Product_Search = null;
            $Details_Search = null;
          }
          else {
            $Product_Search = null;
            $Details_Search = null;
          }
        $where_query = " ";
          if ( $Product_Search != null ) {
                $where_query .=" and project_p.ProductId = '$Product_Search' ";
          }
        if ( $Details_Search != null ) {
                $where_query .=" and typedetails.Id = '$Details_Search' ";
          }
         $sql = "SELECT project_p.Id as Id, project_p.ProductId as ProductId , project_p.TypeDetailsId as TypeDetailsId , CONCAT(kind.`Name` ,' ', types.Title ) as Products , project_p.Dimensions as Dimensions, project_p.Number as Number, project_p.Cost as Cost, CONCAT(details.Title ,' ',typedetails.Title ) as DetailsTitle from project_p 
                JOIN product ON product.Id = project_p.ProductId
                JOIN kind ON kind.Id = product.KindId
                JOIN types ON types.Id = product.TypId
                JOIN typedetails ON typedetails.Id=project_p.TypeDetailsId
                JOIN details ON details.Id = typedetails.IdDetails
                    WHERE project_p.ProjectId = $Projectid" . $where_query;
         
          $result = mysqli_query( $conn, $sql );
          $i = 1;
          while ( $rows = $result->fetch_assoc() ) {
            ?>
          <tr class="odd gradeX">
            <td></td>
            <td><?=$i;?></td>
            <td class="hidden-phone"><?=$rows['Products'];?></td>
            <td class="hidden-phone"><?=$rows['DetailsTitle'];?></td>
            <td class="hidden-phone"><?=$rows['Dimensions'];?></td>
            <td class="hidden-phone"><?=$rows['Number'];?></td>
            <td class="hidden-phone"><?=$rows['Cost'];?></td>
            <td >
                <a href='editprojects.php?id=<?= $rows['Id']; ?>&page=projects.php&ID=<?= $Projectid;?>'>
                  <button class="btn btn-primary btn-xs"><i class="icon-pencil"></i></button>
                </a>
                <a href='deleteprojects.php?id=<?= $rows['Id'];?>&page=projects.php&ID=<?= $Projectid;?>'>
              <button class="btn btn-danger btn-xs"><i class="icon-trash"></i></button>
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
