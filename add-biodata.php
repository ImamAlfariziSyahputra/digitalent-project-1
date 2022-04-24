<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['email'])) :

?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
      /* @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap'); */
      @import url('https://fonts.googleapis.com/css2?family=Patrick+Hand&display=swap');

      * {
        font-family: 'Patrick Hand', cursive;
      }

      .bg-primary {
        background: linear-gradient(180deg, #374151 0%, #111827 100%) no-repeat;
      }
    </style>
  </head>

  <body>
    <div class="h-screen overflow-y-scroll bg-primary text-white">

      <?= require_once __DIR__ . '/layout/header.php' ?>

      <form action="./check/check-add-biodata.php" method="POST">
        <div class="w-6/12 flex flex-wrap items-center justify-center mx-auto space-y-6">
          <div class="w-full">
            <label for="nama" class="block text-2xl mb-2">Nama</label>
            <input type="text" id='nama' name='nama' class="w-full p-2 px-4 text-black rounded-md focus:outline-cyan-500 placeholder:text-sm" placeholder="Masukkan Nama">
          </div>
          <div class="w-full">
            <label for="alamat" class="block text-2xl mb-2">Alamat</label>
            <input type="text" id='alamat' name='alamat' class="w-full p-2 px-4 text-black rounded-md focus:outline-cyan-500 placeholder:text-sm" placeholder="Masukkan Alamat">
          </div>
          <div class="w-full">
            <label for="tempat_lahir" class="block text-2xl mb-2">Tempat Lahir</label>
            <input type="text" id='tempat_lahir' name='tempat_lahir' class="w-full p-2 px-4 text-black rounded-md focus:outline-cyan-500 placeholder:text-sm" placeholder="Masukkan Tempat Lahir">
          </div>
          <div class="w-full">
            <label for="gender" class="block text-2xl mb-2">Jenis Kelamin</label>
            <select name="gender" id="gender" class="w-full p-2 px-4 text-black rounded-md focus:outline-cyan-500 placeholder:text-sm">
              <option value="pria">Pria</option>
              <option value="wanita">Wanita</option>
            </select>
          </div>
          <div class="w-full">
            <label for="umur" class="block text-2xl mb-2">Umur</label>
            <input type="number" id='umur' name='umur' class="w-full p-2 px-4 text-black rounded-md focus:outline-cyan-500 placeholder:text-sm" placeholder="Masukkan umur">
          </div>
          <div class="w-6/12">
            <button class="border bg-blue-400 hover:bg-blue-300 w-full rounded-full border-none py-2 mb-3 font-bold" type='submit'>Submit</button>
          </div>
        </div>
      </form>

    </div>
  </body>

  </html>

<?php
else :
  header("Location: login.php"); //! if Unauthenticated, Redirect to "Login Page"
  exit();
endif;
?>