<?php

namespace App\Models;

use App\Models\Household;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 収支の分類情報を管理するテーブル
 *
 * 各家計ごとにカテゴリを作成可能
 * household_id でどの家計のカテゴリか紐付け
 *
 * ▫用途例
 * 食費、光熱費、給料などの分類
 * 家計ごとにカテゴリをカスタマイズ可能
 */
class Category extends Model
{
    use HasFactory;

    protected $fillable = ['household_id', 'name'];

    /**
     * Category が所属する Household を取得
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function household()
    {
        return $this->belongsTo(Household::class);
    }

    /**
     * Category に所属する取引一覧を取得
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}

