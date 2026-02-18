<?php

echo "Name: Juan Dela Cruz<br>";
echo "Today is: " . date("F d, Y");
?>

<?php
$username = "admin";
$role = "admin";
$loginAttempts = 2;

echo "Username: $username<br>";
echo "Role: $role<br>";
echo "Login Attempts: $loginAttempts<br><br>";

if ($loginAttempts < 3) {
    echo "Access allowed";
} else {
    echo "Access blocked";
}
?>

<?php
for ($i = 1; $i <= 3; $i++) {
    echo "Login attempt #$i<br>";
}
?>

<?php
$user = [
    "username" => "admin",
    "role" => "admin",
    "status" => "active"
];

echo "Username: " . $user["username"] . "<br>";
echo "Role: " . $user["role"] . "<br>";
echo "Status: " . $user["status"];
?>


<?php
$user = [
    "username" => "admin",
    "status" => "active"
];

if ($user["status"] === "active") {
    echo "User can login";
} else {
    echo "User is blocked";
}
?>


<?php
$users = [
    ["username" => "admin", "role" => "admin"],
    ["username" => "ana", "role" => "user"],
    ["username" => "ben", "role" => "user"]
];

foreach ($users as $user) {
    echo "User: " . $user["username"] . " (" . $user["role"] . ")<br>";
}
?>


<?php
$users = [
    ["username" => "admin", "role" => "admin"],
    ["username" => "ana", "role" => "user"],
    ["username" => "ben", "role" => "user"]
];

foreach ($users as $user) {
    if ($user["role"] === "admin") {
        echo "User: " . $user["username"] . " (ADMIN ACCESS)<br>";
    } else {
        echo "User: " . $user["username"] . " (USER)<br>";
    }
}
?>