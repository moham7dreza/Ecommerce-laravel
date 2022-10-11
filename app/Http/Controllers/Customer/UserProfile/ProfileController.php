<?php

namespace App\Http\Controllers\Customer\UserProfile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\User\UpdateUserInfoRequest;
use App\Models\Market\Product;
use App\Models\Province;
use App\Models\User;

class ProfileController extends Controller
{
    public function myProfile()
    {
        return view('customer.user.profile');
    }

    public function updateUserInfo(User $user, UpdateUserInfoRequest $request)
    {
        $inputs = $request->all();
        $user->update($inputs);
        return redirect()->back();
    }

    public function myOrders()
    {
        $order_status_value= null;
        if (isset(request()->type)) {
            $orders = auth()->user()->orders()->where('order_status', request()->type)->orderBy('id', 'desc')->get();
            switch (request()->type) {
                case 1:
                    $order_status_value = 'در انتظار تایید';
                    break;
                case 2:
                    $order_status_value = 'تاییده نشده';
                    break;
                case 3:
                    $order_status_value = 'تایید شده';
                    break;
                case 4:
                    $order_status_value = 'باطل شده';
                    break;
                case 5:
                    $order_status_value = 'مرجوع شده';
                    break;
                default :
                    $order_status_value = 'بررسی نشده';
            }
        } else {
            $orders = auth()->user()->orders()->orderBy('id', 'desc')->get();
        }
        return view('customer.user.orders', compact('orders', 'order_status_value'));
    }

    public function myAddresses()
    {
        $provinces = Province::all();
        $addresses = auth()->user()->addresses()->orderBy('id', 'desc')->get();
        return view('customer.user.addresses', compact('addresses', 'provinces'));
    }

    public function myFavorites()
    {
        return view('customer.user.favorites');
    }

    public function deleteFromFavorites(Product $product)
    {
        $user = auth()->user();
        $user->products()->detach($product->id);
        return redirect()->route('customer.profile.favorites')->with('success', 'محصول با موفقیت از علاقه مندی ها حذف شد');

    }
}
