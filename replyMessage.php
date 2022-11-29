<?php
//สร้างไฟล์log.txtแล้วนำข้อมูลที่ได้จากไลน์ไปเก็บไว้
file_put_contents('log.txt', file_get_contents('php://input') . PHP_EOL, FILE_APPEND);
 $LINEData = file_get_contents('php://input');//อ่านไฟล์แล้วเก็บไว้ในตัวแปร$LINEData
 $jsonData = json_decode($LINEData,true);//แปลงข้อมูลจากjsonให้เป็นphp
 $replyToken = $jsonData["events"][0]["replyToken"];
 $userId = $jsonData["events"][0]["source"]["userId"];
 $text = $jsonData["events"][0]["message"]["text"];

 function sendMessage($replyJson, $token){
         $ch = curl_init($token["URL"]);//สร้างcurl resource ด้วยฟังก์ชันcurl_int()
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
         curl_setopt($ch, CURLINFO_HEADER_OUT, true);
         curl_setopt($ch, CURLOPT_POST, true);
         curl_setopt($ch, CURLOPT_HTTPHEADER, array(
             'Content-Type: application/json',
             'Authorization: Bearer ' . $token["AccessToken"])
             );
         curl_setopt($ch, CURLOPT_POSTFIELDS, $replyJson);
         $result = curl_exec($ch);//เริ่มการทำงาน
         curl_close($ch);//ปิดการทำงาน
   return $result;
 }
 
 if ($text == "แผนที่"){
   $message = '{
  "type": "location",
  "title": "รพ.สต. แกเปะ กาฬสินธุ์",
  "address": "ถนนชนบท กส. 5014 ตำบลเชียงเครือ อำเภอเมืองกาฬสินธุ์ จังหวัดกาฬสินธุ์",
  "latitude": 16.398217205616522,
  "longitude": 103.6430152123487
     }';
     $replymessage = json_decode($message);
 }

//  else{
//   $message = '{
//       "type" : "text",
//       "text" : "ไม่มีข้อมูลที่ต้องการ"
//       }';
//       $replymessage = json_decode($message);
//  }
 
 //ข้อมูลการทำ Post Request
 $lineData['URL'] = "https://api.line.me/v2/bot/message/reply";
 $lineData['AccessToken'] = "/t9GNXI6cyZEyhs3GHA3tZFNq5V+uEsj8cMjk0XewEMudnOqAm/2Ccbt9Zp91mc0Rs98/YGvvVosj33HUNP4nIxmm9RQg788NKMU8vLqdlmW4RuBlg+Ldl1rTygQVrY7hNJyiORzg1I+UHJSoVhMfgdB04t89/1O/w1cDnyilFU=";
 $replyJson["replyToken"] = $replyToken;
 $replyJson["messages"][0] = $replymessage;
 
 $encodeJson = json_encode($replyJson);//ทำให้เป็น json data
 
 $results = sendMessage($encodeJson,$lineData);
 echo $results;
 http_response_code(200);
 
?>