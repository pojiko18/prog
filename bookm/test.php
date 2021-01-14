<?php



$browseNodeId ="492352";

// // ノード取得
if(isset($_POST["type"])) {
$browseNodeId = $type = $_POST["type"];
    if($browseNodeId=="programing"){
    $browseNodeId ="492352";
  }
  if($browseNodeId=="business"){
    $browseNodeId ="554210";
  }
  if($browseNodeId=="money"){
    $browseNodeId ="492054";
  }
  if($browseNodeId=="sisou"){
    $browseNodeId ="571582";
  }
  if($browseNodeId=="manga"){
    $browseNodeId ="2501045051";
  }
  if($browseNodeId=="baby"){
    $browseNodeId ="492392";
  }

}



/* Copyright 2018 Amazon.com, Inc. or its affiliates. All Rights Reserved. */
/* Licensed under the Apache License, Version 2.0. */

// Put your Secret Key in place of **********
$serviceName="ProductAdvertisingAPI";
$region="us-west-2";
$accessKey="AKIAIBDDDKWLWIDV2DSA";
$secretKey="OgHWKoZI/M5MiRa+2td9JvqLPLsPx9ez3aCHcHEF";





$payload="{"
        ." \"Keywords\": \"*\","
        ." \"Resources\": ["
        ."  \"BrowseNodeInfo.BrowseNodes\","
        ."  \"BrowseNodeInfo.BrowseNodes.Ancestor\","
        ."  \"BrowseNodeInfo.BrowseNodes.SalesRank\","
        ."  \"BrowseNodeInfo.WebsiteSalesRank\","
        ."  \"CustomerReviews.Count\","
        ."  \"CustomerReviews.StarRating\","
        ."  \"Images.Primary.Small\","
        ."  \"Images.Primary.Medium\","
        ."  \"Images.Primary.Large\","
        ."  \"Images.Variants.Small\","
        ."  \"Images.Variants.Medium\","
        ."  \"Images.Variants.Large\","
        ."  \"ItemInfo.ByLineInfo\","
        ."  \"ItemInfo.ContentInfo\","
        ."  \"ItemInfo.ContentRating\","
        ."  \"ItemInfo.Classifications\","
        ."  \"ItemInfo.ExternalIds\","
        ."  \"ItemInfo.Features\","
        ."  \"ItemInfo.ManufactureInfo\","
        ."  \"ItemInfo.ProductInfo\","
        ."  \"ItemInfo.TechnicalInfo\","
        ."  \"ItemInfo.Title\","
        ."  \"ItemInfo.TradeInInfo\","
        ."  \"Offers.Listings.Availability.MaxOrderQuantity\","
        ."  \"Offers.Listings.Availability.Message\","
        ."  \"Offers.Listings.Availability.MinOrderQuantity\","
        ."  \"Offers.Listings.Availability.Type\","
        ."  \"Offers.Listings.Condition\","
        ."  \"Offers.Listings.Condition.ConditionNote\","
        ."  \"Offers.Listings.Condition.SubCondition\","
        ."  \"Offers.Listings.DeliveryInfo.IsAmazonFulfilled\","
        ."  \"Offers.Listings.DeliveryInfo.IsFreeShippingEligible\","
        ."  \"Offers.Listings.DeliveryInfo.IsPrimeEligible\","
        ."  \"Offers.Listings.DeliveryInfo.ShippingCharges\","
        ."  \"Offers.Listings.IsBuyBoxWinner\","
        ."  \"Offers.Listings.LoyaltyPoints.Points\","
        ."  \"Offers.Listings.MerchantInfo\","
        ."  \"Offers.Listings.Price\","
        ."  \"Offers.Listings.ProgramEligibility.IsPrimeExclusive\","
        ."  \"Offers.Listings.ProgramEligibility.IsPrimePantry\","
        ."  \"Offers.Listings.Promotions\","
        ."  \"Offers.Listings.SavingBasis\","
        ."  \"Offers.Summaries.HighestPrice\","
        ."  \"Offers.Summaries.LowestPrice\","
        ."  \"Offers.Summaries.OfferCount\","
        ."  \"ParentASIN\","
        ."  \"RentalOffers.Listings.Availability.MaxOrderQuantity\","
        ."  \"RentalOffers.Listings.Availability.Message\","
        ."  \"RentalOffers.Listings.Availability.MinOrderQuantity\","
        ."  \"RentalOffers.Listings.Availability.Type\","
        ."  \"RentalOffers.Listings.BasePrice\","
        ."  \"RentalOffers.Listings.Condition\","
        ."  \"RentalOffers.Listings.Condition.ConditionNote\","
        ."  \"RentalOffers.Listings.Condition.SubCondition\","
        ."  \"RentalOffers.Listings.DeliveryInfo.IsAmazonFulfilled\","
        ."  \"RentalOffers.Listings.DeliveryInfo.IsFreeShippingEligible\","
        ."  \"RentalOffers.Listings.DeliveryInfo.IsPrimeEligible\","
        ."  \"RentalOffers.Listings.DeliveryInfo.ShippingCharges\","
        ."  \"RentalOffers.Listings.MerchantInfo\","
        ."  \"SearchRefinements\""
        ." ],"
        ." \"BrowseNodeId\": \"".$browseNodeId."\","
        ." \"PartnerTag\": \"aoakatokyo-22\","
        ." \"PartnerType\": \"Associates\","
        ." \"Marketplace\": \"www.amazon.co.jp\""
        ."}";





