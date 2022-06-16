<?php

namespace app\core;

abstract class Model
{
    public const RULE_REQUIRED = 'required';
    public const RULE_EMAIL = 'email';
    public const RULE_MIN = 'min';
    public const RULE_MAX = 'MAX';
    public const RULE_MATCH = 'match';

    public function loadData($data)
    {
        foreach ($data as $key => $value) {
            if (property_exists($this, $key)) {
                $this->{$key} = $value;
            }
        }
    }

    public array $errors = [];

    abstract public function rules(): array;

    public function validate()
    {
        foreach ($this->rules() as $attribute => $rules){
            $value = $this->{$attribute};
            foreach ($rules as $rule){
               $ruleName=$rule;
               if(!is_string($ruleName)){
                   $ruleName = $rule[0];
               }
               if($ruleName === self::RULE_REQUIRED && !$value) {
                   $this->addError($attribute, self::RULE_REQUIRED);
               }
               if($ruleName === self::RULE_EMAIL && !filter_var($value,FILTER_VALIDATE_EMAIL)) {
                   $this->addError($attribute, self::RULE_EMAIL);
               }
               if($ruleName === self::RULE_MIN && strlen($value) < $rule['min']) {
                   $this->addError($attribute, self::RULE_MIN,$rule);
               }
                if($ruleName === self::RULE_MAX && strlen($value) > $rule['max']) {
                    $this->addError($attribute, self::RULE_MAX,$rule);
                }
                if($ruleName=== self::RULE_MATCH && $value !== $this->{$rule['match']}) {
                    $this->addError($attribute, self::RULE_MATCH,$rule);
                }
            }
        }
        return empty($this->errors);
    }

    public function addError( string $attribute, string $ruleName,$params=[])
    {
        $message = $this->errorNessages()[$ruleName] ?? '';
        foreach ($params as $key=> $value){
            $message = str_replace("{{$key}}",$value,$message);
        }
        $this->errors[$attribute][] = $message;
    }

    public function errorNessages()
    {
        return [
            self::RULE_REQUIRED => "This field is required".PHP_EOL,
            self::RULE_EMAIL =>"This field must be a valid email address".PHP_EOL,
            self::RULE_MATCH => "The passwords must match".PHP_EOL,
            self::RULE_MIN => "Min length of this field must be {min}".PHP_EOL,
            self::RULE_MAX => "Max length of this field must be {max}".PHP_EOL,
        ];
    }

    public function getFirstError($attribute)
    {
        return $this->errors[$attribute][0] ?? '';
    }
}