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

      <form action="./check/check-add-buku.php" method="POST">
        <div class="w-6/12 flex flex-wrap items-center justify-center mx-auto space-y-6">
          <div class="w-full">
            <label for="judul" class="block text-2xl mb-2">Judul Buku</label>
            <input type="text" id='judul' name='judul' class="w-full p-2 px-4 text-black rounded-md focus:outline-cyan-500 placeholder:text-sm" placeholder="Masukkan Judul Buku">
          </div>
          <div class="w-full">
            <label for="kategori" class="block text-2xl mb-2">Kategori</label>
            <input type="text" id='kategori' name='kategori' class="w-full p-2 px-4 text-black rounded-md focus:outline-cyan-500 placeholder:text-sm" placeholder="Masukkan Kategori">
          </div>
          <div class="w-full">
            <label for="pengarang" class="block text-2xl mb-2">Pengarang</label>
            <input type="text" id='pengarang' name='pengarang' class="w-full p-2 px-4 text-black rounded-md focus:outline-cyan-500 placeholder:text-sm" placeholder="Masukkan Pengrang">
          </div>
          <div class="w-full">
            <label for="penerbit" class="block text-2xl mb-2">Penerbit</label>
            <select name="penerbit" id="penerbit" class="w-full p-2 px-4 text-black rounded-md focus:outline-cyan-500 placeholder:text-sm">
              <option value="Media Baca">Media Baca</option>
              <option value="Media Kita">Media Kita</option>
              <option value="Media Cipta">Media Cipta</option>
              <option value="Graha">Graha</option>
            </select>
          </div>
          <div class="w-full">
            <div>
              <label class="block text-2xl mb-2">Status</label>
              <div class="form-check">
                <input class="form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="radio" name="status" id="tersedia" value="Tersedia">
                <label class="form-check-label inline-block text-white" for="tersedia">
                  Tersedia
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="radio" name="status" id="dipinjam" value="Dipinjam" checked>
                <label class="form-check-label inline-block text-white" for="dipinjam">
                  Dipinjam
                </label>
              </div>
            </div>
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