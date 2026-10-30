# Actividad Final UD3: Tienda Informática (Catálogo Orientado a Objetos)

**Autor:** María Ortega Cortés  
**Módulo:** Programación / Desarrollo Web en Entorno Servidor  
**Entorno:** PHP 8.2 + Apache en Docker

---

## 1. Finalidad del proyecto e instrucciones de ejecución

Este proyecto consiste en una aplicación en PHP desarrollada bajo el paradigma de **Programación Orientada a Objetos (POO)**. Gestiona un catálogo de productos informáticos físicos y digitales mediante el uso de abstracción, herencia, interfaces, encapsulación, polimorfismo, manejo de excepciones y pruebas unitarias.

### Instrucciones de ejecución

1. Asegúrate de tener el entorno Docker del curso levantado.
2. Clona o copia la carpeta `actividad-final-ud3` dentro del directorio servidor del contenedor (ej. `www` o `public_html`).
3. Inicia los contenedores mediante terminal:
   ```bash
   docker compose up -d
   ```

Cada archivo PHP del proyecto tiene una única responsabilidad bien definida:

Describible.php: Interfaz común que establece el contrato del método público obtenerDescripcion(): string.

Categoria.php: Representa una categoría de productos. Implementa Describible, almacena y valida el nombre de la categoría evitando cadenas vacías tras aplicar trim().

Producto.php: Clase abstracta base para la jerarquía de productos. Implementa Describible, almacena el nombre, el precio y el objeto Categoria asociado. Mantiene el contador estático totalCreados y declara el método abstracto calcularGastosEnvio().

ProductoFisico.php: Clase concreta que hereda de Producto. Modela productos con peso (kg) y stock de unidades. Contiene la constante de tarifa TARIFA_POR_KG, calcula los gastos de envío y gestiona las operaciones reservar() y reponer().

ProductoDigital.php: Clase final concreta que hereda de Producto. Modela productos descargables sin peso ni stock, cuyos gastos de envío son siempre 0,00 €.

Catalogo.php: Clase contenedora (agregación) que almacena una lista de objetos Producto. Permite añadir productos, contarlos y calcular el valor conjunto total invocando polimórficamente cada producto.

index.php: Script de presentación. Instancia las categorías y productos iniciales, los agrega al catálogo, renderiza la tabla de datos, muestra la secuencia de reservas/reposición de stock y captura excepciones.

pruebas.php: Suite de validación y comprobaciones automáticas del funcionamiento del sistema, bordes de límites y rechazo de errores.

¿Por qué Producto es una clase abstracta?
Porque un "producto" en abstracto no existe de forma independiente en la tienda; siempre debe ser un tipo concreto de producto (Físico o Digital) que defina explícitamente cómo calcula sus gastos de envío. Definirla como abstracta impide que se puedan crear instancias directas con new Producto(...).

¿Por qué Describible es una interfaz?
Porque permite establecer un comportamiento común (obtenerDescripcion()) entre clases que pertenecen a familias o jerarquías totalmente distintas y que no comparten herencia (Categoria por un lado y Producto por otro), permitiendo tratarlas de forma polimórfica mediante el tipo de la interfaz.

¿Qué dos clases implementan directamente la interfaz Describible?
Las clases Categoria y Producto (de la cual lo heredan sus clases hijas ProductoFisico y ProductoDigital).

¿Qué objeto representa $this al ejecutar calcularTotal() sobre el teclado y qué método calcula su envío?
El objeto $this representa la instancia concreta de ProductoFisico que corresponde al teclado.

El método que calcula su envío es ProductoFisico::calcularGastosEnvio(), resuelto dinámicamente gracias al polimorfismo.

Significado de los dos usos de final
Producto::getPrecio(): Declarado como final para evitar que las clases hijas puedan sobrescribir el método de consulta del precio base, garantizando la consistencia del dato.

ProductoDigital: Declarada como clase final para impedir que se puedan crear subclases derivadas de ella (cierra la jerarquía de herencia para este tipo).

Constante de envío y contador estático
TARIFA_POR_KG: Constante de clase definida en ProductoFisico con el valor 2.0. Representa el coste por kilogramo y se consulta internamente mediante self::TARIFA_POR_KG.

Producto::$totalCreados: Propiedad estática incrementada dentro del constructor de Producto únicamente tras validar con éxito todos los argumentos, garantizando que solo cuente las instancias construidas correctamente.

4. Tabla de pruebas y validación (pruebas.php)
   ID Caso de prueba Resultado esperado Resultado observado ¿Coincide?
   P1 Catálogo vacío 0 productos y valor total de 0,00 € 0 productos; Valor total: 0,00 €Sí
   P2Catálogo con los 4 productos iniciales4 productos y valor total de 284,40 €4 productos; Valor total: 284,40 €Sí
   P3Gastos de envío en ProductoDigitalEnvío 0,00 €; Total igual al precio base (40,00 €)Envío: 0,00 €; Total: 40,00 €Sí
   P4Físico con stock 5: Reservar 5 unidadesSe completa la reserva correctamente; Stock posterior: 0Reserva completada; Stock actual: 0Sí
   P5Físico con stock 5: Reservar 6 unidadesLanza InvalidArgumentException; Conserva stock en 5Excepción capturada: "No hay suficiente stock"; Stock conservado en 5Sí
   P6Físico con stock 5: Reservar 0 unidadesLanza InvalidArgumentException; Conserva stock en 5Excepción capturada: "La cantidad a reservar debe ser mayor que 0"; Stock: 5Sí
   P7Físico con stock 5: Reponer -1 unidadesLanza InvalidArgumentException; Conserva stock en 5Excepción capturada: "La cantidad a reponer debe ser mayor que 0"; Stock: 5Sí
   P8Intentar construir Producto con precio negativo (-10 €)Lanza InvalidArgumentException; No se crea el objetoExcepción capturada: "El precio no puede ser negativo"; Objeto no instanciadoSí
   P9Intentar construir ProductoFisico con peso 0 kgLanza InvalidArgumentException; El contador estático conserva su valor anteriorExcepción capturada; El contador $totalCreados no se incrementaSí
   P10Intentar construir Categoria con espacios (" ")Lanza InvalidArgumentException; No se crea la categoríaExcepción capturada: "El nombre de la categoría no puede estar vacío"Sí

\*Plantilla generada con Inteligencia Artificial.
