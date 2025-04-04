<?php
namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class CacheNotification extends Notification
{
    use Queueable;

    protected $message;

    public function __construct($message)
    {
        $this->message = $message;
    }

    public function via($notifiable)
    {
        return ['cache', 'mail']; // قنوات الإرسال
    }

    // public function toMail($notifiable)
    // {
    //     return (new MailMessage)
    //                 ->subject('تحذير: انخفاض في المخزون')
    //                 ->line('الكمية المتاحة من المنتج ' . $this->item->name . ' أقل من الحد الأدنى')
    //                 ->action('عرض المنتج', url('/items/'.$this->item->id))
    //                 ->line('شكراً لاستخدامك نظامنا');
    // }

    public function toCache($notifiable)
    {
        return [
            'id' => uniqid(), // معرف فريد للإشعار
            'message' => $this->message,
            'read_at' => null, // تاريخ القراءة
            'created_at' => now()->toDateTimeString(),
            'user_id' => $notifiable->id,
            'type' => static::class
        ];
    }
}