# Google Rank Checker (Test Task)

Застосунок для визначення позиції сайту в органічній видачі Google за вказаним ключем, локацією та мовою.

## Функціональні можливості
- Форма для введення ключового слова, домену, локації та мови.
- Відображення рангу сайту або повідомлення, якщо його не знайдено.
- налаштування глибини пошуку (TOP 10/50/100).

## Інструкція із запуску (Windows)

1. **Клонуйте репозиторій та встановіть залежності:**
   ```bash
   git clone https://github.com/docktor10fps/test-task-softoria.git
   cd test-task-softoria/serp-checker
   composer install
    ```
2. **Налаштуйте файл оточення:**

   - Скопіюйте .env.example у .env.
   - Вкажіть ваші DATAFORSEO_LOGIN та DATAFORSEO_PASSWORD у .env
   - Виконайте команду:
   ```bash
   php artisan key:generate
   ```
3. **Запустіть сервер:**

    ```bash
    php artisan serve
   ```
