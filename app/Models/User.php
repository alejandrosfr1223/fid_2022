<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Cashier\Billable;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;
    use Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'lastname',
        'country_iso2',
        'phonenumber',
        'level_fidsub',
        'level_dpasub',
        'level_jdrsub',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    // Permite incorporar una imagen de usuario
    // Se debe configurar en config\adminlte.php: 'usermenu_image' => true,
    public function adminlte_image(){
        //return 'https://picsum.photos/300/300'; /* Retorna una imagen aleatoria*/
        return Auth::user()->profile_photo_url;
    }

    // Permite incorporar alguna descripción del usuario
    // Se debe configurar en config\adminlte.php: 'usermenu_desc' => ' => true,
    public function adminlte_desc(){
        return 'Aquí la información';
    }

    // Permite incorporar el perfil
    // Se debe configurar en config\adminlte.php: 'usermenu_profile_url' => true,
    public function adminlte_profile_url(){
        return 'user/profile';
    }
}
