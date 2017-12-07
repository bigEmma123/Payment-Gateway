<?php
require_once('./vendor/autoload.php');

$stripe = array(
  "secret_key"      => "sk_test_Nnlo1xVnBHa39R2kwiq4FbyH",
  "publishable_key" => "pk_test_o7mD3M7DNLIMd18emKglWjv9"
);

\Stripe\Stripe::setApiKey($stripe['sk_test_Nnlo1xVnBHa39R2kwiq4FbyH']);
?>
