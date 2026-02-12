<?php

namespace App\Models;

use App\Models\Household;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 家計に新しいユーザーを招待する履歴や情報を管理
 *
 * 招待済みか、承認済みかなどの状態を保持
 *
 * ▫用途例
 * 家族やチームメンバーを家計に招待
 * 招待状況の管理（未承認、承認済みなど）
 */
class Invitation extends Model
{
    use HasFactory;

    protected $fillable = ['household_id', 'email', 'token', 'status'];

    /**
     * Invitation が所属する Household を取得
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function household()
    {
        return $this->belongsTo(Household::class);
    }
}
