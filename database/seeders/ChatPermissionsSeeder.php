<?php

namespace HumanoChat\Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class ChatPermissionsSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 */
	public function run(): void
	{
		// Chat permissions
		Permission::firstOrCreate(['name' => 'chat.index']);
		Permission::firstOrCreate(['name' => 'chat.list']);
		Permission::firstOrCreate(['name' => 'chat.create']);
		Permission::firstOrCreate(['name' => 'chat.show']);
		Permission::firstOrCreate(['name' => 'chat.edit']);
		Permission::firstOrCreate(['name' => 'chat.store']);
		Permission::firstOrCreate(['name' => 'chat.update']);
		Permission::firstOrCreate(['name' => 'chat.destroy']);
	}
}

