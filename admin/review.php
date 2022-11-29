<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/admin_review.css">
    <title>จัดการความคิดเห็น | Hod-Q</title>
    <link rel="icon" type="image/x-icon" href="../assets/images/logo_icon.ico">
    <!-- star rating -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <!-- icon -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.6.1.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- datatable -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" />
    <!-- sweetalert -->
</head>

<body>
    <?php
    include "./menu.php";
    include "../connectDB/connectDB.php";
    mysqli_set_charset($conn, "utf8");
    ?>
    <section class="home-section">
        <div class="top-con">
            <p>จัดการความคิดเห็น</p>
        </div>
        <div class="con">
            <main>
                <div class="main__container">
                    <div class="main__cards">
                        <div class="card">
                            <div class="row">
                                <div class="col-6 align-self-center">
                                    <img src="../assets/images/high-score.png" alt="คะแนนเฉลี่ย" />
                                </div>
                                <div class="col-6 align-self-center text-center">
                                    <p class="queue-status">คะแนนเฉลี่ย</p>
                                    <b><span id="average_rating">0.0</span> / 5</b>
                                </div>
                            </div>
                        </div>
                        <?php
                        $sql_all_review = "SELECT * FROM `review`";
                        $rs_all_review = mysqli_query($conn, $sql_all_review);
                        $all_review = mysqli_num_rows($rs_all_review)
                        ?>
                        <div class="card">
                            <div class="row">
                                <div class="col-6 align-self-center">
                                    <img src="../assets/images/writing.png" alt="จำนวนความคิดเห็น" />
                                </div>
                                <div class="col-6 align-self-center text-center">
                                    <p class="queue-status">จำนวนความคิดเห็น</p>
                                    <b>
                                        <p class="queue-total"><?php echo $all_review ?></p>
                                    </b>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </main>
        </div>
        <div class="con">
            <h3 class="text-center mb-3">คะแนนความคิดเห็น</h3>
            <div class="check_star">
                <div class="row">
                    <?php
                    $sql_all = "SELECT * FROM `review`";
                    $rs_all = mysqli_query($conn, $sql_all);

                    $sql_5 = "SELECT * FROM `review` WHERE `rv_score` = '5'";
                    $rs_5 = mysqli_query($conn, $sql_5);

                    $sql_4 = "SELECT * FROM `review` WHERE `rv_score` = '4'";
                    $rs_4 = mysqli_query($conn, $sql_4);

                    $sql_3 = "SELECT * FROM `review` WHERE `rv_score` = '3'";
                    $rs_3 = mysqli_query($conn, $sql_3);

                    $sql_2 = "SELECT * FROM `review` WHERE `rv_score` = '2'";
                    $rs_2 = mysqli_query($conn, $sql_2);

                    $sql_1 = "SELECT * FROM `review` WHERE `rv_score` = '1'";
                    $rs_1 = mysqli_query($conn, $sql_1);
                    ?>
                    <form action="#" method="POST">
                        <label class="radio"> <input type="radio" name="star" value="total" id="all" checked> <span>ทั้งหมด (<?php echo mysqli_num_rows($rs_all) ?>)</span></label>
                        <label class="radio"> <input type="radio" name="star" value="5" id="s5"><span>5 ดาว (<?php echo mysqli_num_rows($rs_5) ?>)</span></label>
                        <label class="radio"> <input type="radio" name="star" value="4" id="s4"><span>4 ดาว (<?php echo mysqli_num_rows($rs_4) ?>)</span></label>
                        <label class="radio"> <input type="radio" name="star" value="3" id="s3"><span>3 ดาว (<?php echo mysqli_num_rows($rs_3) ?>)</span></label>
                        <label class="radio"> <input type="radio" name="star" value="2" id="s2"><span>2 ดาว (<?php echo mysqli_num_rows($rs_2) ?>)</span></label>
                        <label class="radio"> <input type="radio" name="star" value="1" id="s1"><span>1 ดาว (<?php echo mysqli_num_rows($rs_1) ?>)</span></label>
                    </form>

                </div>
            </div>


            <div class="mt-4" id="review_content"></div>
        </div>
    </section>
