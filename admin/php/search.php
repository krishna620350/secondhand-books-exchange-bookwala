<?php
include "config.php";
$id = $_POST['id'];
$output = "";
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
    $select = "select * from admin where admin_id = '{$GLOBALS['id']}'";
    $query = mysqli_query($GLOBALS['conn'], $select) or die(mysqli_error($GLOBALS['conn']) . "view error");
    if(mysqli_num_rows($query)>0){
        $row = mysqli_fetch_assoc($query);
        $GLOBALS['output'] .= "<h3>View-Admin-info-of-id-({$GLOBALS['id']})</h3>
                        <table>
                            <tbody>
                                <tr>
                                    <td>Admin Id :- </td>
                                    <td>{$row['admin_id']}</td>
                                </tr>
                                <tr>
                                    <td>Admin First Name :- </td>
                                    <td>{$row['admin_first_name']}</td>
                                </tr>
                                <tr>
                                    <td>Admin Last Name :- </td>
                                    <td>{$row['admin_last_name']}</td>
                                </tr>
                                <tr>
                                    <td>Admin Email Id :- </td>
                                    <td>{$row['admin_email']}</td>
                                </tr>
                                <tr>
                                    <td>Admin Phone Number :- </td>
                                    <td>{$row['admin_phone']}</td>
                                </tr>
                                <tr>
                                    <td>Admin Country :- </td>
                                    <td>{$row['admin_country']}</td>
                                </tr>
                                <tr>
                                    <td>Admin Date Of Birth :- </td>
                                    <td>{$row['admin_date_of_birth']}</td>
                                </tr>
                                <tr>
                                    <td>Admin Degination :- </td>
                                    <td>{$row['admin_degination']}</td>
                                </tr>
                                <tr>
                                    <td>AdminVerifyed :- </td>
                                    <td>{$row['admin_verifyed']}</td>
                                </tr>
                                <tr>
                                    <td>Buttons</td>
                                    <td><button id='sedit' data-eid='{$GLOBALS['id']}'>Edit</button>
                                        <button id='sdelete' data-did='{$GLOBALS['id']}'>Delete</button>
                                    </td>
                                </tr>";
    }else{
        $GLOBALS['output'] .="No record found of id ({$GLOBALS['id']})";
    }
}
function customer()
{
    $select = "select * from customber where customer_id = '{$GLOBALS['id']}'";
    $query = mysqli_query($GLOBALS['conn'], $select) or die(mysqli_error($GLOBALS['conn']) . "view error");
    if(mysqli_num_rows($query)>0){
        $row = mysqli_fetch_assoc($query);
        $GLOBALS['output'] .= "<h3>View-Customer-info-of-id-({$GLOBALS['id']})</h3>
                    <table>
                        <tbody>
                        <tr>
                    <td>Customer Id :- </td>
                    <td>{$row['customer_id']}</td>
                </tr>
                <tr>
                    <td>Customer First Name :- </td>
                    <td>{$row['customer_first_name']}</td>
                </tr>
                <tr>
                    <td>Customer Last Name :- </td>
                    <td>{$row['customer_last_name']}</td>
                </tr>
                <tr>
                    <td>Customer Email Id :- </td>
                    <td>{$row['customer_email']}</td>
                </tr>
                <tr>
                    <td>Customer Phone Number :- </td>
                    <td>{$row['customer_phone']}</td>
                </tr>
                <tr>
                    <td>Customer Country :- </td>
                    <td>{$row['customer_country']}</td>
                </tr>
                <tr>
                    <td>Customer State :- </td>
                    <td>{$row['customer_state']}</td>
                </tr>
                <tr>
                    <td>Customer City :- </td>
                    <td>{$row['customer_city']}</td>
                </tr>
                <tr>
                    <td>Customer Local Address :- </td>
                    <td>{$row['customer_address']}</td>
                </tr>
                <tr>
                    <td>Customer PIN :- </td>
                    <td>{$row['customer_pin']}</td>
                </tr>
                <tr>
                    <td>Verified :- </td>
                    <td>{$row['customer_verifyed']}</td>
                </tr>
                <tr>
                    <td>Buttons</td>
                    <td><button id='sedit' data-eid='{$GLOBALS['id']}'>Edit</button>
                        <button id='sdelete' data-did='{$GLOBALS['id']}'>Delete</button>
                    </td>
                </tr>";
    } else {
        $GLOBALS['output'] .= "No record found of id ({$GLOBALS['id']})";
    }
}
function store()
{
    $select = "select * from store where book_id = '{$GLOBALS['id']}'";
    $query = mysqli_query($GLOBALS['conn'], $select) or die(mysqli_error($GLOBALS['conn']) . "view error");
    if(mysqli_num_rows($query)>0){
        $row = mysqli_fetch_assoc($query);
        $GLOBALS['output'] .= "<h3>View-Book-info-of-id-({$GLOBALS['id']})</h3>
                        <table>
                            <tbody>
                            <tr>
                        <td>Book Id :- </td>
                        <td>{$row['book_id']}</td>
                    </tr>
                    <tr>
                        <td>Book Title :- </td>
                        <td>{$row['book_title']}</td>
                    </tr>
                    <tr>
                        <td>Book Author :- </td>
                        <td>{$row['book_author']}</td>
                    </tr>
                    <tr>
                        <td>Book Description :- </td>
                        <td>{$row['book_description']}</td>
                    </tr>
                    <tr>
                        <td>Book Publisher :- </td>
                        <td>{$row['book_publisher']}</td>
                    </tr>
                    <tr>
                        <td>Book Edition :- </td>
                        <td>{$row['book_edition']}</td>
                    </tr>
                    <tr>
                        <td>Book Total Page :- </td>
                        <td>{$row['book_pages']}</td>
                    </tr>
                    <tr>
                        <td>Book Category :- </td>
                        <td>{$row['book_category']}</td>
                    </tr>
                    <tr>
                        <td>Book Sub Category :- </td>
                        <td>{$row['book_subcategory']}</td>
                    </tr>
                    <tr>
                        <td>Book Subject Name :- </td>
                        <td>{$row['book_subject_name']}</td>
                    </tr>
                    <tr>
                        <td>Book MRP :- </td>
                        <td>{$row['book_MRP']}</td>
                    </tr>
                    <tr>
                        <td>Book Cost Price :- </td>
                        <td>{$row['book_cost_price']}</td>
                    </tr>
                    <tr>
                        <td>Book Sell Price :- </td>
                        <td>{$row['book_sell_price']}</td>
                    </tr>
                    <tr>";
        $GLOBALS['output'] .= "<td>Book Images :- </td>
                            <td><table>
                                <thead>
                                    <th>Front</th>
                                    <th>Back</th>
                                    <th>MRP</th>
                                    <th>Edition</th>
                                    <th>Middle</th>
                                </thead>";
        $select1 = "select * from book_image where folder_name = '{$row['book_image']}'";
        $queary1 = mysqli_query($GLOBALS['conn'], $select1) or die(mysqli_error($GLOBALS['conn']) . "image error");
        if (mysqli_num_rows($queary1) > 0) {
            while ($row1 = mysqli_fetch_assoc($queary1)) {
                $GLOBALS['output'] .= "<tr>
                                    <td><img src='../upload/{$row['book_image']}/{$row1['image_front']}' width = 200px></td>
                                    <td><img src='../upload/{$row['book_image']}/{$row1['image_back']}' width = 200px></td>
                                    <td><img src='../upload/{$row['book_image']}/{$row1['image_mrp']}' width = 200px></td>
                                    <td><img src='../upload/{$row['book_image']}/{$row1['image_edition']}' width = 200px></td>
                                    <td><img src='../upload/{$row['book_image']}/{$row1['image_middle']}' width = 200px></td>
                                </tr>";
            }
        }
        $GLOBALS['output'] .= "</table></td>
                        </tr>
                        <tr>
                    <td>Buttons</td>
                    <td><button id='sedit' data-eid='{$GLOBALS['id']}'>Edit</button>
                        <button id='sdelete' data-did='{$GLOBALS['id']}'>Delete</button>
                    </td>
                </tr>";
    } else {
        $GLOBALS['output'] .= "No record found of id ({$GLOBALS['id']})";
    }
}
function order()
{
    $select = "select * from order_manage where order_id = '{$GLOBALS['id']}'";
    $query = mysqli_query($GLOBALS['conn'], $select) or die(mysqli_error($GLOBALS['conn']) . "view error");
    if(mysqli_num_rows($query)>0){
        $row = mysqli_fetch_assoc($query);
        $GLOBALS['output'] .=   "<h3>View-Order-info-of-id-({$GLOBALS['id']})</h3>
                            <table>
                                <tbody>
                                <tr>
                                        <td>Order Id :- </td>
                                        <td>{$row['order_id']}</td>
                                    </tr>
                                    <tr>
                                        <td>Customer Id :- </td>
                                        <td>{$row['customer_id']}</td>
                                    </tr>
                                    <tr>
                                        <td>Dilevery Address :- </td>
                                        <td>{$row['dilevery_address']}</td>
                                    </tr>
                                    <tr>
                                        <td>Date Of Order :- </td>
                                        <td>{$row['date_of_order']}</td>
                                    </tr>
                                    <tr>
                                        <td>Date Of Delivery :- </td>
                                        <td>{$row['date_of_delivery']}</td>
                                    </tr>
                                    <tr>
                                        <td>Order Price :- </td>
                                        <td>{$row['price']}</td>
                                    </tr>
                                    <tr>
                                        <td>Order Ststus :- </td>
                                        <td>{$row['status']}</td>
                                    </tr>
                                    <tr>
                    <td>Buttons</td>
                    <td><button id='sedit' data-eid='{$GLOBALS['id']}'>Edit</button>
                        <button id='sdelete' data-did='{$GLOBALS['id']}'>Delete</button>
                    </td>
                </tr>";
    } else {
        $GLOBALS['output'] .= "No record found of id ({$GLOBALS['id']})";
    }
}
$output .= "</tbody></table>";
echo $output;
?>
