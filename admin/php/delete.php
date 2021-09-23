<?php
    include "config.php";
    $id = $_POST['id'];
    $choice = substr($id, 0, 1);
    switch ($choice) {
        case 'a' : admin();
            break;
        case 'c' : customer ();
            break;
        case 'b' : store();
            break;
        case 'o' : order();
            break;
    }
    function admin() {
        $delete = "delete from admin where admin_id = '{$GLOBALS['id']}'";
        mysqli_query($GLOBALS['conn'], $delete) or die(mysqli_error($GLOBALS['conn']) . "delete error");
    }
    function customer () {
        $delete = "delete from customber where customer_id = '{$GLOBALS['id']}'";
        mysqli_query($GLOBALS['conn'],$delete) or die(mysqli_error($GLOBALS['conn'])."delete error");
    }
    function store(){
        $select = "select book_image from store where book_id = '{$GLOBALS['id']}'";
        $query = mysqli_query($GLOBALS['conn'],$select) or die(mysqli_error($GLOBALS['conn'])."store error");
        $row = mysqli_fetch_assoc($query);
        $row1 = mysqli_fetch_assoc(mysqli_query($GLOBALS['conn'],"select * from book_image where folder_name = '{$row['book_image']}'"));
        unlink("../../upload/".$row['book_image']."/".$row1['image_front']);
        unlink("../../upload/".$row['book_image']."/".$row1['image_back']);
        unlink("../../upload/".$row['book_image']."/".$row1['image_mrp']);
        unlink("../../upload/".$row['book_image']."/".$row1['image_edition']);
        unlink("../../upload/".$row['book_image']."/".$row1['image_middle']);
        rmdir("../../upload/".$row['book_image']);
        mysqli_query($GLOBALS['conn'], "delete from book_image where folder_name = '{$row['book_image']}'") or die(mysqli_error($GLOBALS['conn']));
        mysqli_query($GLOBALS['conn'],"delete from store where book_id = '{$GLOBALS['id']}'") or die(mysqli_error($GLOBALS['conn']));
    }
    function order() {
        mysqli_query($GLOBALS['conn'],"delete from order_manage where order_id = '{$GLOBALS['id']}'") or die(mysqli_error($GLOBALS['conn'])."delete order error");
    }
?>