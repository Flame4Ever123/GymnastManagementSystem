<?php

namespace App\Services;
use Illuminate\Support\Facades\DB;
use App\Models\Gymnast;

class GymnastService
{

    public function createGymnast(array $validatedData)
    {
        DB::beginTransaction();

        try {
            $gymnast = new Gymnast;
            $gymnast->name = $validatedData['name'];
            $gymnast->category = $validatedData['grouping'];
            $gymnast->member_id = $validatedData['member_id'];
            $gymnast->club_id = $validatedData['club'];
            $gymnast->coach_id = $validatedData['coach'];

            if (isset($validatedData['year_of_birth'])) {
                $gymnast->year_of_birth = $validatedData['year_of_birth'];
            }
            if (isset($validatedData['note'])) {
                $gymnast->notes = $validatedData['note'];
            }
            $gymnast->save();
            DB::commit();
            return [
                'status_code' => 200,
                'message' => "Gymnast created successfully",
            ];
        } catch (\Exception $e) {
            DB::rollback();
            return [
                'status_code' => 500,
                'error' => $e->getMessage(),
            ];
        }
    }

    public function updateGymnast($validatedData)
    {
        $gymnast = Gymnast::find($validatedData['id']);

        if ($gymnast) {
            $gymnast->update([
                'name' => $validatedData['name'],
                'member_id' => $validatedData['member_id'],
                'coach_id' => $validatedData['coach'],
                'club_id' => $validatedData['club'],
                'category' => $validatedData['grouping'],
                'year_of_birth' => $validatedData['year_of_birth'],
                'notes' => $validatedData['note'],
            ]);

            return true; // or return response or any relevant data
        } else {
            return false; // or return response or any relevant data
        }
    }

    public function deleteGymnast($id)
    {
        $gymnast = Gymnast::find($id);

        if ($gymnast) {
            $gymnast->is_deleted = 1;
            $gymnast->save();

            return [
                'status_code' => 200,
                'message' => 'Gymnast deleted successfully',
            ];
        } else {
            return [
                'status_code' => 404,
                'message' => 'Gymnast not found',
            ];
        }
    }

    public function mapGymnastProfile(Gymnast $gymnast)
    {
        return [
            'id' => $gymnast->id,
            'gymnast_id' => $gymnast->member_id,
            'name' => $gymnast->name,
            'club_name' => $gymnast->club->club_name,
            'coach' => $gymnast->coach->name,
            'category' => $gymnast->category,
            'year_of_birth' => $gymnast->year_of_birth,
            'notes' => $gymnast->notes,
        ];
    }
}
