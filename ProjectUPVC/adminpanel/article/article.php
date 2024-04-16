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
<title>مقالات</title>

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
@includepage( "../inc_template/menuarticles" );
?>
<section id="main-content">
  <section class="wrapper"> 
    <!-- page start-->
    <div class="row">
    <div class="col-lg-12">
    <section class="panel">
      <header class="panel-heading">مقالات</header>
      <div class="panel-body">
        <table class="table sliders">
          <form class="form-horizontal" role="form" method = "post" action="insert.php?page=article.php"  enctype="multipart/form-data">
          
          <tbody style="display: flex; flex-direction: row;">
           <tr>
              <td><div class="form-group" >
                     <td><div style="margin-right: 10px;"><span style=" color: red; font-size: 15px;">*</span>نام مقاله</div></td>
                  <td><div class="col-lg-10">
                      <div class="row">
                        <div class="col-lg-2" style="width: 220px; height: 80px;">
                          <input type="text" name="NameArticle" id="NameArticleId" class="form-control"  required title="پر کردن این فیلد الزامی است. ">
                        </div>
                      </div>
                    </div>
                  </td>
               </tr>
              <tr>
              <td><div style="margin-right: 20px;"><span style=" color: red; font-size: 15px;">*</span>نوع محصولات</div></td>
              <td><select name="TypeProduct" id="TypeProductId" class="form-control bound-s" style="margin-right: 30px; width: 200px; height: 40px;" required title="انتخاب مقداری از این فیلد الزامی است.">
                  <option value="">بدون انتخاب</option>
                  <?php
                  $sql = "SELECT * FROM `kind`";
                  $all_Item = mysqli_query( $conn, $sql );
                  while ( $Kind = mysqli_fetch_array(
                      $all_Item, MYSQLI_ASSOC ) ): ;
                  ?>
                  <option 
                    value="<?php echo $Kind["Id"];?>"> <?php echo $Kind["Name"];?> </option>
                  <?php
                  
                  endwhile;

                  ?>
                </select></td>
            </tr>
              
              
              
               <div class="form-group">
                                            
            <td>  
                <div class="col-lg-2" style="margin-right: 90px;">فایل مقاله</div>
                <input type="file" class="file-pos" name="ArticleFile" style="margin-right: 180px;">
                
            </td>
                  
                </div>
                  
        
          </tbody>
          
        </table>
          
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
      <header class="panel-heading"> لیست مقالات </header>
      <form class="form-horizontal" role="form" method="post" action="article.php" enctype="multipart/form-data">
        <table class="table sliders">
            <tbody style="display: flex; flex-direction: row;">
             <tr>
              <td><div class="form-group" >
                     <td><div style="margin-right: 20px;">نام مقاله</div></td>
                  <td><div class="col-lg-10">
                      <div class="row">
                        <div class="col-lg-2" style="width: 220px; height: 80px;">
                          <input type="text" name="NameArticle_Search" id="NameArticleId_Search" class="form-control">
                        </div>
                      </div>
                    </div>
                  </td>
               </tr>
                <tr>
                <td><div style="margin-right: 30px;">نوع محصولات</div></td>
                <td><select name="TypeProduct_Search" id="TypeProductId_Search" class="form-control bound-s" style="margin-right: 30px; width: 200px; height: 40px;">
                    <option value="">بدون انتخاب</option>
                   <?php
                        $sql = "SELECT * FROM `kind`";
                       $all_Item = mysqli_query( $conn, $sql );
                        while ( $Kind = mysqli_fetch_array( $all_Item, MYSQLI_ASSOC ) ):
                          ?>
                        <option value="<?php echo $Kind["Id"]; ?>"><?php echo $Kind["Name"]; ?></option>
                        <?php endwhile; ?>
                  </select></td>
              </tr>
            </tbody>
            </table>
            <div class="form-group">
             <div style="margin-top: -90px; margin-right:85%;display: flex;">
                <button type="submit" name="search_btn" class="btn btn-success" style="margin-left: 10px;">جست‌وجو</button>
                <button type="submit" name="clear_btn" class="btn btn-success" style="margin-left: 600px;">بازگشت</button>
              </div>
                
            </div>
      </form>
      <table class="table table-striped border-top" id="sample_1 " style="text-align: center; margin-top: 50px;">
        <thead>
          <tr style="text-align: center;">
            <th style="width: 8px;"> </th>
            <th style="text-align: center;">ردیف</th>
            <th class="hidden-phone" style="text-align: center;">نام</th>
            <th class="hidden-phone" style="text-align: center;">نوع محصولات</th>
            <th class="hidden-phone" style="text-align: center;">تاریخ</th>
            <th class="hidden-phone" style="text-align: center;">تعداد بازدید</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if ( isset( $_POST[ 'search_btn' ] ) ) {
            $TypeProduct_Search = $_POST[ 'TypeProduct_Search' ];
            $NameArticle_Search = $_POST[ 'NameArticle_Search' ];

          } elseif ( isset( $_POST[ 'clear_btn' ] ) ) {
            $TypeProduct_Search = null;
            $NameArticle_Search = null;
          }
          else {
            $TypeProduct_Search = null;
            $NameArticle_Search = null;
          }
			$where_query = " WHERE 1=1 ";
			
          if ( $TypeProduct_Search != null) 
		  {
			  $where_query .= " and KindId= '$TypeProduct_Search'";
		  }
			
		  if( $NameArticle_Search != null) 
		  {
             $where_query .= " and  articles.`Name` LIKE '%$NameArticle_Search%'";
          }
		$sql = "SELECT articles.Id as Id , articles.`Name` as NameArticle, kind.`Name` as Kind, articles.KindId as KindId,
				articles.DateUpload as Date,articles.`View` as View  FROM `articles`
				JOIN kind ON kind.Id=articles.KindId" . $where_query;
          
          $result = mysqli_query( $conn, $sql );
          $i = 1;
          while ( $rows = $result->fetch_assoc() ) {
            ?>
          <tr class="odd gradeX">
            <td></td>
            <td><?=$i;?></td>
            <td class="hidden-phone"><?=$rows['NameArticle'];?></td>
            <td class="hidden-phone"><?=$rows['Kind'];?></td>
            <td class="hidden-phone"><?=$rows['Date'];?></td>
            <td class="hidden-phone"><?=$rows['View'];?></td>
            <td >
                <a href='edit.php?id=<?= $rows['Id']; ?>&page=article.php'>
                  <button class="btn btn-primary btn-xs"><i class="icon-pencil"></i></button>
                </a>
                <a href='delete.php?id=<?= $rows['Id'];?>&page=article.php'>
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