$host="webservices.amazon.co.jp";
$uriPath="/paapi5/searchitems";
$awsv4 = new AwsV4 ($accessKey, $secretKey);
$awsv4->setRegionName($region);
$awsv4->setServiceName($serviceName);
$awsv4->setPath ($uriPath);
$awsv4->setPayload ($payload);
$awsv4->setRequestMethod ("POST");
$awsv4->addHeader ('content-encoding', 'amz-1.0');
$awsv4->addHeader ('content-type', 'application/json; charset=utf-8');
$awsv4->addHeader ('host', $host);
$awsv4->addHeader ('x-amz-target', 'com.amazon.paapi5.v1.ProductAdvertisingAPIv1.SearchItems');
$headers = $awsv4->getHeaders ();
$headerString = "";
foreach ( $headers as $key => $value ) {
    $headerString .= $key . ': ' . $value . "\r\n";
}
$params = array (
        'http' => array (
            'header' => $headerString,
            'method' => 'POST',
            'content' => $payload
        )
    );
$stream = stream_context_create ( $params );

$fp = @fopen ( 'https://'.$host.$uriPath, 'rb', false, $stream );

if (! $fp) {
    throw new Exception ( "Exception Occured" );
}
$response = @stream_get_contents ( $fp );
if ($response === false) {
    throw new Exception ( "Exception Occured" );
}
// echo $response;

$results = json_decode($response,true);
$items = $results["SearchResult"]["Items"];

$view="";
foreach($items as $item) {
    $tmp = array();

    $tmp["title"] = $item["ItemInfo"]["Title"]["DisplayValue"];
    $tmp["url"] = $item["DetailPageURL"];
    $tmp["imgurl"] = $item["Images"]["Primary"]["Large"]["URL"];

    // echo '<img src="'.$tmp["imgurl"].'"  width="150" /><br>';
    // echo "<a href='".$tmp["url"]."'>".$tmp["title"]."</a><br>";


    $view .= '<div class="book_item"><img src="'.$tmp["imgurl"].'"  width="150" /><br>';
    $view .= '<div class="book_link">';
    $view .= '<a href="'.$tmp["url"].' target="_blank" rel="noopener noreferrer">'.$tmp["title"].'</a>';
    $view .='</div></div>';

}

class AwsV4 {

    private $accessKey = null;
    private $secretKey = null;
    private $path = null;
    private $regionName = null;
    private $serviceName = null;
    private $httpMethodName = null;
    private $queryParametes = array ();
    private $awsHeaders = array ();
    private $payload = "";

    private $HMACAlgorithm = "AWS4-HMAC-SHA256";
    private $aws4Request = "aws4_request";
    private $strSignedHeader = null;
    private $xAmzDate = null;
    private $currentDate = null;

    public function __construct($accessKey, $secretKey) {
        $this->accessKey = $accessKey;
        $this->secretKey = $secretKey;
        $this->xAmzDate = $this->getTimeStamp ();
        $this->currentDate = $this->getDate ();
    }

    function setPath($path) {
        $this->path = $path;
    }

    function setServiceName($serviceName) {
        $this->serviceName = $serviceName;
    }

    function setRegionName($regionName) {
        $this->regionName = $regionName;
    }

    function setPayload($payload) {
        $this->payload = $payload;
    }

    function setRequestMethod($method) {
        $this->httpMethodName = $method;
    }

    function addHeader($headerName, $headerValue) {
        $this->awsHeaders [$headerName] = $headerValue;
    }

