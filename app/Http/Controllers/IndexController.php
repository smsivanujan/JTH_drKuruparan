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
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function search(Request $request)
    {
        $searchTerm = $request->input('search-term');

        $patients = DB::table('PatientDemographic')
            ->where('patientID', $searchTerm)
            ->orWhere('patientNIC', $searchTerm)
            ->orWhere('patientPassport', $searchTerm)
            ->orWhere('motherBHT', $searchTerm)
            ->orWhere('patientContactLand01', $searchTerm)
            ->orWhere('patientContactLand02', $searchTerm)
            ->orWhere('patientContactMobile01', $searchTerm)
            ->orWhere('patientContactMobile02', $searchTerm)
            ->get();

        if ($patients->isEmpty()) {
            return response()->json(['message' => 'No data found'], 404);
        }

        return response()->json($patients->first());
    }

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
        $durations = $request->input('durations', []);
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

        // $currentPregnancyHX = new CurrentPregnancyHX();
        // $currentPregnancyHX->pregnancy_id = $savedId;
        // $currentPregnancyHX->g = $request->input('g');
        // $currentPregnancyHX->p = $request->input('p');
        // $currentPregnancyHX->c = $request->input('c');
        // $currentPregnancyHX->married_year = $request->input('married_year');
        // $currentPregnancyHX->lmp = $request->input('lmp');
        // $currentPregnancyHX->edd = $request->input('edd');
        // $currentPregnancyHX->working_edd = $request->input('working_edd');
        // $currentPregnancyHX->save();
        $currentPregnancyHX = new CurrentPregnancyHX();
        $currentPregnancyHX->pregnancy_id = $savedId;

        $inputData = array_filter($request->only(['g', 'p', 'c', 'married_year', 'lmp', 'edd', 'working_edd']));

        $currentPregnancyHX->fill($inputData);

        if ($currentPregnancyHX->isDirty()) {
            $currentPregnancyHX->save();
        }

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
        $pastGynHx->menarche_at = $request->input('menarche_at');
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
        $gynExamination->generalGyn = implode(', ', $request->input('generalGyn', []));
        $gynExamination->thyroid_examinationGyn = $request->input('rdio-primary4');
        $gynExamination->height = $request->input('height');
        $gynExamination->weight = $request->input('weight');
        $gynExamination->bmi = $request->input('bmi');
        $gynExamination->temperature = $request->input('temperature');
        $gynExamination->pulse_rate = $request->input('pulse_rate');
        $gynExamination->rhythm = $request->input('rhythm');
        $gynExamination->heart_sound = $request->input('heart_sound');
        $gynExamination->murmur = $request->input('murmur');
        $gynExamination->systolic = $request->input('systolic');
        $gynExamination->diastolic = $request->input('diastolic');
        $gynExamination->breath_sound = $request->input('breath_sound');
        $gynExamination->inspectionGyn = implode(', ', $request->input('inspectionGyn', []));
        $gynExamination->percussion = $request->input('percussion');
        $gynExamination->auscultator = $request->input('auscultator');
        $gynExamination->auscultation = $request->input('auscultation');
        $gynExamination->tenderness = $request->input('tenderness');
        $gynExamination->size = $request->input('size');
        $gynExamination->stress_incontinence = $request->input('stress_incontinence');
        $gynExamination->cervical = $request->input('cervical');
        $gynExamination->os = $request->input('os');
        $gynExamination->polyp_ulcer = $request->input('polyp_ulcer');
        $gynExamination->cervical_motion_tenderness = $request->input('cervical_motion_tenderness');
        $gynExamination->adnexialmass_tas = $request->input('adnexialmass_tas');
        $gynExamination->bladder_tas = $request->input('bladder_tas');
        $gynExamination->free_fluid_tas = $request->input('free_fluid_tas');
        $gynExamination->endometrium_tvs = $request->input('endometrium_tvs');
        $gynExamination->fiber_tvs = $request->input('fiber_tvs');
        $gynExamination->size_tvs = $request->input('size_tvs');
        $gynExamination->direction_tvs = $request->input('direction_tvs');
        $gynExamination->polyps_tvs = $request->input('polyps_tvs');
        $gynExamination->echopic_tvs = $request->input('echopic_tvs');
        $gynExamination->adnexialmass_tvs = $request->input('adnexialmass_tvs');
        $gynExamination->problist = $request->input('problist');
        $gynExamination->medical_hx = $request->input('medical_hx');
        $gynExamination->surgery_hx = $request->input('surgery_hx');
        $gynExamination->save();

        $obsExamination = new ObsExaminations();
        $obsExamination->pregnancy_id = $savedId;
        $obsExamination->generalObs = implode(', ', $request->input('generalObs', []));
        $obsExamination->bp = $request->input('bp');
        $obsExamination->pr = $request->input('pr');
        $obsExamination->thyroid_examinationObs = $request->input('rdio-primary5');
        $gynExamination->inspectionObs = implode(', ', $request->input('inspectionObs', []));
        $obsExamination->sfh = $request->input('sfh');
        $obsExamination->lie = $request->input('lie');
        $obsExamination->position = $request->input('position');
        $obsExamination->engagement = $request->input('rdio-primary6');
        $obsExamination->fhs = $request->input('rdio-primary8');
        $obsExamination->cervical_dilatation = $request->input('cervical_dilatation');
        $obsExamination->cervical_consistency = $request->input('cervical_consistency');
        $obsExamination->cervical_canel = $request->input('cervical_canel');
        $obsExamination->cervical_position = $request->input('cervical_position');
        $obsExamination->station = $request->input('station');
        $obsExamination->fetus = $request->input('fetus');
        $obsExamination->precentation = $request->input('precentation');
        $obsExamination->bpd = $request->input('bpd');
        $obsExamination->ac = $request->input('ac');
        $obsExamination->hc = $request->input('hc');
        $obsExamination->fl = $request->input('fl');
        $obsExamination->crl = $request->input('crl');
        $obsExamination->placental_position = $request->input('placental_position');
        $obsExamination->efw = $request->input('efw');
        $obsExamination->liquor = $request->input('rdio-primary7');
        $obsExamination->dopplier = $request->input('dopplier');
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
