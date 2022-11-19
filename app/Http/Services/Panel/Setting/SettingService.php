<?php

namespace App\Http\Services\Panel\Setting;

use App\Models\Setting\Setting;
use Illuminate\Database\Eloquent\Builder;

class SettingService
{
    public function update($request, $id)
    {
        return $this->query()->where('id', $id)->update([
            'title' => $request->title,
            'keywords' => $request->keywords,
            'description' => $request->description,
            'logo' => $request->logo,
            'icon' => $request->icon
        ]);
    }

    private function query(): Builder
    {
        return Setting::query();
    }
}
