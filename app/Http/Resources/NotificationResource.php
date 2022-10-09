<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class NotificationResource extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'message' => 'داده های مربوطه به اعلانات',
            'status' => 'success',
            'count' => count($this->collection),
            'data' => $this->collection->map(function ($notification) {
                return [
                    'notif_send_to' => $notification->notifiable_type::findOrFail($notification->notifiable_id)->fullName,
                    'notif_data' => $notification->data['message'],
                    'notif_created_date' => jalaliDate($notification->created_at),
                ];
            }),
        ];
    }
}
