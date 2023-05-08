<?php
namespace Database\Seeders;
use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = Admin::where('email','superadmin@gmail.com')->first();
        if (is_null($user)) {
            $user = new Admin();
            $user->name = "super admin";
            $user->position = "admin";
            $user->email = "superadmin@gmail.com";
            $user->phone = "123456789";
            $user->password = Hash::make('12345678');
            $user->save();

            $user->assignRole('superadmin');
        }
    }
}
