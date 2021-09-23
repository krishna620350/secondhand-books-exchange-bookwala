<?php
include "config.php";
class store
{
    private $btitle = "";
    private $bauthor = "";
    private $bdesc = "";
    private $bpublisher = "";
    private $bedition = "";
    private $bpage = "";
    private $category = "";
    private $subcategory = "";
    private $subbook = "";
    private $bmrp = "";
    private $bcost = "";
    private $bsell = "";
    private $path = "";
    private $image_f = "";
    private $image_b = "";
    private $image_mr = "";
    private $image_ed = "";
    private $image_m = "";
    private $bid = "";
    private $output = "";
    public function displayform()
    {
        $this->output .= " <div class='form-info' style='height:100vh;'>
                                    <button id='close'>close</button>
                                        <form id='submit-form'>
                                            <h3>Add-Books</h3>
                                            <div>
                                                <input type='text' placeholder='Enter book title' name='btitle' required>
                                            </div>
                                            <div>
                                                <input type='text' placeholder='Enter book author name' name='bauthor' required>
                                            </div>
                                            <div>
                                                <textarea type='text' placeholder='Enter book description' name='bdesc' required style='width:100%;background-color:#009EFA;outline:none;border-bottom:2px solid black;'></textarea>
                                            </div>
                                            <div>
                                                <input type='text' placeholder='Enter book publisher name' name='bpublisher' required>
                                            </div>
                                            <div>
                                                <input type='number' placeholder='Enter book edition' name='bedition' required>
                                            </div>
                                            <div>
                                                <input type='number' placeholder='Enter book total page' name='bpage' required>
                                            </div>
                                            <div>
                                                <select name='category' required>";
        $select = "select * from category";
        $queary = mysqli_query($GLOBALS['conn'], $select) or die(mysqli_error($GLOBALS['conn']) . "category,subcategory and subject book fault");
        if (mysqli_num_rows($queary) > 0) {
            while ($row = mysqli_fetch_assoc($queary)) {
                $this->output .= "<option value='{$row['category_id']}'>{$row['category_name']}</option>";
            }
        }
        $this->output .= "</select></div><div><select name='subcategory' required>";
        $select = "select * from subcategory";
        $queary = mysqli_query($GLOBALS['conn'], $select) or die(mysqli_error($GLOBALS['conn']) . "category,subcategory and subject book fault");
        if (mysqli_num_rows($queary) > 0) {
            while ($row = mysqli_fetch_assoc($queary)) {
                $this->output .= "<option value='{$row['subcategory_id']}'>{$row['subcategory_name']}</option>";
            }
        }
        $this->output .= "</select></div><div><select name='subbook' required>";
        $select = "select * from subject_book";
        $queary = mysqli_query($GLOBALS['conn'], $select) or die(mysqli_error($GLOBALS['conn']) . "category,subcategory and subject book fault");
        if (mysqli_num_rows($queary) > 0) {
            while ($row = mysqli_fetch_assoc($queary)) {
                $this->output .= "<option value='{$row['sub_book_id']}'>{$row['sub_book_name']}</option>";
            }
        }
        $this->output .= "</select></div>
                                            <div>
                                                <input type='number' placeholder='Enter book MRP' name='bmrp' required>
                                            </div>
                                            <div>
                                                <input type='number' placeholder='Enter book cost price' name='bcost' required>
                                            </div>
                                            <div>
                                                <input type='number' placeholder='Enter book sell price' name='bsell' required>
                                            </div>
                                            <div class='image'>
                                                <lable>Book front image </lable>
                                                <input type='file' name='bfront' required>
                                            </div>
                                            <div class='image'>
                                                <lable>Book back image </lable>
                                                <input type='file' name='bback' required>
                                            </div class='image'>
                                            <div class='image'>
                                                <lable>Book MRP page image </lable>
                                                <input type='file' name='bmrpi' required>
                                            </div>
                                            <div class='image'>
                                                <lable>Book edition page image </lable>
                                                <input type='file' name='beditioni' required>
                                            </div>
                                            <div class='image'>
                                                <lable>Book mnamedle page image </lable>
                                                <input type='file' name='bmid' required>
                                            </div>
                                            <div>
                                                <button type='submit'>Submit</button>
                                            </div>
                                        </form>
                                </div>";
        return $this->output;
    }
    public function insertbook($btitle, $bauthor, $bdesc, $bpublisher, $bedition, $bpage, $category, $subcategory, $subbook, $bmrp, $bcost, $bsell, $new_path,array $new_book_image)
    {
        $this->btitle = mysqli_real_escape_string($GLOBALS['conn'], $btitle);
        $this->bauthor = mysqli_real_escape_string($GLOBALS['conn'], $bauthor);
        $this->bdesc = mysqli_real_escape_string($GLOBALS['conn'], $bdesc);
        $this->bpublisher = mysqli_real_escape_string($GLOBALS['conn'], $bpublisher);
        $this->bedition = mysqli_real_escape_string($GLOBALS['conn'], $bedition);
        $this->bpage = mysqli_real_escape_string($GLOBALS['conn'], $bpage);
        $this->category = mysqli_real_escape_string($GLOBALS['conn'], $category);
        $this->subcategory = mysqli_real_escape_string($GLOBALS['conn'], $subcategory);
        $this->subbook = mysqli_real_escape_string($GLOBALS['conn'], $subbook);
        $this->bmrp = mysqli_real_escape_string($GLOBALS['conn'], $bmrp);
        $this->bcost = mysqli_real_escape_string($GLOBALS['conn'], $bcost);
        $this->bsell = mysqli_real_escape_string($GLOBALS['conn'], $bsell);
        $this->path = mysqli_real_escape_string($GLOBALS['conn'], $new_path);
        $this->image_f = mysqli_real_escape_string($GLOBALS['conn'], $new_book_image[0]);
        $this->image_b = mysqli_real_escape_string($GLOBALS['conn'], $new_book_image[1]);
        $this->image_mr = mysqli_real_escape_string($GLOBALS['conn'], $new_book_image[2]);
        $this->image_ed = mysqli_real_escape_string($GLOBALS['conn'], $new_book_image[3]);
        $this->image_m = mysqli_real_escape_string($GLOBALS['conn'], $new_book_image[4]);
        $this->bid = "book-##-" . time();
        $insert = "insert into store(book_id,book_title,book_author,book_description,book_publisher,book_edition,book_pages,book_category,book_subcategory,book_subject_name,book_MRP,book_cost_price,book_sell_price,book_image,book_status,book_approval) values('{$this->bid}','{$this->btitle}','{$this->bauthor}','{$this->bdesc}','{$this->bpublisher}',{$this->bedition},{$this->bpage},{$this->category},{$this->subcategory},{$this->subbook},'{$this->bmrp}','{$this->bcost}','{$this->bsell}','{$this->path}',1,1)";
        $queary = mysqli_query($GLOBALS['conn'], $insert) or die(mysqli_error($GLOBALS['conn']) . "book insert error");
        if ($queary) {
            $quary1 = "insert into book_image(folder_name,image_front,image_back,image_mrp,image_edition,image_middle) values('{$this->path}','{$this->image_f}','{$this->image_b}','{$this->image_mr}','{$this->image_ed}','{$this->image_m}')";
            mysqli_query($GLOBALS['conn'], $quary1) or die(mysqli_error($GLOBALS['conn']) . "image error");
            echo 1;
        } else {
            echo "error";
        }
    }
}
$addbook = new store();
if (isset($_POST['id'])) {
    $id = $_POST['id'];
} else {
    $id = "insertbook";
}
switch ($id) {
    case 'addbook':
        echo $addbook->displayform();
        break;
    case 'insertbook':
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
        if (isset($_FILES['bfront'], $_FILES['bback'], $_FILES['bmrpi'], $_FILES['beditioni'], $_FILES['bmid'])) {
            $arrayerror = array();
            $book_image = array($_FILES['bfront'], $_FILES['bback'], $_FILES['bmrpi'], $_FILES['beditioni'], $_FILES['bmid']);
            $new_book_image=array();
            $image = array('front', 'back', 'mrp', 'edition', 'mid');

            for ($i = 0; $i < 5; $i++) {
                $file_name = $book_image[$i]['name'];
                $file_size = $book_image[$i]['size'];
                $file_temp = $book_image[$i]['tmp_name'];
                $file_type = $book_image[$i]['type'];

                $file_ext = end(explode('.', $file_name));

                $extension = array("jpeg", "jpg", "png");

                if (in_array($file_ext, $extension) === false) {
                    $error[] = "this extension file is not allowed , plese choose jpg or png image";
                }
                if ($file_size > 5242880) {
                    $error[] = "file size must be less than 2MB";
                }

                $new_path = $btitle . "-" . time();
                $path = "../../upload/" . $btitle . "-" . time();
    
                $new_name = time() . "-".$image[$i] ."-". basename($file_name);
                $target = $path . "/" . $new_name;
                $new_book_image[] = $new_name;
                if(file_exists($path)){
                    if (empty($error) == true) {
                        move_uploaded_file($file_temp, $target);
                    } else {
                        print_r($error);
                        unset($error);
                    }
                }else{
                    mkdir($path);
                    if (empty($error) == true) {
                        move_uploaded_file($file_temp, $target);
                    } else {
                        print_r($error);
                        unset($error);
                    }
                }
            }
            $addbook->insertbook($btitle, $bauthor, $bdesc, $bpublisher, $bedition, $bpage, $category, $subcategory, $subbook, $bmrp, $bcost, $bsell, $new_path, $new_book_image);
        }
        break;
}
?>