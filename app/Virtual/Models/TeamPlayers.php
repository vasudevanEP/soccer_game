<?php 
namespace App\Virtual\Models;

/**
 * @OA\Schema(
 *     title="team",
 *     description="team model",
 *     @OA\Xml(
 *         name="team"
 *     )
 * )
 */
class TeamPlayers
{

    /**
     * @OA\Property(
     *     title="ID",
     *     description="ID",
     *     format="int64",
     *     example=1
     * )
     *
     * @var integer
     */
    private $id;

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

    /**
     * @OA\Property(
     *     title="Created at",
     *     description="Created at",
     *     example="2020-01-27 17:50:45",
     *     format="datetime",
     *     type="string"
     * )
     *
     * @var \DateTime
     */
    private $created_at;

    /**
     * @OA\Property(
     *     title="Updated at",
     *     description="Updated at",
     *     example="2020-01-27 17:50:45",
     *     format="datetime",
     *     type="string"
     * )
     *
     * @var \DateTime
     */
    private $updated_at;

    /**
     * @OA\Property(
     *     title="Deleted at",
     *     description="Deleted at",
     *     example="2020-01-27 17:50:45",
     *     format="datetime",
     *     type="string"
     * )
     *
     * @var \DateTime
     */
    private $deleted_at;

  
}