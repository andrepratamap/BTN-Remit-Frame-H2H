<?php
	require_once ("lib/nusoap.php");  
	require_once ("include/func.php");  
	
	$server = new soap_server();
	$server->configureWSDL('routeDx', 'urn:routeDx');

	$server->wsdl->addComplexType(
		'inputTransaction',
    	'complexType',
    	'struct',
    	'all',
    	'',
    	array(
        	'description' => array('name' => 'description', 'type' => 'xsd:string'),
            'userName' => array('name' => 'userName', 'type' => 'xsd:string'),
			'signature' => array('name' => 'signature', 'type' => 'xsd:string'),
			'productCode' => array('name' => 'productCode', 'type' => 'xsd:string'),
			'destBankAcc' => array('name' => 'destBankAcc', 'type' => 'xsd:string'),
			'destAmount' => array('name' => 'destAmount', 'type' => 'xsd:string'),
			'feeAmount' => array('name' => 'feeAmount', 'type' => 'xsd:string'),
			'transactionType' => array('name' => 'transactionType', 'type' => 'xsd:string'),
			'terminal' => array('name' => 'terminal', 'type' => 'xsd:string'),
			'sourceID' => array('name' => 'sourceID', 'type' => 'xsd:string'),
			'sourceName' => array('name' => 'sourceName', 'type' => 'xsd:string'),
			'senderName' => array('name' => 'senderName', 'type' => 'xsd:string'),
			'senderAddress' => array('name' => 'senderAddress', 'type' => 'xsd:string'),
			'senderID' => array('name' => 'senderID', 'type' => 'xsd:string'),
			'senderPhone' => array('name' => 'senderPhone', 'type' => 'xsd:string'),
			'senderCity' => array('name' => 'senderCity', 'type' => 'xsd:string'),
			'senderCountry' => array('name' => 'senderCountry', 'type' => 'xsd:string'),
			'recipientName' => array('name' => 'recipientName', 'type' => 'xsd:string'),
			'recipientPhone' => array('name' => 'recipientPhone', 'type' => 'xsd:string'),
			'recipientAddress' => array('name' => 'recipientAddress', 'type' => 'xsd:string'),
			'recipientCity' => array('name' => 'recipientCity', 'type' => 'xsd:string'),
			'recipientCountry' => array('name' => 'recipientCountry', 'type' => 'xsd:string'),
			'notiDesc' => array('name' => 'notiDesc', 'type' => 'xsd:string'),
			'traxId' => array('name' => 'traxId', 'type' => 'xsd:string'),
            'refCode' => array('name' => 'refCode', 'type' => 'xsd:string'),
			'payCode' => array('name' => 'payCode', 'type' => 'xsd:string'),
			'recepientId' => array('name' => 'recepientId', 'type' => 'xsd:string'),//ARIF 20150508
                        'recepientProvince' => array('name' => 'recepientProvince', 'type' => 'xsd:string'),//ARIF 20150508
			'merchantNumber' => array('name' => 'merchantNumber', 'type' => 'xsd:string'),
			'addinfo' => array('name' => 'addinfo', 'type' => 'xsd:string'),
			'traxId2' => array('name' => 'traxId2', 'type' => 'xsd:string')
    	)
	);

	$server->wsdl->addComplexType(
    	'outputTransaction',
    	'complexType',
    	'struct',
    	'all',
    	'',
    	array(
        	'sysCode' => array('name' => 'sysCode', 'type' => 'xsd:string'),
			'refCode' => array('name' => 'refCode', 'type' => 'xsd:string'),
			'resultCode' => array('name' => 'resultCode', 'type' => 'xsd:string'),
			'resultDesc' => array('name' => 'resultDesc', 'type' => 'xsd:string'),
			'userName' => array('name' => 'userName', 'type' => 'xsd:string'),
			'signature' => array('name' => 'signature', 'type' => 'xsd:string'),
			'productCode' => array('name' => 'productCode', 'type' => 'xsd:string'),
			'destBankAcc' => array('name' => 'destBankAcc', 'type' => 'xsd:string'),
			'destAmount' => array('name' => 'destAmount', 'type' => 'xsd:string'),
			'feeAmount' => array('name' => 'feeAmount', 'type' => 'xsd:string'),
			'sourceID' => array('name' => 'sourceID', 'type' => 'xsd:string'),
			'sourceName' => array('name' => 'sourceName', 'type' => 'xsd:string'),
			'senderName' => array('name' => 'senderName', 'type' => 'xsd:string'),
			'senderAddress' => array('name' => 'senderAddress', 'type' => 'xsd:string'),
			'senderID' => array('name' => 'senderID', 'type' => 'xsd:string'),
			'senderPhone' => array('name' => 'senderPhone', 'type' => 'xsd:string'),
			'senderCity' => array('name' => 'senderCity', 'type' => 'xsd:string'),
			'senderCountry' => array('name' => 'senderCountry', 'type' => 'xsd:string'),
			'recipientName' => array('name' => 'recipientName', 'type' => 'xsd:string'),
			'recipientPhone' => array('name' => 'recipientPhone', 'type' => 'xsd:string'),
			'recipientAddress' => array('name' => 'recipientAddress', 'type' => 'xsd:string'),
			'recipientCity' => array('name' => 'recipientCity', 'type' => 'xsd:string'),
			'recipientCountry' => array('name' => 'recipientCountry', 'type' => 'xsd:string'),
			'notiDesc' => array('name' => 'notiDesc', 'type' => 'xsd:string'),
			'transactionType' => array('name' => 'transactionType', 'type' => 'xsd:string'),
			'bankName' => array('name' => 'bankName', 'type' => 'xsd:string'),
			'traxId' => array('name' => 'traxId', 'type' => 'xsd:string'),
			'payCode' => array('name' => 'payCode', 'type' => 'xsd:string'),
			'merchantNumber' => array('name' => 'merchantNumber', 'type' => 'xsd:string'),
			'recepientId' => array('name' => 'recepientId', 'type' => 'xsd:string'),//ARIF 20150508
                        'recepientProvince' => array('name' => 'recepientProvince', 'type' => 'xsd:string'),//ARIF 20150508
			'addinfo' => array('name' => 'addinfo', 'type' => 'xsd:string'),
			'traxId2' => array('name' => 'traxId2', 'type' => 'xsd:string')
    	)
  	);

	$server->register(
		'sendReq',												// method name
    	array('inputTransaction' => 'tns:inputTransaction'),	// input parameters
    	array('outputTransaction' => 'tns:outputTransaction'),	// output parameters
    	'urn:routeDx',                         					// namespace
		'urn:routeDx#route',     								// soapaction
    	'rpc',                                  			  	// style
    	'encoded',                            			    	// use
    	'Documentation'        									// documentation
 	);

	$server->register(
		'Creator',												// method name
    	array(),	// input parameters
    	array(),	// output parameters
    	'',                         					// namespace
		'',     								// soapaction
    	'',                                  			  	// style
    	'',                            			    	// use
    	'Created By Dominiq Purba [http://www.qinimod.com/]'        									// documentation
 	);

	function tulisLogRequest($inputTransaction){
		isLog('===============================================================REQUEST==========================');
		foreach ($inputTransaction as $dominiq => $tampan){
			isLog($dominiq.' => '.$tampan);
		}
		isLog('===============================================================PROSES===========================');
	}

	function tulisLogResponse($inputTransaction){
		isLog('===============================================================RESPONSE=========================');
		foreach ($inputTransaction as $dominiq => $tampan){
			isLog($dominiq.' => '.$tampan);
		}
	}
	
	function cekSignReq($inputTransaction,$sign){
		require "conn.php";
		$sql ='select NAMAPENGGUNA,PRODUCT_CODE,BANK_ACCOUNT,ID,NAMA,PIN,NO_HP from WSUSERS where NAMAPENGGUNA=\''.$inputTransaction['userName'].'\' and ID=\''.$inputTransaction['sourceID'].'\'';
		if(!isset($Db)){
			isLog('cannot connect to database');
			return false;
		}
		$Db->SelectData($sql);
		$isi=$Db->Content;
		$Db->closeDB();
		if(!empty($isi[1][1])){
			isLog('Cek Signature Data Found');
			$NAMAPENGGUNA=$isi[1][1];
			$PRODUCT_CODE=$isi[2][1];
			$BANK_ACCOUNT=$isi[3][1];
			$ID=$isi[4][1];
			$NAMA=$isi[5][1];
			$PIN=$isi[6][1];
			$NO_HP=$isi[7][1];		
		}else{
			isLog('query return empty record: '.$sql);
		}
		isLog($inputTransaction['description'].$NAMAPENGGUNA.$PIN.$inputTransaction['productCode'].
                        $inputTransaction['destBankAcc'].
                        $inputTransaction['destAmount'] .
                        $inputTransaction['feeAmount'] .
                        $inputTransaction['transactionType'] .
                        $inputTransaction['terminal'] .
                        $inputTransaction['sourceID'] .
                        $inputTransaction['sourceName'] .
                        $inputTransaction['senderName'] .
                        $inputTransaction['senderAddress'] .
                        $inputTransaction['senderID'] .
                        $inputTransaction['senderPhone'] .
                        $inputTransaction['senderCity'] .
                        $inputTransaction['senderCountry'] .
                        $inputTransaction['recipientName'] .
                        $inputTransaction['recipientPhone'] .
                        $inputTransaction['recipientAddress'] .
                        $inputTransaction['recipientCity'] .
                        $inputTransaction['recipientCountry'] .
                        $inputTransaction['notiDesc'] .
                        $inputTransaction['traxId'] .
                        $inputTransaction['refCode'] .
                        $inputTransaction['payCode'] .
                        $inputTransaction['merchantNumber']);
		$sign=md5($inputTransaction['description'].$NAMAPENGGUNA.$PIN.$inputTransaction['productCode'].
			$inputTransaction['destBankAcc'].
			$inputTransaction['destAmount'] . 
			$inputTransaction['feeAmount'] . 
			$inputTransaction['transactionType'] . 
			$inputTransaction['terminal'] . 
			$inputTransaction['sourceID'] . 
			$inputTransaction['sourceName'] . 
			$inputTransaction['senderName'] . 
			$inputTransaction['senderAddress'] . 
			$inputTransaction['senderID'] . 
			$inputTransaction['senderPhone'] . 
			$inputTransaction['senderCity'] . 
			$inputTransaction['senderCountry'] . 
			$inputTransaction['recipientName'] . 
			$inputTransaction['recipientPhone'] . 
			$inputTransaction['recipientAddress'] . 
			$inputTransaction['recipientCity'] . 
			$inputTransaction['recipientCountry'] . 
			$inputTransaction['notiDesc'] . 
			$inputTransaction['traxId'] . 
			$inputTransaction['refCode'] .
			$inputTransaction['payCode'] .
			$inputTransaction['merchantNumber']
			);
		if($inputTransaction['signature']==$sign){
			return true;
		}else{
			isLog('Cek Signature failed-notsame');
			isLog($sign);
			return false;
		}
	}

	function cekRefCode($inputTransaction){
		require "conn.php";
		$sql ='select REFCODE, PRODCODE, DESTAMOUNT, SENDERNAME, SENDERADDR, SENDERID, SENDERPHONE, SENDERCITY, SENDERCOUNTRY, RECEPTNAME, RECEPTPHONE, RECEPTCITY, RECEPTCOUNTRY, INFO1, FEEAGENCO, RECEPTADDR from LOGROUTEX where REFCODE=\''.$inputTransaction['refCode'].'\' and PRODCODE=\''.$inputTransaction['productCode'].'\'';
		$arrCekRefCode=array();
		if(!isset($Db)){
			isLog('cannot connect to database');
			$arrCekRefCode['rc'] = 7000;
		}
		$Db->SelectData($sql);
		$isi=$Db->Content;
		$Db->closeDB();
		if(empty($isi[1][1])){
			isLog('query return empty record: '.$sql);
			$arrCekRefCode['rc'] =  7045;
		}else{
			isLog('Ref Code Found');
			if($isi[14][1]=='77'){
				$arrCekRefCode['rc'] =  7045;
			}elseif($isi[14][1]=='88'){
				$arrCekRefCode['rc'] =  00;
				$arrCekRefCode['destAmount'] =  $isi[3][1];
				$arrCekRefCode['senderName'] =  $isi[4][1];
				$arrCekRefCode['senderAddress'] =  $isi[5][1];
				$arrCekRefCode['senderID'] =  $isi[6][1];
				$arrCekRefCode['senderPhone'] =  $isi[7][1];
				$arrCekRefCode['senderCity'] =  $isi[8][1];
				$arrCekRefCode['senderCountry'] =  $isi[9][1];
				$arrCekRefCode['recipientName'] =  $isi[10][1];
				$arrCekRefCode['recipientPhone'] =  $isi[11][1];
				$arrCekRefCode['recipientCity'] =  $isi[12][1];
				$arrCekRefCode['recipientCountry'] =  $isi[13][1];
				$arrCekRefCode['recipientAddress'] =  $isi[16][1];
				$arrCekRefCode['feeAmount'] =  $isi[15][1];
			}elseif($isi[14][1]=='99'){
				$arrCekRefCode['rc'] =  7135;
			}else{
				$arrCekRefCode['rc'] =  7045;
			}
		}
		return $arrCekRefCode;
	}

	function cekRefCodeCashout($inputTransaction){
		require "conn.php";
		$sql ='select REFCODE, PRODCODE, DESTAMOUNT, SENDERNAME, SENDERADDR, SENDERID, SENDERPHONE, SENDERCITY, SENDERCOUNTRY, RECEPTNAME, RECEPTPHONE, RECEPTCITY, RECEPTCOUNTRY, INFO1, FEEAGENCO, RECEPTADDR, INFO12 from LOGROUTEX where REFCODE=\''.$inputTransaction['refCode'].'\' and PRODCODE=\''.$inputTransaction['productCode'].'\'';// and SENDERPHONE=\''.$inputTransaction['senderPhone'].'\'';
		$arrCekRefCode=array();
		if(!isset($Db)){
			isLog('cannot connect to database');
			$arrCekRefCode['rc'] = 7000;
		}
		$Db->SelectData($sql);
		$isi=$Db->Content;
		$Db->closeDB();
		if(empty($isi[1][1])){
			isLog('query return empty record: '.$sql);
			$arrCekRefCode['rc'] =  7045;
		}else{
			isLog('Ref Code Found');
			if($isi[14][1]=='77'){
				$arrCekRefCode['rc'] =  7045;
			}elseif($isi[14][1]=='88'){
				$arrCekRefCode['rc'] =  00;
			}elseif($isi[14][1]=='99'){
				$arrCekRefCode['rc'] =  7135;
				$arrCekRefCode['destAmount'] =  $isi[3][1];
				$arrCekRefCode['senderName'] =  $isi[4][1];
				$arrCekRefCode['senderAddress'] =  $isi[5][1];
				$arrCekRefCode['senderID'] =  $isi[6][1];
				$arrCekRefCode['senderPhone'] =  $isi[7][1];
				$arrCekRefCode['senderCity'] =  $isi[8][1];
				$arrCekRefCode['senderCountry'] =  $isi[9][1];
				$arrCekRefCode['recipientName'] =  $isi[10][1];
				$arrCekRefCode['recipientPhone'] =  $isi[11][1];
				$arrCekRefCode['recipientCity'] =  $isi[12][1];
				$arrCekRefCode['recipientCountry'] =  $isi[13][1];
				$arrCekRefCode['recipientAddress'] =  $isi[16][1];
				$arrCekRefCode['feeAmount'] =  $isi[15][1];
				$arrCekRefCode['cashoutTerminal'] =  $isi[17][1];
			}else{
				$arrCekRefCode['rc'] =  7045;
			}
		}
		return $arrCekRefCode;
	}
	
	function verifyPayCode($inputTransaction){
		require "conn.php";
		$sql ='select INFO7 from LOGROUTEX where REFCODE=\''.$inputTransaction['refCode'].'\' and INFO7=\''.$inputTransaction['payCode'].'\'';
		if(!isset($Db)){
			isLog('cannot connect dbase');
			return false;
		}
		$Db->SelectData($sql);
		$isi=$Db->Content;
		$Db->closeDB();
		if(empty($isi[1][1])){
			isLog('paycode Not Found');
			return false;
		}else{
			return true;
		}
	}

	function cekRefCodeConf($inputTransaction){
		require "conn.php";
		$sql ='select REFCODE, PRODCODE, DESTAMOUNT, SENDERNAME, SENDERADDR, SENDERID, SENDERPHONE, SENDERCITY, SENDERCOUNTRY, RECEPTNAME, RECEPTPHONE, RECEPTCITY, RECEPTCOUNTRY, INFO1, FEESWITCH, FEEAGENCO, RECEPTADDR from LOGROUTEX where REFCODE=\''.$inputTransaction['refCode'].'\' and PRODCODE=\''.$inputTransaction['productCode'].'\' and DESTAMOUNT=\''.$inputTransaction['destAmount'].'\' and SENDERNAME=\''.$inputTransaction['senderName'].'\' and SENDERADDR=\''.$inputTransaction['senderAddress'].'\' and SENDERID=\''.$inputTransaction['senderID'].'\' and SENDERPHONE=\''.$inputTransaction['senderPhone'].'\' and SENDERCITY=\''.$inputTransaction['senderCity'].'\' and SENDERCOUNTRY=\''.$inputTransaction['senderCountry'].'\' and RECEPTNAME=\''.str_replace('\'','\'\'',$inputTransaction['recipientName']).'\' and RECEPTPHONE=\''.$inputTransaction['recipientPhone'].'\' and RECEPTCITY=\''.$inputTransaction['recipientCity'].'\' and RECEPTCOUNTRY=\''.$inputTransaction['recipientCountry'].'\'';
		$arrCekRefCode=array();
		isLog($sql);
		if(!isset($Db)){
			isLog('cannot connect database');
			$arrCekRefCode['rc'] = 7000;
		}
		$Db->SelectData($sql);
		$isi=$Db->Content;
		$Db->closeDB();
		if(empty($isi[1][1])){
			isLog('Ref Code Not Found');
			$arrCekRefCode['rc'] =  7045;
		}else{
			if($isi[14][1]=='77'){
				$arrCekRefCode['rc'] =  7045;
			}elseif($isi[14][1]=='88'){
				$arrCekRefCode['rc'] =  00;
				$arrCekRefCode['destAmount'] =  $isi[3][1];
				$arrCekRefCode['senderName'] =  $isi[4][1];
				$arrCekRefCode['senderAddress'] =  $isi[5][1];
				$arrCekRefCode['senderID'] =  $isi[6][1];
				$arrCekRefCode['senderPhone'] =  $isi[7][1];
				$arrCekRefCode['senderCity'] =  $isi[8][1];
				$arrCekRefCode['senderCountry'] =  $isi[9][1];
				$arrCekRefCode['recipientName'] =  $isi[10][1];
				$arrCekRefCode['recipientPhone'] =  $isi[11][1];
				$arrCekRefCode['recipientCity'] =  $isi[12][1];
				$arrCekRefCode['recipientCountry'] =  $isi[13][1];
				$arrCekRefCode['feeAgenCo'] = $isi[16][1];
				$arrCekRefCode['recipientAddress'] = $isi[17][1];
				$arrCekRefCode['feeSwitch'] = $isi[15][1];
			}elseif($isi[14][1]=='99'){
				$arrCekRefCode['rc'] =  7135;
			}else{
				$arrCekRefCode['rc'] =  7045;
			}
		}
		return $arrCekRefCode;
	}
	
	function cekSignConf($inputTransaction,$sign){
		require "conn.php";
		$sql ='select NAMAPENGGUNA,PRODUCT_CODE,BANK_ACCOUNT,ID,NAMA,PIN,NO_HP from WSUSERS where NAMAPENGGUNA=\''.$inputTransaction['userName'].'\' and ID=\''.$inputTransaction['sourceID'].'\'';
		if(!isset($Db)){
			isLog('cannot connect database');
			return false;
		}
		$Db->SelectData($sql);
		$isi=$Db->Content;
		$Db->closeDB();
		$dom=90;
		if(empty($isi[1][1])){
			isLog('query return empty: '.$sql);
			$NAMAPENGGUNA='';
			$PRODUCT_CODE='';
			$BANK_ACCOUNT='';
			$ID='';
			$NAMA='';
			$PIN='';
			$NO_HP='';				
		}else{
			$NAMAPENGGUNA=$isi[1][1];
			$PRODUCT_CODE=$isi[2][1];
			$BANK_ACCOUNT=$isi[3][1];
			$ID=$isi[4][1];
			$NAMA=$isi[5][1];
			$PIN=$isi[6][1];
			$NO_HP=$isi[7][1];		
		}

		$sign=md5($inputTransaction['description'].$NAMAPENGGUNA.$PIN.$inputTransaction['productCode'].
			$inputTransaction['destBankAcc'].
			$inputTransaction['destAmount'] . 
			$inputTransaction['feeAmount'] . 
			$inputTransaction['transactionType'] . 
			$inputTransaction['terminal'] . 
			$inputTransaction['sourceID'] . 
			$inputTransaction['sourceName'] . 
			$inputTransaction['senderName'] . 
			$inputTransaction['senderAddress'] . 
			$inputTransaction['senderID'] . 
			$inputTransaction['senderPhone'] . 
			$inputTransaction['senderCity'] . 
			$inputTransaction['senderCountry'] . 
			$inputTransaction['recipientName'] . 
			$inputTransaction['recipientPhone'] . 
			$inputTransaction['recipientAddress'] . 
			$inputTransaction['recipientCity'] . 
			$inputTransaction['recipientCountry'] . 
			$inputTransaction['notiDesc'] . 
			$inputTransaction['traxId'] . 
			$inputTransaction['refCode']
			);
		if($inputTransaction['signature']==$sign){
			return true;
		}else{
			isLog('signature didn\'t match');
			isLog('signature reff '.$inputTransaction['refCode'].' = '.$sign);
			return false;
		}
	}
	
	function cekSignCheck($inputTransaction,$sign){
		require "conn.php";
		$sql ='select NAMAPENGGUNA,PRODUCT_CODE,BANK_ACCOUNT,ID,NAMA,PIN,NO_HP from WSUSERS where NAMAPENGGUNA=\''.$inputTransaction['userName'].'\' and ID=\''.$inputTransaction['sourceID'].'\'';
		if(!isset($Db)){
			isLog('cannot connect database');
			return false;
		}
		$Db->SelectData($sql);
		$isi=$Db->Content;
		$Db->closeDB();
		if(empty($isi[1][1])){
			isLog('query return empty: '.$sql);
			$NAMAPENGGUNA='';
			$PRODUCT_CODE='';
			$BANK_ACCOUNT='';
			$ID='';
			$NAMA='';
			$PIN='';
			$NO_HP='';				
		}else{
			$NAMAPENGGUNA=$isi[1][1];
			$PRODUCT_CODE=$isi[2][1];
			$BANK_ACCOUNT=$isi[3][1];
			$ID=$isi[4][1];
			$NAMA=$isi[5][1];
			$PIN=$isi[6][1];
			$NO_HP=$isi[7][1];		
		}

		$sign=md5($NAMAPENGGUNA.$PIN.$inputTransaction['productCode'].
			$inputTransaction['destAmount'] . 
			$inputTransaction['transactionType'] . 
			$inputTransaction['terminal'] . 
			$inputTransaction['sourceID'] . 
			$inputTransaction['traxId'] . 
			$inputTransaction['refCode']
			);
		if($inputTransaction['signature']==$sign){
			return true;
		}else{
			isLog('signature didn\'t match');
			return false;
		}
	}
	
	function insertCheckReq($inputTransaction, $sysCode, $errCodeAlto, $fiagenci, $fifinet, $fiagenco){
		require "conn.php";
		$t = microtime(true);
		$micro = sprintf("%06d",($t - floor($t)) * 1000000);
		$d = new DateTime( date('Y-m-d H:i:s.'.$micro,$t) );
		$has1=$d->format("Hisu");
		$has2=$d->format("dmYHis");
		if($inputTransaction['productCode'] == '007006'){
			$refCode=str_pad((abs(crc32($has1)).rand(1000,9999)),12,'9',STR_PAD_LEFT);
		}elseif($inputTransaction['productCode'] == '007012'){
			$refCode=$inputTransaction['traxId'];
		}else{
			$refCode=str_pad((abs(crc32($has1)).rand(100000,999999)),16,'9',STR_PAD_LEFT);
		}
		if(!isset($Db)){
			isLog('cannot connect database');
			return 7000;
		}
		isLog($inputTransaction['traxId'].':begin logroutex');
		//ARIF 20150508
		if($inputTransaction['userName'] == 'h2halfa' or $inputTransaction['userName'] =='eMQ' or $inputTransaction['userName'] =='Incentiv3'){
			$sql='CALL InsertLog1(\''.str_replace('\'','\'\'',$inputTransaction['recipientName']).'\',   \''.$inputTransaction['recipientPhone'].'\', \''.$inputTransaction['recipientCity'].'\', \''.trim($inputTransaction['recipientCountry']).'\', \''.str_replace('\'','\'\'',$inputTransaction['senderName']).'\',   \''.$inputTransaction['senderAddress'].'\',   \''.$inputTransaction['senderID'].'\',   \''.$inputTransaction['senderPhone'].'\', \''.$inputTransaction['senderCity'].'\', \''.$inputTransaction['senderCountry'].'\', \''.$refCode.'\',   1,   \''.str_replace('\'','\'\'',$inputTransaction['description']).'\',   \''.$inputTransaction['userName'].'\',   \''.$inputTransaction['signature'].'\',   \''.$inputTransaction['productCode'].'\',   \''.$inputTransaction['destBankAcc'].'\',   '.$inputTransaction['destAmount'].',   '.$inputTransaction['feeAmount'].',   \''.$inputTransaction['terminal'].'\',   \''.$inputTransaction['sourceID'].'\',   \''.$inputTransaction['sourceName'].'\', \''.str_replace('\'','\'\'',$inputTransaction['notiDesc']).'\', \''.$inputTransaction['traxId'].'\',\'77\',\''.$has2.'\',\''.$sysCode.'\',\''.$errCodeAlto.'\',\''.$fiagenci.'\',\''.$fifinet.'\',\''.$fiagenco.'\', \''.$inputTransaction['recipientAddress'].'\', \''.$inputTransaction['recepientId'].'\',\''.$inputTransaction['recepientProvince'].'\')';
		}else{
			$sql='CALL InsertLog(\''.str_replace('\'','\'\'',$inputTransaction['recipientName']).'\',   \''.$inputTransaction['recipientPhone'].'\', \''.$inputTransaction['recipientCity'].'\', \''.trim($inputTransaction['recipientCountry']).'\', \''.str_replace('\'','\'\'',$inputTransaction['senderName']).'\',   \''.$inputTransaction['senderAddress'].'\',   \''.$inputTransaction['senderID'].'\',   \''.$inputTransaction['senderPhone'].'\', \''.$inputTransaction['senderCity'].'\', \''.$inputTransaction['senderCountry'].'\', \''.$refCode.'\',   1,   \''.str_replace('\'','\'\'',$inputTransaction['description']).'\',   \''.$inputTransaction['userName'].'\',   \''.$inputTransaction['signature'].'\',   \''.$inputTransaction['productCode'].'\',   \''.$inputTransaction['destBankAcc'].'\',   '.$inputTransaction['destAmount'].',   '.$inputTransaction['feeAmount'].',   \''.$inputTransaction['terminal'].'\',   \''.$inputTransaction['sourceID'].'\',   \''.$inputTransaction['sourceName'].'\', \''.str_replace('\'','\'\'',$inputTransaction['notiDesc']).'\', \''.$inputTransaction['traxId'].'\',\'77\',\''.$has2.'\',\''.$sysCode.'\',\''.$errCodeAlto.'\',\''.$fiagenci.'\',\''.$fifinet.'\',\''.$fiagenco.'\', \''.$inputTransaction['recipientAddress'].'\')';
		}
		//================================================
		isLog($sql);
		if($Db->ExecDML($sql)==true){
			$Db->closeDB();
			isLog($inputTransaction['traxId'].':end logroutex');
			return $refCode;
		}else{
			$Db->closeDB();
			isLog('query failed: '.$sql);
			isLog($inputTransaction['traxId'].':end logroutex');
			return 7000;
		}
	}

	function readRC($coderc){
		$file = "rccode.txt";
		$f = fopen($file, "r");
		//$jambret = array();
		$konter=0;
		$ket='';
		while ( $line = fgets($f, 90) ) {
			$code=explode('=',$line);
			if($code[0]==$coderc){
				$ket=$code[1];
				$konter=1;
			}
		}
		if($konter==0){
			return '8888 System maintenance';
		}else{
			return trim($ket);
		} 
	}
	
	function checkRefCode($inputTransaction){
		require "conn.php";
		$sql ='SELECT refcode,   typeid,   descr,   uname,   prodcode,   destbankacc,   destamount,   feeamount,   terminal,   sourceid,   sourcename,   sendername,   senderaddr,   senderid,   senderphone,   receptname,   receptphone,   notidesc FROM LOGROUTEX 
		WHERE 
		refcode=\''.$inputTransaction['refCode'].'\' AND  
		descr=\''.$inputTransaction['description'].'\'   AND
		uname=\''.$inputTransaction['userName'].'\' AND    
		prodcode=\''.$inputTransaction['productCode'].'\' AND    
		destbankacc=\''.$inputTransaction['destBankAcc'].'\' AND    
		destamount=\''.$inputTransaction['destAmount'].'\' AND    
		terminal=\''.$inputTransaction['terminal'].'\' AND    
		sourceid=\''.$inputTransaction['sourceID'].'\' AND    
		sourcename=\''.$inputTransaction['sourceName'].'\' AND    
		sendername=\''.str_replace('\'','\'\'',$inputTransaction['senderName']).'\' AND    
		senderaddr=\''.$inputTransaction['senderAddress'].'\' AND    
		senderid=\''.$inputTransaction['senderID'].'\' AND    
		senderphone=\''.$inputTransaction['senderPhone'].'\' AND    
		receptphone=\''.$inputTransaction['recipientPhone'].'\' ';
		isLog($sql);
		if(!isset($Db)){
			isLog('cannot connect database');
			return false;
		}
		$Db->SelectData($sql);
		$isi=$Db->Content;
		$Db->closeDB();
		if($isi[0][1]==1){
			return true;
		}else{
			isLog('query return empty: '.$sql);
			return false;
		}
	}

	function checkRefCode2($inputTransaction){
		require "conn.php";
		$sql ='SELECT refcode,   typeid,   descr,   uname,   prodcode,   destbankacc,   destamount,   feeamount,   terminal,   sourceid,   sourcename,   sendername,   senderaddr,   senderid,   senderphone,   receptname,   receptphone,   notidesc, info4, info6 FROM LOGROUTEX 
		WHERE 
		refcode=\''.$inputTransaction['refCode'].'\' AND 
		uname=\''.$inputTransaction['userName'].'\' AND    
		destamount=\''.$inputTransaction['destAmount'].'\' AND    
		terminal=\''.$inputTransaction['terminal'].'\' AND    
		sourceid=\''.$inputTransaction['sourceID'].'\'';
		if(!isset($Db)){
			isLog('cannot connect database');
			return false;
		}
		isLog($sql);
		$Db->SelectData($sql);
		$isi=$Db->Content;
		$Db->closeDB();
		$ss=array();
		if($isi[0][1]==1){
			$ss['bool']=true;
		}else{
			isLog('query failed: '.$sql);
			$ss['bool']=false;
		}
		$ss['refCode']=$isi[19][1];
		$ss['typeid']=$isi[2][1];
		$ss['resultCode']=$isi[20][1];
                isLog('RC check : '.$ss['resultCode']);
		return $ss;
	}

	function getDeposit($inputTransaction){
		require "conn.php";
		$sql ='select NAMAPENGGUNA,PRODUCT_CODE,BANK_ACCOUNT,ID,NAMA,PIN,NO_HP from WSUSERS where NAMAPENGGUNA=\''.$inputTransaction['userName'].'\' and ID=\''.$inputTransaction['sourceID'].'\'';
		if(!isset($Db)){
			isLog('DB Not Connected');
			return false;
		}
		$Db->SelectData($sql);
		$isi=$Db->Content;
		$Db->closeDB();
		if(empty($isi[1][1])){
			isLog('query return empty: '.$sql);
			$NAMAPENGGUNA='';
			$PRODUCT_CODE='';
			$BANK_ACCOUNT='';
			$ID='';
			$NAMA='';
			$PIN='';
			$NO_HP='';				
		}else{
			$NAMAPENGGUNA=$isi[1][1];
			$PRODUCT_CODE=$isi[2][1];
			$BANK_ACCOUNT=$isi[3][1];
			$ID=$isi[4][1];
			$NAMA=$isi[5][1];
			$PIN=$isi[6][1];
			$NO_HP=$isi[7][1];		
		}

		$arrDept=array();
		$arrDept['no_va']=$isi[3][1];
		$arrDept['no_hp']=$isi[7][1];

		$sql ='select KODE from ACCINFO where NO_HP=\''.$inputTransaction['merchantNumber'].'\'';
		if(!isset($Db)){
			isLog('DB Not Connected');
			return false;
		}
		$Db->SelectData($sql);
		$isi=$Db->Content;
		$Db->closeDB();
		$arrDept['cacode']=$isi[1][1];
		
		return $arrDept;
	}

	function getDepositFC($inputTransaction){
		require "conn.php";
		$sql ='select no_va, no_hp, kode from accinfo where no_hp=\''.$inputTransaction['senderPhone'].'\'';
		if(!isset($Db)){
			isLog('DB Not Connected');
			return false;
		}
		$Db->SelectData($sql);
		$isi=$Db->Content;

		$arrDept=array();
		if(empty($isi[1][1])){
			isLog('query return empty: '.$sql);
			$sql ='SELECT CUSTCODE, CONTACTPHONE FROM MC.CUSTOMER WHERE CONTACTPHONE=\''.$inputTransaction['senderPhone'].'\'';
			if(!isset($Db2)){
				isLog('DB Not Connected');
				return false;
			}
			$Db2->SelectData($sql);
			$isiX=$Db2->Content;
			$arrDept['no_va']=$isiX[1][1];
			$arrDept['no_hp']=$isiX[2][1];
			$arrDept['cacode']='MC';
			$Db2->closeDB();
		}else{
			$arrDept['no_va']=$isi[1][1];
			$arrDept['no_hp']=$isi[2][1];
			$arrDept['cacode']=$isi[3][1];
			$Db->closeDB();
		}
		return $arrDept;
	}

	function updateFCTable($inputTransaction, $no_va, $evaContainer,$username){
		require "conn.php";
		if(!isset($Db)){
			isLog('DB Not Connected');
		}

		$arrSetFeeX=getFeeFC($username);
		$subbFC=$arrSetFeeX['subbFC'];

		$sql="SELECT FEEFNT, FEEAGENT, FEESWITCH FROM feeadm where (" . $inputTransaction['destAmount'] . " between mintrx and maxtrx) and SUBB=".$subbFC;
		$Db->SelectData($sql);
		$isi=$Db->Content;
		$fifinet=$isi[1][1];
		$fiagen=$isi[2][1];
		$fiswitch=$isi[3][1];

		$sql="insert into listremit (TGL_KIRIM, VA_PENGIRIM, VA_PENERIMA, NO_TLP_CUST_PENGIRIM, NO_TLP_CUST_PENERIMA, NO_ID_PENGIRIM, NAMA_PENGIRIM, NAMA_PENERIMA, NEWS_TRANSFER, AMOUNT, FEE1, FEE2, STATUS, REFNUM, ADDR_PENGIRIM, ADDR_PENERIMA, FEE3, SENDER_AIMING, KEWARGANEGARAAN_PENGIRIM, KEWARGANEGARAAN_PENERIMA, TPTLHR_PENGIRIM) values(sysdate, '".trim($no_va)."', '".$evaContainer."', '".$inputTransaction['senderPhone']."', '".$inputTransaction['recipientPhone']."', '".$inputTransaction['senderID']."', '".$inputTransaction['senderName']."', '".str_replace('\'','\'\'',$inputTransaction['recipientName'])."', '".$inputTransaction['notiDesc']."', '".$inputTransaction['destAmount']."', '".$fifinet."', '".$fiagen."',0,'".$inputTransaction['refCode']."','".$inputTransaction['senderAddress']."','".$inputTransaction['recipientAddress']."','".$fiswitch."','".$inputTransaction['description']."','".$inputTransaction['senderCountry']."','".$inputTransaction['recipientCountry']."','".$inputTransaction['senderCity']."')";
		if($Db->ExecDML($sql)==true){
			$Db->closeDB();
			return 0;
		}else{
			isLog('query return empty: '.$sql);
			$Db->closeDB();
			return 7000;
		}		
	}
	
	function updatePOSTable($inputTransaction, $no_va, $evaContainer){
		require "conn.php";
		if(!isset($Db)){
			isLog('DB Not Connected');
		}
        $sql="insert into listremit (TGL_KIRIM, VA_PENGIRIM, VA_PENERIMA, NO_TLP_CUST_PENGIRIM, NO_TLP_CUST_PENERIMA, NO_ID_PENGIRIM, NAMA_PENGIRIM, NAMA_PENERIMA, NEWS_TRANSFER, AMOUNT, FEE1, FEE2, STATUS, REFNUM, ADDR_PENGIRIM, ADDR_PENERIMA, IDMERCHANTREMITT) values(sysdate, '".trim($no_va)."', '".$evaContainer."', '".$inputTransaction['senderPhone']."', '".$inputTransaction['recipientPhone']."', '".$inputTransaction['senderID']."', '".$inputTransaction['senderName']."', '".str_replace('\'','\'\'',$inputTransaction['recipientName'])."', '".$inputTransaction['notiDesc']."', '".$inputTransaction['destAmount']."', '".$inputTransaction['feeAmount']."', '0',0,'".$inputTransaction['refCode']."','".$inputTransaction['senderAddress']."','null',2)";
        if($Db->ExecDML($sql)==true){
			$Db->closeDB();
            return 0;
        }else{
        	isLog('query failed: '.$sql);
			$Db->closeDB();
            return 7000;
		}
	}

	function updateBANKTable($inputTransaction, $no_va, $evaContainer){
		require "conn.php";
		if(!isset($Db)){
			isLog('DB Not Connected');
		}
		$sql="insert into listremit (TGL_KIRIM, VA_PENGIRIM, VA_PENERIMA, NO_TLP_CUST_PENGIRIM, NO_TLP_CUST_PENERIMA, NO_ID_PENGIRIM, NAMA_PENGIRIM, NAMA_PENERIMA, NEWS_TRANSFER, AMOUNT, FEE1, FEE2, STATUS, REFNUM, ADDR_PENGIRIM, ADDR_PENERIMA, IDMERCHANTREMITT) values(sysdate, '".trim($no_va)."', '".$evaContainer."', '".$inputTransaction['senderPhone']."', '".$inputTransaction['recipientPhone']."', '".$inputTransaction['senderID']."', '".$inputTransaction['senderName']."', '".str_replace('\'','\'\'',$inputTransaction['recipientName'])."', '".$inputTransaction['notiDesc']."', '".$inputTransaction['destAmount']."', '".$inputTransaction['feeAmount']."', '0',0,'".$inputTransaction['refCode']."','".$inputTransaction['senderAddress']."','null',3)";
		if($Db->ExecDML($sql)==true){
			$Db->closeDB();
			return 0;
		}else{
			isLog('query return empty: '.$sql);
			$Db->closeDB();
			return 7000;
		}
	}

	function cashBack($dest1Acc, $dest1Amount, $dest2Acc, $dest2Amount, $notiDesc, $notiPhone, $source1Acc, $merchant, $detilmerchant,$username,$inputTransaction){
		$wsAddr=readWsSett();
		$client = new nusoap_client($wsAddr['eva'], true);
		$err = $client->getError();
		if ($err) {
			isLog('error ws: '.$err);
			return 7000;
		}
		$sessionAcak=rand(1000000,9999999);
		$cekSaldo = array(
			'desc' => 'login remittance', 
			'password' => 'admin',
			'phoneNo' => '+6281395111218',
			'sessionId' => $sessionAcak,
			'userName' => 'admin' 				
		);
		$result = $client->call('login', array('inputLogin' => $cekSaldo));
		if ($client->fault) {
			isLog('ws fault');
			return 7000;
		}else{
			$err = $client->getError();
			if ($err) {
				isLog('error ws: '.$err);
				return 7000;
			}else{
				if($result['status']['resultDesc']==0){
					//========================================= PROSES DEBET ACCOUNT ==============================================
						if($username=='R3mC0o'){
							$subbPOS=37;
							$subbBANK=27;
							$subbFC=8;
						}elseif($username=='RemmitDemo'){
                                                        $subbPOS=12;
                                                        $subbBANK=27;
                                                        $subbFC=8;
						}elseif($username=='sm4I27on3parv'){
							$subbPOS=10;
							$subbBANK=11;
							$subbFC=9;
						}elseif($username=='mc6pI75'){
                        				$subbPOS=7;
                        				$subbBANK=18;
                        				$subbFC=17;
							$subbBNI=49;
							$subbBNIOFF=48;
						}elseif($username=='BNCTL'){
                                                        $subbPOS=12;
                                                        $subbBANK=33;
                                                        $subbFC=8;
                				}elseif($username=='h2halfa'){
                        				$subbPOS=7;
                        				$subbBANK=6;
                        				$subbFC=35;
                				}elseif($username=='Tr4ngL0'){
                 				        $subbPOS=12;
                        				$subbBANK=38;
                        				$subbFC=8;
						}elseif($username=='dsch2h'){
				                        $subbPOS=7;
				                        $subbBANK=22;
                        				$subbFC=28;
							$subbBNI=42;
							$subbBNIOFF=50;
						}elseif($username=='eMQ'){
                                                        $subbPOS=7;
                                                        $subbBANK=45;
                                                        $subbFC=46;
							$subbBNI=54;
							$subbBNIOFF=56;
						}elseif($username=='Incentiv3'){
                                                        $subbPOS=7;
                                                        $subbBANK=51;
                                                        $subbFC=52;
                				}else{
							$subbPOS=7;
							$subbBANK=6;
							$subbFC=8;
						}
						$sufix='';
						$sufix2='';
						if($merchant=='POS'){
							require "conn.php";
							if(!isset($Db)){
								isLog('DB Not Connected');
							}
							$sql="SELECT FEEFNT, FEEAGENT, FEESWITCH FROM feeadm where (" . $dest1Amount . " between mintrx and maxtrx) and SUBB=".$subbPOS;
							$Db->SelectData($sql);
							$isi=$Db->Content;
							$fifinet=0;
							$fiagen=0;
							$fiswitch=0;
							$fifinet=$isi[1][1];
							$fiagen=$isi[2][1];
							$fiswitch=$isi[3][1];
							$dest1Amount=$dest1Amount+$fiswitch;
							$dest2Amount=$fifinet+$fiagen;
							$sufix=' sebesar Rp. '.($dest1Amount-$fiswitch).', biaya admin Rp. '.($fifinet+$fiagen+$fiswitch);
							$sufix2=' sebesar Rp. '.$fiagen;
							if($isi[0][1]==0){
								isLog('query return empty: '.$sql);
								return 7102;
							}
						}elseif($merchant=='BANK'){
							require "conn.php";
							if(!isset($Db)){
								isLog('DB Not Connected');
							}
							$sql="SELECT FEEFNT, FEEAGENT, FEESWITCH FROM feeadm where (" . $dest1Amount . " between mintrx and maxtrx) and SUBB=".$subbBANK;
							$Db->SelectData($sql);
							$isi=$Db->Content;
							$fifinet=0;
							$fiagen=0;
							$fiswitch=0;
							$fifinet=$isi[1][1];
							$fiagen=$isi[2][1];
							$fiswitch=$isi[3][1];
							$dest1Amount=$dest1Amount+$fiswitch;
							$dest2Amount=$fifinet+$fiagen;
							$sufix=' no rek. '.trim(str_replace(' ','',substr($inputTransaction['destBankAcc'],5))).' sebesar Rp. '.($dest1Amount-$fiswitch).', biaya admin Rp. '.($fifinet+$fiagen+$fiswitch);
							$sufix2=' sebesar Rp. '.$fiagen;
							if($isi[0][1]==0){
								isLog('query return empty: '.$sql);
								return 7102;
							}
						}elseif($merchant=='FC'){
							require "conn.php";
							if(!isset($Db)){
								isLog('DB Not Connected');
							}
							$sql="SELECT FEEFNT, FEEAGENT, FEESWITCH FROM feeadm where (" . $dest1Amount . " between mintrx and maxtrx) and SUBB=".$subbFC;
							$Db->SelectData($sql);
							$isi=$Db->Content;
							$fifinet=0;
							$fiagen=0;
							$fiswitch=0;
							$fifinet=$isi[1][1];
							$fiagen=$isi[2][1];
							$fiswitch=$isi[3][1];
							$dest1Amount=$dest1Amount+$fiswitch;
							$dest2Amount=$fifinet+$fiagen;
							$sufix=' sebesar Rp. '.($dest1Amount-$fiswitch).', biaya admin Rp. '.($fifinet+$fiagen+$fiswitch);
							$sufix2=' sebesar Rp. '.$fiagen;
							if($isi[0][1]==0){
								isLog('query return empty: '.$sql);
								return 7102;
							}
						}elseif($merchant=='BNI'){
							require "conn.php";
							if(!isset($Db)){
								isLog('DB Not Connected');
							}
							$sql="SELECT FEEFNT, FEEAGENT, FEESWITCH FROM feeadm where (" . $dest1Amount . " between mintrx and maxtrx) and SUBB=".$subbBNI;
							$Db->SelectData($sql);
							$isi=$Db->Content;
							$fifinet=0;
							$fiagen=0;
							$fiswitch=0;
							$fifinet=$isi[1][1];
							$fiagen=$isi[2][1];
							$fiswitch=$isi[3][1];
							$dest1Amount=$dest1Amount+$fiswitch;
							$dest2Amount=$fifinet+$fiagen;
							$sufix=' sebesar Rp. '.($dest1Amount-$fiswitch).', biaya admin Rp. '.($fifinet+$fiagen+$fiswitch);
							$sufix2=' sebesar Rp. '.$fiagen;
							if($isi[0][1]==0){
								isLog('query return empty: '.$sql);
								return 7102;
							}
						}elseif($merchant=='BNIOFF'){
							require "conn.php";
							if(!isset($Db)){
								isLog('DB Not Connected');
							}
							$sql="SELECT FEEFNT, FEEAGENT, FEESWITCH FROM feeadm where (" . $dest1Amount . " between mintrx and maxtrx) and SUBB=".$subbBNIOFF;
							$Db->SelectData($sql);
							$isi=$Db->Content;
							$fifinet=0;
							$fiagen=0;
							$fiswitch=0;
							$fifinet=$isi[1][1];
							$fiagen=$isi[2][1];
							$fiswitch=$isi[3][1];
							$dest1Amount=$dest1Amount+$fiswitch;
							$dest2Amount=$fifinet+$fiagen;
							$sufix=' sebesar Rp. '.($dest1Amount-$fiswitch).', biaya admin Rp. '.($fifinet+$fiagen+$fiswitch);
							$sufix2=' sebesar Rp. '.$fiagen;
							if($isi[0][1]==0){
								isLog('query return empty: '.$sql);
								return 7102;
							}
						}
						$client2 = new nusoap_client($wsAddr['eva'], true);
						$err = $client2->getError();	
						if ($err){
							isLog('ws error: '.$sql);
							return 7000;
						}
						$traxId=rand(1000000,9999999);
						$cashIn= array(
							'description' => '(+) REVERSAL REMITTANCE '.$detilmerchant.$sufix.' Ref : '.$inputTransaction['refCode'],
							'dest1Acc' => $source1Acc, //
							'dest1Amount' => ($dest1Amount+$dest2Amount),
							//'dest2Acc' => '0',
							//'dest2Amount' => '0',
							'notiDesc' => '',//$notiDesc,
							'notiPhone' => '',//$notiPhone,
							'phoneNo' => '+6281395111218', //nomor yang login
							'sessionId' => $sessionAcak,
							'source1Acc' => $dest1Acc,
							'source1Amount' => $dest1Amount,
							'source2Acc' => $dest2Acc,
							'source2Amount' => $dest2Amount,
							'transactionType' => 'CASHBACKREMITTANCE'.$merchant,
							'traxId' => $traxId
						);
						
						$result = $client2->call('debetAccount', array('inputTransaction' => $cashIn));
						if ($client2->fault) {
							isLog('ws fault');
							return 7000;
						}
						else{
							$err = $client2->getError();
							if ($err) {
								isLog('ws error: '.$err);
								return 7000;
							}
							else{
								isLog($result['status']['resultDesc']);
								if(substr($result['status']['resultDesc'], 34, 8)=='BERHASIL'){
//============================================ TRANSFER FEE TO PARTNER/MERCHANT =============================================
									$client2 = new nusoap_client($wsAddr['eva'], true);
									$err = $client2->getError();	
									if ($err){
										isLog('ws error: '.$err);
										return 7000;
									}
									//$traxId=rand(1000000,9999999);
									$cashIn= array(
										'description' => '(-) REVERSAL FEE REMITTANCE '.$detilmerchant.$sufix2.' Ref : '.$inputTransaction['refCode'],
										'dest1Acc' => $dest2Acc,//$source1Acc, //
										'dest1Amount' => $fiagen,
									//	'dest2Acc' => $dest2Acc,
									//	'dest2Amount' => $dest2Amount,
										'notiDesc' => '',//$notiDesc,
										'notiPhone' => '',//$notiPhone,
										'phoneNo' => '+6281395111218', //nomor yang login
										'sessionId' => $sessionAcak,
										'source1Acc' => $source1Acc,//$dest2Acc,
										'source1Amount' => $fiagen,
									//	'source2Acc' => '0',
									//	'source2Amount' => '0',
										'transactionType' => 'CASHBACKREMITTANCE'.$merchant,
										'traxId' => $traxId
									);
									
									$result = $client2->call('debetAccount', array('inputTransaction' => $cashIn));
									if ($client2->fault) {
										isLog('ws fault: '.$err);
										return 7000;
									}
									else{
										$err = $client2->getError();
										if ($err) {
											isLog('ws error: '.$err);
											return 7000;
										}else{
											if(substr($result['status']['resultDesc'], 34, 8)=='BERHASIL'){
												isLog($result['status']['resultDesc']);
												return 0;
											}else{
												isLog($result['status']['resultDesc']);
												return 7000;
											}
										}
									}
//===========================================================================================================================
//									return 0;
								}else{
									return 7000;
								}
							}
						}
					//===========================================================================================================
				}
			}
		}
	}
	
	function getFeeFC($username){
		if($username=='R3mC0o'){
			$subbPOS=37;
			$subbBANK=27;
			$subbFC=8;
			$subbBNI=44;
			$subbBNIOFF=47;
		}elseif($username=='RemmitDemo'){
                        $subbPOS=12;
                        $subbBANK=27;
                        $subbFC=8;
                        $subbBNI=44;
                        $subbBNIOFF=47;
		}elseif($username=='sm4I27on3parv'){
			$subbPOS=10;
			$subbBANK=11;
			$subbFC=9;
		}elseif($username=='mc6pI75'){
			$subbPOS=7;
                        $subbBANK=18;
                        $subbFC=17;
			$subbBNI=49;
			$subbBNIOFF=48;
		}elseif($username=='t41waN'){
                        $subbPOS=7;
                        $subbBANK=30;
                        $subbFC=17;
			$subbBNI=43;
                }elseif($username=='ky0Dai'){
			$subbPOS=7;
                        $subbBANK=32;
                        $subbFC=17;
			$subbBNI=41;
			$subbBNIOFF=60;
		}elseif($username=='BNCTL'){
                        $subbPOS=12;
                        $subbBANK=33;
                        $subbFC=8;
			$subbBNI=40;
		}elseif($username=='h2halfa'){
                        $subbPOS=7;
                        $subbBANK=6;
                        $subbFC=35;
                }elseif($username=='Tr4ngL0'){
			$subbPOS=12;
                        $subbBANK=38;
                        $subbFC=8;
			$subbBNI=42;
		}elseif($username=='dsch2h'){
                        $subbPOS=7;
                        $subbBANK=22;
                        $subbFC=28;
			$subbBNI=42;
			$subbBNIOFF=50;
		}elseif($username=='eMQ'){
                        $subbPOS=7;
                        $subbBANK=45;
                	$subbFC=46;
			$subbBNI=54;
			$subbBNIOFF=56;
		}elseif($username=='Incentiv3'){
                        $subbPOS=7;
                        $subbBANK=51;
                        $subbFC=52;
		}elseif($username=='MCr3mitF1nn3t'){
                        $subbBNIOFF=72;
                        $subbBANK=70;
                        $subbBNI=71;
		}else{
			$subbPOS=7;
			$subbBANK=6;
			$subbFC=8;
		}
		$arrSetFee=array(
			'subbPOS' => $subbPOS,
			'subbBANK' => $subbBANK,
			'subbFC' => $subbFC,
			'subbBNI' => $subbBNI,
			'subbBNIOFF' => $subbBNIOFF);
		return $arrSetFee;
	}
	
	function getSettingFee($merchant, $dest1Amount, $username){
		$subb=getFeeFC($username);
		$subbPOS=$subb['subbPOS'];
		$subbBANK=$subb['subbBANK'];
		$subbFC=$subb['subbFC'];
		$subbBNI=$subb['subbBNI'];
		$subbBNIOFF=$subb['subbBNIOFF'];
		$arrSettFee=array();
		if($merchant=='POS'){
			require "conn.php";
			if(!isset($Db)){
				isLog('DB Not Connected');
			}
			$sql="SELECT FEEFNT, FEEAGENT, FEESWITCH FROM feeadm where (" . $dest1Amount . " between mintrx and maxtrx) and SUBB=".$subbPOS;
			$Db->SelectData($sql);
			$isi=$Db->Content;
			$arrSettFee['fifinet']=$isi[1][1];
			$arrSettFee['fiagenci']=$isi[2][1];
			$arrSettFee['fiagenco']=$isi[3][1];
			$arrSettFee['rc']=00;
			if($isi[0][1]==0){
				isLog('query return empty record: '.$sql);
				$arrSettFee['rc']=7102;
			}
		}elseif($merchant=='BANK'){
			require "conn.php";
			if(!isset($Db)){
				isLog('DB Not Connected');
			}
			$sql="SELECT FEEFNT, FEEAGENT, FEESWITCH FROM feeadm where (" . $dest1Amount . " between mintrx and maxtrx) and SUBB=".$subbBANK;
			$Db->SelectData($sql);
			$isi=$Db->Content;
			$arrSettFee['fifinet']=$isi[1][1];
			$arrSettFee['fiagenci']=$isi[2][1];
			$arrSettFee['fiagenco']=$isi[3][1];
			$arrSettFee['rc']=00;
			if($isi[0][1]==0){
				isLog('query return empty record: '.$sql);
				$arrSettFee['rc']=7102;
			}
		}elseif($merchant=='FC'){
			require "conn.php";
			if(!isset($Db)){
				isLog('DB Not Connected');
			}			
			$sql="SELECT FEEFNT, FEEAGENT, FEESWITCH FROM feeadm where (" . $dest1Amount . " between mintrx and maxtrx) and SUBB=".$subbFC;
			isLog($sql);
			$Db->SelectData($sql);
			$isi=$Db->Content;
			$arrSettFee['fifinet']=$isi[1][1];
			$arrSettFee['fiagenci']=$isi[2][1];
			$arrSettFee['fiagenco']=$isi[3][1];
			$arrSettFee['rc']=00;
			if($isi[0][1]==0){
				isLog('query return empty record: '.$sql);
				$arrSettFee['rc']=7102;
			}
		}elseif($merchant=='BNI'){
			require "conn.php";
			if(!isset($Db)){
				isLog('DB Not Connected');
			}			
			$sql="SELECT FEEFNT, FEEAGENT, FEESWITCH FROM feeadm where (" . $dest1Amount . " between mintrx and maxtrx) and SUBB=".$subbBNI;
			isLog($sql);
			$Db->SelectData($sql);
			$isi=$Db->Content;
			$arrSettFee['fifinet']=$isi[1][1];
			$arrSettFee['fiagenci']=$isi[2][1];
			$arrSettFee['fiagenco']=$isi[3][1];
			$arrSettFee['rc']=00;
			isLog('QUERY FEE '.$merchant.' : '.$sql);
			if($isi[0][1]==0){
				isLog('query return empty record: '.$sql);
				$arrSettFee['rc']=7102;
			}
		}elseif($merchant=='BNIOFF'){
			require "conn.php";
			if(!isset($Db)){
				isLog('DB Not Connected');
			}			
			$sql="SELECT FEEFNT, FEEAGENT, FEESWITCH FROM feeadm where (" . $dest1Amount . " between mintrx and maxtrx) and SUBB=".$subbBNIOFF;
			isLog($sql);
			$Db->SelectData($sql);
			$isi=$Db->Content;
			$arrSettFee['fifinet']=$isi[1][1];
			$arrSettFee['fiagenci']=$isi[2][1];
			$arrSettFee['fiagenco']=$isi[3][1];
			$arrSettFee['rc']=00;
			isLog('QUERY FEE '.$merchant.' : '.$sql);
			if($isi[0][1]==0){
				isLog('query return empty record: '.$sql);
				$arrSettFee['rc']=7102;
			}
		}
		return $arrSettFee;
	}
	
	function cekBatch($inputTransaction){
		require "conn.php";
		if(!isset($Db)){
			isLog('DB Not Connected');
			return '01';
		}
		$sql="SELECT SIGNATURE FROM REQ_BATCH_C2B WHERE SIGNATURE = '" . $inputTransaction['signature'] . "'";
		$Db->SelectData($sql);
		$isi=$Db->Content;
		if($isi[1][1]==$inputTransaction['signature']){
			//isLog('query return empty record: '.$sql);
			return '00';
		}else{
			isLog('query return empty record: '.$sql);
			return '01';
		}
	}

	function debetSaldo($dest1Acc, $dest1Amount, $dest2Acc, $dest2Amount, $notiDesc, $notiPhone, $source1Acc, $merchant, $detilmerchant,$username,$inputTransaction){
		$wsAddr=readWsSett();
		$client = new nusoap_client($wsAddr['eva'], true);
		$err = $client->getError();
		isLog('Url WSDL '.$wsAddr['eva']);
		if ($err) {
			isLog('loginErr-'.$err);
			return 7000;
		}
		//isLog('x');
		$sessionAcak=rand(1000000,9999999);
		$cekSaldo = array(
			'desc' => 'login remittance', 
			'password' => 'admin',
			'phoneNo' => '+6281395111218',
			'sessionId' => $sessionAcak,
			'userName' => 'admin' 				
		);
		$result = $client->call('login', array('inputLogin' => $cekSaldo));
		if ($client->fault) {
			isLog('loginFault-'.$err);
			return 7000;
		}else{
			$err = $client->getError();
			if ($err) {
				isLog('loginErr2-'.$err);
				return 7000;
			}else{
				if($result['status']['resultDesc']==0){
					//========================================= PROSES DEBET ACCOUNT ==============================================
						isLog('Debet Saldo login success!!');
						$arrSetFeeX=getFeeFC($username);
						$subbPOS=$arrSetFeeX['subbPOS'];
						$subbBANK=$arrSetFeeX['subbBANK'];
						$subbFC=$arrSetFeeX['subbFC'];
						$subbBNI=$arrSetFeeX['subbBNI'];
						$subbBNIOFF=$arrSetFeeX['subbBNIOFF'];
						$sufix='';
						$sufix2='';
						if($merchant=='POS'){
							require "conn.php";
							if(!isset($Db)){
								isLog('DB Not Connected');
							}
							$sql="SELECT FEEFNT, FEEAGENT, FEESWITCH FROM feeadm where (" . $dest1Amount . " between mintrx and maxtrx) and SUBB=".$subbPOS;
							$Db->SelectData($sql);
							$isi=$Db->Content;
							$fifinet=0;
							$fiagen=0;
							$fiswitch=0;
							$fifinet=$isi[1][1];
							$fiagen=$isi[2][1];
							$fiswitch=$isi[3][1];
							$dest1Amount=$dest1Amount+$fiswitch;
							$dest2Amount=$fifinet+$fiagen;
							$sufix=' sebesar Rp. '.($dest1Amount-$fiswitch).', biaya admin Rp. '.($fifinet+$fiagen+$fiswitch);
							$sufix2=' sebesar Rp. '.$fiagen;
							if($isi[0][1]==0){
								isLog('query return empty record: '.$sql);
								return 7102;
							}
						}elseif($merchant=='BANK'){
							require "conn.php";
							if(!isset($Db)){
								isLog('DB Not Connected');
							}
							$sql="SELECT FEEFNT, FEEAGENT, FEESWITCH FROM feeadm where (" . $dest1Amount . " between mintrx and maxtrx) and SUBB=".$subbBANK;
							$Db->SelectData($sql);
							$isi=$Db->Content;
							$fifinet=0;
							$fiagen=0;
							$fiswitch=0;
							$fifinet=$isi[1][1];
							$fiagen=$isi[2][1];
							$fiswitch=$isi[3][1];
							$dest1Amount=$dest1Amount+$fiswitch;
							$dest2Amount=$fifinet+$fiagen;
							$sufix=' no rek. '.trim(str_replace(' ','',substr($inputTransaction['destBankAcc'],4))).' sebesar Rp. '.($dest1Amount-$fiswitch).' dengan biaya admin Rp. '.($fifinet+$fiagen+$fiswitch);
							$sufix2=' sebesar Rp. '.$fiagen;
							if($isi[0][1]==0){
								isLog('query return empty record: '.$sql);
								return 7102;
							}
						}elseif($merchant=='FC'){
							require "conn.php";
							if(!isset($Db)){
								isLog('DB Not Connected');
							}
							$sql="SELECT FEEFNT, FEEAGENT, FEESWITCH FROM feeadm where (" . $dest1Amount . " between mintrx and maxtrx) and SUBB=".$subbFC;
							$Db->SelectData($sql);
							$isi=$Db->Content;
							$fifinet=0;
							$fiagen=0;
							$fiswitch=0;
							$fifinet=$isi[1][1];
							$fiagen=$isi[2][1];
							$fiswitch=$isi[3][1];
							$dest1Amount=$dest1Amount+$fiswitch;
							$dest2Amount=$fifinet+$fiagen;
							$sufix=' sebesar Rp. '.($dest1Amount-$fiswitch).', biaya admin Rp. '.($fifinet+$fiagen+$fiswitch);
							$sufix2=' sebesar Rp. '.$fiagen;
							if($isi[0][1]==0){
								isLog('query return empty record: '.$sql);
								return 7102;
							}
						}elseif($merchant=='BNI'){
							require "conn.php";
							if(!isset($Db)){
								isLog('DB Not Connected');
							}
							$sql="SELECT FEEFNT, FEEAGENT, FEESWITCH FROM feeadm where (" . $dest1Amount . " between mintrx and maxtrx) and SUBB=".$subbBNI;
							$Db->SelectData($sql);
							$isi=$Db->Content;
							$fifinet=0;
							$fiagen=0;
							$fiswitch=0;
							$fifinet=$isi[1][1];
							$fiagen=$isi[2][1];
							$fiswitch=$isi[3][1];
							$dest1Amount=$dest1Amount+$fiswitch;
							$dest2Amount=$fifinet+$fiagen;
							$sufix=' no rek. '.trim(str_replace(' ','',substr($inputTransaction['destBankAcc'],4))).' sebesar Rp. '.($dest1Amount-$fiswitch).' dengan biaya admin Rp. '.($fifinet+$fiagen+$fiswitch);
							$sufix2=' sebesar Rp. '.$fiagen;
							if($isi[0][1]==0){
								isLog('query return empty record: '.$sql);
								return 7102;
							}
						}elseif($merchant=='BNIOFF'){
							require "conn.php";
							if(!isset($Db)){
								isLog('DB Not Connected');
							}
							$sql="SELECT FEEFNT, FEEAGENT, FEESWITCH FROM feeadm where (" . $dest1Amount . " between mintrx and maxtrx) and SUBB=".$subbBNIOFF;
							$Db->SelectData($sql);
							$isi=$Db->Content;
							$fifinet=0;
							$fiagen=0;
							$fiswitch=0;
							$fifinet=$isi[1][1];
							$fiagen=$isi[2][1];
							$fiswitch=$isi[3][1];
							$dest1Amount=$dest1Amount+$fiswitch;
							$dest2Amount=$fifinet+$fiagen;
							$sufix=' no rek. '.trim(str_replace(' ','',substr($inputTransaction['destBankAcc'],4))).' sebesar Rp. '.($dest1Amount-$fiswitch).' dengan biaya admin Rp. '.($fifinet+$fiagen+$fiswitch);
							$sufix2=' sebesar Rp. '.$fiagen;
							if($isi[0][1]==0){
								isLog('query return empty record: '.$sql);
								return 7102;
							}
						}
						$client2 = new nusoap_client($wsAddr['eva'], true);
						$err = $client2->getError();	
						if ($err){
							isLog('debetErr-'.$err);
							return 7000;
						}
						$traxId=rand(1000000,9999999);
						$cashIn= array(
							'description' => '(-) REMITTANCE ke '.$detilmerchant.$sufix.' Ref : '.$inputTransaction['refCode'],
							'dest1Acc' => $dest1Acc, //
							'dest1Amount' => $dest1Amount,
							'dest2Acc' => $dest2Acc,
							'dest2Amount' => $dest2Amount,
							'notiDesc' => '',//$notiDesc,
							'notiPhone' => '',//$notiPhone,
							'phoneNo' => '+6281395111218', //nomor yang login
							'sessionId' => $sessionAcak,
							'source1Acc' => $source1Acc,
							'source1Amount' => ($dest1Amount+$dest2Amount),
						//	'source2Acc' => '0',
						//	'source2Amount' => '0',
							'transactionType' => 'CASHINREMITTANCE'.$merchant,
							'traxId' => $traxId
						);
						isLog($source1Acc.'->'.$dest1Acc.'+'.$dest2Acc.'='.($dest1Amount+$dest2Amount));	
						$result = $client2->call('debetAccount', array('inputTransaction' => $cashIn));
						if ($client2->fault) {
							isLog('debetFault-'.$err);
							return 7000;
						}
						else{
							$err = $client2->getError();
							if ($err) {
								isLog('debetErr2-'.$err);
								return 7000;
							}else{
								if($result['status']['resultCode']=='0' and $fiagen==0){
									$arr = array();
									$arr['resultCode']=0;
									$arr['hostRef']=$result['status']['hostRef'];
									return $arr;
								}elseif($result['status']['resultCode']=='0' and $fiagen>0){
									isLog('ok '.$result['status']['resultDesc']);
									isLog('kirim fee agen '.$fiagen);
//============================================ TRANSFER FEE TO PARTNER/MERCHANT =============================================
									isLog('kirim fee agen '.$fiagen);
									$client2 = new nusoap_client($wsAddr['eva'], true);
									$err = $client2->getError();	
									if ($err){
										isLog('debetErr-'.$err);
										return 7000;
									}
									//$traxId=rand(1000000,9999999);
									$cashIn= array(
										'description' => '(+) FEE REMITTANCE '.$detilmerchant.$sufix2.' Ref : '.$inputTransaction['refCode'],
										'dest1Acc' => $source1Acc, //
										'dest1Amount' => $fiagen,
									//	'dest2Acc' => $dest2Acc,
									//	'dest2Amount' => $dest2Amount,
										'notiDesc' => '',//$notiDesc,
										'notiPhone' => '',//$notiPhone,
										'phoneNo' => '+6281395111218', //nomor yang login
										'sessionId' => $sessionAcak,
										'source1Acc' => $dest2Acc,
										'source1Amount' => $fiagen,
									//	'source2Acc' => '0',
									//	'source2Amount' => '0',
										'transactionType' => 'CASHINREMITTANCE'.$merchant,
										'traxId' => $traxId
									);
									
									$result = $client2->call('debetAccount', array('inputTransaction' => $cashIn));
									if ($client2->fault) {
										isLog('debetFault-'.$err);
										return 7000;
									}
									else{
										$err = $client2->getError();
										if ($err) {
											isLog('debetErr2-'.$err);
								//============================================ CASHBACK BECAUSE FAILED TO TRANSFER FEE =============================================
											$client3 = new nusoap_client($wsAddr['eva'], true);
											$err = $client3->getError();	
											if ($err){
												isLog('debetErr-'.$err);
												return 7000;
											}
											//$traxId=rand(1000000,9999999);
											$cashIn= array(
												'description' => '(+) REVERSAL REMITTANCE '.$detilmerchant.$sufix.' Ref : '.$inputTransaction['refCode'],
												'dest1Acc' => $source1Acc, //
												'dest1Amount' => ($dest1Amount+$dest2Amount),
												//'dest2Acc' => $dest2Acc,
												//'dest2Amount' => $dest2Amount,
												'notiDesc' => '',//$notiDesc,
												'notiPhone' => '',//$notiPhone,
												'phoneNo' => '+6281395111218', //nomor yang login
												'sessionId' => $sessionAcak,
												'source1Acc' => $dest1Acc,//$source1Acc,
												'source1Amount' => $dest1Amount,//($dest1Amount+$dest2Amount),
												'source2Acc' => $dest2Acc,
												'source2Amount' => $dest2Amount,
												'transactionType' => 'CASHBACK1CASHINREMITTANCE'.$merchant,
												'traxId' => $traxId
											);
											
											$result = $client3->call('debetAccount', array('inputTransaction' => $cashIn));
											if ($client3->fault) {
												isLog('debetFault-'.$err);
												return 7000;
											}
											else{
												$err = $client3->getError();
												if ($err) {
													isLog('debetErr2-'.$err);
													return 7000;
												}else{
													if(substr($result['status']['resultDesc'], 34, 8)=='BERHASIL'){
														isLog('CASHBACK:'.$result['status']['resultDesc']);
														$arr = array();
														$arr['resultCode']=0;
														$arr['hostRef']=$result['status']['hostRef'];
														return $arr;
													}else{
														isLog('oi '.$result['status']['resultDesc']);
														return 7000;
													}
												}
											}
								//===========================================================================================================================
											return 7000;
										}else{
											if($result['status']['resultCode']=='0'){
												isLog('ou '.$result['status']['resultDesc']);
												$arr = array();
												$arr['resultCode']=0;
												$arr['hostRef']=$result['status']['hostRef'];
												return $arr;
											}else{
												isLog('op '.$result['status']['resultDesc']);
												return 7000;
											}
										}
									}
//===========================================================================================================================
									//return 0;
								}elseif($result['status']['resultCode']==53){
									isLog('oy '. $result['status']['resultDesc']);
									return 7101;
								}else{
									isLog('or '.$result['status']['resultDesc']);
									return 7000;
								}
							}
						}
					//===========================================================================================================
				}
			}
		}
	}

	function debetSaldoConf($source1Acc, $source1Amount, $source2Acc, $source2Amount, $dest1Acc, $inputTransaction){
		$wsAddr=readWsSett();
		$client = new nusoap_client($wsAddr['eva'], true);
		$err = $client->getError();
		if ($err) {
			isLog('loginErr-'.$err);
			return 7000;
		}
		$sessionAcak=rand(1000000,9999999);
		$cekSaldo = array(
			'desc' => 'login remittance', 
			'password' => 'admin',
			'phoneNo' => '+6281395111218',
			'sessionId' => $sessionAcak,
			'userName' => 'admin' 				
		);
		$result = $client->call('login', array('inputLogin' => $cekSaldo));
		if ($client->fault) {
			isLog('loginFault-'.$err);
			return 7000;
		}else{
			$err = $client->getError();
			if ($err) {
				isLog('loginErr2-'.$err);
				return 7000;
			}else{
				isLog($result['status']['resultDesc']);
				if($result['status']['resultCode']==0){
					//========================================= PROSES DEBET ACCOUNT ==============================================
					$client2 = new nusoap_client($wsAddr['eva'], true);
					$err = $client2->getError();	
					if ($err){
						isLog('debetErr-'.$err);
						return 7000;
					}
					$traxId=rand(1000000,9999999);
					$cashIn= array(
						'description' => '(+) CASHOUT REMITANCE FC sebesar Rp. '.$source1Amount.', fee Rp. '.$source2Amount,
						'dest1Acc' => $dest1Acc, //
						'dest1Amount' => ($source1Amount+$source2Amount),
					//	'dest2Acc' => $dest2Acc,
					//	'dest2Amount' => $dest2Amount,
						'notiDesc' => '',//$notiDesc,
						'notiPhone' => '',//$notiPhone,
						'phoneNo' => '+6281395111218', //nomor yang login
						'sessionId' => $sessionAcak,
						'source1Acc' => $source1Acc,
						'source1Amount' => $source1Amount,
						'source2Acc' => $source2Acc,
						'source2Amount' => $source2Amount,
						'transactionType' => 'CASHOUTREMITTANCEFC',
						'traxId' => $traxId
					);
						
						$result = $client2->call('debetAccount', array('inputTransaction' => $cashIn));
						if ($client2->fault) {
							isLog('debetFault-'.$err);
							return 7000;
						}
						else{
							$err = $client2->getError();
							if ($err) {
								isLog('debetErr2-'.$err);
								return 7000;
							}
							else{
								if(substr($result['status']['resultDesc'], 34, 8)=='BERHASIL'){
									isLog($result['status']['resultDesc']);
									$arr = array();
									$arr['resultCode']=00;
									$arr['hostRef']=$result['status']['hostRef'];
									return $arr;
								}elseif($result['status']['resultCode']==53){
									isLog($result['status']['resultDesc']);
									return 7101;
								}else{
									isLog($result['status']['resultDesc']);
									return 7000;
								}
							}
						}
					//===========================================================================================================
				}
			}
		}
	}

	function confirmTransaction($inputTransaction){
		require "conn.php";
		$t = microtime(true);
		$micro = sprintf("%06d",($t - floor($t)) * 1000000);
		$d = new DateTime( date('Y-m-d H:i:s.'.$micro,$t) );
		$has1=$d->format("dmYHis");

		if(!isset($Db)){
			isLog('cannot connect to database');
			return 7000;
		}
		isLog($inputTransaction['traxId'].':begin update logroutex');
		$sql='Update logroutex set info1=\'88\', info2=\''.$has1.'\', typeid=\'2\', tanggal=sysdate, info12=\''.$inputTransaction['terminal'].'\', reffeva=\''.$inputTransaction['reffx'].'\'
			where refcode=\''.$inputTransaction['refCode'].'\' AND
			uname=\''.$inputTransaction['userName'].'\' AND
			destamount='.$inputTransaction['destAmount'].' AND
			terminal=\''.$inputTransaction['terminal'].'\' AND
			RECEPTADDR=\''.$inputTransaction['recipientAddress'].'\'';
		if($Db->ExecDML($sql)==true){
			$Db->closeDB();
			isLog($inputTransaction['traxId'].':end update logroutex');
			return 0;
		}else{
			isLog('query failed: '.$sql);
			isLog($inputTransaction['traxId'].':end update logroutex');
			$Db->closeDB();
			return 7000;
		}
	}

	function updateNSetPayCode($inputTransaction,$randomString){
		require "conn.php";
		if(!isset($Db)){
			isLog('cannot connect to database');
			return 7000;
		}
		/*$sql='Update logroutex set info7=\''.$randomString.'\'
			where refcode=\''.$inputTransaction['refCode'].'\' AND
			uname=\''.$inputTransaction['userName'].'\' AND
			destamount='.$inputTransaction['destAmount'].'';
		*/
		$sql='Update logroutex set info7=\''.$randomString.'\'
                        where refcode=\''.$inputTransaction['refCode'].'\' AND
                        destamount=\''.$inputTransaction['destAmount'].'\'';
		if($Db->ExecDML($sql)==true){
			isLog('query sukses : '.$sql);
			$Db->closeDB();
			return 0;
		}else{
			isLog('query failed: '.$sql);
			$Db->closeDB();
			return 7000;
		}
	}
		
	function confirmTransactionAlto($inputTransaction,$noRefAlto,$resCode,$resNote){
		require "conn.php";
		$t = microtime(true);
		$micro = sprintf("%06d",($t - floor($t)) * 1000000);
		$d = new DateTime( date('Y-m-d H:i:s.'.$micro,$t) );
		$has1=$d->format("dmYHis");

		if(!isset($Db)){
			isLog('cannot connect to database');
			return 7000;
		}
		isLog($inputTransaction['traxId'].':begin update logroutex');
		$sql='Update logroutex set info1=\'88\', info2=\''.$has1.'\', typeid=\'2\', info4=\''.$noRefAlto.'\', tanggal=sysdate, refcode=\''.$inputTransaction['refCode'].'\', reffeva=\''.$inputTransaction['reffx'].'\'
			where refcode=\''.$inputTransaction['refCode'].'\' AND
			uname=\''.$inputTransaction['userName'].'\' AND
			destamount='.$inputTransaction['destAmount'].' AND
			terminal=\''.$inputTransaction['terminal'].'\'';
			//isLog($sql);
		if($Db->ExecDML($sql)==true){
			$Db->closeDB();
			isLog($inputTransaction['traxId'].':end update logroutex');
			return 0;
		}else{
			isLog('query failed: '.$sql);
			$Db->closeDB();
			isLog($inputTransaction['traxId'].':end update logroutex');
			return 7000;
		}
	}
	
	function confirmTransactionAltoC2A($inputTransaction,$noTrace,$rc){
		require "conn.php";
		$t = microtime(true);
		$micro = sprintf("%06d",($t - floor($t)) * 1000000);
		$d = new DateTime( date('Y-m-d H:i:s.'.$micro,$t) );
		$has1=$d->format("dmYHis");

		if(!isset($Db)){
			isLog('DB Not Connected');
			return 7000;
		}
		isLog($inputTransaction['traxId'].':begin update logroutex');
		$sql='Update logroutex set info1=\'88\', info2=\''.$has1.'\', typeid=\'2\', info5=\''.$noTrace.'\', tanggal=sysdate, info6=\''.$rc.'\', reffeva=\''.$inputTransaction['reffx'].'\'
			where refcode=\''.$inputTransaction['refCode'].'\' AND
			uname=\''.$inputTransaction['userName'].'\' AND
			destamount='.$inputTransaction['destAmount'].' AND
			terminal=\''.$inputTransaction['terminal'].'\'';
		isLog($sql);
		if($Db->ExecDML($sql)==true){
			$Db->closeDB();
			isLog($inputTransaction['traxId'].':end update logroutex');
			return 0;
		}else{
			$Db->closeDB();
			isLog('query failed: '.$sql);
			isLog($inputTransaction['traxId'].':end update logroutex');
			return 7000;
		}
	}

        function confirmTransactionAltoC2Aggl($inputTransaction,$noTrace,$rc){
                require "conn.php";
                $t = microtime(true);
                $micro = sprintf("%06d",($t - floor($t)) * 1000000);
                $d = new DateTime( date('Y-m-d H:i:s.'.$micro,$t) );
                $has1=$d->format("dmYHis");

                if(!isset($Db)){
                        isLog('DB Not Connected');
                        return 7000;
                }
		isLog($inputTransaction['traxId'].':begin update logroutex');
                $sql='Update logroutex set info1=\'88\', info2=\''.$has1.'\', typeid=\'2\', info5=\''.$noTrace.'\', tanggal=sysdate, info6=\''.$rc.'\'
                        where refcode=\''.$inputTransaction['refCode'].'\' AND
                        uname=\''.$inputTransaction['userName'].'\' AND
                        destamount='.$inputTransaction['destAmount'].' AND
                        terminal=\''.$inputTransaction['terminal'].'\'';
                //isLog($sql);
                if($Db->ExecDML($sql)==true){
                        $Db->closeDB();
			isLog($inputTransaction['traxId'].':end update logroutex');
                        return 0;
                }else{
                        $Db->closeDB();
                        isLog('query failed: '.$sql);
			isLog($inputTransaction['traxId'].':end update logroutex');
                        return 7000;
                }
        }
	

	function confirmTransactionCashoutFC($inputTransaction, $no_va, $cacode, $feeco, $feefinnet){
		require "conn.php";
		if(!isset($Db)){
			isLog('DB Not Connected');
			return 7000;
		}
		$sql="insert into transaksisukses (tanggal, trxdesc, stetus, no_va, amount,kode, add_info, product, idpelanggan, fee, fifinet) values(sysdate, 'Cash Out remittance fc', 'SUKSES','".$no_va."','".$inputTransaction['destAmount']."','".$cacode."','".$cacode."00', '3333', '".$inputTransaction['recipientPhone']."', ".$feeco.", ".$feefinnet.")";
		$bolean=$Db->ExecDML($sql);
		if(!$bolean){
			isLog('query failed: '.$sql);
		}

		$sql="insert into finlog (tanggal, desk, amount, status, terminal, nomor, userid, product_code) values(sysdate, 'cash out remittance fc', '".$inputTransaction['destAmount']."', '1', '".$cacode."00', '".$inputTransaction['recipientPhone']."','".$cacode."', '3333')";
		$bolean=$Db->ExecDML($sql);
		if(!$bolean){
			isLog('query failed: '.$sql);
		}

		$sql="update LOGROUTEX set INFO1='99',INFO13='".$inputTransaction['terminal']."',reffeva='".$inputTransaction['reffx']."' where REFCODE='".$inputTransaction['refCode']."'";
		$bolean=$Db->ExecDML($sql);
		if(!$bolean){
			isLog('query failed: '.$sql);
		}

		$sql="update listremit set status=7, tgl_terima=sysdate, va_penerima='".$no_va."' where refnum='".$inputTransaction['refCode']."'";
		$bolean=$Db->ExecDML($sql);
		if(!$bolean){
			isLog('query failed: '.$sql);
		}
		$Db->closeDB();
	}	

	function readWsSett(){
		$file = "wsSetting.property";
		$f = fopen($file, "r");
		//$jambret = array();
		$wsSett=array();
		$konter=0;
		$ket='';
		while ( $line = fgets($f, 200) ) {
			$code=explode('=',$line);
			$wsSett[$code[0]]=trim($code[1]);
		}
		return $wsSett;
	}
	
	function readAccCont(){
		$file = "accountSetting.property";
		$f = fopen($file, "r");
		//$jambret = array();
		$accContainer=array();
		$konter=0;
		$ket='';
		while ( $line = fgets($f, 90) ) {
			$code=explode(':',$line);
			$accContainer[$code[0]]=trim($code[1]);
			$accContainer['EVANUM'.$code[0]]=trim($code[2]);
		}
		return $accContainer;
	}

	function readSettingAlto(){
		$file = "altoSetting.property";
		$f = fopen($file, "r");
		//$jambret = array();
		$confAlto=array();
		$konter=0;
		$ket='';
		while ( $line = fgets($f, 90) ) {
			$code=explode(':',$line);
			$confAlto[$code[0]]=trim($code[1]);
		}
		return $confAlto;
	}
	
	function remmitAltoC2C($inputTransaction){
		$wsAddr=readWsSett();
		$client = new nusoap_client($wsAddr['altoc2c'], true);
		$err = $client->getError();
		if ($err) {
			isLog('ws alto err: '.$err);
			return 7000;
		}
		$confAlto=readSettingAlto();
		$signature=md5(sha1($confAlto['password']).$inputTransaction['refCode'].$inputTransaction['destAmount'].$inputTransaction['recipientName'].$inputTransaction['recipientCity'].$inputTransaction['recipientAddress'].$inputTransaction['senderName'].$inputTransaction['senderCountry']);
	
		$remmit="<username xsi:type='xsd:string'>".$confAlto['username']."</username><signature xsi:type='xsd:string'>".$signature."</signature><trace_number xsi:type='xsd:string'>".$inputTransaction['refCode']."</trace_number><param SOAP-ENC:arrayType='ns2:Map[1]' xsi:type='SOAP-ENC:Array' xmlns:ns2='http://xml.apache.org/xml-soap'><item xsi:type='ns2:Map'><item><key xsi:type='xsd:string'>trxamount</key><value xsi:type='xsd:string'>".$inputTransaction['destAmount']."</value></item><item><key xsi:type='xsd:string'>beneficiaryname</key><value xsi:type='xsd:string'>".$inputTransaction['recipientName']."</value></item><item><key xsi:type='xsd:string'>beneficiarycity</key><value xsi:type='xsd:string'>".$inputTransaction['recipientCity']."</value></item><item><key xsi:type='xsd:string'>beneficiaryaddress</key><value xsi:type='xsd:string'>".$inputTransaction['recipientAddress']."</value></item><item><key xsi:type='xsd:string'>sendername</key><value xsi:type='xsd:string'>".$inputTransaction['senderName']."</value></item><item><key xsi:type='xsd:string'>sendercountry</key><value xsi:type='xsd:string'>".$inputTransaction['senderCountry']."</value></item><item><key xsi:type='xsd:string'>note</key><value xsi:type='xsd:string'>".$inputTransaction['notiDesc']."</value></item></item></param>";

		$result = $client->call('remmit',$remmit);
		if ($client->fault) {
			isLog('ws alto fault: '.$err);
			$result['rc']=7004;
			return $result;
		}else{
			$err = $client->getError();
			if ($err) {
				isLog('ws alto err: '.$err);
				$result['rc']=7004;
				return $result;
			}else{
				isLog('RC Alto '.$result['0']['result_code']);
				isLog('Result Note Alto '.$result['0']['result_note']);
				$result['rc']=$result[0]['result_code'];
				if($result[0]['result_code']==00){
					return $result;
				}else{
					return $result;
				}
			}
		}
	}
	
	function checkBalance($sourcePhoneNum){
		require "conn.php"; //cek saldo
		$sql="select b.CURR_BALANCE ,a.CUSTTYPEID from MC.WALLET_ACC b, MC.CUSTOMER a where b.WALLET_CODE=a.CUSTCODE AND a.CONTACTPHONE='".$sourcePhoneNum."'";
		isLog($sql);
		$Db2->SelectData($sql);
		$isio=$Db2->Content;
		if(empty($isio[1][1])){
			isLog('query return empty record: '.$sql);
		}		//$Db2->SelectData($sql);
		//$isi=$Db2->Content;
		isLog('Row_'.$isio[0][1]);
		isLog('Saldo_'.$sourcePhoneNum.'_'.$isio[1][1]);
	 	isLog('type : '.$isio[2][1]);	
		if($isio[2][1]=='10' || $isio[2][1]=='11'){
			isLog('Bukan Delima Point');
			return 0;
		}else{
			if($isio[1][1]<=100000){	
				return 7101;
			}else{
				return 0;
			}
		}
	}

        function checkBalance2($sourcePhoneNum){
                require "conn.php"; //cek saldo
                $sql="select b.CURR_BALANCE from MC.WALLET_ACC b, MC.CUSTOMER a where b.WALLET_CODE=a.CUSTCODE AND a.CONTACTPHONE='".$sourcePhoneNum."'";
                isLog($sql);
                $Db2->SelectData($sql);
                $isio=$Db2->Content;
                if(empty($isio[1][1])){
                        isLog('query return empty record: '.$sql);
                }               //$Db2->SelectData($sql);
                isLog('Row_'.$isio[0][1]);
                isLog('Saldo_'.$sourcePhoneNum.'_'.$isio[1][1]);
		return $isio[1][1];
        }

	function vanishedZero($str){ //REMOVE SPACE CHARACTER
		return str_replace(' ','',trim($str));
	}
	
	function remmitAltoC2A($inputTransaction){
                
		require "conn.php";
                if(!isset($Db)){
                        isLog('DB Not Connected');
                        return 7000;
                }
		isLog($inputTransaction['traxId'].':begin update logroutex');
                $sql='Update logroutex set info1=\'78\', info2=\''.$has1.'\', typeid=\'2\', info5=\''.$noTrace.'\', tanggal=sysdate, info8=\'R\'
                        where refcode=\''.$inputTransaction['refCode'].'\' AND
                        uname=\''.$inputTransaction['userName'].'\' AND
                        destamount='.$inputTransaction['destAmount'].' AND
                        terminal=\''.$inputTransaction['terminal'].'\'';
                isLog($sql);
		$Db->ExecDML($sql);
		isLog($inputTransaction['traxId'].':end update logroutex');
		$wsAddr=readWsSett();
		$client = new nusoap_client($wsAddr['altoc2a'], true);
		$err = $client->getError();
		if ($err) {
			isLog('transferRemittanceResErr-'.$err);
			return 7000;
		}
		$confAlto=readSettingAlto();
		$accNum=vanishedZero(substr($inputTransaction['destBankAcc'],4));
		isLog('|'.$accNum.'|');
		//==============================
		$signature=md5($inputTransaction['refCode'].sha1($confAlto['password']).substr($inputTransaction['destBankAcc'],1,3).$accNum.$inputTransaction['destAmount']);
		//PARAM WS LAMA
		//$transferRemittance="<username xsi:type='xsd:string'>".$confAlto['username']."</username><signature xsi:type='xsd:string'>".$signature."</signature><trace_number xsi:type='xsd:string'>".$inputTransaction['refCode']."</trace_number><param SOAP-ENC:arrayType='ns2:Map[1]' xsi:type='SOAP-ENC:Array' xmlns:ns2='http://xml.apache.org/xml-soap'><item xsi:type='ns2:Map'><item><key xsi:type='xsd:string'>customer_name</key><value xsi:type='xsd:string'>".$inputTransaction['senderName']."</value></item><item><key xsi:type='xsd:string'>currency</key><value xsi:type='xsd:string'>IDR</value></item><item><key xsi:type='xsd:string'>customer_phone</key><value xsi:type='xsd:string'>".$inputTransaction['senderPhone']."</value></item><item><key xsi:type='xsd:string'>account_number</key><value xsi:type='xsd:string'>".$accNum."</value></item><item><key xsi:type='xsd:string'>account_name</key><value xsi:type='xsd:string'>".$inputTransaction['recipientName']."</value></item><item><key xsi:type='xsd:string'>bank_code</key><value xsi:type='xsd:string'>".substr($inputTransaction['destBankAcc'],1,3)."</value></item><item><key xsi:type='xsd:string'>customer_email</key><value xsi:type='xsd:string'>".$inputTransaction['description']."</value></item><item><key xsi:type='xsd:string'>amount</key><value xsi:type='xsd:string'>".$inputTransaction['destAmount']."</value></item><item><key xsi:type='xsd:string'>note</key><value xsi:type='xsd:string'>".$inputTransaction['description']."</value></item></item></param>";
		
		//PARAM WS BARU
		//$transferRemittance="<username xsi:type='xsd:string'>".$confAlto['username']."</username><signature xsi:type='xsd:string'>".$signature."</signature><trace_number xsi:type='xsd:string'>".$inputTransaction['refCode']."</trace_number><param SOAP-ENC:arrayType='ns2:Map[1]' xsi:type='SOAP-ENC:Array' xmlns:ns2='http://xml.apache.org/xml-soap'><item xsi:type='ns2:Map'><item><key xsi:type='xsd:string'>sender_name</key><value xsi:type='xsd:string'>".$inputTransaction['senderName']."</value></item><item><key xsi:type='xsd:string'>currency</key><value xsi:type='xsd:string'>IDR</value></item><item><key xsi:type='xsd:string'>sender_id</key><value xsi:type='xsd:string'>".$inputTransaction['senderID']."</value></item><item><key xsi:type='xsd:string'>account_number</key><value xsi:type='xsd:string'>".$accNum."</value></item><item><key xsi:type='xsd:string'>account_name</key><value xsi:type='xsd:string'>".$inputTransaction['recipientName']."</value></item><item><key xsi:type='xsd:string'>bank_code</key><value xsi:type='xsd:string'>".substr($inputTransaction['destBankAcc'],1,3)."</value></item><item><key xsi:type='xsd:string'>sender_address</key><value xsi:type='xsd:string'>".$inputTransaction['senderAddress']."</value></item><item><key xsi:type='xsd:string'>amount</key><value xsi:type='xsd:string'>".$inputTransaction['destAmount']."</value></item><item><key xsi:type='xsd:string'>note</key><value xsi:type='xsd:string'>".$inputTransaction['description']."</value></item></item></param>";
		
		//20151005
/*		$transferRemittance="<username xsi:type='xsd:string'>".$confAlto['username']."</username><signature xsi:type='xsd:string'>".$signature."</signature><trace_number xsi:type='xsd:string'>".$inputTransaction['refCode']."</trace_number><param SOAP-ENC:arrayType='ns2:Map[1]' xsi:type='SOAP-ENC:Array' xmlns:ns2='http://xml.apache.org/xml-soap'><item xsi:type='ns2:Map'><item><key xsi:type='xsd:string'>sender_name</key><value xsi:type='xsd:string'>".$inputTransaction['senderName']."</value></item><item><key xsi:type='xsd:string'>currency</key><value xsi:type='xsd:string'>IDR</value></item><item><key xsi:type='xsd:string'>sender_id</key><value xsi:type='xsd:string'>".$inputTransaction['senderID']."</value></item><item><key xsi:type='xsd:string'>account_number</key><value xsi:type='xsd:string'>".$accNum."</value></item><item><key xsi:type='xsd:string'>account_name</key><value xsi:type='xsd:string'>".$inputTransaction['recipientName']."</value></item><item><key xsi:type='xsd:string'>bank_code</key><value xsi:type='xsd:string'>".substr($inputTransaction['destBankAcc'],1,3)."</value></item><item><key xsi:type='xsd:string'>sender_address</key><value xsi:type='xsd:string'>".$inputTransaction['senderAddress']."</value></item><item><key xsi:type='xsd:string'>amount</key><value xsi:type='xsd:string'>".$inputTransaction['destAmount']."</value></item><item><key xsi:type='xsd:string'>note</key><value xsi:type='xsd:string'>".$inputTransaction['description']."</value></item><item><key xsi:type='xsd:string'>benef_region</key><value xsi:type='xsd:string'>".$inputTransaction['recipientCity']."</value></item></item></param>";*/

		// 20161222		
		$transferRemittance="<username xsi:type='xsd:string'>".$confAlto['username']."</username><signature xsi:type='xsd:string'>".$signature."</signature><trace_number xsi:type='xsd:string'>".$inputTransaction['refCode']."</trace_number><param SOAP-ENC:arrayType='ns2:Map[1]' xsi:type='SOAP-ENC:Array' xmlns:ns2='http://xml.apache.org/xml-soap'><item xsi:type='ns2:Map'><item><key xsi:type='xsd:string'>sender_name</key><value xsi:type='xsd:string'>".$inputTransaction['senderName']."</value></item><item><key xsi:type='xsd:string'>currency</key><value xsi:type='xsd:string'>IDR</value></item><item><key xsi:type='xsd:string'>sender_id</key><value xsi:type='xsd:string'>".$inputTransaction['senderID']."</value></item><item><key xsi:type='xsd:string'>account_number</key><value xsi:type='xsd:string'>".$accNum."</value></item><item><key xsi:type='xsd:string'>account_name</key><value xsi:type='xsd:string'>".$inputTransaction['recipientName']."</value></item><item><key xsi:type='xsd:string'>bank_code</key><value xsi:type='xsd:string'>".substr($inputTransaction['destBankAcc'],1,3)."</value></item><item><key xsi:type='xsd:string'>sender_address</key><value xsi:type='xsd:string'>".$inputTransaction['senderAddress']."</value></item><item><key xsi:type='xsd:string'>amount</key><value xsi:type='xsd:string'>".$inputTransaction['destAmount']."</value></item><item><key xsi:type='xsd:string'>note</key><value xsi:type='xsd:string'>".$inputTransaction['description']."</value></item><item><key xsi:type='xsd:string'>benef_region</key><value xsi:type='xsd:string'>".$inputTransaction['recipientCity']."</value></item><item><key xsi:type='xsd:string'>sender_region</key><value xsi:type='xsd:string'>".$inputTransaction['senderCity']."</value></item></item></param>";

		$result = $client->call('transferRemittance',$transferRemittance);

		if ($client->fault) {
			isLog('transferRemittanceResFault-'.$result);
			$result['rc']=7005;
			return $result;
		}else{
			$err = $client->getError();
			if ($err) {
				isLog('transferRemittanceResErr2-'.$err);
				$result['rc']=7004;
				return $result;
			}else{
				isLog('Result Code Alto '.$result['0']['result_code']);
				isLog('reffCode : '.$inputTransaction['refCode']);
				isLog('CitySender : '.$inputTransaction['senderCity']);
				isLog('Result Note Alto '.$result['0']['result_note']);
				$result['rc']=$result['0']['result_code'];
				//Simpan Result_note Juga
				$result['rn']=$result['0']['result_note'];
				
				if($result[0]['result_code']==00){
					return $result;
				}else{
					return $result;
				}
			}
		}
	}

	function inquiryAltoC2A($inputTransaction){
		$wsAddr=readWsSett();
		$client = new nusoap_client($wsAddr['altoc2a'], true);
		isLog('url ws: '.$wsAddr['altoc2a']);
		$err = $client->getError();
		if ($err) {
			isLog('inquiryResErr-'.$err);
			return 7000;
		}
		$inqAlto=readSettingAlto();
		//==============================
		$accNum=vanishedZero(substr($inputTransaction['destBankAcc'],4));
		$signature=md5($inputTransaction['refCode'].sha1($inqAlto['password']).substr($inputTransaction['destBankAcc'],1,3).$accNum);
		
		$inquiry="
		<username xsi:type='xsd:string'>".$inqAlto['username']."</username>
		<signature xsi:type='xsd:string'>".$signature."</signature>
		<trace_number xsi:type='xsd:string'>".$inputTransaction['refCode']."</trace_number>
		<bank_code xsi:type='xsd:string'>".substr($inputTransaction['destBankAcc'],1,3)."</bank_code>
		<account_number xsi:type='xsd:string'>".$accNum."</account_number>
";
		
		$result = $client->call('inquiry',$inquiry);

		if ($client->fault) {
			isLog('inquiryResFault-'.$result);
			$result['rc']=7005;
			return $result;
		}else{
			$err = $client->getError();
			if ($err) {
				isLog('inquiryResErr2-'.$err);
				$result['rc']=7004;
				return $result;
			}else{
				isLog('refCode: '.$inputTransaction['refCode']);
				isLog('name: '.$result['result_name']);
				isLog('Result Code Alto: '.$result['result_code']);
				isLog('Result Note Alto: '.$result['result_note']);
				isLog('Timestamp Alto: '.$result['result_timestamp']);
				$result['rc']=$result['result_code'];
				if($result['result_code']==00){
					return $result;
				}else{
					return $result;
				}
			}
		}
	}
	
	function remmitBNIC2A($inputTransaction){
		$wsAddr=readWsSett();
		isLog('url : '.$wsAddr['bnic2a']);
		$client = new nusoap_client($wsAddr['bnic2a'], true);
		$err = $client->getError();
		if ($err) {
			isLog('ws ebays err: '.$err);
			return 7000;
		}
		$bankId = substr($inputTransaction['destBankAcc'],1,3);
		$accNum=str_replace(' ','',substr($inputTransaction['destBankAcc'],4));
		if($bankId == '009'){
			$refCode = 'BNI';
		}else{
			$refCode = 'INTERBANK';
		}
		$remmit=array(
					'productCode' => $bankId,
					'destBankAcc' => $accNum,
					'transactionType' => '14',
					'traxId' => $inputTransaction['refCode'],
					'refCode' => $refCode
		);

		$result = $client->call('RemittServicesOp',$remmit);
		if ($client->fault) {
			isLog('ws ebays fault:x '.$err);
			$result['rc']=7005;
			return $result;
		}else{
			$err = $client->getError();
			if ($err) {
				isLog('ws ebays err: '.$err);
				$result['rc']=7004;
				return $result;
			}else{
				isLog('RC BNI : '.$result['resultCode']);
				isLog('Desc RC BNI : '.$result['resultDesc']);
				$result['result_code']=$result['resultCode'];
				$result['result_desc']=$result['resultDesc'];
				$result['result_name']=$result['recipientName'];
				return $result;
			}
		}
	}
	
	function remmitBNIC2APay($inputTransaction){
		$wsAddr=readWsSett();
		isLog('url : '.$wsAddr['bnic2a']);
		$client = new nusoap_client($wsAddr['bnic2a'], true);
		$err = $client->getError();
		if ($err) {
			isLog('ws ebays err: '.$err);
			return 7000;
		}
		$bankId = substr($inputTransaction['destBankAcc'],1,3);
		$accNum=str_replace(' ','',substr($inputTransaction['destBankAcc'],4));
		if($bankId == '009'){
			$refCode = 'BNI';
		}else{
			$refCode = 'INTERBANK';
		}
		$remmit=array(
					'productCode' => $bankId,
					'destBankAcc' => $accNum,
					'destAmount' => $inputTransaction['destAmount'],
					'senderName' => $inputTransaction['senderName'],
					'senderAddress' => $inputTransaction['senderAddress'],
					'senderID' => $inputTransaction['senderID'],
					'senderPhone' => $inputTransaction['senderPhone'],
					'senderCity' => $inputTransaction['senderCity'],
					'senderCountry' => $inputTransaction['senderCountry'],
					'recipientName' => $inputTransaction['recipientName'],
					'recipientPhone' => $inputTransaction['recipientPhone'],
					'recipientAddress' => $inputTransaction['recipientAddress'],
					'recipientCity' => $inputTransaction['recipientCity'],
					'recipientCountry' => $inputTransaction['recipientCountry'],
					'notiDesc' => $inputTransaction['notiDesc'],
					'transactionType' => '15',
					'traxId' => $inputTransaction['refCode'],
					'refCode' => $refCode
		);

		$result = $client->call('RemittServicesOp',$remmit);
		if ($client->fault) {
			isLog('ws ebays fault : '.$err);
			$result['rc']=7005;
			return $result;
		}else{
			$err = $client->getError();
			if ($err) {
				isLog('ws ebays err: '.$err);
				$result['rc']=7004;
				return $result;
			}else{
				isLog('RC BNI : '.$result['resultCode']);
				isLog('Desc RC BNI : '.$result['resultDesc']);
				$result['rc']=$result['resultCode'];
				$result['result_desc']=$result['resultDesc'];
				return $result;
			}
		}
	}
	
	function checkBankCode($bankAccNum){
		$file = "bankCode.property";
		$f = fopen($file, "r");
		$konter=0;
		$ket='';
		while ( $line = fgets($f, 90) ) {
			$code=explode(':',$line);
			if($code[0]==substr($bankAccNum,0,4)){
				$ket=$code[1];
				$konter=1;
			}
		}
		if($konter==0){
			return false;
		}else{
			return true;
		} 
	}

	function readBankCode($bankAccNum){
		$file = "bankCode.property";
		$f = fopen($file, "r");
		$konter=0;
		$ket='';
		while ( $line = fgets($f, 90) ) {
			$code=explode(':',$line);
			if($code[0]==substr($bankAccNum,0,4)){
				$ket=$code[1];
				$konter=1;
			}
		}
		if($konter==0){
			isLog('Bank Not Registered in list bankCode.property');
			return 'Bank Not Registered';
		}else{
			return trim($ket);
		} 
	}

	function readAltoErrorCode($altoErrCode){
		isLog("rcalto.txt");
		$file = "rcalto.txt";
		$f = fopen($file, "r");
		$konter=0;
		$ket='';
		while ( $line = fgets($f, 90) ) {
			$code=explode('=',$line);
			if($code[0]==$altoErrCode){
				$rcremengine=$code[1];
				$konter=1;
			}
		}
		if($konter==0){
			return 7067;
		}else{
			return $rcremengine;
		} 
	}

	function readAltoErrorCodeALTO($altoErrCode){
		isLog("rcALTO.txt");
                $file = "rcALTO.txt";
                $f = fopen($file, "r");
                $konter=0;
                $ket='';
                while ( $line = fgets($f, 90) ) {
                        $code=explode('=',$line);
                        if($code[0]==$altoErrCode){
                                $rcremengine=$code[1];
                                $konter=1;
                        }
                }
                if($konter==0){
                        return 7067;
                }else{
                        return $rcremengine;
                }
        }

        function readAltoErrorCodeBNI($altoErrCode){
			isLog("rcBNI.txt");
                $file = "rcBNI.txt";
                $f = fopen($file, "r");
                $konter=0;
                $ket='';
                while ( $line = fgets($f, 90) ) {
                        $code=explode('=',$line);
                        if($code[0]==$altoErrCode){
                                $rcremengine=$code[1];
                                $konter=1;
                        }
                }
                if($konter==0){
                        return 7067;
                }else{
                        return $rcremengine;
                }
        }
	
	function checkAccountBank($accountBank){
		if(is_numeric(substr($accountBank,4))){
			return true;
		}else{
			return false;
		}
	}

	function randomString($minlength, $maxlength, $useupper, $usespecial, $usenumbers){
		$charset = "abcdefghijkmnpqrstuvwxyz";
		$charset = "";
		if ($useupper) $charset .= "ABCDEFGHJKLMNPQRSTUVWXYZ";
		if ($usenumbers) $charset .= "23456789";
		if ($usespecial) $charset .= "~@#$%^*()_+-={}|]["; // "~!@#$%^&*()_+`-={}|\\]?[\":;'><,./";
		if ($minlength > $maxlength) $length = mt_rand ($maxlength, $minlength);
		else $length = mt_rand ($minlength, $maxlength);
		$key ='';
		for ($i=0; $i<$length; $i++) $key .= $charset[(mt_rand(0,(strlen($charset)-1)))];
		return $key;
	}

	function getSisa($inputTransaction){
		require "conn.php";
                $sql="SELECT SUM(destamount + feeamount) FROM req_batch_c2b WHERE terminal = '". str_replace('\'','\'\'',$inputTransaction['terminal']) ."'  AND status = 1;";
                isLog($sql);
                $Db->SelectData($sql);
                $isi=$Db->Content;
                $saldo1=$isi[1][1];
		return $saldo1;
	}

	function checkDobel($inputTransaction, $ttye){
                $arr = array();
                require "conn.php";
		if($ttye=='123'){
			$sql= 'select signature from req_batch_c2b_coll where traxid2=\''.$inputTransaction['traxId2'].'\'';
		}else{
                	$sql = 'select signature from req_batch_c2b where signature =\''.$inputTransaction['signature'].'\'';
		}
                isLog($sql);
                if(!isset($Db)){
                        isLog('DB Not Connected');
                        return false;
                }
                $Db->SelectData($sql);
                $isi=$Db->Content;
                $Db->closeDB();
                if(empty($isi[1][1])){
                        $arr['status'] = true;
                }else{
                        $arr['status'] = false;
                }
                return $arr;
        }

	function insert122($inputTransaction){
		require "conn.php";
		//$sql="insert into REQ_BATCH_C2B(id, description, userName, signature, productCode, destBankAcc, destAmount, feeAmount, transactionType, terminal, sourceID, sourceName, senderName, senderAddress, senderID, senderPhone, senderCity, senderCountry, recipientName, recipientPhone, recipientAddress, recipientCity, recipientCountry, notiDesc, traxId, refCode, status, rc, tanggal) values(SQ_REQ_BATCH_C2B.NEXTVAL ,'" . mysql_escape_string($inputTransaction['description']) . "','" . mysql_escape_string($inputTransaction['userName']) . "','" . mysql_escape_string($inputTransaction['signature']) . "','" . mysql_escape_string($inputTransaction['productCode']) . "','" . mysql_escape_string($inputTransaction['destBankAcc']) . "','" . mysql_escape_string($inputTransaction['destAmount']) . "','" . mysql_escape_string($inputTransaction['feeAmount']) . "','" . mysql_escape_string($inputTransaction['transactionType']) . "','" . mysql_escape_string($inputTransaction['terminal']) . "','" . mysql_escape_string($inputTransaction['sourceID']) . "','" . mysql_escape_string($inputTransaction['sourceName']) . "','" . mysql_escape_string($inputTransaction['senderName']) . "','" . mysql_escape_string($inputTransaction['senderAddress']) . "','" . mysql_escape_string($inputTransaction['senderID']) . "','" . mysql_escape_string($inputTransaction['senderPhone']) . "','" . mysql_escape_string($inputTransaction['senderCity']) . "','" . mysql_escape_string($inputTransaction['senderCountry']) . "','" . mysql_escape_string($inputTransaction['recipientName']) . "','" . mysql_escape_string($inputTransaction['recipientPhone']) . "','" . mysql_escape_string($inputTransaction['recipientAddress']) . "','" . mysql_escape_string($inputTransaction['recipientCity']) . "','" . mysql_escape_string($inputTransaction['recipientCountry']) . "','" . mysql_escape_string($inputTransaction['notiDesc']) . "','" . mysql_escape_string($inputTransaction['traxId']) . "','" . mysql_escape_string($inputTransaction['refCode']) . "' , 1, '', sysdate)";
		if($inputTransaction['productCode']=='007006'){
			$sql="insert into REQ_BATCH_C2B(id, description, userName, signature, productCode, destBankAcc, destAmount, feeAmount, transactionType, terminal, sourceID, sourceName, senderName, senderAddress, senderID, senderPhone, senderCity, senderCountry, recipientName, recipientPhone, recipientAddress, recipientCity, recipientCountry, notiDesc, traxId, refCode, status, rc, tanggal, biller) values(SQ_REQ_BATCH_C2B.NEXTVAL ,'" . str_replace('\'','\'\'',$inputTransaction['description']) . "','" . str_replace('\'','\'\'',$inputTransaction['userName']) . "','" . str_replace('\'','\'\'',$inputTransaction['signature']) . "','" . str_replace('\'','\'\'',$inputTransaction['productCode']) . "','" . str_replace('\'','\'\'',$inputTransaction['destBankAcc']) . "','" . str_replace('\'','\'\'',$inputTransaction['destAmount']) . "','" . str_replace('\'','\'\'',$inputTransaction['feeAmount']) . "','" . str_replace('\'','\'\'',$inputTransaction['transactionType']) . "','" . str_replace('\'','\'\'',$inputTransaction['terminal']) . "','" . str_replace('\'','\'\'',$inputTransaction['sourceID']) . "','" . str_replace('\'','\'\'',$inputTransaction['sourceName']) . "','" . str_replace('\'','\'\'',$inputTransaction['senderName']) . "','" . str_replace('\'','\'\'',$inputTransaction['senderAddress']) . "','" . str_replace('\'','\'\'',$inputTransaction['senderID']) . "','" . str_replace('\'','\'\'',$inputTransaction['senderPhone']) . "','" . str_replace('\'','\'\'',$inputTransaction['senderCity']) . "','" . str_replace('\'','\'\'',$inputTransaction['senderCountry']) . "','" . str_replace('\'','\'\'',$inputTransaction['recipientName']) . "','" . str_replace('\'','\'\'',$inputTransaction['recipientPhone']) . "','" . str_replace('\'','\'\'',$inputTransaction['recipientAddress']) . "','" . str_replace('\'','\'\'',$inputTransaction['recipientCity']) . "','" . str_replace('\'','\'\'',$inputTransaction['recipientCountry']) . "','" . str_replace('\'','\'\'',$inputTransaction['notiDesc']) . "','" . str_replace('\'','\'\'',$inputTransaction['traxId']) . "','" . str_replace('\'','\'\'',$inputTransaction['refCode']) . "' , 1, '', sysdate, 'BNI')";
		}else{
			$sql="insert into REQ_BATCH_C2B(id, description, userName, signature, productCode, destBankAcc, destAmount, feeAmount, transactionType, terminal, sourceID, sourceName, senderName, senderAddress, senderID, senderPhone, senderCity, senderCountry, recipientName, recipientPhone, recipientAddress, recipientCity, recipientCountry, notiDesc, traxId, refCode, status, rc, tanggal, biller) values(SQ_REQ_BATCH_C2B.NEXTVAL ,'" . str_replace('\'','\'\'',$inputTransaction['description']) . "','" . str_replace('\'','\'\'',$inputTransaction['userName']) . "','" . str_replace('\'','\'\'',$inputTransaction['signature']) . "','" . str_replace('\'','\'\'',$inputTransaction['productCode']) . "','" . str_replace('\'','\'\'',$inputTransaction['destBankAcc']) . "','" . str_replace('\'','\'\'',$inputTransaction['destAmount']) . "','" . str_replace('\'','\'\'',$inputTransaction['feeAmount']) . "','" . str_replace('\'','\'\'',$inputTransaction['transactionType']) . "','" . str_replace('\'','\'\'',$inputTransaction['terminal']) . "','" . str_replace('\'','\'\'',$inputTransaction['sourceID']) . "','" . str_replace('\'','\'\'',$inputTransaction['sourceName']) . "','" . str_replace('\'','\'\'',$inputTransaction['senderName']) . "','" . str_replace('\'','\'\'',$inputTransaction['senderAddress']) . "','" . str_replace('\'','\'\'',$inputTransaction['senderID']) . "','" . str_replace('\'','\'\'',$inputTransaction['senderPhone']) . "','" . str_replace('\'','\'\'',$inputTransaction['senderCity']) . "','" . str_replace('\'','\'\'',$inputTransaction['senderCountry']) . "','" . str_replace('\'','\'\'',$inputTransaction['recipientName']) . "','" . str_replace('\'','\'\'',$inputTransaction['recipientPhone']) . "','" . str_replace('\'','\'\'',$inputTransaction['recipientAddress']) . "','" . str_replace('\'','\'\'',$inputTransaction['recipientCity']) . "','" . str_replace('\'','\'\'',$inputTransaction['recipientCountry']) . "','" . str_replace('\'','\'\'',$inputTransaction['notiDesc']) . "','" . str_replace('\'','\'\'',$inputTransaction['traxId']) . "','" . str_replace('\'','\'\'',$inputTransaction['refCode']) . "' , 1, '', sysdate, 'ALTO')";
		}
		isLog($sql);
                $Db->ExecDML($sql);
	}

	function remitFRAME($inputTransaction){
		$wsAddr=readWsSett();
		isLog('url : '.$wsAddr['framec2a']);
		$client = new nusoap_client($wsAddr['framec2a'], true);
		$err = $client->getError();
		if ($err) {
			isLog('ws frame err: '.$err);
			return 7000;
		}
		if($inputTransaction['transactionType'] == '11'){
			$transactionType = '38';
		}elseif($inputTransaction['transactionType'] == '12'){
			$transactionType = '50';
		}elseif($inputTransaction['transactionType'] == '13'){
			$transactionType = '44';
		}else{
			isLog('invalid trxtype');
			$result['rc']=7004;
			return $result;
		}
		$bankId = substr($inputTransaction['destBankAcc'],1,3);
		$accNum=str_replace(' ','',substr($inputTransaction['destBankAcc'],4));
		
		require "conn.php";
		$sql = "SELECT alto.sub_province_id
				FROM province_sub_aj aj,
				province_sub_list_alto alto
				WHERE lower(aj.sub_province_name) = lower(alto.sub_province_name)
				AND aj.sub_province_code      = '".$inputTransaction['recipientCity']."'";
		$Db->SelectData($sql);
        $isi=$Db->Content;
        $cityID=$isi[1][1];
		
		$bit61 = array(
					'collectForeignAmount' => '100',
      				'currency' => 'TWD',
      				'custRefCode' => '123123123',
      				'dateTrx' => date('Y-m-d'),
      				'description' => $inputTransaction['description'],
      				'destAcc' => $accNum,
      				'destAmount' => $inputTransaction['destAmount'],
      				'destBankAcc' => $bankId,
      				'feeAgenCI' => '',
      				'feeAgenCO' => '',
      				'feeAmount' => '',
      				'feeForeignAmount' => '',
      				'feeSwitch' => '',
      				'identityType' => 'KTP',
      				'logID' => '',
      				'merchantNumber' => $inputTransaction['merchantNumber'],
      				'notiDesc' => '',
      				'payCode' => '',
      				'productCode' => $inputTransaction['productCode'],
      				'recipientAccount' => '',
      				'recipientAddress' => $inputTransaction['recipientAddress'],
      				'recipientAnotherID' => '',
      				'recipientBirthDate' => date('Y-m-d', strtotime('-20 year')),
      				'recipientBirthPlace' => $cityID,
      				'recipientCity' => $inputTransaction['recipientCity'],
      				'recipientCountry' => '86',
      				'recipientGender' => '1',
      				'recipientID' => $inputTransaction['recepientId'],
      				'recipientIdentityType' => '1',
      				'recipientKey' => '',
      				'recipientName' => $inputTransaction['recipientName'],
      				'recipientNationality' => '86',
      				'recipientPhone' => $inputTransaction['recipientPhone'],
      				'recipientProvince' => $inputTransaction['recepientProvince'],
      				'recipientZipcode' => '',
      				'recipientJob'  => 'karyawan',
      				'refCode' => str_pad(substr($inputTransaction['traxId'], 0, 12), 12, "0", STR_PAD_LEFT),
      				// 'refCode' => $refCode,
      				'reffEva' => '',
      				'relation' => '',
      				'senderAddress' => $inputTransaction['senderAddress'],
      				'senderAnotherID' => '',
      				'senderBirthDate' => date('Y-m-d', strtotime('-20 year')),
      				'senderBrefCodeirthPlace' => $inputTransaction['senderCity'],
      				'senderCity' => $inputTransaction['senderCity'],
      				'senderCountry' => $inputTransaction['senderCountry'],
      				'senderGender' => $inputTransaction['senderGender'],
      				'senderID' => $inputTransaction['senderID'],
      				'senderIdentityType' => 'KTP',
      				'senderJob' => 'karyawan',
      				'senderKey' => '',
      				'senderName' => $inputTransaction['senderName'],
      				'senderNasionality' => '86',
      				'senderPhone' => $inputTransaction['senderPhone'],
      				'senderProvince' => '1',
      				'senderZipcode' => '',
      				'sendForeignAmount' => '1',
      				'senderPurpose' => $inputTransaction['description'],
      				'signature' => $inputTransaction['signature'],
      				'sof' => 'GAJI',
      				'sourceID' => $inputTransaction['sourceID'],
      				'sourceName' => $inputTransaction['sourceName'],
      				'terminal' => $inputTransaction['terminal'],
      				'transactionType' => $transactionType,
      				'traxId' => $inputTransaction['traxId'],
      				'userName' => $inputTransaction['userName'],
      				'timeStamp'  => date('YmdHis')
		);
		
		$inputTransaction['bit61'] = json_encode($bit61);
		isLog($inputTransaction['bit61']);
		$arrSend=array(
			'MTI' => '0200',
			'bit1' => '',
			'bit2' => $inputTransaction['senderPhone'],
			'bit3' => $transactionType,
			'bit4' => str_pad($inputTransaction['destAmount'], 12, "0", STR_PAD_LEFT),
			'bit7' => date("YmdHis"),
			'bit11' => (string)rand(100000,999999),
			'bit12' => date("His"),
			'bit13' => date("Ymd"),
			'bit14' => '0000',
			'bit15' => date('Ymd', strtotime("+1 day")),
			'bit18' => '6012',
			'bit22' => '',
			'bit25' => '',
			'bit26' => '',
			'bit27' => '0',
			'bit28' => '',
			'bit29' => '',
			'bit32' => '770',
			'bit33' => '770',
			'bit35' => $inputTransaction['traxId'],
			'bit37' => str_pad(substr($inputTransaction['traxId'], 0, 12), 12, "0", STR_PAD_LEFT),
			'bit38' => '',
			'bit41' => $inputTransaction['terminal'],
			'bit42' => $inputTransaction['sourceID'],
			'bit43' => $inputTransaction['sourceName'],
			'bit44' => '',
			'bit45' => $inputTransaction['destBankAcc'],
			'bit46' => date("Y-m-d H:i:s"),
			'bit47' => '',
			'bit48' => $inputTransaction['userName'],
			'bit49' => '360',
			'bit52' => '',
			'bit54' => str_pad($inputTransaction['feeAmount'], 12, "0", STR_PAD_LEFT),
			'bit55' => $inputTransaction['billerPrice'],
			'bit56' => $inputTransaction['feeFinnet'],
			'bit57' => $inputTransaction['feeCommunity'],
			'bit58' => $inputTransaction['feeAgent'],
			'bit59' => $inputTransaction['feeSubAgent'],
			'bit60' => '',
			'bit61' => $inputTransaction['bit61'],
			'bit62' => '014MW049',
			'bit63' => '',
			'bit74' => '',
			'bit90' => '',
			'bit102' => $inputTransaction['lastFeeSubAgent'],
			'bit103' => $inputTransaction['productCode'],
			'bit104' => $inputTransaction['productCode']
		);

		$result = $client->call('ProcessBillerOp',$arrSend);
		if ($client->fault) {
			isLog('ws frame fault: '.$err);
			$result['rc']=7004;
			return $result;
		}else{
			$err = $client->getError();
			if ($err) {
				isLog('ws frame err: '.$err);
				$result['rc']=7004;
				return $result;
			}else{
				isLog('RC FRAME : '.$result['bit39']);
				$parse61 = json_decode($result['bit61'],true);
				$result['result_code']=$result['bit39'];
				$result['result_desc']=$parse61['resultDesc'];
				$result['result_name']=$parse61['recipientName'];
				return $result;
			}
		}
	}

	function insert123($inputTransaction){
                require "conn.php";
                if($inputTransaction['productCode']=='007006'){
			$sql="insert into REQ_BATCH_C2B_COLL(id, description, userName, signature, productCode, destBankAcc, destAmount, feeAmount, transactionType, terminal, sourceID, sourceName, senderName, senderAddress, senderID, senderPhone, senderCity, senderCountry, recipientName, recipientPhone, recipientAddress, recipientCity, recipientCountry, notiDesc, traxId, refCode, status, rc, tanggal, biller, addinfo, traxid2) values(SQ_REQ_BATCH_C2B.NEXTVAL ,'" . str_replace('\'','\'\'',$inputTransaction['description']) . "','" . str_replace('\'','\'\'',$inputTransaction['userName']) . "','" . str_replace('\'','\'\'',$inputTransaction['signature']) . "','" . str_replace('\'','\'\'',$inputTransaction['productCode']) . "','" . str_replace('\'','\'\'',$inputTransaction['destBankAcc']) . "','" . str_replace('\'','\'\'',$inputTransaction['destAmount']) . "','" . str_replace('\'','\'\'',$inputTransaction['feeAmount']) . "','" . str_replace('\'','\'\'',$inputTransaction['transactionType']) . "','" . str_replace('\'','\'\'',$inputTransaction['terminal']) . "','" . str_replace('\'','\'\'',$inputTransaction['sourceID']) . "','" . str_replace('\'','\'\'',$inputTransaction['sourceName']) . "','" . str_replace('\'','\'\'',$inputTransaction['senderName']) . "','" . str_replace('\'','\'\'',$inputTransaction['senderAddress']) . "','" . str_replace('\'','\'\'',$inputTransaction['senderID']) . "','" . str_replace('\'','\'\'',$inputTransaction['senderPhone']) . "','" . str_replace('\'','\'\'',$inputTransaction['senderCity']) . "','" . str_replace('\'','\'\'',$inputTransaction['senderCountry']) . "','" . str_replace('\'','\'\'',$inputTransaction['recipientName']) . "','" . str_replace('\'','\'\'',$inputTransaction['recipientPhone']) . "','" . str_replace('\'','\'\'',$inputTransaction['recipientAddress']) . "','" . str_replace('\'','\'\'',$inputTransaction['recipientCity']) . "','" . str_replace('\'','\'\'',$inputTransaction['recipientCountry']) . "','" . str_replace('\'','\'\'',$inputTransaction['notiDesc']) . "','" . str_replace('\'','\'\'',$inputTransaction['traxId']) . "','" . str_replace('\'','\'\'',$inputTransaction['refCode']) . "' , 1, '', sysdate, 'BNI', '" . str_replace('\'','\'\'',$inputTransaction['addinfo']) . "','" . str_replace('\'','\'\'',$inputTransaction['traxId2']) . "')";
		}else{
			$sql="insert into REQ_BATCH_C2B_COLL(id, description, userName, signature, productCode, destBankAcc, destAmount, feeAmount, transactionType, terminal, sourceID, sourceName, senderName, senderAddress, senderID, senderPhone, senderCity, senderCountry, recipientName, recipientPhone, recipientAddress, recipientCity, recipientCountry, notiDesc, traxId, refCode, status, rc, tanggal, biller, addinfo, traxid2) values(SQ_REQ_BATCH_C2B.NEXTVAL ,'" . str_replace('\'','\'\'',$inputTransaction['description']) . "','" . str_replace('\'','\'\'',$inputTransaction['userName']) . "','" . str_replace('\'','\'\'',$inputTransaction['signature']) . "','" . str_replace('\'','\'\'',$inputTransaction['productCode']) . "','" . str_replace('\'','\'\'',$inputTransaction['destBankAcc']) . "','" . str_replace('\'','\'\'',$inputTransaction['destAmount']) . "','" . str_replace('\'','\'\'',$inputTransaction['feeAmount']) . "','" . str_replace('\'','\'\'',$inputTransaction['transactionType']) . "','" . str_replace('\'','\'\'',$inputTransaction['terminal']) . "','" . str_replace('\'','\'\'',$inputTransaction['sourceID']) . "','" . str_replace('\'','\'\'',$inputTransaction['sourceName']) . "','" . str_replace('\'','\'\'',$inputTransaction['senderName']) . "','" . str_replace('\'','\'\'',$inputTransaction['senderAddress']) . "','" . str_replace('\'','\'\'',$inputTransaction['senderID']) . "','" . str_replace('\'','\'\'',$inputTransaction['senderPhone']) . "','" . str_replace('\'','\'\'',$inputTransaction['senderCity']) . "','" . str_replace('\'','\'\'',$inputTransaction['senderCountry']) . "','" . str_replace('\'','\'\'',$inputTransaction['recipientName']) . "','" . str_replace('\'','\'\'',$inputTransaction['recipientPhone']) . "','" . str_replace('\'','\'\'',$inputTransaction['recipientAddress']) . "','" . str_replace('\'','\'\'',$inputTransaction['recipientCity']) . "','" . str_replace('\'','\'\'',$inputTransaction['recipientCountry']) . "','" . str_replace('\'','\'\'',$inputTransaction['notiDesc']) . "','" . str_replace('\'','\'\'',$inputTransaction['traxId']) . "','" . str_replace('\'','\'\'',$inputTransaction['refCode']) . "' , 1, '', sysdate, 'ALTO', '" . str_replace('\'','\'\'',$inputTransaction['addinfo']) . "','" . str_replace('\'','\'\'',$inputTransaction['traxId2']) . "')";
		}
                isLog($sql);
                $Db->ExecDML($sql);
        }

	function mappMC($inputTransaction){
		$resp = array();
		require "conn.php";
		$bankCheck = substr($inputTransaction['destBankAcc'],1,3);
		$sql="select switch from moncashin where notel = '".$bankCheck."'";
		$Db->SelectData($sql);
		$isi=$Db->Content;
		$resp['productCode'] = $isi[1][1];
		return $resp;
	}	
		
	function checkBlacklist($inputTransaction){
		require "conn.php";
		$resp = array();
		$sql="SELECT * FROM remittance_blacklist WHERE (bank_code = '".substr($inputTransaction['destBankAcc'],1,3)."' and account_number = '".trim(substr($inputTransaction['destBankAcc'],4))."') OR LOWER(account_name) = '".strtolower($inputTransaction['senderName'])."' OR LOWER(account_name) = '".strtolower($inputTransaction['recipientName'])."' OR alias_name = '".strtolower($inputTransaction['senderName'])."' OR alias_name = '".strtolower($inputTransaction['recipientName'])."' OR LOWER(add_info1) = '".strtolower($inputTransaction['senderID'])."'";
		isLog('start query : '.$sql);
		$Db->SelectData($sql);
		$isi=$Db->Content;
		isLog('end query : '.$sql);
		if(!empty($isi[0][1])){
			$rc = '01';
			isLog('query return value : '.$sql);
		}else{
			$rc = '00';
		}
		$resp['rc'] = $rc;
		return $resp;
	}	
		
	function sendReq($inputTransaction){
		tulisLogRequest($inputTransaction);
		$resultCode=7060;
		$sysCode=abs(rand(1000000,9999999)).abs(rand(1000000,9999999));
		isLog('SysCode '.$sysCode);
		$refCode=0;
		//check mapp routing MC
		//if($inputTransaction['userName'] == 'mc6pI75'){
		//	$mappMC = mappMC($inputTransaction);
		//	$inputTransaction['productCode'] = $mappMC['productCode'];
		//}
		if($inputTransaction['transactionType']=='11'){
			$resultCode=00;
			if( empty($inputTransaction['description']) or 
				empty($inputTransaction['userName']) or
				empty($inputTransaction['signature']) or
				empty($inputTransaction['productCode']) or
				empty($inputTransaction['destBankAcc']) or
				empty($inputTransaction['destAmount']) or
				empty($inputTransaction['transactionType']) or
				empty($inputTransaction['terminal']) or
				empty($inputTransaction['sourceID']) or
				empty($inputTransaction['sourceName']) or
				empty($inputTransaction['senderName']) or
				empty($inputTransaction['senderAddress']) or
				empty($inputTransaction['senderID']) or
				empty($inputTransaction['senderPhone']) or
				empty($inputTransaction['senderCity']) or
				empty($inputTransaction['senderCountry']) or
				empty($inputTransaction['recipientName']) or
				empty($inputTransaction['recipientPhone']) or
				empty($inputTransaction['recipientAddress']) or
				empty($inputTransaction['recipientCity']) or
				empty($inputTransaction['recipientCountry']) or
				empty($inputTransaction['notiDesc']) or
				empty($inputTransaction['traxId'])){
				if(empty($inputTransaction['description'])){isLog('description');}
				if(empty($inputTransaction['userName'])){isLog('userName');}
				if(empty($inputTransaction['signature'])){isLog('signature');}
				if(empty($inputTransaction['productCode'])){isLog('productCode');}
				if(empty($inputTransaction['destBankAcc'])){isLog('destBankAcc');}
				if(empty($inputTransaction['destAmount'])){isLog('destAmount');}
				if(empty($inputTransaction['transactionType'])){isLog('transactionType');}
				if(empty($inputTransaction['terminal'])){isLog('terminal');}
				if(empty($inputTransaction['sourceID'])){isLog('sourceID');}
				if(empty($inputTransaction['sourceName'])){isLog('sourceName');}
				if(empty($inputTransaction['senderName'])){isLog('senderName');}
				if(empty($inputTransaction['senderAddress'])){isLog('senderAddress');}
				if(empty($inputTransaction['senderID'])){isLog('senderID');}
				if(empty($inputTransaction['senderPhone'])){isLog('senderPhone');}
				if(empty($inputTransaction['senderCity'])){isLog('senderCity');}
				if(empty($inputTransaction['senderCountry'])){isLog('senderCountry');}
				if(empty($inputTransaction['recipientName'])){isLog('recipientName');}
				if(empty($inputTransaction['recipientPhone'])){isLog('recipientPhone');}
				if(empty($inputTransaction['recipientAddress'])){isLog('recipientAddress');}
				if(empty($inputTransaction['recipientCity'])){isLog('recipientCity');}
				if(empty($inputTransaction['recipientCountry'])){isLog('recipientCountry');}
				if(empty($inputTransaction['notiDesc'])){isLog('notiDesc');}
				if(empty($inputTransaction['traxId'])){isLog('traxId');}
				$resultCode=7012;
				if($inputTransaction['destAmount']<=0){
					$resultCode=7050;
				}
			}else{
				if(cekSignReq($inputTransaction,$inputTransaction['signature'])==true){ //====CEK USERNAME n PASSWD=====
					$resultCode=00;
					if(!is_numeric($inputTransaction['destAmount'])){
						$resultCode=7050;
					}else{
//						if(substr($inputTransaction['senderPhone'],0,1)!='+'){
//							$resultCode=7012;
//						}elseif(substr($inputTransaction['recipientPhone'],0,1)!='+'){
//							$resultCode=7012;
//						}else{
							if(!is_numeric(substr($inputTransaction['senderPhone'],1))){
								isLog(substr($inputTransaction['senderPhone'],1).'='.substr($inputTransaction['recipientPhone'],1));
								$resultCode=7012;
							}else{
								if($resultCode==00){
									//check sender and receiver data
									$blacklist = checkBlacklist($inputTransaction);
									if($blacklist['rc'] == '00'){
										if($inputTransaction['productCode']=='007007'){ //JIKA FC
											//CEK SETTING FEE
											$settFee=getSettingFee('FC', $inputTransaction['destAmount'], $inputTransaction['userName']);
											if($settFee['rc']!=00){
												$resultCode=$settFee['rc'];
											}else{
												//CREATE REFCODE & INSERT INTO DATABASE
												$inputTransaction['feeAmount']=($settFee['fifinet']+$settFee['fiagenco']+$settFee['fiagenci']);
												$resultCode=insertCheckReq($inputTransaction,$sysCode,'0',$settFee['fiagenci'],$settFee['fifinet'],$settFee['fiagenco']);										
												if($resultCode==7000){
													//JIKA GAGAL
													//	-> RETURN 7000
													$resultCode=7000;
												}else{
													//JIKA INSERT BERHASIL
													//	-> RETURN 0
													//SETFEE
													$refCode=$resultCode;
													$resultCode=00;
												}
											}
										}elseif($inputTransaction['productCode']=='007003'){ //JIKA ALTO CASH2CASH
											//CEK SETTING FEE
											$settFee=getSettingFee('POS', $inputTransaction['destAmount'], $inputTransaction['userName']);
											if($settFee['rc']!=00){
												$resultCode=$settFee['rc'];
											}else{
												$inputTransaction['feeAmount']=($settFee['fifinet']+$settFee['fiagenco']+$settFee['fiagenci']);
												//CREATE REFCODE & INSERT INTO DATABASE
												$resultCode=insertCheckReq($inputTransaction,$sysCode,'',$settFee['fiagenci'],$settFee['fifinet'],$settFee['fiagenco']);
												if($resultCode==7000){
													$resultCode=7000;
												}else{
													$accInfo=getDeposit($inputTransaction);
													if($inputTransaction['sourceID']=='007'){
														if(checkBalance($accInfo['no_hp'])==0){
															$inputTransaction['feeAmount']=($settFee['fifinet']+$settFee['fiagenco']);
															$refCode=$resultCode;
															$resultCode=00;
														}else{
															$resultCode=7101;
														}
													}elseif($inputTransaction['sourceID']=='008'){
														if(checkBalance($inputTransaction['senderPhone'])==0){
															$inputTransaction['feeAmount']=($settFee['fifinet']+$settFee['fiagenco']);
															$refCode=$resultCode;
															$resultCode=00;
														}else{
															$resultCode=7101;
														}
													}
												}
											}
										}elseif($inputTransaction['productCode']=='007004'){ //JIKA ALTO CASH2ACCOUNT
											// CEK BANK CODE
											if(checkBankCode($inputTransaction['destBankAcc'])==true){
												if(checkAccountBank($inputTransaction['destBankAcc'])==true){
													//SEND WS INQUIRY
													$inq=inquiryAltoC2A($inputTransaction);
													if($inq['result_code']=='0'){
														isLog('masuk');
														$inputTransaction['recipientName']=$inq['result_name'];
														//CEK SETTING FEE
														$settFee=getSettingFee('BANK', $inputTransaction['destAmount'], $inputTransaction['userName']);
														if($settFee['rc']!=00){
															$resultCode=$settFee['rc'];
														}else{
															//CREATE REFCODE & INSERT INTO DATABASE
															$inputTransaction['feeAmount']=($settFee['fifinet']+$settFee['fiagenco']+$settFee['fiagenci']);
															$resultCode=insertCheckReq($inputTransaction,$sysCode,'0',$settFee['fiagenci'],$settFee['fifinet'],$settFee['fiagenco']);
															if($resultCode==7000){
																$resultCode=7000;
															}else{
																$accInfo=getDeposit($inputTransaction);
																if($inputTransaction['sourceID']=='007'){
																	if(checkBalance($accInfo['no_hp'])==0){
																		$refCode=$resultCode;
																		$resultCode=00;
																		isLog('refCode_'.$refCode);
																		$inputTransaction['bankName']=readBankCode($inputTransaction['destBankAcc']);
																	}else{
																		$resultCode=7101;
																	}
																}elseif($inputTransaction['sourceID']=='008'){
																	if(checkBalance($inputTransaction['senderPhone'])==0){
																		$refCode=$resultCode;
																		$resultCode=00;
																		isLog('refCode_'.$refCode);
																		$inputTransaction['bankName']=readBankCode($inputTransaction['destBankAcc']);
																	}else{
																		$resultCode=7101;
																	}
																}
															}
														}
													}else{
														$resultCode=readAltoErrorCodeALTO($inq['result_code']);
														insertCheckReq($inputTransaction,$sysCode,$inq['result_code'],'0','0','0');
													}
												}else{
													$resultCode=7106;
												}
												
											}else{
												$resultCode=7105;
											}
										}elseif($inputTransaction['productCode']=='007006'){ //JIKA BNI CASH2ACCOUNT
											// CEK BANK CODE
											if(checkBankCode($inputTransaction['destBankAcc'])==true){
												if(checkAccountBank($inputTransaction['destBankAcc'])==true){
													//SEND WS INQUIRY
													$inq=remmitBNIC2A($inputTransaction);
													if($inq['result_code']=='0'){
														isLog('masuk');
														//isLog($inputTransaction['senderID']);
														//isLog($inputTransaction['recepientId'].$inputTransaction['recepientProvince']);
														isLog('RC Code : '.$errCodeAlto);
														$inputTransaction['recipientName']=$inq['result_name'];
														//CEK SETTING FEE
														if(substr($inputTransaction['destBankAcc'],1,3) == '009'){
															$settFee=getSettingFee('BNI', $inputTransaction['destAmount'], $inputTransaction['userName']);
														}else{
															$settFee=getSettingFee('BNIOFF', $inputTransaction['destAmount'], $inputTransaction['userName']);
														}
														if($settFee['rc']!=00){
															$resultCode=$settFee['rc'];
														}else{
															//CREATE REFCODE & INSERT INTO DATABASE
															$inputTransaction['feeAmount']=($settFee['fifinet']+$settFee['fiagenco']+$settFee['fiagenci']);
															$resultCode=insertCheckReq($inputTransaction,$sysCode,0,$settFee['fiagenci'],$settFee['fifinet'],$settFee['fiagenco']);
															if($resultCode==7000){
																$resultCode=7000;
															}else{
																$accInfo=getDeposit($inputTransaction);
																if($inputTransaction['sourceID']=='007'){
																	if(checkBalance($accInfo['no_hp'])==0){
																		$refCode=$resultCode;
																		$resultCode=00;
																		isLog('refCode_'.$refCode);
																		$inputTransaction['bankName']=readBankCode($inputTransaction['destBankAcc']);
																	}else{
																		$resultCode=7101;
																	}
																}elseif($inputTransaction['sourceID']=='008'){
																	if(checkBalance($inputTransaction['senderPhone'])==0){
																		$refCode=$resultCode;
																		$resultCode=00;
																		isLog('refCode_'.$refCode);
																		$inputTransaction['bankName']=readBankCode($inputTransaction['destBankAcc']);
																	}else{
																		$resultCode=7101;
																	}
																}
															}
														}
													}else{
														$resultCode=readAltoErrorCodeBNI($inq['result_code']);
													}
												}else{
													$resultCode=7106;
												}
												
											}else{
												$resultCode=7105;
											}

										}elseif($inputTransaction['productCode']=='007012'){ //JIKA BTN
										// CEK BANK CODE
												//SEND WS INQUIRY
												$inq=remitFRAME($inputTransaction);
												if($inq['result_code']=='00'){
													isLog('masuk BTN FRAME');
													isLog('RC Code : '.$errCodeAlto);
													$inputTransaction['recipientName']=$inq['result_name'];
													//CEK SETTING FEE
													$settFee=getSettingFee('BANK', $inputTransaction['destAmount'], $inputTransaction['userName']);
													if($settFee['rc']!=00){
														$resultCode=$settFee['rc'];
													}else{
														//CREATE REFCODE & INSERT INTO DATABASE
														$inputTransaction['feeAmount']=($settFee['fifinet']+$settFee['fiagenco']+$settFee['fiagenci']);
														// $inputTransaction['TcashCode']=$inq['payCode'];
														$resultCode=insertCheckReq($inputTransaction,$sysCode,0,$settFee['fiagenci'],$settFee['fifinet'],$settFee['fiagenco']);
														if($resultCode==7000){
															$resultCode=7000;
														}else{
															$accInfo=getDeposit($inputTransaction);
															if($inputTransaction['sourceID']=='007'){
																if(checkBalance($accInfo['no_hp'])==0){
																	$refCode=$resultCode;
																	$resultCode=00;
																	isLog('refCode_'.$refCode);
																	$inputTransaction['bankName']=readBankCode($inputTransaction['destBankAcc']);
																}else{
																	$resultCode=7101;
																}
															}elseif($inputTransaction['sourceID']=='008'){
																if(checkBalance($inputTransaction['senderPhone'])==0){
																	$refCode=$resultCode;
																	$resultCode=00;
																	isLog('refCode_'.$refCode);
																	$inputTransaction['bankName']=readBankCode($inputTransaction['destBankAcc']);
																}else{
																	$resultCode=7101;
																}
															}
														}
													}
												}else{
													$resultCode=readFlipErrorCode($inq['result_code']);
												}

										}elseif($inputTransaction['productCode']=='007077'){ //JIKA MCGPRS
											// CEK BANK CODE
											if(checkBankCode($inputTransaction['destBankAcc'])==true){
												//CREATE REFCODE & INSERT INTO DATABASE
												$resultCode=insertCheckReq($inputTransaction,$sysCode);
												if($resultCode==7000){
													$resultCode=7000;
												}else{
													$refCode=$resultCode;
													$resultCode=00;
												}
											}else{
												$resultCode=7105;
											}
										}elseif($inputTransaction['productCode']=='007002'){ //JIKA DELIMA
											$resultCode=7000;
										}else{
											$resultCode=7000;
										}
									}else{
										$resultCode=7079;
									}
								}
							}
//						}
					}
				}else{
					$resultCode=7127;
				}
			}
		}elseif($inputTransaction['transactionType']=='12'){
			$resultCode=00;
			if( empty($inputTransaction['description']) or 
				empty($inputTransaction['userName']) or
				empty($inputTransaction['signature']) or
				empty($inputTransaction['productCode']) or
				empty($inputTransaction['destBankAcc']) or
				empty($inputTransaction['destAmount']) or
				empty($inputTransaction['feeAmount']) or
				empty($inputTransaction['transactionType']) or
				empty($inputTransaction['terminal']) or
				empty($inputTransaction['sourceID']) or
				empty($inputTransaction['sourceName']) or
				empty($inputTransaction['senderName']) or
				empty($inputTransaction['senderAddress']) or
				empty($inputTransaction['senderID']) or
				empty($inputTransaction['senderPhone']) or
				empty($inputTransaction['senderCity']) or
				empty($inputTransaction['senderCountry']) or
				empty($inputTransaction['recipientName']) or
				empty($inputTransaction['recipientPhone']) or
				empty($inputTransaction['recipientAddress']) or
				empty($inputTransaction['recipientCity']) or
				empty($inputTransaction['recipientCountry']) or
				empty($inputTransaction['notiDesc']) or
				empty($inputTransaction['traxId']) or
				empty($inputTransaction['refCode'])){
				$resultCode=7012;
				if($inputTransaction['destAmount']<=0){
					$resultCode=7050;
				}
			}else{
				if(cekSignConf($inputTransaction,$inputTransaction['signature'])==true){ //====CEK USERNAME n PASSWD=====
					$refCode=rand(1000000000,9999999999);
					if(!is_numeric($inputTransaction['destAmount']) or !is_numeric($inputTransaction['feeAmount'])){
						$resultCode=7050;
					}else{
//						if(substr($inputTransaction['senderPhone'],0,1)!='+'){
//							$resultCode=7012;
//						}elseif(substr($inputTransaction['recipientPhone'],0,1)!='+'){
//							$resultCode=7012;
//						}else{
							if(!is_numeric(substr($inputTransaction['senderPhone'],1))){
								$resultCode=7012;
							}else{
								if($resultCode==00){
									if($inputTransaction['productCode']=='007007'){ //JIKA FC
										//CEK FEE
										$settFee=getSettingFee('FC', $inputTransaction['destAmount'], $inputTransaction['userName']);
										$inputTransaction['feeAmount']=($settFee['fifinet']+$settFee['fiagenco']);
										isLog("TEOK: ".$inputTransaction['feeAmount']);
									}elseif($inputTransaction['productCode']=='007004'){ //JIKA FC
										//CEK FEE
										$settFee=getSettingFee('BANK', $inputTransaction['destAmount'], $inputTransaction['userName']);
										$inputTransaction['feeAmount']=($settFee['fifinet']+$settFee['fiagenco']);
									}elseif($inputTransaction['productCode']=='007003'){ //JIKA FC
										//CEK FEE
										$settFee=getSettingFee('POS', $inputTransaction['destAmount'], $inputTransaction['userName']);
										$inputTransaction['feeAmount']=($settFee['fifinet']+$settFee['fiagenco']);
									}elseif($inputTransaction['productCode']=='007012'){ //JIKA BTN
										//CEK FEE
										$settFee=getSettingFee('BANK', $inputTransaction['destAmount'], $inputTransaction['userName']);
										$inputTransaction['feeAmount']=($settFee['fifinet']+$settFee['fiagenco']);
									}elseif($inputTransaction['productCode']=='007006'){ //JIKA BNI
										//CEK FEE
										if(substr($inputTransaction['destBankAcc'],1,3) == '009'){
											$settFee=getSettingFee('BNI', $inputTransaction['destAmount'], $inputTransaction['userName']);
										}else{
											$settFee=getSettingFee('BNIOFF', $inputTransaction['destAmount'], $inputTransaction['userName']);
										}
										$inputTransaction['feeAmount']=($settFee['fifinet']+$settFee['fiagenco']);
									}

									if(checkRefCode($inputTransaction)==true){
										$resultCode=00;
										$refCode=$inputTransaction['refCode'];
										//GET ACCOUNT PENAMPUNG
										$accContainer=readAccCont();
										if($inputTransaction['productCode']=='007007'){ //JIKA FC
											//	SEND WS ()
											$dbtSld=7000;
											if($inputTransaction['sourceID']=='007'){ // conditional sourceID
												//	GET ACCOUNT INFORMATION
												$accInfo=getDeposit($inputTransaction);
												$dbtSld=debetSaldo($accContainer['FCCONTAINER1'], $inputTransaction['destAmount'], $accContainer['FCCONTAINER2'], $inputTransaction['feeAmount'], $inputTransaction['notiDesc'], $inputTransaction['recipientPhone'], $accInfo['no_hp'],'FC','FC',$inputTransaction['userName'],$inputTransaction);
											}elseif($inputTransaction['sourceID']=='008'){
												//	GET ACCOUNT INFORMATION
												$accInfo=getDepositFC($inputTransaction);
												$dbtSld=debetSaldo($accContainer['FCCONTAINER1'], $inputTransaction['destAmount'], $accContainer['FCCONTAINER2'], $inputTransaction['feeAmount'], $inputTransaction['notiDesc'], $inputTransaction['recipientPhone'], $inputTransaction['senderPhone'],'FC','FC',$inputTransaction['userName'],$inputTransaction);
											}else{
												$resultCode=7017;
											}
											if(is_array($dbtSld)){
												$inputTransaction['reffx'] = $dbtSld['hostRef'];
												$dbtSld = $dbtSld['resultCode'];
											}
											if($dbtSld==0){
												// SEND UPDATE FC
												isLog('fc log');
												$updfctbl=updateFCTable($inputTransaction, $accInfo['no_va'],$accContainer['EVANUMFCCONTAINER1'],$inputTransaction['userName']);
												if($updfctbl==0){
												//	$resultCode=confirmTransaction($inputTransaction);
													if(confirmTransaction($inputTransaction)==7000){ // flagging
														if($inputTransaction['sourceID']=='007'){ // conditional sourceID
															cashBack($accContainer['FCCONTAINER1'], $inputTransaction['destAmount'], $accContainer['FCCONTAINER2'], $inputTransaction['feeAmount'], 'FAILED '.$inputTransaction['notiDesc'], $inputTransaction['recipientPhone'], $accInfo['no_hp'],'FC','FC',$inputTransaction['userName'],$inputTransaction);//	-> CASHBACK WS
														}elseif($inputTransaction['sourceID']=='008'){
															cashBack($accContainer['FCCONTAINER1'], $inputTransaction['destAmount'], $accContainer['FCCONTAINER2'], $inputTransaction['feeAmount'], 'FAILED '.$inputTransaction['notiDesc'], $inputTransaction['recipientPhone'], $inputTransaction['senderPhone'],'FC','FC',$inputTransaction['userName'],$inputTransaction);//	-> CASHBACK WS
														}
														//	-> RETURN 7000
														$resultCode=7000;
													}else{
					// ditambajkan Ali 08/05/2015
					// ditutup sementara
					isLog('mau masuk SMS');
					if($inputTransaction['userName'] != 'h2halfa' or $inputTransaction['userName'] != 'dsch2h'){
								//$strsms="http://192.168.136.146/apicodes/send_m.php?user=fch2h&passwd=H2hfinch4nn3l&nohp=62".substr($inputTransaction['recipientPhone'],3)."&isisms=".urlencode($inputTransaction['notiDesc']).',noRef%20'.$inputTransaction['refCode'].'.%20Care%20Center:%20500770';
                                       				$strsms="http://192.168.136.146/apicodes/send_m.php?user=fch2h&passwd=H2hfinch4nn3l&nohp=62".substr($inputTransaction['recipientPhone'],3)."&isisms=".urlencode($inputTransaction['notiDesc']).urlencode(". Gunakan DELIMA utk bertransaksi"); 
					$ch = curl_init();
					isLog($strsms);
                                        curl_setopt($ch, CURLOPT_URL, $strsms);
                                        curl_setopt($ch, CURLOPT_HEADER, 1);
                                        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
                                        if(curl_exec($ch) === false) {
                                          // isLog(curl_error($ch));//echo curl_error($ch);
                                        }else{
                                        // close cURL resource, and free up system resources
                                        }
					curl_close($ch);
					
					}else{
                                                                //========UNTUK MELANCARKAN TO ===================
                                                                $inputTransaction['feeAmount']=($settFee['fifinet']+$settFee['fiagenco']+$settFee['fiagenci']);
                                                                isLog('Fee Admin ALFA : '.$inputTransaction['feeAmount'].' , '.$settFee['fifinet'].'+'.$settFee['fiagenco'].'+'.$settFee['fiagenci']);
                                                                //================================================
					}
														$resultCode=00;
													}
												}else{
													if($inputTransaction['sourceID']=='007'){ // conditional sourceID
														cashBack($accContainer['FCCONTAINER1'], $inputTransaction['destAmount'], $accContainer['FCCONTAINER2'], $inputTransaction['feeAmount'], 'FAILED '.$inputTransaction['notiDesc'], $inputTransaction['recipientPhone'], $accInfo['no_hp'],'FC','FC',$inputTransaction['userName'],$inputTransaction);//	-> CASHBACK WS
													}elseif($inputTransaction['sourceID']=='008'){
														cashBack($accContainer['FCCONTAINER1'], $inputTransaction['destAmount'], $accContainer['FCCONTAINER2'], $inputTransaction['feeAmount'], 'FAILED '.$inputTransaction['notiDesc'], $inputTransaction['recipientPhone'], $inputTransaction['senderPhone'],'FC','FC',$inputTransaction['userName'],$inputTransaction);//	-> CASHBACK WS
													}
													//	-> RETURN 7000
													$resultCode=7000;
												}
											}else{
												$resultCode=$dbtSld;
											}
										}elseif($inputTransaction['productCode']=='007003'){ //JIKA ALTO C2C
											//	GET ACCOUNT INFORMATION
											$accInfo=getDeposit($inputTransaction); // (V) clear
											$accContainer=readAccCont(); //  (V) clear
											//	SEND WS debet saldo eva ()
											
											$dbtSld=7000;
											if($inputTransaction['sourceID']=='007'){ // conditional sourceID
												$dbtSld=debetSaldo($accContainer['ALTOCONTAINER1'], $inputTransaction['destAmount'], $accContainer['ALTOCONTAINER2'], $inputTransaction['feeAmount'], $inputTransaction['notiDesc'], $inputTransaction['recipientPhone'], $accInfo['no_hp'],'POS','POS',$inputTransaction['userName'],$inputTransaction);
											}elseif($inputTransaction['sourceID']=='008'){
												$dbtSld=debetSaldo($accContainer['ALTOCONTAINER1'], $inputTransaction['destAmount'], $accContainer['ALTOCONTAINER2'], $inputTransaction['feeAmount'], $inputTransaction['notiDesc'], $inputTransaction['recipientPhone'], $inputTransaction['senderPhone'],'POS','POS',$inputTransaction['userName'],$inputTransaction);
											}else{
												$resultCode=7017;
											}
											if(is_array($dbtSld)){
												$inputTransaction['reffx'] = $dbtSld['hostRef'];
												$dbtSld = $dbtSld['resultCode'];
											}
											if($dbtSld==0){
												// SEND WS REMMIT
												$wsRemmit=remmitAltoC2C($inputTransaction);
												//if($wsRemmit['0']['result_code']==00){
												if($wsRemmit['rc']==00){
													if(confirmTransactionAlto($inputTransaction,$wsRemmit[0]['refno'],$wsRemmit[0]['result_code'],$wsRemmit[0]['result_note'])==7000){ // flagging
														if($inputTransaction['sourceID']=='007'){ // conditional sourceID
															cashBack($accContainer['ALTOCONTAINER1'], $inputTransaction['destAmount'], $accContainer['ALTOCONTAINER2'], $inputTransaction['feeAmount'], 'FAILED '.$inputTransaction['notiDesc'], $inputTransaction['recipientPhone'], $accInfo['no_hp'],'POS','POS',$inputTransaction['userName'],$inputTransaction);//	-> CASHBACK WS
														}elseif($inputTransaction['sourceID']=='008'){
															cashBack($accContainer['ALTOCONTAINER1'], $inputTransaction['destAmount'], $accContainer['ALTOCONTAINER2'], $inputTransaction['feeAmount'], 'FAILED '.$inputTransaction['notiDesc'], $inputTransaction['recipientPhone'], $inputTransaction['senderPhone'],'POS','POS',$inputTransaction['userName'],$inputTransaction);//	-> CASHBACK WS
														}
														$resultCode=7000;
													}else{
														//updatePOSTable($inputTransaction, $accInfo['no_va'],$accContainer['EVANUMALTOCONTAINER1']);
												/*		$strsms="https://192.168.20.146:13013/cgi-bin/sendsms?username=keris&password=mpugandring&to=0".substr($inputTransaction['recipientPhone'],3)."&text=".$inputTransaction['notiDesc'].', noRef. '.$wsRemmit[0]['refno'].'. Care Center: 500770';
														isLog($strsms);
														exec("links -dump '".$strsms."'", $a);
														$refCode=$wsRemmit['0']['refno'];
														$resultCode=00; */
													}
												}else{
													if($inputTransaction['sourceID']=='007'){ // conditional sourceID
														cashBack($accContainer['ALTOCONTAINER1'], $inputTransaction['destAmount'], $accContainer['ALTOCONTAINER2'], $inputTransaction['feeAmount'], 'FAILED '.$inputTransaction['notiDesc'], $inputTransaction['recipientPhone'], $accInfo['no_hp'],'POS','POS',$inputTransaction['userName'],$inputTransaction);//	-> CASHBACK WS
													}elseif($inputTransaction['sourceID']=='008'){
														cashBack($accContainer['ALTOCONTAINER1'], $inputTransaction['destAmount'], $accContainer['ALTOCONTAINER2'], $inputTransaction['feeAmount'], 'FAILED '.$inputTransaction['notiDesc'], $inputTransaction['recipientPhone'], $inputTransaction['senderPhone'],'POS','POS',$inputTransaction['userName'],$inputTransaction);//	-> CASHBACK WS
													}
												}
											}else{
												$resultCode=$dbtSld;
											}
										}elseif($inputTransaction['productCode']=='007004'){ //JIKA ALTO C2A
											//	GET ACCOUNT INFORMATION
											$accInfo=getDeposit($inputTransaction);
											$accContainer=readAccCont();
											//	SEND WS debet saldo eva ()
											$dbtSld=7000;
											$batchStatus=cekBatch($inputTransaction);
											if($inputTransaction['sourceID']=='007'){ // conditional sourceID
												if($batchStatus=='01'){
													$dbtSld=debetSaldo($accContainer['ALTOCONTAINER1'], $inputTransaction['destAmount'], $accContainer['ALTOCONTAINER2'], $inputTransaction['feeAmount'], $inputTransaction['notiDesc'], $inputTransaction['recipientPhone'], $accInfo['no_hp'],'BANK',readBankCode($inputTransaction['destBankAcc']),$inputTransaction['userName'],$inputTransaction);
												}else{
													$dbtSld=0;
												}
											}elseif($inputTransaction['sourceID']=='008'){
												if($batchStatus=='01'){
													$dbtSld=debetSaldo($accContainer['ALTOCONTAINER1'], $inputTransaction['destAmount'], $accContainer['ALTOCONTAINER2'], $inputTransaction['feeAmount'], $inputTransaction['notiDesc'], $inputTransaction['recipientPhone'], $inputTransaction['senderPhone'],'BANK',readBankCode($inputTransaction['destBankAcc']),$inputTransaction['userName'],$inputTransaction);
												}else{
													$dbtSld=0;
												}
											}else{
												$resultCode=7017;
											}
											if(is_array($dbtSld)){
												$inputTransaction['reffx'] = $dbtSld['hostRef'];
												$dbtSld = $dbtSld['resultCode'];
											}
											if($dbtSld==0){
												// SEND WS REMMIT
												// RETRY 3x if rc==61
												$cntr=0;
												$rc='61';
												isLog('Start Loop');
												while($cntr<3 and $rc=='61'){
													$wsRemmit=remmitAltoC2A($inputTransaction);
													$rc=$wsRemmit['rc'];
													$cntr++;
													isLog('Loop-'.$cntr.' rc='.$rc);
												}
												isLog('End Loop');
												//$wsRemmit=remmitAltoC2A($inputTransaction);
												if($wsRemmit['rc']!=00 and $wsRemmit['rc']!=104 and $wsRemmit['rc']!=68 and $wsRemmit['rc']!=7004){
													confirmTransactionAltoC2Aggl($inputTransaction,$wsRemmit['trace_number'],$wsRemmit['rc']);
													isLog('transfer bank failed');
													if($inputTransaction['sourceID']=='007'){ // conditional sourceID
														if($batchStatus=='01'){
															cashBack($accContainer['ALTOCONTAINER1'], $inputTransaction['destAmount'], $accContainer['ALTOCONTAINER2'], $inputTransaction['feeAmount'], 'FAILED '.$inputTransaction['notiDesc'], $inputTransaction['recipientPhone'], $accInfo['no_hp'],'BANK',readBankCode($inputTransaction['destBankAcc']),$inputTransaction['userName'],$inputTransaction);//	-> CASHBACK WS
														}
													}elseif($inputTransaction['sourceID']=='008'){
														if($batchStatus=='01'){
															cashBack($accContainer['ALTOCONTAINER1'], $inputTransaction['destAmount'], $accContainer['ALTOCONTAINER2'], $inputTransaction['feeAmount'], 'FAILED '.$inputTransaction['notiDesc'], $inputTransaction['recipientPhone'], $inputTransaction['senderPhone'],'BANK',readBankCode($inputTransaction['destBankAcc']),$inputTransaction['userName'],$inputTransaction);//	-> CASHBACK WS
														}
													}
													if($wsRemmit['rc']==7004){
														$resultCode=7004;
													}else{
														$resultCode=readAltoErrorCodeALTO($wsRemmit['rc']);
													}
												}else{
													if($wsRemmit['rn']=='Pending Transaction'){
                                                                                                        	$rc='01';
                                                                                                	}
													if(confirmTransactionAltoC2A($inputTransaction,$wsRemmit['trace_number'],$rc)==7000){ // flagging /insertdbase
														isLog('failed to update table');
														if($inputTransaction['sourceID']=='007'){ // conditional sourceID
															//cashBack($accContainer['ALTOCONTAINER1'], $inputTransaction['destAmount'], $accContainer['ALTOCONTAINER2'], $inputTransaction['feeAmount'], 'FAILED '.$inputTransaction['notiDesc'], $inputTransaction['recipientPhone'], $accInfo['no_hp'],'BANK',readBankCode($inputTransaction['destBankAcc']),$inputTransaction['userName'],$inputTransaction);//	-> CASHBACK WS
														}elseif($inputTransaction['sourceID']=='008'){
															//cashBack($accContainer['ALTOCONTAINER1'], $inputTransaction['destAmount'], $accContainer['ALTOCONTAINER2'], $inputTransaction['feeAmount'], 'FAILED '.$inputTransaction['notiDesc'], $inputTransaction['recipientPhone'], $inputTransaction['senderPhone'],'BANK',readBankCode($inputTransaction['destBankAcc']),$inputTransaction['userName'],$inputTransaction);//	-> CASHBACK WS
														}
														$resultCode=7000;
													}else{
														//updateBANKTable($inputTransaction, $accInfo['no_va'],$accContainer['EVANUMALTOCONTAINER1']);
														$resultCode=00;
														$inputTransaction['bankName']=readBankCode($inputTransaction['destBankAcc']);
													
							if($inputTransaction['userName'] == 'h2halfa'){
								//========UNTUK MELANCARKAN TO ===================
								$inputTransaction['feeAmount']=($settFee['fifinet']+$settFee['fiagenco']+$settFee['fiagenci']);
								isLog($inputTransaction['feeAmount']);	
								//================================================
							}elseif($inputTransaction['userName'] == 'dsch2h'){

                                        		}else{
								$strsms="http://192.168.136.146/apicodes/send_m.php?user=fch2h&passwd=H2hfinch4nn3l&nohp=62".substr($inputTransaction['recipientPhone'],3)."&isisms=".urlencode($inputTransaction['notiDesc']).urlencode(". Gunakan DELIMA utk bertransaksi");
                                        				$ch = curl_init();
                                        				isLog($strsms);
                                        				curl_setopt($ch, CURLOPT_URL, $strsms);
                                        				curl_setopt($ch, CURLOPT_HEADER, 1);
                                        				curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
                                        				if(curl_exec($ch) === false) {
                                          					// isLog(curl_error($ch));//echo curl_error($ch);
                                        				}else{
                                        					// close cURL resource, and free up system resources
                                        				}
                                        				curl_close($ch);
							}

													}
												}
											}else{
												isLog('debet saldo failed');
												$resultCode=$dbtSld;
											}
										}elseif($inputTransaction['productCode']=='007006'){ //JIKA ALTO C2A
											//	GET ACCOUNT INFORMATION
											$accInfo=getDeposit($inputTransaction);
											$accContainer=readAccCont();
											//	SEND WS debet saldo eva ()
											$dbtSld=7000;
											$batchStatus=cekBatch($inputTransaction);
											if($inputTransaction['sourceID']=='007'){ // conditional sourceID
												if($batchStatus=='01'){
													if(substr($inputTransaction['destBankAcc'],1,3) == '009'){
														$dbtSld=debetSaldo($accContainer['BNICONTAINER1'], $inputTransaction['destAmount'], $accContainer['BNICONTAINER2'], $inputTransaction['feeAmount'], $inputTransaction['notiDesc'], $inputTransaction['recipientPhone'], $accInfo['no_hp'],'BNI',readBankCode($inputTransaction['destBankAcc']),$inputTransaction['userName'],$inputTransaction);
													}else{
														$dbtSld=debetSaldo($accContainer['BNICONTAINER1'], $inputTransaction['destAmount'], $accContainer['BNICONTAINER2'], $inputTransaction['feeAmount'], $inputTransaction['notiDesc'], $inputTransaction['recipientPhone'], $accInfo['no_hp'],'BNIOFF',readBankCode($inputTransaction['destBankAcc']),$inputTransaction['userName'],$inputTransaction);
													}
												}else{
													$dbtSld=0;
												}
											}elseif($inputTransaction['sourceID']=='008'){
												if($batchStatus=='01'){
													if(substr($inputTransaction['destBankAcc'],1,3) == '009'){
														$dbtSld=debetSaldo($accContainer['BNICONTAINER1'], $inputTransaction['destAmount'], $accContainer['BNICONTAINER2'], $inputTransaction['feeAmount'], $inputTransaction['notiDesc'], $inputTransaction['recipientPhone'], $inputTransaction['senderPhone'],'BNI',readBankCode($inputTransaction['destBankAcc']),$inputTransaction['userName'],$inputTransaction);
													}else{
														$dbtSld=debetSaldo($accContainer['BNICONTAINER1'], $inputTransaction['destAmount'], $accContainer['BNICONTAINER2'], $inputTransaction['feeAmount'], $inputTransaction['notiDesc'], $inputTransaction['recipientPhone'], $inputTransaction['senderPhone'],'BNIOFF',readBankCode($inputTransaction['destBankAcc']),$inputTransaction['userName'],$inputTransaction);
													}
												}else{
													$dbtSld=0;
												}
											}else{
												$resultCode=7017;
											}
											if(is_array($dbtSld)){
												$inputTransaction['reffx'] = $dbtSld['hostRef'];
												$dbtSld = $dbtSld['resultCode'];
											}
											if($dbtSld==0){
												// SEND WS REMMIT
												$wsRemmit=remmitBNIC2APay($inputTransaction);
												if($wsRemmit['rc']!=0 or strlen($wsRemmit['rc']) < 1){
													confirmTransactionAltoC2Aggl($inputTransaction,$wsRemmit['trace_number'],$wsRemmit['rc']);
													isLog('transfer bank failed');
													if($inputTransaction['sourceID']=='007'){ // conditional sourceID
														if($batchStatus=='01'){
															if(substr($inputTransaction['destBankAcc'],1,3) == '009'){
																cashBack($accContainer['BNICONTAINER1'], $inputTransaction['destAmount'], $accContainer['BNICONTAINER2'], $inputTransaction['feeAmount'], 'FAILED '.$inputTransaction['notiDesc'], $inputTransaction['recipientPhone'], $accInfo['no_hp'],'BNI',readBankCode($inputTransaction['destBankAcc']),$inputTransaction['userName'],$inputTransaction);//	-> CASHBACK WS
															}else{
																cashBack($accContainer['BNICONTAINER1'], $inputTransaction['destAmount'], $accContainer['BNICONTAINER2'], $inputTransaction['feeAmount'], 'FAILED '.$inputTransaction['notiDesc'], $inputTransaction['recipientPhone'], $accInfo['no_hp'],'BNIOFF',readBankCode($inputTransaction['destBankAcc']),$inputTransaction['userName'],$inputTransaction);//	-> CASHBACK WS
															}
														}
													}elseif($inputTransaction['sourceID']=='008'){
														if($batchStatus=='01'){
															if(substr($inputTransaction['destBankAcc'],1,3) == '009'){
																cashBack($accContainer['BNICONTAINER1'], $inputTransaction['destAmount'], $accContainer['BNICONTAINER2'], $inputTransaction['feeAmount'], 'FAILED '.$inputTransaction['notiDesc'], $inputTransaction['recipientPhone'], $inputTransaction['senderPhone'],'BNI',readBankCode($inputTransaction['destBankAcc']),$inputTransaction['userName'],$inputTransaction);//	-> CASHBACK WS
															}else{
																cashBack($accContainer['BNICONTAINER1'], $inputTransaction['destAmount'], $accContainer['BNICONTAINER2'], $inputTransaction['feeAmount'], 'FAILED '.$inputTransaction['notiDesc'], $inputTransaction['recipientPhone'], $inputTransaction['senderPhone'],'BNIOFF',readBankCode($inputTransaction['destBankAcc']),$inputTransaction['userName'],$inputTransaction);//	-> CASHBACK WS
															}
														}
													}
													if($wsRemmit['rc']==7004){
														$resultCode=7004;
													}else{
														$resultCode=readAltoErrorCodeBNI($wsRemmit['rc']);
													}
												}else{
													if(confirmTransactionAltoC2A($inputTransaction,$wsRemmit['trace_number'],$wsRemmit['rc'])==7000){ // flagging /insertdbase
														isLog('failed to update table');
														if($inputTransaction['sourceID']=='007'){ // conditional sourceID
															if($batchStatus=='01'){
																if(substr($inputTransaction['destBankAcc'],1,3) == '009'){
																	cashBack($accContainer['BNICONTAINER1'], $inputTransaction['destAmount'], $accContainer['BNICONTAINER2'], $inputTransaction['feeAmount'], 'FAILED '.$inputTransaction['notiDesc'], $inputTransaction['recipientPhone'], $accInfo['no_hp'],'BNI',readBankCode($inputTransaction['destBankAcc']),$inputTransaction['userName'],$inputTransaction);//	-> CASHBACK WS
																}else{
																	cashBack($accContainer['BNICONTAINER1'], $inputTransaction['destAmount'], $accContainer['BNICONTAINER2'], $inputTransaction['feeAmount'], 'FAILED '.$inputTransaction['notiDesc'], $inputTransaction['recipientPhone'], $accInfo['no_hp'],'BNIOFF',readBankCode($inputTransaction['destBankAcc']),$inputTransaction['userName'],$inputTransaction);//	-> CASHBACK WS
																}
														}
														}elseif($inputTransaction['sourceID']=='008'){
															if($batchStatus=='01'){
																if(substr($inputTransaction['destBankAcc'],1,3) == '009'){
																	cashBack($accContainer['BNICONTAINER1'], $inputTransaction['destAmount'], $accContainer['BNICONTAINER2'], $inputTransaction['feeAmount'], 'FAILED '.$inputTransaction['notiDesc'], $inputTransaction['recipientPhone'], $inputTransaction['senderPhone'],'BNI',readBankCode($inputTransaction['destBankAcc']),$inputTransaction['userName'],$inputTransaction);//	-> CASHBACK WS
																}else{
																	cashBack($accContainer['BNICONTAINER1'], $inputTransaction['destAmount'], $accContainer['BNICONTAINER2'], $inputTransaction['feeAmount'], 'FAILED '.$inputTransaction['notiDesc'], $inputTransaction['recipientPhone'], $inputTransaction['senderPhone'],'BNIOFF',readBankCode($inputTransaction['destBankAcc']),$inputTransaction['userName'],$inputTransaction);//	-> CASHBACK WS
																}
															}
														}
														$resultCode=7000;
													}else{
														//updateBANKTable($inputTransaction, $accInfo['no_va'],$accContainer['EVANUMALTOCONTAINER1']);
														$resultCode=00;
														$inputTransaction['bankName']=readBankCode($inputTransaction['destBankAcc']);
													// DEV SMS ditutup	$strsms="https://192.168.20.146:13013/cgi-bin/sendsms?username=keris&password=mpugandring&to=0".substr($inputTransaction['recipientPhone'],3)."&text=".$inputTransaction['notiDesc'].'. Gunakan MC Banking ut bertransaksi,Klik:www.klikmc.com';
													//	exec("links -dump '".$strsms."'", $a);
													$strsms="http://192.168.136.146/apicodes/send_m.php?user=fch2h&passwd=H2hfinch4nn3l&nohp=62".substr($inputTransaction['recipientPhone'],3)."&isisms=".urlencode($inputTransaction['notiDesc']).urlencode(". Gunakan DELIMA utk bertransaksi");
                                        				$ch = curl_init();
                                        				isLog($strsms);
                                        				curl_setopt($ch, CURLOPT_URL, $strsms);
                                        				curl_setopt($ch, CURLOPT_HEADER, 1);
                                        				curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
                                        				if(curl_exec($ch) === false) {
                                          					// isLog(curl_error($ch));//echo curl_error($ch);
                                        				}else{
                                        					// close cURL resource, and free up system resources
                                        				}
                                        				curl_close($ch);

													}
												}
											}else{
												isLog('debet saldo failed');
												$resultCode=$dbtSld;
											}

										}elseif($inputTransaction['productCode']=='007012'){ //JIKA BTN
											//	GET ACCOUNT INFORMATION
											$accInfo=getDeposit($inputTransaction);
											$accContainer=readAccCont();
											//	SEND WS debet saldo eva ()
											$dbtSld=7000;
											if($inputTransaction['sourceID']=='007'){ // conditional sourceID
												$dbtSld=debetSaldo($accContainer['ALTOCONTAINER1'], $inputTransaction['destAmount'], $accContainer['ALTOCONTAINER2'], $inputTransaction['feeAmount'], $inputTransaction['notiDesc'], $inputTransaction['recipientPhone'], $accInfo['no_hp'],'BANK',readBankCode($inputTransaction['destBankAcc']),$inputTransaction['userName'],$inputTransaction);
											}elseif($inputTransaction['sourceID']=='008'){
												$dbtSld=debetSaldo($accContainer['ALTOCONTAINER1'], $inputTransaction['destAmount'], $accContainer['ALTOCONTAINER2'], $inputTransaction['feeAmount'], $inputTransaction['notiDesc'], $inputTransaction['recipientPhone'], $inputTransaction['senderPhone'],'BANK',readBankCode($inputTransaction['destBankAcc']),$inputTransaction['userName'],$inputTransaction);
											}else{
												$resultCode=7017;
											}
											if($dbtSld==0){
												// SEND WS REMMIT
												$wsRemmit=remitFRAME($inputTransaction);
												if($wsRemmit['result_code']!=0 or $wsRemmit['result_code']!='00' or strlen($wsRemmit['result_code']) < 1){
													isLog('transfer bank failedx');
													if($inputTransaction['sourceID']=='007'){ // conditional sourceID
														cashBack($accContainer['ALTOCONTAINER1'], $inputTransaction['destAmount'], $accContainer['ALTOCONTAINER2'], $inputTransaction['feeAmount'], 'FAILED '.$inputTransaction['notiDesc'], $inputTransaction['recipientPhone'], $accInfo['no_hp'],'BANK',readBankCode($inputTransaction['destBankAcc']),$inputTransaction['userName'],$inputTransaction);//	-> CASHBACK WS
													}elseif($inputTransaction['sourceID']=='008'){
														cashBack($accContainer['ALTOCONTAINER1'], $inputTransaction['destAmount'], $accContainer['ALTOCONTAINER2'], $inputTransaction['feeAmount'], 'FAILED '.$inputTransaction['notiDesc'], $inputTransaction['recipientPhone'], $inputTransaction['senderPhone'],'BANK',readBankCode($inputTransaction['destBankAcc']),$inputTransaction['userName'],$inputTransaction);//	-> CASHBACK WS
													}
													if($wsRemmit['result_code']==7004){
														$resultCode=7004;
													}else{
														$resultCode=readFlipErrorCode($wsRemmit['result_code']);
													}
												}else{
													if(confirmTransactionAltoC2A($inputTransaction,$wsRemmit['trace_number'])==7000){ // flagging /insertdbase
														isLog('failed to update table');
														if($inputTransaction['sourceID']=='007'){ // conditional sourceID
															cashBack($accContainer['ALTOCONTAINER1'], $inputTransaction['destAmount'], $accContainer['ALTOCONTAINER2'], $inputTransaction['feeAmount'], 'FAILED '.$inputTransaction['notiDesc'], $inputTransaction['recipientPhone'], $accInfo['no_hp'],'BANK',readBankCode($inputTransaction['destBankAcc']),$inputTransaction['userName'],$inputTransaction);//	-> CASHBACK WS
														}elseif($inputTransaction['sourceID']=='008'){
															cashBack($accContainer['ALTOCONTAINER1'], $inputTransaction['destAmount'], $accContainer['ALTOCONTAINER2'], $inputTransaction['feeAmount'], 'FAILED '.$inputTransaction['notiDesc'], $inputTransaction['recipientPhone'], $inputTransaction['senderPhone'],'BANK',readBankCode($inputTransaction['destBankAcc']),$inputTransaction['userName'],$inputTransaction);//	-> CASHBACK WS
														}
														$resultCode=7000;
													}else{
														$resultCode=00;
														$inputTransaction['bankName']=readBankCode($inputTransaction['destBankAcc']);
													}
												}
											}else{
												isLog('debet saldo failed');
												$resultCode=$dbtSld;
											}

										}elseif($inputTransaction['productCode']=='007002'){ //JIKA DELIMA
											$resultCode=7000;
										}else{
											$resultCode=7107;
										}
									}else{
										$resultCode=7045;
									}
								}							
							}
//						}
					}
				}else{
					$resultCode=7127;
				}
			}
		}elseif($inputTransaction['transactionType']=='122' or $inputTransaction['transactionType']=='123'){
			$ttye=0;
			if($inputTransaction['transactionType']=='122'){
				$ttye=122;
			}elseif($inputTransaction['transactionType']=='123'){
				$ttye=123;
			}
                        $resultCode=00;
                        if( empty($inputTransaction['description']) or
                                empty($inputTransaction['userName']) or
                                empty($inputTransaction['signature']) or
                                empty($inputTransaction['productCode']) or
                                empty($inputTransaction['destBankAcc']) or
                                empty($inputTransaction['destAmount']) or
                                empty($inputTransaction['feeAmount']) or
                                empty($inputTransaction['transactionType']) or
                                empty($inputTransaction['terminal']) or
                                empty($inputTransaction['sourceID']) or
                                empty($inputTransaction['sourceName']) or
                                empty($inputTransaction['senderName']) or
                                empty($inputTransaction['senderAddress']) or
                                empty($inputTransaction['senderID']) or
                                empty($inputTransaction['senderPhone']) or
                                empty($inputTransaction['senderCity']) or
                                empty($inputTransaction['senderCountry']) or
                                empty($inputTransaction['recipientName']) or
                                empty($inputTransaction['recipientPhone']) or
                                empty($inputTransaction['recipientAddress']) or
                                empty($inputTransaction['recipientCity']) or
                                empty($inputTransaction['recipientCountry']) or
                                empty($inputTransaction['notiDesc']) or
                                empty($inputTransaction['traxId']) or
                                empty($inputTransaction['refCode'])){
                                $resultCode=7012;
                                if($inputTransaction['destAmount']<=0){
                                        $resultCode=7050;
                                }
                        }else{
				$inputTransaction['transactionType']='12';
                                if(cekSignConf($inputTransaction,$inputTransaction['signature'])==true){ //====CEK USERNAME n PASSWD=====
                                        $refCode=$inputTransaction['refCode'];
                                        if(!is_numeric($inputTransaction['destAmount']) or !is_numeric($inputTransaction['feeAmount'])){
                                                $resultCode=7050;
                                        }else{
						$inputTransaction['transactionType']='12';
						$balan=checkBalance2($inputTransaction['senderPhone']);
						$sisa=getSisa($inputTransaction);
						if($balan>($sisa+$inputTransaction['destAmount']+$inputTransaction['feeAmount'])){
							$cekDobel=checkDobel($inputTransaction, $ttye);
                                                        if($cekDobel['status'] == true){
								$accInfo=getDeposit($inputTransaction);
								$accContainer=readAccCont();
								//	END WS debet saldo eva ()
								$dbtSld=7000;
								if($inputTransaction['sourceID']=='007'){ // conditional sourceID
										if($inputTransaction['productCode'] == '007006'){
											$dbtSld=debetSaldo($accContainer['BNICONTAINER1'], $inputTransaction['destAmount'], $accContainer['BNICONTAINER2'], $inputTransaction['feeAmount'], $inputTransaction['notiDesc'], $inputTransaction['recipientPhone'], $accInfo['no_hp'],'BNI',readBankCode($inputTransaction['destBankAcc']),$inputTransaction['userName'],$inputTransaction);
										}else{
											$dbtSld=debetSaldo($accContainer['ALTOCONTAINER1'], $inputTransaction['destAmount'], $accContainer['ALTOCONTAINER2'], $inputTransaction['feeAmount'], $inputTransaction['notiDesc'], $inputTransaction['recipientPhone'], $accInfo['no_hp'],'BANK',readBankCode($inputTransaction['destBankAcc']),$inputTransaction['userName'],$inputTransaction);
										}
									if(is_array($dbtSld)){
												$inputTransaction['reffx'] = $dbtSld['hostRef'];
												$dbtSld = $dbtSld['resultCode'];
											}
									if($dbtSld != 0){
										$resultCode=$dbtSld;
									}else{
										if($ttye==122){
											insert122($inputTransaction);
										}elseif($ttye==123){
											insert123($inputTransaction);
										}
									}
								}elseif($inputTransaction['sourceID']=='008'){
											if($inputTransaction['productCode'] == '007006'){
												if(substr($inputTransaction['destBankAcc'],1,3) == '009'){
											$dbtSld=debetSaldo($accContainer['BNICONTAINER1'], $inputTransaction['destAmount'], $accContainer['BNICONTAINER2'], $inputTransaction['feeAmount'], $inputTransaction['notiDesc'], $inputTransaction['recipientPhone'], $inputTransaction['senderPhone'],'BNI',readBankCode($inputTransaction['destBankAcc']),$inputTransaction['userName'],$inputTransaction);
												}else{
													$dbtSld=debetSaldo($accContainer['BNICONTAINER1'], $inputTransaction['destAmount'], $accContainer['BNICONTAINER2'], $inputTransaction['feeAmount'], $inputTransaction['notiDesc'], $inputTransaction['recipientPhone'], $inputTransaction['senderPhone'],'BNIOFF',readBankCode($inputTransaction['destBankAcc']),$inputTransaction['userName'],$inputTransaction);
												}
										}else{
											$dbtSld=debetSaldo($accContainer['ALTOCONTAINER1'], $inputTransaction['destAmount'], $accContainer['ALTOCONTAINER2'], $inputTransaction['feeAmount'], $inputTransaction['notiDesc'], $inputTransaction['recipientPhone'], $inputTransaction['senderPhone'],'BANK',readBankCode($inputTransaction['destBankAcc']),$inputTransaction['userName'],$inputTransaction);
										}
										if(is_array($dbtSld)){
												$inputTransaction['reffx'] = $dbtSld['hostRef'];
												$dbtSld = $dbtSld['resultCode'];
											}
									if($dbtSld != 0){
                                                                                $resultCode=$dbtSld;
                                                                        }else{
										if($ttye==122){
                                                                                        insert122($inputTransaction);
                                                                                }elseif($ttye==123){
                                                                                        insert123($inputTransaction);
                                                                                }
									}
								}else{
									$resultCode=7017;
								}
							}
						}else{
							$resultCode=7101;
						}
						//insert into REQ_BATCH_C2B(id, description, userName, signature, productCode, destBankAcc, destAmount, feeAmount, transactionType, terminal, sourceID, sourceName, senderName, senderAddress, senderID, senderPhone, senderCity, senderCountry, recipientName, recipientPhone, recipientAddress, recipientCity, recipientCountry, notiDesc, traxId, refCode) values(SQ_REQ_BATCH_C2B.NEXTVAL, $inputTransaction['description'], $inputTransaction['userName'], $inputTransaction['signature'], $inputTransaction['productCode'], $inputTransaction['destBankAcc'], $inputTransaction['destAmount'], $inputTransaction['feeAmount'], $inputTransaction['transactionType'], $inputTransaction['terminal'], $inputTransaction['sourceID'], $inputTransaction['sourceName'], $inputTransaction['senderName'], $inputTransaction['senderAddress'], $inputTransaction['senderID'], $inputTransaction['senderPhone'], $inputTransaction['senderCity'], $inputTransaction['senderCountry'], $inputTransaction['recipientName'], $inputTransaction['recipientPhone'], $inputTransaction['recipientAddress'], $inputTransaction['recipientCity'], $inputTransaction['recipientCountry'], $inputTransaction['notiDesc'], $inputTransaction['traxId'], $inputTransaction['refCode'], 1, '', sysdate)
					}
						if($ttye==122){
                                                        $inputTransaction['transactionType']='122';
                                                }elseif($ttye==123){
                                                        $inputTransaction['transactionType']='123';
                                                }
				}else{
                                        $resultCode=7127;
                                }
                        }
		}elseif($inputTransaction['transactionType']=='13'){
			$resultCode=00;
			$refCode=$inputTransaction['refCode'];

			if( empty($inputTransaction['userName']) or
				empty($inputTransaction['signature']) or
				empty($inputTransaction['productCode']) or
				empty($inputTransaction['destAmount']) or
				empty($inputTransaction['transactionType']) or
				empty($inputTransaction['terminal']) or
				empty($inputTransaction['sourceID']) or
				empty($inputTransaction['refCode']) or
				empty($inputTransaction['traxId'])){
				$resultCode=7012;
			}else{
				if(cekSignCheck($inputTransaction,$inputTransaction['signature'])==true){ //====CEK USERNAME n PASSWD=====
					$resultCode=00;
				}else{
					$resultCode=7127;
				}
				
				if(!is_numeric($inputTransaction['destAmount'])){
					$resultCode=7050;
				}
				
				if($resultCode==00){
					$arrCheck=checkRefCode2($inputTransaction);
					if($arrCheck['bool']==true){
						if($arrCheck['typeid']==2){
							//$resultCode=7133;
							if($inputTransaction['productCode'] == '007004'){
								$resultCode= readAltoErrorCodeALTO($arrCheck['resultCode']);
							}elseif($inputTransaction['productCode'] == '007006'){
								$resultCode= readAltoErrorCodeBNI($arrCheck['resultCode']);
							}elseif($inputTransaction['productCode'] == '007012'){
								$arrCheck=remitFRAME($inputTransaction,'check');
								if($arrCheck){
								$resultCode=$arrCheck['result_code'];
								isLog($arrCheck['result_code']);
							}else{
								$resultCode= readAltoErrorCode($arrCheck['resultCode']);
							}
							if($inputTransaction['productCode']=='007003'){
								$refCode=$arrCheck['refCode'];
							}
						}else{
							$resultCode=7134;
						}
					}else{
						$resultCode=7061;
					}
				}
			}
		}elseif($inputTransaction['transactionType']=='14'){
			$resultCode=00;
			if( empty($inputTransaction['userName']) or
				empty($inputTransaction['signature']) or
				empty($inputTransaction['productCode']) or
				empty($inputTransaction['transactionType']) or
				empty($inputTransaction['terminal']) or
				empty($inputTransaction['sourceID']) or
				empty($inputTransaction['sourceName']) or
				empty($inputTransaction['traxId']) or
				empty($inputTransaction['refCode'])){
				$resultCode=7012;
				if(empty($inputTransaction['userName'])){isLog('empty userName');}
				if(empty($inputTransaction['signature'])){isLog('empty signature');}
				if(empty($inputTransaction['productCode'])){isLog('empty productCode');}
				if(empty($inputTransaction['transactionType'])){isLog('empty transactionType');}
				if(empty($inputTransaction['terminal'])){isLog('empty terminal');}
				if(empty($inputTransaction['sourceID'])){isLog('empty sourceID');}
				if(empty($inputTransaction['sourceName'])){isLog('empty sourceName');}
				if(empty($inputTransaction['traxId'])){isLog('empty traxId');}
				if(empty($inputTransaction['refCode'])){isLog('empty refCode');}
			}else{
				if(cekSignReq($inputTransaction,$inputTransaction['signature'])==true){ //====CEK USERNAME n PASSWD=====
					$resultCode=00;
					if($resultCode==00){
						if($inputTransaction['productCode']=='007007'){ //JIKA FC
							//CEK REFCODE IN THE DATABASE
							$arrCerRefCode=cekRefCode($inputTransaction);
							$inputTransaction['destAmount'] =  $arrCerRefCode['destAmount'];
							$inputTransaction['senderName'] =  $arrCerRefCode['senderName'];
							$inputTransaction['senderAddress'] =  $arrCerRefCode['senderAddress'];
							$inputTransaction['senderID'] =  $arrCerRefCode['senderID'];
							$inputTransaction['senderPhone'] =  $arrCerRefCode['senderPhone'];
							$inputTransaction['senderCity'] =  $arrCerRefCode['senderCity'];
							$inputTransaction['senderCountry'] =  $arrCerRefCode['senderCountry'];
							$inputTransaction['recipientName'] =  $arrCerRefCode['recipientName'];
							$inputTransaction['recipientPhone'] =  $arrCerRefCode['recipientPhone'];
							$inputTransaction['recipientAddress'] =  $arrCerRefCode['recipientAddress'];
							$inputTransaction['recipientCity'] =  $arrCerRefCode['recipientCity'];
							$inputTransaction['recipientCountry'] =  $arrCerRefCode['recipientCountry'];
							$inputTransaction['feeAmount'] =  $arrCerRefCode['feeAmount'];
							$resultCode=$arrCerRefCode['rc'];
							$refCode=$inputTransaction['refCode'];
						}else{
							$resultCode=7107;
						}	
					}
				}else{
					$resultCode=7127;
				}
			}
		}elseif($inputTransaction['transactionType']=='15'){
			$resultCode=00;
			if( empty($inputTransaction['userName']) or
				empty($inputTransaction['signature']) or
				empty($inputTransaction['productCode']) or
				empty($inputTransaction['destAmount']) or
				empty($inputTransaction['transactionType']) or
				empty($inputTransaction['terminal']) or
				empty($inputTransaction['sourceID']) or
				empty($inputTransaction['sourceName']) or
				empty($inputTransaction['senderName']) or
				empty($inputTransaction['senderAddress']) or
				empty($inputTransaction['senderID']) or
				empty($inputTransaction['senderPhone']) or
				empty($inputTransaction['senderCity']) or
				empty($inputTransaction['senderCountry']) or
				empty($inputTransaction['recipientName']) or
				empty($inputTransaction['recipientPhone']) or
				empty($inputTransaction['recipientCity']) or
				empty($inputTransaction['recipientCountry']) or
				empty($inputTransaction['traxId']) or
				empty($inputTransaction['refCode'])){
				$resultCode=7012;
	
				if(empty($inputTransaction['userName'])){isLog('empty userName');}
				elseif(empty($inputTransaction['signature'])){isLog('empty signature');}
				elseif(empty($inputTransaction['productCode'])){isLog('empty productCode');}
				elseif(empty($inputTransaction['destAmount'])){isLog('empty destAmount');}
				elseif(empty($inputTransaction['transactionType'])){isLog('empty transactionType');}
				elseif(empty($inputTransaction['terminal'])){isLog('empty terminal');}
				elseif(empty($inputTransaction['sourceID'])){isLog('empty sourceID');}
				elseif(empty($inputTransaction['sourceName'])){isLog('empty sourceName');}
				elseif(empty($inputTransaction['senderName'])){isLog('empty senderName');}
				elseif(empty($inputTransaction['senderAddress'])){isLog('empty senderAddress');}
				elseif(empty($inputTransaction['senderID'])){isLog('empty senderID');}
				elseif(empty($inputTransaction['senderPhone'])){isLog('empty senderPhone');}
				elseif(empty($inputTransaction['senderCity'])){isLog('empty senderCity');}
				elseif(empty($inputTransaction['senderCountry'])){isLog('empty senderCountry');}
				elseif(empty($inputTransaction['recipientName'])){isLog('empty recipientName');}
				elseif(empty($inputTransaction['recipientPhone'])){isLog('empty recipientPhone');}
				elseif(empty($inputTransaction['recipientCity'])){isLog('empty recipientCity');}
				elseif(empty($inputTransaction['recipientCountry'])){isLog('empty recipientCountry');}
				elseif(empty($inputTransaction['traxId'])){isLog('empty traxId');}
				elseif(empty($inputTransaction['refCode'])){isLog('empty refCode');}

			}else{
				if(cekSignReq($inputTransaction,$inputTransaction['signature'])==true){ //====CEK USERNAME n PASSWD=====
					$resultCode=00;
					if($resultCode==00){
						if($inputTransaction['productCode']=='007007'){ //JIKA FC
							//CEK REFCODE IN THE DATABASE
							$arrCerRefCode=cekRefCodeConf($inputTransaction);
							$refCode=$inputTransaction['refCode'];
							$resultCode=$arrCerRefCode['rc'];
							$inputTransaction['feeAmount']=$arrCerRefCode['feeAgenCo'];
							if($resultCode==00){
								$resultCode=00;
								//UPDATE LOGROUTEX SET KODE VERIFIKASI AND SEND SMS
								
								$randomString=randomString(6, 6, false, false, true);
								isLog($randomString);
								updateNSetPayCode($inputTransaction,$randomString);
								//$strsms="http://192.168.20.147/apicode/send_m.php?user=fcdom&passwd=finch4nn3l&nohp=".substr($inputTransaction['recipientPhone'],1)."&isisms=Kode%20Verifikasi%20untuk%20remittance%20dengan%20kode%20".$inputTransaction['refCode']."%20adalah%20".substr($randomString,0,2)."-".substr($randomString,2);
								isLog('No : '.substr($inputTransaction['recipientPhone'],0,1));
								if(substr($inputTransaction['recipientPhone'],0,1) == '+'){
									$NoOTP = substr($inputTransaction['recipientPhone'],3);
								}else{
									$NoOTP = substr($inputTransaction['recipientPhone'],1);
								} 
								$strsms="http://192.168.136.146/apicodes/send_m.php?user=fch2h&passwd=H2hfinch4nn3l&nohp=62".$NoOTP."&isisms=Kode%20Verifikasi%20untuk%20remittance%20dengan%20kode%20".$inputTransaction['refCode']."%20adalah%20".$randomString;
								isLog($strsms);
								
								$ch = curl_init();
								// set URL and other appropriate options
								curl_setopt($ch, CURLOPT_URL, $strsms);
								//curl_setopt($ch, CURLOPT_HEADER, 0);
								curl_setopt($ch, CURLOPT_HEADER, 1);
                                        			curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
								// grab URL and pass it to the browser
								if(curl_exec($ch) === false) {
								   isLog(curl_error($ch));//echo curl_error($ch);
								};
								// close cURL resource, and free up system resources
								curl_close($ch);					
							}
						}else{
							$resultCode=7107;
						}	
					}
				}else{
					$resultCode=7127;
				}
			}
		}elseif($inputTransaction['transactionType']=='16'){
			$resultCode=00;
			if( empty($inputTransaction['userName']) or
				empty($inputTransaction['signature']) or
				empty($inputTransaction['productCode']) or
				empty($inputTransaction['destAmount']) or
				empty($inputTransaction['transactionType']) or
				empty($inputTransaction['terminal']) or
				empty($inputTransaction['sourceID']) or
				empty($inputTransaction['sourceName']) or
				empty($inputTransaction['senderName']) or
				empty($inputTransaction['senderAddress']) or
				empty($inputTransaction['senderID']) or
				empty($inputTransaction['senderPhone']) or
				empty($inputTransaction['senderCity']) or
				empty($inputTransaction['senderCountry']) or
				empty($inputTransaction['recipientName']) or
				empty($inputTransaction['recipientPhone']) or
				empty($inputTransaction['recipientCity']) or
				empty($inputTransaction['recipientCountry']) or
				empty($inputTransaction['traxId']) or
				empty($inputTransaction['refCode']) or 
				empty($inputTransaction['payCode'])){
				$resultCode=7012;
	
				if(empty($inputTransaction['userName'])){isLog('empty userName');}
				if(empty($inputTransaction['signature'])){isLog('empty signature');}
				if(empty($inputTransaction['productCode'])){isLog('empty productCode');}
				if(empty($inputTransaction['destAmount'])){isLog('empty destAmount');}
				if(empty($inputTransaction['transactionType'])){isLog('empty transactionType');}
				if(empty($inputTransaction['terminal'])){isLog('empty terminal');}
				if(empty($inputTransaction['sourceID'])){isLog('empty sourceID');}
				if(empty($inputTransaction['sourceName'])){isLog('empty sourceName');}
				if(empty($inputTransaction['senderName'])){isLog('empty senderName');}
				if(empty($inputTransaction['senderAddress'])){isLog('empty senderAddress');}
				if(empty($inputTransaction['senderID'])){isLog('empty senderID');}
				if(empty($inputTransaction['senderPhone'])){isLog('empty senderPhone');}
				if(empty($inputTransaction['senderCity'])){isLog('empty senderCity');}
				if(empty($inputTransaction['senderCountry'])){isLog('empty senderCountry');}
				if(empty($inputTransaction['recipientName'])){isLog('empty recipientName');}
				if(empty($inputTransaction['recipientPhone'])){isLog('empty recipientPhone');}
				if(empty($inputTransaction['recipientCity'])){isLog('empty recipientCity');}
				if(empty($inputTransaction['recipientCountry'])){isLog('empty recipientCountry');}
				if(empty($inputTransaction['traxId'])){isLog('empty traxId');}
				if(empty($inputTransaction['refCode'])){isLog('empty refCode');}
				if(empty($inputTransaction['payCode'])){isLog('empty payCode');}

			}else{
				if(cekSignReq($inputTransaction,$inputTransaction['signature'])==true){ //====CEK USERNAME n PASSWD=====
					$resultCode=00;
					if($resultCode==00){
						if($inputTransaction['productCode']=='007007'){ //JIKA FC
							//CEK REFCODE IN THE DATABASE
							$arrCerRefCode=cekRefCodeConf($inputTransaction);
							$refCode=$inputTransaction['refCode'];
							$resultCode=$arrCerRefCode['rc'];
							$inputTransaction['feeAmount']=$arrCerRefCode['feeAgenCo'];
							$accInfoInsert=getDepositFC($inputTransaction);
							if($resultCode==00){
								//CEK VERIFY PAYCODE
								if(verifyPayCode($inputTransaction)){
									//DEBET ACCOUNT
									$accContainer=readAccCont();
									if($inputTransaction['sourceID']=='007'){ 
										$accInfo=getDeposit($inputTransaction);
										//	SEND WS ()
										$resultCode=debetSaldoConf($accContainer['FCCONTAINER1'], $inputTransaction['destAmount'], $accContainer['FCCONTAINER2'], $arrCerRefCode['feeAgenCo'], $accInfo['no_hp'], $inputTransaction);
										if(is_array($dbtSld)){
												$inputTransaction['reffx'] = $dbtSld['hostRef'];
												$resultCode = $resultCode['resultCode'];
											}
										if($resultCode == 00){
											//UPDATE LISTREMIT
											confirmTransactionCashoutFC($inputTransaction, $accInfo['no_va'], $accInfo['cacode'], $arrCerRefCode['feeAgenCo'], $arrCerRefCode['feeSwitch']);
										}else{
											$resultCode=7000;
										}
									}elseif($inputTransaction['sourceID']=='008'){
										if(!empty($inputTransaction['merchantNumber'])){
											$accInfo=getDepositFC($inputTransaction);
											//	SEND WS ()
											$resultCode=debetSaldoConf($accContainer['FCCONTAINER1'], $inputTransaction['destAmount'], $accContainer['FCCONTAINER2'], $arrCerRefCode['feeAgenCo'], $inputTransaction['merchantNumber'], $inputTransaction);
											//UPDATE LISTREMIT
											$tempSender=$inputTransaction['senderPhone']; //masukkan ke variabel temp
											$inputTransaction['senderPhone']=$inputTransaction['merchantNumber'];
											$accInfoInsert=getDepositFC($inputTransaction);
											$inputTransaction['recipientPhone']=$accInfo['no_hp'];
											if(is_array($dbtSld)){
												$inputTransaction['reffx'] = $dbtSld['hostRef'];
												$resultCode = $resultCode['resultCode'];
											}
											if($resultCode == 00){
												confirmTransactionCashoutFC($inputTransaction, $accInfoInsert['no_va'], $accInfoInsert['cacode'], $arrCerRefCode['feeAgenCo'], $arrCerRefCode['feeSwitch']);
											$inputTransaction['senderPhone']=$tempSender;
											}else{
                                                                                                $resultCode=7000;
                                                                                        }
										}else{
											$resultCode=7012;
										}
									}else{
										$resultCode=7017;
									}
								}else{
									$resultCode=7129;
								}
							}
						}else{
							$resultCode=7107;
						}	
					}
				}else{
					$resultCode=7127;
				}
			}
		}elseif($inputTransaction['transactionType']=='17'){
			$resultCode=00;
			if( empty($inputTransaction['userName']) or
				empty($inputTransaction['signature']) or
				empty($inputTransaction['productCode']) or
				empty($inputTransaction['transactionType']) or
				empty($inputTransaction['terminal']) or
				empty($inputTransaction['sourceID']) or
				empty($inputTransaction['sourceName']) or
				empty($inputTransaction['traxId']) or
				empty($inputTransaction['refCode'])){
				$resultCode=7012;
				if(empty($inputTransaction['userName'])){isLog('empty userName');}
				if(empty($inputTransaction['signature'])){isLog('empty signature');}
				if(empty($inputTransaction['productCode'])){isLog('empty productCode');}
				if(empty($inputTransaction['transactionType'])){isLog('empty transactionType');}
				if(empty($inputTransaction['terminal'])){isLog('empty terminal');}
				if(empty($inputTransaction['sourceID'])){isLog('empty sourceID');}
				if(empty($inputTransaction['sourceName'])){isLog('empty sourceName');}
				if(empty($inputTransaction['traxId'])){isLog('empty traxId');}
				if(empty($inputTransaction['refCode'])){isLog('empty refCode');}
			}else{
				if(cekSignReq($inputTransaction,$inputTransaction['signature'])==true){ //====CEK USERNAME n PASSWD=====
					$resultCode=00;
					if($resultCode==00){
						if($inputTransaction['productCode']=='007007'){ //JIKA FC
							//CEK REFCODE IN THE DATABASE
							$arrCerRefCode=cekRefCodeCashout($inputTransaction);
							$inputTransaction['destAmount'] =  $arrCerRefCode['destAmount'];
							$inputTransaction['senderName'] =  $arrCerRefCode['senderName'];
							$inputTransaction['senderAddress'] =  $arrCerRefCode['senderAddress'];
							$inputTransaction['senderID'] =  $arrCerRefCode['senderID'];
							$inputTransaction['senderPhone'] =  $arrCerRefCode['senderPhone'];
							$inputTransaction['senderCity'] =  $arrCerRefCode['senderCity'];
							$inputTransaction['senderCountry'] =  $arrCerRefCode['senderCountry'];
							$inputTransaction['recipientName'] =  $arrCerRefCode['recipientName'];
							$inputTransaction['recipientPhone'] =  $arrCerRefCode['recipientPhone'];
							$inputTransaction['recipientAddress'] =  $arrCerRefCode['recipientAddress'];
							$inputTransaction['recipientCity'] =  $arrCerRefCode['recipientCity'];
							$inputTransaction['recipientCountry'] =  $arrCerRefCode['recipientCountry'];
							$inputTransaction['feeAmount'] =  $arrCerRefCode['feeAmount'];
							$inputTransaction['cashoutTerminal'] =  $arrCerRefCode['cashoutTerminal'];
							$resultCode=$arrCerRefCode['rc'];
							$refCode=$inputTransaction['refCode'];
						}else{
							$resultCode=7107;
						}	
					}
				}else{
					$resultCode=7127;
				}
			}
		}elseif($inputTransaction['transactionType']=='19'){
			$resultCode=00;
			isLog('destBankAcc : '.$inputTransaction['destBankAcc']);
			if( empty($inputTransaction['userName']) or
				empty($inputTransaction['signature']) or
				empty($inputTransaction['productCode']) or
				empty($inputTransaction['destBankAcc']) or
				empty($inputTransaction['transactionType']) or
				empty($inputTransaction['terminal']) or
				empty($inputTransaction['sourceID']) or
				empty($inputTransaction['sourceName']) or
				empty($inputTransaction['traxId'])){
				if(empty($inputTransaction['userName'])){isLog('userName');}
				if(empty($inputTransaction['signature'])){isLog('signature');}
				if(empty($inputTransaction['productCode'])){isLog('productCode');}
				if(empty($inputTransaction['destBankAcc'])){isLog('destBankAcc');}
				if(empty($inputTransaction['transactionType'])){isLog('transactionType');}
				if(empty($inputTransaction['terminal'])){isLog('terminal');}
				if(empty($inputTransaction['sourceID'])){isLog('sourceID');}
				if(empty($inputTransaction['sourceName'])){isLog('sourceName');}
				if(empty($inputTransaction['traxId'])){isLog('traxId');}
				$resultCode=7012;
			}else{
				if(cekSignReq($inputTransaction,$inputTransaction['signature'])==true){ //====CEK USERNAME n PASSWD=====
					$resultCode=00;
					if(checkBankCode($inputTransaction['destBankAcc'])==true){
						if(checkAccountBank($inputTransaction['destBankAcc'])==true){
							if($inputTransaction['productCode']=='007006'){
								//SEND WS INQUIRY AJ
								$inq=remmitBNIC2A($inputTransaction);
								//$inq=remmitSwitchC2A($inputTransaction);
								if($inq['result_code']=='0'){
									isLog('RC Code : '.$errCodeAlto);
									$inputTransaction['recipientName']=$inq['result_name'];
								}else{
									$resultCode=readAltoErrorCode($inq['result_code']);
								}
							}else{
								//SEND WS INQUIRY ALTO
								$inq=inquiryAltoC2A($inputTransaction);
								//$inq=remmitSwitchC2A($inputTransaction);
								if($inq['result_code']=='0'){
									isLog('RC Code : '.$errCodeAlto);
									$inputTransaction['recipientName']=$inq['result_name'];
								}else{
									$resultCode=readAltoErrorCode($inq['result_code']);
								}
							}
						}else{
							$resultCode=7106;
						}
					}else{
						$resultCode=7105;
					}
				}else{
					$resultCode=7127;
				}
			}
		}else{
			$resultCode=7060;
		}
		$inputTransaction['sysCode']=$sysCode;
		$inputTransaction['refCode']=$refCode;
		$inputTransaction['resultCode']=$resultCode;
		$inputTransaction['resultDesc']=readRC($resultCode);
		tulisLogResponse($inputTransaction);
		return array(
        	'sysCode' => $sysCode,
			'refCode' => $refCode,
			'resultCode' => $resultCode,
			'resultDesc' => $inputTransaction['resultDesc'],
			'userName' => '',
			'signature' => '',//$inputTransaction['signature'],
			'productCode' => $inputTransaction['productCode'],
			'destBankAcc' => $inputTransaction['destBankAcc'],
			'destAmount' => $inputTransaction['destAmount'],
			'feeAmount' => $inputTransaction['feeAmount'],
			'sourceID' => $inputTransaction['sourceID'],
			'sourceName' => $inputTransaction['sourceName'],
			'senderName' => $inputTransaction['senderName'],
			'senderAddress' => $inputTransaction['senderAddress'],
			'senderID' => $inputTransaction['senderID'],
			'senderPhone' => $inputTransaction['senderPhone'],
			'senderCity' => $inputTransaction['senderCity'],
			'senderCountry' => $inputTransaction['senderCountry'],
			'recipientName' => $inputTransaction['recipientName'],
			'recipientPhone' => $inputTransaction['recipientPhone'],
			'recipientAddress' => $inputTransaction['recipientAddress'],
			'recipientCity' => $inputTransaction['recipientCity'],
			'recipientCountry' => $inputTransaction['recipientCountry'],
			'recepientId' => $inputTransaction['recepientId'],
			'recepientProvince' => $inputTransaction['recepientProvince'],
			'notiDesc' => $inputTransaction['notiDesc'],
			'transactionType' => $inputTransaction['transactionType'],
			'bankName' => $inputTransaction['bankName'],
			'traxId' => $inputTransaction['traxId'],
			'payCode' => $inputTransaction['payCode'],
			'merchantNumber' => $inputTransaction['merchantNumber']
    	);
 	}

// Use the request to (try to) invoke the service
$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
$server->service($HTTP_RAW_POST_DATA);
?>
