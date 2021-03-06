<?php

namespace Omnipay\PayOnline\Exception\ru;

use Omnipay\PayOnline\Exception\LocalizedError;

/**
 * PayOnline protocol errors russian localization.
 */
class SystemError extends LocalizedError
{
    protected static $_errors = [
        '1000' => 'Внутренняя ошибка сервера.',
        '1001' => 'Внутренняя ошибка БД.',
        '1100' => 'Общая ошибка фильтра.',
        '1101' => 'Ошибка загрузки фильтра.',
        '1200' => 'Не указан шлюз.',
        '1201' => 'Ошибка загрузки шлюза.',
        '1202' => 'Ошибка связи со шлюзом.',
        '1203' => 'Ошибка загрузки сертификата шлюза.',
        '1204' => 'Ошибка конфигурации шлюза.',
        '2000' => 'Операция отклонена системой безопасности.',
        '2300' => 'Операция отклонена системой безопасности банка.',
        '3000' => 'Техническая ошибка на стороне банка.',
        '4000' => 'Неверный ввод данных.',
        '4001' => 'Аккаунт мерчанта отключен.',
        '4002' => 'Не указан url для коллбэков.',
        '4003' => 'Не указан ключ безопасности.',
        '4004' => 'Неверный номер карты.',
        '4005' => 'Неверное имя держателя карты.',
        '4006' => 'Неверный проверочный код карты.',
        '4007' => 'Неверный срок действия карты.',
        '4008' => 'Неверная страна.',
        '4009' => 'Неверный город.',
        '4010' => 'Неверный штат/область.',
        '4011' => 'Неверный почтовый индекс.',
        '4012' => 'Неверный адрес.',
        '4013' => 'Неверное наименование банка-эмитента.',
        '4014' => 'Карта просрочена.',
        '4015' => 'Неверный тип карты.',
        '4016' => 'Заказ уже оплачен.',
        '4017' => 'Неверный e-mail.',
        '4018' => 'Неверный ip адрес.',
        '4019' => 'Неверный телефон.',
        '4020' => 'Неверный ID клиента.',
        '4021' => 'Неверный RebillAnchor.',
        '4022' => 'Ребиллы не поддерживаются.',
        '4023' => 'Режим безопасности не поддерживается.',
        '4024' => 'Неверный ключ безопасности.',
        '4025' => 'Неверный ID заказа.',
        '4026' => 'Неверная валюта.',
        '4027' => 'Неверный мерчант.',
        '4028' => 'Неверный valid until.',
        '4029' => 'Неверный ID транзакции.',
        '4030' => 'Неверная IData.',
        '4031' => 'Неверный ID аккаунта.',
        '4032' => 'Неверный номер телефона.',
        '4033' => 'Неверный формат номера телефона.',
        '4034' => 'Неверное описание заказа.',
        '4300' => 'Неверные параметры.',
        '4400' => 'Операция недопустима.',
        '4401' => 'Неверное состояние транзакции.',
        '5001' => 'Версия не поддерживается.',
        '5002' => 'Язык не поддерживается.',
        '5003' => 'Команда не поддерживается.',
        '5004' => 'Ошибка аутентификации.',
        '5005' => 'Ошибка парсинга сообщения.',
        '5006' => 'Системная ошибка шлюза.',
        '5007' => 'Ошибка криптографии.',
        '5008' => 'Шлюз не отвечает.',
        '5009' => 'Неверное число параметров.',
        '5010' => 'Нулевая сумма.',
        '5201' => 'Аккаунт не найден.',
        '5202' => 'Неверная транзакция.',
        '5203' => 'Неверная сумма.',
        '5204' => 'Не возможно выполнить операцию.',
        '5205' => 'Недостаточно средств.',
        '5206' => 'Неверная информация о платеже.',
        '5207' => 'Неверный ID терминала.',
        '5208' => 'Оригинальная транзакция не найдена.',
        '5209' => 'Не возможно выполнить операцию.',
        '5210' => 'Банк-эмитент недоступен.',
        '5211' => 'Дубликат транзакции.',
        '5301' => 'Карта просрочена или дата указана неверно.',
        '5302' => 'Транзакция отклонена банком-эмитентом.',
        '5303' => 'Транзакция не поддерживается.',
        '5304' => 'Финансовое учреждение запрещено.',
        '5305' => 'Карта утеряна или украдена.',
        '5306' => 'Неверный статус карты.',
        '5307' => 'Лимит карты превышен.',
        '5308' => 'Невозможно авторизовать.',
        '5309' => 'Лимит карты превышен по активности.',
        '5310' => 'Лимит карты превышен по сумме.',
        '5320' => 'Карта не поддерживается.',
        '5333' => 'Ошибка формата.',
        '5334' => 'Истекло время ожидания.',
        '5396' => 'Ошибка обработки запроса.',
        '5401' => 'Вызов эмитента.',
        '5410' => 'Проверка 3D-Secure не пройдена.',
        '5411' => 'Неверный CVV2/CVC2.',
        '5412' => 'Ошибка верификации PIN.',
        '5501' => 'Срок действия карты истек - должны устранить.',
        '5502' => 'Транзакция отклонена банком-эмитентом - должны устранить.',
        '5809' => 'Системная ошибка шлюза.',
        '5888' => 'Неверный ID сессии.',
        '5889' => 'Неверный мерчант.',
        '5890' => 'Превышено максимальное число попыток.',
        '6000' => 'Дополнительная аутентификация обязательна.',
        '6001' => '3D-Secure обязательна.',
        '6002' => 'Ошибка 3D-Secure аутентификации.',
        '6003' => 'Проверка 3D-Secure не пройдена.',
        '6004' => '3D-Secure недоступна.',
        '6100' => 'Аутентификация обязательна.',
        '6101' => 'Аутентификация в процессе.',
        '6110' => 'Аутентификация провалена.',
        '6201' => 'Аккаунт не найден.',
        '6202' => 'Неверная транзакция.',
        '6203' => 'Неверная сумма.',
        '6204' => 'Не возможно выполнить операцию.',
        '6205' => 'Недостаточно средств.',
        '6206' => 'Неверная информация о платеже.',
        '6207' => 'Неверный ID терминала.',
        '6208' => 'Оригинальная транзакция не найдена.',
        '6209' => 'Unable to process void or refund.',
        '6210' => 'Банк-эмитент недоступен.',
        '6211' => 'Дубликат транзакции.',
        '6301' => 'Карта просрочена или дата указана неверно.',
        '6302' => 'Транзакция отклонена банком-эмитентом.',
        '6303' => 'Транзакция не поддерживается.',
        '6304' => 'Финансовое учреждение запрещено.',
        '6305' => 'Карта утеряна или украдена.',
        '6306' => 'Неверный статус карты.',
        '6307' => 'Лимит карты превышен.',
        '6308' => 'Невозможно авторизовать.',
        '6309' => 'Лимит карты превышен по активности.',
        '6310' => 'Лимит карты превышен по сумме.',
        '6320' => 'Карта не поддерживается.',
    ];
}
