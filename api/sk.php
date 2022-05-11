<?php

error_reporting(0);
set_time_limit(0);
error_reporting(0);
date_default_timezone_set('America/Buenos_Aires');
header("Content-Type: application/json");

$sk="";
if(isset($_GET['skkey'])){
    $sk = $_GET['skkey'];
}
function multiexplode($delimiters, $string)
{
  $one = str_replace($delimiters, $delimiters[0], $string);
  $two = explode($delimiters[0], $one);
  return $two;
}

$listas = array("a"=>"5469930004014495|07|2025|341","b"=>"4034465102763601|02|2024|817","c"=>"4373034049102478|01|2022|453","d"=>"5115581746037571|05|2023|969" );
 
// Use array_rand function to returns random key
$key = array_rand($listas);
 
// Display the random array element

 
$lista = $listas[$key];
$cc = multiexplode(array(":", " ", "|", ""), $lista)[0];
$mes = multiexplode(array(":", " ", "|", ""), $lista)[1];
$ano = multiexplode(array(":", " ", "|", ""), $lista)[2];
$cvv = multiexplode(array(":", " ", "|", ""), $lista)[3];

function GetStr($string, $start, $end)
{
  $str = explode($start, $string);
  $str = explode($end, $str[1]);
  return $str[0];
}

function value($str,$find_start,$find_end){
$start = @strpos($str,$find_start);
if ($start === false){
return "";}
$length = strlen($find_start);
$end    = strpos(substr($str,$start +$length),$find_end);
return trim(substr($str,$start +$length,$end));}
function mod($dividendo,$divisor){
return round($dividendo - (floor($dividendo/$divisor)*$divisor));}


$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://lookup.binlist.net/'.$cc.'');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Host: lookup.binlist.net',
'Cookie: _ga=GA1.2.549903363.1545240628; _gid=GA1.2.82939664.1545240628',
'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8'));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, '');
$fim = curl_exec($ch); 
$emoji = GetStr($fim, '"emoji":"', '"'); 
if(strpos($fim, '"type":"credit"') !== false){
}
curl_close($ch);

#########################

$ch = curl_init();
$bin = substr($cc, 0,6);
curl_setopt($ch, CURLOPT_URL, 'https://binlist.io/lookup/'.$bin.'/');
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
$bindata = curl_exec($ch);
$binna = json_decode($bindata,true);
$brand = $binna['scheme'];
$country = $binna['country']['name'];
$type = $binna['type'];
$bank = $binna['bank']['name'];
curl_close($ch);

$bindata1 = " $type - $brand - $country $emoji"; ///CREDIT - MASTERCARD - UNITED STATES 🇺🇸

#########################[Randomizing Details]############################

        $get = file_get_contents('https://randomuser.me/api/1.3/?nat='.$country.'');
        preg_match_all("(\"first\":\"(.*)\")siU", $get, $matches1);
        $first = $matches1[1][0];
        preg_match_all("(\"last\":\"(.*)\")siU", $get, $matches1);
        $last = $matches1[1][0];
        preg_match_all("(\"email\":\"(.*)\")siU", $get, $matches1);
        $email = $matches1[1][0];
        $serve_arr = array("gmail.com","homtail.com","yahoo.com.br","outlook.com");
        $serv_rnd = $serve_arr[array_rand($serve_arr)];
        $email= str_replace("example.com", $serv_rnd, $email);
        preg_match_all("(\"street\":\"(.*)\")siU", $get, $matches1);
        $street = $matches1[1][0];
        preg_match_all("(\"city\":\"(.*)\")siU", $get, $matches1);
        $city = $matches1[1][0];
        preg_match_all("(\"state\":\"(.*)\")siU", $get, $matches1);
        $state = $matches1[1][0];
        preg_match_all("(\"phone\":\"(.*)\")siU", $get, $matches1);
        $phone = $matches1[1][0];
        preg_match_all("(\"postcode\":(.*),\")siU", $get, $matches1);
        $postcode = $matches1[1][0];
        preg_match_all("(\"postcode\":(.*),\")siU", $get, $matches1);
        $zip = $matches1[1][0];

############[1 Req]#############

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/tokens');
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'card[name]='.$firstname.'&card[number]='.$cc.'&card[cvc]='.$cvv.'&card[exp_month]='.$mes.'&card[exp_year]='.$ano.'&card[address_line1]='.$street.'200&card[address_line2]=Apartment&card[address_city]='.$city.'&card[address_state]='.$state.'&card[address_zip]='.$zip.'&card[address_country]='.$country.'');

curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Authorization: Bearer '.$sk.'',
'user-agent: Mozilla/5.0 (Windows NT '.rand(11,99).'.0; Win64; x64) AppleWebKit/'.rand(111,999).'.'.rand(11,99).' (KHTML, like Gecko) Chrome/'.rand(11,99).'.0.'.rand(1111,9999).'.'.rand(111,999).' Safari/'.rand(111,999).'.'.rand(11,99).''));

$r1 = curl_exec($ch);
$tok = trim(strip_tags(getstr($r1,'"id": "','"')));


if (strpos($r1, 'test_mode_live_card')){
$status = 'Dead';
$cc_code = 'Test mode cards only';
}

elseif (strpos($r1, 'testmode_charges_only')){
$status = 'Dead';
$cc_code = 'Testmode charges only';
}

elseif(strpos($r1, "invalid_request_error" )) {
$status = 'Dead';
$cc_code = 'Invalid Request Error';
}

elseif(strpos($r1, "Sending credit card numbers directly to the Stripe API is generally unsafe" )) {
$status = 'Dead';
$cc_code = 'SK KEY DEAD';
}

elseif(strpos($r1, "api_key_expired" )) {
$status = 'Dead';
$cc_code = 'Api key expired';
}

else {
$status = 'Live';
$cc_code = 'Valid Live Key';
}


echo json_encode(array("status"=>$status,"message"=>$cc_code, "key"=>$sk));


curl_close($ch);
ob_flush();

?>