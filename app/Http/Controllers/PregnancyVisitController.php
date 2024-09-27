<?php

namespace App\Http\Controllers;

use App\Models\GynExaminations;
use App\Models\Ix;
use App\Models\ObsExaminations;
use App\Models\PresentComplaint;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Validation\ValidatesRequests;

class PregnancyVisitController extends Controller
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

        return view('pages.visitIndex', compact('pregnanacies'));
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

    public function storeVisit(Request $request)
    {
        // $id = $request->id;

        // if ($id == 0) { // create


        //     $pregnanacy = new Pregnanacy();
        // } else { // update

        //     $pregnanacy = Pregnanacy::find($id);
        // }

        // $pregnanacy = new Pregnanacy();
        // $pregnanacy->patient_id = $request->input('input_id_patient');
        // $pregnanacy->category = $request->input('category');
        // $pregnanacy->detail = $request->input('detail');
        // $pregnanacy->save();

        $savedId = $request->input('input_id_patient');

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
