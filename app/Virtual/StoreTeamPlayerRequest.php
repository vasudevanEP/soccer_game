<?php 

namespace App\Virtual;
/**
 * @OA\Schema(
 *      title="Store Teams request",
 *      description="Store Teams request body data",
 *      type="object",
 *      required={"name"}
 * )
 */
class StoreTeamPlayerRequest
{
 /**
     * @OA\Property(
     *      title="firstName",
     *      description="First Name of the new player",
     *      example="James"
     * )
     *
     * @var string
     */
    public $firstName;
    /**
     * @OA\Property(
     *      title="lastName",
     *      description="Last Name of the new player",
     *      example="Doe"
     * )
     *
     * @var string
     */
    public $lastName;

    /** 
     * @OA\Property(
     *      title="playerImage",
     *      description="Upload a Player Image",
     *      example="Upload image for the team player"
     * )
     *
     * @var string
     */

    public $playerImage;

    /**
     * @OA\Property(
     *      title="team_id",
     *      description="Team's id of the new player",
     *      format="int64",
     *      example=1
     * )
     *
     * @var integer
     */
    public $team_id;
}