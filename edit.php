<?php
session_start();

require_once __DIR__ . '/db-config.php';

if (isset($_SESSION['id']) && isset($_SESSION['email'])) :

  $id = $_GET['id'];

  // Fetech user data based on id
  $result = mysqli_query($conn, "SELECT * FROM biodata WHERE id=$id");

  while ($row = mysqli_fetch_array($result)) {
    $nama = $row['nama'];
    $alamat = $row['alamat'];
    $tempat_lahir = $row['tempat_lahir'];
    $gender = $row['gender'];
    $umur = $row['umur'];
  }

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

      <header class="max-w-5xl mx-auto px-6 sm:px-12 lg:px-20 py-7">
        <div class="flex justify-between items-center">
          <!-- Menu Icon -->
          <!-- <MenuIcon
            class="md:!hidden !w-6 !h-6 transition text-secondary hover:!text-white hover:!cursor-pointer"
            onClick={() => setOpen(true)}
          /> -->

          <!-- Brand Logo -->
          <div class="w-2/12 flex items-center hover:cursor-pointer">
            <div class="bg-[#4B5563] text-center h-9 w-9 flex justify-center items-center shrink-0 mr-2 rounded">
              <h1 class="">E</h1>
            </div>
            <h1 class="text-lg"><?= $_SESSION['name'] ?></h1>
          </div>

          <!-- Nav -->
          <div class="hidden md:flex items-center justify-end w-10/12">
            <ul class="flex items-center space-x-6 md:space-x-6 lg:space-x-8 mr-5">
              <li class="transition hover:opacity-75">
                <a href="home.php">List Biodata</a>
              </li>
              <li class="transition hover:opacity-75">
                <a href="add.php">Tambah Biodata</a>
              </li>
              <li class="transition hover:opacity-75">
                <a href="logout.php">Logout</a>
              </li>
            </ul>

            <!-- Search Input -->
            <div class="flex items-center justify-between shrink-0 rounded-full bg-[#1F2937] py-2.5 px-5">
              <input type="text" class="bg-transparent focus:outline-none text-sm placeholder:opacity-70 w-full" placeholder="Search" />

              <img src='img/search.svg' class="inline-block !h-4 !w-4 hover:!cursor-pointer hover:!opacity-75" />
            </div>
          </div>

          <!-- Search Logo (Mobile) -->
          <!-- <img class="md:!hidden !h-6 !w-6 !text-secondary hover:!cursor-pointer transition hover:!text-white" /> -->

        </div>
      </header>

      <form action="check-edit.php" method="POST">
        <div class="w-6/12 flex flex-wrap items-center justify-center mx-auto space-y-6">
          <div class="hidden w-full">
            <label for="id" class="block text-2xl mb-2">id</label>
            <input type="text" id='id' name='id' value="<?= $id ?>" class="w-full p-2 px-4 text-black rounded-md focus:outline-cyan-500 placeholder:text-sm" placeholder="Masukkan id">
          </div>
          <div class="w-full">
            <label for="nama" class="block text-2xl mb-2">Nama</label>
            <input type="text" id='nama' name='nama' value="<?= $nama ?>" class="w-full p-2 px-4 text-black rounded-md focus:outline-cyan-500 placeholder:text-sm" placeholder="Masukkan Nama">
          </div>
          <div class="w-full">
            <label for="alamat" class="block text-2xl mb-2">Alamat</label>
            <input type="text" id='alamat' name='alamat' value="<?= $alamat ?>" class="w-full p-2 px-4 text-black rounded-md focus:outline-cyan-500 placeholder:text-sm" placeholder="Masukkan Alamat">
          </div>
          <div class="w-full">
            <label for="tempat_lahir" class="block text-2xl mb-2">Tempat Lahir</label>
            <input type="text" id='tempat_lahir' name='tempat_lahir' value="<?= $id ?>" class="w-full p-2 px-4 text-black rounded-md focus:outline-cyan-500 placeholder:text-sm" placeholder="Masukkan Tempat Lahir">
          </div>
          <div class="w-full">
            <label for="gender" class="block text-2xl mb-2">Jenis Kelamin</label>
            <select name="gender" value="<?= $id ?>" id="gender" class="w-full p-2 px-4 text-black rounded-md focus:outline-cyan-500 placeholder:text-sm">
              <option value="pria">Pria</option>
              <option value="wanita">Wanita</option>
            </select>
          </div>
          <div class="w-full">
            <label for="umur" class="block text-2xl mb-2">Umur</label>
            <input type="number" id='umur' name='umur' value="<?= $_GET['id'] ?>" class="w-full p-2 px-4 text-black rounded-md focus:outline-cyan-500 placeholder:text-sm" placeholder="Masukkan umur">
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