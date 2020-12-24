<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes\ERPHelper;
use Config;

class ERPController extends Controller
{


    public function __construct()
    {
        $this->oERPHelper = new ERPHelper();
    }

    /**
     * Главное меню
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
	public function main(Request $request)
	{

		$aRoutesForModel = Config::get('erp_routes');
		return view('erp.main', ['idents' => $aRoutesForModel]);

	}

    /**
     * Отображение списка сущностей 
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
	public function list(Request $request)
	{

		$aRoutesForModel = Config::get('erp_routes');
		$sIdent = $request->ident??'';
		$aModelParams = [];
		$sNameMethod = '';
		$sNameModel = '';

		if(! array_key_exists($sIdent, $aRoutesForModel)){
			return abort(404);
			// return response()->json(['message' => 'Not Found!', 404);
		}else{
			$aModelParams = $aRoutesForModel[$sIdent]['params'];
			$sNameModel = $aModelParams['model'];
			$sNameMethod = $aModelParams['method']['name'];
		}

		// TODO проверка доступа

		try {
			
			$cResult = $sNameModel::$sNameMethod();
			return view('erp.list', ['collect' => $cResult]);
			// return response()->json(['message' => 'success', 'collect' => $sJSONCollectResult], 200);			
			
		} catch (Exception $e) {
			return abort(500);
			// return response()->json(['message' => $e->getMessage()], 500);
		}

	}

    /**
     * Создание сущности
     *
     * @param Request $request (primary key and other fields)
     * @return \Illuminate\Http\JsonResponse
     */
	public function create(Request $request)
	{
		// TODO проверка доступа

		$sNameModel = $request->model;
		$aAttributesAndValues = $request->attributes_values;
		$iIdObject = (int)$sNameModel::create($aAttributesAndValues)->id;

		$sMessage = '';
		$iCode = 0;

		if($iIdObject != 0){
			$sMessage = 'success';
			$iCode = 200;
		}else{
			$sMessage = 'error';
			$iCode = 500;
		}

		return response()->json(['message' => $sMessage, 'id' => $iIdObject], $iCode);

	}

    /**
     * Обновление сущности
     *
     * @param Request $request (primary key and other fields)
     * @return \Illuminate\Http\JsonResponse
     */
	public function update(Request $request)
	{
		// TODO проверка доступа

		$sNameModel = $request->model;
		$iId = (int)$request->id;
		$aAttributesAndValues = $request->attributes_values;
		$bResult = $sNameModel::where('id', $iId)->update($aAttributesAndValues);
		
		if($bResult){
			$sMessage = 'success';
			$iCode = 200;
		}else{
			$sMessage = 'error';
			$iCode = 500;
		}

		return response()->json(['message' => $sMessage], $iCode);
	}

    /**
     * Удаление сущности
     *
     * @param Request $request (primary key)
     * @return \Illuminate\Http\JsonResponse
     */
	public function delete(Request $request)
	{
		// TODO проверка доступа

		$sNameModel = $request->model;
		$iId = (int)$request->id;
		$bResult = $sNameModel::where('id', $iId)->delete();
		
		if($bResult){
			$sMessage = 'success';
			$iCode = 200;
		}else{
			$sMessage = 'error';
			$iCode = 500;
		}

		return response()->json(['message' => $sMessage], $iCode);
	}

}
