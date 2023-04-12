<?php
require('stripe-php-master/init.php');

$publishableKey="pk_test_51K3QJqLKYYu4hg3lJ3IwR8Q8fk8pZ1rI6Vj4U8YV0x18lAZ6WtpAdzurPeHIhxuWcpqfwxHfOjfehI0t3mkIJObL00cefGAKHv";

$secretKey="sk_test_51K3QJqLKYYu4hg3lFzAcEj8H6ldeeo6UN6Gtm1hKkxlMPFhi6dsvf8jrPTiQViT8kFcrDmQsWG5EWzygVnh5A9XO00LO7DxcHU";

\Stripe\Stripe::setApiKey($secretKey);
?>
