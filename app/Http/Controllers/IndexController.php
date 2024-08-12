<?php

namespace App\Http\Controllers;

use App\Models\AllergicHX;
use App\Models\CurrentPregnancyHX;
use App\Models\GynExaminations;
use App\Models\Index;
use App\Models\ObsExaminations;
use App\Models\OtherHX;
use App\Models\PastGynHX;
use App\Models\PastMedHX;
use App\Models\PastObsHX;
use App\Models\Pregnanacy;
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
        // $pregnanacy = new Pregnanacy();
        // $pregnanacy->patient_id = $request->input('patient_id');
        // $pregnanacy->category = $request->input('category');
        // $pregnanacy->detail = $request->input('detail');
        // $pregnanacy->save();

        // $savedId = $pregnanacy->id;
        $savedId = 1;

        $complaints = $request->input('complaint', []);
        $durations = $request->input('duration', []);
        $severities = $request->input('severity', []);
        $remarksPC = $request->input('remarksPC', []);

        foreach ($remarksPC as $key => $remarkPC) {
            $presentComplaint = new PresentComplaint();
            $presentComplaint->pregnancy_id = $savedId;
            $presentComplaint->complaint = $complaints[$key] ?? null;
            $presentComplaint->duration = $durations[$key] ?? null;
            $presentComplaint->severity = $severities[$key] ?? null;
            $presentComplaint->remarks = $remarkPC;
            $presentComplaint->save();
        }

        $currentPregnancyHX = new CurrentPregnancyHX();
        $currentPregnancyHX->pregnancy_id = $savedId;
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
        $pastObsHxRemarks  = $request->input('pastObshx_remarks', []);

        foreach ($pastObsHxRemarks as $key => $pastObsHxremark) {
            $pastObsHX = new PastObsHX();
            $pastObsHX->pregnancy_id = $savedId;
            $pastObsHX->year = $years[$key] ?? null;
            $pastObsHX->poa = $poas[$key] ?? null;
            $pastObsHX->mod = $mods[$key] ?? null;
            $pastObsHX->birth_weight = $birthWeights[$key] ?? null;
            $pastObsHX->remarks = $pastObsHxremark;
            $pastObsHX->save();
        }

        $pastGynHx = new PastGynHX();
        $pastGynHx->pregnancy_id = $savedId;
        $pastGynHx->age = $request->input('age');
        $pastGynHx->amount = $request->input('amount');
        $pastGynHx->duration = $request->input('duration');
        $pastGynHx->status = $request->input('rdio-primary1');
        $pastGynHx->aub = $request->input('rdio-primary2');
        $pastGynHx->contraception = json_encode($request->input('contraception', []));
        $pastGynHx->subfertility = $request->input('rdio-primary3');
        $pastGynHx->gender = $request->input('gender');
        $pastGynHx->male_factors = json_encode($request->input('male_factors', []));
        $pastGynHx->ovulatory_disorder = json_encode($request->input('ovulatory_disorder', []));
        $pastGynHx->tubal_factors = json_encode($request->input('tubal_factors', []));
        $pastGynHx->uterine_factors = json_encode($request->input('uterine_factors', []));
        $pastGynHx->save();

        $pastMedHxs = $request->input('pastmedhx', []);
        $PastMedhxRemarks = $request->input('pastMedHx_remarks', []);

        foreach ($PastMedhxRemarks as $key => $PastMedhxRemark) {
            $pastMedHX = new PastMedHX();
            $pastMedHX->pregnancy_id = $savedId;
            $pastMedHX->past_med_hx = $pastMedHxs[$key] ?? null;
            $pastMedHX->remarks = $PastMedhxRemark;
            $pastMedHX->save();
        }

        $allergicHx = new AllergicHX();
        $allergicHx->pregnancy_id = $savedId;
        $allergicHx->drugalergyhx = json_encode($request->input('drugalergyhx', []));
        $allergicHx->foodallergyhx = $request->input('foodallergyhx', '');
        $allergicHx->otherallergyhx = $request->input('otherallergyhx', '');
        $allergicHx->save();

        $otherHx = new OtherHX();
        $otherHx->pregnancy_id = $savedId;
        $otherHx->past_surgery_hx = $request->input('pastsurgeryhx', '');
        $otherHx->family_hx = $request->input('familyhx', '');
        $otherHx->social_hx = $request->input('socialhx', '');
        $otherHx->save();

        $gynExamination = new GynExaminations();
        $gynExamination->pregnancy_id = $savedId;
        $gynExamination->general = implode(', ', $request->input('generalGyn', []));
        $gynExamination->height = $request->input('height');
        $gynExamination->weight = $request->input('weight');
        $gynExamination->bmi = $request->input('bmi');
        $gynExamination->temperature = $request->input('temperature');
        $gynExamination->system = implode(', ', $request->input('system', []));
        $gynExamination->pulse_rate = $request->input('pulse_rate');
        $gynExamination->rhythm = $request->input('rhythm');
        $gynExamination->systolic = $request->input('systolic');
        $gynExamination->diastolic = $request->input('diastolic');
        $gynExamination->heart_sound = $request->input('heart_sound');
        $gynExamination->memor = $request->input('memor');
        $gynExamination->breath_sound = $request->input('breath_sound');
        $gynExamination->thyroid_examination = $request->input('rdio-primary4');
        $gynExamination->abd_examination = $request->input('abdexamination');
        $gynExamination->inspection = $request->input('inspectionSpeculum');
        $gynExamination->stress_incontinence = $request->input('stress_incontinence');
        $gynExamination->cervical = $request->input('cervical');
        $gynExamination->os = $request->input('os');
        $gynExamination->polyp_ulcer = $request->input('polyp/ulcer');
        $gynExamination->cervical_motion_tenderness = $request->input('cervicalmotiontenderness');
        $gynExamination->direction = $request->input('direction');
        $gynExamination->adnexial_mass = $request->input('adnexialmass');
        $gynExamination->tas_uterus = $request->input('tas_uterus');
        $gynExamination->tvs_uterus = $request->input('tvs_uterus');
        $gynExamination->endometrium = $request->input('endometrium');
        $gynExamination->adnexial_mass_scan = $request->input('adnexial_mass_scan');
        $gynExamination->problist = $request->input('problist');
        $gynExamination->medical_hx = $request->input('medical_hx');
        $gynExamination->surgery_hx = $request->input('surgery_hx');
        $gynExamination->save();

        $obsExamination = new ObsExaminations();
        $obsExamination->pregnancy_id = $savedId;
        $obsExamination->general = implode(', ', $request->input('generalObs', []));
        // $obsExamination->pallor = $request->has('pallor') ? 'Pallor' : null;
        // $obsExamination->odema = $request->has('odema') ? 'Odema' : null;
        $obsExamination->bp = $request->input('bp', '');
        $obsExamination->pr = $request->input('pr', '');
        $obsExamination->thyroid_examination = $request->input('rdio-primary5', '');
        $obsExamination->inspection = $request->input('inspection', '');
        $obsExamination->sfh = $request->input('sfh', '');
        $obsExamination->precentation = $request->input('precentation', '');
        $obsExamination->lie = $request->input('lie', '');
        $obsExamination->position = $request->input('position', '');
        $obsExamination->efw = $request->input('efw', '');
        $obsExamination->engagement = $request->input('rdio-primary6', '');
        $obsExamination->liquor = $request->input('rdio-primary7', '');
        $obsExamination->fhs = $request->input('rdio-primary8', '');
        $obsExamination->cervical_dilatation = $request->input('cervical_dilatation', '');
        $obsExamination->effacement = $request->input('effacement', '');
        $obsExamination->station = $request->input('station', '');
        $obsExamination->cervical_consistency = $request->input('cervical_consistency', '');
        $obsExamination->cervical_position = $request->input('cervical_position', '');
        $obsExamination->ctg = $request->input('ctg', '');
        $obsExamination->tas = $request->input('tas', '');
        $obsExamination->hb = $request->input('hb', '');
        $obsExamination->plt = $request->input('plt', '');
        $obsExamination->wbc = $request->input('wbc', '');
        $obsExamination->crp = $request->input('crp', '');
        $obsExamination->urine_full_report = $request->input('urine_full_report', '');
        $obsExamination->ohtt_bss = $request->input('ohtt/bss', '');
        $obsExamination->antibiotics = $request->input('antibiotics', '');
        $obsExamination->plan_delivery = $request->input('plan_delivery', '');
        $obsExamination->save();

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
