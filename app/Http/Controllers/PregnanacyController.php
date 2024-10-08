<?php

namespace App\Http\Controllers;

use App\Models\AllergicHX;
use App\Models\CurrentPregnancyHX;
use App\Models\GynExaminations;
use App\Models\Investigation;
use App\Models\Management;
use App\Models\ManagementDrugs;
use App\Models\NewBornStatus;
use App\Models\ObsExaminations;
use App\Models\OtherHX;
use App\Models\PastGynHX;
use App\Models\PastMedHX;
use App\Models\PastMedHxDrugs;
use App\Models\PastObsHX;
use App\Models\Pregnanacy;
use App\Models\PresentComplaint;
use App\Models\SocialHx;
use App\Models\Summery;
use App\Models\VitalMonitoring;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Validation\ValidatesRequests;

class PregnanacyController extends Controller
{
    use ValidatesRequests;
    public function index($PHN = null)
    {
        $pregnancies = DB::table('pregnancies')
            ->select(
                'pregnancies.id',
                'pregnancies.patient_id',
                'pregnancies.category',
                'pregnancies.detail',
                'jthhims.patientdemographic.patientID',
                'jthhims.patientdemographic.patientPersonalTitle',
                'jthhims.patientdemographic.patientName',
                'jthhims.patientdemographic.patientDateofbirth',
                'jthhims.patientdemographic.patientSex',
                'jthhims.department.departmentTitle AS ward',
                'jthhims.admission.BHTClinicFileNo'
            )
            ->join('jthhims.patientdemographic', 'pregnancies.patient_id', 'jthhims.patientdemographic.patientID')
            ->join('jthhims.admission', 'jthhims.patientdemographic.patientID', 'jthhims.admission.patientID')
            ->join('jthhims.department', 'jthhims.admission.departmentCode', 'jthhims.department.departmentCode')
            ->get();

        // Calculate age
        foreach ($pregnancies as $pregnanacyAge) {
            $pregnanacyAge->age = Carbon::parse($pregnanacyAge->patientDateofbirth)->age; // Correct field name here
        }

        // Fetch past medical history if $PHN is provided
        $past_med_hxs = [];
        if ($PHN) {
            $past_med_hxs = DB::table('past_med_hxs')
                ->select('*')
                ->join('pregnancies', 'past_med_hxs.pregnancy_id', '=', 'pregnancies.id')
                ->join('jthhims.patientdemographic', 'pregnancies.patient_id', '=', 'jthhims.patientdemographic.patientID')
                ->join('jthhims.admission', 'jthhims.patientdemographic.patientID', '=', 'jthhims.admission.patientID')
                ->join('jthhims.department', 'jthhims.admission.departmentCode', '=', 'jthhims.department.departmentCode')
                ->where('jthhims.patientdemographic.patientID', '=', $PHN)
                ->get();
        }

        $drugAllergies = DB::table('pharmacy_module.phm_virtualitems')
            ->select(
                'pharmacy_module.phm_virtualitems.virtualItemId',
                'pharmacy_module.phm_virtualitems.virtualItemName'
            )
            ->get();

        $drugs = DB::table('pharmacy_module.phm_actualitems')
            ->select(
                'pharmacy_module.phm_actualitems.actualItemId',
                'pharmacy_module.phm_actualitems.actualItemName',
                'pharmacy_module.phm_actualitems.displayUnit'
            )
            ->get();

        return view('pages.patientIndex', compact('pregnancies', 'past_med_hxs', 'drugAllergies', 'drugs'));
    }

