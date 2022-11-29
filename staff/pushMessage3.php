<?php
require 'sendMessage3.php';
include "../connectDB/connectDB.php";
session_start();
$idCard = $_GET['idCard'];
$ql_id = $_GET['ql_id'];
// หาlineของ user
$sql = "SELECT `lineId` FROM `persons` WHERE `ps_idCard`= $idCard";
$rs = mysqli_query($conn, $sql);
$row = mysqli_fetch_row($rs);
// ข้อมูลของคนไข้
$sql_data = "SELECT 
queue_list.ql_no,
persons.ps_Fname,
persons.ps_Lname,
persons.ps_idCard,
department.dp_name,
queue.q_date,
queue.q_time 
FROM `queue_list` 
JOIN persons ON queue_list.ps_idCard = persons.ps_idCard 
JOIN queue ON queue_list.q_id = queue.q_id 
JOIN department ON queue.dp_id = department.dp_id
WHERE  queue_list.ql_id = '$ql_id'";
$rs_data = mysqli_query($conn, $sql_data);
$data = mysqli_fetch_row($rs_data);

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
  return "$strDay $strMonthThai $strYear";
}

// token line
$line = $row[0];
if (isset($_GET['action']) && $_GET['action'] == 'cancel') {
  $flexDataJson = '{
    "type": "flex",
    "altText": "คิวของคุณถูกยกเลิก",
    "contents": {
      "type": "bubble",
      "size": "mega",
      "header": {
        "type": "box",
        "layout": "vertical",
        "contents": [
          {
            "type": "box",
            "layout": "horizontal",
            "contents": [
              {
                "type": "text",
                "text": "คิวถูกยกเลิก",
                "align": "start",
                "action": {
                  "type": "message",
                  "label": "action",
                  "text": "hello"
                },
                "color": "#CC0000",
                "contents": [],
                "weight": "bold"
              },
              {
                "type": "text",
                "text": "Hod-Q",
                "align": "end",
                "weight": "bold",
                "color": "#232A47",
                "size": "lg",
                "margin": "none"
              }
            ]
          }
        ],
        "margin": "none"
      },
      "body": {
        "type": "box",
        "layout": "vertical",
        "contents": [
          {
            "type": "box",
            "layout": "vertical",
            "contents": [],
            "backgroundColor": "#CCFFFF"
          },
          {
            "type": "text",
            "text": "คิวที่ ' . $data[0] . '",
            "weight": "bold",
            "size": "xl",
            "margin": "md",
            "align": "center"
          },
          {
            "type": "separator",
            "margin": "xxl"
          },
          {
            "type": "box",
            "layout": "vertical",
            "margin": "xxl",
            "spacing": "sm",
            "contents": [
              {
                "type": "box",
                "layout": "vertical",
                "contents": [
                  {
                    "type": "text",
                    "text": "ชื่อ : ' . $data[1] . " " . $data[2] . '",
                    "color": "#555555"
                  },
                  {
                    "type": "text",
                    "text": "เลขบัตรประชาชน : ' . $data[3] . '"
                  },
                  {
                    "type": "text",
                    "text": "แผนก : ' . $data[4] . '"
                  },
                  {
                    "type": "text",
                    "text": "วันที่ต้องการจอง : ' .DateThai($data[5]) . '"
                  },
                  {
                    "type": "text",
                    "text": "ช่วงเวลาที่ต้องการจอง : ' . $data[6] . '"
                  }
                ]
              }
            ]
          },
          {
            "type": "separator",
            "margin": "xxl"
          },
          {
            "type": "box",
            "layout": "vertical",
            "margin": "md",
            "contents": [
              {
                "type": "text",
                "text": "คิวของคุณถูกยกเลิกโดยเจ้าหน้าที่",
                "align": "center",
                "color": "#CC0000"
              },
              {
                "type": "text",
                "text": "เนื่องจากคุณไม่มาตามเวลานัด",
                "color": "#CC0000",
                "align": "center"
              }
            ]
          }
        ]
      },
      "styles": {
        "header": {
          "backgroundColor": "#FFCCCC",
          "separator": true
        },
        "footer": {
          "separator": true
        }
      }
    }
  }';
  $flexDataJsonDeCode = json_decode($flexDataJson, true);

  $datas['url'] = "https://api.line.me/v2/bot/message/push";
  $datas['token'] = "/t9GNXI6cyZEyhs3GHA3tZFNq5V+uEsj8cMjk0XewEMudnOqAm/2Ccbt9Zp91mc0Rs98/YGvvVosj33HUNP4nIxmm9RQg788NKMU8vLqdlmW4RuBlg+Ldl1rTygQVrY7hNJyiORzg1I+UHJSoVhMfgdB04t89/1O/w1cDnyilFU=";
  $messages['to'] = "$line";
  $messages['messages'][] = $flexDataJsonDeCode;
  $encodeJson = json_encode($messages);
  sentMessage2($encodeJson, $datas);
  http_response_code(200);
  echo "<script>window.location = './reserved.php'</script>";
} elseif (isset($_GET['action']) && $_GET['action'] == 'call') {
  $flexDataJson = '{
  "type": "flex",
  "altText": "ถึงคิวของคุณแล้ว",
  "contents": {
    "type": "bubble",
    "size": "mega",
    "body": {
      "type": "box",
      "layout": "vertical",
      "contents": [
        {
          "type": "text",
          "text": "คิวที่ ' . $data[0] . '",
          "weight": "bold",
          "size": "xl",
          "margin": "md",
          "align": "center"
        },
        {
          "type": "text",
          "text": "ถึงคิวของคุณแล้ว",
          "color": "#006600",
          "size": "xl",
          "align": "center",
          "weight": "bold"
        },
        {
          "type": "separator",
          "margin": "xxl"
        },
        {
          "type": "box",
          "layout": "vertical",
          "margin": "xxl",
          "spacing": "sm",
          "contents": [
            {
              "type": "box",
              "layout": "vertical",
              "contents": [
                {
                  "type": "text",
                  "text": "ชื่อ : ' . $data[1] . " " . $data[2] . '",
                  "color": "#555555"
                },
                {
                  "type": "text",
                  "text": "เลขบัตรประชาชน : ' . $data[3] . '"
                },
                {
                  "type": "text",
                  "text": "แผนก : ' . $data[4] . '"
                },
                {
                  "type": "text",
                  "text": "วันที่ต้องการจอง : ' . DateThai($data[5]) . '"
                },
                {
                  "type": "text",
                  "text": "ช่วงเวลาที่ต้องการจอง : ' . $data[6] . '"
                }
              ]
            }
          ]
        },
        {
          "type": "separator",
          "margin": "xxl"
        },
        {
          "type": "box",
          "layout": "vertical",
          "margin": "md",
          "contents": [
            {
              "type": "text",
              "text": "หากเรียกคิวของท่านแล้วท่านไม่อยู่ ",
              "align": "center",
              "color": "#CC0000"
            },
            {
              "type": "text",
              "text": "ทางเราจะขอสงวนสิทธิในการข้ามคิว",
              "align": "center",
              "color": "#CC0000"
            }
          ]
        }
      ]
    },
    "styles": {
      "header": {
        "backgroundColor": "#CCFFCC",
        "separator": true
      },
      "footer": {
        "separator": true,
        "backgroundColor": "#A0A0A0"
      }
    }
  }
  }';
  $flexDataJsonDeCode = json_decode($flexDataJson, true);

  $datas['url'] = "https://api.line.me/v2/bot/message/push";
  $datas['token'] = "/t9GNXI6cyZEyhs3GHA3tZFNq5V+uEsj8cMjk0XewEMudnOqAm/2Ccbt9Zp91mc0Rs98/YGvvVosj33HUNP4nIxmm9RQg788NKMU8vLqdlmW4RuBlg+Ldl1rTygQVrY7hNJyiORzg1I+UHJSoVhMfgdB04t89/1O/w1cDnyilFU=";
  $messages['to'] = "$line";
  $messages['messages'][] = $flexDataJsonDeCode;
  $encodeJson = json_encode($messages);
  sentMessage2($encodeJson, $datas);
  http_response_code(200);
  echo "<script>window.location = './reserved.php'</script>";
}
