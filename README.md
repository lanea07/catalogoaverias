## <span style="color:#C8102E">Catalogo Usados Flamingo</span>

Micrositio de registro, exhibición y promoción de los productos usados de Almacenes Flamingo.
<br>

### **Instalaciones recomendadas**

1. PHP y MySQL. Se recomienda Laragon, XAMPP también es admitido ([Laragon](https://laragon.org/download/index.html)) / ([XAMPP](https://www.apachefriends.org/es/index.html))
2. Composer ([Descargar](https://getcomposer.org/download/))
3. TO-DO Tree Para seguimiento de tareas pendientes ([TO-DO Tree](https://marketplace.visualstudio.com/items?itemName=Gruntfuggly.todo-tree))
   <br>

### **Comandos para inicializar el repositorio**

##### 1. Instalar las dependencias de PHP

```
composer install
```

<br>

##### 2. Instalar las dependencias de Node

```
npm install
```

<br>

#### Pasos posteriores a la inicialización

##### 1. Crear Base de Datos y Tablas necesarias

```
php artisan migrate
```

Opcionalmente puede llenar datos de muestra en las tablas al pasar el argumento `--seed`
