<?php 

if($inText == "/user"){
		
		$sum=0;
		$cheker=0;
		$result2 = mysql_query("SELECT * FROM gs_tbot_users WHERE ID > 1 ")or die(mysql_error());// انتخاب از جدول
		//گرفتن خروجی از اطلاعات فیلدها با mysql_fetch_array
		while ($row = mysql_fetch_array($result2)){
				$id = $row['id'];
				$cheker++;
		}
		
		
		$curl = curl_init("https://api.telegram.org/bot$botapi/sendMessage");
		curl_setopt($curl, CURLOPT_POST, 1);
		curl_setopt($curl, CURLOPT_POSTFIELDS, "chat_id=$cid&text=$cheker");
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
		$result = curl_exec($curl);
		curl_close($curl);
		echo $result ;
		
	}elseif (!empty($photo)){

	
		$curl = curl_init("https://api.telegram.org/bot$botapi/sendPhoto");
		curl_setopt($curl, CURLOPT_POST, 1);
		curl_setopt($curl, CURLOPT_POSTFIELDS, "chat_id=$cid&photo=$photo");
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
		$result = curl_exec($curl);
		curl_close($curl);
		echo $result ;
		
		$curl2 = curl_init("https://api.telegram.org/bot$botapi/sendMessage");
		curl_setopt($curl2, CURLOPT_POST, 1);
		curl_setopt($curl2, CURLOPT_POSTFIELDS, "chat_id=$cid&text=$photo");
		curl_setopt($curl2, CURLOPT_RETURNTRANSFER, TRUE);
		$result2 = curl_exec($curl2);
		curl_close($curl2);
		echo $result2 ;
		
	}elseif(!empty($video)){

	
		$curl = curl_init("https://api.telegram.org/bot$botapi/sendVideo");
		curl_setopt($curl, CURLOPT_POST, 1);
		curl_setopt($curl, CURLOPT_POSTFIELDS, "chat_id=$cid&video=$video");
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
		$result = curl_exec($curl);
		curl_close($curl);
		echo $result ;
		
		$curl2 = curl_init("https://api.telegram.org/bot$botapi/sendMessage");
		curl_setopt($curl2, CURLOPT_POST, 1);
		curl_setopt($curl2, CURLOPT_POSTFIELDS, "chat_id=$cid&text=$video");
		curl_setopt($curl2, CURLOPT_RETURNTRANSFER, TRUE);
		$result2 = curl_exec($curl2);
		curl_close($curl2);
		echo $result2 ;
		
		
	}elseif(!empty($sticker)){

	
	
		$curl = curl_init("https://api.telegram.org/bot$botapi/sendSticker");
		curl_setopt($curl, CURLOPT_POST, 1);
		curl_setopt($curl, CURLOPT_POSTFIELDS, "chat_id=$cid&sticker=$sticker");
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
		$result = curl_exec($curl);
		curl_close($curl);
		echo $result ;
		
		
		$curl2 = curl_init("https://api.telegram.org/bot$botapi/sendMessage");
		curl_setopt($curl2, CURLOPT_POST, 1);
		curl_setopt($curl2, CURLOPT_POSTFIELDS, "chat_id=$cid&text=$sticker");
		curl_setopt($curl2, CURLOPT_RETURNTRANSFER, TRUE);
		$result2 = curl_exec($curl2);
		curl_close($curl2);
		echo $result2 ;
		
		
	}elseif(!empty($doc)){
		
		
		$curl = curl_init("https://api.telegram.org/bot$botapi/sendDocument");
		curl_setopt($curl, CURLOPT_POST, 1);
		curl_setopt($curl, CURLOPT_POSTFIELDS, "chat_id=$cid&document=$doc");
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
		$result = curl_exec($curl);
		curl_close($curl);
		echo $result ;
		
		
		$curl2 = curl_init("https://api.telegram.org/bot$botapi/sendMessage");
		curl_setopt($curl2, CURLOPT_POST, 1);
		curl_setopt($curl2, CURLOPT_POSTFIELDS, "chat_id=$cid&text=$doc");
		curl_setopt($curl2, CURLOPT_RETURNTRANSFER, TRUE);
		$result2 = curl_exec($curl2);
		curl_close($curl2);
		echo $result2 ;
	}
	



?>