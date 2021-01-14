<?php 

$browseNodeId ="492352";
$select = "プログラミング";
// // ノード取得
if(isset($_POST["type"])) {
$browseNodeId = $type = $_POST["type"];
    if($browseNodeId=="programing"){
    $browseNodeId ="492352";
    $select = "プログラミング";
    
  }
  if($browseNodeId=="business"){
    $browseNodeId ="554210";
     $select = "ビジネス";
   
  }
  if($browseNodeId=="money"){
    $browseNodeId ="492054";
     $select = "金融・税";
  }
  if($browseNodeId=="sisou"){
    $browseNodeId ="571582";
     $select = "思想";
  }
  if($browseNodeId=="manga"){
    $browseNodeId ="2501045051";
     $select = "漫画";
  }
  if($browseNodeId=="baby"){
    $browseNodeId ="492392";
     $select = "幼児教育";
  }

}



/* Copyright 2018 Amazon.com, Inc. or its affiliates. All Rights Reserved. */
/* Licensed under the Apache License, Version 2.0. */

// Put your Secret Key in place of **********
$serviceName="ProductAdvertisingAPI";
$region="us-west-2";
$accessKey="**********";
$secretKey="**********";





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
    $view .= '<a href="'.$tmp["url"].'" target="_blank" rel="noopener noreferrer">'.$tmp["title"].'</a>';
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

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>G's　PHP課題　ブックマークサイト</title>
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/index.css" rel="stylesheet">
    <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
    <nav class="navbar navbar-default flex">
        
            <div class="top"><a class="navbar-brand" href="index.php">読んだ本/読みたい本の備忘録サイト</a></div>
            <div class="sp flex2">            
                <div class="navbar-header"><a class="navbar-brand" href="select.php">読んだ本リスト</a></div>
                <div class="navbar-header2"><a class="navbar-brand" href="select2.php">読みたい本リスト</a></div>
            </div>
        
    </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<div class="flex1">

    <div class="memo">
        <form method="POST" action="insert.php">
            <div class="jumbotron">
                <fieldset>
                    <h2>【読んだ本の感想/備忘録】</h2>
                    <label>書籍名　：<input type="text" name="book_name"></label><br>
                    <label>書籍URL：<input type="text" name="book_url"></label><br>
                    <div class="comment">
                        <label>書籍コメント
                            <textArea name="comment" rows="5" cols="55"></textArea></label>
                    </div>
                    <div class="flex">
                        <p>おすすめ度</p>                      
                        <div class="star-rating">
                            <input type="radio" name="rating" value="★"><i></i>
                            <input type="radio" name="rating" value="★★"><i></i>
                            <input type="radio" name="rating" value="★★★"><i></i>
                            <input type="radio" name="rating" value="★★★★"><i></i>
                            <input type="radio" name="rating" value="★★★★★"><i></i>
                        </div>                      
                    </div>
                    <div class="submit">
                        <input type="submit" value="送信">
                    </div>
                </fieldset>
            </div>
        </form>
    </div>


    <div class="memo">
        <form method="POST" action="want_insert.php">
            <div class="jumbotron">
                <fieldset>
                    <h2>【読みたい本の備忘録】</h2>
                    <label>書籍名　：<input type="text" name="want_name"></label><br>
                    <label>書籍URL：<input type="text" name="want_url"></label><br>
                    <div class="comment">
                        <label>書籍コメント<textArea name="want_com" rows="5" cols="55"></textArea></label><br>
                    </div>
                    <div class="flex">
                        <p>優先度</p>
                    
                        <div class="star-rating">
                            <input type="radio" name="rating2" value="★"><i></i>
                            <input type="radio" name="rating2" value="★★"><i></i>
                            <input type="radio" name="rating2" value="★★★"><i></i>
                            <input type="radio" name="rating2" value="★★★★"><i></i>
                            <input type="radio" name="rating2" value="★★★★★"><i></i>
                        </div>
                    </div>
                    <div class="submit">
                        <input type="submit" value="送信">
                    </div>
                </fieldset>
            </div>
        </form>
    </div>
</div>


<div>
    <h2 id="ranking">【Amazon 　現在の「<?=$select?>」本のトップ10】</h2>
    <div class="book_select">
        <form action="index.php?#ranking" method="post">
            <div class="flex select">
                <select name="type">
                    <option value="programing" selected>プログラミング</option>            
                    <option value="business">ビジネス</option>
                    <option value="money">金融・税</option>            
                    <option value="sisou">思想</option>
                    <option value="manga">漫画</option>
                    <option value="baby">幼児教育</option>
                </select>
                <input type="submit" value="切り換え">
            </div>    
        </form>
    </div>
</div>


<div class="amazon"><?=$view?></div> 
<!-- Main[End] -->
<footer>created by pojico18 of G'sACADEMIY UNIT_SAPPORO_DEV1</footer>

</body>
</html>



