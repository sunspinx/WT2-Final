<?php
mb_internal_encoding("UTF-8");


class Mailer
{
    /**
     * Odošle jeden email
     *
     * @param $recipient string Emailová adresa prijímateľa
     * @param $sender string Email odosielateľa
     * @param $subject string Predmet emailu
     * @param $message string Správa
     *
     * return void
     *
     * @throws Exception Prázdny parameter
     * @throws Exception Chybne zadaný email
     * @throws Exception Email neodoslalo
     */
    public function sendSingleMail($recipient, $sender, $subject, $message)
    {
        // Reťazce z parametrov sú prázdne
        if(empty($recipient) || empty($sender) || empty($subject) || empty($message))
            throw new Exception('Žiaden parameter nesmie byť prázdny!');
        // Príjemcov email je zadaný zle
        if(!$this->isEmail($recipient))
            throw new Exception('Príjemcov email bol zadaný chybne');

        $head = 'From: ' . $sender;
        $head .= "\nMIME-Version: 1.0\n";
        $head .= "Content-Type: text/html; charset=\"utf-8\"\n";

        // Odoslanie emailu
        $success = mb_send_mail(htmlspecialchars($recipient), htmlspecialchars($subject), $message, $head);

        // Odosielanie neprebehlo v poriadku
        if(!$success)
            throw new Exception('Email nebol odoslaný');
    }

    /**
     * Odošle n počet emailov
     *
     * @param $recipient array Emailové adresy prijímateľov
     * @param $sender string Email odosielateľ
     * @param $subject string Predmet emailu
     * @param $message string Správa
     *
     *
     * @throws Exception Prázdny parameter
     * @throws Exception Email neodoslalo
     */
    public function sendMultiMails($recipients, $sender, $subject, $message)
    {
        // Reťazce z parametrov sú prázdne
        if(empty($recipients) || empty($sender) || empty($subject) || empty($message))
            throw new Exception('Žiaden parameter nesmie byť prázdny!');

        $head = 'From: ' . $sender;
        $head .= "\nMIME-Version: 1.0\n";
        $head .= "Content-Type: text/html; charset=\"utf-8\"\n";

        // Pole recipients obsahuje emaily, na ktoré odošleme mail -> prejdeme ich
        foreach($recipients as $email) {
            // Ak prechádzaný email nie je email, tak ho preskočíme
            if ($this->isEmail($email))
            {
                // Odoslanie emailu = true
                $success = mb_send_mail(htmlspecialchars($email), htmlspecialchars($subject), $message, $head);
                // Pri odosielani došlo k chybe
                if(!$success)
                    throw new Exception('Pri odosielaní správy na ' . $email . ' došlo k chybe.');
            }
        }
    }

    /**
     * Overí, či sa jedná o E-mail
     *
     * @param $input string Vstupný text
     *
     * @return bool Jedná sa o E-mail?
     */
    private function isEmail($input)
    {
        return (bool) filter_var($input, FILTER_VALIDATE_EMAIL);
    }
}