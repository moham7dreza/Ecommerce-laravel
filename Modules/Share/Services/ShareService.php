<?php

namespace Share\Services;

use App\Http\Repositories\Admin\Content\PostCategoryRepo;
use App\Http\Services\Image\ImageService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;

class ShareService
{
    public ImageService $imageService;

    public function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService;
    }

    public static function uploadImage($file, $folder, $redirect_route, $imageService)
    {
        $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . $folder);
        // $result = $imageService->save($request->file('image'));
        // $result = $imageService->fitAndSave($request->file('image'), 600, 150);
        // exit;
        $result = $imageService->createIndexAndSave($file);
        if ($result === false) {
            return self::redirect($redirect_route,'آپلود تصویر با خطا مواجه شد', 'error');
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

    // users wants to upload new img
    // first delete previous img then save new image
    public static function uploadNewImage($image, $imageService, $folder, $file)
    {
        if (!empty($image)) {
            $imageService->deleteDirectoryAndFiles($image['directory']);
        }
        $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . $folder);
        return $imageService->createIndexAndSave($file);
    }

    // only size of image has changed
    public static function useCurrentImage($currentImageSize, $image)
    {
        if (isset($currentImageSize) && !empty($image)) {
            $img = $image;
            $img['currentImage'] = $currentImageSize;
            return $img;
        }
        return $image;
    }

    public static function saveImageWithName($file, $folder, $name, $image, $imageService)
    {
        if (!empty($image)) {
            $imageService->deleteImage($image);
        }
        $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . $folder);
        $imageService->setImageName($name);
        return $imageService->save($file);
    }

    public static function saveImage($file, $folder, $image, $imageService)
    {
        if (!empty($image)) {
           $imageService->deleteImage($image);
        }
        $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . $folder);
        return $imageService->save($file);
    }

    public static function dateFix($timestamp)
    {
        //date fixed
        $realTimestampStart = substr($timestamp, 0, 10);
        return date("Y-m-d H:i:s", (int)$realTimestampStart);
    }
}
