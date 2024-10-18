<?php

namespace App\Http\Controllers;

use App\Models\GynExaminations;
use App\Models\Investigation;
use App\Models\ObsExaminations;
use App\Models\Pregnanacy;
use App\Models\PregnancyVisitRecord;
use App\Models\PresentComplaint;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Validation\ValidatesRequests;

class PregnancyVisitController extends Controller
{
    use ValidatesRequests;
    public function index($PHN = null)
    {
        $patientID = $PHN;
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
            ->join('jthhims.patientdemographic', 'pregnancies.patient_id', '=', 'jthhims.patientdemographic.patientID')
            ->join('jthhims.admission', 'jthhims.patientdemographic.patientID', '=', 'jthhims.admission.patientID')
            ->join('jthhims.department', 'jthhims.admission.departmentCode', '=', 'jthhims.department.departmentCode');

        if ($patientID) {
            $pregnancies->where('pregnancies.patient_id', $patientID);

            $visitRecords = DB::table('pregnancy_visit_records')
                ->join('pregnancies', 'pregnancy_visit_records.pregnancy_id', '=', 'pregnancies.id')
                ->where('pregnancies.patient_id', $patientID)
                ->select('pregnancy_visit_records.pregnancy_visit', 'pregnancy_visit_records.pregnancy_id')
                ->distinct()
                ->get();

            $visitData = [];

            foreach ($visitRecords as $visit) {
                $visitDate = $visit->pregnancy_visit;
                $pregnancyId = $visit->pregnancy_id;

                if (!isset($visitData[$visitDate])) {
                    $visitData[$visitDate] = [
                        'visit_info' => $visit,
                        'records' => []
                    ];
                }

                $records = DB::table('present_complaints')->select(DB::raw("'Presenting Complaint' as table_name"))
                    ->where('pregnancy_id', $pregnancyId)
                    ->whereDate('created_at', $visitDate)
                    ->unionAll(
                        DB::table('current_pregnancy_hxs')->select(DB::raw("'Current Pregnancy Hx' as table_name"))
                            ->where('pregnancy_id', $pregnancyId)
                            ->whereDate('created_at', $visitDate)
                    )
                    ->unionAll(
                        DB::table('past_obs_hxs')->select(DB::raw("'Past Obstetric Hx' as table_name"))
                            ->where('pregnancy_id', $pregnancyId)
                            ->whereDate('created_at', $visitDate)
                    )
                    ->unionAll(
                        DB::table('past_gyn_hxs')->select(DB::raw("'Past Gyn Hx' as table_name"))
                            ->where('pregnancy_id', $pregnancyId)
                            ->whereDate('created_at', $visitDate)
                    )
                    ->unionAll(
                        DB::table('past_med_hxs')->select(DB::raw("'Past Med Hx' as table_name"))
                            ->where('pregnancy_id', $pregnancyId)
                            ->whereDate('created_at', $visitDate)
                    )
                    ->unionAll(
                        DB::table('past_med_hx_drugs')->select(DB::raw("'Past Med Drugs Hx' as table_name"))
                            ->where('pregnancy_id', $pregnancyId)
                            ->whereDate('created_at', $visitDate)
                    )
                    ->unionAll(
                        DB::table('allergic_hxs')->select(DB::raw("'Allergic Hx' as table_name"))
                            ->where('pregnancy_id', $pregnancyId)
                            ->whereDate('created_at', $visitDate)
                    )
                    ->unionAll(
                        DB::table('family_hxs')->select(DB::raw("'Family Hx' as table_name"))
                            ->where('pregnancy_id', $pregnancyId)
                            ->whereDate('created_at', $visitDate)
                    )
                    ->unionAll(
                        DB::table('social_hxs')->select(DB::raw("'Social Hx' as table_name"))
                            ->where('pregnancy_id', $pregnancyId)
                            ->whereDate('created_at', $visitDate)
                    )
                    ->unionAll(
                        DB::table('other_hxs')->select(DB::raw("'Other Hx' as table_name"))
                            ->where('pregnancy_id', $pregnancyId)
                            ->whereDate('created_at', $visitDate)
                    )
                    ->unionAll(
                        DB::table('gyn_examinations')->select(DB::raw("'Gyn Examination' as table_name"))
                            ->where('pregnancy_id', $pregnancyId)
                            ->whereDate('created_at', $visitDate)
                    )
                    ->unionAll(
                        DB::table('obs_examinations')->select(DB::raw("'Obs Examination' as table_name"))
                            ->where('pregnancy_id', $pregnancyId)
                            ->whereDate('created_at', $visitDate)
                    )
                    ->unionAll(
                        DB::table('investigations')->select(DB::raw("'Investigation' as table_name"))
                            ->where('pregnancy_id', $pregnancyId)
                            ->whereDate('created_at', $visitDate)
                    )
                    ->unionAll(
                        DB::table('managements')->select(DB::raw("'Management' as table_name"))
                            ->where('pregnancy_id', $pregnancyId)
                            ->whereDate('created_at', $visitDate)
                    )
                    ->unionAll(
                        DB::table('management_drugs')->select(DB::raw("'Management Drugs' as table_name"))
                            ->where('pregnancy_id', $pregnancyId)
                            ->whereDate('created_at', $visitDate)
                    )
                    ->unionAll(
                        DB::table('vital_monitorings')->select(DB::raw("'Vital Monitoring' as table_name"))
                            ->where('pregnancy_id', $pregnancyId)
                            ->whereDate('created_at', $visitDate)
                    )
                    ->unionAll(
                        DB::table('new_born_statuses')->select(DB::raw("'New Born Status' as table_name"))
                            ->where('pregnancy_id', $pregnancyId)
                            ->whereDate('created_at', $visitDate)
                    )
                    ->unionAll(
                        DB::table('summeries')->select(DB::raw("'Summary' as table_name"))
                            ->where('pregnancy_id', $pregnancyId)
                            ->whereDate('created_at', $visitDate)
                    )
                    ->groupBy('table_name')
                    ->get();

                $visitData[$visitDate]['records'] = $records;
            }

            $patients = DB::table('pregnancies')->get();
            $pregnancies = $pregnancies->get();

            foreach ($pregnancies as $pregnancy) {
                $pregnancy->age = Carbon::parse($pregnancy->patientDateofbirth)->age;
            }

            return view('pages.visitIndex', compact('pregnancies', 'patients', 'visitData'));
        }

        $patients = DB::table('pregnancies')->get();
        return view('pages.visitIndex', compact('pregnancies', 'patients'));
    }


    public function storeVisit(Request $request)
    {
        $phnID = $request->input('input_id_patient');
        $pregnancy = Pregnanacy::where('patient_id', $phnID)->first();

        if ($pregnancy) {
            $savedId = $pregnancy->id;
        }

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

        return redirect()->back()->with('success', 'Complaints saved successfully.');
    }
}