    public function SearchByPHN(Request $request)
    {
        $PHN = $request->patientID;

        $present_complaints = DB::table('present_complaints')
            ->select('*')
            ->join('pregnancies', 'present_complaints.pregnancy_id', '=', 'pregnancies.id')
            ->join('jthhims.patientdemographic', 'pregnancies.patient_id', '=', 'jthhims.patientdemographic.patientID')
            ->join('jthhims.admission', 'jthhims.patientdemographic.patientID', '=', 'jthhims.admission.patientID')
            ->join('jthhims.department', 'jthhims.admission.departmentCode', '=', 'jthhims.department.departmentCode')
            ->where('jthhims.patientdemographic.patientID', '=', $PHN)
            ->get();

        $current_pregnancy_hxs = DB::table('current_pregnancy_hxs')
            ->select('*')
            ->join('pregnancies', 'current_pregnancy_hxs.pregnancy_id', '=', 'pregnancies.id')
            ->join('jthhims.patientdemographic', 'pregnancies.patient_id', '=', 'jthhims.patientdemographic.patientID')
            ->join('jthhims.admission', 'jthhims.patientdemographic.patientID', '=', 'jthhims.admission.patientID')
            ->join('jthhims.department', 'jthhims.admission.departmentCode', '=', 'jthhims.department.departmentCode')
            ->where('jthhims.patientdemographic.patientID', '=', $PHN)
            ->get();

        $past_obs_hxs = DB::table('past_obs_hxs')
            ->select('*')
            ->join('pregnancies', 'past_obs_hxs.pregnancy_id', '=', 'pregnancies.id')
            ->join('jthhims.patientdemographic', 'pregnancies.patient_id', '=', 'jthhims.patientdemographic.patientID')
            ->join('jthhims.admission', 'jthhims.patientdemographic.patientID', '=', 'jthhims.admission.patientID')
            ->join('jthhims.department', 'jthhims.admission.departmentCode', '=', 'jthhims.department.departmentCode')
            ->where('jthhims.patientdemographic.patientID', '=', $PHN)
            ->get();

        $past_gyn_hxs = DB::table('past_gyn_hxs')
            ->select('*')
            ->join('pregnancies', 'past_gyn_hxs.pregnancy_id', '=', 'pregnancies.id')
            ->join('jthhims.patientdemographic', 'pregnancies.patient_id', '=', 'jthhims.patientdemographic.patientID')
            ->join('jthhims.admission', 'jthhims.patientdemographic.patientID', '=', 'jthhims.admission.patientID')
            ->join('jthhims.department', 'jthhims.admission.departmentCode', '=', 'jthhims.department.departmentCode')
            ->where('jthhims.patientdemographic.patientID', '=', $PHN)
            ->get();

        $past_med_hxs = DB::table('past_med_hxs')
            ->select('*')
            ->join('pregnancies', 'past_med_hxs.pregnancy_id', '=', 'pregnancies.id')
            ->join('jthhims.patientdemographic', 'pregnancies.patient_id', '=', 'jthhims.patientdemographic.patientID')
            ->join('jthhims.admission', 'jthhims.patientdemographic.patientID', '=', 'jthhims.admission.patientID')
            ->join('jthhims.department', 'jthhims.admission.departmentCode', '=', 'jthhims.department.departmentCode')
            ->where('jthhims.patientdemographic.patientID', '=', $PHN)
            ->get();

        $allergic_hxs = DB::table('allergic_hxs')
            ->select('*')
            ->join('pregnancies', 'allergic_hxs.pregnancy_id', '=', 'pregnancies.id')
            ->join('jthhims.patientdemographic', 'pregnancies.patient_id', '=', 'jthhims.patientdemographic.patientID')
            ->join('jthhims.admission', 'jthhims.patientdemographic.patientID', '=', 'jthhims.admission.patientID')
            ->join('jthhims.department', 'jthhims.admission.departmentCode', '=', 'jthhims.department.departmentCode')
            ->where('jthhims.patientdemographic.patientID', '=', $PHN)
            ->get();

        $other_hxs = DB::table('other_hxs')
            ->select('*')
            ->join('pregnancies', 'other_hxs.pregnancy_id', '=', 'pregnancies.id')
            ->join('jthhims.patientdemographic', 'pregnancies.patient_id', '=', 'jthhims.patientdemographic.patientID')
            ->join('jthhims.admission', 'jthhims.patientdemographic.patientID', '=', 'jthhims.admission.patientID')
            ->join('jthhims.department', 'jthhims.admission.departmentCode', '=', 'jthhims.department.departmentCode')
            ->where('jthhims.patientdemographic.patientID', '=', $PHN)
            ->get();

        $gyn_examinations = DB::table('gyn_examinations')
            ->select('*')
            ->join('pregnancies', 'gyn_examinations.pregnancy_id', '=', 'pregnancies.id')
            ->join('jthhims.patientdemographic', 'pregnancies.patient_id', '=', 'jthhims.patientdemographic.patientID')
            ->join('jthhims.admission', 'jthhims.patientdemographic.patientID', '=', 'jthhims.admission.patientID')
            ->join('jthhims.department', 'jthhims.admission.departmentCode', '=', 'jthhims.department.departmentCode')
            ->where('jthhims.patientdemographic.patientID', '=', $PHN)
            ->get();

        $obs_examinations = DB::table('obs_examinations')
            ->select('*')
            ->join('pregnancies', 'obs_examinations.pregnancy_id', '=', 'pregnancies.id')
            ->join('jthhims.patientdemographic', 'pregnancies.patient_id', '=', 'jthhims.patientdemographic.patientID')
            ->join('jthhims.admission', 'jthhims.patientdemographic.patientID', '=', 'jthhims.admission.patientID')
            ->join('jthhims.department', 'jthhims.admission.departmentCode', '=', 'jthhims.department.departmentCode')
            ->where('jthhims.patientdemographic.patientID', '=', $PHN)
            ->get();

        $ixs = DB::table('ixs')
            ->select('*')
            ->join('pregnancies', 'ixs.pregnancy_id', '=', 'pregnancies.id')
            ->join('jthhims.patientdemographic', 'pregnancies.patient_id', '=', 'jthhims.patientdemographic.patientID')
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
        $patient = Pregnanacy::where('patient_id', $request->input('input_id_patient'))->first();

        if ($patient) {
            return redirect()->route('patientvisit')
                ->with('message', 'This patient is already registered.');
        } else {

            // Pregnanacy
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

            // CurrentPregnancyHX
            $currentPregnancyHX = new CurrentPregnancyHX();
            $currentPregnancyHX->pregnancy_id = $savedId;
            $currentPregnancyHX->g = $request->input('g');
            $currentPregnancyHX->p = $request->input('p');
            $currentPregnancyHX->c = $request->input('c');
            $currentPregnancyHX->married_year = $request->input('married_year');
            $currentPregnancyHX->lmp = $request->input('lmp');
            $currentPregnancyHX->edd = $request->input('edd');
            $currentPregnancyHX->working_edd = $request->input('working_edd');
            $currentPregnancyHX->past_history_status = $request->input('past_history_status');
            $currentPregnancyHX->past_history_complicated_status = implode(', ', $request->input('past_history_complicated_status', []));
            $currentPregnancyHX->save();

            // PastObsHX
            $years = $request->input('year', []);
            $past_obs_poas = $request->input('past_obs_poa', []);
            $past_obs_mods = $request->input('past_obs_mod', []);
            $past_obs_birthWeights = $request->input('past_obs_birth_weight', []);
            $pastObsHxRemarks  = $request->input('pastObshx_remark', []);
            foreach ($pastObsHxRemarks as $key => $pastObsHxremark) {
                $pastObsHX = new PastObsHX();
                $pastObsHX->pregnancy_id = $savedId;
                $pastObsHX->year = $years[$key] ?? null;
                $pastObsHX->past_obs_poa = $past_obs_poas[$key] ?? null;
                $pastObsHX->past_obs_mod = $past_obs_mods[$key] ?? null;
                $pastObsHX->past_obs_birth_weight = $past_obs_birthWeights[$key] ?? null;
                $pastObsHX->remarks = $pastObsHxremark;
                $pastObsHX->save();
            }

            // PastGynHX
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

            // PastMedHX
            $pastMedHxs = $request->input('pastmedhx', []);
            $PastMedhxRemarks = $request->input('pastMedHx_remarks', []);
            foreach ($PastMedhxRemarks as $key => $PastMedhxRemark) {
                $pastMedHX = new PastMedHX();
                $pastMedHX->pregnancy_id = $savedId;
                $pastMedHX->past_med_hx = $pastMedHxs[$key] ?? null;
                $pastMedHX->remarks = $PastMedhxRemark;
                $pastMedHX->save();
            }

            // Past Med HX Drugs
            $drugPastMedhxDrugNames = $request->input('drugpastmedhx_drug_name', []);
            $drugPastMedhxDosages = $request->input('drugpastmedhx_dosage', []);
            $drugPastMedhxDosageUnits = $request->input('drugpastmedhx_dosage_unit', []);
            $drugPastMedhxRoutes = $request->input('drugpastmedhx_route', []);
            $drugPastMedhxFrequencies = $request->input('drugpastmedhx_frequency', []);
            foreach ($drugPastMedhxFrequencies as $key => $drugPastMedhxFrequency) {
                $pastMedHxDrugs = new PastMedHxDrugs();
                $pastMedHxDrugs->pregnancy_id = $savedId;
                $pastMedHxDrugs->drugpastmedhx_drug_name = $drugPastMedhxDrugNames[$key] ?? null;
                $pastMedHxDrugs->drugpastmedhx_dosage = $drugPastMedhxDosages[$key] ?? null;
                $pastMedHxDrugs->drugpastmedhx_dosage_unit = $drugPastMedhxDosageUnits[$key] ?? null;
                $pastMedHxDrugs->drugpastmedhx_route = $drugPastMedhxRoutes[$key] ?? null;
                $pastMedHxDrugs->drugpastmedhx_frequency = $drugPastMedhxFrequency ?? null;
                $pastMedHxDrugs->save();
            }

            // AllergicHX
            $allergicHx = new AllergicHX();
            $allergicHx->pregnancy_id = $savedId;
            $allergicHx->drugalergyhx = implode(', ', $request->input('drugalergyhx', []));
            $allergicHx->foodallergyhx = $request->input('foodallergyhx', '');
            $allergicHx->otherallergyhx = $request->input('otherallergyhx', '');
            $allergicHx->save();

            //FamilHX

            //END

            // SocialsHx
            $socialHx = new SocialHx();
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

            // OtherHX
            $otherHx = new OtherHX();
            $otherHx->pregnancy_id = $savedId;
            $otherHx->past_surgery_hx = $request->input('pastsurgeryhx', '');
            $otherHx->save();

            // GynExaminations
            $gynExamination = new GynExaminations();
            $gynExamination->pregnancy_id = $savedId;
            $gynExamination->gyn_general = implode(', ', $request->input('gyn_general', []));
            $gynExamination->gyn_thyroid_examination = $request->input('rdio-primary4');
            $gynExamination->height = $request->input('height');
            $gynExamination->weight = $request->input('weight');
            $gynExamination->bmi = $request->input('bmi');
            $gynExamination->gyn_temperature = $request->input('gyn_temperature');
            $gynExamination->gyn_pulse_rate = $request->input('gyn_pulse_rate');
            $gynExamination->rhythm = $request->input('rhythm');
            $gynExamination->heart_sound = $request->input('heart_sound');
            $gynExamination->murmur = $request->input('murmur');
            $gynExamination->gyn_systolic = $request->input('gyn_systolic');
            $gynExamination->gyn_diastolic = $request->input('gyn_diastolic');
            $gynExamination->breath_sound = $request->input('breath_sound');
            $gynExamination->gyn_inspection = implode(', ', $request->input('gyn_inspection', []));
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
            $gynExamination->endometrium = $request->input('endometrium');
            $gynExamination->fibroid = $request->input('fibroid');
            $gynExamination->size = $request->input('size');
            $gynExamination->direction = $request->input('direction');
            $gynExamination->ovary = $request->input('ovary');
            $gynExamination->adnexialmass = $request->input('adnexialmass');
            $gynExamination->bladder = $request->input('bladder');
            $gynExamination->free_fluid = $request->input('free_fluid');
            $gynExamination->cavity = $request->input('cavity');
            $gynExamination->polyps = $request->input('polyps');
            $gynExamination->ectopic = $request->input('ectopic');
            $gynExamination->problist = $request->input('problist');
            $gynExamination->medical_hx = $request->input('medical_hx');
            $gynExamination->surgery_hx = $request->input('surgery_hx');
            $gynExamination->save();

            // ObsExaminations
            $obsExamination = new ObsExaminations();
            $obsExamination->pregnancy_id = $savedId;
            $obsExamination->obs_general = implode(', ', $request->input('obs_general', []));
            $obsExamination->obs_systolic = $request->input('obs_systolic');
            $obsExamination->obs_diastolic = $request->input('obs_diastolic');
            $obsExamination->obs_pulse_rate = $request->input('obs_pulse_rate');
            $obsExamination->obs_thyroid_examination = $request->input('rdio-primary5');
            $obsExamination->obs_inspection = implode(', ', $request->input('obs_inspection', []));
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

            // Investigation
            $investigation = new Investigation(); 
            $investigation->pregnancy_id = $savedId;
            $investigation->ctg = $request->input('ctg');
            $investigation->tas = $request->input('tas');
            $investigation->hb = $request->input('hb');
            $investigation->plt = $request->input('plt');
            $investigation->wbc = $request->input('wbc');
            $investigation->crp = $request->input('crp');
            $investigation->urine_full_report = $request->input('urine_full_report');
            $investigation->ohtt_bss = $request->input('ohtt_bss');
            $investigation->rbs = $request->input('rbs');
            $investigation->rbs_unit = $request->input('rbs_unit');
            $investigation->fbs = $request->input('fbs');
            $investigation->fbs_unit = $request->input('fbs_unit');
            $investigation->ppbs = $request->input('ppbs');
            $investigation->ppbs_unit = $request->input('ppbs_unit');
            $investigation->scr = $request->input('scr');
            $investigation->bun = $request->input('bun');
            $investigation->sodium = $request->input('sodium');
            $investigation->potassium = $request->input('potassium');
            $investigation->ast = $request->input('ast');
            $investigation->alt = $request->input('alt');
            $investigation->pt = $request->input('pt');
            $investigation->aptt = $request->input('aptt');
            $investigation->save();

            // Management
            $management = new Management();
            $management->pregnancy_id = $savedId;
            $management->plan_delivery = $request->input('plan_delivery');
            $management->mng_poa = $request->input('mng_poa');
            $management->mng_mod = implode(', ', $request->input('mng_mod', []));
            $management->avd = $request->input('avd');
            $management->em = $request->input('em'); 
            $management->el = $request->input('el');
            $management->save();

            // Management DrugHx
            $drugmngDrugNames = $request->input('drugmng_drug_name', []);
            $drugmngDosages = $request->input('drugmng_dosage', []);
            $drugmngDosageUnits = $request->input('drugmng_dosage_unit', []);
            $drugmngRoutes = $request->input('drugmng_route', []);
            $drugmngFrequencies = $request->input('drugmng_frequency', []);
            foreach ($drugmngFrequencies as $key => $drugmngFrequency) {
                $managementDrugs= new ManagementDrugs();
                $managementDrugs->pregnancy_id = $savedId;
                $managementDrugs->drugmng_drug_name = $drugmngDrugNames[$key] ?? null;
                $managementDrugs->drugmng_dosage = $drugmngDosages[$key] ?? null;
                $managementDrugs->drugmng_dosage_unit = $drugmngDosageUnits[$key] ?? null;
                $managementDrugs->drugmng_route = $drugmngRoutes[$key] ?? null;
                $managementDrugs->drugmng_frequency = $drugmngFrequency ?? null;
                $managementDrugs->save();
            }

            $vitalMonitoring = new VitalMonitoring();
            $vitalMonitoring->pregnancy_id = $savedId;
            $vitalMonitoring->vm_systolic = $request->input('vm_systolic');
            $vitalMonitoring->vm_diastolic = $request->input('vm_diastolic');
            $vitalMonitoring->vm_pulse_rate = $request->input('vm_pulse_rate');
            $vitalMonitoring->vm_temperature = $request->input('vm_temperature');
            $vitalMonitoring->pph = $request->input('pph'); 
            $vitalMonitoring->htn = $request->input('htn');
            $vitalMonitoring->pp_psychosis_depressional = $request->input('pp_psychosis_depressional');
            $vitalMonitoring->pp_sepsis = $request->input('pp_sepsis');
            $vitalMonitoring->dvt = $request->input('dvt');
            $vitalMonitoring->icu_admission = $request->input('icu_admission');
            $vitalMonitoring->save();

            $newBornStatus= new NewBornStatus();
            $newBornStatus->pregnancy_id = $savedId;
            $newBornStatus->baby_dob = $request->input('baby_dob');
            $newBornStatus->baby_gender = $request->input('baby_gender');
            $newBornStatus->aphar = $request->input('aphar');
            $newBornStatus->nbs_birth_weight = $request->input('nbs_birth_weight');
            $newBornStatus->pbu_admission = $request->input('pbu_admission');
            $newBornStatus->save();

            // Summaries
            // $summery = new Summery();
            // $summery->pregnancy_id = $savedId;
            // $summery->summery = $request->input('summery', '');
            // $summery->save();
        }
        return redirect()->back()->with('success', 'Complaints saved successfully.');
    }

