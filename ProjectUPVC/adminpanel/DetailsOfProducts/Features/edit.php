<?php
include( "../../../functions/function.php" );
include( "../../../functions/connect.php" );
     //$KindId = $_GET['kind_id'];
     $Page = $_GET['page'];
$Id = $_GET['id'];

$realId = findIdFromMd5($Id);

function findIdFromMd5($md5Id) {
    include("../../../functions/connect.php"); // اتصال به پایگاه داده
    
    // اجرای کوئری برای یافتن مقدار اصلی Id با توجه به md5
    $sql = "SELECT * FROM `features` WHERE MD5(Id) = '$md5Id'";

    $result = mysqli_query($conn, $sql);
    
    // بررسی آیا کوئری با موفقیت اجرا شده است
    if(mysqli_num_rows($result) > 0) {
        // خواندن مقدار اصلی Id از نتیجه کوئری
        $row = mysqli_fetch_assoc($result);
        $realId = $row['id'];
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
<title>ویرایش ویژگی‌ها</title>

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
@includepage( "../../inc_template/menufeatures" );
?>
    <?php
    if(isset($_GET['id'])){
        $Id = $_GET['id'];
        $sql = "SELECT * FROM `features` WHERE `Id`=$realId";
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
                               ویژگی‌ها
                            </header>
                            <div class="panel-body">
                                    <form class="form-horizontal" role="form" method="post" action="update.php?id=<?php echo $realId; ?>&page=<?php echo $Page; ?>" enctype="multipart/form-data">
											<div class="form-group" style="margin-top:50px;">
                    							
              									<div class="col-lg-10">
                									<div class="row">
                  										
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
														<label class="col-lg-2 control-label" style="width: 13%; margin-right: 60px; margin-top: -5px; margin-left: -18px;"><span style=" color: red; font-size: 15px;">*</span>ویژگی</label>
													    <select name="edit_detailId" id="edit_detailId" class="form-control bound-  s" style="margin-right: 30px; width: 15%; height: 35px;"  required title="پر کردن این فیلد الزامی است. ">
                                                          <option value="">بدون انتخاب</option>

														   <?php
                                                            $sql = "SELECT typedetails.Id as Id , CONCAT( details.Title, ' ', typedetails.Title ) as Title  FROM `typedetails`
                                                                    JOIN details ON details.Id = typedetails.IdDetails";
                                                            $all_Item = mysqli_query($conn,$sql);
                                                            while ($Details = mysqli_fetch_array($all_Item, MYSQLI_ASSOC)) {
                                                                $selected = ($Details['Id'] == $rows['TypeDetailsId']) ? 'selected' : ''; // بررسی برابری مقدار قبلی با مقدار فعلی
                                                                echo "<option value='" . $Details['Id'] . "' " . $selected . ">" . $Details['Title'] . "</option>";
                                                            }
                                                        ?>
                                            			</select>
                                                        <br>
                                                        <div class="form-group">
                                                          <label class="col-lg-2 control-label" style="width: 5%; margin-right: 75px;">توضیحات</label>
                                                          <div class="col-lg-10">
                                                          <textarea name="Discription" id="Discriptionid" class="form-control" cols="10" rows="5" style= "width: 967px; height: 108px; margin-right: 50px;"><?php echo $rows['Discription'];?></textarea>
                									</div>
              									</div>
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
                    
                                <section class="panel">
                            <header class="panel-heading">
                                لیست ویژگی ‌ها
                            </header>  
                            <table class="table table-striped border-top" id="sample_1 " style="text-align: center;">
                                
                                <thead>
                                    <tr style="text-align: center;">
                                        <th style="width: 8px;">
                                            </th>
                                        <th style="text-align: center;">ردیف</th>
                                        <th class="hidden-phone" style="text-align: center;">نوع محصول</th>
										<th class="hidden-phone" style="text-align: center;">ویژگی</th>
										<th class="hidden-phone" style="text-align: center;">توضیحات</th>
                                        
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                       
											$sql = "SELECT features.Id AS Id, kind.Name AS ProductKind, CONCAT(details.Title ,' ', typedetails.Title) typedetails_Title , features.Discription AS Discription 
                                                    FROM features
                                                    JOIN kind ON features.KindId = kind.Id
                                                    JOIN typedetails ON features.TypeDetailsId = typedetails.Id
                                                    JOIN details ON typedetails.IdDetails = details.Id";
                                       
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
