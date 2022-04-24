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
          <a href="biodata.php">List Biodata</a>
        </li>
        <li class="transition hover:opacity-75">
          <a href="add-biodata.php">Tambah Biodata</a>
        </li>
        <li class="transition hover:opacity-75">
          <a href="buku.php">List Buku</a>
        </li>
        <li class="transition hover:opacity-75">
          <a href="add-buku.php">Tambah Buku</a>
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