<?php 
require 'sendMessage.php';
include "./connectDB/connectDB.php";
session_start();
$idCard = $_GET['idCard'];
// หาlineของ user
$sql = "SELECT `lineId` FROM `persons` WHERE `ps_idCard`= $idCard";
$rs = mysqli_query($conn,$sql);
$row =mysqli_fetch_row($rs);
// query ข้อมูลการจองมาแสดง
$sql2 = "SELECT ql_no FROM queue_list WHERE ps_idCard ='$idCard' AND `ql_status` = '0'";
$rs2 = mysqli_query($conn,$sql2);
$row2 =mysqli_fetch_row($rs2);

$line =$row[0];
$flexDataJson = '{
  "type": "flex",
  "altText": "จองคิวสำเร็จ",
  "contents": {
    "type": "bubble",
    "size": "giga",
    "header": {
      "type": "box",
      "layout": "horizontal",
      "contents": [
        {
          "type": "box",
          "layout": "vertical",
          "contents": [
            {
              "type": "text",
              "text": "Hod-Q",
              "color": "#ffffff",
              "size": "xxl",
              "align": "center",
              "style": "normal",
              "weight": "bold",
              "margin": "none"
            }
          ],
          "cornerRadius": "200px"
        }
      ],
      "spacing": "md"
    },
    "body": {
      "type": "box",
      "layout": "vertical",
      "contents": [
        {
          "type": "box",
          "layout": "vertical",
          "contents": [
            {
              "type": "box",
              "layout": "vertical",
              "contents": [
                {
                  "type": "box",
                  "layout": "vertical",
                  "contents": [
                    {
                      "type": "text",
                      "text": "คิวที่",
                      "size": "3xl",
                      "align": "center",
                      "weight": "bold"
                    }
                  ],
                  "paddingAll": "10px"
                },
                {
                  "type": "box",
                  "layout": "vertical",
                  "contents": [
                    {
                      "type": "text",
                      "text": "'.$row2[0].'",
                      "align": "center",
                      "size": "4xl",
                      "weight": "bold"
                    }
                  ],
                  "backgroundColor": "#fcca19",
                  "cornerRadius": "20px"
                },
                {
                "type": "text",
                "text": "สถานะ : รอเรียกคิว",
                "align": "center",
                "weight": "bold",
                "size": "lg",
                "color": "#008000"
              },
              {
                "type": "text",
                "text": "ชื่อ : '.$_SESSION['name'].'",
                "wrap": true, 
                "align": "start"
              },
              {
                "type": "text",
                "text": "เลขบัตรปประชาชน : '.$idCard.'",
                "wrap": true, 
                "align": "start"
              },
                {
                  "type": "text",
                  "text": "แผนก : '.$_SESSION['department_name_line'].'",
                  "wrap": true, 
                  "align": "start"
                },
                {
                  "type": "text",
                  "text": "วันที่ต้องการจอง : '.$_SESSION['date_line'].'",
                  "align": "start"
                },
                {
                  "type": "text",
                  "text": "ช่วงเวลาที่ต้องการจอง : '.$_SESSION['timezone_line'].'",
                  "align": "start"
                }
              ],
              "spacing": "md"
            }
          ],
          "borderWidth": "3px",
          "borderColor": "#000000",
          "cornerRadius": "20px",
          "paddingAll": "20px"
        },
        {
          "type": "box",
          "layout": "vertical",
          "contents": [
            {
              "type": "text",
              "text": "กรุณาเดินทางมาถึงที่หน้าห้องตรวจก่อนถึงคิวของท่าน 15 นาที หากเรียกคิวของท่านแล้วท่านไม่อยู่ ทางเราจะขอสงวนสิทธิในการข้ามคิวของท่าน",
              "wrap": true,
              "color": "#FFFFFF",
              "align": "center",
              "size": "sm"
            }
          ],
          "backgroundColor": "#FF0000",
          "cornerRadius": "10px",
          "paddingAll": "10px"
        }
      ],
      "paddingAll": "20px",
      "spacing": "md"
    },
    "styles": {
      "header": {
        "backgroundColor": "#232a47"
      }
    }
  }
}';
$flexDataJsonDeCode = json_decode($flexDataJson,true);

$datas['url'] = "https://api.line.me/v2/bot/message/push";
$datas['token'] = "/t9GNXI6cyZEyhs3GHA3tZFNq5V+uEsj8cMjk0XewEMudnOqAm/2Ccbt9Zp91mc0Rs98/YGvvVosj33HUNP4nIxmm9RQg788NKMU8vLqdlmW4RuBlg+Ldl1rTygQVrY7hNJyiORzg1I+UHJSoVhMfgdB04t89/1O/w1cDnyilFU=";
$messages['to'] = "$line";
$messages['messages'][] = $flexDataJsonDeCode;
$encodeJson = json_encode($messages);
sentMessage($encodeJson,$datas);
http_response_code(200);
echo "<script>window.location = './myQue.php'</script>";


?>