<?php
    namespace App\Models;
    use CodeIgniter\Model;

    class User extends Model{
        protected $table = 'users';
        protected $primaryKey = 'username';
        protected $allowedFields = ['username', 'password', 'level', 'nama'];

        protected $allowCallbacks = true;
        protected $beforeInsert = ['hashPassword'];
        protected $beforeUpdate = ['hashPassword'];

        protected function hashPassword(array $data){
            if(isset($data['data']['password'])){
                $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
            }
            return $data;
        }
    }
?>