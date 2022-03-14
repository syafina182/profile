<?php

namespace App\Http\Controllers\Backend\Auth\User;

use App\Events\Backend\Auth\User\UserDeleted;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Auth\User\ManageUserRequest;
use App\Http\Requests\Backend\Auth\User\StoreUserRequest;
use App\Http\Requests\Backend\Auth\User\UpdateUserRequest;
use App\Models\Auth\User;
use App\Repositories\Backend\Auth\PermissionRepository;
use App\Repositories\Backend\Auth\RoleRepository;
use App\Repositories\Backend\Auth\UserRepository;
use Illuminate\Http\UploadedFile;

/**
 * Class UserController.
 */
class UserController extends Controller
{
    /**
     * @var UserRepository
     */
    protected $userRepository;

    /**
     * UserController constructor.
     *
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param ManageUserRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ManageUserRequest $request)
    {
        return view('backend.auth.user.index')
            ->withUsers($this->userRepository->getActivePaginated(25, 'id', 'asc'));
    }

    /**
     * @param ManageUserRequest    $request
     * @param RoleRepository       $roleRepository
     * @param PermissionRepository $permissionRepository
     *
     * @return mixed
     */
    public function create(ManageUserRequest $request, RoleRepository $roleRepository, PermissionRepository $permissionRepository)
    {
        return view('backend.auth.user.create')
            ->withRoles($roleRepository->with('permissions')->get(['id', 'name']))
            ->withPermissions($permissionRepository->get(['id', 'name']));
    }

    /**
     * @param StoreUserRequest $request
     *
     * @throws \Throwable
     * @return mixed
     */
    public function store(StoreUserRequest $request)
    {
        if($request->avatar){
            $file = $request->file('avatar');
            $name = $file->getClientOriginalName();
            $file->move(storage_path().'/app/public/avatar/', $name);
            $pathimg = 'avatar/'.$name;
        } else {
            $pathimg = "";
        }

        User::create([
            'first_name' => $request->first_name,
            'username' => $request->username,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'occupation' => $request->occupation,
            'address' => $request->address,
            'gender' => $request->gender,
            'avatar_type' => 'storage',
            'avatar_location' => $pathimg,
            'password' => 'admin',
        ]);

        return redirect()->route('admin.auth.user.index')->withFlashSuccess(__('alerts.backend.users.created'));
    }

    /**
     * @param ManageUserRequest $request
     * @param User              $user
     *
     * @return mixed
     */
    public function show(ManageUserRequest $request, User $user)
    {
        return view('backend.auth.user.show')
            ->withUser($user);
    }

    /**
     * @param ManageUserRequest    $request
     * @param RoleRepository       $roleRepository
     * @param PermissionRepository $permissionRepository
     * @param User                 $user
     *
     * @return mixed
     */
    public function edit(ManageUserRequest $request, RoleRepository $roleRepository, PermissionRepository $permissionRepository, User $user)
    {
        return view('backend.auth.user.edit')
            ->withUser($user)
            ->withRoles($roleRepository->get())
            ->withUserRoles($user->roles->pluck('name')->all())
            ->withPermissions($permissionRepository->get(['id', 'name']))
            ->withUserPermissions($user->permissions->pluck('name')->all());
    }

    /**
     * @param UpdateUserRequest $request
     * @param User              $user
     *
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     * @return mixed
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        if($request->avatar){
            $file = $request->file('avatar');
            $name = $file->getClientOriginalName();
            $file->move(storage_path().'/app/public/avatar/', $name);
            $pathimg = 'avatar/'.$name;
        } else {
            $pathimg = $user->avatar_location;
        }

        User::where('id', $user->id)->update([
            'first_name' => $request->first_name,
            'username' => $request->username,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'occupation' => $request->occupation,
            'address' => $request->address,
            'gender' => $request->gender,
            'avatar_type' => $user->avatar_type,
            'avatar_location' => $pathimg,
        ]);

        return redirect()->route('admin.auth.user.index')->withFlashSuccess(__('alerts.backend.users.updated'));
    }

    /**
     * @param ManageUserRequest $request
     * @param User              $user
     *
     * @throws \Exception
     * @return mixed
     */
    public function destroy($id)
    {
        User::where('id',$id)->delete();

        return redirect()->back()->withFlashSuccess(__('alerts.backend.users.deleted'));
    }

    /**
     *
     * @throws \Exception
     * @return mixed
     */
    public function guest()
    {
        return view('backend.auth.user.guest');
    }
}
