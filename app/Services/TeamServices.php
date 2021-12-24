<?php

namespace App\Services;

use App\Models\Team;

class TeamServices
{

    public function getTeams($request)
    {
        $team = Team::orderBy('created_at', 'DESC');
        if($request->has('q'))
        {
            $team->where('name','like','%'.$request->q.'%');
        }
        if($request->has('per_page'))
        {
            return $team->paginate($request->per_page);
        }
        else
        {
            return $team->get();
        }
    }

    public function storeTeam($request)
    {
        $upload_path = 'images';
        if ($request->has('logo')) {
            $logo = $request->file('logo');
            $image_uploaded_path = $logo->store($upload_path, 'public');
            $save['logo'] = basename($image_uploaded_path);
        }
        $save['name'] = $request->name;
        $team = Team::create($save);
        return $team;
    }

    public function updateTeam($request, $id)
    {
        $team = Team::find($id);
        $upload_path = 'images';
        if ($request->hasFile('logo')) {
            $logo = $request->logo;
            $fileName = basename($logo->getClientOriginalName());

            //Get the path to the folder where the image is stored 
            //and then save the path in database
            $image_uploaded_path = $request->logo->storeAs('logo', $fileName, 'public');
            $update['logo'] = basename($image_uploaded_path);
        }
        $update['name'] = $request->name;

        $team->update($update);
        $team->refresh();
        return $team;
    }
}
