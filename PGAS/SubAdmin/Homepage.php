<?php
ob_start();
include('head.php');

include("../Assets/Connection/Connection.php");
?>
        <!--  Row 1 -->
        <div class="row">
          <div class="col-lg-12 d-flex align-items-strech">
            <div class="card w-100">
              <div class="card-body">
                <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                  <div class="mb-3 mb-sm-0">
                    <h5 class="card-title fw-semibold">OVERVIEW</h5>
                  </div>
                
                </div>
                <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
              </div>
            </div>
          </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
var ctx = document.getElementById("myChart").getContext("2d");

var data = {
  labels: ['User', 'Owner'],
  datasets: [{
    label: "Pending",
    backgroundColor: "blue",
    data: [
            <?php 
        $sel="select count(*) as pending from tbl_user u inner join tbl_place p on p.place_id=u.place_id where user_vstatus=0 and district_id='".$_SESSION['sdistrict']."'";
        $row=$connection->query($sel);
        $data=$row->fetch_assoc();
        echo $data["pending"].",";
        $sel="select count(*) as pending from tbl_owner u inner join tbl_place p on p.place_id=u.place_id where owner_vstatus=0 and district_id='".$_SESSION['sdistrict']."'";
        $row=$connection->query($sel);
        $data=$row->fetch_assoc();
        echo $data["pending"];
        ?>
    ]
  }, {
    label: "Accepted",
    backgroundColor: "green",
    data: [
      <?php 
        $sel="select count(*) as accpet from tbl_user u inner join tbl_place p on p.place_id=u.place_id where user_vstatus=1 and district_id='".$_SESSION['sdistrict']."'";
        $row=$connection->query($sel);
        $data=$row->fetch_assoc();
        echo $data["accpet"].",";
        $sel="select count(*) as accpet from tbl_owner u inner join tbl_place p on p.place_id=u.place_id where owner_vstatus=1 and district_id='".$_SESSION['sdistrict']."'";
        $row=$connection->query($sel);
        $data=$row->fetch_assoc();
        echo $data["accpet"];
        ?>
    ]
  }, {
    label: "Rejected",
    backgroundColor: "red",
    data: [
      <?php 
        $sel="select count(*) as reject from tbl_user u inner join tbl_place p on p.place_id=u.place_id where user_vstatus=2 and district_id='".$_SESSION['sdistrict']."'";
        $row=$connection->query($sel);
        $data=$row->fetch_assoc();
        echo $data["reject"].",";
        $sel="select count(*) as reject from tbl_owner u inner join tbl_place p on p.place_id=u.place_id where owner_vstatus=2 and district_id='".$_SESSION['sdistrict']."'";
        $row=$connection->query($sel);
        $data=$row->fetch_assoc();
        echo $data["reject"];
        ?>
    ]
  }]
};


var myBarChart = new Chart(ctx, {
  type: 'bar',
  data: data,
  options: {
    barValueSpacing: 20,
    scales: {
      yAxes: [{
        ticks: {
          min: 0,
        }
      }]
    }
  }
});
</script>
<?php
include('Foot.php');
ob_flush();
?>