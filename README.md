Calculador de precio de carrito de compra
=========================================

Con este test pretendemos sólo evaluar tus conocimientos de OOP y, más especificamente, su implementacion en PHP. No necesitaras añadir integracion con ninguna infraestructura ni, en cualquier caso, implementar una aplicacion web.

#Implementación

##El Dominio

Atrapalo necesita implementar un nuevo Sistema de gestión de pedidos. Para ello empezaremos por el calculo del precio del carrito basado en sus lineas (Lines).
Cada linea esta compuesta de un articulo (Item) y su cantidad. Para simplicar, las cantidades siempre se expresaran en unidades y seran siempre enteros. 
Para el calculo de precios se quiere que el sistema pueda incorporar diferentes metodos de calculo de modo que cada metodo se aplique solo si se puede. 
Cada linea sera calculada segun un solo metodo. Los metodos actuales son "3 x 2", "con % de descuento" y "por unidad" siendo este el orden de prioridad de aplicacion. Se podra ir añadiendo nuevos metodos de calculo
 a medida que el negocio lo requiera ("ultimas unidades", "paquetes", etc). 
 
Cada metodo de calculo de precio puede ser aplicado solo a un grupo especifico de articulos. Un articulo puede tener varios metodos de calculo asociados pero siempre se aplicara sólo uno. 
Por ejemplo, si a un articulo AAA se le puede aplicar el calculo "3 X 2" y el "con % de descuento" se le aplicara el "3 X 2" ya que tiene prioridad siempre que la linea de carrito tenga mas de tres unidades, aplicando el porcentage de descuento en caso contrario.
La lista de precios y ofertas es la siguiente


|SKU|Estrategia de precio|Valor|
|---|---|---|
|AAA|por unidad|100 EUR|
||% descuento|10%|
||3 X 2| - |
|BBB|por unidad|55 EUR|
||% descuento|5%|
|CCC|por unidad|25 EUR|