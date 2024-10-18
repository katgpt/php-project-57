<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;  // Необходимо добавить эту строку

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Сначала создаем пользователей
        User::factory(20)->create();

        $this->call([
            TaskStatusSeeder::class, // Создаем статусы задач
            LabelSeeder::class,      // Создаем метки
            TaskSeeder::class,       // Создаем задачи
            LabelTaskSeeder::class,  // Связываем метки с задачами
        ]);
    }
}
