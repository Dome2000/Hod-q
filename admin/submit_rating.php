
<?php

//submit_rating.php

$connect = new PDO("mysql:host=localhost;dbname=hodqggx_project", "hodqggx_dome", "Dome261043");
$connect ->exec("set names utf8");
date_default_timezone_set('Asia/Bangkok');

function DateThai($strDate)
{
	$strYear = date("Y", strtotime($strDate)) + 543;
	$strMonth = date("n", strtotime($strDate));
	$strDay = date("j", strtotime($strDate));
	$strHour = date("H", strtotime($strDate));
	$strMinute = date("i", strtotime($strDate));
	$strSeconds = date("s", strtotime($strDate));
	$strMonthCut = array("", "ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค.");
	$strMonthThai = $strMonthCut[$strMonth];

	$strTime = date("H:i", strtotime($strDate));
	return "$strDay $strMonthThai $strYear $strTime ";
}

if (isset($_POST["rating_data"])) {

	$data = array(
		':user_name'		=>	$_POST["user_name"],
		':user_rating'		=>	$_POST["rating_data"],
		':user_review'		=>	$_POST["user_review"],
		':datetime'			=>	date("Y-m-d H:i:s")
	);


	$query = "
	INSERT INTO review(rv_score, rv_comment, rv_datetime, ps_idCard) 
	VALUES (:user_rating,:user_review,:datetime,:user_name)";

	$statement = $connect->prepare($query);

	$statement->execute($data);
}

if (isset($_POST["action"])) {
	$average_rating = 0;
	$total_review = 0;
	$five_star_review = 0;
	$four_star_review = 0;
	$three_star_review = 0;
	$two_star_review = 0;
	$one_star_review = 0;
	$total_user_rating = 0;
	$review_content = array();

	$query = "SELECT 
	review.rv_id AS rv_id,
	review.rv_score AS rv_score,
	review.rv_comment AS rv_comment,
	review.rv_datetime AS rv_datetime,
	persons.ps_Fname AS ps_idCard
	FROM review 
	JOIN persons ON review.ps_idCard = persons.ps_idCard 
	ORDER BY review.rv_id DESC
	";

	$result = $connect->query($query, PDO::FETCH_ASSOC);
	foreach ($result as $row) {
		$review_content[] = array(
			'id'			=>  $row["rv_id"],
			'user_name'		=>	$row["ps_idCard"],
			'user_review'	=>	$row["rv_comment"],
			'rating'		=>	$row["rv_score"],
			'datetime'		=>	DateThai($row["rv_datetime"])
		);

		if ($row["rv_score"] == '5') {
			$five_star_review++;
		}

		if ($row["rv_score"] == '4') {
			$four_star_review++;
		}

		if ($row["rv_score"] == '3') {
			$three_star_review++;
		}

		if ($row["rv_score"] == '2') {
			$two_star_review++;
		}

		if ($row["rv_score"] == '1') {
			$one_star_review++;
		}

		$total_review++;

		$total_user_rating = $total_user_rating + $row["rv_score"];
	}

	$average_rating = $total_user_rating / $total_review;

	$output = array(
		'average_rating'	=>	number_format($average_rating, 1),
		'total_review'		=>	$total_review,
		'five_star_review'	=>	$five_star_review,
		'four_star_review'	=>	$four_star_review,
		'three_star_review'	=>	$three_star_review,
		'two_star_review'	=>	$two_star_review,
		'one_star_review'	=>	$one_star_review,
		'review_data'		=>	$review_content
	);

	echo json_encode($output);
}

?>