    // public function update(Request $request)
    // {
    //     $id = $request->id;

    //     $pregnanacy = Pregnanacy::find($id);
    //     $pregnanacy->patient_id = $request->input('patient');
    //     $pregnanacy->category = $request->input('category');
    //     $pregnanacy->detail = $request->input('detail');
    //     $pregnanacy->save();

    //     $savedId = $pregnanacy->id;

    //     $complaints = $request->input('complaint', []);
    //     $durations = $request->input('durations', []);
    //     $severities = $request->input('severity', []);
    //     $remarksPC = $request->input('remarksPC', []);

    //     foreach ($remarksPC as $key => $remarkPC) {
    //         $presentComplaint = new PresentComplaint();
    //         $presentComplaint->pregnancy_id = $savedId;
    //         $presentComplaint->complaint = $complaints[$key] ?? null;
    //         $presentComplaint->duration = $durations[$key] ?? null;
    //         $presentComplaint->severity = $severities[$key] ?? null;
    //         $presentComplaint->remarks = $remarkPC;
    //         $presentComplaint->save();
    //     }

    //     $currentPregnancyHX = new CurrentPregnancyHX();
    //     $currentPregnancyHX->pregnancy_id = $savedId;

    //     $inputData = array_filter($request->only(['g', 'p', 'c', 'married_year', 'lmp', 'edd', 'working_edd']));

