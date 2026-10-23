<?php

class Curso
{
    private string $nombre;
    private int $horas;

    public function __construct(string $nombre, int $horas = 20)
    {
        $this->nombre = $nombre;
        $this->horas = $horas;
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function getHoras(): int
    {
        return $this->horas;
    }
}

/*
 * Qué diferencia hay entre `string $nombre` y `private string $nombre` en los parámetros del constructor?
 * 
 *    - `string $nombre`: Es simplemente un parámetro formal de la función/constructor. Solo vive dentro
 *      del ámbito de ejecución del constructor y NO crea automáticamente una propiedad en la clase.
 * 
 *    - `private string $nombre`: Utiliza la característica "Constructor Property Promotion" (PHP 8.0+).
 *      Crea automáticamente una propiedad privada `$nombre` de tipo `string` en la clase y le asigna
 *      el valor pasado al argumento en la instanciación.
 * 
 * Qué declaración y asignación evita repetir la promoción?
 * 
 *    - Evita declarar la propiedad fuera de la función (`private string $nombre;`) y evita realizar 
 *      la asignación manual dentro del cuerpo del constructor (`$this->nombre = $nombre;`).
 * 
 * La promoción comprueba automáticamente que las horas sean positivas?
 * 
 *    - No. La promoción de propiedades únicamente valida el tipo de dato mediante el type hinting 
 *      (en este caso `int`). No realiza ningún tipo de validación lógica de rango o de negocio (como
 *      asegurarse de que `$horas > 0`). Para aplicar ese tipo de validación, habría que incluir 
 *      la lógica dentro del cuerpo `{ ... }` del constructor.
 */
?>
