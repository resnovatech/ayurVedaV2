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
        $roleEditor = Role::create(['name' => 'therapist']);
        $roleUser = Role::create(['name' => 'staff']);


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
                'group_name' => 'Inventory',
                'permissions' => [
                    'inventoryAdd',
                    'inventoryView',
                    'inventoryDelete',
                    'inventoryUpdate',
                ]
            ],
            [
                'group_name' => 'Inventory Category',
                'permissions' => [
                    'inventoryCategoryAdd',
                    'inventoryCategoryView',
                    'inventoryCategoryDelete',
                    'inventoryCategoryUpdate',
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
            [
                'group_name' => 'staff',
                'permissions' => [
                    'staffAdd',
                    'staffView',
                    'staffDelete',
                    'staffUpdate',
                ]
            ],
            [
                'group_name' => 'therapyMaker',
                'permissions' => [
                    'therapyMakerAdd',
                    'therapyMakerView',
                    'therapyMakerDelete',
                    'therapyMakerUpdate',
                ]
            ],

            [
                'group_name' => 'reward',
                'permissions' => [
                    'rewardAdd',
                    'rewardView',
                    'rewardDelete',
                    'rewardUpdate',
                ]
            ],
            [
                'group_name' => 'therapist',
                'permissions' => [
                    'therapistAdd',
                    'therapistView',
                    'therapistDelete',
                    'therapistUpdate',
                ]
            ],
            [
                'group_name' => 'dietCharts',
                'permissions' => [
                    'dietChartsAdd',
                    'dietChartsView',
                    'dietChartsDelete',
                    'dietChartsUpdate',
                ]
            ],
            [
                'group_name' => 'medicineLists',
                'permissions' => [
                    'medicineListsAdd',
                    'medicineListsView',
                    'medicineListsDelete',
                    'medicineListsUpdate',
                ]
            ],
            [
                'group_name' => 'healthSupplements',
                'permissions' => [
                    'healthSupplementsAdd',
                    'healthSupplementsView',
                    'healthSupplementsDelete',
                    'healthSupplementsUpdate',
                ]
            ],
            [
                'group_name' => 'therapyIngredients',
                'permissions' => [
                    'therapyIngredientsAdd',
                    'therapyIngredientsView',
                    'therapyIngredientsDelete',
                    'therapyIngredientsUpdate',
                ]
            ],
            [
                'group_name' => 'therapyLists',
                'permissions' => [
                    'therapyListsAdd',
                    'therapyListsView',
                    'therapyListsDelete',
                    'therapyListsUpdate',
                ]
            ],
            [
                'group_name' => 'doctorWaitingList',
                'permissions' => [
                    'doctorWaitingListAdd',
                    'doctorWaitingListView',
                    'doctorWaitingListDelete',
                    'doctorWaitingListUpdate',
                ]
            ],

            [
                'group_name' => 'patientPrescriptionList',
                'permissions' => [
                    'patientPrescriptionListAdd',
                    'patientPrescriptionListView',
                    'patientPrescriptionListDelete',
                    'patientPrescriptionListUpdate',
                ]
            ],
            [
                'group_name' => 'Billing',
                'permissions' => [
                    'BillingAdd',
                    'BillingView',
                    'BillingDelete',
                    'BillingUpdate',
                ]
            ],
            [
                'group_name' => 'revisedBilling',
                'permissions' => [
                    'revisedBillingAdd',
                    'revisedBillingView',
                    'revisedBillingDelete',
                    'revisedBillingUpdate',
                ]
            ],
            [
                'group_name' => 'therapyAppointment',
                'permissions' => [
                    'therapyAppointmentAdd',
                    'therapyAppointmentView',
                    'therapyAppointmentDelete',
                    'therapyAppointmentUpdate',
                ]
            ],
            [
                'group_name' => 'walkByPatientTherapy',
                'permissions' => [
                    'walkByPatientTherapyAdd',
                    'walkByPatientTherapyView',
                    'walkByPatientTherapyDelete',
                    'walkByPatientTherapyUpdate',
                ]
            ],
            [
                'group_name' => 'doctorAppointment',
                'permissions' => [
                    'doctorAppointmentAdd',
                    'doctorAppointmentView',
                    'doctorAppointmentDelete',
                    'doctorAppointmentUpdate',
                ]
            ],
            [
                'group_name' => 'package',
                'permissions' => [
                    'packageAdd',
                    'packageView',
                    'packageDelete',
                    'packageUpdate',
                ]
            ],
            [
                'group_name' => 'powder',
                'permissions' => [
                    'powderAdd',
                    'powderView',
                    'powderDelete',
                    'powderUpdate',
                ]
            ],
            [
                'group_name' => 'treatMentChart',
                'permissions' => [
                    'treatMentChartAdd',
                    'treatMentChartView',
                    'treatMentChartDelete',
                    'treatMentChartUpdate',
                ]
            ],
            [
                'group_name' => 'therapyPackages',
                'permissions' => [
                    'therapyPackagesAdd',
                    'therapyPackagesView',
                    'therapyPackagesDelete',
                    'therapyPackagesUpdate',
                ]
            ],
            [
                'group_name' => 'agreementFormOne',
                'permissions' => [
                    'agreementFormOneAdd',
                    'agreementFormOneView',
                    'agreementFormOneDelete',
                    'agreementFormOneUpdate',
                ]
            ],
            [
                'group_name' => 'agreementFormTwo',
                'permissions' => [
                    'agreementFormTwoAdd',
                    'agreementFormTwoView',
                    'agreementFormTwoDelete',
                    'agreementFormTwoUpdate',
                ]
            ],
            [
                'group_name' => 'agreementFormThree',
                'permissions' => [
                    'agreementFormThreeAdd',
                    'agreementFormThreeView',
                    'agreementFormThreeDelete',
                    'agreementFormThreeUpdate',
                ]
            ],
            [
                'group_name' => 'medicineEquipment',
                'permissions' => [
                    'medicineEquipmentAdd',
                    'medicineEquipmentView',
                    'medicineEquipmentDelete',
                    'medicineEquipmentUpdate',
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