    private function prepareCanonicalRequest() {
        $canonicalURL = "";
        $canonicalURL .= $this->httpMethodName . "\n";
        $canonicalURL .= $this->path . "\n" . "\n";
        $signedHeaders = '';
        foreach ( $this->awsHeaders as $key => $value ) {
            $signedHeaders .= $key . ";";
            $canonicalURL .= $key . ":" . $value . "\n";
        }
        $canonicalURL .= "\n";
        $this->strSignedHeader = substr ( $signedHeaders, 0, - 1 );
        $canonicalURL .= $this->strSignedHeader . "\n";
        $canonicalURL .= $this->generateHex ( $this->payload );
        return $canonicalURL;
    }

    private function prepareStringToSign($canonicalURL) {
        $stringToSign = '';
        $stringToSign .= $this->HMACAlgorithm . "\n";
        $stringToSign .= $this->xAmzDate . "\n";
        $stringToSign .= $this->currentDate . "/" . $this->regionName . "/" . $this->serviceName . "/" . $this->aws4Request . "\n";
        $stringToSign .= $this->generateHex ( $canonicalURL );
        return $stringToSign;
    }

    private function calculateSignature($stringToSign) {
        $signatureKey = $this->getSignatureKey ( $this->secretKey, $this->currentDate, $this->regionName, $this->serviceName );
        $signature = hash_hmac ( "sha256", $stringToSign, $signatureKey, true );
        $strHexSignature = strtolower ( bin2hex ( $signature ) );
        return $strHexSignature;
    }

    public function getHeaders() {
        $this->awsHeaders ['x-amz-date'] = $this->xAmzDate;
        ksort ( $this->awsHeaders );

        // Step 1: CREATE A CANONICAL REQUEST
        $canonicalURL = $this->prepareCanonicalRequest ();

        // Step 2: CREATE THE STRING TO SIGN
        $stringToSign = $this->prepareStringToSign ( $canonicalURL );

        // Step 3: CALCULATE THE SIGNATURE
        $signature = $this->calculateSignature ( $stringToSign );

        // Step 4: CALCULATE AUTHORIZATION HEADER
        if ($signature) {
            $this->awsHeaders ['Authorization'] = $this->buildAuthorizationString ( $signature );
            return $this->awsHeaders;
        }
    }

    private function buildAuthorizationString($strSignature) {
        return $this->HMACAlgorithm . " " . "Credential=" . $this->accessKey . "/" . $this->getDate () . "/" . $this->regionName . "/" . $this->serviceName . "/" . $this->aws4Request . "," . "SignedHeaders=" . $this->strSignedHeader . "," . "Signature=" . $strSignature;
    }

    private function generateHex($data) {
        return strtolower ( bin2hex ( hash ( "sha256", $data, true ) ) );
    }

    private function getSignatureKey($key, $date, $regionName, $serviceName) {
        $kSecret = "AWS4" . $key;
        $kDate = hash_hmac ( "sha256", $date, $kSecret, true );
        $kRegion = hash_hmac ( "sha256", $regionName, $kDate, true );
        $kService = hash_hmac ( "sha256", $serviceName, $kRegion, true );
        $kSigning = hash_hmac ( "sha256", $this->aws4Request, $kService, true );

        return $kSigning;
    }

    private function getTimeStamp() {
        return gmdate ( "Ymd\THis\Z" );
    }

    private function getDate() {
        return gmdate ( "Ymd" );
    }
}
?>
<!-- 参考記事　AmazonAPI -->
<!-- https://mementoo.info/archives/4031 -->

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Amazon　プログラミング本ランキング</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="./css/index.css" rel="stylesheet">
<!-- <style>div{padding: 10px;font-size:16px;}</style> -->
</head>
<body id="main">
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
      <a class="navbar-brand" href="index.php">データ登録</a>
      </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->
<div class="book_select">
<form action="test.php" method="post">
 <select name="type">
            <option value="programing" selected>プログラミング</option>            
            <option value="business">ビジネス</option>
            <option value="money">金融・税</option>            
            <option value="sisou">思想</option>
            <option value="manga">漫画</option>
            <option value="baby">幼児教育</option>
        </select>
        <div class="submit"><input type="submit" value="切り換え"></div>
</form>
<!-- Main[Start] -->

<div class="amazon">
<?=$view?>
</div>   
    
<!-- <table>
<tr>
<th>1位</th>
<td><?=$view?></td>
</tr>

</table> -->
<!-- Main[End] -->



</body>
</html>