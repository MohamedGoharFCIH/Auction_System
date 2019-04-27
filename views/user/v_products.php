<?php
if ($Pdata ) {
    ?>



    <br>

    <?php
    if ($Pdata) {
        foreach ($Pdata as $data) {
            if($data['approved']> 0)
            {
            ?>
    <div style="width:50%;float: left" >
                <div class="row" >
                    <img style= "width:390px; margin-left: 27px" class="img-responsive img-thumbnail center-block" src="<?php echo '../../app/layout/uploads/' . $data['photo']; ?>" alt="Photo" />
                </div>
                <div class="col-md-9 item-info">

                    <ul class="list-unstyled">

                        <li>
                            <i class="fa fa-money fa-fw"></i>
                            <span>Price</span> : <?php
                            if ($data['finalprice'] > 0) {
                                echo "$" . $data['finalprice'];
                            } else {
                                echo "$" . $data['startprice'];
                            }
                            ?>
                        </li>
                        <li>
                            <i class="fa fa-building fa-fw"></i>
                            <span>Year Of Issue</span> : <?php echo $data['year'];  ?>
                        </li>
                        <li>
                            <i class="fa fa-tags fa-fw"></i>
                            <span>Model</span> :  <?php echo $data['module'] ?>
                        </li>
                        <li>
                            <i class="fa fa-tags fa-fw"></i>
                            <span>Max Speed</span> :  <?php echo $data['maxspeed'] ?>
                        </li>
                        <li>
                            <i class="fa fa-tags fa-fw"></i>
                            <span>Km</span> :  <?php echo $data['km'] ?>
                        </li>
                        <li>
                            <i class="fa fa-tags fa-fw"></i>
                            <span>Color</span> :  <?php echo $data['color'] ?>
                        </li>
                        <li>
                            <i class="fa fa-tags fa-fw"></i>
                            <span>Driving</span> :  <?php echo $data['kindofdriving'] ?>
                        </li>
                        <li>
                            <i class="fa fa-tags fa-fw"></i>
                            <span>Fuel Capacity</span> :  <?php echo $data['fuelcapacity'] ?>
                        </li>
                        <li>
                            <i class="fa fa-tags fa-fw"></i>
                            <span>Fuel Kind</span> :  <?php echo $data['fuelkind'] ?>
                        </li> 
                        <li>
                            <i class="fa fa-tags fa-fw"></i>
                            <span>End Data</span> :  <?php echo $data['dateofend'] ?>
                        </li> 
                        <li>
                            <i class="fa fa-tags fa-fw"></i>
                            <span>Minimum Price To bid Is </span> : $<?php
                            if ($data['finalprice'] > 0) {
                                echo $data['finalprice'] + ($data['finalprice'] * $data['percentagebid']);
                            } else {
                                echo $data['startprice'] + ($data['startprice'] * $data['percentagebid']);
                            }
                            ?>

                        </li> 
                    </ul>

                    <form method="POST">
                        <input type="hidden" name="id" value="<?php echo $data['id'];?>" />
                        <input style="margin-bottom: 5px"class="form-control" type="number" name="finalprice" required="" />
                        <input class="form-control btn btn-primary" type="submit" name="bid" Value="BID" />
                     
                    </form>

                </div>
            </div>


            <?php
        }
        else echo "<br>" . "<div class='alert alert-info'>Thers No Prooducts </div>";
        }
    }
} else {
    echo "<br>" . "<div class='alert alert-info'>Thers No Prooducts </div>";
}
?>
<!--

<table class="table"style='max-width: 95%;'>
    <thead class="thead-inverse">
        <tr>




            <th>Module</th>
            <th>Year</th>
            <th>Final Price</th>
            <th>color</th>
            <th>KM</th>
            <th>Driving</th>
            <th>Capacity</th>
            <th>Fuel Kind</th>
            <th>Max Speed </th>
            <th>Ended Date</th>
            <th>photo</th>
            <th>BID</th>




        </tr>
    </thead>
    <tbody>

    </tbody>
</table>
-->

<?php
/* echo "<tr>";
  echo "<td>" . $row['module'] . "</td>";
  echo "<td>" . $row['year'] . "</td>";
  echo "<td>" . $row['finalprice'] . "</td>";
  echo "<td>" . $row['color'] . "</td>";
  echo "<td>" . $row['km'] . "</td>";
  echo "<td>" . $row['kindofdriving'] . "</td>";
  echo "<td>" . $row['fuelcapacity'] . "</td>";
  echo "<td>" . $row['fuelkind'] . "</td>";
  echo "<td>" . $row['maxspeed'] . "</td>";
  echo "<td>" . $row['dateofend'] . "</td>";
  echo "<td><img src ='C:/xampp/htdocs/AuctionSystem/applayout/uploads/" . $row['photo'] . "'></td>";

  echo "<td>
  <form method='POST' action=''>
  <input  type='text' name='finalprice' />";

  echo" <input type='hidden' name='id'  value = " . $row['id'] . "/>";
  echo" <input type='hidden' name='fprice'  value = " . $row['finalprice'] . "/>";

  echo " <input class =' btn btn-primary' type='submit' name='bid' value= 'BID'/>";
  echo "</td>";
  echo "</tr>";
  echo " </form>"; */
?>


