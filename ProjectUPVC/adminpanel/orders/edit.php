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
<title>ویرایش سفارشات</title>

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
@includepage( "../inc_template/menuorders" );
?>
<?php
if(isset($_GET['id'])){
    $Id = $_GET['id'];
    $sql = "SELECT * FROM `orders` WHERE `Id`=$Id";
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
                                سفارشات
                            </header>
                            <div class="panel-body">     
                                <table class="table sliders">
                                    
                                    <form class="form-horizontal" role="form" method="post" action="update.php?id=<?php echo $Id; ?>" enctype="multipart/form-data">
                                                    
                                                    
                                            <div style="margin-right: 47px; margin-top:20px"><span style=" color: red; font-size: 15px;">*</span>کاربران</div></td>
                                                                                            
                                                <select name="UserId" id="UserId" class="form-control bound-s" style="margin-right: 120px; margin-bottom:40px; width: 200px;height: 40px; "  required title="پر کردن این فیلد الزامی است. ">
                                                      
                                                     <?php
                                                            $sql = "SELECT * FROM `users`";
                                                            $all_Item = mysqli_query($conn,$sql);
                                                            while ($Kind = mysqli_fetch_array($all_Item, MYSQLI_ASSOC)) {
                                                                $selected = ($Kind['Id'] == $rows['UserId']) ? 'selected' : ''; // بررسی برابری مقدار قبلی با مقدار فعلی
                                                                echo "<option value='" . $Kind['Id'] . "' " . $selected . ">" . $Kind["FirstName"].$Kind["LastName"] . "</option>";
                                                            }
                                                        ?>
                                                   
                                                </select>

                                    <tbody style="display: flex; flex-direction: row;">   

                                        <tr>
  
                                            <td><div style="margin-right: 50px;"><span style=" color: red; font-size: 15px;">*</span>محصول</div></td>
                                            <td>        
                                                <select name="ProductsId" id="ProductsId" class="form-control bound-s" style="margin-right: 30px; width: 200px; height: 40px;"  required title="پر کردن این فیلد الزامی است. ">
                                                     <?php
                                                             $sql = "SELECT * FROM `kind`";
                                                            $all_Item = mysqli_query($conn,$sql);
                                                            while ($Kind = mysqli_fetch_array($all_Item, MYSQLI_ASSOC)) {
                                                                $selected = ($Kind['Id'] == $rows['KindId']) ? 'selected' : ''; // بررسی برابری مقدار قبلی با مقدار فعلی
                                                                echo "<option value='" . $Kind['Id'] . "' " . $selected . ">" . $Kind['Name'] . "</option>";
                                                            }
                                                        ?>
                                                </select>
                                            </td>
                                        </tr>
                                         <tr>
                                           
                                            <td><div style="margin-right: 80px;" ><span style=" color: red; font-size: 15px;">*</span>نوع محصول</div></td>
                                            <td>        
                                                <select name="TypeProductsId" id="TypeProductsId" class="form-control bound-s" style="margin-right: 30px; width: 200px; height: 40px;"  required title="پر کردن این فیلد الزامی است. ">
                                                  <?php
                                                             $sql = "SELECT * FROM `types`";
                                                            $all_Item = mysqli_query($conn,$sql);
                                                            
                                                            while ($Kind = mysqli_fetch_array($all_Item, MYSQLI_ASSOC)) {
                                                                $selected = ($Kind['Id'] == $rows['TypeId']) ? 'selected' : ''; // بررسی برابری مقدار قبلی با مقدار فعلی
                                                                echo "<option value='" . $Kind['Id'] . "' " . $selected . ">" . $Kind['Title'] . "</option>";
                                                            }
                                                        ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                           
                                            <td><div class="form-group" >
                                    <label class="col-lg-2 control-label" style="width: 15%;  margin-top: -5px; margin-right: 100px; width: 80px; height: 20px;"><span style=" color: red; font-size: 15px;">*</span>ابعاد</label></td>
                                            <td>        
                                                 <div class="col-lg-10">
                                <div class="row">
                                  <div class="col-lg-2" style="width: 220px; height: 80px;">
                                    <input type="text" name="Dimensions" id="DimensionsId" class="form-control" value=" <?=$rows['Dimensions'];?>"  required title="پر کردن این فیلد الزامی است. ">
                                  </div>
                                       
                                        
                                </div>
                              </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table> 
   
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label" style="width: 5%; margin-right: 40px; margin-top: -1px;">توضیحات</label>
                                        <div class="col-lg-10">
                                            <textarea name="Discription" id="DiscriptionId" class="form-control" cols="10" rows="5" style="margin-top: -1px;"><?php echo $rows['Discription'];?></textarea>
                                            <br><br>
                                        </div>
                                    </div>
                                    
                                            <div class="panel-body">  
                                        <div class="form-group" style="text-align: left; padding-left: 60px;margin-top: 160px">
                                           
                                            <button name = "submit" type="submit" class="btn btn-success">ثبت</button>
                                        	<a href="orders.php">
                                                			<button name = "submit_back" type="button" class="btn btn-success">بازگشت</button>
                                            </a>
                                        </div>
                                            </div>
                                    </form>
                                </table>        
                            </div>
                        </section>
                    
                                 <section class="panel" style="padding-bottom: 30px">
                            <header class="panel-heading">
                                لیست سفارشات
                            </header>
                                        
                                        
                                <?php
                                }
                            }
                                ?>                   
                                                         
                            <table class="table table-striped border-top" id="sample_1 " style="text-align: center;">
                                
                                <thead>
                                    <tr style="text-align: center;">
                                        <th style="width: 8px;">
                                            </th>
                                        <th style="text-align: center;">ردیف</th>
                                        <th class="hidden-phone" style="text-align: center;">نام کاربر</th>
                                        <th class="hidden-phone" style="text-align: center;">محصول</th>
                                        <th class="hidden-phone" style="text-align: center;">نوع محصول</th>
                                        <th class="hidden-phone" style="text-align: center;">ابعاد</th>
                                        <th class="hidden-phone" style="text-align: center;">توضیحات</th>
                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        if (isset($_POST['search_btn']))
                                        {
                                            $TypeId_Search = $_POST['TypeId_Search'];
                                             
                                        }
                                       
                                       elseif(isset($_POST['clear_btn'])){
                                            $TypeId_Search = null;
                                        }
                                              else{
                                                   $TypeId_Search = null;
                                              }
                                        if($TypeId_Search != null)
                                        {
                                            $sql = "SELECT product.Id as Id, types.Title as Type, product.Discription as Discription, product.Picture FROM product 
                                            JOIN types ON types.Id = product.TypId
                                            WHERE product.KindId =1 AND product.TypId = '$TypeId_Search'";
                                        }
                                        else
                                        {
                                            $sql = " SELECT orders.Id as Id, CONCAT(users.FirstName, ' ', users.LastName) as FullName, kind.Name as Name, types.Title as Title, orders.Dimensions as Dimensions, orders.Discription as Discription
                                            FROM orders
                                            JOIN users ON orders.UserId = users.Id
                                            JOIN kind ON orders.KindId = kind.Id
                                            JOIN types ON orders.TypeId = types.Id";
                                        }
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
