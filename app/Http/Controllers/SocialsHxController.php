<?php

namespace App\Http\Controllers;

use App\Models\SocialsHx;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SocialsHxController extends Controller
{

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

        return view('pages.testIndex', compact('pregnanacies'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $socialHx = new SocialsHx();
            $socialHx->pregnancy_id = "1";
            $socialHx->family_status = $request->input('family_status', '');
            $socialHx->monthly_income = $request->input('monthly_income', '');
            $socialHx->patient_education = $request->input('patient_education', '');
            $socialHx->patient_occupation = $request->input('patient_occupation', '');
            $socialHx->patient_social_problem = implode(', ', $request->input('patient_social_problem', []));
            $socialHx->partner_education = $request->input('partner_education', '');
            $socialHx->partner_occupation = $request->input('partner_occupation', '');
            $socialHx->partner_social_problem = implode(', ', $request->input('partner_social_problem', []));
            $socialHx->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(SocialsHx $socialsHx)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SocialsHx $socialsHx)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SocialsHx $socialsHx)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SocialsHx $socialsHx)
    {
        //
    }
}
