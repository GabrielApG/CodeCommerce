<?php namespace CodeCommerce\Http\Requests;

use CodeCommerce\Http\Requests\Request;

class CategoryRequest extends Request {

/*Pode fazer validação aqui*/
	public function authorize()
	{
		return true;
	}

/*Regras de validação */
	public function rules()
	{
		return [
			'name'=>'required',
            'description'=>'required',
		];
	}

}
