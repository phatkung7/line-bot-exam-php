<?php
    $accessToken = "BFp/k4llCyFwkRAb8hegDLslqqkiN1DGRrjmy5A5S4I7B/pCtGlRmgiEcI0nJH4rn2x+nwtwKPbkpiakQRzG9boMvYi+zulp6XXp2fI7U+roDbdhUN8P7V6y+MI1EQNkPOzMswduTYeyarU/gti+egdB04t89/1O/w1cDnyilFU=";//copy Channel access token ตอนที่ตั้งค่ามาใส่

    $content = file_get_contents('php://input');
    $arrayJson = json_decode($content, true);

    $arrayHeader = array();
    $arrayHeader[] = "Content-Type: application/json";
    $arrayHeader[] = "Authorization: Bearer {$accessToken}";

    //รับข้อความจากผู้ใช้
    $message = $arrayJson['events'][0]['message']['text'];
    // Get userID for Permission
    $userID = $arrayJson['events'][0]['source']['userId'];

    switch ($message) {
    case "ผู้ใช้งานใหม่":
            $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
            $arrayPostData['messages'][0]['type'] = "text";
            $arrayPostData['messages'][0]['text'] = "รหัสผู้ใช้งานของท่านคือ ".$userID. " กรุณานำรหัสที่แสดงไปลงทะเบียนในเว็ปไซต์";
            replyMsg($arrayHeader,$arrayPostData);
        break;
     case "estimates การเบิกจ่าย":
            $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
            $image_url = "https://flu.ddc.moph.go.th/img-bot/estimates-1.jpg";
            $arrayPostData['messages'][0]['type'] = "image";
            $arrayPostData['messages'][0]['originalContentUrl'] = $image_url;
            $arrayPostData['messages'][0]['previewImageUrl'] = $image_url;
            replyMsg($arrayHeader,$arrayPostData);
        break;
      case "cognos การเบิกจ่าย":
            $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
            $image_url1 = "https://flu.ddc.moph.go.th/img-bot/cognos-1.bmp";
            $arrayPostData['messages'][0]['type'] = "image";
            $arrayPostData['messages'][0]['originalContentUrl'] = $image_url1;
            $arrayPostData['messages'][0]['previewImageUrl'] = $image_url1;
            $image_url2 = "https://flu.ddc.moph.go.th/img-bot/cognos-2.bmp";
            $arrayPostData['messages'][1]['type'] = "image";
            $arrayPostData['messages'][1]['originalContentUrl'] = $image_url2;
            $arrayPostData['messages'][1]['previewImageUrl'] = $image_url2;
            replyMsg($arrayHeader,$arrayPostData);
        break;
    }