</body>
<?php
if (isset($_GET['action']) && $_GET['action'] == 'delete') {
    $id = $_GET['id'];
    echo "<script>";
    echo "
    Swal.fire({
        title: 'คุณต้องการลบความคิดเห็น?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'ตกลง',
        cancelButtonText: 'ยกเลิก'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = 'review.php?action=confirm&id=" . $id . "'
        }else{
            window.location.href = 'review.php'
        }
    })
    ";
    echo "</script>";
}
if (isset($_GET['action']) && $_GET['action'] == 'confirm') {
    $id = $_GET['id'];
    $sql = "DELETE FROM `review` WHERE `rv_id`='$id'";
    $rs = mysqli_query($conn, $sql);
    if ($rs) {
        echo "<script>
            Swal.fire({
                title: 'ลบความคิดเห็นสำเร็จ',
                icon: 'success',
                showConfirmButton: false,
                timer: 2500,
            }).then(function() {
                window.location = 'review.php';
            });
            </script>";
    }
}
?>
<script>
    $('input[name=star]').on('click', () => {
        if ($('#s5').is(':checked')) {
            $('.star1').hide();
            $('.star2').hide();
            $('.star3').hide();
            $('.star4').hide();
            $('.star5').show();
        } else if ($('#s4').is(':checked')) {
            $('.star1').hide();
            $('.star2').hide();
            $('.star3').hide();
            $('.star4').show();
            $('.star5').hide();
        } else if ($('#s3').is(':checked')) {
            $('.star1').hide();
            $('.star2').hide();
            $('.star3').show();
            $('.star4').hide();
            $('.star5').hide();
        } else if ($('#s2').is(':checked')) {
            $('.star1').hide();
            $('.star2').show();
            $('.star3').hide();
            $('.star4').hide();
            $('.star5').hide();
        } else if ($('#s1').is(':checked')) {
            $('.star1').show();
            $('.star2').hide();
            $('.star3').hide();
            $('.star4').hide();
            $('.star5').hide();
        } else {
            $('.star1').show();
            $('.star2').show();
            $('.star3').show();
            $('.star4').show();
            $('.star5').show();
        }
    });

    $(document).ready(function() {

        var rating_data = 0;

        $('#add_review').click(function() {

            $('#review_modal').modal('show');

        });

        $(document).on('mouseenter', '.submit_star', function() {

            var rating = $(this).data('rating');

            reset_background();

            for (var count = 1; count <= rating; count++) {

                $('#submit_star_' + count).addClass('text-warning');

            }

        });

        function reset_background() {
            for (var count = 1; count <= 5; count++) {

                $('#submit_star_' + count).addClass('star-light');

                $('#submit_star_' + count).removeClass('text-warning');

            }
        }

        $(document).on('mouseleave', '.submit_star', function() {

            reset_background();

            for (var count = 1; count <= rating_data; count++) {

                $('#submit_star_' + count).removeClass('star-light');

                $('#submit_star_' + count).addClass('text-warning');
            }

        });

        $(document).on('click', '.submit_star', function() {

            rating_data = $(this).data('rating');

        });

        $('#save_review').click(function() {

            var user_name = $('#user_name').val();

            var user_review = $('#user_review').val();

            if (user_name == '' || user_review == '') {
                Swal.fire({
                    title: 'กรุณากรอกข้อมูลให้ครบถ้วน',
                    icon: 'error',
                    showConfirmButton: false,
                    timer: 2000,
                }).then(function() {
                    location.reload();
                });
                return false;
            } else {
                Swal.fire({
                    title: 'แสดงความคิดเห็นสำเร็จ',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 2000,
                }).then(function() {
                    location.reload();
                });
                $.ajax({
                    url: "submit_rating.php",
                    method: "POST",
                    data: {
                        rating_data: rating_data,
                        user_name: user_name,
                        user_review: user_review
                    },
                    success: function(data) {
                        load_rating_data();

                        // alert(data);
                    }
                })
            }

        });

        load_rating_data();

        function load_rating_data() {
            $.ajax({
                url: "submit_rating.php",
                method: "POST",
                data: {
                    action: 'load_data'
                },
                dataType: "JSON",
                success: function(data) {
                    $('#average_rating').text(data.average_rating);
                    $('#total_review').text(data.total_review);

                    var count_star = 0;

                    $('.main_star').each(function() {
                        count_star++;
                        if (Math.ceil(data.average_rating) >= count_star) {
                            $(this).addClass('text-warning');
                            $(this).addClass('star-light');
                        }
                    });

                    $('#total_five_star_review').text(data.five_star_review);

                    $('#total_four_star_review').text(data.four_star_review);

                    $('#total_three_star_review').text(data.three_star_review);

                    $('#total_two_star_review').text(data.two_star_review);

                    $('#total_one_star_review').text(data.one_star_review);

                    $('#five_star_progress').css('width', (data.five_star_review / data.total_review) * 100 + '%');

                    $('#four_star_progress').css('width', (data.four_star_review / data.total_review) * 100 + '%');

                    $('#three_star_progress').css('width', (data.three_star_review / data.total_review) * 100 + '%');

                    $('#two_star_progress').css('width', (data.two_star_review / data.total_review) * 100 + '%');

                    $('#one_star_progress').css('width', (data.one_star_review / data.total_review) * 100 + '%');

                    if (data.review_data.length > 0) {
                        var html = '';

                        for (var count = 0; count < data.review_data.length; count++) {
                            html += '<div class="card p-4 mb-2 star' + data.review_data[count].rating + '">';
                            html += '<div class="row">';
                            html += '<a href="?action=delete&id=' + data.review_data[count].id + '"><p class="text-right mb-0">ลบ</p></a>';
                            html += '<div class="col-md-1 col-sm-4 col-xs-12"><div class="rounded-circle bg-danger text-white" style="height:60px; width:60px; padding-top:12px;"><h3 class="text-center">' + data.review_data[count].user_name.charAt(0) + '</h3></div>';
                            html += '</div>';
                            html += '<div class="col-md-11 col-sm-4 col-xs-12">';
                            html += '<div class="row">';
                            html += '<div class="col-md-9 col-sm-12 col-xs-12 text-left"><b>' + data.review_data[count].user_name + '</b><br>';
                            for (var star = 1; star <= 5; star++) {
                                var class_name = '';

                                if (data.review_data[count].rating >= star) {
                                    class_name = 'text-warning';
                                } else {
                                    class_name = 'star-light';
                                }

                                html += '<i class="fas fa-star ' + class_name + ' mr-1"></i>';
                            }
                            html += '</div>';
                            html += '<div class="col-md-3 col-sm-12 col-xs-12 text-left">' + data.review_data[count].datetime;
                            html += '</div>';
                            html += '</div>';
                            html += '<div class="row pl-3 pt-3">';
                            html += data.review_data[count].user_review;
                            html += '</div>';
                            html += '</div>';
                            html += '</div>';
                            html += '</div>';
                            html += '</div>';
                            html += '</div>';
                        }

                        $('#review_content').html(html);
                    }
                }
            })
        }

    });
</script>

</html>