# 🚀 BrandFlow - Sistema de Gestión de Productos y Marcas

[![Laravel](https://img.shields.io/badge/Laravel-10.x-red.svg)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-8.1+-blue.svg)](https://php.net)
[![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-3.x-38B2AC.svg)](https://tailwindcss.com)
[![Alpine.js](https://img.shields.io/badge/Alpine.js-3.x-77DD77.svg)](https://alpinejs.dev)

**BrandFlow** es una aplicación web moderna y elegante para la gestión integral de productos, marcas y categorías. Desarrollada con Laravel 10, Tailwind CSS y Alpine.js, ofrece una experiencia de usuario excepcional con funcionalidades avanzadas de búsqueda, filtrado y estadísticas en tiempo real.

## ✨ Características Principales

### 🎯 Gestión Completa de Productos
- **CRUD completo** para productos, marcas y categorías
- **Carga de imágenes** con vista previa
- **Búsqueda avanzada** por nombre, descripción, marca y categoría
- **Filtros dinámicos** por precio, marca y categoría
- **Vista rápida** de productos con modal interactivo

### 📊 Dashboard Inteligente
- **Estadísticas en tiempo real** de productos, marcas y categorías
- **Gráficos de rendimiento** y métricas clave
- **Actividad reciente** con productos agregados hoy
- **Enlaces rápidos** a todas las secciones

### 🎨 Interfaz Moderna
- **Diseño responsivo** que se adapta a todos los dispositivos
- **Tema oscuro/claro** automático
- **Animaciones suaves** y transiciones elegantes
- **Componentes reutilizables** con Tailwind CSS

### 🔍 Funcionalidades Avanzadas
- **Búsqueda en tiempo real** con filtros combinados
- **Paginación inteligente** para grandes volúmenes de datos
- **Notificaciones** para acciones importantes
- **Validación de formularios** en tiempo real

## 🛠️ Tecnologías Utilizadas

- **Backend**: Laravel 10.x
- **Frontend**: Tailwind CSS 3.x
- **JavaScript**: Alpine.js 3.x
- **Base de Datos**: MySQL/PostgreSQL
- **Servidor**: PHP 8.1+

## 📋 Requisitos del Sistema

- PHP >= 8.1
- Composer
- Node.js >= 16
- MySQL >= 8.0 o PostgreSQL >= 13
- Git

## 🚀 Instalación

### 1. Clonar el Repositorio
```bash
git clone https://github.com/tu-usuario/brandflow.git
cd brandflow
```

### 2. Instalar Dependencias
```bash
# Instalar dependencias de PHP
composer install

# Instalar dependencias de Node.js
npm install
```

### 3. Configurar el Entorno
```bash
# Copiar archivo de configuración
cp .env.example .env

# Generar clave de aplicación
php artisan key:generate
```

### 4. Configurar la Base de Datos
Edita el archivo `.env` con tus credenciales de base de datos:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=brandflow
DB_USERNAME=tu_usuario
DB_PASSWORD=tu_password
```

### 5. Ejecutar Migraciones y Seeders
```bash
# Crear las tablas de la base de datos
php artisan migrate

# Poblar con datos de ejemplo
php artisan db:seed
```

### 6. Compilar Assets
```bash
# Compilar CSS y JavaScript
npm run build
```

### 7. Iniciar el Servidor
```bash
php artisan serve
```

La aplicación estará disponible en `http://localhost:8000`

## 📁 Estructura del Proyecto

```
brandflow/
├── app/
│   ├── Http/Controllers/     # Controladores de la aplicación
│   ├── Models/              # Modelos Eloquent
│   └── Providers/           # Proveedores de servicios
├── database/
│   ├── migrations/          # Migraciones de base de datos
│   └── seeders/            # Seeders con datos de ejemplo
├── resources/
│   ├── views/              # Vistas Blade
│   ├── css/                # Estilos CSS
│   └── js/                 # JavaScript
├── public/
│   ├── imgs/               # Imágenes de productos
│   └── favicon.ico         # Favicon personalizado
└── routes/
    └── web.php             # Rutas de la aplicación
```

## 🎯 Funcionalidades Detalladas

### Gestión de Productos
- ✅ Crear, leer, actualizar y eliminar productos
- ✅ Carga y gestión de imágenes
- ✅ Asociación con marcas y categorías
- ✅ Control de estado activo/inactivo
- ✅ Vista rápida con modal interactivo

### Gestión de Marcas
- ✅ CRUD completo de marcas
- ✅ Validación de integridad referencial
- ✅ Estadísticas de productos por marca
- ✅ Prevención de eliminación con productos asociados

### Gestión de Categorías
- ✅ CRUD completo de categorías
- ✅ Organización jerárquica
- ✅ Estadísticas de productos por categoría
- ✅ Validación de dependencias

### Dashboard y Estadísticas
- ✅ Métricas en tiempo real
- ✅ Gráficos de rendimiento
- ✅ Productos más populares
- ✅ Actividad reciente
- ✅ Exportación de datos

## 🎨 Personalización

### Cambiar el Tema
El sistema utiliza Tailwind CSS para el diseño. Puedes personalizar los colores editando `tailwind.config.js`:

```javascript
module.exports = {
  theme: {
    extend: {
      colors: {
        'brandflow': {
          50: '#eff6ff',
          500: '#3b82f6',
          600: '#2563eb',
        }
      }
    }
  }
}
```

### Agregar Nuevas Funcionalidades
1. Crear el modelo en `app/Models/`
2. Generar la migración: `php artisan make:migration`
3. Crear el controlador: `php artisan make:controller`
4. Definir las rutas en `routes/web.php`
5. Crear las vistas en `resources/views/`

## 🧪 Testing

```bash
# Ejecutar tests unitarios
php artisan test

# Ejecutar tests con coverage
php artisan test --coverage
```

## 📦 Despliegue

### Producción
1. Configurar variables de entorno para producción
2. Optimizar la aplicación:
   ```bash
   php artisan config:cache
   php artisan route:cache
   php artisan view:cache
   ```
3. Configurar el servidor web (Apache/Nginx)
4. Configurar SSL/TLS

### Docker (Opcional)
```bash
# Construir imagen
docker build -t brandflow .

# Ejecutar contenedor
docker run -p 8000:8000 brandflow
```

## 🤝 Contribuir

1. Fork el proyecto
2. Crear una rama para tu feature (`git checkout -b feature/AmazingFeature`)
3. Commit tus cambios (`git commit -m 'Add some AmazingFeature'`)
4. Push a la rama (`git push origin feature/AmazingFeature`)
5. Abrir un Pull Request

## 📝 Licencia

Este proyecto está bajo la Licencia MIT. Ver el archivo `LICENSE` para más detalles.

## 🙏 Agradecimientos

- [Laravel](https://laravel.com) - El framework PHP elegante
- [Tailwind CSS](https://tailwindcss.com) - Framework CSS utility-first
- [Alpine.js](https://alpinejs.dev) - Framework JavaScript minimalista
- [Heroicons](https://heroicons.com) - Iconos hermosos y consistentes

## 📞 Soporte

Si tienes alguna pregunta o necesitas ayuda:

- 📧 Email: soporte@brandflow.com
- 💬 Discord: [BrandFlow Community](https://discord.gg/brandflow)
- 📖 Documentación: [docs.brandflow.com](https://docs.brandflow.com)
- 🐛 Issues: [GitHub Issues](https://github.com/tu-usuario/brandflow/issues)

---

<div align="center">
  <p>Hecho con ❤️ por el equipo de BrandFlow</p>
  <p>⭐ Si te gusta este proyecto, ¡déjanos una estrella!</p>
</div>

