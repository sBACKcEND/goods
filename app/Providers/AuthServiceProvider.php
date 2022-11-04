<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Warehouse;
use App\Policies\ProductPolicy;
use App\Policies\WarehousePolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
//        'App\Models\Product' => 'App\Policies\ProductPolicy',
//        'App\Models\Warehouse' => 'App\Policies\WarehousePolicy',
       Product::class => ProductPolicy::class,
       Warehouse::class => WarehousePolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
