<?php

namespace App\Http\Controllers;

use App\Models\AllergicHX;
use App\Models\CurrentPregnancyHX;
use App\Models\GynExaminations;
use App\Models\ObsExaminations;
use App\Models\OtherHX;
use App\Models\PastGynHX;
use App\Models\PastMedHX;
use App\Models\PastObsHX;
use App\Models\Pregnanacy;
use App\Models\PresentComplaint;
use App\Models\Ix;
use App\Models\SocialHx;
use App\Models\SocialsHx;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Validation\ValidatesRequests;

class PregnanacyController extends Controller
{
    use ValidatesRequests;
    public function index()
    {
        $pregnanacies = DB::table('pregnanacies')
            ->select(
                'pregnanacies.id',
                'pregnanacies.patient_id',
                'pregnanacies.category',
                'pregnanacies.detail',
                'jthhims.patientdemographic.patientID',
                'jthhims.patientdemographic.patientPersonalTitle',
                'jthhims.patientdemographic.patientName',
                'jthhims.patientdemographic.patientDateofbirth',
                'jthhims.patientdemographic.patientSex',
                'jthhims.department.departmentTitle AS ward',
                'jthhims.admission.BHTClinicFileNo'
            )
            ->join('jthhims.patientdemographic', 'pregnanacies.patient_id', 'jthhims.patientdemographic.patientID')
            ->join('jthhims.admission', 'jthhims.patientdemographic.patientID', 'jthhims.admission.patientID')
            ->join('jthhims.department', 'jthhims.admission.departmentCode', 'jthhims.department.departmentCode')
            ->get();

        // Calculate age
        foreach ($pregnanacies as $pregnanacyAge) {
            $pregnanacyAge->age = Carbon::parse($pregnanacyAge->patientDateofbirth)->age; // Correct field name here
        }

        return view('pages.patientIndex', compact('pregnanacies'));
    }

