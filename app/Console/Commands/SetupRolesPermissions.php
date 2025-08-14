<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class SetupRolesPermissions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:setup-roles-permissions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Setup roles and permissions for the application';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Setting up roles and permissions...');

        // Run the seeders
        $this->call('db:seed', [
            '--class' => 'PermissionSeeder',
        ]);

        $this->call('db:seed', [
            '--class' => 'RoleSeeder',
        ]);

        $this->info('Roles and permissions have been set up successfully!');
        
        return Command::SUCCESS;
    }
}