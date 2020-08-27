<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateDetailPlan;
use App\Models\DetailPlan;
use App\Models\Plan;
use Illuminate\Http\Request;

class DetailPlanController extends Controller
{
    protected $repo, $plan;

    public function __construct(DetailPlan $detailPlan, Plan $plan)
    {
        $this->repo = $detailPlan;
        $this->plan = $plan;
    }

    public function index($url)
    {
        if (!$plan = $this->plan->where('url', $url)->first()) {
            return redirect()->back();
        }

        // $details = $plan->details();
        $details = $plan->details()->paginate(2);
        return view('admin.pages.plans.details.index', compact('plan', 'details'));
    }

    public function create($url)
    {
        $plan = $this->plan->where('url', $url)->first();
        return view('admin.pages.plans.details.create', compact('plan'));
    }

    public function store(StoreUpdateDetailPlan $request, $url)
    {
        $plan = $this->plan->where('url', $url)->first();
        $plan->details()->create($request->all());
        session()->flash('success', __('data added successfully'));
        return redirect()->route('details.index', $plan->url);
    }


    public function show($url,$id)
    {
        $plan = $this->plan->where('url', $url)->first();
        $detail = $this->repo->find($id);
        return $detail;
    }

    public function edit($url, $id)
    {
        $plan = $this->plan->where('url', $url)->first();
        $detail = $this->repo->find($id);
        return view('admin.pages.plans.details.edit', compact('plan', 'detail'));
    }

    public function update(StoreUpdateDetailPlan $request, $url, $id)
    {
        $plan = $this->plan->where('url', $url)->first();
        $detail = $this->repo->find($id);
        $detail->update($request->all());
        session()->flash('success', __('data updated successfully'));
        return redirect()->route('details.index', $plan->url);
    }

    public function destroy($url,$id)
    {
        $plan = $this->plan->where('url', $url)->first();
        $detail = $this->repo->find($id);
        $detail->delete();
        session()->flash('success', __('data deleted successfully'));
        return redirect()->route('details.index', $plan->url);
    }
}
