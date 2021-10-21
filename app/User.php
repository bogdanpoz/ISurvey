<?php

namespace App;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'language_id',
        'plan_id',
        'main_color',
        'primary_color',
        'secondary_color'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function surveys()
    {
        return $this->hasMany('App\Models\Survey');
    }

    public function subscription()
    {
        return $this->hasOne('App\Models\Subscription');
    }

    public function subscribed()
    {
        return $this->subscription()->exists();
    }

    public function transactions()
    {
        return $this->hasMany('App\Models\Transaction');
    }

    public function language()
    {
        return $this->belongsTo('App\Models\Language');
    }

    public function languageCode()
    {
        return $this->language ? $this->language->code : 'en';
    }
}