    //     $currentPregnancyHX->fill($inputData);

    //     if ($currentPregnancyHX->isDirty()) {
    //         $currentPregnancyHX->save();
    //     }

    //     $years = $request->input('year', []);
    //     $poas = $request->input('poa', []);
    //     $mods = $request->input('mod', []);
    //     $birthWeights = $request->input('birth_weight', []);
    //     $pastObsHxRemarks  = $request->input('pastObshx_remarks', []);

    //     foreach ($pastObsHxRemarks as $key => $pastObsHxremark) {
    //         $pastObsHX = new PastObsHX();
    //         $pastObsHX->pregnancy_id = $savedId;
    //         $pastObsHX->year = $years[$key] ?? null;
    //         $pastObsHX->poa = $poas[$key] ?? null;
    //         $pastObsHX->mod = $mods[$key] ?? null;
    //         $pastObsHX->birth_weight = $birthWeights[$key] ?? null;
    //         $pastObsHX->remarks = $pastObsHxremark;
    //         $pastObsHX->save();
    //     }

    //     $pastGynHx = new PastGynHX();
    //     $pastGynHx->pregnancy_id = $savedId;
    //     $pastGynHx->menarche_at = $request->input('menarche_at');
    //     $pastGynHx->contraception = implode(', ', $request->input('contraception', []));
    //     $pastGynHx->amount = $request->input('amount');
    //     $pastGynHx->duration = $request->input('duration');
    //     $pastGynHx->status = $request->input('rdio-primary1');
    //     $pastGynHx->aub = $request->input('rdio-primary2');
      
