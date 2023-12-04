<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\GymnastUpdateRequest;
use App\Http\Requests\GymnastCreateRequest;

use App\Services\GymnastService;

use App\Models\Gymnast;
use App\Models\Club;
use App\Models\Coach;

class GymnastController extends Controller
{

    public function GymnastHomePage(GymnastService $gymnastService)
    {
        $gymnasts = Gymnast::where('is_deleted', '!=', 1)->get();

        $gymnastProfiles = $gymnasts->map(
            function ($gymnast) use ($gymnastService) {
                return $gymnastService->mapGymnastProfile($gymnast);
            }
        );

        return view('gymnast.gymnasts', ['gymnasts' => $gymnastProfiles]);
    }
    
    public function GymnastCreatePage()
    {
        $coaches = Coach::where('is_deleted', '!=', 1)->get();
        $clubs = Club::where('is_deleted', '!=', 1)->get();
        $groupings = [
            ["name" => "A"],
            ["name" => "B"],
            ["name" => "C"],
            ["name" => "D"],
        ];

        return view('gymnast.create', ['clubs' => $clubs, 'coaches' => $coaches, 'groupings' => $groupings]);
    }

    public function GymnastEditPage($id)
    {
        $gymnast = Gymnast::find($id);
        $coaches = Coach::where('is_deleted', '!=', 1)->get();
        $clubs = Club::where('is_deleted', '!=', 1)->get();
        $groupings = [
            ["name" => "A"],
            ["name" => "B"],
            ["name" => "C"],
            ["name" => "D"],
        ];

        return view('gymnast.edit', ['gymnast' => $gymnast, 'clubs' => $clubs, 'coaches' => $coaches, 'groupings' => $groupings]);
    }

    public function GymnastViewPage($id, GymnastService $gymnastService)
    {
        $gymnast = Gymnast::find($id);

        if (!$gymnast) {
            return abort(404); // Gymnast not found
        }

        $gymnastProfile = $gymnastService->mapGymnastProfile($gymnast);

        return view('gymnast.gymnast', ['gymnast' => $gymnastProfile]);
    }

    public function GymnastEdit(GymnastUpdateRequest $request, GymnastService $gymnastService)
    {
        $validatedData = $request->validated();
        $result = $gymnastService->updateGymnast($validatedData);

        if ($result) {
            return response()->json(['message' => 'Gymnast updated successfully'], 200);
        } else {
            return response()->json(['message' => 'Gymnast not found'], 404);
        }
    }

    public function GymnastCreate(GymnastCreateRequest $request, GymnastService $gymnastService)
    {
        $validatedData = $request->validated();
        $response = $gymnastService->createGymnast($validatedData);

        return response()->json(['message' => $response['message']], $response['status_code']);
    }

    public function GymnastDelete(Request $request, GymnastService $gymnastService)
    {
        $validatedData = $request->validate([
            'id' => 'required|numeric',
        ]);

        $id = $validatedData["id"];
        $response = $gymnastService->deleteGymnast($id);

        return response()->json(['message' => $response['message']], $response['status_code']);
    }
}
