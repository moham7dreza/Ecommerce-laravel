<?php

namespace Share\Services;

use App\Http\Repositories\Admin\Content\PostCategoryRepo;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;

class ShareService
{
    public static function uploadImage($file, $folder, $route, $imageService)
    {
        $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . $folder);
        // $result = $imageService->save($request->file('image'));
        // $result = $imageService->fitAndSave($request->file('image'), 600, 150);
        // exit;
        $result = $imageService->createIndexAndSave($file);
        if ($result === false) {
            return self::redirect($route,'آپلود تصویر با خطا مواجه شد', 'error');
        }
        return $result;
    }

    public static function updateImage($request, $folder, $route, $imageService, $model, $inputs)
    {
        if ($request->hasFile('image')) {
            if (!empty($model->image)) {
                $imageService->deleteDirectoryAndFiles($model->image['directory']);
            }
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . $folder);
            $result = $imageService->createIndexAndSave($request->file('image'));
            if ($result === false) {
                return redirect()->route($route)->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }
            $inputs['image'] = $result;
        } else {
            if (isset($inputs['currentImage']) && !empty($model->image)) {
                $image = $model->image;
                $image['currentImage'] = $inputs['currentImage'];
                $inputs['image'] = $image;
            }
        }
        return $inputs;
    }

    public static function changeStatus($model): JsonResponse
    {
//        $model->status = $model->status == 0 ? 1 : 0;
        if ($model->status == 0) {
            $model->status = 1;
        } else $model->status = 0;
        $result = $model->save();
        if ($result) {
            if ($model->status == 0) {
                return response()->json(['status' => true, 'checked' => false]);
            } else {
                return response()->json(['status' => true, 'checked' => true]);
            }
        } else {
            return response()->json(['status' => false]);
        }
    }

    public static function redirect($route, $message, $status = 'success'): RedirectResponse
    {
        return redirect()->route($route)->with('swal-' . $status, $message);
    }
}
