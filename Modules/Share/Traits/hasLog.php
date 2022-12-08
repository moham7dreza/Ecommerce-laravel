<?php

namespace Share\Traits;

trait hasLog
{
    public static function userActivityLog($model, $table = "users", $event = "created"): void
    {
        switch ($event) {
            case "created" :
                activity()->causedBy(auth()->id())->performedOn($model)->useLog($table)
                    ->withProperties([
                        'name' => $model->fullName,
                        'email' => $model->email,
                        'activation' => $model->activation == 1 ? 'فعال' : 'غیر فعال',
                        'user_type' => $model->user_type == 1 ? 'ادمین' : 'کاربر',
                        'email_verified' => is_null($model->email_verified_at) ? 'تایید شده' : 'تایید نشده',
                    ])->log(" کاربری با نام " . $model->fullName . " ایجاد شد ");
                break;
            case "updated" :
                activity()->causedBy(auth()->id())->performedOn($model)->useLog($table)
                    ->withProperties([
                        'name' => $model->fullName,
                        'email' => $model->email,
                        'activation' => $model->activation == 1 ? 'فعال' : 'غیر فعال',
                        'user_type' => $model->user_type == 1 ? 'ادمین' : 'کاربر',
                        'email_verified' => !is_null($model->email_verified_at) ? 'تایید شده' : 'تایید نشده',
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

    public static function productActivityLog($model, $table = "products", $event = "created"): void
    {
        switch ($event) {
            case "created" :
                activity()->causedBy(auth()->id())->performedOn($model)->useLog($table)
                    ->withProperties([
                        'name' => $model->name,
                        'introduction' => strip_tags(str_replace(PHP_EOL, '<br/>', $model->introduction)),
                        'price' => priceFormat($model->price),
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
