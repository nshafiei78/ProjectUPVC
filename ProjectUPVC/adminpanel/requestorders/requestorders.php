<?php
include( "../../functions/function.php" );
include( "../../functions/connect.php" );
$Id = $_GET['id'];
$UserId = $_GET['userid'];

$realId = findIdFromMd5($Id);

function findIdFromMd5($md5Id) {
    include("../../functions/connect.php"); // اتصال به پایگاه داده
    
    // اجرای کوئری برای یافتن مقدار اصلی Id با توجه به md5
    $sql = "SELECT * FROM `orders` WHERE MD5(Id) = '$md5Id'";

    $result = mysqli_query($conn, $sql);
    
    // بررسی آیا کوئری با موفقیت اجرا شده است
    if(mysqli_num_rows($result) > 0) {
        // خواندن مقدار اصلی Id از نتیجه کوئری
        $row = mysqli_fetch_assoc($result);
        $realId = $row['Id'];
        return $realId;
    } else {
        // در صورتی که مقدار اصلی Id پیدا نشود، می‌توانید عملیات دیگری انجام دهید، مانند پیام خطا یا بازگشت به صفحه اصلی
        // در اینجا ما یک مقدار خطا را باز می‌گردانیم
        return null;
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
<title>صفحه اصلی</title>

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
@includepage( "../inc_template/menurequestorders" );
?>
   <?php
    if(isset($_GET['id'])){
        
        $Id = $_GET['id'];
        $sql = "SELECT * FROM `orders` WHERE `Id`=$realId";
        $result = mysqli_query( $conn, $sql );
        while($rows = $result->fetch_assoc()){
      
    ?>   
<section id="main-content">
  <section class="wrapper"> 
    <!-- page start-->
    <div class="row">
      <div class="col-lg-12">
        <section class="panel">
          <header class="panel-heading">سفارشات درخواست داده شده</header>
          <div class="panel-body">
            <table class="table sliders">
              <form class="form-horizontal" role="form" method="post" action="saveandmove.php?ID=<?= $realId; ?>" enctype="multipart/form-data">
              <div style="margin-right: 5px; margin-top:20px">کاربران</div>
              
              <select name="User" id="UserId" class="form-control bound-s" style="margin-right: 70px; margin-bottom:40px; width: 200px;height: 40px; " disabled>
                 <?php
                    $sql = "SELECT * FROM `users`";
                    $all_Item = mysqli_query($conn,$sql);
                    while ($Kind = mysqli_fetch_array($all_Item, MYSQLI_ASSOC)) {
                        $selected = ($Kind['Id'] == $rows['UserId']) ? 'selected' : ''; // بررسی برابری مقدار قبلی با مقدار فعلی
                        echo "<option value='" . $Kind['Id'] . "' " . $selected . ">" . $Kind["FirstName"]." ".$Kind["LastName"] . "</option>";
                    }
                ?>
              </select>
              <tbody style="display: flex; flex-direction: row;">
                <tr>
                  <td><div style="margin-right: 5px;">محصول</div></td>
                  <td><select  name="Products" id="ProductsId" class="form-control bound-s" style="margin-right: 30px; width: 200px; height: 40px;" disabled>
                       <?php
                     $sql = "SELECT * FROM `kind`";
                    $all_Item = mysqli_query($conn,$sql);
                    while ($Kind = mysqli_fetch_array($all_Item, MYSQLI_ASSOC)) {
                        $selected = ($Kind['Id'] == $rows['KindId']) ? 'selected' : ''; // بررسی برابری مقدار قبلی با مقدار فعلی
                        echo "<option value='" . $Kind['Id'] . "' " . $selected . ">" . $Kind['Name'] . "</option>";
                    }
                    ?>
                    </select></td>
                </tr>
                <tr>
                  <td><div style="margin-right: 50px;">نوع محصول</div></td>
                  <td><select  name="TypeProducts" id="TypeProductsId" class="form-control bound-s" style="margin-right: 30px; width: 200px; height: 40px;" disabled>
                       <?php
                     $sql = "SELECT * FROM `types`";
                    $all_Item = mysqli_query($conn,$sql);

                    while ($Kind = mysqli_fetch_array($all_Item, MYSQLI_ASSOC)) {
                        $selected = ($Kind['Id'] == $rows['TypeId']) ? 'selected' : ''; // بررسی برابری مقدار قبلی با مقدار فعلی
                        echo "<option value='" . $Kind['Id'] . "' " . $selected . ">" . $Kind['Title'] . "</option>";
                    }
                        ?>
                    </select></td>
                </tr>
                <tr>
                  <td><div class="form-group" >
                    <label class="col-lg-2 control-label" style="width: 15%;  margin-top: -5px; margin-right: 50px; width: 80px; height: 20px;">ابعاد</label>
                      </td>
                  <td><div class="col-lg-10">
                      <div class="row">
                        <div class="col-lg-2" style="width: 220px; height: 80px;">
                          <input type="text" name="Dimensions" id="DimensionsId" class="form-control"  value=" <?=$rows['Dimensions'];?>"disabled>
                        </div>
                      </div>
                    </div></td>
                </tr>
              </tbody>
                   <table class="table sliders">
                  <tbody style="display: flex; flex-direction: row;">
                      <tr>
                  <td><div class="form-group" >
                    <label class="col-lg-2 control-label" style="width: 15%;  margin-top: -5px; margin-right: -15px; width: 80px; height: 20px;"><span style=" color: red; font-size: 15px;">*</span>تعداد</label>
                      </td>
                  <td><div class="col-lg-10">
                      <div class="row">
                        <div class="col-lg-2" style="width: 220px; height: 80px;">
                          <input type="text" name="Number" id="NumberId" class="form-control" required title="پر کردن این فیلد الزامی است. ">
                        </div>
                      </div>
                    </div></td>
                </tr>
                  <tr>
                  <td><div class="form-group" >
                    <label class="col-lg-2 control-label" style="width: 15%;  margin-top: -5px; margin-right: 20px; width: 80px; height: 20px;"><span style=" color: red; font-size: 15px;">*</span>قیمت</label>
                      </td>
                  <td><div class="col-lg-10">
                      <div class="row">
                        <div class="col-lg-2" style="width: 220px; height: 80px;">
                          <input type="text" name="Price" id="PriceId" class="form-control" required title="پر کردن این فیلد الزامی است. ">
                        </div>
                      </div>
                    </div></td>
                </tr>  
                  </tbody>
                  </table>
            </table>
            <div class="form-group">
              <label class="col-lg-2 control-label" style="width: 5%; margin-right: -10px; margin-top: -1px;">توضیحات</label>
              <div class="col-lg-10">
                <textarea name="Discription" id="DiscriptionId" class="form-control" cols="10" rows="5" style="margin-top: -1px;"></textarea>
                <br>
                <br>
              </div>
            </div>
            <div class="panel-body">
              <div class="form-group" style="text-align: left; padding-left: 60px;margin-top: 160px">
                <button name = "submit" type="submit" class="btn btn-success">ثبت</button>
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
    
<section id="main-content">
            <section class="wrapper" style="margin-top: -20px;">
                <!-- page start-->
                <div class="row">
                    <div class="col-lg-12">
                            <section class="panel">
                        <section class="panel">
                            <header class="panel-heading"> لیست سفارشات درخواست داده شده</header>
                                <form class="form-horizontal" role="form" method="post" action="requestorders.php?id=<?php echo $realId;?>&userid=<?php echo $UserId;?>" enctype="multipart/form-data">
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
                                </tbody>
                                </table>
                                <div class="form-group">
                                  <div style="margin-top: -95px; margin-right:80%;display: flex;">
                                    <button type="submit" name="search_btn" class="btn btn-success" style="margin-left: 10px;">جست‌وجو</button>
                                    <button type="submit" name="clear_btn" class="btn btn-success" style="margin-left: -40px;">حذف فیلتر</button>
                                  </div>
                                </div>


                                  </form>
                           
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
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                      if ( isset( $_POST[ 'search_btn' ] ) ) {
                                            $Products = $_POST[ 'Products' ];
                                            $TypeProducts = $_POST[ 'TypeProducts' ];
                                           

                                      } elseif ( isset( $_POST[ 'clear_btn' ] ) ) {

                                            $Products = null;
                                            $TypeProducts = null;
                                           
                                      }
                                      else {
                                            $Products = null;
                                            $TypeProducts = null;
                                            
                                      }
                                    $where_query = " ";
                                      if ( $Products != null ){
                                          $where_query .= " and kind.Id = $Products";
                                          
                                      }
                                    if($TypeProducts != null ) {
                                        $where_query .= " and types.Id = $TypeProducts";
                                    }


                                        $sql = "
                                        SELECT orders.Id, CONCAT(users.FirstName,'',users.LastName) as FullName, kind.Name AS Name, types.Title AS Title,
                                        orders.Dimensions as Dimensions,orders.Discription as Discription, orders.`Date` as Date, cond.`Condition` as cond,orders.UserId as UserId
                                        FROM `orders` 
                                        JOIN `users`ON orders.UserId = users.Id
                                        JOIN `kind` ON orders.KindId = kind.Id
                                        JOIN `types`ON orders.TypeId = types.Id
                                        JOIN `condition` cond ON orders.ConditionId = cond.Id 
                                        WHERE orders.UserId = $UserId" .$where_query ;

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
                                        <td class="hidden-phone"><?=$rows['Date'];?></td>
                                        <td class="hidden-phone"><?=$rows['Discription'];?></td>
                                        
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
