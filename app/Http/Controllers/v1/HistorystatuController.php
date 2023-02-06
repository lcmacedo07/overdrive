<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Interfaces\v1\HistorystatuInterface;


class HistorystatuController extends Controller {
    private $interface;

    public function __construct(HistorystatuInterface $interface) {
        $this->interface = $interface;
    }
    

	/**
     * @OA\Get(
     *     path="/api/v1/historystatus",
     *     tags={"Historico dos Status"},
     *     summary="Todos os Historicos dos Status",
     *     description="Retorna todos os historicos dos status cadastrados no sistema",
     *     operationId="indexStatus",
     *     @OA\Parameter(
     *         name="q",
     *         in="query",
     *         description="ID da pessoa ou USUARIO",
     *         required=false,
     *         explode=true,
     *         @OA\Schema(
	 * 		   type="string",
	 * 		   		example=""
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

	public function indexStatus()
	{
		return $this->interface->indexStatus();
	}

	/**
     * @OA\Get(
     *     path="/api/v1/historystatus/{uuid}",
     *     tags={"Historico dos Status"},
     *     summary="Historico dos Status",
     *     description="Retorna um historico dos status cadastrado no sistema",
     *     operationId="showStatus",
     *     @OA\Parameter(
     *         name="uuid",
     *         in="path",
     *         description="UUID do historico dos status",
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

	public function showStatus($uuid)
	{
		return $this->interface->showStatus($uuid);
	}
     
}