    //     $pastGynHx->subfertility = $request->input('rdio-primary3');
    //     $pastGynHx->gender = $request->input('gender');
    //     $pastGynHx->male_factors = implode(', ', $request->input('male_factors', []));
    //     $pastGynHx->ovulatory_disorder = implode(', ', $request->input('ovulatory_disorder', []));
    //     $pastGynHx->tubal_factors = implode(', ', $request->input('tubal_factors', []));
    //     $pastGynHx->uterine_factors = implode(', ', $request->input('uterine_factors', []));
    //     $pastGynHx->save();

    //     $pastMedHxs = $request->input('pastmedhx', []);
    //     $PastMedhxRemarks = $request->input('pastMedHx_remarks', []);
    //     foreach ($PastMedhxRemarks as $key => $PastMedhxRemark) {
    //         $pastMedHX = new PastMedHX();
    //         $pastMedHX->pregnancy_id = $savedId;
    //         $pastMedHX->past_med_hx = $pastMedHxs[$key] ?? null;
    //         $pastMedHX->remarks = $PastMedhxRemark;
    //         $pastMedHX->save();
    //     }

    //     $allergicHx = new AllergicHX();
    //     $allergicHx->pregnancy_id = $savedId;
    //     $allergicHx->drugalergyhx = implode(', ', $request->input('drugalergyhx', []));
    //     $allergicHx->foodallergyhx = $request->input('foodallergyhx', '');
    //     $allergicHx->otherallergyhx = $request->input('otherallergyhx', '');
    //     $allergicHx->save();

