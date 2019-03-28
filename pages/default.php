<?php        
       require 'app/autoload.php';
        $db = new Database();
        $db = $db->connect();
?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Summaries</h1>
           
          </div>          
<div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Sta. Rita / Sta. Rita Bukid</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php
                           $member = new Member($db);
                            $member->countMember("Sta. Rita");
                            
                           ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Runez</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php
                          
                           $member = new Member($db);
                            $member->countMember("Runez");
                          
                          ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Pabahay</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php
                          
                           $member = new Member($db);
                            $member->countMember("Pabahay");
                          
                          ?></div>
                        </div>
                    <!--    <div class="col">
                          <div class="progress progress-sm mr-2">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div> -->
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Phase 12</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php
                          
                           $member = new Member($db);
                            $member->countMember("Phase 12");
                          
                          ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
<div class="card shadow">
    <div class="card-header">Member count chart representation</div>
    <div class="card-body">
    
    <canvas id="barChartE" height="100"></canvas>
    </div>
</div>
<script src="vendor/chart.js/Chart.bundle.js"></script>
<script>
$(document).ready(function(){
   
    	var ctx1 = document.getElementById( "barChartE" );
       
        
            $.ajax({
                  url:"app/controller/MemberController.php",
                    method:"POST",
                    data:{chart:"getchart"},
                    success: function(data){
                        
                        var barrio= [];
			             var total = [];
                        var e = $.parseJSON(data);
                        for(var i = 0; i < e.length; i++) {       
                           
                           barrio.push(e[i].barrio);
                            total.push(e[i].total);
                        }
                          function getMax(total){
                return Math.max.apply(null, total);
                }
                var tts =getMax(total) +100;
	//    ctx.height = 200;
	var myChart = new Chart( ctx1, {
		type: 'bar',
		data: {
			labels: barrio,
			datasets: [
				{
					label: "Total Member per Barrio",
					data: total,
					borderColor: "rgba(237, 230, 94, 0.9)",
					borderWidth: "0",
					backgroundColor: "rgba(58, 209, 96, 0.5)"
                }]
		},
		options: {
			scales: {
				yAxes: [ {
					ticks: {
						beginAtZero: true,
                        max: tts
					}
                                } ]
			}
		}
	} );
                        
                } // success
            }); //ajax
  
})

</script>
