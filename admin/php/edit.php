<?php
    include "config.php";
    $id = $_POST['id'];
    $output = "";
    $choice = substr($id, 0, 1);
    switch ($choice) {
        case 'a' : admin();
            break;
        case 'c' : customer();
            break;
        case 'b' : store();
            break;
        case 'o' : order();
            break;
    }
    function admin(){
        $GLOBALS['output'] .= "<h3>Edit-Admin-Data</h3>";
        $select = "select * from admin where admin_id = '{$GLOBALS['id']}'";
        $query = mysqli_query($GLOBALS['conn'], $select) or die(mysqli_error($GLOBALS['conn']) . "edit error");
        $row = mysqli_fetch_assoc($query);
        $GLOBALS['output'] .= "<form>
                                                <table><tbody>
                                                    <tr hidden>
                                                        <td><input type='text' id='aid' value='{$row['admin_id']}'></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Admin First Name</td>
                                                        <td><input type='text' id='afname' value='{$row['admin_first_name']}'></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Admin last Name</td>
                                                        <td><input type='text' id='alname' value='{$row['admin_last_name']}'></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Admin Email Id</td>
                                                        <td><input type='email' id='aemail' value='{$row['admin_email']}'></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Admin Phone Number</td>
                                                        <td><input type='phone' id='aphone' value='{$row['admin_phone']}'></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Admin Country</td>
                                                        <td><input type='text' id='acountry' value='{$row['admin_country']}'></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Admin Date Of Birth </td>
                                                        <td><input type='text' id='adob' value='{$row['admin_date_of_birth']}'></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Admin Degination</td>
                                                        <td><input type='text' id='adeg' value='{$row['admin_degination']}'></td>
                                                    </tr>
                                                </tbody></table>
                                                <div><button id='asubmit'>Update</button></div>
                                            </form>";
    }
    function customer() {
        $GLOBALS['output'] .= "<h3>Edit-Customer-Data</h3>";
        $select = "select * from customber where customer_id = '{$GLOBALS['id']}'";
        $query = mysqli_query($GLOBALS['conn'],$select) or die(mysqli_error($GLOBALS['conn'])."edit error");
        $row = mysqli_fetch_assoc($query);
        $GLOBALS['output'] .= "<form>
                                            <table><tbody>
                                                <tr  hidden>
                                                    <td><input type='text' id='cid' value='{$row['customer_id']}'></td>
                                                </tr>
                                                <tr>
                                                    <td>Customer First Name</td>
                                                    <td><input type='text' id='cfname' value='{$row['customer_first_name']}'></td>
                                                </tr>
                                                <tr>
                                                    <td>Customer last Name</td>
                                                    <td><input type='text' id='clname' value='{$row['customer_last_name']}'></td>
                                                </tr>
                                                <tr>
                                                    <td>Customer Email Id</td>
                                                    <td><input type='email' id='cemail' value='{$row['customer_email']}'></td>
                                                </tr>
                                                <tr>
                                                    <td>Customer Phone Number</td>
                                                    <td><input type='phone' id='cphone' value='{$row['customer_phone']}'></td>
                                                </tr>
                                                <tr>
                                                    <td>Customer Country</td>
                                                    <td><input type='text' id='ccountry' value='{$row['customer_country']}'></td>
                                                </tr>
                                                <tr>
                                                    <td>Customer State</td>
                                                    <td><input type='text' id='cstate' value='{$row['customer_state']}'></td>
                                                </tr>
                                                <tr>
                                                    <td>Customer City</td>
                                                    <td><input type='text' id='ccity' value='{$row['customer_city']}'></td>
                                                </tr>
                                                <tr>
                                                    <td>Customer Local Address</td>
                                                    <td><input type='text' id='caddress' value='{$row['customer_address']}'></td>
                                                </tr>
                                                <tr>
                                                    <td>Customer PIN</td>
                                                    <td><input type='text' id='cpin' value='{$row['customer_pin']}'></td>
                                                </tr>
                                            </tbody></table>
                                            <div><button id='csubmit'>Submit</button></div>
                                        </form>";
    }
    function store() {
        $GLOBALS['output'] .= "<h3>Edit-Book-Data</h3>
                        <form id='update-book'>
                            <table>
                                <tbody>";
        $select = "select * from store where book_id = '{$GLOBALS['id']}'";
        $query = mysqli_query($GLOBALS['conn'], $select) or die(mysqli_error($GLOBALS['conn']) . "view error");
        $row = mysqli_fetch_assoc($query);
        $GLOBALS['output'] .= "<tr  hidden>
                                    <td><input type='text' name='id' value='{$row['book_id']}'></td>
                                </tr>
                                <tr>
                                    <td>Book Title :- </td>
                                    <td><input type='text' name='btitle' value='{$row['book_title']}' required></td>
                                </tr>
                                <tr>
                                    <td>Book Author :- </td>
                                    <td><input type='text' name='bauthor' value='{$row['book_author']}' required></td>
                                </tr>
                                <tr>
                                    <td>Book Description :- </td>
                                    <td><textarea type='text' name='bdesc' required>{$row['book_description']}</textarea></td>
                                </tr>
                                <tr>
                                    <td>Book Publisher :- </td>
                                    <td><input type='text' name='bpublisher' value='{$row['book_publisher']}' required></td>
                                </tr>
                                <tr>
                                    <td>Book Edition :- </td>
                                    <td><input type='number' name='bedition' value='{$row['book_edition']}' required></td>
                                </tr>
                                <tr>
                                    <td>Book Total Page :- </td>
                                    <td><input type='number' name='bpage' value='{$row['book_pages']}' required></td>
                                </tr>
                                <tr>
                                    <td>Book Category :- </td>
                                    <td><select name='category' required></>";
                $select = "select * from category";
                $queary = mysqli_query($GLOBALS['conn'],$select) or die(mysqli_error($GLOBALS['conn'])."category error");
                if(mysqli_num_rows($queary)>0){
                    while($row1 = mysqli_fetch_assoc($queary)){
                        if($row['book_category'] == $row1['category_id'])
                            $GLOBALS['output'] .= "<option value='{$row1['category_id']}' selected>{$row1['category_name']}</option>";
                        else
                            $GLOBALS['output'] .= "<option value='{$row1['category_id']}'>{$row1['category_name']}</option>";
                    }
                }
                $GLOBALS['output'] .= "</select></td>
                                        </tr>
                                        <tr>
                                            <td>Book Sub Category :- </td>
                                            <td><select name='subcategory' required>";
                $select = "select * from subcategory";
                $queary = mysqli_query($GLOBALS['conn'], $select) or die(mysqli_error($GLOBALS['conn']) . "subcategory error");
                if (mysqli_num_rows($queary) > 0) {
                    while ($row1 = mysqli_fetch_assoc($queary)) {
                        if ($row['book_subcategory'] == $row1['subcategory_id'])
                        $GLOBALS['output'] .= "<option value='{$row1['subcategory_id']}' selected>{$row1['subcategory_name']}</option>";
                        else
                            $GLOBALS['output'] .= "<option value='{$row1['subcategory_id']}'>{$row1['subcategory_name']}</option>";
                    }
                }
                $GLOBALS['output'] .= "</select></td>
                                </tr>
                                <tr>
                                    <td>Book Subject Name :- </td>
                                    <td><select name='subbook' required>";
                $select = "select * from subject_book";
                $queary = mysqli_query($GLOBALS['conn'], $select) or die(mysqli_error($GLOBALS['conn']) . "category error");
                if (mysqli_num_rows($queary) > 0) {
                    while ($row1 = mysqli_fetch_assoc($queary)) {
                        if ($row['book_subject_name'] == $row1['sub_book_id'])
                            $GLOBALS['output'] .= "<option value='{$row1['sub_book_id']}' selected>{$row1['sub_book_name']}</option>";
                        else
                            $GLOBALS['output'] .= "<option value='{$row1['sub_book_id']}'>{$row1['sub_book_name']}</option>";
                    }
                }
                $GLOBALS['output'] .= "</select></td>
                                </tr>
                                <tr>
                                    <td>Book MRP :- </td>
                                    <td><input type='number' name='bmrp' value='{$row['book_MRP']}' required></td>
                                </tr>
                                <tr>
                                    <td>Book Cost Price :- </td>
                                    <td><input type='number' name='bcost' value='{$row['book_cost_price']}' required></td>
                                </tr>
                                <tr>
                                    <td>Book Sell Price :- </td>
                                    <td><input type='number' name='bsell' value='{$row['book_sell_price']}' required></td>
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
                $row1 = mysqli_fetch_assoc($queary1);
                $GLOBALS['output'] .= "<tr>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td><input type='file' name='bfront'></td>
                                                    </tr>
                                                    <tr>
                                                        <td><img src='../upload/{$row['book_image']}/{$row1['image_front']}' width = 200px></td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td><input type='file' name='bback'></td>
                                                    </tr>
                                                    <tr>
                                                        <td><img src='../upload/{$row['book_image']}/{$row1['image_back']}' width = 200px>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td><input type='file' name='bmrpi'></td>
                                                    </tr>
                                                    <tr>
                                                        <td><img src='../upload/{$row['book_image']}/{$row1['image_mrp']}' width = 200px>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td><input type='file' name='beditioni'></td>
                                                    </tr>
                                                    <tr>
                                                        <td><img src='../upload/{$row['book_image']}/{$row1['image_edition']}' width = 200px>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <td><input type='file' name='bmid'></td>
                                                    </tr>
                                                    <tr>
                                                        <td><img src='../upload/{$row['book_image']}/{$row1['image_middle']}' width = 200px>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>";
                $GLOBALS['output'] .= "</table></td>
                                </tr>";
        $GLOBALS['output'] .="</tbody></table>
                            <div><button type='submit' name='submit'>update</button></div></form>";
    }
    function order() {
        $GLOBALS['output'] .= "<h3>Edit-Order-Data</h3>
                                <table>
                                    <tbody>";
        $select = "select * from order_manage where order_id = '{$GLOBALS['id']}'";
        $query = mysqli_query($GLOBALS['conn'], $select) or die(mysqli_error($GLOBALS['conn']) . "view error");
        $row = mysqli_fetch_assoc($query);
        $GLOBALS['output'] .=   "   <form>
                                        <input type='text' id='oid' value='{$row['order_id']}' hidden>
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
                                            <td><input type='text' id='delivery' value='{$row['dilevery_address']}'></td>
                                        </tr>
                                        <tr>
                                            <td>Date Of Order :- </td>
                                            <td>{$row['date_of_order']}</td>
                                        </tr>
                                        <tr>
                                            <td>Date Of Delivery :- </td>
                                            <td><input type='date' id='dodelivery' value='{$row['date_of_delivery']}'></td>
                                        </tr>
                                        <tr>
                                            <td>Order Price :- </td>
                                            <td>{$row['price']}</td>
                                        </tr>
                                        <tr>
                                            <td>Order Ststus :- </td>
                                            <td><input type='text' id='status' value='{$row['status']}'></td>
                                        </tr>
                                    </tbody></table>
                                    <button type='submit' id='update'>Update<button>
                                    </form>";
    }
    echo $output;
?>