    //     $otherHx = new OtherHX();
    //     $otherHx->pregnancy_id = $savedId;
    //     $otherHx->past_surgery_hx = $request->input('pastsurgeryhx', '');
    //     $otherHx->save();

    //     $gynExamination = new GynExaminations();
    //     $gynExamination->pregnancy_id = $savedId;
    //     $gynExamination->generalGyn = implode(', ', $request->input('generalGyn', []));
    //     $gynExamination->thyroid_examinationGyn = $request->input('rdio-primary4');
    //     $gynExamination->height = $request->input('height');
    //     $gynExamination->weight = $request->input('weight');
    //     $gynExamination->bmi = $request->input('bmi');
    //     $gynExamination->temperature = $request->input('temperature');
    //     $gynExamination->pulse_rate = $request->input('pulse_rate');
    //     $gynExamination->rhythm = $request->input('rhythm');
    //     $gynExamination->heart_sound = $request->input('heart_sound');
    //     $gynExamination->murmur = $request->input('murmur');
    //     $gynExamination->systolic = $request->input('systolic');
    //     $gynExamination->diastolic = $request->input('diastolic');
    //     $gynExamination->breath_sound = $request->input('breath_sound');
    //     $gynExamination->inspectionGyn = implode(', ', $request->input('inspectionGyn', []));

