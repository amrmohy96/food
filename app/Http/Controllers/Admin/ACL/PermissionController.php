<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdatePermission;
use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    private $repo;

    public function __construct(Permission $permission)
    {
        $this->repo = $permission;
    }

    public function index(Request $request)
    {
        $permissions = $this->repo->search($request)->latest()->paginate(2);
        return view('admin.pages.permissions.index', compact('permissions'));
    }


    public function create()
    {
        return view('admin.pages.permissions.create');
    }

    public function store(StoreUpdatePermission $request)
    {
        $this->repo->create($request->all());
        session()->flash('success', __('data saved'));
        return redirect()->route('permissions.index');
    }


    public function show($id)
    {
        $permission = $this->repo->find($id);
        return view('admin.pages.permissions.show', compact('permission'));
    }

    public function edit($id)
    {
        $permission = $this->repo->find($id);
        return view('admin.pages.permissions.edit', compact('permission'));
    }

    public function update(StoreUpdatePermission $request, $id)
    {
        $permission = $this->repo->find($id);
        $permission->update($request->all());
        session()->flash('success', __('data updated'));
        return redirect()->route('permissions.index');
    }


    public function destroy($id)
    {
        $permission = $this->repo->find($id);
        $permission->delete();
        session()->flash('success', __('data deleted'));
        return redirect()->route('permissions.index');
    }
}
