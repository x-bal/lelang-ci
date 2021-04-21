<?php

// $config = array(
//   'protocol' => 'smtp',
//   'smtp_host' => 'smtp.mailtrap.io',
//   'smtp_port' => 2525,
//   'smtp_user' => 'bad5f218719204',
//   'smtp_pass' => '5c9e04dcac183f',
//   'crlf' => "\r\n",
//   'newline' => "\r\n"
// );

$config = [
  'mailtype'  => 'html',
  'charset'   => 'utf-8',
  'protocol'  => 'smtp',
  'smtp_host' => 'smtp.gmail.com',
  'smtp_user' => '',  // Email gmail
  'smtp_pass'   => '.',  // Password gmail
  'smtp_crypto' => 'ssl',
  'smtp_port'   => 465,
  'crlf'    => "\r\n",
  'newline' => "\r\n"
];
