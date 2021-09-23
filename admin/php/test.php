<?php
    include "config.php";
    $image_name = array();
    $qurary = mysqli_query($conn,"show columns from book_image");
    while ($row_image = mysqli_fetch_array($qurary)) {
    if ($row_image['Field'] == 'image_id' or $row_image['Field'] == 'folder_name') {
        continue;
    } else {
        $image_name[] = $row_image['Field'];
    }
}
 print_r($image_name);
?>