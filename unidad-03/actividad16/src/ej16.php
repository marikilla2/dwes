<?php
class Persona{
    private string $nombre;

    public function __construct(string $nombre)
    {
        $nombreSinEspacio = trim($nombre);
        if($nombreSinEspacio === ""){
            throw new InvalidArgumentException("El nombre no puede estar vacío");
        }

        $this->nombre = $nombreSinEspacio;
    }

    public function getNombre() : string{
        return $this->nombre;
    }

    public function obtenerDescripcion() : string{
        return "Persona: " . $this->nombre;
    }
}

class Alumno extends Persona{
    private string $ciclo;
    
    public function __construct(string $nombre, string $ciclo)
    {
        $cicloNuevo = trim($ciclo);

        if($cicloNuevo === ""){
            throw new InvalidArgumentException("El ciclo no puede estar vacío");
        }

        parent::__construct($nombre);
        $this->ciclo = $cicloNuevo;
    }

    public function getCiclo() : string{
        return $this->ciclo;
    }

    public function obtenerDescripcion(): string
    {
        return parent::obtenerDescripcion() . "/ Ciclo " . $this->ciclo;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Herencia y Sobrescritura</title>
</head>
<body>
    <h1>Pruebas del Ejercicio 16</h1>

    <?php
    $persona = new Persona("Luis");
    $alumna = new Alumno("Ana", "DAW");

    echo "<p>" . htmlspecialchars($persona->obtenerDescripcion(), ENT_QUOTES, 'UTF-8') . "</p>";
    echo "<p>" . htmlspecialchars($alumna->obtenerDescripcion(), ENT_QUOTES, 'UTF-8') . "</p>";

    echo "<p>Nombre de la alumna (mediante getter heredado): " . htmlspecialchars($alumna->getNombre(), ENT_QUOTES, 'UTF-8') . "</p>";

    try {
        $alumnoErroneo = new Alumno("Carlos", "   ");
    } catch (InvalidArgumentException $e) {
        echo "<p><strong>Excepción capturada correctamente:</strong> " . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8') . "</p>";
    }
    ?>

    <!-- 
        Respuestas a las preguntas planteadas:
        
        Por qué no accedemos directamente a $this->nombre desde la hija?
           Porque la propiedad $nombre está declarada como "private" en la clase padre (Persona). 
           En PHP, las propiedades privadas solo son accesibles dentro de la misma clase donde se declaran, 
           por lo que las clases hijas no pueden acceder a ellas directamente. Para reutilizar o consultar 
           dichos valores, debemos utilizar métodos públicos o protegidos (getters o constructores del padre).
           
        Qué inicializa parent::__construct()?
           Inicializa las propiedades definidas en la clase padre, asegurando que la parte de la instancia correspondiente 
           al padre quede correctamente configurada antes de que la clase hija añada su propia lógica o propiedades.
           
        Cuántos objetos se crean al construir únicamente la alumna?
           Se crea un único objeto (una única instancia en memoria de la clase Alumno). 
           La herencia en PHP no crea múltiples objetos separados; más bien, el objeto de la clase hija 
           hereda los métodos y propiedades de la clase padre formando una única entidad.
    -->
</body>
</html>