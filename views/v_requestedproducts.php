<?php
if($PData)
{
    //print_r($PData);  
    

?>
<table class="table" style=''>
    <thead class="thead-inverse">
        <tr>

            <th>ID</th>
            <th>Owner</th>
            <th>start price</th>
            <th>Module</th>
            <th>Year</th>
            <th>color</th>
            <th>KM</th>
            <th>Driving</th>
            <th>Capacity</th>
            <th>Fuel Kind</th>
            <th>Max Speed </th>
            <th>Start Date</th>
            <th>Ended Date</th>
            <th>Controller</th>


        </tr>
    </thead>
    <tbody>
        <?php
        if ($PData) {
            foreach ($PData as $Data)
            {
            echo "<tr>";
            echo "<td>" . $Data['id'] . "</td>";
            echo "<td>" . $Data['ownername'] . "</td>";
            echo "<td>" . $Data['startprice'] . "</td>";
            echo "<td>" . $Data['module'] . "</td>";
            echo "<td>" . $Data['year'] . "</td>";
            echo "<td>" . $Data['color'] . "</td>";
            echo "<td>" . $Data['km'] . "</td>";
            echo "<td>" . $Data['kindofdriving'] . "</td>";
            echo "<td>" . $Data['fuelcapacity'] . "</td>";
            echo "<td>" . $Data['fuelkind'] . "</td>";
            echo "<td>" . $Data['maxspeed'] . "</td>";
            echo "<td>" . $Data['dateofstartbid'] . "</td>";
            echo "<td>" . $Data['dateofend'] . "</td>";


            
             
            echo "<td>
             <a href='?page=products.php&action=active&id=".$Data['id'] ."' style='display:block' class='btn btn-primary'> <i class='fa fa-check'></i></a>
             <a href='?page=products.php&action=delete&id=".$Data['id'] ."' style='display:block' class='btn btn-danger'><i class='fa fa-close'></i></a>";
             echo "</td>";
            echo "</tr>";
        } 
        }
        ?>

    </tbody>
</table>
<?php }
 else {
         echo '<div class = "alert alert-danger">There Is No Products</div>';    
        }
?>

<script>
    window.onload = function () {
        var chart1 = document.getElementById("line-chart").getContext("2d");
        window.myLine = new Chart(chart1).Line(lineChartData, {
            responsive: true,
            scaleLineColor: "rgba(0,0,0,.2)",
            scaleGridLineColor: "rgba(0,0,0,.05)",
            scaleFontColor: "#c5c7cc"
        });
        var chart2 = document.getElementById("bar-chart").getContext("2d");
        window.myBar = new Chart(chart2).Bar(barChartData, {
            responsive: true,
            scaleLineColor: "rgba(0,0,0,.2)",
            scaleGridLineColor: "rgba(0,0,0,.05)",
            scaleFontColor: "#c5c7cc"
        });
        var chart3 = document.getElementById("doughnut-chart").getContext("2d");
        window.myDoughnut = new Chart(chart3).Doughnut(doughnutData, {
            responsive: true,
            segmentShowStroke: false
        });
        var chart4 = document.getElementById("pie-chart").getContext("2d");
        window.myPie = new Chart(chart4).Pie(pieData, {
            responsive: true,
            segmentShowStroke: false
        });
        var chart5 = document.getElementById("radar-chart").getContext("2d");
        window.myRadarChart = new Chart(chart5).Radar(radarData, {
            responsive: true,
            scaleLineColor: "rgba(0,0,0,.05)",
            angleLineColor: "rgba(0,0,0,.2)"
        });
        var chart6 = document.getElementById("polar-area-chart").getContext("2d");
        window.myPolarAreaChart = new Chart(chart6).PolarArea(polarData, {
            responsive: true,
            scaleLineColor: "rgba(0,0,0,.2)",
            segmentShowStroke: false
        });
    };
</script>	








