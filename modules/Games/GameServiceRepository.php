<?php
/**
 * Created by PhpStorm.
 * User: JK
 * Date: 3/15/2018
 * Time: 8:16 PM
 */

namespace Games;


use Illuminate\Support\ServiceProvider;

class GameServiceRepository extends ServiceProvider
{
    public function boot() {
        $this->loadRoutesFrom(__DIR__ . '/router.php');
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'gm');
        $this->loadJsonTranslationsFrom(__DIR__ .'/database');
        $this->loadJsonTranslationsFrom(__DIR__ . '/resources/lang');
    }

    public function register() {

    }
}