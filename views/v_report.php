<?php?>
<table class="table" style='max-width: 95%;'>
    <thead class="thead-inverse">
        <tr>

            <th>ID </th>
            <th>Module</th>
            <th>start price</th>
            <th>Date of End</th>
            <th>Type</th>
            <th>Approved</th>

        </tr>
    </thead>
    <tbody>
        <?php
        if ($getproduct) {
            foreach ($getproduct as $row)
            {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['module'] . "</td>";
            echo "<td>" . $row['startprice'] . "</td>";
            echo "<td>" . $row['dateofend'] . "</td>";
            echo "<td>" . $row['type'] . "</td>";

            if ($row['approved'] == 0)
                echo "<td> Not Approved</td>";
            else
                echo "<td>Approved</td>";
          
            echo "</tr>";
        }
        }
        ?>

    </tbody>
</table>







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




