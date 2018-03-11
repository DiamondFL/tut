<?php

namespace ACL\Http\Controllers;

use App\Constants\Page;
use App\Constants\DBConst;
use ACL\Http\Requests\CreateUserRequest;
use ACL\Http\Requests\PasswordUpdateRequest;
use ACL\Http\Requests\ProfileRequest;
use ACL\Http\Requests\UpdateUserRequest;
use ACL\Notifications\BanAccount;
use ACL\Notifications\RenewPassword;
use ACL\Notifications\ResetPassword;
use ACL\Repositories\UserRepository;
use ACL\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    private $repository;
    const TABLE = DBConst::USERS;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        $input = $request->all();
        $data['users'] = $this->repository->myPaginate($input);
        if ($request->ajax()) {
            return view('users.table', $data)->render();
        }
        return view('users.index', $data);
    }

    public function create()
    {
        return view(self::TABLE . '.create');
    }

    public function store(CreateUserRequest $request)
    {
        $input = $request->all();
        $this->repository->store($input);
        return redirect()->route('users.index');
    }

    public function show($id)
    {
        $this->repository->find($id);
    }

    public function edit($id)
    {
        $user = $this->repository->find($id);
        if (empty($user)) {
            session()->flash('error', 'Not found');
            return redirect(route('users.index'));
        }
        session()->flash('success', 'Update Success');
        return view('users.update', compact('user'));
    }

    public function update(UpdateUserRequest $request, $id)
    {
        $input = $request->all();
        $user = $this->repository->find($id);
        if ($this->authorize('update', app(User::class), $user)) {
            if (empty($user)) {
                session()->flash('error', 'Not found');
            } else {
                $this->repository->change($input, $user);
                session()->flash('success', 'Update Success');
            }
            return redirect(route('users.index'));
        }
    }

    public function destroy($id)
    {
        if (request()->ajax()) {
            $data = $this->repository->destroys(request()->get('id'));
            return response()->json($data);
        }
        $user = $this->repository->find($id);
        if (empty($user)) {
            session()->flash('error', 'Not found');
        }
        $user = $this->repository->destroy($user);
        session()->flash('success', 'Update Success');
        return redirect(route('users.index'));
    }

    public function profile()
    {
        $user = auth()->user();
        return view('users.profile', compact('user'));
    }

    public function updateProfile($id, ProfileRequest $request)
    {
        $input = $request->all();
        $user = $this->repository->find($id);
        if ($this->authorize('update', app(User::class), $user)) {
            if (empty($user)) {
                session()->flash('error', 'Not found');
            } else {
                $this->repository->change($input, $user);
                session()->flash('success', 'Update Success');
            }
            return redirect()->back();
        }
    }

    public function changePassword(PasswordUpdateRequest $request)
    {
        $input = $request->all();
        if (!Auth::attempt(['email' => auth()->user()->email, 'password' => $input['old_password']])) {
            session()->flash('error', 'Password incorrect');
            return redirect()->back();
        }
        $id = auth()->id();
        $password = Hash::make($input['new_password']);
        $this->repository->update(['password' => $password], $id);
        session()->flash('success', 'Change password success');
        return redirect()->back();
    }

    public function renewPassword($id)
    {
        $user = $this->repository->find($id);
        if ($this->authorize('update', app(User::class), $user)) {
            if (empty($user)) {
                session()->flash('error', 'Not found');
            }
            $password = str_random(6);
            $this->repository->update(['password' => bcrypt($password)], $id);
            $user->notify(new RenewPassword($password));
            session()->flash('success', 'Change password success');
            return redirect()->back();
        }
    }

    public function ban($id)
    {
        $user = $this->repository->find($id);
        if ($this->authorize('update', app(User::class), $user)) {
            if (empty($user)) {
                session()->flash('error', 'Not found');
            }
            if($user->active == 1 ) {
                $active = 0;
                $activeName = 'Inactive';
            } else {
                $active = 1;
                $activeName = 'Active';
            }
            $this->repository->update(['active' => $active], $id);
            $user->notify(new BanAccount($activeName));
            session()->flash('success', $activeName . ' user success');
            return redirect()->back();
        }
    }
}
