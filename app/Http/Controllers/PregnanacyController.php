<?php

namespace App\Http\Controllers;

use App\Models\AllergicHX;
use App\Models\CurrentPregnancyHX;
use App\Models\FamilyHx;
use App\Models\SocialHx;
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
use App\Models\PregnancyVisitRecord;
use App\Models\PresentComplaint;
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
        } else {
            $patient = $patients->first();

            $pregnancyExists = DB::table('pregnancies')
                ->where('patient_id', $patient->patientID)
                ->exists();
 
            if ($pregnancyExists) {
                return response()->json(['redirect' => route('pregnanacyVisit.index', ['patientID' => $patient->patientID])]);
            } else {
                return response()->json($patient);
            }
        }
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

            $pregnancyVisitRecord = new PregnancyVisitRecord();
            $pregnancyVisitRecord->pregnancy_id = $savedId;
            $pregnancyVisitRecord->pregnancy_visit = now()->toDateString();
            $pregnancyVisitRecord->save();

            // PresentComplaint
            $complaints = $request->input('complaint', []);
            $durations = $request->input('duration', []);
            $severities = $request->input('severity', []);
            $remarksPCs = $request->input('remarksPC', []);
            foreach ($remarksPCs as $key => $remarkPC) {
                $data = [
                    'complaint' => $complaints[$key] ?? null,
                    'duration' => $durations[$key] ?? null,
                    'severity' => $severities[$key] ?? null,
                    'remarks' => $remarkPC,
                ];

                if (array_filter($data)) {
                    $presentComplaint = new PresentComplaint();
                    $presentComplaint->pregnancy_id = $savedId;
                    $presentComplaint->complaint = $complaints[$key] ?? null;
                    $presentComplaint->duration = $durations[$key] ?? null;
                    $presentComplaint->severity = $severities[$key] ?? null;
                    $presentComplaint->remarks = $remarkPC;
                    $presentComplaint->save();
                }
            }

            // CurrentPregnancyHX
            $currentPregnancyHX = new CurrentPregnancyHX();
            $currentPregnancyHX->pregnancy_id = $savedId;
            $data = [
                'g' => $request->input('g'),
                'p' => $request->input('p'),
                'c' => $request->input('c'),
                'married_year' => $request->input('married_year'),
                'lmp' => $request->input('lmp'),
                'edd' => $request->input('edd'),
                'working_edd' => $request->input('working_edd'),
                'past_history_status' => $request->input('past_history_status'),
                'past_history_complicated_status' => implode(', ', $request->input('past_history_complicated_status', [])),
            ];

            if (array_filter($data)) {
                foreach ($data as $key => $value) {
                    $currentPregnancyHX->$key = $value;
                }
                $currentPregnancyHX->save();
            }

            // PastObsHX
            $years = $request->input('year', []);
            $past_obs_poas = $request->input('past_obs_poa', []);
            $past_obs_mods = $request->input('past_obs_mod', []);
            $past_obs_birthWeights = $request->input('past_obs_birth_weight', []);
            $pastObsHxRemarks  = $request->input('pastObshx_remark', []);
            foreach ($pastObsHxRemarks as $key => $pastObsHxremark) {
                $data = [
                    'year' => $years[$key] ?? null,
                    'past_obs_poa' => $past_obs_poas[$key] ?? null,
                    'past_obs_mod' => $past_obs_mods[$key] ?? null,
                    'past_obs_birth_weight' => $past_obs_birthWeights[$key] ?? null,
                    'remarks' => $pastObsHxremark,
                ];

                if (array_filter($data)) {
                    $pastObsHX = new PastObsHX();
                    $pastObsHX->pregnancy_id = $savedId;
                    $pastObsHX->year = $years[$key] ?? null;
                    $pastObsHX->past_obs_poa = $past_obs_poas[$key] ?? null;
                    $pastObsHX->past_obs_mod = $past_obs_mods[$key] ?? null;
                    $pastObsHX->past_obs_birth_weight = $past_obs_birthWeights[$key] ?? null;
                    $pastObsHX->remarks = $pastObsHxremark;
                    $pastObsHX->save();
                }
            }

            // PastGynHX
            $pastGynHx = new PastGynHX();
            $pastGynHx->pregnancy_id = $savedId;
            $data = [
                'menarche_at' => $request->input('menarche_at'),
                'contraception' => implode(', ', $request->input('contraception', [])),
                'amount' => $request->input('amount'),
                'duration' => $request->input('duration'),
                'regularity' => $request->input('rdio-primary1'),
                'aub' => $request->input('rdio-primary2'),
                'subfertility' => $request->input('rdio-primary3'),
                'gender' => $request->input('gender'),
                'male_factors' => implode(', ', $request->input('male_factors', [])),
                'ovulatory_disorder' => implode(', ', $request->input('ovulatory_disorder', [])),
                'tubal_factors' => implode(', ', $request->input('tubal_factors', [])),
                'uterine_factors' => implode(', ', $request->input('uterine_factors', [])),
            ];

            if (array_filter($data)) {
                foreach ($data as $key => $value) {
                    $pastGynHx->$key = $value;
                }
                $pastGynHx->save();
            }

            // PastMedHX
            $pastMedHxs = $request->input('pastmedhx', []);
            $PastMedhxRemarks = $request->input('pastMedHx_remarks', []);
            foreach ($PastMedhxRemarks as $key => $PastMedhxRemark) {
                $data = [
                    'past_med_hx' => $pastMedHxs[$key] ?? null,
                    'remarks' => $PastMedhxRemark,
                ];

                if (array_filter($data)) {
                    $pastMedHX = new PastMedHX();
                    $pastMedHX->pregnancy_id = $savedId;
                    $pastMedHX->past_med_hx = $pastMedHxs[$key] ?? null;
                    $pastMedHX->remarks = $PastMedhxRemark;
                    $pastMedHX->save();
                }
            }

            // Past Med HX Drugs
            $drugPastMedhxDrugNames = $request->input('drugpastmedhx_drug_name', []);
            $drugPastMedhxDosages = $request->input('drugpastmedhx_dosage', []);
            $drugPastMedhxDosageUnits = $request->input('drugpastmedhx_dosage_unit', []);
            $drugPastMedhxRoutes = $request->input('drugpastmedhx_route', []);
            $drugPastMedhxFrequencies = $request->input('drugpastmedhx_frequency', []);
            foreach ($drugPastMedhxFrequencies as $key => $drugPastMedhxFrequency) {
                $data = [
                    'drug_name' => $drugPastMedhxDrugNames[$key] ?? null,
                    'dosage' => $drugPastMedhxDosages[$key] ?? null,
                    'dosage_unit' => $drugPastMedhxDosageUnits[$key] ?? null,
                    'route' => $drugPastMedhxRoutes[$key] ?? null,
                    'frequency' => $drugPastMedhxFrequency ?? null,
                ];
                if (array_filter($data)) {
                    $pastMedHxDrugs = new PastMedHxDrugs();
                    $pastMedHxDrugs->pregnancy_id = $savedId;
                    $pastMedHxDrugs->drugpastmedhx_drug_name = $drugPastMedhxDrugNames[$key] ?? null;
                    $pastMedHxDrugs->drugpastmedhx_dosage = $drugPastMedhxDosages[$key] ?? null;
                    $pastMedHxDrugs->drugpastmedhx_dosage_unit = $drugPastMedhxDosageUnits[$key] ?? null;
                    $pastMedHxDrugs->drugpastmedhx_route = $drugPastMedhxRoutes[$key] ?? null;
                    $pastMedHxDrugs->drugpastmedhx_frequency = $drugPastMedhxFrequency ?? null;
                    $pastMedHxDrugs->save();
                }
            }

            // AllergicHX
            $allergicHx = new AllergicHX();
            $allergicHx->pregnancy_id = $savedId;
            $data = [
                'drugalergyhx' => implode(', ', $request->input('drugalergyhx', [])),
                'foodallergyhx' => $request->input('foodallergyhx', ''),
                'otherallergyhx' => $request->input('otherallergyhx', ''),
            ];

            if (array_filter($data)) {
                foreach ($data as $key => $value) {
                    $allergicHx->$key = $value;
                }
                $allergicHx->save();
            }

            //Family HX
            $familyMedicineHX = $request->input('familymedicinehx', []);
            $remarksFMHXs = $request->input('familymedicinehx_remarks', []);
            foreach ($remarksFMHXs as $key => $remarksFMHX) {
                $data = [
                    'family_med_hx' => $familyMedicineHX[$key] ?? null,
                    'remarks' => $remarksFMHX,
                ];
                if (array_filter($data)) {
                    $familyHx = new FamilyHx();
                    $familyHx->pregnancy_id = $savedId;
                    $familyHx->family_med_hx = $familyMedicineHX[$key] ?? null;
                    $familyHx->remarks = $remarksFMHX;
                    $familyHx->save();
                }
            }

            // SocialsHx
            $socialHx = new SocialHx();
            $socialHx->pregnancy_id = $savedId;
            $data = [
                'family_status' => $request->input('family_status', ''),
                'monthly_income' => $request->input('monthly_income', ''),
                'patient_education' => $request->input('patient_education', ''),
                'patient_occupation' => $request->input('patient_occupation', ''),
                'patient_social_problem' => implode(', ', $request->input('patient_social_problem', [])),
                'partner_education' => $request->input('partner_education', ''),
                'partner_occupation' => $request->input('partner_occupation', ''),
                'partner_social_problem' => implode(', ', $request->input('partner_social_problem', [])),
            ];

            if (array_filter($data)) {
                foreach ($data as $key => $value) {
                    $socialHx->$key = $value;
                }
                $socialHx->save();
            }

            // OtherHX
            $otherHx = new OtherHX();
            $otherHx->pregnancy_id = $savedId;
            $data = [
                'past_surgery_hx' => $request->input('pastsurgeryhx', ''),
            ];

            if (array_filter($data)) {
                foreach ($data as $key => $value) {
                    $otherHx->$key = $value;
                }
                $otherHx->save();
            }

            // GynExaminations
            $gynExamination = new GynExaminations();
            $gynExamination->pregnancy_id = $savedId;
            $data = [
                'gyn_general' => implode(', ', $request->input('gyn_general', [])),
                'gyn_thyroid_examination' => $request->input('rdio-primary4'),
                'height' => $request->input('height'),
                'weight' => $request->input('weight'),
                'bmi' => $request->input('bmi'),
                'gyn_temperature' => $request->input('gyn_temperature'),
                'gyn_pulse_rate' => $request->input('gyn_pulse_rate'),
                'rhythm' => $request->input('rhythm'),
                'heart_sound' => $request->input('heart_sound'),
                'murmur' => $request->input('murmur'),
                'gyn_systolic' => $request->input('gyn_systolic'),
                'gyn_diastolic' => $request->input('gyn_diastolic'),
                'breath_sound' => $request->input('breath_sound'),
                'gyn_inspection' => implode(', ', $request->input('gyn_inspection', [])),
                'site_mass' => $request->input('site_mass'),
                'size_mass' => $request->input('size_mass'),
                'percussion_mass' => $request->input('percussion_mass'),
                'auscultation_mass' => $request->input('auscultation_mass'),
                'palpation' => $request->input('palpation'),
                'percussion' => $request->input('percussion'),
                'auscultation' => $request->input('auscultation'),
                'inspectionSpeculum' => implode(', ', $request->input('inspectionSpeculum', [])),
                'stress_incontinence' => $request->input('stress_incontinence'),
                'cervical_consistency' => $request->input('cervical_consistency'),
                'os' => $request->input('os'),
                'polyp_ulcer' => $request->input('polyp_ulcer'),
                'cervical_motion_tenderness' => $request->input('cervical_motion_tenderness'),
                'endometrium' => $request->input('endometrium'),
                'fibroid' => $request->input('fibroid'),
                'size' => $request->input('size'),
                'direction' => $request->input('direction'),
                'ovary' => $request->input('ovary'),
                'adnexialmass' => $request->input('adnexialmass'),
                'bladder' => $request->input('bladder'),
                'free_fluid' => $request->input('free_fluid'),
                'cavity' => $request->input('cavity'),
                'polyps' => $request->input('polyps'),
                'ectopic' => $request->input('ectopic'),
                'problist' => $request->input('problist'),
                'medical_hx' => $request->input('medical_hx'),
                'surgery_hx' => $request->input('surgery_hx'),
            ];

            if (array_filter($data)) {
                foreach ($data as $key => $value) {
                    $gynExamination->$key = $value;
                }
                $gynExamination->save();
            }

            // ObsExaminations
            $obsExamination = new ObsExaminations();
            $obsExamination->pregnancy_id = $savedId;
            $data = [
                'obs_general' => implode(', ', $request->input('obs_general', [])),
                'obs_systolic' => $request->input('obs_systolic'),
                'obs_diastolic' => $request->input('obs_diastolic'),
                'obs_pulse_rate' => $request->input('obs_pulse_rate'),
                'obs_thyroid_examination' => $request->input('rdio-primary5'),
                'obs_inspection' => implode(', ', $request->input('obs_inspection', [])),
                'sfh' => $request->input('sfh'),
                'lie' => $request->input('lie'),
                'position' => $request->input('position'),
                'engagement' => $request->input('rdio-primary6'),
                'fhs' => $request->input('rdio-primary8'),
                'cervical_dilatation' => $request->input('cervical_dilatation'),
                'cervical_consistency' => $request->input('cervical_consistency'),
                'cervical_canel' => $request->input('cervical_canel'),
                'cervical_position' => $request->input('cervical_position'),
                'station' => $request->input('station'),
                'fetus' => $request->input('fetus'),
                'presentation' => $request->input('presentation'),
                'bpd' => $request->input('bpd'),
                'ac' => $request->input('ac'),
                'hc' => $request->input('hc'),
                'fl' => $request->input('fl'),
                'placental_position' => $request->input('placental_position'),
                'efw' => $request->input('efw'),
                'liquor' => $request->input('rdio-primary7'),
                'dopplier' => $request->input('dopplier'),
            ];

            if (array_filter($data)) {
                foreach ($data as $key => $value) {
                    $obsExamination->$key = $value;
                }
                $obsExamination->save();
            }

            // Investigation
            $investigation = new Investigation();
            $investigation->pregnancy_id = $savedId;
            $data = [
                'ctg' => $request->input('ctg'),
                'hb' => $request->input('hb'),
                'plt' => $request->input('plt'),
                'wbc' => $request->input('wbc'),
                'crp' => $request->input('crp'),
                'urine_full_report' => $request->input('urine_full_report'),
                'ohtt_bss' => $request->input('ohtt_bss'),
                'rbs' => $request->input('rbs'),
                'fbs' => $request->input('fbs'),
                'ppbs' => $request->input('ppbs'),
                'scr' => $request->input('scr'),
                'bun' => $request->input('bun'),
                'sodium' => $request->input('sodium'),
                'potassium' => $request->input('potassium'),
                'ast' => $request->input('ast'),
                'alt' => $request->input('alt'),
                'pt' => $request->input('pt'),
                'aptt' => $request->input('aptt'),
            ];

            if (!empty($data['rbs'])) {
                $data['rbs_unit'] = $request->input('rbs_unit');
            } else {
                $data['rbs_unit'] = null;
            }

            if (!empty($data['fbs'])) {
                $data['fbs_unit'] = $request->input('fbs_unit');
            } else {
                $data['fbs_unit'] = null;
            }

            if (!empty($data['ppbs'])) {
                $data['ppbs_unit'] = $request->input('ppbs_unit');
            } else {
                $data['ppbs_unit'] = null;
            }

            if (array_filter($data)) {
                foreach ($data as $key => $value) {
                    $investigation->$key = $value; // Assign values dynamically
                }
                $investigation->save(); // Save the investigation
            }

            // Management
            $management = new Management();
            $management->pregnancy_id = $savedId;
            $data = [
                'plan_delivery' => $request->input('plan_delivery'),
                'mng_poa' => $request->input('mng_poa'),
                'mng_mod' => $request->input('mng_mod'),
                'avd' => $request->input('avd'),
                'em' => $request->input('em'),
                'el' => $request->input('el'),
            ];

            if (array_filter($data)) {
                foreach ($data as $key => $value) {
                    $management->$key = $value;
                }
                $management->save();
            }

            // Management DrugHx
            $drugmngDrugNames = $request->input('drugmng_drug_name', []);
            $drugmngDosages = $request->input('drugmng_dosage', []);
            $drugmngDosageUnits = $request->input('drugmng_dosage_unit', []);
            $drugmngRoutes = $request->input('drugmng_route', []);
            $drugmngFrequencies = $request->input('drugmng_frequency', []);
            foreach ($drugmngFrequencies as $key => $drugmngFrequency) {
                $data = [
                    'drug_name' => $drugmngDrugNames[$key] ?? null,
                    'dosage' => $drugmngDosages[$key] ?? null,
                    'dosage_unit' => $drugmngDosageUnits[$key] ?? null,
                    'route' => $drugmngRoutes[$key] ?? null,
                    'frequency' => $drugmngFrequency ?? null,
                ];
                if (array_filter($data)) {
                    $managementDrugs = new ManagementDrugs();
                    $managementDrugs->pregnancy_id = $savedId;
                    $managementDrugs->drugmng_drug_name = $drugmngDrugNames[$key] ?? null;
                    $managementDrugs->drugmng_dosage = $drugmngDosages[$key] ?? null;
                    $managementDrugs->drugmng_dosage_unit = $drugmngDosageUnits[$key] ?? null;
                    $managementDrugs->drugmng_route = $drugmngRoutes[$key] ?? null;
                    $managementDrugs->drugmng_frequency = $drugmngFrequency ?? null;
                    $managementDrugs->save();
                }
            }

            // Vital Monitoring
            $vitalMonitoring = new VitalMonitoring();
            $vitalMonitoring->pregnancy_id = $savedId;
            $data = [
                'vm_systolic' => $request->input('vm_systolic'),
                'vm_diastolic' => $request->input('vm_diastolic'),
                'vm_pulse_rate' => $request->input('vm_pulse_rate'),
                'vm_temperature' => $request->input('vm_temperature'),
                'pph' => $request->input('pph'),
                'pph_i' => $request->input('pph_i'),
                'htn' => $request->input('htn'),
                'htn_i' => $request->input('htn_i'),
                'pp_psychosis_depressional' => $request->input('pp_psychosis_depressional'),
                'pp_psychosis_depressional_i' => $request->input('pp_psychosis_depressional_i'),
                'pp_sepsis' => $request->input('pp_sepsis'),
                'pp_sepsis_i' => $request->input('pp_sepsis_i'),
                'dvt' => $request->input('dvt'),
                'dvt_i' => $request->input('dvt_i'),
                'icu_admission' => $request->input('icu_admission'),
                'icu_admission_i' => $request->input('icu_admission_i'),
                'icu_admission_mx' => $request->input('icu_admission_mx'),
            ];

            if (array_filter($data)) {
                foreach ($data as $key => $value) {
                    $vitalMonitoring->$key = $value;
                }
                $vitalMonitoring->save();
            }

            // New Born Status
            $newBornStatus = new NewBornStatus();
            $newBornStatus->pregnancy_id = $savedId;
            $data = [
                'baby_dob' => $request->input('baby_dob'),
                'baby_gender' => $request->input('baby_gender'),
                'apgar' => $request->input('apgar'),
                'nbs_birth_weight' => $request->input('nbs_birth_weight'),
                'pbu_admission' => $request->input('pbu_admission'),
                'pbu_admission_i' => $request->input('pbu_admission_i'),
            ];

            if (array_filter($data)) {
                foreach ($data as $key => $value) {
                    $newBornStatus->$key = $value;
                }
                $newBornStatus->save();
            }

            // Summaries
            $summery = new Summery();
            $summery->pregnancy_id = $savedId;
            $data = [
                'summery' => $request->input('summery', ''),
            ];

            if (!empty($data['summery'])) {
                foreach ($data as $key => $value) {
                    $summery->$key = $value;
                }
                $summery->save();
            }
        }
        return redirect()->back()->with('success', 'Complaints saved successfully.');
    }

    public function update(Request $request)
    {
        return redirect()->back()->with('success', 'Complaints saved successfully.');
    }
}
