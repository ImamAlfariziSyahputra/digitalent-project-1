<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['email'])) :

  require_once __DIR__ . '/db-config.php';

  $result = $conn->query("SELECT * FROM biodata ORDER BY id DESC");

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

      <div class="max-w-3xl mx-auto">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
          <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
              <tr>
                <th scope="col" class="px-6 py-3">
                  Nama
                </th>
                <th scope="col" class="px-6 py-3">
                  Alamat
                </th>
                <th scope="col" class="px-6 py-3">
                  Tempat Lahir
                </th>
                <th scope="col" class="px-6 py-3">
                  Gender
                </th>
                <th scope="col" class="px-6 py-3">
                  Umur
                </th>
                <!-- <th scope="col" class="px-6 py-3">
                  Action
                </th> -->
                <!-- <th scope="col" class="px-6 py-3">
                  <span class="sr-only">Edit</span>
                </th> -->
              </tr>
            </thead>
            <tbody>

              <?php while ($row = $result->fetch_assoc()) : ?>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                  <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                    <?= $row['nama'] ?>
                  </th>
                  <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                    <?= $row['alamat'] ?>
                  </th>
                  <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                    <?= $row['tempat_lahir'] ?>
                  </th>
                  <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                    <?= $row['gender'] == 'pria' ? 'Pria' : 'Wanita' ?>
                  </th>
                  <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                    <?= $row['umur'] ?> tahun
                  </th>
                  <!-- <td class="px-6 py-4 text-right">
                  <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                </td> -->
                </tr>
              <?php endwhile; ?>

            </tbody>
          </table>
        </div>
      </div>

    </div>
  </body>

  </html>

<?php
else :
  header("Location: login.php"); //! if Unauthenticated, Redirect to "Login Page"
  exit();
endif;
?>