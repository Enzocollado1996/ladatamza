<?php
// src/Model/Table/UsersTable.php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class UsersTable extends Table
{
    public function validationDefault(Validator $validator)
    {
        return $validator
            ->notEmpty('username', 'Nombre de usuario es requerido')
            ->notEmpty('password', 'La contraseña es requerida')
            ->notEmpty('role', 'El rol es requerido')
            ->add('role', 'inList', [
                'rule' => ['inList', ['admin', 'operador']],
                'message' => 'Ingrese un rol válido'
            ]);
    }
}
?>