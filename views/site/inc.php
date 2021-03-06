<p>Опишите в ответном сообщении, какие проблемы вы здесь видите (оформление, логика, концепция).
    Как бы вы доработали этот код, используя ту же основу?</p>

<p>
    1. Некоторые пробелы и переносы скобок стояли не там где надо или были лишние, исправил нажатием нужных
    клавиш в IDE. <br>

    2. InvalidConfigException - это класс фреймворка Yii2. Для того что бы он работал - я установил базовый шаблон
    данного
    фреймворка. И импортировал данный класс (use yii\base\InvalidConfigException). <br>

    3. Что бы "parent::init()" не выдавал ошибку наследования и нормально работал - создал новый класс "class Anyone" с
    методом "public function init()". И далее отнаследовал данный класс - "class Translation extends Anyone". <br>

    4. Далее по логике надо писать какой-нибудь код в функции "function init()" класса "class Anyone". Что бы функция
    "function init()" класса "Anyone" выполняла что-нибудь полезное. Иначе наследование "parent::init()"
    в функции "function init()" теряет смысл и наследование можно удалить. <br>

    5. Так же саму функцию "function init()" класса "class Translation" надо дополнять каким-то полезным кодом, либо
    удалить её. <br>

    7. Что бы обратиться к "public $key" нужно использовать служебное слово "$this". Заменил везде где надо "$key" на
    "$this->key". <br>

    8. "public static function translate_text($format = "text")" - здесь "static" лишнее, с ним обращение
    "$this->key" не будет корректно отрабатывать, "static" удалил. <br>

</p>

