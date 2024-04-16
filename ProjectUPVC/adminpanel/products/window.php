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
<title>پنجره</title>

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
 
<section id="main-content">
            <section class="wrapper">
                <!-- page start-->
                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel">
                            <header class="panel-heading">
                               پنجره‌ها
                            </header>
                            <div class="panel-body">     
                                <table class="table sliders">
                                    <form class="form-horizontal" role="form" method = "post" action="insert.php?kind_id=3&page=window.php"  enctype="multipart/form-data">
                                        
                                    <tbody style="display: flex; flex-direction: row;">   
                                        <tr>
                                            <td><div style="margin-right: 10px;"><span style=" color: red; font-size: 15px;">*</span>نوع پنجره‌ها</div></td>
                                            <td>                                                   
                                                <select name="TypeId" id="TypeId" class="form-control bound-s" style="margin-right: 10px; width: 200px; height: 40px;" required title="انتخاب مقداری از این فیلد الزامی است">
                                                      <option value="">بدون انتخاب</option>
                                                    <?php
                                                        $sql = "SELECT * FROM `types` WHERE KindId = 3";
	                                                    $all_Item = mysqli_query($conn,$sql);
                                                      while ( $Kind = mysqli_fetch_array(
                                                          $all_Item, MYSQLI_ASSOC ) ): ;
                                                      ?>
                                                      <option 
                                                              value="<?php echo $Kind["Id"];?>"> 
                                                                     <?php echo $Kind["Title"];?> 
                                                      </option>
                                                      <?php
                                                      endwhile;
                                                             
                                                      ?>
                                                   
                                                </select>
                                            </td>
                                        </tr>
                                        
                                        
                                           <div class="form-group">
                                            
                                            <td>  
                                               
                                                 <label class="col-lg-2 control-label" style="width: 6%; margin-right: 90px;">تصویر</label>
                                                <input type="file" class="file-pos" name="Picture" style="margin-right: 150px;">
                                            </td>
                                               <td> 
                                                <img id="uploaded-image" width="100" height="50" style="margin-right: -30px;" />
                                                
                                               </td>
                                                <script>
                                                    const inputFile = document.querySelector('input[name="Picture"]');
                                                    const imgTag = document.getElementById('uploaded-image');

                                                    inputFile.addEventListener('change', function(){
                                                        const file = this.files[0];
                                                        const reader = new FileReader();

                                                        reader.addEventListener("load", function () {
                                                            imgTag.src = reader.result;
                                                        }, false);

                                                        if (file) {
                                                            reader.readAsDataURL(file);
                                                        }
                                                    });
                                                </script>
                                                </div>
                                        
                                    </tbody>
                                </table> 
                                    
                    
                                            <div class="form-group">
                                        <label class="col-lg-2 control-label" style="width: 5%; margin-right: 1px;">توضیحات</label>
                                        <div class="col-lg-10">
                                            <textarea name="Discription" id="Discriptionid" class="form-control" cols="10" rows="5" style= "width: 967px; height: 108px;"></textarea> 
                                            </div>  
                                                 </div>
                                            <br>
                                                
                                            <div class="panel-body">
                                              <div class="form-group" style="text-align: left; padding-left: 60px;">
                                                <button name = "submit" type="submit" class="btn btn-success">ثبت</button>
                                              </div>
                                            </div>
                                        
                                   
                                    
                                    </form>
                                </table>        
                            </div>
                        </section>
                    
                                <section class="panel" style="padding-bottom: 30px" >
                            <header class="panel-heading">
                                لیست پنجره‌ها
                            </header>
                                     
                                                 <form class="form-horizontal" role="form" method="post" action="window.php" enctype="multipart/form-data">
                                                <table class="table sliders">
                                                            <tbody style="display: flex; flex-direction: row;">
                                                               
                                                              <tr>
                                                                <td><div style="margin-right: 30px;">نوع پنجره‌ها</div></td>
                                                                <td><select name="TypeId_Search" id="TypeId_Search" class="form-control bound-s" style="margin-right: 30px; width: 200px; height: 40px;">
                                                                    <option value="">بدون انتخاب</option>
                                                                   <?php
                                                            $sql = "SELECT * FROM `types` WHERE KindId = 3";
                                                            $all_Item = mysqli_query($conn, $sql);
                                                            while ($Kind = mysqli_fetch_array($all_Item, MYSQLI_ASSOC)):
                                                        ?>
                                                        <option value="<?php echo $Kind["Id"]; ?>"><?php echo $Kind["Title"]; ?></option>
                                                        <?php endwhile; ?>
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
                                        <th style="width: 8px;">
                                            </th>
                                        <th style="text-align: center;">ردیف</th>
                                        <th class="hidden-phone" style="text-align: center;">نوع</th>
                                        <th class="hidden-phone" style="text-align: center;">توضیحات</th>
                                        <th class="hidden-phone" style="text-align: center;">تصویر</th>
                                        <th class="hidden-phone" style="text-align: center;">عملیات</th>
                                        
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
                                            $sql = "SELECT product.Id as Id, types.Title as Type, product.Discription as Discription, product.Picture , typeskind.Type as TypesKind FROM product
                                                    JOIn typeskind ON typeskind.Id = product.TypesKind
                                                    JOIN types ON types.Id = product.TypId
                                                    WHERE product.KindId =3 AND (product.TypId = '$TypeId_Search')";
                                        }
                                        else
                                        {
                                            $sql = "SELECT product.Id as Id, types.Title as Type, product.Discription as Discription, product.Picture , typeskind.Type as TypesKind FROM product 
                                                    JOIn typeskind ON typeskind.Id = product.TypesKind
                                                    JOIN types ON types.Id = product.TypId
                                                    WHERE product.KindId =3";
                                        }
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
                                        <td >
                                            <a href='edit.php?id=<?= $rows['Id'];?>&page=window.php&kind_id=3'>
                                          <button class="btn btn-primary btn-xs"><i class="icon-pencil"></i></button>
                                            </a>
                                            
                                                <a href='delete.php?id=<?= $rows['Id'];?>&page=window.php'>
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
