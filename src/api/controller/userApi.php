<?php

class UserApi extends ControllerApi
{
    public $requestRules = [
        'login' => ["POST"],
        'register' => ["POST"],
        'user' => ["GET"],
        'changePassword' => ["POST"],
    ];

    public function login()
    {
        $data = $this->getPostData();

        $requiredFields = ['username', 'password'];
        $this->validateFields($requiredFields, $data);

        $this->load->model('UserModel');
        $user = $this->model->UserModel->findByUsername($data['username']);

        if (!$user || !password_verify($data['password'], $user['password_hash'])) {
            ResponceApi::returnData(['message' => 'Invalid username or password'], 200);
        }

        $tokenData = [
            'id' => $user['id'],
            'name' => $user['username'],
            'role' => $user['role']
        ];

        $token = ValidationApi::encryptToken($tokenData);

        ResponceApi::returnData(['token' => $token]);
    }

    public function user()
    {
        $token = ValidationApi::getToken();
        if (empty($token)) {
            ResponceApi::handle401();
        }

        $tokenData = ValidationApi::decryptToken($token);
        if (!$tokenData || !isset($tokenData['id'])) {
            ResponceApi::handle401();
        }

        $this->load->model('UserModel');
        $user = $this->model->UserModel->get($tokenData['id']);

        if (!$user) {
            ResponceApi::handle401();
        }

        unset($user['password_hash']);
        ResponceApi::returnData(['user' => $user]);
    }

    public function changePassword()
    {
        $token = ValidationApi::getToken();
        if (empty($token)) {
            ResponceApi::handle401();
        }

        $tokenData = ValidationApi::decryptToken($token);
        if (!$tokenData || !isset($tokenData['id'])) {
            ResponceApi::handle401();
        }

        $data = $this->getPostData();

        $requiredFields = ['old_password', 'new_password'];
        $this->validateFields($requiredFields, $data);

        $this->load->model('UserModel');
        $user = $this->model->UserModel->get($tokenData['id']);

        if (!$user) {
            ResponceApi::handle401();
        }

        if (!password_verify($data['old_password'], $user['password_hash'])) {
            ResponceApi::returnData(['message' => 'Current password is incorrect'], 200);
        }

        if (strlen($data['new_password']) < 6) {
            ResponceApi::returnData(['message' => 'New password must be at least 6 characters'], 200);
        }

        $newPasswordHash = password_hash($data['new_password'], PASSWORD_DEFAULT);

        try {
            $this->model->UserModel->update($user['id'], ['password_hash' => $newPasswordHash]);
            ResponceApi::returnData(['message' => 'Password changed successfully']);
        } catch (Exception $e) {
            ResponceApi::handle400();
        }
    }
}