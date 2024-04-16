
<?php
    include( "../../functions/connect.php" );
    if (isset($_POST['search_btn'])) {
    $TypeId_Search = $_POST['TypeId_Search'];
        echo($TypeId_Search);
    // اجرای کوئری سرچ با توجه به TypeId
    $sql = "SELECT product.Id as Id, types.Title as Type, product.Discription as Discription, product.Picture FROM product 
            JOIN types ON types.Id = product.TypId
            WHERE product.KindId = 1 AND product.TypId = '$TypeId_Search'";

    $result = mysqli_query($conn, $sql);

    // نمایش نتایج در جدول
    while ($rows = $result->fetch_assoc()) {
        echo '<tr class="odd gradeX">';
        echo '<td></td>';
        echo '<td>'.$id.'</td>';
        echo '<td class="hidden-phone">'.$rows['Type'].'</td>';
        echo '<td class="hidden-phone">'.$rows['Discription'].'</td>';
        echo '<td class="center hidden-phone"><img src="'.$rows['Picture'].'" width="100" height="50"/></td>';
        echo '<td>';
        echo '<a href="updatedoor.php?id='.$rows['Id'].'">';
        echo '<button class="btn btn-primary btn-xs"><i class="icon-pencil"></i></button>';
        echo '</a>';
        echo '<a href="deletedoor.php?id='.$rows['Id'].'">';
        echo '<button class="btn btn-danger btn-xs"><i class="icon-trash"></i></button>';
        echo '</a>';
        echo '</td>';
        echo '</tr>';

        ++$id;
    }
         
    mysqli_close($conn);
}
    ?>