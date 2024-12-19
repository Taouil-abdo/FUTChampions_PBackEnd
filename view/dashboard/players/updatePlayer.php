<?php
require "../../../app/Players.php";

$player = new Players();

if (isset($_GET['id'])) {
    $id=$_GET['id'];
    $selectedplayer = $player->getPlayerID($id);

    foreach($selectedplayer as $slctedplayer){
        $fullname=$slctedplayer['FullName'];
        $status=$slctedplayer['status'];
        $position=$slctedplayer['position'];
        $rating=$slctedplayer['rating'];
        $pace=$slctedplayer['pace'];
        $shooting=$slctedplayer['shooting'];
        $passing=$slctedplayer['passing'];
        $dribbling=$slctedplayer['dribbling'];
        $defending=$slctedplayer['defending'];
        $physical=$slctedplayer['physical'];
        $diving=$slctedplayer['diving'];
        $handling=$slctedplayer['handling'];
        $reflexes=$slctedplayer['reflexes'];
        $positioning=$slctedplayer['positioning'];
        $nationality_id=$slctedplayer['nationality_id'];
        $club_id=$slctedplayer['club_id'];
    }

    

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/f01941449c.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
            <div id="form-parent" class="mt-9 ">
                <div id="form-child">
                    <form id="form" enctype="multipart/form-data" method="POST" class="max-w-md mx-auto shadow-lg rounded-lg p-4 space-y-4"
                        style="background-color: rgb(100 100 100 / 72%);height: 35rem;overflow-y: scroll;">
                        <h2 class="text-2xl font-bold text-center text-gray-800 mb-4">Player Details</h2>
                        <div>
                            <label for="Fullname" class="block text-sm font-medium text-gray-700">Name</label>
                            <input type="text" id="Fullname" name="FullName" value="<?php echo $fullname ?>" placeholder="Lionel Messi"
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

                        <div class="grid grid grid-cols-2 gap-4">
                            <div>
                                <label for="flag" class="block text-sm font-medium text-gray-700">Flag</label>
                                <input type="file" id="flag" placeholder="flag" name="flag"
                                    class="w-full mt-1 p-2 border rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                <span id="errorFlag" class="hidden"></span>
                            </div>

                            <div>
                                <label for="clubLogo" class="block text-sm font-medium text-gray-700">clubLogo</label>
                                <input type="file" id="clubLogo" placeholder="clubLogo"
                                    class="w-full mt-1 p-2 border rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                <span id="errorclubLogo" class="hidden">error clubLogo</span>
                            </div>
                        </div>

                        <div>
                            <select name="formation_players" id="formation_players" class="w-full mt-1 p-2 border rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                <option value="F1">4-4-2</option>
                                <option value="F2">4-3-3</option>
                            </select>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label for="position" class="block text-sm font-medium text-gray-700">Position</label>
                                <select
                                    class="w-full mt-1 p-2 border rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                    name="position" id="position" value="<?php echo $position ?>">
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
                                <select name="status" value="<?php echo $status ?>" id="playersStatus"
                                    class="w-full mt-1 p-2 border rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                    <option value="<?php echo $status ?>">Select Player's Status</option>
                                    <option value="principal">principal</option>
                                    <option value="bench">bench</option>
                                </select>
                                <span id="errorPosition" class="hidden"></span>
                            </div>
                        </div>

                        <div>
                            <label for="nationality" class="block text-sm font-medium text-gray-700">Nationality</label>
                                                        
                            <input type="number" id="nationality_id" name="nationality_id"  placeholder="Argentina"
                                class="w-full mt-1 p-2 border rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                            <span id="errorNationality" class="hidden">errorNationality</span>
                        </div>

                        <div>
                            <label for="club" class="block text-sm font-medium text-gray-700">Club</label>
                            <input type="number" id="club" name="club_id" placeholder="Inter Miami"
                                class="w-full mt-1 p-2 border rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
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

                        <button type="submit" id="addbtn" name="submit"
                            class="w-full bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400">
                            add
                        </button>
                    </form>
                </div>
            </div>
    
</body>
</html>