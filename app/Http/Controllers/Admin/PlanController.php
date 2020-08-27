<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdatePlan;
use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    private $repo;

    public function __construct(Plan $plan)
    {
        $this->repo = $plan;
    }

    public function index(Request $request)
    {
        $plans = $this->repo->search($request)->latest()->paginate(2);
        return view('admin.pages.plans.index', compact('plans'));
    }

    public function create()
    {
        return view('admin.pages.plans.create');
    }


    public function store(StoreUpdatePlan $request)
    {
        $this->repo->create($request->all());
        session()->flash('success', __('saved'));
        return redirect()->route('plans.index');
    }


    public function show($url)
    {
        $plan = $this->repo->where('url', $url)->first();
        return view('admin.pages.plans.show', compact('plan'));
    }


    public function edit($url)
    {
        $plan = $this->repo->where('url', $url)->first();
        return view('admin.pages.plans.edit', compact('plan'));
    }


    public function update(StoreUpdatePlan $request, $url)
    {
        $plan = $this->repo->where('url', $url)->first();
        $plan->update($request->all());
        return redirect()->route('plans.index');
    }

    public function destroy($url)
    {
        $plan = $this->repo->where('url', $url);
        $plan->delete();
        return redirect()->route('plans.index');
    }
}
