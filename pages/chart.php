<?php        
       require 'app/autoload.php';
        $db = new Database();
        $db = $db->connect();
?>
<div class="card shadow">

    <div class="card-header"><i class="fas fa-fw fa-chart-pie"></i> Member Chart Presentation</div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-5">
                <table class="table table-bordered mt-5">
                    <thead>
                        <th>Barrio Name</th>
                        <th>Total Members</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Sta. Rita</td>
                            <td>
                                <?php
                                $member = new Member($db);
                                $member->countMember("Sta. Rita");
                            ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Sta. Rita Bukid</td>
                            <td>
                                <?php
                                $member = new Member($db);
                                $member->countMember("Sta. Rita Bukid");
                            ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Runez</td>
                            <td>
                                <?php
                                $member = new Member($db);
                                $member->countMember("Runez");
                            ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Pabahay</td>
                            <td>
                                <?php
                                $member = new Member($db);
                                $member->countMember("Pabahay");
                            ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Phase 12</td>
                            <td>
                                <?php
                                $member = new Member($db);
                                $member->countMember("Phase 12");
                            ?>
                            </td>
                        </tr>
                        <tr>
                            <td><b>TOTAL</b></td>
                            <td><b>
                                <?php
                                $member = new Member($db);
                                $member->membertotal();
                            ?></b>
                            </td>
                        </tr>
                    </tbody>
                </table>

            </div>
            <div class="col-md-7">
                <canvas id="pieChart" style="max-height:400px;max-width:400px;margin:auto"></canvas>
            </div>

        </div>

    </div>
</div>
<script src="vendor/chart.js/Chart.bundle.js"></script>
<script>
    $(document).ready(function() {

        var ctx = document.getElementById("pieChart");
        ctx.height = 300;
        $.ajax({
            url: "app/controller/MemberController.php",
            method: "POST",
            data: {
                chart: "getpie"
            },
            success: function(data) {
                var barrio = [];
                var total = [];
                var e = $.parseJSON(data);
                for (var i = 0; i < e.length; i++) {

                    barrio.push(e[i].barrio);
                    total.push(e[i].total);
                }

                var myChart = new Chart(ctx, {
                    type: 'pie',
                    data: {
                        datasets: [{
                            data: total,
                            backgroundColor: [
                                "rgba(87, 219, 153,0.9)",
                                "rgba(244, 124, 48,0.7)",
                                "rgba(0, 123, 255,0.5)",
                                "rgba(0,0,0,0.07)"
                            ],
                            hoverBackgroundColor: [
                                "rgba(0, 123, 255,0.9)",
                                "rgba(0, 123, 255,0.7)",
                                "rgba(0, 123, 255,0.5)",
                                "rgba(0,0,0,0.07)"
                            ]

                        }],
                        labels: barrio
                    },
                    options: {
                        responsive: true
                    }
                });
            }
        });
    });
</script>