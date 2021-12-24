<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Team;
use Illuminate\Http\Request;
use \App\Services\TeamServices;
use App\Http\Controllers\Controller;
use App\Http\Resources\TeamResource;
use App\Http\Requests\StoreTeamRequest;
use App\Http\Requests\UpdateTeamRequest;

class TeamController extends Controller
{
    protected $teamServices;

    public function __construct(TeamServices $teamservice)
    {
        $this->teamServices = $teamservice;
    }

    /**
     * @OA\Get(
     *      path="/v1/teams",
     *      operationId="getTeamsList",
     *      tags={"Teams"},
     *      summary="Get list of teams",
     *      description="Returns list of teams",
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
     *          @OA\JsonContent(ref="#/components/schemas/TeamResource")
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
            $team = $this->teamServices->getTeams($request);

            return new TeamResource($team);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 401);
        }
    }


    public function create()
    {
        //
    }

    /**
     * @OA\Post(
     *      path="/v1/teams",
     *      operationId="storeTeam",
     *      tags={"Teams"},
     *     security={
     *     {"passport": {}}},
     *      summary="Store new Team",
     *      description="Returns team data",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/StoreTeamRequest")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Teams")
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
    public function store(StoreTeamRequest $request, Team $team)
    {
        try {
            $team = $this->teamServices->storeTeam($request);

            return response()->json(new TeamResource($team));
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 403);
        }
    }

    /**
     * @OA\Get(
     *      path="/v1/teams/{id}",
     *      operationId="getTeamsById",
     *      tags={"Teams"},
     *      summary="Get Team information",
     *      description="Returns Team data",
     *      @OA\Parameter(
     *          name="id",
     *          description="Team id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Teams")
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

            $task = new TeamResource(Team::findorfail($id));
            return response()->json($task);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 403);
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
     *      path="/v1/teams/{id}",
     *      operationId="updateProject",
     *      tags={"Teams"},
     *       security={
     *     {"passport": {}}},
     *      summary="Update existing Team",
     *      description="Returns updated team data",
     *      @OA\Parameter(
     *          name="id",
     *          description="Team id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/UpdateTeamRequest")
     *      ),
     *      @OA\Response(
     *          response=202,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Teams")
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
    public function update(UpdateTeamRequest $request, $id)
    {
        try {
            $team = $this->teamServices->updateTeam($request, $id);

            return response()->json($team, 202);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 403);
        }
    }

    /**
     * @OA\Delete(
     *      path="/v1/teams/{id}",
     *      operationId="deleteTeams",
     *      tags={"Teams"},
     *      security={
     *     {"passport": {}}},
     *      summary="Delete existing Team",
     *      description="Deletes a record and returns no content",
     *      @OA\Parameter(
     *          name="id",
     *          description="Team id",
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
            Team::where('id', $id)->delete();
            return response('Record Deleted', 204);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 404);
        }
    }
}
