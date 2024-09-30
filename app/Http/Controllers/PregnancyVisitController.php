<?php

namespace App\Http\Controllers;

use App\Models\GynExaminations;
use App\Models\Ix;
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
        $gynExamination->ectopic_tvs = $request->input('ectopic_tvs');
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

        return redirect()->back()->with('success', 'Complaints saved successfully.');
    }
}
