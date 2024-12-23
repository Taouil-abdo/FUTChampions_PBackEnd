<?php
require_once "../../../app/Controllers/NatioController.php";


$rows=NatioController::getNationalityData();
NatioController::deleteNationality();
NatioController::addNationality();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/f01941449c.js" crossorigin="anonymous"></script>
    <title>Nationalities</title>
</head>
<body>
    
<div class="flex h-screen bg-gray-100">

    <!-- sidebar -->
    <div class="hidden md:flex flex-col w-64 bg-gray-800">
        <div class="flex items-center justify-center h-16 bg-gray-900">
            <span class="text-white font-bold uppercase">FUT</span>
        </div>
        <div class="flex flex-col flex-1 overflow-y-auto">
            <nav class="flex-1 px-2 py-4 bg-gray-800">
                <a href="../dashboard.php" class="flex items-center px-4 py-2 text-gray-100 hover:bg-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    Dashboard
                </a>
                <a href="../players/Player.php" class="flex items-center px-4 py-2 mt-2 text-gray-100 hover:bg-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                    Players
                </a>
                <a href="#" class="flex items-center px-4 py-2 mt-2 text-gray-100 hover:bg-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                    Nationality
                </a>
                <a href="../clubs/Club.php" class="flex items-center px-4 py-2 mt-2 text-gray-100 hover:bg-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                    Club
                </a>
            </nav>
        </div>
    </div>

    <!-- Main content -->
    <div class="flex flex-col flex-1 overflow-y-auto">
        <div class="flex items-center justify-between h-16 bg-white border-b border-gray-200">
            <div class="flex items-center px-4">
                <button class="text-gray-500 focus:outline-none focus:text-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
                <input class="mx-4 w-full border rounded-md px-4 py-2" type="text" placeholder="Search">
            </div>
            <div class="flex items-center pr-4">

                <button
                    class="flex items-center text-gray-500 hover:text-gray-700 focus:outline-none focus:text-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 19l-7-7 7-7m5 14l7-7-7-7" />
                    </svg>
                </button>
            </div>
        </div>
        <div class="flex justify-evenly items-center "> 
          <div class="p-4">
            <h1 class="text-2xl font-bold">Welcome to my dashboard!</h1>
            <p class="mt-2 text-gray-600">This is an example dashboard using Tailwind CSS.</p>
          </div>

          <!-- button Ajouter player -->
          <div class="btnAjouter">
               <button id="btnAjouter" class="h-10 w-24 bg-blue-600 text-white rounded shadow-lg">add Nationality</button>
          </div>

        </div>
        
        <!-- tablue -->
        <div class="container mx-auto p-4">
        <!-- <div class="overflow-x-auto"> -->
            <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="py-2 px-4">Player_id</th>
                        <th class="py-2 px-4">Nationality</th>
                        <th class="py-2 px-4">flag_img</th>
                        <th class="py-2 px-4">Action</th>
                    </tr>
                </thead>
                <tbody>
                  <?php
                    if ($rows) {
                      foreach($rows as $row){
                  ?>
                    <tr class="border-b">
                        <td class="py-2 px-4"><?php echo $row['nationality_id']; ?></td>
                        <td class="py-2 px-4"><?php echo $row['nationality']; ?></td>
                        <td class="py-2 px-4"><img src="../../../app/uploads/players/natio/<?php echo $row['flag_img']?>" alt="flag"></td>
                        <td class="py-2 px-4">
                            <a href="UpdateNationality.php?nationality_id=<?php echo $row['nationality_id']; ?>" class="text-blue-500 hover:underline"><i class="fa-solid fa-pencil"></i></a> |
                            <a href="Nationality.php?id=<?php echo $row['nationality_id']; ?>" class="text-red-500 hover:underline"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php
                      }
                      } else {
                      echo "<tr><td colspan='8' class='py-2 px-4 text-center'>No data available</td></tr>";
                      }
                    ?>
            </tbody>
            </table>

        </div>
    <!-- </div> -->
    <!-- ///// form -->
    <div id="form-parent" class="mt-9">
                <div id="form-child">
                    <form id="form" method="POST" enctype="multipart/form-data" class="max-w-md mx-auto shadow-lg rounded-lg p-4 space-y-4"
                        style="background-color: rgb(100 100 100 / 72%);">
                        <h2 class="text-2xl font-bold text-center text-gray-800 mb-4">Nationality Details</h2>

                        <div>
                            <label for="Nationality" class="block text-sm font-medium text-gray-700">Nationality</label>
                            <input type="text" id="Nationality" placeholder="Nationality" name="Nationality"
                                class="w-full mt-1 p-2 border rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                            <span id="errorNationality" class="hidden">errorNationality</span>
                        </div>

                        <div class="relative w-full mb-8 border p-1 rounded-lg">
                            <label for="flag_img" class="block mb-3 text-sm font-medium text-gray-900">
                                 Image
                            </label>
                            <div class="flex items-center justify-center w-full">
                                <label for="flag_img"
                                    class="flex flex-col items-center justify-center w-full h-10 border-2 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 border-gray-300 hover:border-green-500 transition-colors">
                                    <p class="mb-2 text-sm text-gray-500">
                                        <span class="font-semibold">flag Image</span>
                                    </p>
                                    <input id="flag_img" type="file" name="flag_img" accept="image/*" class="hidden" />
                                </label>
                            </div>
                        </div>
                        <button type="submit" id="add" name="addNat"
                            class="w-full bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400">
                            add Nationality
                        </button>
                    </form>
                </div>
    </div>


</div>

</div>

<script>

 let btnAjouter = document.getElementById("btnAjouter");
 let formParent=document.getElementById("form-parent");

 btnAjouter.addEventListener("click",function(){
    formParent.classList.toggle("hidden");
 })

</script>
<script src="../asset/js2.js"></script>
</body>
</html>