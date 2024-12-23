<?php
require_once "../../../app/Controllers/ClubController.php";

$club = ClubController::getClubByID();
ClubController::updateClub(); 

?> 



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/f01941449c.js" crossorigin="anonymous"></script>
    <title>Update club</title>
</head>
<body>

            <div id="form-parent" class="mt-9">
                <div id="form-child">
                    <form id="form" method="POST" enctype="multipart/form-data" class="max-w-md mx-auto shadow-lg rounded-lg p-4 space-y-4"
                        style="background-color: rgb(100 100 100 / 72%);">
                        <h2 class="text-2xl font-bold text-center text-gray-800 mb-4">club Details</h2>

                        <div>
                            <label for="clubName" class="block text-sm font-medium text-gray-700">clubName</label>
                            <input type="text" id="clubName" placeholder="RCA" name="clubName" value="<?= $club['clubName'] ?>"
                                class="w-full mt-1 p-2 border rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                            <span id="errorclubName" class="hidden">errorclubName</span>
                        </div>

                        <div class="relative w-full mb-8 border p-1 rounded-lg">
                            <label for="club_img" class="block mb-3 text-sm font-medium text-gray-900">
                            club Image
                            </label>
                            <div class="flex items-center justify-center w-full">
                                <label for="club_img"
                                    class="flex flex-col items-center justify-center w-full h-10 border-2 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 border-gray-300 hover:border-green-500 transition-colors">
                                    <p class="mb-2 text-sm text-gray-500">
                                        <span class="font-semibold">club Image</span>
                                    </p>
                                    <input id="club_img" type="file" name="club_img" accept="image/*" class="hidden" />
                                </label>
                            </div>
                        </div>
                        <button type="submit" id="update" name="update"
                            class="w-full bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400">
                            update Club
                        </button>
                    </form>
                </div>
            </div>


</body>
</html>