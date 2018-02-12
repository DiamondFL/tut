<?php
/**
 * Created by PhpStorm.
 * User: cuongpm
 * Date: 1/19/18
 * Time: 10:34 AM
 */

namespace Ush\Product;

use Illuminate\Support\ServiceProvider;
use Ush\Observers\CategoryObserver;
use Ush\Product\Http\ViewComposers\CategoryComposer;
use Ush\Product\Models\UshCategory;
use Ush\Product\Repositories\UshBrandRepository;
use Ush\Product\Repositories\UshBrandRepositoryEloquent;
use Ush\Product\Repositories\UshCategoryRepository;
use Ush\Product\Repositories\UshCategoryRepositoryEloquent;
use Ush\Product\Repositories\UshColorProductRepository;
use Ush\Product\Repositories\UshColorProductRepositoryEloquent;
use Ush\Product\Repositories\UshColorRepository;
use Ush\Product\Repositories\UshColorRepositoryEloquent;
use Ush\Product\Repositories\UshFeatureRepository;
use Ush\Product\Repositories\UshFeatureRepositoryEloquent;
use Ush\Product\Repositories\UshFitRepository;
use Ush\Product\Repositories\UshFitRepositoryEloquent;
use Ush\Product\Repositories\UshGroupRepository;
use Ush\Product\Repositories\UshGroupRepositoryEloquent;
use Ush\Product\Repositories\UshMaterialRepository;
use Ush\Product\Repositories\UshMaterialRepositoryEloquent;
use Ush\Product\Repositories\UshPriceRepository;
use Ush\Product\Repositories\UshPriceRepositoryEloquent;
use Ush\Product\Repositories\UshProductRepository;
use Ush\Product\Repositories\UshProductRepositoryEloquent;
use Ush\Product\Repositories\UshSeasonRepository;
use Ush\Product\Repositories\UshSeasonRepositoryEloquent;
use Ush\Product\Repositories\UshSpecialtySizeRepository;
use Ush\Product\Repositories\UshSpecialtySizeRepositoryEloquent;
use Ush\Product\Repositories\UshSubCategoryRepository;
use Ush\Product\Repositories\UshSubCategoryRepositoryEloquent;
use Ush\Product\Repositories\UshWeightRepository;
use Ush\Product\Repositories\UshWeightRepositoryEloquent;
use Ush\Product\Http\ViewComposers\BrandComposer;
use Ush\Product\Http\ViewComposers\FeatureComposer;
use Ush\Product\Http\ViewComposers\FitComposer;
use Ush\Product\Http\ViewComposers\GroupComposer;
use Ush\Product\Http\ViewComposers\MaterialComposer;
use Ush\Product\Http\ViewComposers\PriceComposer;
use Ush\Product\Http\ViewComposers\SeasonComposer;
use Ush\Product\Http\ViewComposers\SpecialtySizeComposer;
use Ush\Product\Http\ViewComposers\WeightComposer;

class UshProductServiceProviders extends ServiceProvider
{
    public function boot()
    {
        $this->loadTranslationsFrom(__DIR__.'/resources/lang', 'ush-p');
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'ush-p');
        $this->loadRoutesFrom(__DIR__ . '/router.php');
        $this->publishes([
//            __DIR__.'/config/magic-db.php' => config_path('magic-db.php'),
        ]);
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
        if ($this->app->runningInConsole()) {
            $this->commands([
//              ForceDBCommand::class
            ]);
        }
        UshCategory::observe(CategoryObserver::class);
        view()->composer([
            'ush-p::ush-product.create', 'ush-p::ush-product.update'
        ], BrandComposer::class);

        view()->composer([
            'ush-p::ush-product.create', 'ush-p::ush-product.update'
        ], CategoryComposer::class);

        view()->composer([
            'ush-p::ush-product.create', 'ush-p::ush-product.update'
        ], FeatureComposer::class);

        view()->composer([
            'ush-p::ush-product.create', 'ush-p::ush-product.update'
        ], FitComposer::class);

        view()->composer([
            'ush-p::ush-product.create', 'ush-p::ush-product.update'
        ], GroupComposer::class);

        view()->composer([
            'ush-p::ush-product.create', 'ush-p::ush-product.update'
        ], MaterialComposer::class);

        view()->composer([
            'ush-p::ush-product.create', 'ush-p::ush-product.update'
        ], PriceComposer::class);

        view()->composer([
            'ush-p::ush-product.create', 'ush-p::ush-product.update'
        ], SeasonComposer::class);

        view()->composer([
            'ush-p::ush-product.create', 'ush-p::ush-product.update'
        ], SpecialtySizeComposer::class);

        view()->composer([
            'ush-p::ush-product.create', 'ush-p::ush-product.update'
        ], WeightComposer::class);
    }

    public function register()
    {
        $this->app->bind(UshColorRepository::class, UshColorRepositoryEloquent::class);
        $this->app->bind(UshGroupRepository::class, UshGroupRepositoryEloquent::class);
        $this->app->bind(UshProductRepository::class, UshProductRepositoryEloquent::class);
        $this->app->bind(UshColorProductRepository::class, UshColorProductRepositoryEloquent::class);
        $this->app->bind(UshCategoryRepository::class, UshCategoryRepositoryEloquent::class);
        $this->app->bind(UshSeasonRepository::class, UshSeasonRepositoryEloquent::class);
        $this->app->bind(UshFeatureRepository::class, UshFeatureRepositoryEloquent::class);
        $this->app->bind(UshMaterialRepository::class, UshMaterialRepositoryEloquent::class);
        $this->app->bind(UshBrandRepository::class, UshBrandRepositoryEloquent::class);
        $this->app->bind(UshWeightRepository::class, UshWeightRepositoryEloquent::class);
        $this->app->bind(UshPriceRepository::class, UshPriceRepositoryEloquent::class);
        $this->app->bind(UshFitRepository::class, UshFitRepositoryEloquent::class);
        $this->app->bind(UshSpecialtySizeRepository::class, UshSpecialtySizeRepositoryEloquent::class);
        $this->app->bind(UshSubCategoryRepository::class, UshSubCategoryRepositoryEloquent::class);
    }
}