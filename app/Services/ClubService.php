<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\Models\Club;

class ClubService
{

    public function createClub($validatedData)
    {
        DB::beginTransaction();

        try {

            $club = new Club;
            $club->club_name =  $validatedData['name'];

            if (isset($validatedData['description'])) {
                $club->description = $validatedData['description'];
            }
            if (isset($validatedData['address'])) {
                $club->address = $validatedData['address'];
            }
            if (isset($validatedData['state'])) {

                $club->state = $validatedData['state'];
            }
            if (isset($validatedData['country'])) {
                $club->country = $validatedData['country'];
            }

            $club->save();
            DB::commit();
            return [
                'status_code' => 200,
                'message' => "Club created successfully",
            ];
        } catch (\Exception $e) {
            DB::rollback();
            return [
                'status_code' => 500,
                'error' => $e->getMessage(),
            ];
        }
    }

    public function updateClub($validatedData)
    {
        $club = Club::find($validatedData['id']);

        if ($club) {
            $club->update([
                'club_name' => $validatedData['name'],
                'description' => $validatedData['description'],
                'address' => $validatedData['address'],
                'state' => $validatedData['state'],
                'country' => $validatedData['country'],
            ]);

            return true; // or return response or any relevant data
        } else {
            return false; // or return response or any relevant data
        }
    }

    public function deleteClub($id)
    {
        $club = Club::find($id);

        if ($club) {
            $club->is_deleted = 1;
            $club->save();

            return [
                'status_code' => 200,
                'message' => 'Club deleted successfully',
            ];
        } else {
            return [
                'status_code' => 404,
                'message' => 'Club not found',
            ];
        }
    }

    public function mapClubProfile(Club $club)
    {
        return [
            'id' => $club->id,
            'state' => $club->state,
            'name' => $club->club_name,
            'address' => $club->address,
            'description' => $club->description,
            'member_count' => $club->clubHasManyGymnasts->count(),
            'coach_count' => $club->clubHasManyCoaches->count(),
        ];
    }
}