    public function SearchByPHN(Request $request)
    {
        $PHN = $request->patientID;

        $present_complaints = DB::table('present_complaints')
            ->select('*')
            ->join('pregnanacies', 'present_complaints.pregnancy_id', '=', 'pregnanacies.id')
            ->join('jthhims.patientdemographic', 'pregnanacies.patient_id', '=', 'jthhims.patientdemographic.patientID')
            ->join('jthhims.admission', 'jthhims.patientdemographic.patientID', '=', 'jthhims.admission.patientID')
            ->join('jthhims.department', 'jthhims.admission.departmentCode', '=', 'jthhims.department.departmentCode')
            ->where('jthhims.patientdemographic.patientID', '=', $PHN)
            ->get();

        $current_pregnancy_hxs = DB::table('current_pregnancy_hxs')
            ->select('*')
            ->join('pregnanacies', 'current_pregnancy_hxs.pregnancy_id', '=', 'pregnanacies.id')
            ->join('jthhims.patientdemographic', 'pregnanacies.patient_id', '=', 'jthhims.patientdemographic.patientID')
            ->join('jthhims.admission', 'jthhims.patientdemographic.patientID', '=', 'jthhims.admission.patientID')
            ->join('jthhims.department', 'jthhims.admission.departmentCode', '=', 'jthhims.department.departmentCode')
            ->where('jthhims.patientdemographic.patientID', '=', $PHN)
            ->get();

        $past_obs_hxs = DB::table('past_obs_hxs')
            ->select('*')
            ->join('pregnanacies', 'past_obs_hxs.pregnancy_id', '=', 'pregnanacies.id')
            ->join('jthhims.patientdemographic', 'pregnanacies.patient_id', '=', 'jthhims.patientdemographic.patientID')
            ->join('jthhims.admission', 'jthhims.patientdemographic.patientID', '=', 'jthhims.admission.patientID')
            ->join('jthhims.department', 'jthhims.admission.departmentCode', '=', 'jthhims.department.departmentCode')
            ->where('jthhims.patientdemographic.patientID', '=', $PHN)
            ->get();

        $past_gyn_hxs = DB::table('past_gyn_hxs')
            ->select('*')
            ->join('pregnanacies', 'past_gyn_hxs.pregnancy_id', '=', 'pregnanacies.id')
            ->join('jthhims.patientdemographic', 'pregnanacies.patient_id', '=', 'jthhims.patientdemographic.patientID')
            ->join('jthhims.admission', 'jthhims.patientdemographic.patientID', '=', 'jthhims.admission.patientID')
            ->join('jthhims.department', 'jthhims.admission.departmentCode', '=', 'jthhims.department.departmentCode')
            ->where('jthhims.patientdemographic.patientID', '=', $PHN)
            ->get();

        $past_med_hxs = DB::table('past_med_hxs')
            ->select('*')
            ->join('pregnanacies', 'past_med_hxs.pregnancy_id', '=', 'pregnanacies.id')
            ->join('jthhims.patientdemographic', 'pregnanacies.patient_id', '=', 'jthhims.patientdemographic.patientID')
            ->join('jthhims.admission', 'jthhims.patientdemographic.patientID', '=', 'jthhims.admission.patientID')
            ->join('jthhims.department', 'jthhims.admission.departmentCode', '=', 'jthhims.department.departmentCode')
            ->where('jthhims.patientdemographic.patientID', '=', $PHN)
            ->get();

        $allergic_hxs = DB::table('allergic_hxs')
            ->select('*')
            ->join('pregnanacies', 'allergic_hxs.pregnancy_id', '=', 'pregnanacies.id')
            ->join('jthhims.patientdemographic', 'pregnanacies.patient_id', '=', 'jthhims.patientdemographic.patientID')
            ->join('jthhims.admission', 'jthhims.patientdemographic.patientID', '=', 'jthhims.admission.patientID')
            ->join('jthhims.department', 'jthhims.admission.departmentCode', '=', 'jthhims.department.departmentCode')
            ->where('jthhims.patientdemographic.patientID', '=', $PHN)
            ->get();

        $other_hxs = DB::table('other_hxs')
            ->select('*')
            ->join('pregnanacies', 'other_hxs.pregnancy_id', '=', 'pregnanacies.id')
            ->join('jthhims.patientdemographic', 'pregnanacies.patient_id', '=', 'jthhims.patientdemographic.patientID')
            ->join('jthhims.admission', 'jthhims.patientdemographic.patientID', '=', 'jthhims.admission.patientID')
            ->join('jthhims.department', 'jthhims.admission.departmentCode', '=', 'jthhims.department.departmentCode')
            ->where('jthhims.patientdemographic.patientID', '=', $PHN)
            ->get();

        $gyn_examinations = DB::table('gyn_examinations')
            ->select('*')
            ->join('pregnanacies', 'gyn_examinations.pregnancy_id', '=', 'pregnanacies.id')
            ->join('jthhims.patientdemographic', 'pregnanacies.patient_id', '=', 'jthhims.patientdemographic.patientID')
            ->join('jthhims.admission', 'jthhims.patientdemographic.patientID', '=', 'jthhims.admission.patientID')
            ->join('jthhims.department', 'jthhims.admission.departmentCode', '=', 'jthhims.department.departmentCode')
            ->where('jthhims.patientdemographic.patientID', '=', $PHN)
            ->get();

        $obs_examinations = DB::table('obs_examinations')
            ->select('*')
            ->join('pregnanacies', 'obs_examinations.pregnancy_id', '=', 'pregnanacies.id')
            ->join('jthhims.patientdemographic', 'pregnanacies.patient_id', '=', 'jthhims.patientdemographic.patientID')
            ->join('jthhims.admission', 'jthhims.patientdemographic.patientID', '=', 'jthhims.admission.patientID')
            ->join('jthhims.department', 'jthhims.admission.departmentCode', '=', 'jthhims.department.departmentCode')
            ->where('jthhims.patientdemographic.patientID', '=', $PHN)
            ->get();

        $ixs = DB::table('ixs')
            ->select('*')
            ->join('pregnanacies', 'ixs.pregnancy_id', '=', 'pregnanacies.id')
            ->join('jthhims.patientdemographic', 'pregnanacies.patient_id', '=', 'jthhims.patientdemographic.patientID')
            ->join('jthhims.admission', 'jthhims.patientdemographic.patientID', '=', 'jthhims.admission.patientID')
            ->join('jthhims.department', 'jthhims.admission.departmentCode', '=', 'jthhims.department.departmentCode')
            ->where('jthhims.patientdemographic.patientID', '=', $PHN)
            ->get();

        return response()->json([
            'present_complaints' => $present_complaints,
            'current_pregnancy_hxs' => $current_pregnancy_hxs,
            'past_obs_hxs' => $past_obs_hxs,
            'past_gyn_hxs' => $past_gyn_hxs,
            'past_med_hxs' => $past_med_hxs,
            'allergic_hxs' => $allergic_hxs,
            'other_hxs' => $other_hxs,
            'gyn_examinations' => $gyn_examinations,
            'obs_examinations' => $obs_examinations,
            'ixs' => $ixs
        ]);
    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('search-term');

        $patients = DB::table('jthhims.patientdemographic')
            ->select(
                'jthhims.patientdemographic.patientID',
                'jthhims.patientdemographic.patientPersonalTitle',
                'jthhims.patientdemographic.patientName',
                'jthhims.patientdemographic.patientSex',
                'jthhims.patientdemographic.patientDateofbirth',
                'jthhims.department.departmentTitle AS ward',
                'jthhims.admission.BHTClinicFileNo'
            )
            ->join('jthhims.admission', 'jthhims.patientdemographic.patientID', '=', 'jthhims.admission.patientID')
            ->join('jthhims.department', 'jthhims.admission.departmentCode', '=', 'jthhims.department.departmentCode')
            ->where('jthhims.admission.BHTClinicFileNo', function ($query) use ($searchTerm) {
                $query->select('jthhims.admission.BHTClinicFileNo')
                    ->from('jthhims.admission')
                    ->where('jthhims.admission.patientID', DB::raw('jthhims.patientdemographic.patientID'))
                    ->where(function ($query) use ($searchTerm) {
                        $query->where('jthhims.patientdemographic.patientID', $searchTerm)
                            ->orWhere('jthhims.patientdemographic.patientNIC', $searchTerm)
                            ->orWhere('jthhims.patientdemographic.patientPassport', $searchTerm)
                            ->orWhere('jthhims.patientdemographic.patientContactLand01', $searchTerm)
                            ->orWhere('jthhims.patientdemographic.patientContactLand02', $searchTerm)
                            ->orWhere('jthhims.patientdemographic.patientContactMobile01', $searchTerm)
                            ->orWhere('jthhims.patientdemographic.patientContactMobile02', $searchTerm);
                    })
                    ->orderBy('jthhims.admission.insertedOn', 'desc')
                    ->limit(1);
            })
            ->get();

        if ($patients->isEmpty()) {
            return response()->json(['message' => 'No data found'], 404);
        }

        return response()->json($patients->first());
    }

