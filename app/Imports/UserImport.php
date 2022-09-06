<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Traits\RefreshDatabaseWithData;
use Maatwebsite\Excel\Concerns\ToModel;

class UserImport implements ToModel
{
    public function sheets(): array
    {
        return [
            'Sheet1' => new UserImport(),
        ];
    }

    // public function collection(Collection $rows)
    // {
    //         //$truncate = DB::table('users')->delete();
    //         foreach($rows as $row){
    //            $user = User::create([
    //                 'name'      => $row[1],
    //                 'email'     => $row[2],
    //                 'city'     => $row[3],
    //                 'password'  => $row[4],
    //             ]);
    //         }
    // }
    public function model(array $row)
    {
        return new User([
                    'name'      => $row[1],
                    'email'     => $row[2],
                    'city'     => $row[3],
                    'password'  => $row[4],
        ]);
    }
}
