<?php

namespace App\Http\Repositories\Admin;

use App\Models\Content\Comment;
use App\Models\Content\Post;
use App\Models\Market\AmazingSale;
use App\Models\Market\Order;
use App\Models\Market\Payment;
use App\Models\Ticket\Ticket;
use App\Models\User;
use Carbon\Carbon;

class HomeRepo
{
    public function customersCount(): int
    {
        return User::query()->where('user_type', 0)->count();
    }

    public function adminUsersCount(): int
    {
        return User::query()->where('user_type', 1)->count();
    }
    public function postsCount(): int
    {
        return Post::query()->count();
    }

    public function commentsCount(): int
    {
        return Comment::query()->count();
    }

    public function ordersCount(): int
    {
        return Order::query()->count();
    }

    public function paymentsCount(): int
    {
        return Payment::query()->count();
    }

    public function activeAmazingSalesCount(): int
    {
        return AmazingSale::query()->where('start_date', '<', Carbon::now())->where('end_date', '>', Carbon::now())->where('status', 1)->count();

    }

    public function newTicketsCount() : int
    {
        return Ticket::query()->where('seen', 0)->count();
    }
}
