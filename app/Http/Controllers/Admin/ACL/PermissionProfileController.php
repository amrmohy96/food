<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Profile;
use Illuminate\Http\Request;

class PermissionProfileController extends Controller
{
    private $profile, $permission;

    public function __construct(Profile $profile, Permission $permission)
    {
        $this->profile = $profile;
        $this->permission = $permission;
    }

    // profile id
    public function permissions($id)
    {
        $profile = $this->profile->find($id);
        $permissions = $profile->permissions()->paginate(2);
        return view('admin.pages.profiles.permissions.index', compact('profile', 'permissions'));
    }
    // permission id
    public function profiles($id)
    {
        $permission = $this->permission->find($id);
        $profiles = $permission->profiles()->paginate(2);
        return view('admin.pages.permissions.profiles.index', compact('permission', 'profiles'));
    }

    // available permissions
    public function available(Request $request , $id)
    {
        $profile = $this->profile->find($id);
        $permissions = $profile->getAvailablePermission($request);

        return view('admin.pages.profiles.permissions.available', compact('profile', 'permissions'));
    }

    public function attach(Request $request, $id)
    {
        $profile = $this->profile->find($id);
        if (!$profile) {
            return redirect()->back();
        }
        if(!$request->permissions  ||count($request->permissions) == 0){
            session()->flash('error', __('no permission selected '));
        }
        $profile->permissions()->attach($request->permissions);
        session()->flash('success', __('success'));
        return redirect()->route('profiles.permissions',$profile->id);

    }
    public function detach($profileId,$permissionId){
        $profile = $this->profile->find($profileId);
        $permission = $this->permission->find($permissionId);
        if (!$profile || !$permission) {
            return redirect()->back();
        }
        $profile->permissions()->detach($permission);
        session()->flash('success', __('permission deleted'));
        return redirect()->route('profiles.permissions',$profile->id);
    }
}
