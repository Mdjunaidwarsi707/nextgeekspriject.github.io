<?php
  
namespace Database\Seeders;
  
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
  
class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'NextGeeks', 
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345'),
            'role_type'=>1
        ]);
        
        $role = Role::create(['name' => 'Administrator']);
        $role1 = Role::create(['name' => 'Client']);
        $role2 = Role::create(['name' => 'Employee']);
     
        $permissions = Permission::pluck('id','id')->all();
        $permissions1 = Permission::pluck('id','id')->all();
        $permissions2 = Permission::pluck('id','id')->all();
   
        $role->syncPermissions($permissions);
        $role1->syncPermissions($permissions1);
        $role2->syncPermissions($permissions2);
    
        $user->assignRole([$role->id]);
    }
}