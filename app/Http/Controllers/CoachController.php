<?php

namespace App\Http\Controllers;

use App\Http\Requests\CoachUpdateRequest;
use App\Http\Requests\CoachCreateRequest;

use App\Services\CoachService;

use App\Models\Coach;
use Illuminate\Http\Request;

class CoachController extends Controller
{
    public function CoachHomePage(CoachService $coachService)
    {
        $coaches = Coach::where('is_deleted', '!=', 1)->get();

        $coach_profiles = [];

        foreach ($coaches as $coach) {
            $coach_profile = $coachService->mapCoachProfile($coach);
            $coach_profiles[] = $coach_profile;
        }

        return view('coach.coaches', ['coaches' => $coach_profiles]);
    }
    public function CoachEditPage($id)
    {
        $coach = Coach::find($id);
        $states = [
            ["name" => "Johor"],
            ["name" => "Kedah"],
            ["name" => "Kelantan"],
            ["name" => "Melaka"],
            ["name" => "Negeri Sembilan"],
            ["name" => "Pahang"],
            ["name" => "Penang"],
            ["name" => "Perak"],
            ["name" => "Perlis"],
            ["name" => "Sabah"],
            ["name" => "Sarawak"],
            ["name" => "Selangor"],
            ["name" => "Terengganu"],
            ["name" => "Federal Territories"],
        ];

        return view('coach.edit', ['states' => $states, 'coach' => $coach]);
    }
    public function CoachCreatePage()
    {

        $states = [
            ["name" => "Johor"],
            ["name" => "Kedah"],
            ["name" => "Kelantan"],
            ["name" => "Melaka"],
            ["name" => "Negeri Sembilan"],
            ["name" => "Pahang"],
            ["name" => "Penang"],
            ["name" => "Perak"],
            ["name" => "Perlis"],
            ["name" => "Sabah"],
            ["name" => "Sarawak"],
            ["name" => "Selangor"],
            ["name" => "Terengganu"],
            ["name" => "Federal Territories"],
        ];

        return view('coach.create', ['states' => $states]);
    }
    public function CoachViewPage($id)
    {
    }
    public function CoachDelete(Request $request, CoachService $coachService)
    {
        $validatedData = $request->validate([
            'id' => 'required|numeric',
        ]);

        $id = $validatedData["id"];
        $response = $coachService->deleteCoach($id);

        return response()->json(['message' => $response['message']], $response['status_code']);
    }
    public function CoachEdit(CoachUpdateRequest $request, CoachService $coachService)
    {
        $validatedData = $request->validated();
        $result = $coachService->updateCoach($request);

        if ($result) {
            return response()->json(['message' => 'Coach updated successfully'], 200);
        } else {
            return response()->json(['message' => 'Coach not found'], 404);
        }
    }
    public function CoachCreate(CoachCreateRequest $request, CoachService $coachService)
    {
        $validatedData = $request->validated();
        $response = $coachService->createCoach($request);

        return response()->json(['message' => $response['message']], $response['status_code']);
    }
}
