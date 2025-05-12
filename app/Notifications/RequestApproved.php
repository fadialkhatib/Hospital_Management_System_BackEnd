<?php

namespace App\Notifications;

use App\Models\Department_request;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Cache;
use App\Models\DepartmentRequest;
use Illuminate\Notifications\Messages\MailMessage;

class RequestApproved extends Notification implements ShouldQueue
{
    use Queueable;

    protected $request;
    protected $cacheExpiration;

    public function __construct(Department_request $request)
    {
        $this->request = $request;
        $this->cacheExpiration = now()->addHours(2);
    }

    public function via($notifiable)
    {
        return ['mail']; // إضافة البريد الإلكتروني إذا لزم الأمر
    }



    public function toMail($notifiable)
    {
        $cacheKey = "status_mail_{$this->request->id}_dept_{$this->request->department_id}";

        return Cache::remember($cacheKey, $this->cacheExpiration, function () {
            return (new MailMessage)
                ->subject('تحديث حالة طلب المواد - ' . $this->request->department->name)
                ->line($this->generateStatusMessage())
                ->line('تفاصيل الطلب:')
                ->line('- القسم: ' . $this->request->department->name)
                ->line('- الحالة: ' . $this->request->status)
                ->line('- تاريخ التحديث: ' . now()->toDateTimeString());
        });
    }

    protected function generateStatusMessage()
    {
        $messages = [
            'approved' => "تمت الموافقة على طلب المواد للقسم {$this->request->department->name}",
            'rejected' => "تم رفض طلب المواد للقسم {$this->request->department->name}",
            'partially_approved' => "تمت الموافقة جزئياً على طلب المواد للقسم {$this->request->department->name}"
        ];

        return $messages[$this->request->status] ?? "تم تحديث حالة طلب المواد للقسم {$this->request->department->name}";
    }
}
