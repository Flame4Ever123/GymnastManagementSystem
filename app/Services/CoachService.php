<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\Models\Coach;

class CoachService
{

    public function createCoach($validatedData)
    {
        DB::beginTransaction();

        try {

            $coach = new Coach;
            $coach->name =  $validatedData['name'];
            $coach->phone =  $validatedData['phone_no'];
            $coach->state =  $validatedData['state'];

            if (isset($validatedData['email'])) {
                $coach->email = $validatedData['email'];
            }

            if (isset($validatedData['license_no'])) {
                $coach->license_number = $validatedData['license_no'];
            }

            if (isset($validatedData['discipline'])) {
                $coach->discipline = $validatedData['discipline'];
            }

            if (isset($validatedData['address'])) {
                $coach->home_address = $validatedData['address'];
            }

            $coach->save();
            DB::commit();
            return [
                'status_code' => 200,
                'message' => "Coach created successfully",
            ];
        } catch (\Exception $e) {
            DB::rollback();
            return [
                'status_code' => 500,
                'error' => $e->getMessage(),
            ];
        }
    }

    public function updateCoach($validatedData)
    {
        $coach = Coach::find($validatedData['id']);

        if ($coach) {
            $coach->update([
                'license_number' => $validatedData['name'],
                'name' => $validatedData['name'],
                'phone' => $validatedData['phone_no'],
                'email' => $validatedData['email'],
                'home_address' => $validatedData['address'],
                'discipline' => $validatedData['discipline'],
                'state' => $validatedData['state'],
            ]);

            return true; // or return response or any relevant data
        } else {
            return false; // or return response or any relevant data
        }
    }

    public function deletecoach($id)
    {
        $coach = Coach::find($id);

        if ($coach) {
            $coach->is_deleted = 1;
            $coach->save();

            return [
                'status_code' => 200,
                'message' => 'coach deleted successfully',
            ];
        } else {
            return [
                'status_code' => 404,
                'message' => 'coach not found',
            ];
        }
    }

    public function mapCoachProfile(Coach $coach)
    {
        return [
            'id' => $coach->id,
            'license_number' => $coach->license_number,
            'name' => $coach->name,
            'phone' => $coach->phone,
            'email' => $coach->email,
            'address' => $coach->home_address,
            'discipline' => $coach->discipline,
            'state' => $coach->state,
        ];
    }
}
