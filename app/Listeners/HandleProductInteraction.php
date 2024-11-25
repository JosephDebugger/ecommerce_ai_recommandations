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
        $command = escapeshellcmd("python /PyScripts/recommendation_script.py $userId $productId $action");
        $output = shell_exec($command); // Execute the script
        if ($output === null) {
            Log::error("Python script failed to execute. No output received.");
        } else {
            Log::info("Python script executed successfully. Output: " . $output);
        }
    }
}
