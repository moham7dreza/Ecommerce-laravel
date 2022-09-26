<?php

namespace App\Models\Content;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Banner extends Model
{
    use HasFactory, SoftDeletes;


    protected $casts = ['image' => 'array'];



    protected $fillable = [
        'title',
        'image',
        'url',
        'position',
        'status'
    ];


    public static $positions = [
        0   =>  'اسلاید شو (صفحه اصلی)',
        1   =>  'کنار اسلاید شو (صفحه اصلی)',
        2   =>  'دو بنر تبلیغی بین دو اسلایدر  (صفحه اصلی)',
        3   =>  'دو بنر تبلیغی بین دو اسلایدر پایینی  (صفحه اصلی)',
        4   =>  'بنر تبلیغی بزرگ پایین دو اسلایدر  (صفحه اصلی)',
        5   =>  'بنر تبلیغی برندها در اتمام صفحه  (صفحه اصلی)'
    ];
}
