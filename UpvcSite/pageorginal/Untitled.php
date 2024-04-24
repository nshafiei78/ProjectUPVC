<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
     <?php
    
    $servername='localhost';
    $username='root';
    $password='';
    $dbname = "upvc";
    $conn=mysqli_connect($servername,$username,$password,"$dbname");
      if(!$conn){
          die('Could not Connect MySql Server:' .mysql_error());
        }
                                   
                                
                                    $Title = [];
                                    $Picture = [];
                                    $Discription = [];
                                    $sql=mysqli_query($conn,"SELECT CONCAT(projects.FirstName, ' ', projects.LastName ) as Name, pictursprojects.Pictures as Picture FROM `projects` 
                                                 JOIN pictursprojects ON pictursprojects.ProjectId=projects.Id");
									
									while($row=mysqli_fetch_array($sql))
									{ 
                                        $Name[] = $row["Name"];
                                        $Picture[]= $row["Picture"];
                                      
									}
    
                        $FileProject= "";
                        $sql=mysqli_query($conn,"select Discriptions from projects WHERE Id=49");
                        $i=0;
                        while($row=mysqli_fetch_array($sql))
                        {  
                            
                            $FileProject= $row["Discriptions"];
                        }
                            
                                   ?>
    <?php


                            $newStringPicture = str_replace("./", "", $FileProject);
                            $string="../../ProjectUPVC/adminpanel/projects/".$newStringPicture;
                            echo $string;
    
    ?>
</body>
</html>