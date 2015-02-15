
<?php
function get($uri)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $uri);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);

        if ($response === FALSE) {
            $error = curl_error($ch);
        }

        curl_close($ch);

        if (isset($error)) {
            die(": $error ($uri)");
        }
        return $response;
    }

    /**
     * Perform a HTTP GET request.
     * @param string $uri Request URI.
     * @param mixed $body Request body (JSON string / PHP array).
     * @return string Response body as JSON string.
     * @throws RippleRestProtocolError if client returns non-200 responses or network problems.
     */
    function post($uri, $body)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $uri);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, is_string($body) ? $body : json_encode($body));
        $response = curl_exec($ch);

        if ($response === FALSE) {
            $error = curl_error($ch);
        }

        curl_close($ch);

        if (isset($error)) {
            die("CURL: $error ($uri)");
        }
        return $response;
    }
$amounttest=0.001;

$msg=$_POST["Body"];
list($phone,$amount)=split(' ', $msg);

echo 'Msg received: ' . $msg;
echo 'Phone: ' . $phone;
echo 'amount:' . $amount;


$amount_hack=0.0001;


$secretkeytest="snqfugX7TaCgRW9mQFX9SLD358Moh";
$issueraddress="rPmrqFdnzQ8q6E9AmRWJb1HLLCeoZSntS3";//David
$dstaddress="rPrkUGPVvS6Gji5e6FrA1gh7S8gUL3wXMk"; //Simon GBP
$srcaddress="rNAZFtFfeKofrA4JeDMjnrmMkRpN5NstuE";//Andres INR

$dstaddresstest="ra5nK24KXen9AHvsdFTKHSANinZseWnPcX";
$issueraddresstest="rf1BiGeXwwQoi8Z2ueFYTEXSwuJYfV2Jpn";
$srcaddresstest="rf1BiGeXwwQoi8Z2ueFYTEXSwuJYfV2Jpn";
$secretkeytest="sn3nxiW7v8KXzPzAqzyHXbSSKNuN9";


$id=get("https://api.ripple.com/v1/uuid");

$id=json_decode($id,true);
echo $id['uuid'];

//Rs

$preparehack=get("https://api.ripple.com/v1/accounts/$dstaddress/payments/paths/$srcaddress/$amount_hack+INR+$issueraddress?source_currencies=GBP");

$hack2=json_decode($preparehack,true);

echo hack2;
print_r($hack2);

$value=$hack2["payments"][0]["source_amount"]["value"];

$rate=$amount_hack/$value;

echo rate;
print_r($rate);


echo value;
print_r($value);

$amount2=$amount*$rate;

$prepare=get("https://api.ripple.com/v1/accounts/$dstaddress/payments/paths/$srcaddress/$amounttest+INR+$issueraddress?source_currencies=GBP");

$id2=json_decode($prepare,true);

echo prepare;

print_r($id2);

$paymentdata=$id2["payments"][0];


$data=array(
      "secret"=>$secretkey,
      "client_resource_id"=>$id['uuid'],
      "payment"=>$paymentdata,
      "memos"=>array(
                array(
                    "MemoType"=>"Phone",
                    "MemoData"=>$phone
                )
      )
);

$out=post("https://api.ripple.com/v1/accounts/$srcaddress/payments?",$data);

print_r($out);


?>


