<?php 

namespace App\Services;

use App\Models\TeamPlayers;

class TeamPlayersServices
{

    private $teamPlayers;

    public function __construct(TeamPlayers $teamPlayers)
    {
        $this->teamPlayers = $teamPlayers;
    }

    public function getTeamPlayers($request)
    {
        $players = $this->teamPlayers->with('team')->orderBy('created_at','DESC');
        if($request->has('q'))
        {
        $players =   $this->teamPlayers
            ->where('firstName','like',$request->q)
            ->orWhere('lastname','like',$request->q)
            ->whereHas('team',function($query) use ($request){
                $query->where('name','like',$request->q);
            });
        }
        if($request->has('team'))
        {
        $players =  $players 
            ->where('team_id',$request->team);
        }
        if($request->has('per_page'))
        {
            return $players->paginate($request->per_page);
        }
        else
        {
            return $players->get();
        }

    }

    public function storeTeamPlayers($request)
    {
        $upload_path = 'images';
        if ($request->has('playerImage')) {
            $logo = $request->file('playerImage');
            $image_uploaded_path = $logo->store($upload_path, 'public');
            $save['playerImage'] = basename($image_uploaded_path);
        }
        $save['firstName'] = $request->firstName;
        $save['lastName'] = $request->lastName;
        $save['team_id'] = $request->team_id;
        $team = $this->teamPlayers->create($save);
        return $team;
    }


}