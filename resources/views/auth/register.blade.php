<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Toko Dean</title>
</head>
<body>
    <form method="POST">
        @csrf
        <label for="name">Name</label>
        <input type="text" name="name" required />
        <label for="username">Username</label>
        <input type="text" name="username" required />
        <label for="email">Email</label>
        <input type="email" name="email" required />
        <label for="password">Password</label>
        <input type="password" name="password" required />
        <button type="submit">Submit</button>
    </form>
</body>
</html>