//     case "กรมควบคุมโรค":
//         $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
//         $arrayPostData['messages'][0]['type'] = "text";
//         $arrayPostData['messages'][0]['text'] = "http://ddc.moph.go.th";
//         replyMsg($arrayHeader,$arrayPostData);
//         break;
//     case "ระบาด":
//         $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
//         $arrayPostData['messages'][0]['type'] = "text";
//         $arrayPostData['messages'][0]['text'] = "https://ddc.moph.go.th/th/site/office/view/boe";
//         // $image_url = "http://203.157.15.32/chart/x1551426740.png";
//         // $arrayPostData['messages'][1]['type'] = "image";
//         // $arrayPostData['messages'][1]['originalContentUrl'] = $image_url;
//         // $arrayPostData['messages'][1]['previewImageUrl'] = $image_url;
// //         $image_url = "https://upload.wikimedia.org/wikipedia/commons/thumb/1/14/Gatto_europeo4.jpg/250px-Gatto_europeo4.jpg";
// //         $arrayPostData['messages'][1]['type'] = "image";
// //         $arrayPostData['messages'][1]['originalContentUrl'] = $image_url;
// //         $arrayPostData['messages'][1]['previewImageUrl'] = $image_url;
//         replyMsg($arrayHeader,$arrayPostData);
//         break;
//     case "สำนักระบาดวิทยา":
//         if($userID == 'U8483f2dfb2a7c1e179ad5cf183743a05'){
//           $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
//           $arrayPostData['messages'][0]['type'] = "text";
//           $arrayPostData['messages'][0]['text'] = "http://203.157.15.110/BoeApps/";
//           // $arrayPostData['messages'][1]['type'] = "sticker";
//           // $arrayPostData['messages'][1]['packageId'] = "2";
//           // $arrayPostData['messages'][1]['stickerId'] = "171";
//           $image_url = "https://flu.ddc.moph.go.th/img-bot/line-bot.png";
//           $arrayPostData['messages'][1]['type'] = "image";
//           $arrayPostData['messages'][1]['originalContentUrl'] = $image_url;
//           $arrayPostData['messages'][1]['previewImageUrl'] = $image_url;
//           replyMsg($arrayHeader,$arrayPostData);
//         }else{
//           $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
//           $arrayPostData['messages'][0]['type'] = "text";
//           $arrayPostData['messages'][0]['text'] = "https://ddc.moph.go.th/th/site/office/view/boe";
//           replyMsg($arrayHeader,$arrayPostData);
//         }
//         break;
//     case "สำนัก ต":
//         $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
//         $arrayPostData['messages'][0]['type'] = "text";
//         $arrayPostData['messages'][0]['text'] = "https://ddc.moph.go.th/th/site/office/view/thaigcd";
//         replyMsg($arrayHeader,$arrayPostData);
//         break;
//     case "สำนักโรคติดต่อทั่วไป":
//         $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
//         $arrayPostData['messages'][0]['type'] = "text";
//         $arrayPostData['messages'][0]['text'] = "https://ddc.moph.go.th/th/site/office/view/thaigcd";
//         replyMsg($arrayHeader,$arrayPostData);
//         break;
//     }


    //
    // #ตัวอย่าง Message Type "Text"
    // if($message == "สวัสดี"){
    //     $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
    //     $arrayPostData['messages'][0]['type'] = "text";
    //     $arrayPostData['messages'][0]['text'] = "สวัสดีจ้าาา";
    //     replyMsg($arrayHeader,$arrayPostData);
    // }
    // #ตัวอย่าง Message Type "Sticker"
    // else if($message == "ฝันดี"){
    //     $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
    //     $arrayPostData['messages'][0]['type'] = "sticker";
    //     $arrayPostData['messages'][0]['packageId'] = "2";
    //     $arrayPostData['messages'][0]['stickerId'] = "46";
    //     replyMsg($arrayHeader,$arrayPostData);
    // }
    // #ตัวอย่าง Message Type "Image"
    // else if($message == "รูปน้องแมว"){
    //     $image_url = "https://i.pinimg.com/originals/cc/22/d1/cc22d10d9096e70fe3dbe3be2630182b.jpg";
    //     $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
    //     $arrayPostData['messages'][0]['type'] = "image";
    //     $arrayPostData['messages'][0]['originalContentUrl'] = $image_url;
    //     $arrayPostData['messages'][0]['previewImageUrl'] = $image_url;
    //     replyMsg($arrayHeader,$arrayPostData);
    // }
    // #ตัวอย่าง Message Type "Location"
    // else if($message == "พิกัดสยามพารากอน"){
    //     $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
    //     $arrayPostData['messages'][0]['type'] = "location";
    //     $arrayPostData['messages'][0]['title'] = "สยามพารากอน";
    //     $arrayPostData['messages'][0]['address'] =   "13.7465354,100.532752";
    //     $arrayPostData['messages'][0]['latitude'] = "13.7465354";
    //     $arrayPostData['messages'][0]['longitude'] = "100.532752";
    //     replyMsg($arrayHeader,$arrayPostData);
    // }
    // #ตัวอย่าง Message Type "Text + Sticker ใน 1 ครั้ง"
    // else if($message == "ลาก่อน"){
    //     $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
    //     $arrayPostData['messages'][0]['type'] = "text";
    //     $arrayPostData['messages'][0]['text'] = "อย่าทิ้งกันไป";
    //     $arrayPostData['messages'][1]['type'] = "sticker";
    //     $arrayPostData['messages'][1]['packageId'] = "1";
    //     $arrayPostData['messages'][1]['stickerId'] = "131";
    //     replyMsg($arrayHeader,$arrayPostData);
    // }
function replyMsg($arrayHeader,$arrayPostData){
        $strUrl = "https://api.line.me/v2/bot/message/reply";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$strUrl);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $arrayHeader);
        curl_setopt($ch, CURLOPT_POSTFIELDS,json_encode($arrayPostData));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $result = curl_exec($ch);
        curl_close ($ch);
}
   exit;
?>
