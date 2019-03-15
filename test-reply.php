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
    // Query String
    $q = (!empty($_GET['q'])) ? $_GET['q']  : '0' ;

    switch ($message) {
    case "สถานการณ์โรค" :
	    $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
            $arrayPostData['messages'][0]['type'] = "text";
            $arrayPostData['messages'][0]['text'] = "Hello Quick Reply!!!";
	    $arrayPostData['messages'][0]['quickReply']['items'][0]['type'] = "action";
            $arrayPostData['messages'][0]['quickReply']['items'][0]['action']['type'] = "postback";  
	    $arrayPostData['messages'][0]['quickReply']['items'][0]['action']['label'] = "ไข้เลือดออก"; 
	    $arrayPostData['messages'][0]['quickReply']['items'][0]['action']['data'] = "q=1";
            $arrayPostData['messages'][0]['quickReply']['items'][0]['action']['displayText'] = "สถานการณ์-โรคเลือดออก";
	    $arrayPostData['messages'][0]['quickReply']['items'][1]['type'] = "action";
            $arrayPostData['messages'][0]['quickReply']['items'][1]['action']['type'] = "postback";  
	    $arrayPostData['messages'][0]['quickReply']['items'][1]['action']['label'] = "มือเท้าปาก"; 
	    $arrayPostData['messages'][0]['quickReply']['items'][1]['action']['data'] = "q=2";
            $arrayPostData['messages'][0]['quickReply']['items'][1]['action']['displayText'] = "สถานการณ์-โรคมือเท้าปาก";
		    
// 	    $arrayPostData['messages'][0]['quickReply']['items'][0]['type'] = "action";
//             $arrayPostData['messages'][0]['quickReply']['items'][0]['action']['type'] = "cameraRoll";  
// 	    $arrayPostData['messages'][0]['quickReply']['items'][0]['action']['label'] = "Camera Roll";
// 	    $arrayPostData['messages'][0]['quickReply']['items'][1]['type'] = "action";
//             $arrayPostData['messages'][0]['quickReply']['items'][1]['action']['type'] = "location";  
// 	    $arrayPostData['messages'][0]['quickReply']['items'][1]['action']['label'] = "Location";
	    replyMsg($arrayHeader,$arrayPostData);	    
	break;
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
       case "เวร sat wk 10":
            $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
            $text_msg = "เวร SAT - wk10 มีรายชื่อดังนี้"."\n";
            $text_msg .= "1. พญ.ภาวินี ด้วงเงิน สำนักระบาดวิทยา - Supervisor\n";
            $text_msg .= "2. นางสาวธนัญญา สุทธวงค์ สำนักระบาดวิทยา (FETH) - Supervisor Assistant\n";
            $text_msg .= "3. นางอินท์ฉัตร สุขเกษม สำนักระบาดวิทยา (FETH) - Incharge 1\n";
            $text_msg .= "4.นางสาวณัฐกฤตา บริบูรณ์ สำนักโรคไม่ติดต่อ - Incharge 2\n";
            $text_msg .= "5.นางสาวกนกอร งามนัก ส.ควบคุมเครื่องดื่มแอลกอฮอล์ - Incharge 2\n";
            $text_msg .= "6. นางคัดคนางค์ ศรีพัฒนะพิพัฒน์ กอง.ครฉ. - SAT Manager";
            $arrayPostData['messages'][0]['type'] = "text";
            $arrayPostData['messages'][0]['text'] = $text_msg;
            replyMsg($arrayHeader,$arrayPostData);
        break;
        case "เวร jit wk 10":
            $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
            $text_msg = "เวร JIT - wk10 มีรายชื่อดังนี้"."\n";
            $text_msg .= "1. นพ.หิรัญวุฒิ แพร่คุณธรรม สำนักระบาดวิทยา - Chief\n";
            $text_msg .= "2. นางสาวกรรณิการ์ นางสาวกรรณิการ์ สำนักระบาดวิทยา - PI/Co-PI\n";
            $text_msg .= "3. นางสาวจรรยา อุปมัย กองควบคุมโรคและภัยสุขภาพฯ - PI/Co-PI 1\n";
            $text_msg .= "4. นางนิรมล ปัญสุวรรณ สำนักระบาดวิทยา - Interview 1\n";
            $text_msg .= "5. นายสมาน สยุมภูรุจินันท์ สำนักระบาดวิทยา - Incharge 2\n";
            $text_msg .= "6. นางสาวพรพรรณ กะตะจิตต์ สถาบันวิจัย จัดการความรู้ และมาตรฐานการควบคุมโรค - Interview 2\n";
	        $text_msg .= "7. นางสาวปรัชญา ประจง กองควบคุมโรคและภัยสุขภาพในภาวะฉุกเฉิน - Interview 2\n";
	        $text_msg .= "8. นางสาววรวรรณ กลิ่นสุภา กองโรคป้องกันด้วยวัคฉีน - Interview 2\n";
	        $text_msg .= "9. นางสาวเสาวนีย์ จุลวงค์ สถาบันเวชศาสตร์ป้องกัน - Interview 2\n";
	        $text_msg .= "10. นางสาวเพ็ญศิริ  ยะหัวดง สำนักระบาดวิทยา - Admin\n";
            $text_msg .= "11. นางสาวสุหทัย พลทางกลาง สำนักระบาดวิทยา - Admin\n";
	        $text_msg .= "12. นางสาวฉันท์ชนก อินทร์ศรี สำนักระบาดวิทยา - Admin";
            $arrayPostData['messages'][0]['type'] = "text";
            $arrayPostData['messages'][0]['text'] = $text_msg;
            replyMsg($arrayHeader,$arrayPostData);
        break;
        case "สถานการณ์ ไข้หวัดใหญ่":
            $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
            $image_url1 = "https://flu.ddc.moph.go.th/img-bot/flu-map.png";
            $arrayPostData['messages'][0]['type'] = "image";
            $arrayPostData['messages'][0]['originalContentUrl'] = $image_url1;
            $arrayPostData['messages'][0]['previewImageUrl'] = $image_url1;
            $image_url2 = "https://flu.ddc.moph.go.th/img-bot/flu-graph.png";
            $arrayPostData['messages'][1]['type'] = "image";
            $arrayPostData['messages'][1]['originalContentUrl'] = $image_url2;
            $arrayPostData['messages'][1]['previewImageUrl'] = $image_url2;
            replyMsg($arrayHeader,$arrayPostData);
        break;
        case "สถานการณ์ flu":
            $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
            $image_url1 = "https://flu.ddc.moph.go.th/img-bot/flu-map.png";
            $arrayPostData['messages'][0]['type'] = "image";
            $arrayPostData['messages'][0]['originalContentUrl'] = $image_url1;
            $arrayPostData['messages'][0]['previewImageUrl'] = $image_url1;
            $image_url2 = "https://flu.ddc.moph.go.th/img-bot/flu-graph.png";
            $arrayPostData['messages'][1]['type'] = "image";
            $arrayPostData['messages'][1]['originalContentUrl'] = $image_url2;
            $arrayPostData['messages'][1]['previewImageUrl'] = $image_url2;
            replyMsg($arrayHeader,$arrayPostData);
        break;
        case "สถานการณ์ ไข้เลือดออก":
            $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
            $image_url1 = "https://flu.ddc.moph.go.th/img-bot/dhf-map.png";
            $arrayPostData['messages'][0]['type'] = "image";
            $arrayPostData['messages'][0]['originalContentUrl'] = $image_url1;
            $arrayPostData['messages'][0]['previewImageUrl'] = $image_url1;
            $image_url2 = "https://flu.ddc.moph.go.th/img-bot/dhf-graph.png";
            $arrayPostData['messages'][1]['type'] = "image";
            $arrayPostData['messages'][1]['originalContentUrl'] = $image_url2;
            $arrayPostData['messages'][1]['previewImageUrl'] = $image_url2;
            replyMsg($arrayHeader,$arrayPostData);
        break;
        case "สถานการณ์ dhf":
            $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
            $image_url1 = "https://flu.ddc.moph.go.th/img-bot/dhf-map.png";
            $arrayPostData['messages'][0]['type'] = "image";
            $arrayPostData['messages'][0]['originalContentUrl'] = $image_url1;
            $arrayPostData['messages'][0]['previewImageUrl'] = $image_url1;
            $image_url2 = "https://flu.ddc.moph.go.th/img-bot/dhf-graph.png";
            $arrayPostData['messages'][1]['type'] = "image";
            $arrayPostData['messages'][1]['originalContentUrl'] = $image_url2;
            $arrayPostData['messages'][1]['previewImageUrl'] = $image_url2;
            replyMsg($arrayHeader,$arrayPostData);
        break;
        case "สถานการณ์ มือเท้าปาก":
            $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
            $image_url1 = "https://flu.ddc.moph.go.th/img-bot/hfm-map.png";
            $arrayPostData['messages'][0]['type'] = "image";
            $arrayPostData['messages'][0]['originalContentUrl'] = $image_url1;
            $arrayPostData['messages'][0]['previewImageUrl'] = $image_url1;
            $image_url2 = "https://flu.ddc.moph.go.th/img-bot/hfm-graph.png";
            $arrayPostData['messages'][1]['type'] = "image";
            $arrayPostData['messages'][1]['originalContentUrl'] = $image_url2;
            $arrayPostData['messages'][1]['previewImageUrl'] = $image_url2;
            replyMsg($arrayHeader,$arrayPostData);
        break;
        case "สถานการณ์ hfm":
            $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
            $image_url1 = "https://flu.ddc.moph.go.th/img-bot/hfm-map.png";
            $arrayPostData['messages'][0]['type'] = "image";
            $arrayPostData['messages'][0]['originalContentUrl'] = $image_url1;
            $arrayPostData['messages'][0]['previewImageUrl'] = $image_url1;
            $image_url2 = "https://flu.ddc.moph.go.th/img-bot/hfm-graph.png";
            $arrayPostData['messages'][1]['type'] = "image";
            $arrayPostData['messages'][1]['originalContentUrl'] = $image_url2;
            $arrayPostData['messages'][1]['previewImageUrl'] = $image_url2;
            replyMsg($arrayHeader,$arrayPostData);
        break;
        case "พรบ โรคติดต่อ":
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "https://ddc.moph.go.th/th/site/office_other/view/law/7/8";
        replyMsg($arrayHeader,$arrayPostData);
        break;
// 	default:
//         $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
//         $arrayPostData['messages'][0]['type'] = "text";
//         $arrayPostData['messages'][0]['text'] = "เราไม่เข้าใจคำถามของท่าน กรุณาใช้คำถามรูปแบบดังนี้ เช่น สถานการณ์ ไข้เลือดออก ,เวร sat wk 10 ,estimates การเบิกจ่าย";
//         replyMsg($arrayHeader,$arrayPostData);
    }

	if($q=="1"){
	    $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
            $image_url1 = "https://flu.ddc.moph.go.th/img-bot/dhf-map.png";
            $arrayPostData['messages'][0]['type'] = "image";
            $arrayPostData['messages'][0]['originalContentUrl'] = $image_url1;
            $arrayPostData['messages'][0]['previewImageUrl'] = $image_url1;
            $image_url2 = "https://flu.ddc.moph.go.th/img-bot/dhf-graph.png";
            $arrayPostData['messages'][1]['type'] = "image";
            $arrayPostData['messages'][1]['originalContentUrl'] = $image_url2;
            $arrayPostData['messages'][1]['previewImageUrl'] = $image_url2;
            replyMsg($arrayHeader,$arrayPostData);	
	}else if($q=="2"){
	    $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
            $image_url1 = "https://flu.ddc.moph.go.th/img-bot/hfm-map.png";
            $arrayPostData['messages'][0]['type'] = "image";
            $arrayPostData['messages'][0]['originalContentUrl'] = $image_url1;
            $arrayPostData['messages'][0]['previewImageUrl'] = $image_url1;
            $image_url2 = "https://flu.ddc.moph.go.th/img-bot/hfm-graph.png";
            $arrayPostData['messages'][1]['type'] = "image";
            $arrayPostData['messages'][1]['originalContentUrl'] = $image_url2;
            $arrayPostData['messages'][1]['previewImageUrl'] = $image_url2;
            replyMsg($arrayHeader,$arrayPostData);
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
