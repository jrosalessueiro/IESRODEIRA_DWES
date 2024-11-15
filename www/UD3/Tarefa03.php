<?php

abstract class Persona {

}

/*Deseamos crear una aplicación que modelará o guardará información sobre las personas que conforman la comunidad educativa de un instituto de enseñanza secundaria. En concreto, tenemos los siguientes tipos de personas, de los que queremos guardar la información:
    • para todas las personas:
        ◦ nombre, apellido1 y apellido2
        ◦ fecha nacimiento
        ◦ DNI o documento de identificación
        ◦ Dirección
        ◦ Teléfono(s)
        ◦ sexo
    • administrativos:
        ◦ años de servicio
    • conserjes:
        ◦ años de servicio
    • personal de limpieza:
        ◦ años de servicio
    • profesorado:
        ◦ años de servicio
        ◦ materias que imparte
        ◦ cargo directivo: ninguno, dirección, secretariado, jefatura estudios diurno, jefatura estudios personas adultas, vicedirección
    • alumnado de la ESO:
        ◦ curso
        ◦ grupo
    • alumnado de Bachillerato
        ◦ curso
        ◦ grupo
    • alumnado de Formación Profesional
        ◦ ciclo formativo
        ◦ curso
        ◦ grupo

Crea el código de una jerarquía de clases que permite modelar la información anterior, diseñando la/s clase/s abstracta/s, métodos setter/getter, propiedades/atributos, métodos auxiliares, etcétera necesarios. Diseña tu jerarquía de clases teniendo en cuenta que se pueda usar polimorfismo. 

Ten además en cuenta las cuestiones siguientes:
    • todas las clases que modelan lo anterior, tendrán un método/función generarAlAzar() que devolverá un objeto de esa clase con información inventada (pero coherente, es decir, con formato que respete la semántica del elemento a representar).
    • todas las clases implementarán un método numeroObjetosCreado() que devuelva la cantidad de objetos que se han creado de esa clase en concreto.
    • implementa el método __toString() para cada clase.
    • todas las clases que modelan lo anterior, tendrán un método trabajar() que devolverá un string o cadena indicando lo que hacer una persona de esa clase (por ejemplo: "Soy un estudiante de la ESO y estoy estudiando" ó "Soy una estudiante de la ESO y estoy estudiando"; es decir, se tendrá en cuenta la propiedad "sexo" para imprimir un mensaje correcto).

Documenta todo el código.