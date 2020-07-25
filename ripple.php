
<?php

require 'twilio/Services/Twilio.php';


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

/*
$msg=$_POST["Body"];
list($phone,$amount)=split(' ', $msg);

echo 'Msg received: ' . $msg;
echo 'Phone: ' . $phone;
echo 'amount:' . $amount;
*/

$account_sid = "AC3b92f303b5fbff35d8a2183ad8b19c61"; // Your Twilio account sid
$auth_token = "c76b91115d49d7485ef62078870b2ee4"; // Your Twilio auth token
$client = new Services_Twilio($account_sid, $auth_token);

$secretkey="sn3nxiW7v8KXzPzAqzyHXbSSKNuN9";
$amount=1;
$issueraddress="rf1BiGeXwwQoi8Z2ueFYTEXSwuJYfV2Jpn";
$dstaddress="rNAZFtFfeKofrA4JeDMjnrmMkRpN5NstuE"; //Mbale GBP
$srcaddress="rNAZFtFfeKofrA4JeDMjnrmMkRpN5NstuE";//Lawrence ZMK
$trans=get("https://api.ripple.com/v1/accounts/$dstaddress/payments?direction=incoming&exclude_failed=true");

$out=json_decode($trans,true);

print_r($out);

$hashold=$out["payments"][0]["hash"];
echo $hashold;

/** testing twilio **/

$phonetest=+447973212148;

//var_dump($client->account->sms_messages);
/**
$message = $client->account->sms_messages->create(
              '+441246488197', // From a Twilio number in your account
              $phonetest, // Text any number
              "Congratulations You have received 1 million Kwacha !"
            );
           print $message->sid;
**/


echo "WAITING TRANSACTIONS... on ".$dstaddress;

while(1){

 /*if (isset($out["payments"][0]["hash"])){
  if (isset($out["payments"][0]["destination_amount"]["value"])){
    if (isset($out["payments"][0]["memos"][0]["MemoData"])){
*/
       $hash=$out["payments"][0]["hash"];
       $value=$out["payments"][0]["destination_amount"]["value"];
       $phone=$out["payments"][0]["memos"][0]["MemoData"];

       if ($hash!=$hashold){

         echo "NEW PAYMENT RECEIVED ";

         $message = $client->account->sms_messages->create(
                       '+441246488197', // From a Twilio number in your account
                       $phonetest, // Text any number
                       "Congratulations You have received $value ruppees !"
                     );
                    print $message->sid;
                    $hashold=$hash;
       }
       /*
    }
  }
 }
 */

 sleep (5);

 $trans=get("https://api.ripple.com/v1/accounts/$dstaddress/payments?direction=incoming&exclude_failed=true");
 $out=json_decode($trans,true);
}

?>


