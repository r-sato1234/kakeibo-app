<?php
namespace App\Models;

use App\Models\Category;
use App\Models\Invitation;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 家族やグループ単位の家計を表すテーブル
 *
 * 1つの Household に複数のユーザーが所属可能
 * owner_id で「家計のオーナー（管理者）」を管理
 *
 * ▫用途例
 * 家族単位で収支を管理する
 * オーナーが権限を持つ
 */
class Household extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'owner_id'];

    /**
     * Household のオーナーを取得
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    /**
     * Household に所属するユーザー一覧を取得
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }

    /**
     * Household に所属するカテゴリー一覧を取得
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    /**
     * Household に所属する取引一覧を取得
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    /**
     * Household に所属する招待一覧を取得
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function invitations()
    {
        return $this->hasMany(Invitation::class);
    }
}

