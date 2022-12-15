<?php

namespace App\Http\Livewire\Admin\User;

use App\Models\User;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class AdminUserTable extends DataTableComponent
{
    protected $model = User::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("First name", "first_name")
                ->sortable(),
            Column::make("Last name", "last_name")
                ->sortable(),
            Column::make("Email", "email")
                ->sortable(),
            Column::make("Mobile", "mobile")
                ->sortable(),
            Column::make("Status", "status")
                ->sortable(),
            Column::make("User type", "user_type")
                ->sortable(),
            Column::make("Activation", "activation")
                ->sortable(),
//            Column::make("Profile photo path", "profile_photo_path")
//                ->sortable(),
//            Column::make("Email verified at", "email_verified_at")
//                ->sortable(),
//            Column::make("Mobile verified at", "mobile_verified_at")
//                ->sortable(),
//            Column::make("National code", "national_code")
//                ->sortable(),
//            Column::make("Created at", "created_at")
//                ->sortable(),
//            Column::make("Updated at", "updated_at")
//                ->sortable(),
        ];
    }
}
