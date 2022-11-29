<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../assets/css/admin_index.css">
  <title>แดชบอร์ด | Hod-Q</title>
  <link rel="icon" type="image/x-icon" href="../assets/images/logo_icon.ico">
  <!-- icon -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />
  <!-- highchart -->
  <script src="https://code.highcharts.com/highcharts.js"></script>
  <script src="https://code.highcharts.com/modules/series-label.js"></script>
  <script src="https://code.highcharts.com/modules/exporting.js"></script>
  <script src="https://code.highcharts.com/modules/export-data.js"></script>
  <script src="https://code.highcharts.com/modules/accessibility.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
</head>

<body>
  <?php
  include "./menu.php";
  include "../connectDB/connectDB.php";
  mysqli_set_charset($conn, "utf8");
  ?>
  <section class="home-section">
    <div class="top-con">
      <p>แดชบอร์ด</p>
    </div>

    <div class="con">
      <!-- จำนวนคิวแบ่งตามช่วงเวลา -->
      <div class="charts">
        <div class="search">
          <form action="" method="POST">
            <div class="input-group">
              <select class="form-select" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" name="department" required>
                <option value="" hidden>กรุณาเลือกแผนก</option>
                <?php
                $sql_department = "SELECT * FROM `department` WHERE dp_id !='1'";
                $rs_department = mysqli_query($conn, $sql_department);
                while ($row = mysqli_fetch_array($rs_department)) {
                ?>
                  <option value="<?php echo $row['dp_id'] ?>"><?php echo $row['dp_name'] ?></option>
                <?php
                }
                ?>
              </select>
              <button class="btn btn-success" type="submit" id="inputGroupFileAddon04" name="search_dep">ตกลง</button>
            </div>
          </form>
          <?php
          if (isset($_POST['search_dep'])) {
            $_SESSION['dp_id'] = $_POST['department'];
            $charts_dep = $_SESSION['dp_id'];
          } else {
            $charts_dep = $_SESSION['dp_id'];
          }

          $rs_dep_name = mysqli_query($conn, "SELECT dp_name FROM `department` WHERE  dp_id = '$charts_dep'");
          $name = mysqli_fetch_array($rs_dep_name);
          $sql = "SELECT queue.q_time FROM `queue_list` JOIN queue ON queue_list.q_id = queue.q_id 
                WHERE queue_list.ql_status = 3 AND queue.dp_id = '$charts_dep'";
          $result = mysqli_query($conn, $sql);
          $time1 = 0;
          $time2 = 0;
          $time3 = 0;
          $time4 = 0;
          $time5 = 0;
          $time6 = 0;
          $time7 = 0;
          while ($row = mysqli_fetch_row($result)) {
            if ($row[0] == "08:00 - 09:00") {
              $time1++;
            } elseif ($row[0] == "09:00 - 10:00") {
              $time2++;
            } elseif ($row[0] == "10:00 - 11:00") {
              $time3++;
            } elseif ($row[0] == "11:00 - 12:00") {
              $time4++;
            } elseif ($row[0] == "13:00 - 14:00") {
              $time5++;
            } elseif ($row[0] == "14:00 - 15:00") {
              $time6++;
            } else {
              $time7++;
            }
          }
          ?>


        </div>
      </div><br>
              <h3>แผนก<?php echo $name['dp_name']?></h3>
      <div class="main__cards1">

        <div class="card">
          <i class="fa fa-calendar fa-2x text-lightblue" aria-hidden="true"></i>
          <div class="card_inner">
            <p class="text-primary-p">จำนวนการจองคิวทั้งหมด</p>
            <span class="font-bold text-title">
              <?php
              $sql_all = "SELECT * FROM `queue_list` JOIN queue ON queue_list.q_id = queue.q_id WHERE queue.dp_id = '$charts_dep' AND queue_list.ql_status = 0";
              $rs_all = mysqli_query($conn, $sql_all);
              echo mysqli_num_rows($rs_all);
              ?> คิว
            </span>
          </div>
        </div>
        <div class="card">
          <i class="fa fa-calendar-check-o fa-2x text-red" aria-hidden="true"></i>
          <div class="card_inner">
            <p class="text-primary-p">จำนวนการจองคิวทั้งหมดวันนี้</p>
            <span class="font-bold text-title">
              <?php
              $date_time = date("Y-m-d");
              $sql_all_today = "SELECT * FROM `queue_list` JOIN queue ON queue_list.q_id = queue.q_id WHERE queue.q_date = '$date_time' AND  queue.dp_id = '$charts_dep'";
              $rs_all_today  = mysqli_query($conn, $sql_all_today);
              echo mysqli_num_rows($rs_all_today);
              ?> คิว
            </span>
          </div>
        </div>
        <div class="card">
          <i class="fa fa-user fa-2x text-green" aria-hidden="true"></i>
          <div class="card_inner">
            <p class="text-primary-p">ระยะเวลาการตรวจโดยเฉลี่ย</p>
            <span class="font-bold text-title">
              <?php
              $rs_avg = mysqli_query($conn, "SELECT queue.dp_id,queue_list.time_spent,AVG(queue_list.time_spent) AS avg FROM `queue_list` 
              JOIN queue ON queue_list.q_id = queue.q_id WHERE queue_list.ql_status = 3 AND queue.dp_id = '$charts_dep'");
              $avg = mysqli_fetch_array($rs_avg);
              echo  round($avg['avg'], 2) . " นาที";
              ?>
            </span>
          </div>
        </div>
      </div>
      <div class="charts ">
        <div class="charts2 mb-4">
            <p class="text-title">จำนวนการจองคิวทั้งหมดแผนก<?php echo $name['dp_name']; ?></p>
          <figure class="highcharts-figure">
            <div id="container"></div>
          </figure>
          <script>
            Highcharts.chart('container', {
              chart: {
                type: 'spline'
              },
              credits: {
                enabled: false
              },
              title: {
                text:' '
              },

              yAxis: {
                allowDecimals: false,
                title: {
                  text: 'จำนวนคิวที่จอง'
                }
              },

              xAxis: {
                categories: ['08:00 - 09:00', '09:00 - 10:00', '10:00 - 11:00', '11:00 - 12:00', '13:00 - 14:00', '14:00 - 15:00', '15:00 - 16:00']
              },

              legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle'
              },

              series: [{
                name: 'แผนก<?php echo $name['dp_name']; ?>',
                data: [<?php echo $time1 . "," . $time2 . "," . $time3 . "," . $time4 . "," . $time5 . "," . $time6 . "," . $time7 ?>]
              }],

              responsive: {
                rules: [{
                  condition: {
                    maxWidth: 500
                  },
                  chartOptions: {
                    legend: {
                      layout: 'horizontal',
                      align: 'center',
                      verticalAlign: 'bottom'
                    }
                  }
                }]
              }

            });
          </script>
        </div>
      </div>
      <div class="charts">
        <div class="charts1">
          <!-- จำนวนผู้ใช้งานแบ่งตามอายุ -->
          <div class="charts__left">
            <p class="text-title">จำนวนผู้ใช้งานแบ่งตามอายุ</p>
            <figure class="highcharts-figure">
              <div id="age"></div>
            </figure>
            <?php $sql_age = "SELECT * FROM `persons`";
            $rs_age = mysqli_query($conn, $sql_age);
            $age1 = 0;
            $age2 = 0;
            $age3 = 0;
            $age4 = 0;
            $age5 = 0;
            $age6 = 0;
            $age7 = 0;
            while ($row = mysqli_fetch_array($rs_age)) {
              $birthDate = $row['ps_birthday'];
              $age = (date('Y') - date('Y', strtotime($birthDate)));
              if ($age >= 65) {
                $age7++;
              } elseif ($age >= 55 and $age <= 64) {
                $age6++;
              } elseif ($age >= 45 and $age <= 54) {
                $age5++;
              } elseif ($age >= 35 and $age <= 44) {
                $age4++;
              } elseif ($age >= 25 and $age <= 34) {
                $age3++;
              } elseif ($age >= 18 and $age <= 24) {
                $age2++;
              } else {
                $age1++;
              }
            }
            ?>
            <script>
              Highcharts.chart('age', {
                chart: {
                  type: 'column'
                },
                title: {
                  text: ' '
                },
                // exporting: false,
                xAxis: {
                  type: 'category',
                  labels: {
                    style: {
                      fontSize: '13px',
                      fontFamily: 'Verdana, sans-serif'
                    }
                  },
                  // title: {
                  //   text: 'ช่วงอายุ',
                  // }
                },
                yAxis: {
                  allowDecimals: false,
                  min: 0,
                  title: {
                    text: 'จำนวน (คน)'
                  }
                },
                credits: {
                  enabled: false
                },
                legend: {
                  enabled: false
                },
                tooltip: {
                  pointFormat: 'จำนวน: <b>{point.y} คน</b>'
                },
                series: [{
                  name: 'ช่วงอายุ',
                  data: [
                    ['ต่ำกว่า18', <?php echo $age1 ?>],
                    ['18-24', <?php echo $age2 ?>],
                    ['25-34', <?php echo $age3 ?>],
                    ['35-44', <?php echo $age4 ?>],
                    ['45-54', <?php echo $age5 ?>],
                    ['55-64', <?php echo $age6 ?>],
                    ['65 ขึ้นไป', <?php echo $age7 ?>],
                  ],
                  dataLabels: {
                    enabled: true,
                    color: '#FFFFFF',
                    align: 'right',
                    format: '{point.y}', // one decimal
                    style: {
                      fontSize: '13px',
                    }
                  }
                }]
              });
            </script>
          </div>
          <!-- ระยะเวลาการใช้งานโดยเฉลี่ย -->
          <div class="charts__left">
            <p class="text-title">จำนวนผู้ใช้งานระบบแบ่งตามเพศ</p>
            <?php
            $sql_boy = "SELECT * FROM `persons` WHERE `ps_gender` = 'ชาย'";
            $result_boy = mysqli_query($conn, $sql_boy);
            $check_boy = mysqli_num_rows($result_boy);

            $sql_g = "SELECT * FROM `persons` WHERE `ps_gender` = 'หญิง'";
            $result_g = mysqli_query($conn, $sql_g);
            $check_g = mysqli_num_rows($result_g);
            ?>
            <figure class="highcharts-figure">
              <div id="gender"></div>
            </figure>
            <script>
              Highcharts.chart('gender', {
                chart: {

                  type: 'pie',

                },
                // exporting: false,
                title: {
                  text: ' '
                },
                credits: {
                  enabled: false
                },
                tooltip: {
                  pointFormat: '<b>{point.name}</b>:{point.y}คน ',
                },
                accessibility: {
                  point: {
                    valueSuffix: '%'
                  }
                },
                plotOptions: {
                  pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                      enabled: true, //มี%ชี้ให้ใส่true
                      format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                      distance: -50,
                      filter: {
                        property: 'percentage',
                        operator: '>',
                        value: 4
                      }
                    },
                    showInLegend: true, //อธิบายแต่ละสี
                    colors: [
                      '#e376de',
                      '#4fbbdb',
                    ]

                  }
                },
                series: [{
                  name: 'เพศ',
                  colorByPoint: true,
                  data: [{
                    name: 'หญิง',
                    y: <?php echo $check_g; ?>,
                  }, {
                    name: 'ชาย',
                    y: <?php echo $check_boy; ?>
                  }]
                }]
              });
            </script>
          </div>
        </div>
      </div>
  </section>
</body>

</html>