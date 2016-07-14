Calculador de precio de carrito de compra
=========================================

Con este test pretendemos sólo evaluar tus conocimientos de OOP y, más específicamente, su implementación en PHP. No necesitarás añadir integración con ninguna infraestructura ni, en cualquier caso, implementar una aplicación web.

#Implementación

##El Dominio

ATRAPALO necesita implementar un nuevo Sistema de gestión de pedidos. Para ello empezaremos por el cálculo del precio del carrito basado en sus líneas (Lines).
Cada línea está compuesta de un artículo (Item) y su cantidad. Para simplificar, las cantidades siempre se expresarán en unidades y serán siempre enteros.
Para el cálculo de precios se quiere que el sistema pueda incorporar diferentes métodos de cálculo de modo que cada método se aplique solo si se puede.
Cada línea será calculada según un solo método. Los métodos actuales son "3 x 2", "con % de descuento" y "por unidad" siendo este el orden de prioridad de aplicación. Se podrá ir añadiendo nuevos métodos de cálculo
a medida que el negocio lo requiera ("últimas unidades", "paquetes", etc).

Cada método de cálculo de precio puede ser aplicado solo a un grupo específico de artículos. Un artículo puede tener varios métodos de cálculo asociados pero siempre se aplicará sólo uno.
Por ejemplo, si a un artículo AAA se le puede aplicar el cálculo "3 X 2" y el "con % de descuento" se le aplicará el "3 X 2" ya que tiene prioridad siempre que la línea de carrito tenga más de tres unidades, aplicando el porcentaje de descuento en caso contrario.
La lista de precios y ofertas es la siguiente:


|SKU|Estrategia de precio|Valor|
|---|---|---|
|AAA|por unidad|100 EUR|
||% descuento|10%|
||3 X 2| - |
|BBB|por unidad|55 EUR|
||% descuento|5%|
|CCC|por unidad|25 EUR|
|DDD|por unidad|25 EUR|
||% descuento|10%|
||3 X 2| - |


##La solución

Esta prueba se entrega con un test de componente en el que se comprueba la interacción al completo de la feature requerida. Para probarlo ejecuta:

```$ php vendor/bin/phpunit tests/integration/ ```

Por otro lado, es necesario que la prueba se entregue con los tests unitarios necesarios. Para ello ejecutaremos:

```$ php vendor/bin/phpunit tests/unit/ ```

###Se valorará positivamente:

* La implementación correcta de los tests unitarios
* Correcta aplicación de los principios SOLID
* Correcta aplicación de patrones de diseño. No te preocupes con la sobre ingeniería...se trata de lucirse ;)

El objetivo es hacer que este test pase. Para ello no puedes modificar ningún interfaz (interface). Si podrás, por otro lado, modificar, añadir o eliminar cualquier clase que consideres necesario.

