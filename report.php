<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/admin_report.css">
    <!-- icon -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />
    <!-- datatable -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" />
    <title>Document</title>
</head>

<body>
    <?php
    include "./menu.php";
    include "../connectDB/connectDB.php";
    ?>
    <section class="home-section">
        <div class="top-con">
            <p>สรุปรายงาน</p>
        </div>
        <div class="con">
            <main>
                <form>
                    <div class="row">
                        <div class="col rep_left">
                        </div>
                        <div class="col rep_left">
                            <select id="report" name="report">
                                <option value="1">สรุปการจอง</option>
                                <option value="1">สรุปข้อมูลสมาชิก</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col rep_left">
                            จากวันที่ <input type="date">
                        </div>
                        <div class="col rep_right">
                            ถึงวันที่ <input type="date">
                        </div>
                    </div>
                </form>
        </div>

        <!-- ตาราง -->
        <div class="con">
            <div class="row">
                <div class="col text-center">
                    <button type="submit" class="btn btn-warning m-4" name="rep">ออกรายงาน</button>
                </div>
                <div class="table-responsive">
                    <table id="myTable" class="display" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>เลขที่ใบจอง</th>
                                <th>ผู้จอง</th>
                                <th>วันที่จอง</th>
                                <th>เวลาที่จอง</th>
                                <th>เวลาที่ยกเลิก</th>
                                <th>แผนกที่จอง</th>
                                <th>เจ้าหน้าที่</th>
                                <th>วันที่ทำการจอง</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>

    </section>
</body>
<script>
    $(document).ready(function() {
        $("#myTable").DataTable();
    });
</script>

</html>