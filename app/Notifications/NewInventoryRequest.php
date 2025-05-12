<?php

namespace App\Notifications;

use App\Models\Department_request;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Cache\Repository;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NewInventoryRequest extends Notification
{


    protected $request;
    protected $cache;




    public function __construct(Department_request $request, Repository $cache)
    {
        $this->request = $request;
        $this->cache = $cache;
    }

    public function via($notifiable)
    {
        return ['database'];
    }



    public function toDatabase($notifiable)
    {
        $cacheKey = "request_notification_{$this->request->id}_database";

        return $this->cache->remember($cacheKey, now()->addHours(1), function () {
            return [
                'request_id' => $this->request->id,
                'department' => $this->request->department->name,
                'message' => 'طلب مواد جديد من ' . $this->request->department->name,
                'created_at' => now()->toDateTimeString(),
            ];
        });
    }
}
