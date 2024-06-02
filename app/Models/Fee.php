<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{
    use HasFactory;

    protected $fillable = [
        'membership_id',
        'member_id',
        'amount',
        'collected_by_user_id',
        'month',
        'voucher_number'
    ];

    public function collector()
    {
        return $this->belongsTo(User::class, 'collected_by_user_id');
    }

    public function member()
    {
        return $this->belongsTo(Member::class);
    }
    public function membership()
    {
        return $this->belongsTo(Membership::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'collected_by_user_id');
    }
    
}

