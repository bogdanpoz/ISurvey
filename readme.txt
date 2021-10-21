    Project Changings and Additions

    Replace these file in Project directory:
    1. database/migrations/2021_05_05_105516_create_surveys_table.php
    2. app/Http/Controllers/Company/ResultController.php
    3. app/Http/Controllers/Company/SurveyController.php
    4. app/Http/Controllers/Company/DesignController.php
    5. app/Models/Survey.php
    6. resources/views/admin/survey/edit.blade.php
    7. resources/views/admin/survey/index.blade.php
    8. resources/views/company/survey/edit.blade.php
    9. resources/views/company/survey/index.blade.php
    10. resources/views/company/survey/result.blade.php
    11. resources/views/company/survey/share.blade.php
    12. resources/views/front/survey/finish.blade.php
    13. resources/views/front/survey/show.blade.php
    14. resources/views/front/survey/start.blade.php 
    15. resources/views/company/survey/design.blade.php
    16. resources/views/front/survey/password.blade.php

    Database Update(Please choose one option from both of define below)

    After Add columns to surveys table in Database:
    1. max_results
    2. annomous
    3. font_style

    OR ------

    Run Migrations:
    php artisan migrate
