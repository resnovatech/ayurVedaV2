<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         // Create Roles
        $roleSuperAdmin = Role::create(['name' => 'superadmin']);
        $roleAdmin = Role::create(['name' => 'admin']);
        $roleEditor = Role::create(['name' => 'editor']);
        $roleUser = Role::create(['name' => 'user']);


        // Permission List as array
        $permissions = [

            [
                'group_name' => 'dashboard',
                'permissions' => [
                    'dashboard.view',
                    'dashboard.edit',
                ]
            ],
            [
                'group_name' => 'walkByPatient',
                'permissions' => [
                    'walkByPatientAdd',
                    'walkByPatientView',
                    'walkByPatientDelete',
                    'walkByPatientUpdate',
                ]
            ],
            [
                'group_name' => 'patient',
                'permissions' => [
                    'patientAdd',
                    'patientView',
                    'patientDelete',
                    'patientUpdate',
                ]
            ],
            [
                'group_name' => 'patientAdmit',
                'permissions' => [
                    'patientAdmitAdd',
                    'patientAdmitView',
                    'patientAdmitDelete',
                    'patientAdmitUpdate',
                ]
            ],
            [
                'group_name' => 'doctor',
                'permissions' => [
                    'doctorAdd',
                    'doctorView',
                    'doctorDelete',
                    'doctorUpdate',
                ]
            ],
            [
                'group_name' => 'systemInformation',
                'permissions' => [
                    'systemInformationAdd',
                    'systemInformationView',
                    'systemInformationDelete',
                    'systemInformationUpdate',
                ]
            ],
            [
                'group_name' => 'user',
                'permissions' => [
                    'userAdd',
                    'userView',
                    'userDelete',
                    'userUpdate',
                ]
            ],
            [
                'group_name' => 'role',
                'permissions' => [
                    'roleAdd',
                    'roleView',
                    'roleDelete',
                    'roleUpdate',
                ]
            ],
            [
                'group_name' => 'permission',
                'permissions' => [
                    'permissionAdd',
                    'permissionView',
                    'permissionDelete',
                    'permissionUpdate',
                ]
            ],
            [
                'group_name' => 'profile',
                'permissions' => [
                    // profile Permissions
                    'profile.view',
                    'profile.edit',
                ]
            ],
        ];


        // Create and Assign Permissions
        for ($i = 0; $i < count($permissions); $i++) {
            $permissionGroup = $permissions[$i]['group_name'];
            for ($j = 0; $j < count($permissions[$i]['permissions']); $j++) {
                // Create Permission
                $permission = Permission::create(['name' => $permissions[$i]['permissions'][$j], 'group_name' => $permissionGroup]);
                $roleSuperAdmin->givePermissionTo($permission);
                $permission->assignRole($roleSuperAdmin);
            }
        }
    }
}
