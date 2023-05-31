<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Admin extends Authenticatable
{
    use HasFactory,Notifiable,HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','staff_id','phone', 'email', 'password','position','image'
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


    public function doctors()
    {
        return $this->hasMany('App\Models\Doctor');
    }

    public function walkByPatients()
    {
        return $this->hasMany('App\Models\WalkByPatient');
    }


    public function patients()
    {
        return $this->hasMany('App\Models\Patient');
    }


    public function bills()
    {
        return $this->hasMany('App\Models\Bill');
    }


    public function patientAdmits()
    {
        return $this->hasMany('App\Models\PatientAdmit');
    }


    public function doctorAppointments()
    {
        return $this->hasMany('App\Models\DoctorAppointment');
    }


    public function patientHistories()
    {
        return $this->hasMany('App\Models\PatientHistory');
    }

    public function therapyAppointments()
    {
        return $this->hasMany('App\Models\TherapyAppointment');
    }

    public function staff()
    {
        return $this->hasMany('App\Models\Staff');
    }



    public function therapists()
    {
        return $this->hasMany('App\Models\Therapist');
    }

    public function agrement_form_twos()
    {
        return $this->hasMany('App\Models\AgrementFormTwo');
    }

    public function agrement_form_ones()
    {
        return $this->hasMany('App\Models\AgrementFormOne');
    }


    public function agrement_form_threes()
    {
        return $this->hasMany('App\Models\AgrementFormThree');
    }


    public function therapyAppointmentDateAndTimes()
    {
        return $this->hasMany('App\Models\TherapyAppointmentDateAndTime');
    }


     public static function getpermissionGroups()
    {
        $permission_groups = DB::table('permissions')
            ->select('group_name as name')
            ->groupBy('group_name')
            ->get();
        return $permission_groups;
    }

    public static function getpermissionsByGroupName($group_name)
    {
        $permissions = DB::table('permissions')
            ->select('name', 'id')
            ->where('group_name', $group_name)
            ->get();
        return $permissions;
    }

    public static function roleHasPermissions($role, $permissions)
    {
        $hasPermission = true;
        foreach ($permissions as $permission) {
            if (!$role->hasPermissionTo($permission->name)) {
                $hasPermission = false;
                return $hasPermission;
            }
        }
        return $hasPermission;
    }
}
