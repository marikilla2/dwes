<?php
declare (strict_types=1);

interface Notificador{
    public function prepararAviso(string $mensaje) : string;
}

class NotificadorEmail implements Notificador{
    
    public function prepararAviso(string $mensaje): string
    {
        return "Email: " . $mensaje;
    }
    
}

class NotificadorSms implements Notificador{
    public function prepararAviso(string $mensaje): string
    {
        return "SMS: " . $mensaje;
    }
}

?>