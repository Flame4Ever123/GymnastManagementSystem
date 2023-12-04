<?php

namespace App\Http\Controllers;

use App\Services\ClubService;

use App\Models\Club;

use Illuminate\Http\Request;
use App\Http\Requests\ClubUpdateRequest;
use App\Http\Requests\ClubCreateRequest;

class ClubController extends Controller
{
    public function ClubHomePage(ClubService $clubService)
    {
        $clubs = Club::where('is_deleted', '!=', 1)->get();

        $club_profiles = [];

        foreach ($clubs as $club) {
            $club_profile = $clubService->mapClubProfile($club);
            $club_profiles[] = $club_profile;
        }

        return view('club.clubs', ['clubs' => $club_profiles]);
    }
    public function ClubEditPage($id)
    {
        $club = Club::find($id);
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

        return view('club.edit', ['states' => $states, 'club' => $club]);
    }
    public function ClubCreatePage()
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

        return view('club.create', ['states' => $states]);
    }
    public function ClubViewPage($id)
    {
    }
    public function ClubCreate(ClubCreateRequest $request, ClubService $clubService)
    {
        $validatedData = $request->validated();
        $response = $clubService->createClub($request);

        return response()->json(['message' => $response['message']], $response['status_code']);
    }
    public function ClubEdit(ClubUpdateRequest $request, ClubService $clubService)
    {
        $validatedData = $request->validated();
        $result = $clubService->updateClub($request);

        if ($result) {
            return response()->json(['message' => 'Club updated successfully'], 200);
        } else {
            return response()->json(['message' => 'Club not found'], 404);
        }
    }
    public function ClubDelete(Request $request, ClubService $clubService)
    {
        $validatedData = $request->validate([
            'id' => 'required|numeric',
        ]);

        $id = $validatedData["id"];
        $response = $clubService->deleteClub($id);

        return response()->json(['message' => $response['message']], $response['status_code']);
    }
}
