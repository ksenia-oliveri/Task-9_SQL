<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Controllers\FormsController;
use Illuminate\Http\Request;

/**
 * @OA\Info(
 *      version="1.0.0",
 *      title="Students info",
 *      description="Information about students, groups and their courses",
 * )
 * 
 */



class FormsApiController extends Controller
{
    /**
     * @OA\Get(
     *      path="/api/v1/groups",
     *      operationId="getGroupsWithLessOrEqualStudents",
     *      tags={"Groups"},
     *      summary="Get list of groups with less or equals number of students",
     *      description="Returns list of groups",
     *      @OA\Parameter(
     *          name="number",
     *          description="Count of students",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="successful operation"
     *       ),
     *      @OA\Response(response=400, description="Bad request"),
     *      @OA\Response(response=404, description="Resource Not Found"),
     *      security={
     *         {
     *             "oauth2_security_example": {"write:projects", "read:projects"}
     *         }
     *     },
     * )
     */
    
    public function findGroups(Request $request)
    {   
       
    }

    /**
     * @OA\Get(
     *      path="/api/v1/groups",
     *      operationId="getGroupsWithLessOrEqualStudents",
     *      tags={"Groups"},
     *      summary="Get list of groups with less or equals number of students",
     *      description="Returns list of groups",
     *      @OA\Parameter(
     *          name="number",
     *          description="Count of students",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="successful operation"
     *       ),
     *      @OA\Response(response=400, description="Bad request"),
     *      @OA\Response(response=404, description="Resource Not Found"),
     *      security={
     *         {
     *             "oauth2_security_example": {"write:projects", "read:projects"}
     *         }
     *     },
     * )
     */

    public function findStudentsOnCourse(Request $request)
    {

    }

    public function addNewStudent(Request $first_name, $last_name)
    {

    }
    

  
}
