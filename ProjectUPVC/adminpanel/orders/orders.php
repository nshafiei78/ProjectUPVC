<?php
include( "../../functions/function.php" );
include( "../../functions/connect.php" );
require_once('config.php');
$pmenu = $cmenu = null;
?>
<?php
require_once('config.php');

$pmenu = $cmenu = null;

if (isset($_GET["ProductsId"]) && is_numeric($_GET["ProductsId"])) {
    $pmenu = $_GET["ProductsId"];
}

//when submit button is pressed then parent category id and sub-category id are displayed to the user
if (isset($_POST['submit'])) {
    if (isset($_POST['TypeProductsId'])) {
        $pmenu = $_POST['ProductsId'];
    }
    if (isset($_POST['TypeProductsId']) && is_numeric($_POST['TypeProductsId'])) {
        $cmenu = $_POST['TypeProductsId'];
    }
    if (isset($_POST['TypeProductsId']) && is_numeric($_POST['TypeProductsId'])) {
        echo 'Parent Cat Id: ' . $pmenu . ' -> ' . 'Subcategory Id: ' . $cmenu;
    } else if (isset($_POST['TypeProductsId'])) {
        echo 'Parent Cat Id: ' . $pmenu;
    }
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
<title>سفارشات</title>

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
     <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
        <title>Dependent dropdown in PHP, MySQL</title>
        <script type="text/javascript">
            function autoSubmit() {
                with (window.document.form) {
                    /**
                     * We have if and else block where we check the selected index for parent category(ProductsId) and * accordingly we change the URL in the browser.
                     */
                    if (ProductsId.selectedIndex === 0) {
                        window.location.href = 'orders.php';
                    } else {
                        window.location.href = 'orders.php?ProductsId=' + ProductsId.options[ProductsId.selectedIndex].value;
                    }
                }
            }
        </script>
</head>

<body>
<?php
@includepage( "../inc_template/header" );
@includepage( "../inc_template/menuorders" );
?>
<section id="main-content">
  <section class="wrapper"> 
    <!-- page start-->
    <div class="row">
      <div class="col-lg-12">
        <section class="panel">
          <header class="panel-heading"> سفارشات </header>
          <div class="panel-body">
            <table class="table sliders">
                <form class="form" id="form" name="form" method="post" action="insert.php?page=orders.php"  enctype="multipart/form-data">

              <div style="margin-right: 47px; margin-top:20px"><span style=" color: red; font-size: 15px;">*</span>کاربران</div>
              <select name="User" id="UserId" class="form-control bound-s" style="margin-right: 120px; margin-bottom:40px; width: 200px;height: 40px;"required title="انتخاب مقداری از این فیلد الزامی است.">
                  <option value="">بدون انتخاب</option>
                <?php
                $sql = "SELECT * FROM `users`";
                $all_Item = mysqli_query( $conn, $sql );
                while ( $Kind = mysqli_fetch_array(
                    $all_Item, MYSQLI_ASSOC ) ): ;
                $selectedId = 1;
                ?>
                <option 
                  value="<?php echo $Kind["Id"];?>"> <?php echo $Kind["FirstName"]." ".$Kind["LastName"];?>
                </option>
                <?php
                endwhile;
                ?>
              </select>
              
                <div class="form-group" >
                    <label class="col-lg-2 control-label" style="width: 15%;  margin-top: -5px; margin-left: 100px; width: 80px; height: 20px;"><span style=" color: red; font-size: 15px;">*</span>ابعاد</label>
                  <div class="col-lg-10">
                      <div class="row">
                        <div style="width: 220px; margin-left: 800px; height: 80px;">
                          <input type="text" name="Dimensions" id="DimensionsId" class="form-control" required title="انتخاب مقداری از این فیلد الزامی است.">
                        </div>
                      </div>
                    </div>
              </tbody>
            </table>
            <div class="form-group">
              <label class="col-lg-2 control-label" style="width: 5%; margin-right: 40px; margin-top: -1px;">توضیحات</label>
              <div class="col-lg-10">
                <textarea name="Discription" id="DiscriptionId" class="form-control" cols="10" rows="5" style="margin-top: -1px;"></textarea>
                <br>
                <br>
              </div>
            </div>
            
           
            </table>
          </div>
        
          <fieldset>
          <p class="bg">
                <label for="ProductsId">محصول</label> <!-- PARENT CATEGORY SELECTION -->
                <!--onChange event fired and function autoSubmit() is invoked-->
                <select name="Products" id="ProductsId" class="form-control bound-s" style="margin-right: 30px; width: 200px; height: 40px;" onchange="autoSubmit();">
          <option value="">بدون انتخاب</option>
          <?php
          // Select parent categories. Parent categories are with parent_id=0
          $sql = "SELECT * FROM `kind`";
          $result = dbQuery($sql);
          while ($row = dbFetchAssoc($result)) {
              echo ("<option value=\"{$row['Id']}\" " . ($pmenu == $row['Id'] ? " selected" : "") . ">{$row['Name']}</option>");
          }
          ?>
       </select>
            </p>
            <?php
      // Check whether parent category was really selected and parent category id is numeric
     if ($pmenu != '' && is_numeric($pmenu)) {
                //// select sub-categories categories for a given parent category id
          $sql = "SELECT * FROM types Where KindId=" . $pmenu;
             $result = dbQuery($sql);
                
                if (dbNumRows($result) > 0) {
                    ?>
                    <p class="bg">
                        <label for="TypeProductsId">نوع محصول</label>
                        <select name="TypeProducts" id="TypeProductsId" class="form-control bound-s" style="margin-right: 30px; width: 200px; height: 40px;">
                            <option value="">بدوون انتخاب</option>
                            <?php
                            // POPULATE DROP DOWN WITH SUBCATEGORY FROM A GIVEN PARENT CATEGORY
                            while ($row = dbFetchAssoc($result)) {
                                echo ("<option value=\"{$row['Id']}\" " . ($cmenu == $row['Id'] ? " selected" : "") . ">{$row['Title']}</option>");
                            }
                            ?>
                        </select>
                    </p>
                    <?php
                }
            }
            ?>
           
        </fieldset>
            <div class="panel-body">
              <div class="form-group" style="text-align: left; padding-left: 60px;margin-top: 160px">
                <button name = "submit" type="submit" class="btn btn-success">ثبت</button>
              </div>
            </div>
             </form>
          </section>
      
        <section class="panel" style="padding-bottom: 30px" >
           
          <header class="panel-heading"> لیست سفارشات </header>
          <form 
                class="form-horizontal" role="form" method="post" action="orders.php" enctype="multipart/form-data">
          <table class="table sliders">
            <tbody style="display: flex; flex-direction: row;">
              <tr>
                <td><div style="margin-right: 50px;margin-top:10px">محصول</div></td>
                <td><select name="Products" id="ProductsId" class="form-control bound-s" style="margin-right: 30px; width: 200px; height: 40px;">
                    <option value="">بدون انتخاب</option>
                    <?php
                    $sql = "SELECT * FROM `kind`";
                    $all_Item = mysqli_query( $conn, $sql );
                    while ( $Kind = mysqli_fetch_array(
                        $all_Item, MYSQLI_ASSOC ) ): ;
                    $selectedId = 1;
                    ?>
                    <option 
                    value="<?php echo $Kind["Id"];?>"> <?php echo $Kind["Name"];?>
                    </option>
                    <?php
                    endwhile;
                    ?>
                  </select></td>
              </tr>
              <tr>
                <td><div style="margin-right: 80px;margin-top:10px">نوع محصول</div></td>
                <td><select name="TypeProducts" id="TypeProductsId" class="form-control bound-s" style="margin-right: 30px; width: 200px; height: 40px;">
                    <option value="">بدون انتخاب</option>
                    <?php
                    $sql = "SELECT * FROM `types`";
                    $all_Item = mysqli_query( $conn, $sql );
                    while ( $Kind = mysqli_fetch_array(
                        $all_Item, MYSQLI_ASSOC ) ): ;
                    $selectedId = 1;
                    ?>
                    <option 
                    value="<?php echo $Kind["Id"];?>"> <?php echo $Kind["Title"];?>
                    </option>
                    <?php
                    endwhile;
                    ?>
                  </select></td>
              </tr>
              <tr>
                <td><div style="margin-right: 47px; margin-top:10px">کاربران</div></td>
                <td><select name="User" id="UserId" class="form-control bound-s" style="margin-right: 40px; margin-bottom:40px; width: 200px;height: 40px; ">
                    <option value="">بدون انتخاب</option>
                    <?php
                    $sql = "SELECT * FROM `users`";
                    $all_Item = mysqli_query( $conn, $sql );
                    while ( $Kind = mysqli_fetch_array(
                        $all_Item, MYSQLI_ASSOC ) ): ;
                    $selectedId = 1;
                    ?>
                    
                    <option 
                            
                    value="<?php echo $Kind["Id"];?>"> <?php echo $Kind["FirstName"].$Kind["LastName"];?>
                    </option>
                    <?php
                    endwhile;
                    ?>
                  </select></td>
              </tr>
            </tbody>
            </table>
            <div class="form-group">
              <div style="margin-top: -125px; margin-right:80%;display: flex;">
                <button type="submit" name="search_btn" class="btn btn-success" style="margin-left: 10px;">جست‌وجو</button>
                <button type="submit" name="clear_btn" class="btn btn-success" style="margin-left: -40px;">حذف فیلتر</button>
              </div>
            </div>
                       
          </form>
          <table class="table table-striped border-top" id="sample_1 " style="text-align: center; margin-top: -30px;">

              <tr style="text-align: center;">
                <th style="width: 8px;"> </th>
                <th style="text-align: center;">ردیف</th>
                <th class="hidden-phone" style="text-align: center;">نام کاربر</th>
                <th class="hidden-phone" style="text-align: center;">محصول</th>
                <th class="hidden-phone" style="text-align: center;">نوع محصول</th>
                <th class="hidden-phone" style="text-align: center;">ابعاد</th>
                <th class="hidden-phone" style="text-align: center;">توضیحات</th>
                <th class="hidden-phone" style="text-align: center;">عملیات</th>
              </tr>
      
            <tbody>
              <?php
              if ( isset( $_POST[ 'search_btn' ] ) ) {
                    $Products = $_POST[ 'Products' ];
                    $TypeProducts = $_POST[ 'TypeProducts' ];
                    $User = $_POST[ 'User' ];
                  echo($User);
                  

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
                $where=" where 1=1 ";
              if ( $Products != null){
                  
                  $where .= " and kind.Id = '$Products'";
                  
              }
                
                if($User != null ) {
                    
                $where .= " and users.Id = '$User'";
                  
                }
                if($TypeProducts != null ) {
                    
                $where .= " and types.Id = '$TypeProducts'";
                  
                }

                $sql = "SELECT orders.Id as Id, CONCAT(users.FirstName, ' ', users.LastName) as FullName, kind.Name as Name, types.Title as Title, orders.Dimensions as Dimensions, orders.Discription as Discription
                FROM orders
                JOIN users ON orders.UserId = users.Id
                JOIN kind ON orders.KindId = kind.Id
                JOIN types ON orders.TypeId = types.Id " .$where ;
              
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
                <td ><a href='edit.php?id=<?= $rows['Id'];?>&page=orders.php'>
                  <button class="btn btn-primary btn-xs"><i class="icon-pencil"></i></button>
                  </a> <a href='delete.php?id=<?= $rows['Id'];?>&page=orders.php'>
                  <button class="btn btn-danger btn-xs"><i class="icon-trash"></i></button>
                  </a></td>
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
