<?php
include( "../../functions/function.php" );
include( "../../functions/connect.php" );
     $KindId = $_GET['kind_id'];
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
<link rel="shortcut icon" href="../template/img/favicon.html">
<title>ویرایش محصولات</title>

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
@includepage( "../inc_template/menuproducts" );
?>
    <?php
    if(isset($_GET['id'])){
        
        $Id = $_GET['id'];
        $sql = "SELECT * FROM `product` WHERE `Id`=$Id";
        $result = mysqli_query( $conn, $sql );
        while($rows = $result->fetch_assoc()){
      
    ?>
<section id="main-content">
            <section class="wrapper">
                <!-- page start-->
                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel" >
                            <header class="panel-heading">
                               محصولات
                            </header>
                            <div class="panel-body">     
                                <table class="table sliders">

                                    <form class="form-horizontal" role="form" method="post" action="update.php?id=<?php echo $Id; ?>&page=<?php echo $Page; ?>&kind_id=<?php echo $KindId; ?>" enctype="multipart/form-data">

                                        
                                    <tbody style="display: flex; flex-direction: row;">   
                                        
                                        <tr>
                                            <td><div style="margin-right: 10px;"><span style=" color: red; font-size: 15px;">*</span>نوع محصول</div></td>
                                            <td>                                                   
                                                <select name="TypeId" id="TypeId" class="form-control bound-s" style="margin-right: 30px; width: 200px; height: 40px;" required title="انتخاب مقداری از این فیلد الزامی است">
                                                      <option value="">بدون انتخاب</option>
                                                     <?php
                                                            $sql = "SELECT * FROM `types` WHERE KindId = $KindId";
                                                            $all_Item = mysqli_query($conn,$sql);
                                                            while ($Kind = mysqli_fetch_array($all_Item, MYSQLI_ASSOC)) {
                                                                $selected = ($Kind['Id'] == $rows['TypId']) ? 'selected' : ''; // بررسی برابری مقدار قبلی با مقدار فعلی
                                                                echo "<option value='" . $Kind['Id'] . "' " . $selected . ">" . $Kind['Title'] . "</option>";
                                                            }
                                                        ?>
                                                   
                                                </select>
                                            </td>
                                        </tr>
                                        
                                        
                                           <div class="form-group">
                                            
                                            <td>  
                                                <label class="col-lg-2 control-label" style="width: 6%; margin-right: 70px;">تصویر</label>
                                                <input type="file" class="file-pos" name="Picture" style="margin-right: 150px;">
                                            </td>
                                               <td> 
                                                <img src="<?=$rows['Picture'];?>"width="100" height="50" style="margin-right: -30px;" />
                                               </td>
                                                </div>
                                        
                                    </tbody>
                                </table> 
                                    
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label" style="width: 5%; margin-right: 1px;">توضیحات</label>
                                        <div class="col-lg-10">
                                            <textarea name="Discription" id="Discriptionid" class="form-control" overflow= "hidden" text-overflow= "ellipsis" cols="10" rows="5"><?php echo $rows['Discription'];?></textarea> 
                                         </div>   
                                            <br>
										 <br>
										  <br>
										 <br>
										  <br>
                                                      <div>
                                                        <button name = "submit" type="submit" class="btn btn-success">ثبت</button>
														  <a href=<?php echo $Page; ?>>
                                                			<button name = "submit_back" type="button" class="btn btn-success">بازگشت</button>
                                            			</a>
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
                    
                                <section class="panel" style="padding-bottom: 30px" >
                            <header class="panel-heading">
                                لیست انواع محصولات
                            </header>
                            <table class="table table-striped border-top" id="sample_1 " style="text-align: center;">
                                <thead>
                                    <tr style="text-align: center;">
                                        <th style="width: 8px;">
                                            </th>
                                        <th style="text-align: center;">ردیف</th>
                                       
                                        <th class="hidden-phone" style="text-align: center;">نوع</th>
                                        <th class="hidden-phone" style="text-align: center;">توضیحات</th>
                                        <th class="hidden-phone" style="text-align: center;">تصویر</th>
                                        
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                      $sql = "SELECT product.Id as Id, types.Title as Type, product.Discription as Discription, product.Picture , typeskind.Type as TypesKind FROM product
                                                JOIn typeskind ON typeskind.Id = product.TypesKind
                                                JOIN types ON types.Id = product.TypId
                                                WHERE product.KindId =$KindId";
                                      $result = mysqli_query( $conn, $sql );
                                      $i = 1;
                                      while ( $rows = $result->fetch_assoc() ) {

                                      ?>
                                      <tr class="odd gradeX">
                                        <td></td>
                                        <td><?=$i;?></td>
                                       
                                        <td class="hidden-phone"><?=$rows['Type'];?></td>
                                        <td class="hidden-phone"><?=$rows['Discription'];?></td>
                                        <td class="center hidden-phone">
                                            <img src="<?=$rows['Picture'];?>"width="100" height="50"/>
                                          </td>
                                       
                                      </tr>
                                    </tbody>
                                    <?php
                                           ++$i;}
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
