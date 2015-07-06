<?php

return [

	/*
	|--------------------------------------------------------------------------
	| Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| The following language lines contain the default error messages used by
	| the validator class. Some of these rules have multiple versions such
	| as the size rules. Feel free to tweak each of these messages here.
	|
	*/

	"accepted"             => ":attribute precisa ser aceito.",
	"active_url"           => ":attribute não é uma URL válida.",
	"after"                => ":attribute deve ser uma data após :date.",
	"alpha"                => ":attribute deve conter somente letras.",
	"alpha_dash"           => ":attribute pode conter letras, números e dashes.",
	"alpha_num"            => ":attribute pode conter letras e números.",
	"array"                => ":attribute deve ser do tipo array.",
	"before"               => ":attribute deve ser uma data anterior a :date.",
	"between"              => [
		"numeric" => "The :attribute must be between :min and :max.",
		"file"    => "The :attribute must be between :min and :max kilobytes.",
		"string"  => "The :attribute must be between :min and :max characters.",
		"array"   => "The :attribute must have between :min and :max items.",
	],
	"boolean"              => ":attribute deve ser true ou false.",
	"confirmed"            => "A confirmação de :attribute não está correta.",
	"date"                 => ":attribute não é uma data válida.",
	"date_format"          => ":attribute não se encaixa no formato :format.",
	"different"            => "The :attribute and :other must be different.",
	"digits"               => ":attribute deve ter :digits dígitos.",
	"digits_between"       => ":attribute deve ter um valor entre :min e :max.",
	"email"                => ":attribute deve ser um endereço de e-mail válido.",
	"filled"               => ":attribute é obrigatório.",
	"exists"               => ":attribute é inválido.",
	"image"                => ":attribute deve ser uma imagem.",
	"in"                   => ":attribute é inválido.",
	"integer"              => ":attribute deve ser um número inteiro.",
	"ip"                   => ":attribute deve ser um endereço IP válido.",
	"max"                  => [
		"numeric" => ":attribute não pode ser maior do que :max.",
		"file"    => ":attribute não pode ser maior do que :max kilobytes.",
		"string"  => ":attribute não pode ser maior do que :max caracteres.",
		"array"   => ":attribute não pode ser maior do que :max itens.",
	],
	"mimes"                => "The :attribute must be a file of type: :values.",
	"min"                  => [
		"numeric" => ":attribute deve ser pelo menos :min.",
		"file"    => ":attribute deve ter pelo menos :min kilobytes.",
		"string"  => ":attribute deve ter pelo menos :min caracteres.",
		"array"   => ":attribute deve ter pelo menos :min itens.",
	],
	"not_in"               => ":attribute é inválido.",
	"numeric"              => ":attribute precisa ser um número.",
	"regex"                => "The :attribute format is invalid.",
	"required"             => "O campo :attribute não pode ser deixado em branco.",
	"required_if"          => "The :attribute field is required when :other is :value.",
	"required_with"        => "The :attribute field is required when :values is present.",
	"required_with_all"    => "The :attribute field is required when :values is present.",
	"required_without"     => "The :attribute field is required when :values is not present.",
	"required_without_all" => "The :attribute field is required when none of :values are present.",
	"same"                 => "The :attribute and :other must match.",
	"size"                 => [
		"numeric" => ":attribute deve ser do tamanho :size.",
		"file"    => ":attribute deve ter :size kilobytes.",
		"string"  => ":attribute deve ter :size caracteres.",
		"array"   => ":attribute deve conter :size itens.",
	],
	"unique"               => ":attribute está sendo utilizado.",
	"url"                  => "O formato :attribute é inválido.",
	"timezone"             => ":attribute deve ser uma zona válida.",

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| Here you may specify custom validation messages for attributes using the
	| convention "attribute.rule" to name the lines. This makes it quick to
	| specify a specific custom language line for a given attribute rule.
	|
	*/

	'custom' => [
		'attribute-name' => [
			'rule-name' => 'custom-message',
		],
	],

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Attributes
	|--------------------------------------------------------------------------
	|
	| The following language lines are used to swap attribute place-holders
	| with something more reader friendly such as E-Mail Address instead
	| of "email". This simply helps us make messages a little cleaner.
	|
	*/

	'attributes' => [
            'email' => 'e-mail',
            'password' => 'senha'            
        ],

];
