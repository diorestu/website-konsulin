<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class CreateAdmin extends Command
{
    protected $signature = 'admin:create {--name= : Nama admin} {--email= : Email admin}';

    protected $description = 'Membuat akun admin dengan password yang dimasukkan secara tersembunyi';

    public function handle(): int
    {
        $data = [
            'name' => $this->option('name') ?: $this->ask('Nama admin'),
            'email' => $this->option('email') ?: $this->ask('Email admin'),
            'password' => $this->secret('Password (minimal 12 karakter, mengandung huruf dan angka)'),
            'password_confirmation' => $this->secret('Ulangi password'),
        ];
        $validator = Validator::make($data, [
            'name' => ['required', 'string', 'max:255'], 'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'confirmed', Password::min(12)->letters()->numbers()],
        ]);
        if ($validator->fails()) {
            foreach ($validator->errors()->all() as $error) {
                $this->error($error);
            }

            return self::FAILURE;
        }
        $admin = new User($validator->safe()->only(['name', 'email', 'password']));
        $admin->is_admin = true;
        $admin->save();
        $this->info('Akun admin berhasil dibuat. Buka /admin/login untuk masuk.');

        return self::SUCCESS;
    }
}
