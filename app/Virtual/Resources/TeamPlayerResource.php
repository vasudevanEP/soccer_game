<?php 
/**
 * @OA\Schema(
 *     title="TeamPlayerResource",
 *     description="Team Players resource",
 *     @OA\Xml(
 *         name="TeamPlayerResource"
 *     )
 * )
 */
class TeamPlayerResource
{
    /**
     * @OA\Property(
     *     title="Data",
     *     description="Data wrapper"
     * )
     *
     * @var \App\Virtual\Models\TeamPlayers[]
     */
    private $data;
}