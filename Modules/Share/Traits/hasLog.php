<?php

namespace Share\Traits;

trait hasLog
{
    public  static  function activityLog($model , $table = "users" , $event = "created"): void
    {
        switch ($event){
            case "created" :
                activity()->causedBy(auth()->id())->performedOn($model)->useLog($table)
                    ->withProperties([
                        'name' => $model->name ,
                        'email' => $model->email
                    ])->log(" کاربری با نام ".$model->name." ایجاد شد ");
                break;
            case "updated" :
                activity()->causedBy(auth()->id())->performedOn($model)->useLog($table)
                    ->withProperties([
                        'name' => $model->name ,
                        'email' => $model->email
                    ])->log(" کاربری با نام ".$model->name." ویرایش شد ");
                break;
            case "deleted" :
                activity()->causedBy(auth()->id())->performedOn($model)->useLog($table)
                    ->withProperties([
                        'name' => $model->name ,
                        'email' => $model->email
                    ])->log(" کاربری با نام ".$model->name." حذف شد ");
                break;
        }
    }
}
