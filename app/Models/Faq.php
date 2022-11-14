<?php

namespace App\Models;

use App\Models\FaqTheme;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Faq extends Model
{
    use HasFactory;

    protected $fillable = [
        'question',
        'answer',
        'faq_theme_id',
        'user_id',
        'is_active'
    ];

    public function faqTheme() {
        return $this->belongsTo(FaqTheme::class);
    }
}
