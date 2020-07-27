﻿<?php

	######################################################################################
	###########################################
	###################### Подготовка
	
	require_once "0=MAIN=MAIN_DEFINER.php";
	require_once "1=MAIN=INCLUDER.php";
	require_once "2=MAIN=INI_SETTER.php";
	require_once "3=MAIN=EXTENSION_CHECKER.php";
	
	require_once "99=PROJECT_DEFINES.php";
	
	# По-хорошему убрать бы их в "1=MAIN=INCLUDER.php"
	$UN_MYSQLC = new UNIV_PHP_MYSQL_Controller();
	$UN_SMF    = new UNIV_PHP_Small_Func();
	$UN_TIMER  = new UNIV_PHP_TIMER();
	$UN_WEB    = new UNIV_PHP_WEB();
	#$UN_SRVCONST = new UNIV_PHP_SERVER_CONST();
	$UN_YOUTUBE = new UNIV_PHP_YOUTUBE();
	
	
	
	#echo "<hr>".$UN_WEB->Get_HTTP_Response("https://www.youtube.com/watch?v=1");
	#exit;

	echo "<hr>";
	######################
	###########################################
	######################################################################################
	
	# https://www.youtube.com/?gl=RU&hl=ru   Главная страница
	# https://www.youtube.com/watch?v=JNtw9Cppo8k     TBS
	
	$user_request_type = $_POST["radios"];
	$user_request_url  = $_POST["url"];
	
	
	
	#$cb1_Echo_POST = ( isset($_POST["cb1_Echo_POST"]) ) ? true : false ;
	

	if( isset($_POST["cb1_Echo_POST"]) )
		$UN_SMF->SMF_PRINTER($_POST , "ВСЕ пришедшее в POST");
	
	######################################################################################
	###########################################
	###################### Начало
	
	
	$UN_YOUTUBE -> Set_URL( $user_request_url );
	if( isset($_POST["cb2_Echo_URL"]) )
		$UN_SMF->SMF_PRINTER($UN_YOUTUBE->Full_Target_Video_URL , "Приняли URL");
	
	######################
	
	$UN_YOUTUBE -> Prepare_URL(  );
	if( isset($_POST["cb3_Echo_URL_Prep"]) )
		$UN_SMF->SMF_PRINTER($UN_YOUTUBE->Target_Video_URL , "Подготовленный URL(Без пробелов)");
	
	######################
	
	$UN_YOUTUBE -> Get_Video_ID(  );
	if( isset($_POST["cb4_Echo_Video_ID"]) )
		$UN_SMF->SMF_PRINTER($UN_YOUTUBE->Video_ID , "Итоговый Video_ID");
	
	######################
	############################################
	######################
	
	$UN_YOUTUBE -> Get_Video_Info(  );
	$UN_YOUTUBE -> Decode_Video_Info(  );
	
	if( isset($_POST["cb5_Echo_Video_Info_Decoded"]) )
		$UN_SMF->SMF_PRINTER($UN_YOUTUBE->Video_Info , "Video_Info Декодированный 2 раза, одной строкой");
	
	
	$UN_YOUTUBE -> Convert_Video_Info_To_Asoc(  );
	if( isset($_POST["cb5_Echo_Video_Info_Asoc"]) )
		$UN_SMF->SMF_PRINTER($UN_YOUTUBE->Video_Info_Asoc , "Video_Info_Asoc ВЕСЬ;  COUNT=".count($UN_YOUTUBE->Video_Info_Asoc));
	
	######################
	
	$UN_YOUTUBE -> Check_Video_Response_Status(  );  # Дальше  либо exit в ERROR_HANDLER
	if( isset($_POST["cb6_Echo_Video_Status_Is_OK"]) )
		$UN_SMF->SMF_PRINTER($UN_YOUTUBE->Video_Status_Is_OK , "Video_Status_Is_OK = Видео можно смотреть");
	
	######################
	
	$UN_YOUTUBE -> Player_Response_Convert_JSON_To_Asoc(  );  #
	if( isset($_POST["cb7_Echo_JSON_Full"]) )
		$UN_SMF->SMF_PRINTER($UN_YOUTUBE->Player_Response_JSON_Full , "Player_Response_JSON_Full = Полный JSON");
	
	
	#  ВЫРЕЗАТЬ!!!
	$UN_YOUTUBE -> Player_Response_JSON_Erase(  );  #
	if( isset($_POST["cb8_Echo_JSON_Erased"]) )
		$UN_SMF->SMF_PRINTER($UN_YOUTUBE->Player_Response_JSON_Erased , "Player_Response_JSON_Erased = Урезанный JSON");
	
	
	######################
	
	######################
	############################################
	######################
	
	$UN_YOUTUBE -> Fill_FIN_Video_Info(  );  #
	if( isset($_POST["cb9_Echo_FIN_Video_Info_Asoc"]) )
		$UN_SMF->SMF_PRINTER($UN_YOUTUBE->FIN_Video_Info_Asoc , "FIN_Video_Info_Asoc = ВСЯ Основная инфа о видео");
	
	######################
	
	$UN_YOUTUBE -> Fill_FIN_Video_Thimbnails_Url_Arr(  );
	if( isset($_POST["cb10_Echo_FIN_Video_Thumb_Url_Arr"]) )
		$UN_SMF->SMF_PRINTER($UN_YOUTUBE->FIN_Video_Thimbnails_Url_Arr , "FIN_Video_Thimbnails_Url_Arr = Все Thimbnails");
	
	######################
	
	$UN_YOUTUBE -> Fill_FIN_Video_Itag_Info_Asoc_FULL(  );
	if( isset($_POST["cb11_Echo_FIN_Video_Itag_Info_Asoc_FULL"]) )
		$UN_SMF->SMF_PRINTER($UN_YOUTUBE->FIN_Video_Itag_Info_Asoc_FULL , "FIN_Video_Itag_Info_Asoc_FULL = ВСЯ Инфа о форматах видео");
	
	######################
	
	$UN_YOUTUBE -> Fill_FIN_Video_Itag_Info_Asoc_Video_MP4(  );
	
	if( isset($_POST["cb12_Echo_FIN_Video_Itag_Info_Asoc_Video_MP4"]) )
		$UN_SMF->SMF_PRINTER($UN_YOUTUBE->FIN_Video_Itag_Info_Asoc_Video_MP4 , "FIN_Video_Itag_Info_Asoc_Video_MP4 = ВСЯ Инфа о форматах видео(Только MP4)");
	
	
	$UN_YOUTUBE -> Fill_FIN_Video_Itag_Info_Asoc_Audio(  );
	if( isset($_POST["cb13_Echo_FIN_Video_Itag_Info_Asoc_Audio"]) )
		$UN_SMF->SMF_PRINTER($UN_YOUTUBE->FIN_Video_Itag_Info_Asoc_Audio , "FIN_Video_Itag_Info_Asoc_Audio = ВСЯ Инфа о форматах AUDIO");
	
	
	######################
	############################################
	######################

	
	$UN_YOUTUBE -> Echo_Table(  );
	


	exit;
	######################
	
	
	
	######################
	
	
	
	######################
	

	exit;
	# https://www.youtube.com/?gl=RU&hl=ru   Главная страница
	#Делаем HTTP_RESPONCE    Если 404 или еще чего, то ссылка битая
	#$UN_YOUTUBE	-> Echo_Some_Chars_Video_Info(100 , 0);
	

	
	echo "<br>END";
	exit;
	
	
	
	
	
	
	

	
	
	

	echo "<br>END";
	
	exit;
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	#
?>