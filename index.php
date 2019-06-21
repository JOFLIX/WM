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
          'Name' => "Joflix."
        ],
        'To' => [
          [
            'Email' => "passenger1@example.com",
            'Name' => "passenger 1"
          ]
        ],
        'TemplateID' => 883447,
        'TemplateLanguage' => true,
        'Subject' => "[[data:firstname:""]]",
        'Variables' => json_decode('{}', true)
      ]
    ]
  ];
  $response = $mj->post(Resources::$Email, ['body' => $body]);
  $response->success() && var_dump($response->getData());
?>
