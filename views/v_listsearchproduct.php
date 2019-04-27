<?php 
if ($productData) {
?>
<table class="table"style='max-width: 95%;'>
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
            <th>Approved</th>
            <th>Finished</th>
            <th>Controller</th>


        </tr>
    </thead>
    <tbody>
        <?php
        if ($productData) {

            echo "<tr>";
            echo "<td>" . $productData['id'] . "</td>";
            echo "<td>" . $productData['productownerid'] . "</td>";
            echo "<td>" . $productData['startprice'] . "</td>";
            echo "<td>" . $productData['module'] . "</td>";
            echo "<td>" . $productData['year'] . "</td>";
            echo "<td>" . $productData['color'] . "</td>";
            echo "<td>" . $productData['km'] . "</td>";
            echo "<td>" . $productData['kindofdriving'] . "</td>";
            echo "<td>" . $productData['fuelcapacity'] . "</td>";
            echo "<td>" . $productData['fuelkind'] . "</td>";
            echo "<td>" . $productData['maxspeed'] . "</td>";
            echo "<td>" . $productData['dateofstartbid'] . "</td>";
            echo "<td>" . $productData['dateofend'] . "</td>";


            if ($productData['approved'] == 0)
                echo "<td> Not Approved</td>";
            else
                echo "<td>Approved</td>";
            if ($productData['finished'] == 0)
                echo "<td> Not Finished</td>";
            else
                echo "<td>Finished</td>";
            echo "<td>
               <a href='?page=products.php&action=delete&id=".$productData['id'] ."' style='width :45%; hieght :45%; ' class='btn btn-danger'><i class='fa fa-close'></i></a>";
            if($productData['approved'] == 0)
               echo "<a href='?page=products.php&action=active&id=".$productData['id'] ."' style='width : 45%; hieght :45%' class='btn btn-primary'> <i class='fa fa-check'></i></a>";
            echo "</td>";
            echo "</tr>";
        } 
        ?>

    </tbody>
</table>


<?php }
 else {
     
     echo '<div class="alert alert-danger"> There Is No Products With This Id</div>';
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






