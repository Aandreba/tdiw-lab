<link rel="stylesheet" href="assets/signup.css">

<form action="/api/signup.php" method="post" class="signup">
    <input type="text" name="username" placeholder="Username" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <input type="text" name="address" maxlength="30" placeholder="Address" required>
    <input type="text" name="city" maxlength="30" placeholder="City" required>
    <input type="text" name="zip" maxlength="5" placeholder="Zip Code" pattern="\d{5}" required>
    <button type="submit">Sign up</button>
</form>
