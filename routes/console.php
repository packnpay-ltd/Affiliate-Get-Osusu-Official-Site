<?php


use App\Models\InstallmentPlan;
use App\Notifications\PaymentDueNotification;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;

Artisan::command('notify:installments', function () {
    $today = now();
    $this->info('Starting notification for installment plans due within the next 14 days.');
    Log::info('Starting notification for installment plans due within the next 14 days.');

    $plans = InstallmentPlan::where('due_date', '>=', $today)
        ->where('due_date', '<=', $today->copy()->addDays(14)) // Fetch plans within 14 days
        ->get();

    if ($plans->isEmpty()) {
        $this->info('No installment plans found for the specified due date range.');
        Log::info('No installment plans found for the specified due date range.');
        return;
    }

    foreach ($plans as $plan) {
        try {
            $daysToDue = $plan->due_date->diffInDays($today);

            $message = match ($daysToDue) {
                14 => "Reminder: Your next payment is due in 2 weeks.",
                7 => "Reminder: Your next payment is due in 1 week.",
                1 => "Reminder: Your next payment is due tomorrow.",
                0 => "Reminder: Your payment is due today.",
                default => null
            };

            if ($message) {
                $user = $plan->transaction->user; // Assuming Transaction has a user relationship
                Notification::send($user, new PaymentDueNotification($message));
                $this->info("Notification sent to user ID {$user->id} for plan ID {$plan->id}: {$message}");
                Log::info("Notification sent to user ID {$user->id} for plan ID {$plan->id}: {$message}");
            }
        } catch (\Exception $e) {
            $this->error("Error sending notification for plan ID {$plan->id}: " . $e->getMessage());
            Log::error("Error sending notification for plan ID {$plan->id}: " . $e->getMessage());
        }
    }

    $this->info('Finished processing installment plan notifications.');
    Log::info('Finished processing installment plan notifications.');
})->describe('Send payment due reminders to users');
