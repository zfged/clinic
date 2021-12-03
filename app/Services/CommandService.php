<?php

    namespace App\Services;
    use App\Models\Command;

    class CommandService
    {
        public function getallCommand()
        {
         return Command::all();
        }
}