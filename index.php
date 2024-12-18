<?php 




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="asset/style.css">
    <script src="https://kit.fontawesome.com/f01941449c.js" crossorigin="anonymous"></script>
</head>

<body>

    <nav class="bg-black p-4">
        <div class="container mx-auto flex flex-col lg:flex-row justify-between items-center">
            <div class="text-white font-bold text-3xl mb-4 lg:mb-0 hover:text-orange-600 hover:cursor-pointer">
                FUT_Champion
            </div>

            <div class="lg:hidden">
                <button class="text-white focus:outline-none">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M4 6h16M4 12h16m-7 6h7">
                        </path>
                    </svg>
                </button>
            </div>
        </div>
    </nav>


    <main>
        <div class="ml-8" style="margin-top: 26px;">
            <p class="text-gray-200">Home <b> > </b> EA FC 25 Tactics & Formations</p>
            <p class="text-2xl text-gray-400 font-bold">EA FC 25 Tactics & Formations</p>
            <p class="text-gray-200">Build Custom Tactics & Formations</p>
        </div>

        <div id="dd"
            class="sm:flex gap-4 item-center md:flex justify-center item-center lg:flex justify-center item-center">

            <div id="formation_change_div" class="flex-col">
                <div id="playesFormation">
                    <!-- /* goalkeeper */ -->
                    <div id="player" class="player goalkeeper img flex-col justify-centent item-center">
                    </div>
                    <!-- /* defense */ -->
                    <div id="player1" class="player lb flex-col justify-centent item-center">
                        
                    </div>
                    <div id="player2" class="player lcb flex-col justify-centent item-center">
                       </div>
                    <div id="player3" class="player rcb flex-col justify-centent item-center">
                        </div>
                    <div id="player4" class="player rb flex-col justify-centent item-center">
                        </div>
                    <!-- /* center */ -->
                    <div id="player5" class="player lm flex-col justify-centent item-center">
                       </div>
                    <div id="player6" class="player lcm flex-col justify-centent item-center">
                       </div>
                    <div id="player7" class="player rcm flex-col justify-centent item-center">
                       </div>
                    <div id="player8" class="player rm flex-col justify-centent item-center">
                       </div>
                    <!-- attack -->
                    <div id="player9" class="player lf flex-col justify-centent item-center">
                        </div>
                    <div id="player10" class="player rf flex-col justify-centent item-center">
                       </div>
                </div>
                <!-- changement -->
                <div class="changementParent flex-col justify-centent item-center rounded-lg shadow-lg">
                    <p class="text-2xl text-white font-bold ml-7 border ">changement</p>
                    <div id="benchs" style="display:flex; flex-wrap: wrap;">
                        <div id="bench_players" class="flex-col justify-centent item-center">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="">

    </script>


    </body>
    </html>
