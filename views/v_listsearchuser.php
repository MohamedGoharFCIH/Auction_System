<?php
if ($getUserData) {
    ?>
    <table class="table" style='max-width: 95%;'>
        <thead class="thead-inverse">
            <tr>

                <th>User ID </th>
                <th>User Name</th>
                <th>Email</th>
                <th>Register Date</th>
                <th>Full Name</th>
                <th>Approved</th>
                <th>Control </th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($getUserData) {

                echo "<tr>";
                echo "<td>" . $getUserData['id'] . "</td>";
                echo "<td>" . $getUserData['username'] . "</td>";
                echo "<td>" . $getUserData['email'] . "</td>";
                echo "<td>" . $getUserData['regdate'] . "</td>";
                echo "<td>" . $getUserData['fullname'] . "</td>";

                if ($getUserData['approved'] == 0)
                    echo "<td> Not Approved</td>";
                else
                    echo "<td>Approved</td>";
                if ($getUserData['id'] != 1) {
                    if ($getUserData['groupid'] != 1 || $_SESSION['id'] == 1) {

                        echo "<td>
                    <a href='?page=users.php&action=edit&id=" . $getUserData['id'] . "' style='' class='btn btn-success'><i class='fa fa-edit'></i></a>
                    <a href='?page=users.php&action=delete&id=" . $getUserData['id'] . "' style='' class='btn btn-danger confirm'><i class='fa fa-close'></i></a>";
                        echo "</td>";
                    } elseif ($getUserData['groupid'] == 1 && $getUserData['id'] == $_SESSION['id'] ) {
                        echo "<td>
                    <a href='?page=users.php&action=edit&id=" . $getUserData['id'] . "' style='' class='btn btn-success'><i class='fa fa-edit'></i></a>";
                        echo "</td>";
                    }
                }
                echo "</tr>";
            }
            ?>

        </tbody>
    </table>

    <?php
} else {
    echo '<div class="alert alert-danger"> There Is No Users With This Id</div>';
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




