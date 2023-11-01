<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'username' => 'required|min:4|max:10',
            'password' => 'required|min:3'
        ];
    }

    public function postLogin(LoginRequest $request)
    {
        $validated = $request->validated();
        $username = $validated['username'];
        $password = $validated['password'];
        if ($username && $password) {
            echo "Login berhasil";
        } else {
            return back()->withErrors($validated)->withInput();
        }
    }

}