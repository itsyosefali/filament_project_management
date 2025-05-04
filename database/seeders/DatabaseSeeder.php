<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        app(PermissionRegistrar::class)->forgetCachedPermissions();

        // Delete existing roles before re-creating them
        $rolesToDelete = [
            'عضو مكتب الشؤون العلمية',
            'عضو مكتب شؤون الطلبة',
            'عضو مكتب النشاط',
            'عضو مكتب الإعلام',
            'عضو مكتب التقنية',
            'عضو مكتب العلاقات الخارجية',
            // New رئيس roles
            'رئيس مكتب الشؤون العلمية',
            'رئيس مكتب شؤون الطلبة',
            'رئيس مكتب النشاط',
            'رئيس مكتب الإعلام',
            'رئيس مكتب التقنية',
            'رئيس مكتب العلاقات الخارجية',
        ];
        Role::whereIn('name', $rolesToDelete)->delete();

        // Permissions for "عضو" roles
        $memberPermissions = [
            // Project
            'view_project',
            'view_any_project',

            // Ticket
            'view_ticket',
            // 'view_any_ticket',
            'update_ticket',

            // Ticket Comment
            'view_ticket_comment',
            'view_any_ticket_comment',
            'view_any_ticker_comment',
            'create_ticket_comment',
            'update_ticket_comment',
            // Uncomment to allow deletion:
            // 'delete_ticket_comment',
            // 'delete_any_ticket_comment',
        ];

        // Permissions for "رئيس" roles
        $chiefPermissions = [
            // Project (CRUD)
            'view_project',
            'view_any_project',
            'create_project',
            'update_project',
            'delete_project',
            'delete_any_project',

            // Ticket (CRUD)
            'view_ticket',
            'view_any_ticket',
            'create_ticket',
            'update_ticket',
            'delete_ticket',
            'delete_any_ticket',

            // Ticket Comment (all)
            'view_ticket_comment',
            'view_any_ticket_comment',
            'view_any_ticker_comment',
            'create_ticket_comment',
            'update_ticket_comment',
            'delete_ticket_comment',
            'delete_any_ticket_comment',

            // User (only view_any)
            'view_any_user',
        ];

        // Create all permissions if not exist
        $allPermissions = array_unique(array_merge($memberPermissions, $chiefPermissions));
        foreach ($allPermissions as $permission) {
            Permission::updateOrCreate([
                'name' => $permission,
                'guard_name' => 'web',
            ]);
        }

        // عضو roles
        $memberRoles = [
            'عضو مكتب الشؤون العلمية',
            'عضو مكتب شؤون الطلبة',
            'عضو مكتب النشاط',
            'عضو مكتب الإعلام',
            'عضو مكتب التقنية',
            'عضو مكتب العلاقات الخارجية',
        ];

        // رئيس roles
        $chiefRoles = [
          'رؤساء المكاتب',
        ];

        // Assign permissions to عضو roles
        foreach ($memberRoles as $roleName) {
            $role = Role::updateOrCreate([
                'name' => $roleName,
                'guard_name' => 'web',
            ]);
            $role->syncPermissions($memberPermissions);
        }

        // Assign permissions to رئيس roles
        foreach ($chiefRoles as $roleName) {
            $role = Role::updateOrCreate([
                'name' => $roleName,
                'guard_name' => 'web',
            ]);
            $role->syncPermissions($chiefPermissions);
        }
    }
}