    //     $gynExamination->site_mass = $request->input('site_mass');

    //     $gynExamination->percussion = $request->input('percussion');
    //     $gynExamination->auscultator = $request->input('auscultator');
    //     $gynExamination->auscultation = $request->input('auscultation');
    //     $gynExamination->tenderness = $request->input('tenderness');
    //     $gynExamination->size = $request->input('size');
    //     $gynExamination->stress_incontinence = $request->input('stress_incontinence');
    //     $gynExamination->cervical = $request->input('cervical');
    //     $gynExamination->os = $request->input('os');
    //     $gynExamination->polyp_ulcer = $request->input('polyp_ulcer');
    //     $gynExamination->cervical_motion_tenderness = $request->input('cervical_motion_tenderness');
    //     $gynExamination->adnexialmass_tas = $request->input('adnexialmass_tas');
    //     $gynExamination->bladder_tas = $request->input('bladder_tas');
    //     $gynExamination->free_fluid_tas = $request->input('free_fluid_tas');
    //     $gynExamination->endometrium_tvs = $request->input('endometrium_tvs');
    //     $gynExamination->fiber_tvs = $request->input('fiber_tvs');
    //     $gynExamination->size_tvs = $request->input('size_tvs');
    //     $gynExamination->direction_tvs = $request->input('direction_tvs');
    //     $gynExamination->polyps_tvs = $request->input('polyps_tvs');
    //     $gynExamination->ectopic_tvs = $request->input('ectopic_tvs');
    //     $gynExamination->adnexialmass_tvs = $request->input('adnexialmass_tvs');
    //     $gynExamination->problist = $request->input('problist');
    //     $gynExamination->medical_hx = $request->input('medical_hx');
    //     $gynExamination->surgery_hx = $request->input('surgery_hx');
    //     $gynExamination->save();

