<?php

namespace Idoneo\HumanoChat;

use Idoneo\HumanoChat\Models\SystemModule;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class HumanoChatServiceProvider extends PackageServiceProvider
{
	public function configurePackage(Package $package): void
	{
		$package
			->name('humano-chat')
			->hasViews()
			->hasRoute('web');
	}

	public function bootingPackage(): void
	{
		parent::bootingPackage();

		try {
			if (Schema::hasTable('modules')) {
				if (class_exists(\App\Models\Module::class)) {
					\App\Models\Module::updateOrCreate(
						['key' => 'chat'],
						[
							'name' => 'Chat',
							'icon' => 'ti ti-messages',
							'description' => 'Team chat with contact linking, threading and assignments',
							'is_core' => false,
							'status' => 1,
						]
					);
				} else {
					SystemModule::query()->updateOrCreate(
						['key' => 'chat'],
						[
							'name' => 'Chat',
							'icon' => 'ti ti-messages',
							'description' => 'Team chat with contact linking, threading and assignments',
							'is_core' => false,
							'status' => 1,
						]
					);
				}
			}
		} catch (\Throwable $e) {
			Log::debug('HumanoChat: module registration skipped: ' . $e->getMessage());
		}

		// Twilio availability check for chat features
		try {
			if (! class_exists(\Twilio\Rest\Client::class)) {
				Log::warning('HumanoChat: Twilio SDK not installed; chat messaging features will be disabled.');
			}
		} catch (\Throwable $e) {
			// no-op
		}
	}
}


