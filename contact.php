<?php
  /*
  This call sends a message to the given recipient with vars and custom vars.
  */
  require 'vendor/autoload.php';
  use MailjetResources;
  $mj = new MailjetClient(getenv('MJ_APIKEY_PUBLIC'), getenv('MJ_APIKEY_PRIVATE'),true,['version' => 'v3.1']);
  $body = [
    'Messages' => [
      [
        'From' => [
          'Email' => "joflixooko@outlook.com",
          'Name' => "Ooko"
        ],
        'To' => [
          [
            'Email' => "passenger1@example.com",
            'Name' => "passenger 1"
          ]
        ],
        'TemplateID' => 883477,
        'TemplateLanguage' => true,
        'Subject' => "Joflix",
        'Variables' => json_decode('{}', true)
      ]
    ]
  ];
  $response = $mj->post(Resources::$Email, ['body' => $body]);
  $response->success() && var_dump($response->getData());
?>


<?php
<!-- //Defining the variables -->
$doctorErr= $DateErr= $emailErr= $adress1Err= $cityErr="";
$zipErr= $stateErr= $checkmeoutErr= $makeappointmentErr="";

if ($_SERVER["REQUEST_METHOD"] == "POST"){
  if(empty($_POST["doctor"])){
    $doctorErr = "Choose doctor please!";
  }else{
    $doctor = test_input($_POST["doctor"]);
  }
  if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty($_POST["Date"])){
      $DateErr = "Choose date please!";
    }else{
      $Date = test_input($_POST["Date"]);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
      if(empty($_POST["email"])){
        $emailErr = "Enter email please!";
      }else{
        $email = test_input($_POST["email"]);
      }
      if ($_SERVER["REQUEST_METHOD"] == "POST"){
        if(empty($_POST["adress1"])){
          $adress1Err = "Enter adress please!";
        }else{
          $adress1 = test_input($_POST["adress1"]);
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
          if(empty($_POST["city"])){
            $cityErr = "Enter city please!";
          }else{
            $city = test_input($_POST["city"]);
          }
          if ($_SERVER["REQUEST_METHOD"] == "POST"){
            if(empty($_POST["zip"])){
              $zipErr = "Enter zip please!";
            }else{
              $zip = test_input($_POST["zip"]);
            }
            if ($_SERVER["REQUEST_METHOD"] == "POST"){
              if(empty($_POST["checkmeout"])){
                $checkmeoutErr = "Kindly click this if you want us to get back to you, please!";
              }else{
                $checkmeout = test_input($_POST["checkmeout"]);
              }

              if ($_SERVER["REQUEST_METHOD"] == "POST"){
                if(empty($_POST["makeappointment"])){
                  $makeappointmentErr = "KIndly click to book an appointment please!";
                }else{
                  $makeappointment = test_input($_POST["makeappointment"]);
                }

}
function test_input($data){
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
