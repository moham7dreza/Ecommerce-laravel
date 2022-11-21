<?php

namespace App\Http\Services\Panel\Office;

use App\Models\ItCity\Office\Service;
use Illuminate\Database\Eloquent\Builder;

class serviceService
{
    public function store($request)
    {
        return $this->query()->create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'parent_id' => $request->parent_id,
            'status' => $request->status,
            'service_availability' => $request->service_availability,
            'category_id' => $request->category_id,
            'tags' => $request->tags,
            'warranty_time' => $request->warranty_time,
            'time_to_give_service' => $request->time_to_give_service,
            'image' => $request->image,
            'available_date' => $request->available_date,
        ]);
    }

    public function update($request, $id)
    {
        return $this->query()->where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
    }

    private function query(): Builder
    {
        return Service::query();
    }
}
