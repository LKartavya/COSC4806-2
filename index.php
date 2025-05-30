<?php

require_once 'user.php';

$user = new User();
$users_list = $user->getAllUsers();

print_r($users_list);

?>