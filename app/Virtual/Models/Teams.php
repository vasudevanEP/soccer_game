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
class Teams
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
     *      title="Name",
     *      description="Name of the new team",
     *      example="A nice team"
     * )
     *
     * @var string
     */
    public $name;

    /**
     * @OA\Property(
     *      title="Logo",
     *      description="Upload a Logo",
     *      format="binary",
     *      example="Upload image logo for the team"
     * )
     *
     * @var string
     */
    public $logo;
        
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