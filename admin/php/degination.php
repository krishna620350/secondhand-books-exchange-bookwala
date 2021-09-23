<?php
    include "config.php";
    $output = "<select id='deg' required>
                    <option>Degination</option>";
    $select = "select deg_name from degination";
    $queary = mysqli_query($conn,$select) or die(mysqli_error($conn)."degination error");
    if(mysqli_num_rows($queary)>0){
        while($row = mysqli_fetch_assoc($queary)){
            $output .= "<option value='{$row['deg_name']}'>{$row['deg_name']}</option>";
        }
    }
    $output.="</select>";
    echo $output;
?>