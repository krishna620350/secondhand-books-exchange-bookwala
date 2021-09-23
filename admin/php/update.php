<?php
include "config.php";
$id = $_POST['id'];
$choice = substr($id, 0, 1);
switch ($choice) {
    case 'a':
        admin();
        break;
    case 'c':
        customer();
        break;
    case 'b':
        store();
        break;
    case 'o':
        order();
        break;
}
function admin()
{
    $afname = mysqli_real_escape_string($GLOBALS['conn'], $_POST['afname']);
    $alname = mysqli_real_escape_string($GLOBALS['conn'], $_POST['alname']);
    $aemail = mysqli_real_escape_string($GLOBALS['conn'], $_POST['aemail']);
    $aphone = mysqli_real_escape_string($GLOBALS['conn'], $_POST['aphone']);
    $acountry = mysqli_real_escape_string($GLOBALS['conn'], $_POST['acountry']);
    $adob = mysqli_real_escape_string($GLOBALS['conn'], $_POST['adob']);
    $adeg = mysqli_real_escape_string($GLOBALS['conn'], $_POST['adeg']);

    $update = "update admin set admin_first_name = '{$afname}',admin_last_name = '{$alname}',admin_email = '{$aemail}',admin_phone = '{$aphone}',admin_country = '{$acountry}', admin_date_of_birth = '{$adob}', admin_degination = '{$adeg}' where admin_id = '{$GLOBALS['id']}'";

    mysqli_query($GLOBALS['conn'], $update) or die(mysqli_error($GLOBALS['conn']) . "update error");
}
function customer()
{
    $cfname = mysqli_real_escape_string($GLOBALS['conn'], $_POST['cfname']);
    $clname = mysqli_real_escape_string($GLOBALS['conn'], $_POST['clname']);
    $cemail = mysqli_real_escape_string($GLOBALS['conn'], $_POST['cemail']);
    $cphone = mysqli_real_escape_string($GLOBALS['conn'], $_POST['cphone']);
    $ccountry = mysqli_real_escape_string($GLOBALS['conn'], $_POST['ccountry']);
    $cstate = mysqli_real_escape_string($GLOBALS['conn'], $_POST['cstate']);
    $ccity = mysqli_real_escape_string($GLOBALS['conn'], $_POST['ccity']);
    $caddress = mysqli_real_escape_string($GLOBALS['conn'], $_POST['caddress']);
    $cpin = mysqli_real_escape_string($GLOBALS['conn'], $_POST['cpin']);

    $update = "update customber set customer_first_name = '{$cfname}',customer_last_name = '{$clname}',customer_email = '{$cemail}',customer_phone = '{$cphone}',customer_country = '{$ccountry}',customer_state = '{$cstate}',customer_city = '{$ccity}', customer_address = '{$caddress}', customer_pin = '{$cpin}' where customer_id = '{$GLOBALS['id']}'";

    mysqli_query($GLOBALS['conn'], $update) or die(mysqli_error($GLOBALS['conn']) . "update error");
}
function store()
{
    $btitle = $_POST['btitle'];
    $bauthor = $_POST['bauthor'];
    $bdesc = $_POST['bdesc'];
    $bpublisher = $_POST['bpublisher'];
    $bedition = $_POST['bedition'];
    $bpage = $_POST['bpage'];
    $category = $_POST['category'];
    $subcategory = $_POST['subcategory'];
    $subbook = $_POST['subbook'];
    $bmrp = $_POST['bmrp'];
    $bcost = $_POST['bcost'];
    $bsell = $_POST['bsell'];

    $select = "select book_image from store where book_id = '{$GLOBALS['id']}'";
    $queary = mysqli_query($GLOBALS['conn'], $select) or die(mysqli_error($GLOBALS['conn']));
    $row = mysqli_fetch_assoc($queary);

    $select1 = "select * from book_image where folder_name = '{$row['book_image']}'";
    $queary1 = mysqli_query($GLOBALS['conn'], $select1) or die(mysqli_error($GLOBALS['conn']));
    $row1 = mysqli_fetch_array($queary1);
    
    $book_image = array($_FILES['bfront'], $_FILES['bback'], $_FILES['bmrpi'], $_FILES['beditioni'], $_FILES['bmid']);

    $image = array('front', 'back', 'mrp', 'edition', 'middle');
    $image_coll = array();
    $query_image = mysqli_query($GLOBALS['conn'], "SHOW COLUMNS FROM book_image") or die(mysqli_error($GLOBALS['conn']));
    while ($row_image = mysqli_fetch_array($query_image)) {
        if($row_image['Field'] == 'image_id' or $row_image['Field'] == 'folder_name'){
            continue;
        }else{
            $image_coll[] = $row_image['Field'];
        }
    }
    $error = array();
    $extension = array("jpeg", "jpg", "png");
    for ($i = 0; $i < 5; $i++) {
        if (isset($book_image[$i]['name'])) {
            $file_name = $book_image[$i]['name'];
            $file_size = $book_image[$i]['size'];
            $file_temp = $book_image[$i]['tmp_name'];
            $file_type = $book_image[$i]['type'];

            $file_ext = end(explode('.', $file_name));

            if (in_array($file_ext, $extension) === false) {
                $error[] = "this extension file is not allowed , plese choose jpg or png image";
            }
            if ($file_size > 5242880) {
                $error[] = "file size must be less than 2MB";
            }
            if (is_dir("../../upload/" . $row1['folder_name'])) {
                $new_name = time() . "-" . $image[$i] . "-" . basename($file_name);
                $target = "../../upload/" . $row1['folder_name'] . "/" . $new_name;
                $image_name = $new_name;
                if (empty($error) == true) {
                    unlink("../../upload/" . $row1['folder_name'] . "/" . $row1[$i+2]);
                    move_uploaded_file($file_temp, $target);

                    mysqli_query($GLOBALS['conn'], "update book_image set ". $image_coll[$i] . " = '{$image_name}' where folder_name = '{$row1['folder_name']}'") or die(mysqli_error($GLOBALS['conn']));
                } else {
                    print_r($error);
                    unset($error);
                }
            } else {
                echo "file not found";
            }
        }
    }

    $select2 = "update store set book_title = '{$btitle}', book_author = '{$bauthor}', book_description = '{$bdesc}', book_publisher = '{$bpublisher}', book_edition = {$bedition}, book_pages = {$bpage}, book_category = {$category},book_subcategory = {$subcategory}, book_subject_name = {$subbook}, book_MRP = {$bmrp}, book_cost_price = {$bcost}, book_sell_price = {$bsell} where book_id = '{$GLOBALS['id']}'";

    mysqli_query($GLOBALS['conn'], $select2) or die(mysqli_error($GLOBALS['conn']));
}
function order()
{
    mysqli_query($GLOBALS['conn'], "update order_manage set dilevery_address='{$_POST['delivery']}',date_of_delivery = '{$_POST['dodelivery']}',status = '{$_POST['status']}' where order_id = '{$GLOBALS['id']}'") or die(mysqli_error($GLOBALS['conn']) . 'update error');
}
?>