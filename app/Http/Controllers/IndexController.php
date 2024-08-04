<?php

namespace App\Http\Controllers;

use App\Models\CurrentPregnancyHX;
use App\Models\Index;
use App\Models\OtherHX;
use App\Models\PastGynHX;
use App\Models\PastMedHX;
use App\Models\PastObsHX;
use App\Models\PresentComplaint;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $complaints = $request->input('complaint', []);
        $durations = $request->input('duration', []);
        $severities = $request->input('severity', []);
        $remarks = $request->input('remarks', []);

        foreach ($remarks as $key => $remark) {
            $presentComplaint = new PresentComplaint();
            $presentComplaint->complaint = $complaints[$key] ?? null;
            $presentComplaint->duration = $durations[$key] ?? null;
            $presentComplaint->severity = $severities[$key] ?? null;
            $presentComplaint->remarks = $remark;
            $presentComplaint->save();
        }

        $currentPregnancyHX = new CurrentPregnancyHX();
        $currentPregnancyHX->g = $request->input('g');
        $currentPregnancyHX->p = $request->input('p');
        $currentPregnancyHX->c = $request->input('c');
        $currentPregnancyHX->married_year = $request->input('married_year');
        $currentPregnancyHX->lmp = $request->input('lmp');
        $currentPregnancyHX->edd = $request->input('edd');
        $currentPregnancyHX->working_edd = $request->input('working_edd');
        $currentPregnancyHX->save();

        $years = $request->input('year', []);
        $poas = $request->input('poa', []);
        $mods = $request->input('mod', []);
        $birthWeights = $request->input('birth_weight', []);
        $remarks = $request->input('remarks', []);

        foreach ($remarks as $key => $remark) {
            $pastObstetricHX = new PastObsHX();
            $pastObstetricHX->year = $years[$key] ?? null;
            $pastObstetricHX->poa = $poas[$key] ?? null;
            $pastObstetricHX->mod = $mods[$key] ?? null;
            $pastObstetricHX->birth_weight = $birthWeights[$key] ?? null;
            $pastObstetricHX->remarks = $remark;
            $pastObstetricHX->save();
        }

        $pastGynHx = new PastGynHX();
        $pastGynHx->age = $request->input('age');
        $pastGynHx->amount = $request->input('amount');
        $pastGynHx->duration = $request->input('duration');
        $pastGynHx->status = $request->input('status');
        $pastGynHx->aub = $request->input('aub');
        $pastGynHx->contraception = $request->input('contraception', []);
        $pastGynHx->subfertility = $request->input('subfertility');
        $pastGynHx->gender = $request->input('gender');
        $pastGynHx->male_factors = $request->input('male_factors', []);
        $pastGynHx->ovulatory_disorder = $request->input('ovulatory_disorder', []);
        $pastGynHx->tubal_factors = $request->input('tubal_factors', []);
        $pastGynHx->uterine_factors = $request->input('uterine_factors', []);
        $pastGynHx->save();

        $pastMedHxDatas = $request->input('pastmedhx', []);
        $remarksDatas = $request->input('remarks', []);

        foreach ($remarksDatas as $key => $remarksData) {
            $pastMedHX = new PastMedHX();
            $pastMedHX->past_med_hx = $pastMedHxDatas;
            $pastMedHX->remarks = $remarksData[$key] ?? null;
            $pastMedHX->save();
        }

        $otherHx = new OtherHX();
        $otherHx->drugalergyhx = implode(', ', $request->input('drugalergyhx', []));
        $otherHx->food_allergy_hx = $request->input('food_allergy_hx');
        $otherHx->past_surgery_hx = $request->input('past_surgery_hx');
        $otherHx->family_hx = $request->input('family_hx');
        $otherHx->social_hx = $request->input('social_hx');
        $otherHx->save();

        

        return redirect()->back()->with('success', 'Complaints saved successfully.');
    }

    public function show(Index $index)
    {
        //
    }

    public function edit(Index $index)
    {
        //
    }

    public function update(Request $request, Index $index)
    {
        //
    }

    public function destroy(Index $index)
    {
        //
    }
}
