<?php

namespace App\Domains\Test\Http\Controllers\Api\Test;

use App\Http\Controllers\Controller;
use App\Domains\Test\Models\Test;
use Illuminate\Http\Request;

/**
 * Class TestController.
 */
class TestController extends Controller
{
    /**
     * @OA\Get(
     * path="/api/test",
     * summary="Get All Tests",
     * description="Show All Tests",
     * operationId="getAllTests",
     * tags={"Test"},
     * @OA\Response(
     *    response=200,
     *    description="Returns when Test are found",
     *    @OA\JsonContent(
     *     @OA\Items(
     *       @OA\Property(property="test", type="increments", example="1"),
     *       @OA\Property(property="deleted_at", type="string", example="null"),
     *       @OA\Property(property="created_at", type="string", example="2021-03-10T09:03:27.000000Z"),
     *       @OA\Property(property="updated_at", type="string", example="2021-03-10T09:03:27.000000Z"),
     *    )
     * )
     * )
     * )
     */
    public function index()
    {
        return Test::all();
    }



    /**
     * @OA\Get(
     * path="/api/test/{id}",
     * summary="Get Test by id",
     * description="Show one Test by id",
     * operationId="getOneTests",
     * tags={"test"},
     * @OA\Parameter(
     *    description="ID of test",
     *    in="path",
     *    name="id",
     *    required=true,
     *    example="1",
     * ),
     * @OA\Response(
     *    response=404,
     *    description="Returns when test id is not found",
     *    @OA\JsonContent(
     *       @OA\Property(property="error", type="string", example="Resource not found"),
     *    )
     * ),
     * @OA\Response(
     *    response=200,
     *    description="Returns when Test is found",
     *    @OA\JsonContent(
     *       @OA\Property(property="test", type="increments", example="1"),
     *       @OA\Property(property="deleted_at", type="string", example="null"),
     *       @OA\Property(property="created_at", type="string", example="2021-03-10T09:03:27.000000Z"),
     *       @OA\Property(property="updated_at", type="string", example="2021-03-10T09:03:27.000000Z"),
     *    )
     * )
     * )
     * )
     */
    public function show(Test $test)
    {
        return $test;
    }

    /**
     * @OA\Post (
     * path="/api/test",
     * summary="Create New Test",
     * description="Create One Test",
     * operationId="postOneTests",
     * tags={"test"},
     * @OA\RequestBody(
     *    required=true,
     *    description="Test fields",
     *    @OA\JsonContent(
     *       required={"name"},
     *       @OA\Property(property="test", type="increments", example="1"),
     *    ),
     * ),
     * @OA\Response(
     *    response=401,
     *    description="Returns when name or description deos'nt o the RequestBody ",
     *    @OA\JsonContent(
     *       @OA\Property(property="error", type="string", example="name and description field are required"),
     *    )
     * ),
     * @OA\Response(
     *    response=200,
     *    description="Returns when Test has been created",
     *    @OA\JsonContent(
     *     @OA\Items(
     *       @OA\Property(property="test", type="increments", example="1"),
     *       @OA\Property(property="created_at", type="string", example="2021-03-10T09:03:27.000000Z"),
     *       @OA\Property(property="updated_at", type="string", example="2021-03-10T09:03:27.000000Z"),
     *    )
     * )
     * )
     * )
     */

    public function store(Request $request)
    {
        $test = Test::create($request->all());
        return response()->json($test, 201);
    }

    /**
     * @OA\Put  (
     * path="/api/test/{id}",
     * summary="Edit one Test by id",
     * description="update One Test by id",
     * operationId="postOneTests",
     * tags={"test"},
     * @OA\Parameter(
     *    description="ID of test",
     *    in="path",
     *    name="id",
     *    required=true,
     *    example="1",
     * ),
     * @OA\RequestBody(
     *    required=false,
     *    description="Test fields",
     *    @OA\JsonContent(
     *       @OA\Property(property="test", type="increments", example="1"),
     *    ),
     * ),
     * @OA\Response(
     *    response=200,
     *    description="Returns when Test has been created",
     *    @OA\JsonContent(
     *     @OA\Items(
     *       @OA\Property(property="test", type="increments", example="1"),
     *       @OA\Property(property="created_at", type="string", example="2021-03-10T09:03:27.000000Z"),
     *       @OA\Property(property="updated_at", type="string", example="2021-03-10T09:04:27.000000Z"),
     *    )
     * )
     * )
     * )
     */

    public function update(Request $request, Test $test)
    {
        $test->update($request->all());

        return response()->json($test, 200);
    }

    /**
     * @OA\Delete (
     * path="/api/test/{id}",
     * summary="delete Test by id",
     * description="delete one Test by id",
     * operationId="deleteOneTests",
     * tags={"test"},
     * @OA\Parameter(
     *    description="ID of test",
     *    in="path",
     *    name="id",
     *    required=true,
     *    example="1",
     * ),
     * @OA\Response(
     *    response=404,
     *    description="Returns when test id is not found",
     *    @OA\JsonContent(
     *       @OA\Property(property="error", type="string", example="Resource not found"),
     *    )
     * ),
     * @OA\Response(
     *    response=200,
     *    description="Returns when Tests are found",
     *    @OA\JsonContent(
     *       @OA\Property(property="test", type="increments", example="1"),
     *       @OA\Property(property="deleted_at", type="string", example="2021-03-10T15:47:13.000000Z"),
     *       @OA\Property(property="created_at", type="string", example="2021-03-10T09:03:27.000000Z"),
     *       @OA\Property(property="updated_at", type="string", example="2021-03-10T09:03:27.000000Z"),
     *    )
     * )
     * )
     * )
     */
    public function delete(Test $test)
    {
        $test->delete();

        return response()->json($test, 200);
    }
}