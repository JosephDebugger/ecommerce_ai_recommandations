<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\ProductInteracted;
use Illuminate\Support\Facades\Log;

class HandleProductInteraction
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
       //
    }

    /**
     * Handle the event.
     */
    public function handle(ProductInteracted $event): void
    {
        $userId = $event->userId;
        $productId = $event->productId;
        $action = $event->action;

        Log::info("User $userId performed $action on product $productId");
        $scriptPath = base_path('PyScripts\recommendation_script_real_time.py');
        $command = escapeshellcmd("C:/Python312/python.exe $scriptPath $userId $productId $action");
        $output = shell_exec($command . " 2>&1"); // Execute the script
        if ($output === null) {
            $errorMessage = "Python script failed to execute. No output received.";
            Log::error($errorMessage);
           // echo $errorMessage;
        } else {
            Log::info("Python script executed. Output/Error: " . $output);
            //echo $output;
        }
    }
}
