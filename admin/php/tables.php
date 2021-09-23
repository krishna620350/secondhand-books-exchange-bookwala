<?php
    include "config.php";
    session_start();
    if (!isset($_SESSION['username'])) {
        header("Location: $url/admin/php/login.php");
    }
    $id = $_POST['id'];
    $output = "";

    $page = "";
    $limit = 10;
    if(isset($_POST['page'])){
        $page = $_POST['page'];
    }else{
        $page = 1;
    }
    $offset = ($page-1) * $limit;
    $count = $offset + 1;
    switch($id) {
        case "admin" : admin();
            break;
        case "customer" : customer();
            break;
        case "store" : store();
            break;
        case "order" : order();
            break;
        case "payment" : payment();
            break;
    }
    function admin() {
        $GLOBALS['output'] .=  "<h1>Admin-Details</h1>
                                <table>";
        $GLOBALS['output'] .=   "<thead>
                                    <th>S.no</th>
                                    <th>Admin Id</th>
                                    <th>Admin Name</th>
                                    <th>Admin Email</th>
                                    <th>Admin phone</th>
                                    <th>verified</th>
                                    <th>View/Edit/Delete</th>
                                </thead>
                                <tbody>";
        $select = "select admin_id,admin_first_name,admin_last_name,admin_email,admin_phone,admin_verifyed from admin limit {$GLOBALS['offset']},{$GLOBALS['limit']}";
        $queary = mysqli_query($GLOBALS['conn'],$select) or die(mysqli_error($GLOBALS['conn'])."admin table");
        if(mysqli_num_rows($queary)>0){
            while($row = mysqli_fetch_assoc($queary)){
                $GLOBALS['output'] .=  "<tr>
                                            <td>{$GLOBALS['count']}</td>
                                            <td>{$row['admin_id']}</td>
                                            <td>{$row['admin_first_name']} {$row['admin_last_name']}</td>
                                            <td>{$row['admin_email']}</td>
                                            <td>{$row['admin_phone']}</td>
                                            <td>{$row['admin_verifyed']}</td>
                                            <td>
                                                <button id='aview' data-aid='{$row['admin_id']}'>view</button>
                                                <button id='aedit' data-eid='{$row['admin_id']}'>Edit</button>
                                                <button id='adelete' data-did='{$row['admin_id']}'>Delete</button>
                                            </td>
                                        </tr>";
                $GLOBALS['count']++;
            }
            $record = mysqli_query($GLOBALS['conn'],"select * from admin") or die(mysqli_error($GLOBALS['conn']));
            $total_record = mysqli_num_rows($record);
            $total_pages = ceil($total_record / $GLOBALS['limit']);
            $GLOBALS['output'] .= "</tbody>
                </table>
                <div id='page-a'>";
            for($i = 1 ; $i <= $total_pages ; $i++){
                if($i == $GLOBALS['page']){
                    $class = "active";
                }else{
                    $class = "";
                }
                $GLOBALS['output'] .= "<a class='{$class}' id='{$i}' href=''>{$i}</a>";
            }
            $GLOBALS['output'] .= "</div>";
        }
    }
    function customer(){
        $GLOBALS['output'] .=  "<h1>Customer-Details</h1>
                    <table>";
        $GLOBALS['output'] .=   "<thead>
                            <th>S.no</th>
                            <th>Customer Id</th>
                            <th>Customer Name</th>
                            <th>Customer Email</th>
                            <th>Customer phone</th>
                            <th>verified</th>
                            <th>View/Edit/Delete</th>
                        </thead>
                        <tbody>";
        $select = "select customer_id,customer_first_name,customer_last_name,customer_email,customer_phone,customer_verifyed from customber limit {$GLOBALS['offset']},{$GLOBALS['limit']}";
        $query = mysqli_query($GLOBALS['conn'],$select) or die(mysqli_error($GLOBALS['conn'])."customer table not lode");
        if(mysqlI_num_rows($query)>0){
            while($row = mysqli_fetch_assoc($query)){
                $GLOBALS['output'] .=  "<tr>
                                    <td>{$GLOBALS['count']}</td>
                                    <td>{$row['customer_id']}</td>
                                    <td>{$row['customer_first_name']} {$row['customer_last_name']}</td>
                                    <td>{$row['customer_email']}</td>
                                    <td>{$row['customer_phone']}</td>
                                    <td>{$row['customer_verifyed']}</td>
                                    <td>
                                        <button id='cview' data-cid='{$row['customer_id']}'>view</button>
                                        <button id='cedit' data-eid='{$row['customer_id']}'>Edit</button>
                                        <button id='cdelete' data-did='{$row['customer_id']}'>Delete</button>
                                    </td>
                                </tr>";
                $GLOBALS['count']++;
            }
            $record = mysqli_query($GLOBALS['conn'], "select * from customber") or die(mysqli_error($GLOBALS['conn']));
            $total_record = mysqli_num_rows($record);
            $total_pages = ceil($total_record / $GLOBALS['limit']);
            $GLOBALS['output'] .= "</tbody>
                        </table>
                        <div id='page-c'>";
            for ($i = 1; $i <= $total_pages; $i++) {
                if ($i == $GLOBALS['page']) {
                    $class = "active";
                } else {
                    $class = "";
                }
                $GLOBALS['output'] .= "<a class='{$class}' id='{$i}' href=''>{$i}</a>";
            }
            $GLOBALS['output'] .= "</div>";
        }
    }
    function store(){
        $GLOBALS['output'] .=   "<h1>Book-Details</h1>
                                <table>";
        $GLOBALS['output'] .=   "<thead>
                                    <th>S.no</th>
                                    <th>Book Id</th>
                                    <th>Book Title</th>
                                    <th>Book Author</th>
                                    <th>Book Publisher</th>
                                    <th>Book Status</th>
                                    <th>View/Edit/Delete</th>
                                </thead>
                                <tbody>";
        $select = "select book_id,book_title,book_author,book_publisher,book_approval,book_status from store limit {$GLOBALS['offset']},{$GLOBALS['limit']}";
        $queary = mysqli_query($GLOBALS['conn'],$select) or die(mysqli_error($GLOBALS['conn'])."store table status");
        if(mysqli_num_rows($queary) > 0){
            while($row = mysqli_fetch_assoc($queary)){
                $GLOBALS['output'] .=  "<tr>
                                        <td>{$GLOBALS['count']}</td>
                                        <td>{$row['book_id']}</td>
                                        <td>{$row['book_title']}</td>
                                        <td<{$row['book_author']}/td>
                                        <td>{$row['book_publisher']}</td>
                                        <td>{$row['book_approval']}</td>
                                        <td>{$row['book_status']}</td>
                                        <td>
                                            <button id='bview' data-bid='{$row['book_id']}'>view</button>
                                            <button id='bedit' data-eid='{$row['book_id']}'>Edit</button>
                                            <button id='bdelete' data-did='{$row['book_id']}'>Delete</button>
                                        </td>
                                    </tr>";
                $GLOBALS['count']++;
            }
            $record = mysqli_query($GLOBALS['conn'], "select * from store") or die(mysqli_error($GLOBALS['conn']));
            $total_record = mysqli_num_rows($record);
            $total_pages = ceil($total_record / $GLOBALS['limit']);
            $GLOBALS['output'] .= "</tbody>
                        </table>
                        <div id='page-b'>";
            for ($i = 1; $i <= $total_pages; $i++) {
                if ($i == $GLOBALS['page']) {
                    $class = "active";
                } else {
                    $class = "";
                }
                $GLOBALS['output'] .= "<a class='{$class}' id='{$i}' href=''>{$i}</a>";
            }
            $GLOBALS['output'] .= "</div>";
        }
    }
    function order(){
        $GLOBALS['output'] .=   "<h1>Order-Details</h1>
                                <table>";
        $GLOBALS['output'] .=   "<thead>
                                    <th>S.no</th>
                                    <th>Order Id</th>
                                    <th>Customer Id</th>
                                    <th>Date Of Order</th>
                                    <th>Date Of Deliver</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th>View/Edit/Delete</th>
                                </thead>
                                <tbody>";
        $select = "select order_id,customer_id,date_of_order,price,date_of_delivery,status from order_manage limit {$GLOBALS['offset']},{$GLOBALS['limit']}";
        $queary = mysqli_query($GLOBALS['conn'],$select) or die(mysqli_error($GLOBALS['conn'])."order error");
        if(mysqli_num_rows($queary)>0){
            while($row = mysqli_fetch_assoc($queary)){
                $GLOBALS['output'] .=  "<tr>
                                        <td>{$GLOBALS['count']}</td>
                                        <td>{$row['order_id']}</td>
                                        <td>{$row['customer_id']}</td>
                                        <td>{$row['date_of_order']}</td>
                                        <td>{$row['date_of_delivery']}</td>
                                        <td>{$row['price']}</td>
                                        <td>{$row['status']}</td>
                                        <td>
                                            <button id='oview' data-vid='{$row['order_id']}'>view</button>
                                            <button id='oedit' data-eid='{$row['order_id']}'>Edit</button>
                                            <button id='odelete' data-did='{$row['order_id']}'>Delete</button>
                                        </td>
                                    </tr>";
            }
            $record = mysqli_query($GLOBALS['conn'], "select * from order_manage") or die(mysqli_error($GLOBALS['conn']));
            $total_record = mysqli_num_rows($record);
            $total_pages = ceil($total_record / $GLOBALS['limit']);
            $GLOBALS['output'] .= "</tbody>
                            </table>
                            <div id='page-o'>";
            for ($i = 1; $i <= $total_pages; $i++) {
                if ($i == $GLOBALS['page']) {
                    $class = "active";
                } else {
                    $class = "";
                }
                $GLOBALS['output'] .= "<a class='{$class}' id='{$i}' href=''>{$i}</a>";
            }
            $GLOBALS['output'] .= "</div>";
        }
    }
    function payment(){
        $GLOBALS['output'] .=   "<h1>Payment-Details</h1>
                                <table>";
        $GLOBALS['output'] .=   "<thead>
                                    <th>S.no</th>
                                    <th>Order Id</th>
                                    <th>customer Id</th>
                                    <th>Book Title</th>
                                    <th>Price</th>
                                    <th>Date Of Payment</th>
                                    <th>View/Edit/Delete</th>
                                </thead>
                                <tbody>";
        $GLOBALS['output'] .=  "<tr>
                                    <td>1</td>
                                    <td>order##123456</td>
                                    <td>customer##12345</td>
                                    <td>computer science</td>
                                    <td>2000</td>
                                    <td>12-03-2021</td>
                                    <td>
                                        <button>view</button>
                                        <button>Edit</button>
                                        <button>Delete</button>
                                    </td>
                                </tr>";
    }
    echo $output;
?>