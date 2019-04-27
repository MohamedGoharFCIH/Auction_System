<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if ($_GET) {
    if (isset($_GET['action']) && $_GET['action'] == 'delete') {
        $id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : 0;
        $deleted = $product->deleteproduct($id);
        if ($deleted) {
            echo "<div class = 'alert alert-success'> Deleted Successfully </div> ";
            echo "<a  href = 'index.php?page=collectprofits.php'><i style='color : blue'  class='fa fa-arrow-left large'> Previous</i>
</a>";
        }
    }

    if (isset($_GET['action']) && $_GET['action'] == 'active') {
        $id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : 0;
        $active = $product->approveproduct($id);
        if ($active) {
            echo "<div class = 'alert alert-success'> Approved Successfully </div>";
        }
    }
}