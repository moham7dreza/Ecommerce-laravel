<?php

namespace Modules\Share\Traits\Logs;

trait HasProductLog
{
    public static function activityLog($model, $table = "products", $event = "created"): void
    {
        switch ($event) {
            case "created" :
                activity()->causedBy(auth()->id())->performedOn($model)->useLog($table)
                    ->withProperties([
                        'name' => $model->name,
                        'introduction' => $model->introduction,
                        'price' => $model->price,
                        'status' => $model->status == 1 ? 'محصول فعال' : 'محصول غیر فعال',
                        'marketable' => $model->marketable == 1 ? 'محصول قابل فروش' : 'محصول غیر قابل فروش',
                        'brand' => $model->brand->originl_name . '-' . $model->brand->persian_name ?? 'برند ندارد',
                        'category' => $model->category->name ?? 'دسته بندی ندارد',
                        'created_at' => $model->getFaCreatedDate(),
                    ])->log(" محصول با نام " . $model->name . " ایجاد شد ");
                break;
            case "updated" :
                activity()->causedBy(auth()->id())->performedOn($model)->useLog($table)
                    ->withProperties([
                        'name' => $model->name,
                        'email' => $model->email
                    ])->log(" کاربری با نام " . $model->name . " ویرایش شد ");
                break;
            case "deleted" :
                activity()->causedBy(auth()->id())->performedOn($model)->useLog($table)
                    ->withProperties([
                        'name' => $model->name,
                        'email' => $model->email
                    ])->log(" کاربری با نام " . $model->name . " حذف شد ");
                break;
        }
    }
}
