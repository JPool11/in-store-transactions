# Proyecto de API con Laravel y DataTable

Este proyecto es una aplicación web construida con **Laravel** como backend y **Blade** para la vista frontend. El objetivo es crear una página que consuma datos desde una API y los muestre en un DataTable.

## ¿Por qué Laravel y Blade?

### 1. **Laravel: Un Framework PHP Moderno y Eficiente**

Laravel es uno de los frameworks de PHP más populares por su facilidad de uso, robustez y características para el desarrollo rápido de aplicaciones web:

- **Ecosistema de Laravel**: Conjunto completo de herramientas integradas para autenticación, validación de formularios, manejo de bases de datos y envío de correos electrónicos
  
- **Artisan CLI**: Interfaz de línea de comandos para facilitar tareas como creación de controladores, migraciones y gestión de bases de datos
  
- **Migraciones y Eloquent ORM**: Facilita la gestión de bases de datos con migraciones y un ORM intuitivo

- **Seguridad**: Protección contra ataques XSS, CSRF y SQL injection

- **Desarrollo Ágil**: Blade permite construir vistas de manera rápida y eficiente

### 2. **Blade: Motor de Plantillas Rápido y Flexible**

Ventajas de usar Blade:

- **Sintaxis sencilla**: Integración simple de PHP y HTML
  
- **Herencia de plantillas**: Permite reutilización de código y layouts consistentes

- **Integración con Laravel**: Acceso fluido a funcionalidades del framework

## Instrucciones para Ejecutar el Proyecto

### Requisitos

- **PHP** (>= 8.0)
- **Composer**
- **Node.js**
- **Base de datos** (MySQL o similar)

### Pasos de Instalación

1. **Clonar el Proyecto**
```bash
git clone https://github.com/tu-usuario/nombre-del-repositorio.git
cd nombre-del-repositorio
```

2. **Instalar Dependencias de PHP**
```bash
composer install
```

3. **Configurar el Entorno**
```bash
cp .env.example .env
```

Configurar en `.env`:
```dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nombre_base_de_datos
DB_USERNAME=usuario
DB_PASSWORD=contraseña
```

4. **Generar la Clave de la Aplicación**
```bash
php artisan key:generate
```

5. **Ejecutar las Migraciones**
```bash
php artisan migrate
```

6. **Instalar Dependencias de Frontend**
```bash
npm install
```

7. **Ejecutar el Servidor**
```bash
php artisan serve
```

8. **Compilar los Assets de Frontend**
```bash
npm run dev
```

9. **Acceder a la Aplicación**
```
http://127.0.0.1:8000
```

### Rutas de la API

- `GET /api/transactions/summary`: Devuelve resumen de transacciones para el DataTable
- `POST /api/transactions`: Almacena nueva transacción