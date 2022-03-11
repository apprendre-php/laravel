<?php

namespace App\Providers;

use App\Events\AddToCart;
use App\Events\NewCreateItem;
use App\Listeners\DeleteReport;
use App\Events\SendReportFinish;
use App\Listeners\LogCreateNewItem;
use App\Listeners\LogStockAlertItem;
use App\Listeners\UpdateReportStatus;
use Illuminate\Support\Facades\Event;
use App\Listeners\LogNewAddItemToCart;
use Illuminate\Auth\Events\Registered;
use App\Listeners\ReincrementationItem;
use App\Events\EventReincrementationItem;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider {

	/**
	 * The event listener mappings for the application.
	 *
	 * @var array
	 */
	protected $listen = array(
		Registered::class                => array(
			SendEmailVerificationNotification::class,
		),
		NewCreateItem::class             => array(
			LogCreateNewItem::class,
		),
		AddToCart::class                 => array(
			LogNewAddItemToCart::class,
			LogStockAlertItem::class,
		),
		SendReportFinish::class          => array(
			UpdateReportStatus::class,
			DeleteReport::class,
		),
		EventReincrementationItem::class => array(
			ReincrementationItem::class,
		),
	);

	/**
	 * Register any events for your application.
	 *
	 * @return void
	 */
	public function boot() {
	}
}
