<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdatePlanDetail;
use App\Models\DetailPlan;
use App\Models\Plan;
use Illuminate\Http\Request;

class DetailPlanController extends Controller
{
    private $repository, $plan;

    public function __construct(DetailPlan $detailPlan, Plan $plan)
    {
        $this->repository = $detailPlan;
        $this->plan = $plan;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($urlPlan)
    {
        if(!$plan = $this->plan->where('url', $urlPlan)->first())
            return redirect()->back();

        $details = $plan->details()->paginate();
        return view('admin.pages.plans.details.index', compact('plan', 'details'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($urlPlan)
    {
        if(!$plan = $this->plan->where('url', $urlPlan)->first())
            return redirect()->back();

        return view('admin.pages.plans.details.create', compact('plan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdatePlanDetail $request, $urlPlan)
    {
        if(!$plan = $this->plan->where('url', $urlPlan)->first())
            return redirect()->back();

        $plan->details()->create($request->all());
        $details = $plan->details()->paginate();

        return redirect()->route('plans.details.index', $plan->url);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idDetail)
    {
        if(!$detail = $this->repository->find($idDetail))
            return redirect()->back();

        $plan = $this->plan->where('url', $detail->plan()->first()->url)->first();

        return view('admin.pages.plans.details.show', compact('plan', 'detail')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idDetail)
    {
        if(!$detail = $this->repository->find($idDetail))
            return redirect()->back();

        $plan = $this->plan->where('url', $detail->plan()->first()->url)->first();

        return view('admin.pages.plans.details.edit', compact('plan', 'detail'));  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdatePlanDetail $request, $idDetail)
    {
        if(!$detail = $this->repository->find($idDetail))
            return redirect()->back();

        $plan = $this->plan->where('url', $detail->plan()->first()->url)->first();

        $detail->update($request->all());

        return redirect()->route('plans.details.index', $plan->url);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idDetail)
    {
        if(!$detail = $this->repository->find($idDetail))
            return redirect()->back();

        $detail->delete();

        $plan = $this->plan->where('url', $detail->plan()->first()->url)->first();
        return redirect()->route('plans.details.index', $plan->url)
            ->with('message', 'Registro deletado com sucesso!');
    }
}
