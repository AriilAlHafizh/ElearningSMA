<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
  <link href="../css/login.css" rel="stylesheet">
  <style>
    /* Tambahkan style tambahan jika diperlukan */
  </style>
</head>

<body>
  <nav>
    <div class="logo">Elearning SMA Suzuran</div>
  </nav>
  <div class="wrapper">
    <form action="{{ route('login') }}" method="POST">
      @csrf 
      <h1>LOGIN</h1>

      <div class="input-box">
        <input type="email" name="email" placeholder="Email" required>
        <i class='bx bxs-user'></i>
      </div>
      <div class="input-box">
        <input type="password" name="password" placeholder="Password" required>
        <i class='bx bx-lock-alt'></i>
      </div>
      
      <button class="btn" type="submit">Login</button>
    </form>
  </div>
</body>

</html>