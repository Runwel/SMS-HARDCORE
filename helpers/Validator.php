<?php 
class Validator {
    private array $errors = [];

    public function reset(): void {
        $this->errors = [];
    }

    public function getErrors(): array{
        return $this->errors;
    }

    public function hasErrors(): bool{
        return !empty($this->errors);
    }
    
    public function required(string|array $dataOrField, string|array $fieldsOrValue): void {
        if(is_string($dataOrField)){
            $field = $dataOrField;
            $value = $fieldsOrValue;
            if(empty(trim((string)$value))){
                $this->errors[$field][] = ucfirst($field) . 'is required.';
            }
        } else {
            foreach ($fieldsOrValue as $field){
                if (!isset($dataOrField[$field]) || trim((string)$dataOrField[$field] === '')){
                    $this->errors[$field][] = ucfirst($field) . 'is required.';
                }
            }
        }
    }

    public function checkEmail(string $email): void {
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $this->errors[] = 'Invalid email format';
        };
    }

    public function passwordMatch(string $pwd, string $pwdRepeat): void {
        if($pwd !== $pwdRepeat){
            $this->errors[] = 'Passwords do not match';
        };
    }
}