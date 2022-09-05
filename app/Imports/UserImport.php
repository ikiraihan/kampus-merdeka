<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Traits\RefreshDatabaseWithData;


class UserImport implements ToCollection, WithHeadingRow
{
    public function sheets(): array
    {
        return [
            'Sheet1' => new UserImport(),
        ];
    }

    public function collection(Collection $rows)
    {
            $truncate = DB::table('users')->delete();
            foreach($rows as $row){
               $user = User::create([
                    'name'      => $row['name'],
                    'email'     => $row['email'],
                    'city'     => $row['city'],
                    'password'  => Hash::make($row['pass']),
                ]);
            }
    }
}
