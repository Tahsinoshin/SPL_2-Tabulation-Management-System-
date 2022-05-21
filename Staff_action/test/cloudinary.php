<?php

use Cloudinary\Api\Upload\UploadApi;
use Cloudinary\Configuration\Configuration;
require 'D:\xampp\composer\vendor\autoload.php';

$cloudinary = new Cloudinary([
    'cloud' => [
      'cloud_name' => 'dgesnkaeo',
      'api_key'  => '319421654858234',
      'api_secret' => 'c3ohMVgzCk1Wif-nrdF4F534_Rg',
    'url' => [
      'secure' => true]]]);

      (new UploadApi())->upload('student-sheet.xlsx')
  

?>