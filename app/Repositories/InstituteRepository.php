<?php

namespace App\Repositories;

use App\Models\Institute;
use App\Repositories\BaseRepository;
use Illuminate\Http\Request;

class InstituteRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'name',
        'address',
        'phone',
        'email',
        'pan',
        'image'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Institute::class;
    }

    public function createInstitute(Request $request)
    {
        $input = $request->all();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $newName = time() . "." . $file->getClientOriginalExtension();
            $file->move("images", $newName);
            $input['image'] = "images/$newName";
        }
        return $this->create($input);
    }

    public function updateInstitute(Request $request, $id)
    {
        $input = $request->all();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $newName = time() . "." . $file->getClientOriginalExtension();
            $file->move("images", $newName);
            $input['image'] = "images/$newName";
        }
        return $this->update($input, $id);
    }
}
