<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['email'])) :

  require_once __DIR__ . '/db-config.php';

  $sql = "SELECT * FROM biodata ORDER BY id DESC";
  $statement = $connection->prepare($sql);
  $statement->execute();

  $customers = $statement->fetchAll();

  // var_dump($customers);
  // exit();

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

      <div class="max-w-4xl px-3 mx-auto">
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
                <th scope="col" class="px-6 py-3">
                  <span class="sr-only">Edit</span>
                </th>
              </tr>
            </thead>
            <tbody>

              <?php foreach ($customers as $customer) : ?>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                  <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                    <?= $customer['nama'] ?>
                  </th>
                  <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                    <?= $customer['alamat'] ?>
                  </th>
                  <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                    <?= $customer['tempat_lahir'] ?>
                  </th>
                  <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                    <?= $customer['gender'] == 'pria' ? 'Pria' : 'Wanita' ?>
                  </th>
                  <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                    <?= $customer['umur'] ?> tahun
                  </th>
                  <td class="px-6 py-4 text-right">
                    <a onclick="return confirm('Apakah yakin data akan di hapus?')" href="./check/check-delete-biodata.php?id=<?= $customer['id'] ?>" class="bg-red-600 hover:bg-red-700 py-1.5 px-2.5 rounded font-medium text-white">Delete</a> -
                    <a href="edit-biodata.php?id=<?= $customer['id'] ?>" class="bg-blue-600 hover:bg-blue-700 py-1.5 px-2.5 rounded font-medium text-white">Edit</a>
                  </td>
                </tr>
              <?php endforeach; ?>

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