<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CompetitionService;
use App\Http\Requests\CompetitionCreateRequest;
use App\Models\Competition;

class CompetitionController extends Controller
{
    public function CompetitionHomePage(CompetitionService $competitionService)
    {
        $competitions = Competition::get();

        $competition_profiles = [];

        foreach ($competitions as $competition) {
            $competition_profile = $competitionService->mapCompetitionProfile($competition);
            $competition_profiles[] = $competition_profile;
        }

        return view('competition.competitions', ['competitions' => $competition_profiles]);
    }

    public function CompetitionViewPage($id)
    {
    }
    public function CompetitionDelete(Request $request)
    {
    }
    public function CompetitionEdit(Request $request)
    {
    }
    public function CompetitionCreate(CompetitionCreateRequest $request, CompetitionService $competitionService)
    {
        $validatedData = $request->validated();
        $response = $competitionService->createCompetition($request);

        return response()->json(['message' => $response['message']], $response['status_code']);
    }

    public function GetCompetitionData($competition_id, CompetitionService $competitionService)
    {
        $competition = Competition::find($competition_id);
        $data = $competitionService->mapCompetitionEditForm($competition);

        return response()->json($data);
    }
}
