<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
/**
 * App\User
 *
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property integer $user_type_id
 * @property string $password
 * @property string $remember_token
 * @property integer $country_id
 * @property string $adress
 * @property string $phone_number
 * @property string $contacts
 * @property string $web_site
 * @property string $bg_logo
 * @property string $logo
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Models\Country $country
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $unreadNotifications
 * @method static \Illuminate\Database\Query\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereUserTypeId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereCountryId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereAdress($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User wherePhoneNumber($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereContacts($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereWebSite($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereBgLogo($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereLogo($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class User extends Authenticatable
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'user_type_id',
        'country_id',
        'adress',
        'phone_number',
        'web_site',
        'contacts',
        'logo',
        'bg_logo'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function country(){
        return $this->belongsTo('App\Models\Country');
    }
}
