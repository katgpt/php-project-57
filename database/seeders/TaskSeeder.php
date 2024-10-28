<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Label;
use App\Models\Task;
use App\Models\TaskStatus;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Sequence;

class TaskSeeder extends Seeder
{
    public function run()
    {
        // Сначала создадим статусы задач
        $statusNames = [
            ['name' => 'новая'],
            ['name' => 'завершена'],
            ['name' => 'выполняется'],
            ['name' => 'в архиве'],
        ];
                
        foreach ($statusNames as $statusName) {
            TaskStatus::create($statusName);
        }

        // Создадим пользователей
        User::factory(20)->create();

        // Создадим метки
        Label::factory(4)->state(new Sequence(
            ['name' => 'ошибка', 'description' => 'Какая-то ошибка в коде или проблема с функциональностью'],
            ['name' => 'документация', 'description' => 'Задача которая касается документации'],
            ['name' => 'дубликат', 'description' => 'Повтор другой задачи'],
            ['name' => 'доработка', 'description' => 'Новая фича, которую нужно запилить']
        ))->create();

        // Создадим задачи
        Task::factory(18)->state(new Sequence(
            ['name' => 'Исправить ошибку в какой-нибудь строке', 'description' => 'Я тут ошибку нашёл, надо бы её исправить и так далее и так далее'],
            ['name' => 'Допилить дизайн главной страницы', 'description' => 'Вёрстка поехала в далёкие края. Нужно удалить бутстрап!'],
            ['name' => 'Отрефакторить авторизацию', 'description' => 'Выпилить всё легаси, которое найдёшь'],
            ['name' => 'Доработать команду подготовки БД', 'description' => 'За одно добавить тестовых данных'],
            ['name' => 'Пофиксить вон ту кнопку', 'description' => 'Кажется она не того цвета'],
            ['name' => 'Исправить поиск', 'description' => 'Не ищет то, что мне хочется'],
            ['name' => 'Добавить интеграцию с облаками', 'description' => 'Они такие мягкие и пушистые'],
            ['name' => 'Выпилить лишние зависимости', 'description' => ''],
            ['name' => 'Запилить сертификаты', 'description' => 'Кому-то же они нужны?'],
            ['name' => 'Выпилить игру престолов', 'description' => 'Этот сериал никому не нравится! :)'],
            ['name' => 'Пофиксить спеку во всех репозиториях', 'description' => 'Передать Олегу, чтобы больше не ронял прод'],
            ['name' => 'Вернуть крошки', 'description' => 'Андрей, это задача для тебя'],
            ['name' => 'Установить Linux', 'description' => 'Не забыть потестировать'],
            ['name' => 'Потребовать прибавки к зарплате', 'description' => 'Кризис это не время, чтобы молчать!'],
            ['name' => 'Добавить поиск по фото', 'description' => 'Только не по моему'],
            ['name' => 'Съесть еще этих прекрасных французских булочек', 'description' => ''],
            ['name' => 'Найти чудо', 'description' => 'Чудо-чудное, диво-дивное.'],
            ['name' => 'Исправить ошибку в самой длинной строке', 'description' => 'Самая длинная строка находится в Тридевятом Царстве']
        ))->create();

        // Добавим метки к задачам
        $tasks = Task::all();
        foreach ($tasks as $task) {
            $labels = Label::all()->random(random_int(0, 3))->unique();
            $task->labels()->attach($labels);
        }
    }
}
