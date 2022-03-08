<?php

namespace App\Providers;

use App\Events\AddToCart;
use App\Events\NewCreateItem;
use App\Events\SendReportFinish;
use App\Listeners\DeleteReport;
use App\Listeners\LogCreateNewItem;
use App\Listeners\LogNewAddItemToCart;
use App\Listeners\LogStockAlertItem;
use App\Listeners\UpdateReportStatus;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        NewCreateItem::class => [
            LogCreateNewItem::class,
        ],
        AddToCart::class => [
            LogNewAddItemToCart::class,
            LogStockAlertItem::class,
        ],
        SendReportFinish::class => [
            UpdateReportStatus::class,
            DeleteReport::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
