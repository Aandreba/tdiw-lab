<?php

require_once __DIR__ . "/../connect.php";

class User {
    public int $id;
    public string $username;
    public string $email;

    static function SignIn(string $username, string $password): ?User {
        $result = pg_query_params(
            getConnection(),
            "SELECT * FROM users WHERE username = $1",
            [$username]
        );

        if (!$result) throw new Exception("Failed to sign in");
        $row = pg_fetch_assoc($result);
        if (!$row) return null;
        if (!password_verify($password, $row["password"])) throw new Exception("Invalid password");
        return User::fromArray($row);
    }

    static function SignUp(string $username, string $email, string $password): User {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $result = pg_query_params(
            getConnection(),
            "INSERT INTO users (username, email, password) VALUES ($1, $2, $3) RETURNING id, username, email",
            [$username, $email, $password]
        );

        if (!$result) throw new Exception("Failed to sign up");
        return pg_fetch_object($result, null, User::class) ?? throw new Exception("Failed to sign up");
    }

    private static function fromArray(array $row): User {
        $user = new User();
        $user->id = $row["id"];
        $user->username = $row["username"];
        $user->email = $row["email"];
        return $user;
    }
}
