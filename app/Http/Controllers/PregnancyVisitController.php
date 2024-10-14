<?php

namespace App\Http\Controllers;

use App\Models\GynExaminations;
use App\Models\Investigation;
use App\Models\ObsExaminations;
use App\Models\Pregnanacy;
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

        $patients = DB::table('pregnancies');
        if ($patientID) {
            $pregnancies->where('pregnancies.patient_id', $patientID);
        }

        $patients = $patients->get(); // Fetch the results
        $pregnancies = $pregnancies->get(); // Fetch the results

        // Calculate age
        foreach ($pregnancies as $pregnanacyAge) {
            $pregnanacyAge->age = Carbon::parse($pregnanacyAge->patientDateofbirth)->age;
        }

        return view('pages.visitIndex', compact('pregnancies', 'patients'));
    }

    public function storeVisit(Request $request)
    {
        $phnID = $request->input('input_id_patient');
        $pregnancy = Pregnanacy::where('patient_id', $phnID)->first();

        if ($pregnancy) {
            $savedId = $pregnancy->id;
        }

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
            'auscultator_mass' => $request->input('auscultator_mass'),
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
        // $gynExamination->gyn_general = implode(', ', $request->input('gyn_general', []));
        // $gynExamination->gyn_thyroid_examination = $request->input('rdio-primary4');
        // $gynExamination->height = $request->input('height');
        // $gynExamination->weight = $request->input('weight');
        // $gynExamination->bmi = $request->input('bmi');
        // $gynExamination->gyn_temperature = $request->input('gyn_temperature');
        // $gynExamination->gyn_pulse_rate = $request->input('gyn_pulse_rate');
        // $gynExamination->rhythm = $request->input('rhythm');
        // $gynExamination->heart_sound = $request->input('heart_sound');
        // $gynExamination->murmur = $request->input('murmur');
        // $gynExamination->gyn_systolic = $request->input('gyn_systolic');
        // $gynExamination->gyn_diastolic = $request->input('gyn_diastolic');
        // $gynExamination->breath_sound = $request->input('breath_sound');
        // $gynExamination->gyn_inspection = implode(', ', $request->input('gyn_inspection', []));
        // $gynExamination->site_mass = $request->input('site_mass');
        // $gynExamination->size_mass = $request->input('size_mass');
        // $gynExamination->percussion_mass = $request->input('percussion_mass');
        // $gynExamination->auscultator_mass = $request->input('auscultator_mass');
        // $gynExamination->palpation = $request->input('palpation');
        // $gynExamination->percussion = $request->input('percussion');
        // $gynExamination->auscultation = $request->input('auscultation');
        // $gynExamination->inspectionSpeculum = implode(', ', $request->input('inspectionSpeculum', []));
        // $gynExamination->stress_incontinence = $request->input('stress_incontinence');
        // $gynExamination->cervical_consistency = $request->input('cervical_consistency');
        // $gynExamination->os = $request->input('os');
        // $gynExamination->polyp_ulcer = $request->input('polyp_ulcer');
        // $gynExamination->cervical_motion_tenderness = $request->input('cervical_motion_tenderness');
        // $gynExamination->endometrium = $request->input('endometrium');
        // $gynExamination->fibroid = $request->input('fibroid');
        // $gynExamination->size = $request->input('size');
        // $gynExamination->direction = $request->input('direction');
        // $gynExamination->ovary = $request->input('ovary');
        // $gynExamination->adnexialmass = $request->input('adnexialmass');
        // $gynExamination->bladder = $request->input('bladder');
        // $gynExamination->free_fluid = $request->input('free_fluid');
        // $gynExamination->cavity = $request->input('cavity');
        // $gynExamination->polyps = $request->input('polyps');
        // $gynExamination->ectopic = $request->input('ectopic');
        // $gynExamination->problist = $request->input('problist');
        // $gynExamination->medical_hx = $request->input('medical_hx');
        // $gynExamination->surgery_hx = $request->input('surgery_hx');
        // $gynExamination->save();
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
        // $obsExamination->obs_general = implode(', ', $request->input('obs_general', []));
        // $obsExamination->obs_systolic = $request->input('obs_systolic');
        // $obsExamination->obs_diastolic = $request->input('obs_diastolic');
        // $obsExamination->obs_pulse_rate = $request->input('obs_pulse_rate');
        // $obsExamination->obs_thyroid_examination = $request->input('rdio-primary5');
        // $obsExamination->obs_inspection = implode(', ', $request->input('obs_inspection', []));
        // $obsExamination->sfh = $request->input('sfh');
        // $obsExamination->lie = $request->input('lie');
        // $obsExamination->position = $request->input('position');
        // $obsExamination->engagement = $request->input('rdio-primary6');
        // $obsExamination->fhs = $request->input('rdio-primary8');
        // $obsExamination->cervical_dilatation = $request->input('cervical_dilatation');
        // $obsExamination->cervical_consistency = $request->input('cervical_consistency');
        // $obsExamination->cervical_canel = $request->input('cervical_canel');
        // $obsExamination->cervical_position = $request->input('cervical_position');
        // $obsExamination->station = $request->input('station');
        // $obsExamination->fetus = $request->input('fetus');
        // $obsExamination->precentation = $request->input('precentation');
        // $obsExamination->bpd = $request->input('bpd');
        // $obsExamination->ac = $request->input('ac');
        // $obsExamination->hc = $request->input('hc');
        // $obsExamination->fl = $request->input('fl');
        // $obsExamination->placental_position = $request->input('placental_position');
        // $obsExamination->efw = $request->input('efw');
        // $obsExamination->liquor = $request->input('rdio-primary7');
        // $obsExamination->dopplier = $request->input('dopplier');
        // $obsExamination->save();
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
        // $investigation->ctg = $request->input('ctg');
        // $investigation->hb = $request->input('hb');
        // $investigation->plt = $request->input('plt');
        // $investigation->wbc = $request->input('wbc');
        // $investigation->crp = $request->input('crp');
        // $investigation->urine_full_report = $request->input('urine_full_report');
        // $investigation->ohtt_bss = $request->input('ohtt_bss');
        // $investigation->rbs = $request->input('rbs');
        // $investigation->rbs_unit = $request->input('rbs_unit');
        // $investigation->fbs = $request->input('fbs');
        // $investigation->fbs_unit = $request->input('fbs_unit');
        // $investigation->ppbs = $request->input('ppbs');
        // $investigation->ppbs_unit = $request->input('ppbs_unit');
        // $investigation->scr = $request->input('scr');
        // $investigation->bun = $request->input('bun');
        // $investigation->sodium = $request->input('sodium');
        // $investigation->potassium = $request->input('potassium');
        // $investigation->ast = $request->input('ast');
        // $investigation->alt = $request->input('alt');
        // $investigation->pt = $request->input('pt');
        // $investigation->aptt = $request->input('aptt');
        // $investigation->save();
        if (array_filter($data)) {
            foreach ($data as $key => $value) {
                $investigation->$key = $value; // Assign values dynamically
            }
            $investigation->save(); // Save the investigation
        }

        return redirect()->back()->with('success', 'Complaints saved successfully.');
    }
}
