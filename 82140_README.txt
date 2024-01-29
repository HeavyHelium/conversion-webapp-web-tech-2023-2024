---Финална версия на проекта---

---Стартиране---
* стартираме XAMPP сървър
* конфигурираме БД(напр. през PHPMyAdmin)
    * данни за създаването на БД, необходима за функционирането на проекта, се намират в папката config на проекта, във файла “db_definition.sql”
* настройка на config.ini файла, ако се налага
* използваме някой от браузърите Chrome, Firefox или Opera



---Структура на архива---

.
├── 82140_documentation.pdf
├── 82140_README.txt
├── classes
│   ├── converter.php
│   ├── db_handler.php
│   ├── properties_parser.php
│   ├── transform.php
│   ├── user.php
│   └── writing_script_converter.php
├── config
│   ├── config.ini
│   ├── db_data.sql
│   └── db_definition.sql
├── css
│   ├── reset.css
│   └── styles.css
├── images
│   └── logo.png
├── includes
│   ├── login.inc.php
│   ├── logout.inc.php
│   ├── process_conversion.php
│   ├── signup.inc.php
│   └── testInputUtility.php
├── index.php
├── js
│   └── script.js
├── sample_files
│   ├── quiz.json
│   └── quiz.properties
└── src
    ├── footer.php
    ├── header_logged.php
    ├── header.php
    ├── login.php
    ├── profile_history.php
    ├── profile.php
    ├── signup.php
    └── view_output.php