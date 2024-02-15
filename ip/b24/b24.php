<?php


require_once (__DIR__.'/src/crest.php');


$NAME=$_POST["name"];
$PHONE = $phone;
$EMAIL = $_POST['email'];
$prod=$_POST['productName'];
$desc=$message;
$TITLE =  $subject;
$url=$_POST["url"];

 
$arFields = array (
    'TITLE' => $TITLE,
    'NAME' =>$NAME,
    'PHONE' => (!empty($PHONE)) ? array(array('VALUE' => $PHONE, 'VALUE_TYPE' => 'WORK')) : array(),
    'EMAIL' => (!empty($EMAIL)) ? array(array('VALUE' => $EMAIL, 'VALUE_TYPE' => 'WORK')) : array(),
    'SOURCE_ID' => "WEB",
    'COMMENTS' =>$desc,
    'SOURCE_DESCRIPTION' =>  $url,
    'UF_CRM_1671448491' =>  $prod,
    );


if(!empty($PHONE)) {



$arLeadDuplicate = array ();
if(!empty($PHONE)){
    $arResultDuplicate = CRest::call('crm.duplicate.findbycomm',array (
        "entity_type" => "LEAD",
        "type" => "PHONE",
        "values" => array($PHONE)
    ));
    if(!empty($arResultDuplicate['result']['LEAD'])){
        $arLeadDuplicate = array_merge ($arLeadDuplicate,$arResultDuplicate['result']['LEAD']);
    }
}

if(!empty($EMAIL)) {
    $arResultDuplicate = CRest::call('crm.duplicate.findbycomm', array (
        "entity_type" => "LEAD",
        "type" => "EMAIL",
        "values" => array($EMAIL)
    ));
    if(!empty($arResultDuplicate[ 'result' ][ 'LEAD' ])) {
        $arLeadDuplicate = array_merge($arLeadDuplicate, $arResultDuplicate[ 'result' ][ 'LEAD' ]);
    }
}

if(!empty($arLeadDuplicate)){
    $arDuplicateLead = CRest::call('crm.lead.list',array (
        "filter" => array(
            '=ID' => $arLeadDuplicate,
            'STATUS_ID' => 'CONVERTED',
        ),
        'select' => array(
            'ID', 'COMPANY_ID', 'CONTACT_ID'
        )
    ));
    
    if (!empty($arResultDuplicate['result'])) {
        $firstDuplicateLeadId = reset($arResultDuplicate['result']['LEAD']);
        $arFields['ID'] = $firstDuplicateLeadId;
        $resultLead = CRest::call('crm.lead.update', array(
            'id' => $firstDuplicateLeadId,
            'fields' => $arFields
        ));
}

$resultLead = CRest::call('crm.lead.add',
   array (
        'fields'    =>  $arFields
    )
);
/*
 if(!empty($resultLead ['result'])){
        echo 'ok';
    }elseif(!empty($resultLead ['error_description'])){
        echo json_encode(['message' => 'Lead not added: '.$result['error_description']]);
    }else{
        echo json_encode(['message' => 'Lead not added']);
    }
*/






	

            
  }






?>