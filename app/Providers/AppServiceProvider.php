<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Pagination\Paginator;



class AppServiceProvider extends ServiceProvider
{
    public $selected;
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
       /* if ($this->selected_id > 0){
            $this->provider = Provider::find($this->selected_id);
            $this->provider_id = $this->provider->id;
            return view('livewire.purchases.view', [
                'products' => $this->products,
                'provider' => $this->provider,
                'orderProducts' => $this->orderProducts,
            ]);
        }else{
            return view('livewire.purchases.view', [
                'products' => $this->products,
                'providers' => $this->providers,
                'orderProducts' => $this->orderProducts,
            ]);
        }*/
        View::share('sucursal1', '00-Matriz');
        View::share('sucursal2', '01-Servidor');
        View::share('sucursal3', '02-Servidor');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        Schema::defaultStringLength(191);
        Paginator::useBootstrap();
    }
}
