<?php
namespace frontend\assets;

use yii\helpers\Html;

class ApiToApp {

  public function getBookFormISBN($isbn = null) {
    $isbn = '9783785564561';
    $isbn = '9783551555557';
    $aryReturn = array();
    $aryReturn["ErrorNo"] = 0;
    $aryReturn["ErrorType"] = "";
    $aryReturn["values"] = array();
    $pageContent = file_get_contents("https://www.googleapis.com/books/v1/volumes?q=isbn:" . $isbn);
    if (empty($pageContent)) {
      $aryReturn["ErrorNo"] = 1;
      return $aryReturn;
    }

    $aryData = json_decode($pageContent, true);
    // echo Html::img('http://books.google.com/books/content?id=WsD0AwAAQBAJ&printsec=frontcover&img=1&zoom=1&source=gbs_api', $options = ["class" => "myimg"] );
    // var_dump($aryData['items'][0]['volumeInfo']["imageLinks"]["thumbnail"]);
    // exit;


    if (empty($aryData)) {
      $aryReturn["ErrorNo"] = 2;
      return $aryReturn;
    }

    if ($aryData['totalItems'] = 0) {
      $aryReturn["ErrorNo"] = 3;
      return $aryReturn;
    } else if ($aryData['totalItems'] > 1) {
      $aryReturn["ErrorNo"] = 4;
      return $aryReturn;
    } else {
        if(isset($aryData['items'][0]['volumeInfo']['title'])) {
            $aryReturn["values"]["title"] = $aryData['items'][0]['volumeInfo']['title'];
        } else {
            $aryReturn["values"]["title"] = null;
        }
        if(isset($aryData['items'][0]['volumeInfo']['description'])) {
            $aryReturn["values"]["description"] = $aryData['items'][0]['volumeInfo']['description'];
        } else {
            $aryReturn["values"]["description"] = null;
        }
        if(isset($aryData['items'][0]['volumeInfo']['industryIdentifiers'][1]["identifier"])) {
            $aryReturn["values"]["isbn"] = $aryData['items'][0]['volumeInfo']['industryIdentifiers'][1]["identifier"];
        } else {
            $aryReturn["values"]["isbn"] = null;
        }
        if(isset($aryData['items'][0]['volumeInfo']['authors'][0])) {
            $aryReturn["values"]["autor"] = $aryData['items'][0]['volumeInfo']['authors'][0];
        } else {
            $aryReturn["values"]["autor"] = null;
        }
        if(isset($aryData['items'][0]['volumeInfo']['pageCount'])) {
            $aryReturn["values"]["seitenzahl"] = $aryData['items'][0]['volumeInfo']['pageCount'];
        } else {
            $aryReturn["values"]["seitenzahl"] = null;
        }
        if(isset($aryData['items'][0]['volumeInfo']['categories'][0])) {
            $aryReturn["values"]["kategorie"] = $aryData['items'][0]['volumeInfo']['categories'][0];
        } else {
            $aryReturn["values"]["kategorie"] = null;
        }
        if(isset($aryData['items'][0]['volumeInfo']['categories'][0])) {
            $aryReturn["values"]["kategorie"] = $aryData['items'][0]['volumeInfo']['categories'][0];
        } else {
            $aryReturn["values"]["kategorie"] = null;
        }
        if(isset($aryData['items'][0]['volumeInfo']["imageLinks"]["thumbnail"])) {
            $aryReturn["values"]["imagelink"] = $aryData['items'][0]['volumeInfo']["imageLinks"]["thumbnail"];
        } else {
            $aryReturn["values"]["imagelink"] = null;
        }
        // var_dump( ["imageLinks"])
    //   $aryReturn["values"]["title"] = $aryData['items'][0]['volumeInfo']['title'];
    //   $aryReturn["values"]["description"] = $aryData['items'][0]['volumeInfo']['description'];
    //   $aryReturn["values"]["isbn"] = $aryData['items'][0]['volumeInfo']['industryIdentifiers'][1]["identifier"];
    //   $aryReturn["values"]["autor"] = $aryData['items'][0]['volumeInfo']['authors'][0];
    //   $aryReturn["values"]["seitenzahl"] = $aryData['items'][0]['volumeInfo']['pageCount'];
    //   $aryReturn["values"]["kategorie"] = $aryData['items'][0]['volumeInfo']['categories'][0];


      // $aryReturn["values"]["imagelink"] = $aryData['items'][0]['volumeInfo']['imageLinks']['thumbnail'];
      // var_dump($aryReturn);
      // exit;
      return $aryReturn;
    }

  }

}
// require_once (__DIR__.'/vendor/autoload.php');
// putenv('GOOGLE_APPLICATION_CREDENTIALS=' . __DIR__ . '/service-account.json');
// $client = new Google_Client();
// $client->useApplicationDefaultCredentials();
//
//  $client->setScopes(['https://www.googleapis.com/auth/books']);
//
// $service = new Google_Service_Books($client);
//
// $isbn = '978-3-7855-6456-1';
//
// //$optParams = array('filter' => 'free-ebooks');
// $optParams = array();
// $results = $service->volumes->listVolumes($isbn);
// var_dump($results);
// //$results = $service->volumes->listVolumes('Henry David Thoreau', $optParams);
// foreach ($results as $item) {
//   echo $item['volumeInfo']['title'], "<br /> \n";
// }
//
// echo "<br>";
// echo "<br>";
// echo "<br>";
// $page = file_get_contents("https://www.googleapis.com/books/v1/volumes?q=isbn:9783785564561");
//
// $data = json_decode($page, true);
//
//
// echo "Title = " . $data['items'][0]['volumeInfo']['title'];echo "<br>";
// echo "Authors = " . @implode(",", $data['items'][0]['volumeInfo']['authors']);echo "<br>";
// echo "Pagecount = " . $data['items'][0]['volumeInfo']['pageCount'];echo "<br>";
//
//
//
// //AIzaSyCoaeXLIS0Q39Y3Z9My1bB7O2Azi9doOLU  key
//
//
// //746060324927-k2octmeo8tacr5vjjv8bsoip5bf2cjjj.apps.googleusercontent.com   O auth Client ID
//  //  EVp5uYN9eH4vETxI6_ahjG8I  CLient Secret
//
//
//   /*$client = new Google_Client();
//
//
//             // Wir brauchen einen eigenen Http Client, weil sonst SSl-Fehler erzeugt wird.
//             // Verify = false verhindert eine SSL Prüfung in Guzzle Http.
//             $client->setHttpClient(new \GuzzleHttp\Client(array(
//                 'verify' => false,
//             )));
//
//             // Benutzt zur Identifikation unseren Service acccount
//             $client->useApplicationDefaultCredentials();
//
//             $client->setScopes(['https://www.googleapis.com/auth/spreadsheets']);*/
//
// //$client = new Google_Client();
// /*$client->setApplicationName("Client_Library_Examples");
// $client->setDeveloperKey("YOUR_APP_KEY");
//
// $service = new Google_Service_Books($client);
// $optParams = array('filter' => 'free-ebooks');
// $results = $service->volumes->listVolumes('Henry David Thoreau', $optParams);
//
// foreach ($results as $item) {
//   echo $item['volumeInfo']['title'], "<br /> \n";
// }*/
