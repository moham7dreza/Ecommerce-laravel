<?php

namespace App\Models\SmartAssemble;

use App\Models\Market\Guarantee;
use App\Models\Market\Product;
use App\Models\Market\ProductColor;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SystemItem extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['price','name','user_id', 'system_id','product_id', 'color_id', 'guarantee_id', 'number'];


    public function system()
    {
        return $this->belongsTo(System::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function color()
    {
        return $this->belongsTo(ProductColor::class);
    }

    public function guarantee()
    {
        return $this->belongsTo(Guarantee::class);
    }
}
