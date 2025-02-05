<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ebook extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'file_path', 'is_active'];

    public function purchases() {
        return $this->hasMany(EbookPurchase::class);
    }
}