    //     $obsExamination = new ObsExaminations();
    //     $obsExamination->pregnancy_id = $savedId;
    //     $obsExamination->generalObs = implode(', ', $request->input('generalObs', []));
    //     $obsExamination->bp = $request->input('bp');
    //     $obsExamination->pr = $request->input('pr');
    //     $obsExamination->thyroid_examinationObs = $request->input('rdio-primary5');
    //     $gynExamination->inspectionObs = implode(', ', $request->input('inspectionObs', []));
    //     $obsExamination->sfh = $request->input('sfh');
    //     $obsExamination->lie = $request->input('lie');
    //     $obsExamination->position = $request->input('position');
    //     $obsExamination->engagement = $request->input('rdio-primary6');
    //     $obsExamination->fhs = $request->input('rdio-primary8');
    //     $obsExamination->cervical_dilatation = $request->input('cervical_dilatation');
    //     $obsExamination->cervical_consistency = $request->input('cervical_consistency');
    //     $obsExamination->cervical_canel = $request->input('cervical_canel');
    //     $obsExamination->cervical_position = $request->input('cervical_position');
    //     $obsExamination->station = $request->input('station');
    //     $obsExamination->fetus = $request->input('fetus');
    //     $obsExamination->precentation = $request->input('precentation');
    //     $obsExamination->bpd = $request->input('bpd');
    //     $obsExamination->ac = $request->input('ac');
    //     $obsExamination->hc = $request->input('hc');
    //     $obsExamination->fl = $request->input('fl');
    //     $obsExamination->crl = $request->input('crl');
    //     $obsExamination->placental_position = $request->input('placental_position');
    //     $obsExamination->efw = $request->input('efw');
    //     $obsExamination->liquor = $request->input('rdio-primary7');
    //     $obsExamination->dopplier = $request->input('dopplier');
    //     $obsExamination->save();

    //     $ix = new Ix();
    //     $ix->pregnancy_id = $savedId;
    //     $ix->ctg = $request->input('ctg');
    //     $ix->tas = $request->input('tas');
    //     $ix->hb = $request->input('hb');
    //     $ix->plt = $request->input('plt');
    //     $ix->wbc = $request->input('wbc');
    //     $ix->crp = $request->input('crp');
    //     $ix->urine_full_report = $request->input('urine_full_report');
    //     $ix->ohtt_bss = $request->input('ohtt_bss');
    //     $ix->antibiotics = $request->input('antibiotics');
    //     $ix->plan_delivery = $request->input('plan_delivery');
    //     $ix->save();

    //     return redirect()->back()->with('success', 'Complaints saved successfully.');
    // }
}
