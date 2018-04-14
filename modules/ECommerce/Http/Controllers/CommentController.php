<?php
/**
 * Created by PhpStorm.
 * User: tttt
 * Date: 5/27/2015
 * Time: 9:19 AM
 */
namespace ECommerce\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class CommentController extends BaseController{
    public function postInsertComment(){
        $userId = Input::get('userId');
        $comment = Input::get('comment');
        $oopId = Input::get('oopId');
        $c = new Comments();
        $c->newComments($userId, $comment, $oopId);
        return Response::json($userId.'-'.$comment);
    }
} 