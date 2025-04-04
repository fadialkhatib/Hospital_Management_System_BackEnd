<?php
namespace App\Channels;

use App\Notifications\CacheNotification;
use App\Notifications\LowStockNotification;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Cache;

class CacheChannel
{
    public function send($notifiable, CacheNotification $notification)
    {
        if (!method_exists($notification, 'toCache')) {
            throw new \RuntimeException(
                'Notification is missing toCache method'
            );
        }

        $data = $notification->toCache($notifiable);
        
        $key = $this->getCacheKey($notifiable);
        
        $existing = Cache::get($key, []);
        
        // إضافة الإشعار الجديد في بداية المصفوفة
        array_unshift($existing, $data);
        
        // تحديد الحد الأقصى للإشعارات المحفوظة (100 مثالياً)
        $limited = array_slice($existing, 0, 100);
        
        Cache::put($key, $limited, now()->addHours(24));
    }

    protected function getCacheKey($notifiable)
    {
        return "user.{$notifiable->id}.notifications";
    }
}