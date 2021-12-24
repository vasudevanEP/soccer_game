<?php 
/**
 * @OA\Schema(
 *      title="Store Teams request",
 *      description="Store Teams request body data",
 *      type="object",
 *      required={"name"}
 * )
 */

class StoreTeamRequest
{
    /**
     * @OA\Property(
     *      title="name",
     *      description="Name of the new project",
     *      example="A nice project"
     * )
     *
     * @var string
     */
    public $name;

    /**
     * @OA\Property(
     *      title="logo",
     *      description="Upload a Logo (JPEG,JPG,PNG)",
     *      example="Upload image logo for the team "
     * )
     *
     * @var string
     */
    public $logo;
     }