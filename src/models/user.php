<?php

require_once __DIR__ . "/../connect.php";

class User {
    public int $id;
    public string $username;
    public string $email;
    public string $address;
    public string $city;
    public string $zipCode;

    static function SignIn(string $email, string $password): ?User {
        $result = pg_query_params(
            getConnection(),
            "SELECT * FROM users WHERE email = $1",
            [$email]
        );

        if (!$result) throw new Exception("Failed to sign in");
        $row = pg_fetch_assoc($result);
        if (!$row) return null;
        if (!password_verify($password, $row["password"])) throw new Exception("Invalid password");
        return User::fromArray($row);
    }

    static function SignUp(string $username, string $email, string $password, string $address, string $city, string $zipCode): int {
        $email = filter_var($email, FILTER_VALIDATE_EMAIL);
        $password = password_hash($password, PASSWORD_DEFAULT);
        $zipCode = filter_var($zipCode, FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => '/^\d{5}$/']]);

        $result = pg_query_params(
            getConnection(),
            "INSERT INTO users (username, email, password, address, city, zip_code) VALUES ($1, $2, $3, $4, $5, $6) RETURNING id",
            [$username, $email, $password, $address, $city, $zipCode]
        );

        if (!$result) throw new Exception("Failed to sign up");
        return (pg_fetch_array($result) ?? throw new Exception("Failed to sign up"))["id"];
    }

    private static function fromArray(array $row): User {
        $user = new User();
        $user->id = $row["id"];
        $user->username = $row["username"];
        $user->email = $row["email"];
        return $user;
    }
}
