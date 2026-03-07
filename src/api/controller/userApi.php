<?php

class UserApi extends ControllerApi
{
    public $requestRules = [
        'login' => ["POST"],
        'register' => ["POST"],
    ];

    public function login()
    {
        $data = $this->getPostData();

        $requiredFields = ['email', 'password'];
        foreach ($requiredFields as $field) {
            if (empty($data[$field])) {
                ResponceApi::handle400();
            }
        }

        $this->load->model('UserModel');
        $user = $this->model->UserModel->findByEmail($data['email']);

        if (!$user || !password_verify($data['password'], $user['password_hash'])) {
            ResponceApi::handle401();
        }

        $tokenData = [
            'id' => $user['id'],
            'name' => $user['username'],
            'role' => $user['role']
        ];

        $token = ValidationApi::encryptToken($tokenData);

        ResponceApi::returnData(['token' => $token]);
    }
}