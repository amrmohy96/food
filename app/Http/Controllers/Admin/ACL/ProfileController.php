<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateProfile;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    private $repo;

    public function __construct(Profile $profile)
    {
        $this->repo = $profile;
    }

    public function index(Request $request)
    {
        $profiles = $this->repo->search($request)->latest()->paginate(2);
        return view('admin.pages.profiles.index', compact('profiles'));
    }


    public function create()
    {
        return view('admin.pages.profiles.create');
    }

    public function store(StoreUpdateProfile $request)
    {
        $this->repo->create($request->all());
        session()->flash('success', __('data saved'));
        return redirect()->route('profiles.index');
    }


    public function show($id)
    {
        $profile = $this->repo->find($id);
        return view('admin.pages.profiles.show', compact('profile'));
    }

    public function edit($id)
    {
        $profile = $this->repo->find($id);
        return view('admin.pages.profiles.edit', compact('profile'));
    }

    public function update(StoreUpdateProfile $request, $id)
    {
        $profile = $this->repo->find($id);
        $profile->update($request->all());
        session()->flash('success', __('data updated'));
        return redirect()->route('profiles.index');
    }


    public function destroy($id)
    {
        $profile = $this->repo->find($id);
        $profile->delete();
        session()->flash('success', __('data deleted'));
        return redirect()->route('profiles.index');
    }
}
