<?php
/**
 * @author AlexanderC <self@alexanderc.me>
 * @date 2/25/14
 * @time 3:55 PM
 */

namespace AlexanderC\Bundle\UngaBungaBundle\Helpers;


class GeneralMailSubjects
{
    /**
     * @return string
     */
    public static function getOnCustomerRegistrationConfirmationSubject()
    {
        return 'Подтверждение регистрации';
    }

    /**
     * @return string
     */
    public static function getOnCustomerRegistrationSubject()
    {
        return 'Благодарим за регистрацию';
    }

    /**
     * @return string
     */
    public static function getOnApplicationSubmitCustomerSubject()
    {
        return 'Счет на оплату';
    }
}