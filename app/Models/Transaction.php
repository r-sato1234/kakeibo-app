<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Household;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 収入・支出の履歴を管理するテーブル
 *
 * user_id で誰が登録したか
 * category_id でどのカテゴリか
 * household_id でどの家計かを紐付け
 *
 * ▫用途例
 * 家計内の収支を記録
 * 家族ごと、カテゴリごとの集計や分析に利用
 */
class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'household_id', 'user_id', 'category_id', 'type', 'amount', 'date', 'note'
    ];

    /**
     * Transaction が所属する Household を取得
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function household()
    {
        return $this->belongsTo(Household::class);
    }

    /**
     * Transaction を作成した User を取得
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Transaction が所属する Category を取得
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
