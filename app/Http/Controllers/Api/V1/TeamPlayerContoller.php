<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\TeamPlayers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\TeamPlayersServices;
use App\Http\Requests\StoreTeamRequest;
use App\Http\Resources\TeamPlayerResource;
use App\Http\Requests\StoreTeamPlayerRequest;
use App\Http\Requests\UpdateTeamPlayerRequest;

class TeamPlayerContoller extends Controller
{
    private $teamPlayers;

    public function __construct(TeamPlayersServices $teamPlayersServices)
    {
        $this->teamPlayers = $teamPlayersServices;
    }
    /**
     * @OA\Get(
     *      path="/v1/teamplayers",
     *      operationId="getTeamsPlayersList",
     *      tags={"Team Players"},
     *      summary="Get list of teams",
     *      description="Returns list of team players",
     *   @OA\Parameter(
     *          name="q",
     *          description="Search Term",
     *          required=false,
     *          in="path",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *   @OA\Parameter(
     *          name="team",
     *          description="Team vise players list",
     *          required=false,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *   @OA\Parameter(
     *          name="per_page",
     *          description="No Of items per page, if not mentioned all the data is dumped",
     *          required=false,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/TeamPlayerResource")
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *     )
     */
    public function index(Request $request)
    {
        try {
            $team_players = $this->teamPlayers->getTeamPlayers($request);
            return new TeamPlayerResource($team_players);
        } catch (\Exception $e) {
            return response()->json(['error'=>$e->getMessage()], 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * @OA\Post(
     *      path="/v1/teamplayers",
     *      operationId="storeTeam",
     *      tags={"Team Players"},
     *      security={
     *     {"passport": {}}},
     *      summary="Store new Team Player",
     *      description="Returns player data",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/StoreTeamPlayerRequest")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/TeamPlayers")
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     * )
     */
    public function store(StoreTeamPlayerRequest $request)
    {
        try {
            $teamPlayers = $this->teamPlayers->storeTeamPlayers($request);
            return response()->json(new TeamPlayerResource($teamPlayers));
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(['error'=>'Invalid Input Parameters'], 400);
        }
        catch (\Exception $e) {
            return response()->json(['error'=>$e->getMessage()], 500);
        }
    }

    /**
     * @OA\Get(
     *      path="/v1/teamplayers/{id}",
     *      operationId="getTeamPlayersById",
     *      tags={"Team Players"},
     *      summary="Get player information",
     *      description="Returns Team player data",
     *      @OA\Parameter(
     *          name="id",
     *          description="Player id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/TeamPlayers")
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *    
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     * )
     */
    public function show($id)
    {
        try {
            $player = TeamPlayers::find($id);
            if(empty($player))
            {
                throw new \Exception('Player Not Found');
            }
            return response()->json(new TeamPlayerResource($player));
        } catch (\Exception $e) {
            return response()->json(['error'=>$e->getMessage()], 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * @OA\Put(
     *      path="/v1/teamplayers/{id}",
     *      operationId="updateTeamPlayer",
     *      tags={"Team Players"},
     *      security={
     *     {"passport": {}}},
     *      summary="Update existing Team Player",
     *      description="Returns updated team player data",
     *      @OA\Parameter(
     *          name="id",
     *          description="Player id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/UpdateTeamPlayerRequest")
     *      ),
     *      @OA\Response(
     *          response=202,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/TeamPlayers")
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found"
     *      )
     * )
     */
    public function update(UpdateTeamPlayerRequest $request, $id)
    {
        try{
            $player = TeamPlayers::find($id);
            if(empty($player))
            {
                throw new \Exception('Player Not Found');
            }
            $player->update($request->all());
            $player->refresh();
            return response()->json(new TeamPlayerResource($player));
        }
        catch (\Exception $e) {
            return response()->json(['error'=>$e->getMessage()], 500);
        }
    }

    /**
     * @OA\Delete(
     *      path="/v1/teamplayers/{id}",
     *      operationId="deleteTeamplayers",
     *      tags={"Team Players"},
     *      security={
     *     {"passport": {}}},
     *      summary="Delete existing Team Player",
     *      description="Deletes a record and returns no content",
     *      @OA\Parameter(
     *          name="id",
     *          description="Player id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=204,
     *          description="Successful operation",
     *          @OA\JsonContent()
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found"
     *      )
     * )
     */
    public function destroy($id)
    {
        try {
            TeamPlayers::where('id', $id)->delete();
            return response('Record Deleted', 204);
        } catch (\Exception $e) {
            return response()->json(['error'=>$e->getMessage()], 500);
        }
    }
}
