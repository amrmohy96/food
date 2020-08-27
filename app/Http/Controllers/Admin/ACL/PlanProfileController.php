<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Models\Profile;
use Illuminate\Http\Request;

class PlanProfileController extends Controller
{
    private $plan, $profile;

    public function __construct(Plan $plan, Profile $profile)
    {
        $this->profile = $profile;
        $this->plan = $plan;
    }

    // plan id, get all profiles with this plan.
    public function profiles($id)
    {
        $plan = $this->plan->find($id);
        $profiles = $plan->profiles()->paginate();
        $allProfiles = Profile::all();
        return view('admin.pages.plans.profiles.index', compact('plan', 'profiles','allProfiles'));
    }

    // profile id , get all plans
    public function plans($id)
    {
        $profile = $this->profile->find($id);
        $plans = $profile->plans()->paginate();
        return view('admin.pages.profiles.plans.index', compact('profile', 'plans'));
    }

    // get available profiles, plan id
    public function available(Request $request,$id)
    {
        $plan = $this->plan->find($id);
        $profiles = $plan->getAvailableProfiles($request);
        return view('admin.pages.plans.profiles.available', compact('plan','profiles'));
    }

    // attach profiles to plan,plan id
    public function attach(Request $request ,$id)
    {
        $plan = $this->plan->find($id);
        if(!$request->profiles ||count($request->profiles) == 0){
            session()->flash('error', __('select an profile'));
            return  redirect()->back();
        }
        $plan->profiles()->attach($request->profiles);
        session()->flash('success', __('added successfully'));
        return redirect()->route('plans.profiles',$plan->id);
    }
    // plan id , and profile id
    public function detach($planId,$profileId)
    {
        $plan = $this->plan->find($planId);
        $profile = $this->profile->find($profileId);
        if(!$profile || !$plan){
            return redirect()->back();
        }
        $plan->profiles()->detach($profile);
        session()->flash('success', __('deleted successfully'));
        return redirect()->route('plans.profiles',$plan->id);
    }
}
