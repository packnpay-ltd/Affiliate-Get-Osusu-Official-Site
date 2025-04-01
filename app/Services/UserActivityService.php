<?php

namespace App\Services;

use App\Models\UserActivity; // Assuming you have a UserActivity model

class UserActivityService
{
    /**
     * Log the user activity.
     *
     * @param string $activity
     * @return void
     */
    public static function logActivity(string $activity)
    {
        // Assuming you have a UserActivity model to store activity logs
        UserActivity::create([
            'user_id' => auth()->id(), // Store the user ID of the currently authenticated user
            'activity' => $activity,   // The activity description passed to this function
            'created_at' => now(),     // Set the timestamp for when the activity occurred
            'updated_at' => now(),     // Set the updated timestamp as well
        ]);
    }
}
