<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\Models\Competition;

class CompetitionService
{

    public function createCompetition($validatedData)
    {
        DB::beginTransaction();

        try {
            // Define a regular expression pattern to match dates in the format MM/DD/YYYY
            $datePattern = '/\d{2}\/\d{2}\/\d{4}/';
            preg_match_all($datePattern, $validatedData['date_range'], $dateMatches);
            $start_date = \Carbon\Carbon::parse($dateMatches[0][0])->format('Y-m-d');
            $end_date = \Carbon\Carbon::parse($dateMatches[0][1])->format('Y-m-d');

            $competition = new Competition;
            $competition->name =  $validatedData['name'];
            $competition->start_date =  $start_date;
            $competition->end_date =  $end_date;

            $competition->save();

            DB::commit();
            return [
                'status_code' => 200,
                'message' => "Competition created successfully",
            ];
        } catch (\Exception $e) {
            DB::rollback();
            return [
                'status_code' => 500,
                'error' => $e->getMessage(),
            ];
        }
    }

    public function updateCompetition($validatedData)
    {
        $coach = Competition::find($validatedData['id']);

        if ($coach) {
            $coach->update([
                'coach_name' => $validatedData['name'],
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

    public function deleteCompetition($id)
    {
        $coach = Competition::find($id);

        if ($coach) {
            $coach->is_deleted = 1;
            $coach->save();

            return [
                'status_code' => 200,
                'message' => 'Competition record deleted successfully',
            ];
        } else {
            return [
                'status_code' => 404,
                'message' => 'Competition not found',
            ];
        }
    }

    public function mapCompetitionProfile(Competition $competition)
    {
        return [
            'id' => $competition->id,
            'name' => $competition->name,
            'start_date' => $competition->start_date,
            'end_date' => $competition->end_date,
            'year' => $competition->year,
            'participant' => 10,
        ];
    }

    public function mapCompetitionEditForm(Competition $competition)
    {
        $carbonDate = \Carbon\Carbon::createFromFormat('Y-m-d', $competition->start_date);
        $startDate= $carbonDate->format('m/d/Y');

        $carbonDate = \Carbon\Carbon::createFromFormat('Y-m-d', $competition->end_date);
        $endDate = $carbonDate->format('m/d/Y');

        $date_range = $startDate . " - " .$endDate;

        return [
            'id' => $competition->id,
            'name' => $competition->name,
            'date_range' => $date_range ,
            'description' => $competition->description,
        ];
    }
}
