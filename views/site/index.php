<?php

use yii\base\InvalidConfigException;

$this->title = 'Test';
echo $this->render('inc');

class Anyone // создаем новый класс
{
    public function init()  // создаем родительскую функцию
    {
        /*какой-то код*/
    }
}

class Translation extends Anyone  // наследуемся от класса Anyone
{
    const DETECT_YA_URL = 'https://translate.yandex.net/api/v1.5/tr.json/detect';
    const TRANSLATE_YA_URL = 'https://translate.yandex.net/api/v1.5/tr.json/translate';

    public $key = "AIza1yCf2zgkmk-nRxdbB4gg49M9GZhmFei55uo";

    public function init()
    {
        parent::init();

        if (empty($this->key)) {
            throw new InvalidConfigException("Filed <b>$this->key</b> is required");
        }
    }

    /**
     * @param $format text format need to translate
     * @return string
     */
    public function translate_text($format = "text")
    {
        if (empty($this->key)) {
            throw new InvalidConfigException("Filed <b>$this->key</b> is required");
        }

        $values = array(
            'key' => $this->key,
            'text' => $_GET['text'],
            'lang' => $_GET['lang'],
            'format' => $format == "text" ? 'plain' : $format,
        );  // формируется массив параметров для дальшейшего запроса

        $formData = http_build_query($values);  //Генерирует URL-кодированную строку запроса

        $ch = curl_init(self::TRANSLATE_YA_URL);  //Инициализирует сеанс cURL
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  // настраивает опции
        curl_setopt($ch, CURLOPT_POSTFIELDS, $formData);  // настраивает опции

        $json = curl_exec($ch);  // выполняется запрос
        curl_close($ch);

        $data = json_decode($json, true);  //декодирует полученную строку в объект
        if ($data['code'] == 200) { // если все в порядке то
            return $data['text'];  // возвращает переведенный текст
        }
        return $data;  // либо возвращает то что пришло
    }
//....
}

