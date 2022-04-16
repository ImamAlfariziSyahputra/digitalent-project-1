<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['email'])) :
  header("Location: home.php"); //! if Authenticated, Redirect to "Home Page"
  exit();
else :
?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan VSGA 1</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

      * {
        font-family: 'Poppins', sans-serif;
      }

      .bg-img {
        background-image: url('./img/bg.jpg');
        background-repeat: no-repeat;
        background-size: cover;
      }

      .h-calc {
        height: calc(100vh - 2px);
      }
    </style>
  </head>

  <body>

    <!-- absolute top-0 left-0 w-full mx-auto -->
    <div class="flex min-h-screen overflow-y-auto ">
      <!-- Left -->
      <div class="hidden md:block w-5/12 bg-img shrink-0">
        <div class="bg-black/40 h-full flex justify-center items-center">
          <img src="https://digitalent.kominfo.go.id/_next/image?url=%2Fassets%2Flogo%2Fplatform%2Fdts.svg&w=256&q=75" alt="" class='w-[450px] shrink-0'>
        </div>
        <!-- <h1 class="text-2xl font-bold">DigiTalent Logo</h1> -->
      </div>

      <!-- Right -->
      <div class="w-full md:w-7/12 bg-[#0063CC] text-white pb-10">

        <div class="flex flex-col items-center">
          <!-- 4 Image Logo -->
          <div class="flex space-x-7 mt-7 mb-16">
            <div>
              <img src="https://digitalent.kominfo.go.id/_next/image?url=%2Fassets%2Flogo%2Fplatform%2Fdts.svg&w=96&q=75" alt="" class='h-24 md:h-20 w-24 md:w-20'>
            </div>
            <div>
              <img src="https://digitalent.kominfo.go.id/_next/image?url=%2Fassets%2Flogo%2Fplatform%2Fsimonas.svg&w=256&q=75" alt="" class='h-24 md:h-20 w-24 md:w-20'>
            </div>
            <div>
              <img src="https://digitalent.kominfo.go.id/_next/image?url=%2Fassets%2Flogo%2Fplatform%2Fbeasiswa.svg&w=256&q=75" alt="" class='h-24 md:h-20 w-24 md:w-20'>
            </div>
            <div>
              <img src="https://digitalent.kominfo.go.id/_next/image?url=%2Fassets%2Flogo%2Fplatform%2Fdla.svg&w=256&q=75" alt="" class='h-24 md:h-20 w-24 md:w-20'>
            </div>
          </div>

          <!-- Welcome Title -->
          <div class="">
            <h1 class="text-4xl mb-9 font-bold">Selamat Datang</h1>
          </div>

          <!-- Forms -->
          <div class="w-7/12 md:w-6/12">
            <form action='check-login.php' method='POST' class="flex flex-col space-y-3">
              <div>
                <label for="email" class="block">E-mail</label>
                <input type="text" id='email' name='email' class="w-full p-2 px-4 text-black rounded-md focus:outline-cyan-500 placeholder:text-sm" placeholder="Masukkan Email">
              </div>
              <div>
                <label for="password" class="block">Password</label>
                <input type="password" id='password' name='password' class="w-full p-2 px-4 text-black rounded-md focus:outline-cyan-500 placeholder:text-sm" placeholder="Masukkan Password">
              </div>
              <?php if (isset($_GET['error'])) : ?>
                <div class="bg-[#ffd4d4] p-2 rounded text-center">
                  <span class="text-red-600"><?= $_GET['error'] ?></span>
                </div>
              <?php endif; ?>
              <div class="pt-3">
                <button class="border bg-blue-400 hover:bg-blue-300 w-full rounded-full border-none py-2 mb-3 font-bold" type='submit'>Masuk</button>
                <div>
                  <p class='text-center'>Belum punya akun? <span class="text-blue-300 hover:cursor-pointer">Buat Akun</span></p>
                </div>
              </div>
            </form>
          </div>
        </div>

      </div>
    </div>
  </body>

  </html>

<?php

endif;
?>