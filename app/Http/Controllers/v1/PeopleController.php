<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Interfaces\v1\PeopleInterface;
use App\Http\Requests\PeopleRequest;


class PeopleController extends Controller {
    private $interface;

    public function __construct(PeopleInterface $interface) {
        $this->interface = $interface;
    }

	/**
     * @OA\Get(
     *     path="/api/v1/peoples",
     *     tags={"Pessoas"},
     *     summary="Todas as Pessoas",
     *     description="Retorna todas as pessoas cadastradas no sistema",
     *     operationId="index",
     *     @OA\Parameter(
     *         name="q",
     *         in="query",
     *         description="Nome da pessoa",
     *         required=false,
     *         explode=true,
     *         @OA\Schema(
	 * 		   type="string",
	 * 		   example=""
	 * 
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Invalid status value"
     *     ),
     * )
     */

	public function index()
	{
		return $this->interface->index();
	}

    /**
     * @OA\Get(
     *     path="/api/v1/peoples/{uuid}",
     *     tags={"Pessoas"},
     *     summary="Pessoa",
     *     description="Retorna uma pessoa cadastrada no sistema",
     *     operationId="show",
     *     @OA\Parameter(
     *         name="uuid",
     *         in="path",
     *         description="UUID da pessoa",
     *         required=true,
     *         explode=true,
     *         @OA\Schema(
     * 		   type="string",
     * 		   example=""
     * 
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Invalid status value"
     *     ),
     * )
     */

	public function show($uuid)
	{
		return $this->interface->show($uuid);
	}
    
    /**
     * @OA\Post(
     *     path="/api/v1/peoples",
     *     tags={"Pessoas"},
     *     summary="Cadastrar Pessoa",
     *     description="Cadastra uma pessoa no sistema",
     *     operationId="store",
     *     @OA\RequestBody(
     *         description="Dados da pessoa",
     *         required=true,
     *         @OA\JsonContent(
     *              type="object",
     *              @OA\Property( property="name", type="string"),
     *             @OA\Property( property="document", type="string"),
     *            @OA\Property( property="phone", type="string"),
     *          @OA\Property( property="status", type="char", example="A"),
     *        @OA\Property( property="user", type="string"),
     *      )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="successful operation",
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Invalid status value"
     *     ),
     * )
     */

	public function store(PeopleRequest $request)
	{
		return $this->interface->store($request);
	}

    /**
     * @OA\Put(
     *     path="/api/v1/peoples/{uuid}",
     *     tags={"Pessoas"},
     *     summary="Atualizar Pessoa",
     *     description="Atualiza uma pessoa no sistema",
     *     operationId="update",
     *     @OA\Parameter(
     *         name="uuid",
     *         in="path",
     *         description="UUID da pessoa",
     *         required=true,
     *         explode=true,
     *         @OA\Schema(
     * 		   type="string",
     * 		   example=""
     * 
     *         )
     *     ),
     *     @OA\RequestBody(
     *         description="Dados da pessoa",
     *         required=true,
     *         @OA\JsonContent(
     *              type="object",
     *              @OA\Property( property="name", type="string"),
     *             @OA\Property( property="document", type="string"),
     *            @OA\Property( property="phone", type="string"),
     *          @OA\Property( property="status", type="char", example="A"),
     *        @OA\Property( property="user", type="string"),
     *      )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="successful operation",
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Invalid status value"
     *     ),
     * )
     */

	public function update($uuid, PeopleRequest $request)
	{
		return $this->interface->update($uuid, $request);
	}
     
}