    public function store(Request $request)
    {
        // $id = $request->id;

        // if ($id == 0) { // create


        //     $pregnanacy = new Pregnanacy();
        // } else { // update

        //     $pregnanacy = Pregnanacy::find($id);
        // }

        $patient = Pregnanacy::where('patient_id', $request->input('input_id_patient'))->first();

        if ($patient) {
            return redirect()->route('patientvisit')
                ->with('message', 'This patient is already registered.');
        } else {

            $pregnanacy = new Pregnanacy();
            $pregnanacy->patient_id = $request->input('input_id_patient');
            $pregnanacy->category = $request->input('category');
            $pregnanacy->detail = $request->input('detail');
            $pregnanacy->save();
            $savedId = $pregnanacy->id; //patient_LAST_SAVED_ID

            // PresentComplaint
            $complaints = $request->input('complaint', []);
            $durations = $request->input('duration', []);
            $severities = $request->input('severity', []);
            $remarksPCs = $request->input('remarksPC', []);

            foreach ($remarksPCs as $key => $remarkPC) {
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
            $pastObsHxRemarks  = $request->input('pastObshx_remark', []);

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
            $pastGynHx->contraception = implode(', ', $request->input('contraception', []));
            $pastGynHx->amount = $request->input('amount');
            $pastGynHx->duration = $request->input('duration');
            $pastGynHx->regularity = $request->input('rdio-primary1');
            $pastGynHx->aub = $request->input('rdio-primary2');
          
            $pastGynHx->subfertility = $request->input('rdio-primary3');
            $pastGynHx->gender = $request->input('gender');
            $pastGynHx->male_factors = implode(', ', $request->input('male_factors', []));
            $pastGynHx->ovulatory_disorder = implode(', ', $request->input('ovulatory_disorder', []));
            $pastGynHx->tubal_factors = implode(', ', $request->input('tubal_factors', []));
            $pastGynHx->uterine_factors = implode(', ', $request->input('uterine_factors', []));
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
            $allergicHx->drugalergyhx = implode(', ', $request->input('drugalergyhx', []));
            $allergicHx->foodallergyhx = $request->input('foodallergyhx', '');
            $allergicHx->otherallergyhx = $request->input('otherallergyhx', '');
            $allergicHx->save();

            //FamilHX

            //END

            $socialHx = new SocialsHx();
            $socialHx->pregnancy_id = $savedId;
            $socialHx->family_status = $request->input('family_status', '');
            $socialHx->monthly_income = $request->input('monthly_income', '');
            $socialHx->patient_education = $request->input('patient_education', '');
            $socialHx->patient_occupation = $request->input('patient_occupation', '');
            $socialHx->patient_social_problem = implode(', ', $request->input('patient_social_problem', []));
            $socialHx->partner_education = $request->input('partner_education', '');
            $socialHx->partner_occupation = $request->input('partner_occupation', '');
            $socialHx->partner_social_problem = implode(', ', $request->input('partner_social_problem', []));
            $socialHx->save();

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

            //MASS
            $gynExamination->site_mass = $request->input('site_mass');
            $gynExamination->size_mass = $request->input('size_mass');
            $gynExamination->percussion_mass = $request->input('percussion_mass');
            $gynExamination->auscultator_mass = $request->input('auscultator_mass');

            $gynExamination->palpation = $request->input('palpation');
            $gynExamination->percussion = $request->input('percussion');
            $gynExamination->auscultation = $request->input('auscultation');
            $gynExamination->inspectionSpeculum = implode(', ', $request->input('inspectionSpeculum', []));
            $gynExamination->stress_incontinence = $request->input('stress_incontinence');
            $gynExamination->cervical_consistency = $request->input('cervical_consistency');
            $gynExamination->os = $request->input('os');
            $gynExamination->polyp_ulcer = $request->input('polyp_ulcer');
            $gynExamination->cervical_motion_tenderness = $request->input('cervical_motion_tenderness');
            $gynExamination->endometrium_tas = $request->input('endometrium_tas');
            $gynExamination->fibroid_tas = $request->input('fibroid_tas');
            $gynExamination->size_tas = $request->input('size_tas');
            $gynExamination->direction_tas = $request->input('direction_tas');
            $gynExamination->ovary_tas = $request->input('ovary_tas');
            $gynExamination->adnexialmass_tas = $request->input('adnexialmass_tas');
            $gynExamination->bladder_tas = $request->input('bladder_tas');
            $gynExamination->free_fluid_tas = $request->input('free_fluid_tas');
            $gynExamination->endometrium_tvs = $request->input('endometrium_tvs');
            $gynExamination->fibroid_tvs = $request->input('fibroid_tvs');
            $gynExamination->size_tvs = $request->input('size_tvs');
            $gynExamination->direction_tvs = $request->input('direction_tvs');
            $gynExamination->cavity_tas = $request->input('cavity_tas');
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
            $obsExamination->inspectionObs = implode(', ', $request->input('inspectionObs', []));
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

            $ix = new Ix();
            $ix->pregnancy_id = $savedId;
            $ix->ctg = $request->input('ctg');
            $ix->tas = $request->input('tas');
            $ix->hb = $request->input('hb');
            $ix->plt = $request->input('plt');
            $ix->wbc = $request->input('wbc');
            $ix->crp = $request->input('crp');
            $ix->urine_full_report = $request->input('urine_full_report');
            $ix->ohtt_bss = $request->input('ohtt_bss');
            $ix->antibiotics = $request->input('antibiotics');
            $ix->plan_delivery = $request->input('plan_delivery');
            $ix->save();
        }
        return redirect()->back()->with('success', 'Complaints saved successfully.');
    }

    public function update(Request $request)
    {
        $id = $request->id;

        $pregnanacy = Pregnanacy::find($id);
        $pregnanacy->patient_id = $request->input('patient');
        $pregnanacy->category = $request->input('category');
        $pregnanacy->detail = $request->input('detail');
        $pregnanacy->save();

        $savedId = $pregnanacy->id;

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
        $pastGynHx->contraception = implode(', ', $request->input('contraception', []));
        $pastGynHx->subfertility = $request->input('rdio-primary3');
        $pastGynHx->gender = $request->input('gender');
        $pastGynHx->male_factors = implode(', ', $request->input('male_factors', []));
        $pastGynHx->ovulatory_disorder = implode(', ', $request->input('ovulatory_disorder', []));
        $pastGynHx->tubal_factors = implode(', ', $request->input('tubal_factors', []));
        $pastGynHx->uterine_factors = implode(', ', $request->input('uterine_factors', []));
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
        $allergicHx->drugalergyhx = implode(', ', $request->input('drugalergyhx', []));
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

        $ix = new Ix();
        $ix->pregnancy_id = $savedId;
        $ix->ctg = $request->input('ctg');
        $ix->tas = $request->input('tas');
        $ix->hb = $request->input('hb');
        $ix->plt = $request->input('plt');
        $ix->wbc = $request->input('wbc');
        $ix->crp = $request->input('crp');
        $ix->urine_full_report = $request->input('urine_full_report');
        $ix->ohtt_bss = $request->input('ohtt_bss');
        $ix->antibiotics = $request->input('antibiotics');
        $ix->plan_delivery = $request->input('plan_delivery');
        $ix->save();

        return redirect()->back()->with('success', 'Complaints saved successfully.');
    }
}
