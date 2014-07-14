<?php
/**
 * @author AlexanderC <self@alexanderc.me>
 * @date 2/25/14
 * @time 3:57 PM
 */

namespace AlexanderC\Bundle\UngaBungaBundle\Helpers;


class FormErrors
{
    /**
     * @return string
     */
    public static function getCustomerAlreadyExists()
    {
        return 'Клиент с таким эл. адресом уже существует.';
    }

    /**
     * @return string
     */
    public static function getMistypedPromoCode()
    {
        return 'Неверный промо код.';
    }

    /**
     * @return string
     */
    public static function getMissingCustomer()
    {
        return 'Клиент не найден.';
    }
} 