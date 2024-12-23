<?php
require_once "../../../app/Controllers/PlayerController.php";
$rows=PlayerController::showPlayers();
$nationalites=PlayerController::getAllNationalities();
$Clubs=PlayerController::getAllClubs();
PlayerController::delete();
PlayerController::addNewPlayer();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/f01941449c.js" crossorigin="anonymous"></script>
    <title>Player</title>
</head>
<body>
    
<div class="flex h-screen bg-gray-100">

    <!-- sidebar -->
    <div class="hidden md:flex flex-col w-64 bg-gray-800">
        <div class="flex items-center justify-center h-16 bg-gray-900">
            <span class="text-white font-bold uppercase">Sidebar</span>
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
                <a href="#" class="flex items-center px-4 py-2 mt-2 text-gray-100 hover:bg-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                    Players
                </a>
                <a href="../nationalities/Nationality.php" class="flex items-center px-4 py-2 mt-2 text-gray-100 hover:bg-gray-700">
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
               <button id="btnAjouter" class="h-10 w-24 bg-blue-600 text-white rounded shadow-lg">Add Player</button>
          </div>

        </div>
    
        <!-- tablue -->
        <div class="container mx-auto p-4">
        <!-- <div class="overflow-x-auto"> -->
            <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="py-2 px-4">Player_id</th>
                        <th class="py-2 px-4">P_Name</th>
                        <th class="py-2 px-4">Position</th>
                        <th class="py-2 px-4">Status</th>
                        <th class="py-2 px-4">Nationality</th>
                        <th class="py-2 px-4">Club</th>
                        <th class="py-2 px-4">Rating</th>
                        <th class="py-2 px-4">Action</th>
                    </tr>
                </thead>
                <tbody>
                  <?php
                    if ($rows) {
                      foreach($rows as $row){
                  ?>
                    <tr class="border-b">
                    <td class="py-2 px-4"><img src="../../../app/uploads/players/<?php echo $row['player_img']?>" width="40px" alt="Player Image"></td>
                    <td class="py-2 px-4"><?= $row['fullName']; ?></td>
                        <td class="py-2 px-4"><?= $row['position']; ?></td>
                        <?php if($row['status'] == "principale"){ ?>
                            <td class="py-2 px-4"><span class="py-1 px-2 bg-green-600 rounded-lg text-white"><?= $row['status']; ?></span></td>
                        <?php } else { ?>
                            <td class="py-2 px-4"><span class="py-1 px-2 bg-red-600 rounded-lg text-white"><?= $row['status']; ?></span></td>
                        <?php } ?>
                        <td class="py-2 px-4"><?= $row['nationality']; ?></td>
                        <td class="py-2 px-4"><?= $row['clubName']; ?></td>
                        <td class="py-2 px-4"><?= $row['rating']; ?></td>

                        <td class="py-2 px-4">
                            <a href="updatePlayer.php?player_id=<?= $row['player_id']; ?>" class="text-blue-500 hover:underline"><i class="fa-solid fa-pencil"></i></a> |
                            <a href="Player.php?id=<?= $row['player_id']; ?>" onclick="return confirm('Are you sure you want to delete this player?')" class="text-red-500 hover:underline"><i class="fa-solid fa-trash"></i></a>
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
<!-- ////////////// form -->
    <div id="form-parent" class="mt-9 ">
                <div id="form-child">
                    <form id="form" enctype="multipart/form-data" method="POST" class="max-w-md mx-auto shadow-lg rounded-lg p-4 space-y-4"
                        style="background-color: rgb(100 100 100 / 72%);height: 35rem;overflow-y: scroll;">
                        <h2 class="text-2xl font-bold text-center text-gray-800 mb-4">Player Details</h2>

                        <div>
                            <label for="Fullname" class="block text-sm font-medium text-gray-700">Name</label>
                            <input type="text" id="Fullname" name="fullName" placeholder="Lionel Messi"
                                class="w-full mt-1 p-2 border rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                            <span id="errorFullname" class="hidden">errorFullname</span>
                        </div>

                        <div class="relative w-full mb-8 border p-1 rounded-lg">
                            <label for="profileImage" name="profile"class="block mb-3 text-sm font-medium text-gray-900">
                                Profile Image
                            </label>
                            <div class="flex items-center justify-center w-full">
                                <label for="profileImage"
                                    class="flex flex-col items-center justify-center w-full h-10 border-2 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 border-gray-300 hover:border-green-500 transition-colors">
                                    <p class="mb-2 text-sm text-gray-500">
                                        <span class="font-semibold">Profile Image</span>
                                    </p>
                                    <input id="profileImage" name="player_img" type="file" accept="image/*" class="hidden" />
                                </label>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label for="position" class="block text-sm font-medium text-gray-700">Position</label>
                                <select class="w-full mt-1 p-2 border rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                    name="position" id="position">
                                    <option value="Select Position">Select Position</option>
                                    <option value="GK">GK</option>
                                    <option value="LB">LB</option>
                                    <option value="RB">RB</option>
                                    <option value="LCB">LCB</option>
                                    <option value="RCB">RCB</option>
                                    <option value="LM">LM</option>
                                    <option value="RM">RM</option>
                                    <option value="RCM">RCM</option>
                                    <option value="LCM">LCM</option>
                                    <option value="LF">LF</option>
                                    <option value="RF">RF</option>
                                </select>
                                <span id="errorPosition" class="hidden"></span>
                            </div>

                            <div>
                                <label for="playersStatus" class="block text-sm font-medium text-gray-700">Player's
                                    Status</label>
                                <select name="status" id="playersStatus"
                                    class="w-full mt-1 p-2 border rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                    <option value="">Select Player's Status</option>
                                    <option value="principale">principale</option>
                                    <option value="bench">bench</option>
                                </select>
                                <span id="errorPosition" class="hidden"></span>
                            </div>
                        </div>

                        <div>
                            <label for="nationality" class="block text-sm font-medium text-gray-700">Nationality</label>
                                                        
                            <select name="nationality_id" id="nationality"
                                    class="w-full mt-1 p-2 border rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                    <option value="">Select</option>
                                  <?php foreach($nationalites as $nationality):?>
                                    <option value="<?= $nationality['nationality_id']?>"><?=$nationality['nationality']?></option>
                                  <?php endforeach ?>
                                </select>
                            <span id="errorNationality" class="hidden">errorNationality</span>
                        </div>

                        <div>
                            <label for="club" class="block text-sm font-medium text-gray-700">Club</label>
                            <select name="club_id" id="club"
                                    class="w-full mt-1 p-2 border rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                    <option value="">Select</option>
                                    <?php foreach($Clubs as $Club):?>
                                    <option value="<?= $Club['club_id']?>"><?=$Club['clubName']?></option>
                                    <?php endforeach ?>
                                </select>
                            <span id="errorClub" class="hidden">errorClub</span>
                        </div>

                        <div>
                            <label for="rating" class="block text-sm font-medium text-gray-700">Rating</label>
                            <input type="number" id="rating" name="rating" placeholder="93"
                                class="w-full mt-1 p-2 border rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                            <span id="errorRating" class="hidden">errorRating</span>
                        </div>
                        <!-- ////////// players statistique -->
                        <div id="playerStatistique" class="grid grid-cols-2 gap-4">

                            <div>
                                <label for="pace" class="block text-sm font-medium text-gray-700">Pace</label>
                                <input type="number" id="pace" name="pace" placeholder="85"
                                    class="w-full mt-1 p-2 border rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                <span id="errorPace" class="hidden">errorPace</span>
                            </div>
                            <div>
                                <label for="shooting" class="block text-sm font-medium text-gray-700">Shooting</label>
                                <input type="number" id="shooting" name="shooting" placeholder="92"
                                    class="w-full mt-1 p-2 border rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                <span id="errorShooting" class="hidden">errorShooting</span>
                            </div>
                            <div>
                                <label for="passing" class="block text-sm font-medium text-gray-700">Passing</label>
                                <input type="number" id="passing" name="passing" placeholder="91"
                                    class="w-full mt-1 p-2 border rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                <span id="errorPassing" class="hidden">errorPassing</span>
                            </div>
                            <div>
                                <label for="dribbling" class="block text-sm font-medium text-gray-700">Dribbling</label>
                                <input type="number" id="dribbling" name="dribbling" placeholder="95"
                                    class="w-full mt-1 p-2 border rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                <span id="errorDribbling" class="hidden">errorDribbling</span>
                            </div>
                            <div>
                                <label for="defending" class="block text-sm font-medium text-gray-700">Defending</label>
                                <input type="number" id="defending" name="defending" placeholder="35"
                                    class="w-full mt-1 p-2 border rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                <span id="errorDefending" class="hidden">errorDefending</span>
                            </div>
                            <div>
                                <label for="physical" class="block text-sm font-medium text-gray-700">Physical</label>
                                <input type="number" id="physical" name="physical" placeholder="65"
                                    class="w-full mt-1 p-2 border rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                <span id="errorPhysical" class="hidden">errorPhysical</span>
                            </div>
                        </div>
                        <!-- ////////// Goal statistique -->
                        <div id="goalStatistique" class="grid grid-cols-2 gap-4 hidden">

                            <div>
                                <label for="diving" class="block text-sm font-medium text-gray-700">diving</label>
                                <input type="number" id="diving" name="diving" placeholder="85"
                                    class="w-full mt-1 p-2 border rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                <span id="errorDiving" class="hidden">errorDiving</span>
                            </div>
                            <div>
                                <label for="handling" class="block text-sm font-medium text-gray-700">handling</label>
                                <input type="number" id="handling" name="handling" placeholder="92"
                                    class="w-full mt-1 p-2 border rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                <span id="errorHandling" class="hidden">errorHandling</span>
                            </div>
                            <div>
                                <label for="kicking" class="block text-sm font-medium text-gray-700">kicking</label>
                                <input type="number" id="kicking" name="kicking" placeholder="91"
                                    class="w-full mt-1 p-2 border rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                <span id="errorKicking" class="hidden">errorKicking</span>
                            </div>
                            <div>
                                <label for="reflexes" class="block text-sm font-medium text-gray-700">reflexes</label>
                                <input type="number" id="reflexes" name="reflexes" placeholder="95"
                                    class="w-full mt-1 p-2 border rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                <span id="errorReflexes" class="hidden">errorReflexes</span>
                            </div>
                            <div>
                                <label for="speed" class="block text-sm font-medium text-gray-700">speed</label>
                                <input type="number" id="speed" name="speed" placeholder="35"
                                    class="w-full mt-1 p-2 border rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                <span id="errorSpeed" class="hidden">errorSpeed</span>
                            </div>
                            <div>
                                <label for="positioning"
                                    class="block text-sm font-medium text-gray-700">Positioning</label>
                                <input type="number" id="positioning" name="positioning" placeholder="65"
                                    class="w-full mt-1 p-2 border rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                <span id="errorPositioning" class="hidden">errorPositioning</span>
                            </div>
                        </div>

                        <button id="addbtn" name="add"
                            class="w-full bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400">
                            add
                        </button>
                    </form>
                </div>
    </div>
            
</div>

</div>

<script>
 let position=document.getElementById("position");

 position.addEventListener("change", function (e) {
    e.preventDefault();
    if (position.value == "GK") {
        playerStatistique.classList.add("hidden");
        goalStatistique.classList.remove("hidden");

    } else {
        playerStatistique.classList.remove("hidden");
        goalStatistique.classList.add("hidden");

    }
});

  let btnAjouter = document.getElementById("btnAjouter");
 let formParent=document.getElementById("form-parent");

 btnAjouter.addEventListener("click",function(){
    formParent.classList.toggle("hidden");
 })
</script>
<!-- <script src="../../asset/script/js2.js"></script> -->
</body>
</html>