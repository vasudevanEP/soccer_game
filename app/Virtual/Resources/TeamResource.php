<?php 
/**
 * @OA\Schema(
 *     title="TeamResource",
 *     description="Team resource",
 *     @OA\Xml(
 *         name="TeamResource"
 *     )
 * )
 */
class TeamResource
{
    /**
     * @OA\Property(
     *     title="Data",
     *     description="Data wrapper"
     * )
     *
     * @var \App\Virtual\Models\Teams[]
     */
    private $data;
}