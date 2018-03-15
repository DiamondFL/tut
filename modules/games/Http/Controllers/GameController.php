<?php
/**
 * Created by PhpStorm.
 * User: JK
 * Date: 3/16/2018
 * Time: 12:17 AM
 */

namespace Games\Http\Controllers;


class GameController
{
    function index()
    {
        return view('gm::game.index');
    }
}