# API Ficha 3428392 — Diccionario de entidades

Dominio: **sistema de gestión de inventario y ventas (e-commerce)**.

Cada integrante tiene asignada **una entidad**. Las tablas están ordenadas en **orden de migración** (padres primero) para evitar errores de llaves foráneas al ejecutar `php artisan migrate`.

Todas las entidades incluyen:

| Campo Laravel | Tipo Laravel | Tipo DB | Notas |
|---|---|---|---|
| `id` | `id()` / `bigIncrements` | `BIGINT UNSIGNED AI PK` | PK |
| `created_at` | `timestamps()` | `TIMESTAMP NULL` | Timestamps |
| `updated_at` | `timestamps()` | `TIMESTAMP NULL` | Timestamps |
| `deleted_at` | `softDeletes()` | `TIMESTAMP NULL` | SoftDeletes |

En el modelo Eloquent: `use SoftDeletes;` y `$dates` / cast de `deleted_at`.

---

## Orden de migración y asignación

### Fase 1 — Tablas sin dependencias (catálogos base)

---

#### 1. `roles` — AGREDO RIOS CAROL JULIANA

| Columna | Tipo DB | Laravel (migration) | Descripción |
|---|---|---|---|
| `id` | BIGINT UNSIGNED | `$table->id()` | PK |
| `name` | VARCHAR(100) | `$table->string('name', 100)` | Nombre del rol |
| `slug` | VARCHAR(100) | `$table->string('slug', 100)->unique()` | Identificador único |
| `description` | TEXT NULL | `$table->text('description')->nullable()` | Descripción |
| `is_active` | TINYINT(1) | `$table->boolean('is_active')->default(true)` | Activo |
| `created_at` / `updated_at` | TIMESTAMP | `$table->timestamps()` | Timestamps |
| `deleted_at` | TIMESTAMP NULL | `$table->softDeletes()` | SoftDeletes |

**FK:** ninguna.

---

#### 2. `permissions` — ALVAREZ SANTOS SNEIDER

| Columna | Tipo DB | Laravel (migration) | Descripción |
|---|---|---|---|
| `id` | BIGINT UNSIGNED | `$table->id()` | PK |
| `name` | VARCHAR(100) | `$table->string('name', 100)` | Nombre |
| `slug` | VARCHAR(100) | `$table->string('slug', 100)->unique()` | Identificador único |
| `module` | VARCHAR(80) | `$table->string('module', 80)` | Módulo al que pertenece |
| `created_at` / `updated_at` | TIMESTAMP | `$table->timestamps()` | Timestamps |
| `deleted_at` | TIMESTAMP NULL | `$table->softDeletes()` | SoftDeletes |

**FK:** ninguna.

---

#### 3. `document_types` — ARAY RUIZ ISAAC ELIEZER

| Columna | Tipo DB | Laravel (migration) | Descripción |
|---|---|---|---|
| `id` | BIGINT UNSIGNED | `$table->id()` | PK |
| `name` | VARCHAR(80) | `$table->string('name', 80)` | Ej: Cédula, NIT |
| `code` | VARCHAR(10) | `$table->string('code', 10)->unique()` | Ej: CC, NIT, CE |
| `created_at` / `updated_at` | TIMESTAMP | `$table->timestamps()` | Timestamps |
| `deleted_at` | TIMESTAMP NULL | `$table->softDeletes()` | SoftDeletes |

**FK:** ninguna.

---

#### 4. `countries` — BAZAN MEZONES GHILARY

| Columna | Tipo DB | Laravel (migration) | Descripción |
|---|---|---|---|
| `id` | BIGINT UNSIGNED | `$table->id()` | PK |
| `name` | VARCHAR(120) | `$table->string('name', 120)` | Nombre del país |
| `iso_code` | CHAR(3) | `$table->char('iso_code', 3)->unique()` | Código ISO |
| `phone_code` | VARCHAR(8) | `$table->string('phone_code', 8)->nullable()` | Indicativo |
| `created_at` / `updated_at` | TIMESTAMP | `$table->timestamps()` | Timestamps |
| `deleted_at` | TIMESTAMP NULL | `$table->softDeletes()` | SoftDeletes |

**FK:** ninguna.

---

#### 5. `categories` — CARANTON MARIN MIGUEL ANGEL

| Columna | Tipo DB | Laravel (migration) | Descripción |
|---|---|---|---|
| `id` | BIGINT UNSIGNED | `$table->id()` | PK |
| `name` | VARCHAR(120) | `$table->string('name', 120)` | Nombre |
| `slug` | VARCHAR(140) | `$table->string('slug', 140)->unique()` | Slug |
| `description` | TEXT NULL | `$table->text('description')->nullable()` | Descripción |
| `is_active` | TINYINT(1) | `$table->boolean('is_active')->default(true)` | Activo |
| `created_at` / `updated_at` | TIMESTAMP | `$table->timestamps()` | Timestamps |
| `deleted_at` | TIMESTAMP NULL | `$table->softDeletes()` | SoftDeletes |

**FK:** ninguna.

---

#### 6. `brands` — COLOBON MARTINEZ MIGUEL ANGEL

| Columna | Tipo DB | Laravel (migration) | Descripción |
|---|---|---|---|
| `id` | BIGINT UNSIGNED | `$table->id()` | PK |
| `name` | VARCHAR(120) | `$table->string('name', 120)` | Nombre de la marca |
| `slug` | VARCHAR(140) | `$table->string('slug', 140)->unique()` | Slug |
| `website` | VARCHAR(255) | `$table->string('website')->nullable()` | Sitio web |
| `created_at` / `updated_at` | TIMESTAMP | `$table->timestamps()` | Timestamps |
| `deleted_at` | TIMESTAMP NULL | `$table->softDeletes()` | SoftDeletes |

**FK:** ninguna.

---

#### 7. `coupons` — CUERVO BELTRÁN SANTIAGO

| Columna | Tipo DB | Laravel (migration) | Descripción |
|---|---|---|---|
| `id` | BIGINT UNSIGNED | `$table->id()` | PK |
| `code` | VARCHAR(40) | `$table->string('code', 40)->unique()` | Código del cupón |
| `discount_type` | ENUM/VARCHAR | `$table->string('discount_type', 20)` | percent / fixed |
| `discount_value` | DECIMAL(12,2) | `$table->decimal('discount_value', 12, 2)` | Valor del descuento |
| `starts_at` | TIMESTAMP NULL | `$table->timestamp('starts_at')->nullable()` | Inicio vigencia |
| `ends_at` | TIMESTAMP NULL | `$table->timestamp('ends_at')->nullable()` | Fin vigencia |
| `is_active` | TINYINT(1) | `$table->boolean('is_active')->default(true)` | Activo |
| `created_at` / `updated_at` | TIMESTAMP | `$table->timestamps()` | Timestamps |
| `deleted_at` | TIMESTAMP NULL | `$table->softDeletes()` | SoftDeletes |

**FK:** ninguna.

---

### Fase 2 — Dependen de catálogos base

---

#### 8. `departments` — ECHEVERRY MABARDI JUAN SEBASTIAN

| Columna | Tipo DB | Laravel (migration) | Descripción |
|---|---|---|---|
| `id` | BIGINT UNSIGNED | `$table->id()` | PK |
| `country_id` | BIGINT UNSIGNED | `$table->foreignId('country_id')->constrained('countries')` | FK país |
| `name` | VARCHAR(120) | `$table->string('name', 120)` | Nombre |
| `code` | VARCHAR(10) | `$table->string('code', 10)->nullable()` | Código DANE / interno |
| `created_at` / `updated_at` | TIMESTAMP | `$table->timestamps()` | Timestamps |
| `deleted_at` | TIMESTAMP NULL | `$table->softDeletes()` | SoftDeletes |

**FK:** `countries.id`

---

#### 9. `role_permission` — FIGUERA VEGAS CARLOS JAVIER

| Columna | Tipo DB | Laravel (migration) | Descripción |
|---|---|---|---|
| `id` | BIGINT UNSIGNED | `$table->id()` | PK |
| `role_id` | BIGINT UNSIGNED | `$table->foreignId('role_id')->constrained('roles')` | FK rol |
| `permission_id` | BIGINT UNSIGNED | `$table->foreignId('permission_id')->constrained('permissions')` | FK permiso |
| `created_at` / `updated_at` | TIMESTAMP | `$table->timestamps()` | Timestamps |
| `deleted_at` | TIMESTAMP NULL | `$table->softDeletes()` | SoftDeletes |

**FK:** `roles.id`, `permissions.id`  
**Unique:** `['role_id', 'permission_id']`

---

#### 10. `cities` — GARCIA CASTELLANOS JHONATAN

| Columna | Tipo DB | Laravel (migration) | Descripción |
|---|---|---|---|
| `id` | BIGINT UNSIGNED | `$table->id()` | PK |
| `department_id` | BIGINT UNSIGNED | `$table->foreignId('department_id')->constrained('departments')` | FK departamento |
| `name` | VARCHAR(120) | `$table->string('name', 120)` | Nombre |
| `postal_code` | VARCHAR(20) | `$table->string('postal_code', 20)->nullable()` | Código postal |
| `created_at` / `updated_at` | TIMESTAMP | `$table->timestamps()` | Timestamps |
| `deleted_at` | TIMESTAMP NULL | `$table->softDeletes()` | SoftDeletes |

**FK:** `departments.id`

---

### Fase 3 — Personas y ubicaciones operativas

---

#### 11. `suppliers` — GARCIA MORA JOHAN SEBASTIAN

| Columna | Tipo DB | Laravel (migration) | Descripción |
|---|---|---|---|
| `id` | BIGINT UNSIGNED | `$table->id()` | PK |
| `document_type_id` | BIGINT UNSIGNED | `$table->foreignId('document_type_id')->constrained('document_types')` | Tipo doc |
| `city_id` | BIGINT UNSIGNED | `$table->foreignId('city_id')->constrained('cities')` | Ciudad |
| `business_name` | VARCHAR(180) | `$table->string('business_name', 180)` | Razón social |
| `document_number` | VARCHAR(30) | `$table->string('document_number', 30)->unique()` | NIT / documento |
| `email` | VARCHAR(150) | `$table->string('email', 150)->nullable()` | Correo |
| `phone` | VARCHAR(30) | `$table->string('phone', 30)->nullable()` | Teléfono |
| `created_at` / `updated_at` | TIMESTAMP | `$table->timestamps()` | Timestamps |
| `deleted_at` | TIMESTAMP NULL | `$table->softDeletes()` | SoftDeletes |

**FK:** `document_types.id`, `cities.id`

---

#### 12. `users` — GARZÓN PARRA JUAN ANDRÉS

| Columna | Tipo DB | Laravel (migration) | Descripción |
|---|---|---|---|
| `id` | BIGINT UNSIGNED | `$table->id()` | PK |
| `role_id` | BIGINT UNSIGNED | `$table->foreignId('role_id')->constrained('roles')` | Rol |
| `document_type_id` | BIGINT UNSIGNED | `$table->foreignId('document_type_id')->constrained('document_types')` | Tipo doc |
| `city_id` | BIGINT UNSIGNED | `$table->foreignId('city_id')->constrained('cities')->nullable()` | Ciudad |
| `first_name` | VARCHAR(100) | `$table->string('first_name', 100)` | Nombres |
| `last_name` | VARCHAR(100) | `$table->string('last_name', 100)` | Apellidos |
| `document_number` | VARCHAR(30) | `$table->string('document_number', 30)->unique()` | Documento |
| `email` | VARCHAR(150) | `$table->string('email', 150)->unique()` | Correo |
| `password` | VARCHAR(255) | `$table->string('password')` | Hash |
| `phone` | VARCHAR(30) | `$table->string('phone', 30)->nullable()` | Teléfono |
| `email_verified_at` | TIMESTAMP NULL | `$table->timestamp('email_verified_at')->nullable()` | Verificación |
| `created_at` / `updated_at` | TIMESTAMP | `$table->timestamps()` | Timestamps |
| `deleted_at` | TIMESTAMP NULL | `$table->softDeletes()` | SoftDeletes |

**FK:** `roles.id`, `document_types.id`, `cities.id`

---

#### 13. `customers` — GODOY GAMBOA MIGUEL ANGEL

| Columna | Tipo DB | Laravel (migration) | Descripción |
|---|---|---|---|
| `id` | BIGINT UNSIGNED | `$table->id()` | PK |
| `document_type_id` | BIGINT UNSIGNED | `$table->foreignId('document_type_id')->constrained('document_types')` | Tipo doc |
| `city_id` | BIGINT UNSIGNED | `$table->foreignId('city_id')->constrained('cities')->nullable()` | Ciudad |
| `first_name` | VARCHAR(100) | `$table->string('first_name', 100)` | Nombres |
| `last_name` | VARCHAR(100) | `$table->string('last_name', 100)` | Apellidos |
| `document_number` | VARCHAR(30) | `$table->string('document_number', 30)->unique()` | Documento |
| `email` | VARCHAR(150) | `$table->string('email', 150)->unique()` | Correo |
| `phone` | VARCHAR(30) | `$table->string('phone', 30)->nullable()` | Teléfono |
| `created_at` / `updated_at` | TIMESTAMP | `$table->timestamps()` | Timestamps |
| `deleted_at` | TIMESTAMP NULL | `$table->softDeletes()` | SoftDeletes |

**FK:** `document_types.id`, `cities.id`

---

#### 14. `warehouses` — GÓMEZ CIFUENTES JOHAN ESTEBAN

| Columna | Tipo DB | Laravel (migration) | Descripción |
|---|---|---|---|
| `id` | BIGINT UNSIGNED | `$table->id()` | PK |
| `city_id` | BIGINT UNSIGNED | `$table->foreignId('city_id')->constrained('cities')` | Ciudad |
| `name` | VARCHAR(120) | `$table->string('name', 120)` | Nombre bodega |
| `code` | VARCHAR(30) | `$table->string('code', 30)->unique()` | Código interno |
| `address` | VARCHAR(255) | `$table->string('address')->nullable()` | Dirección |
| `is_active` | TINYINT(1) | `$table->boolean('is_active')->default(true)` | Activo |
| `created_at` / `updated_at` | TIMESTAMP | `$table->timestamps()` | Timestamps |
| `deleted_at` | TIMESTAMP NULL | `$table->softDeletes()` | SoftDeletes |

**FK:** `cities.id`

---

### Fase 4 — Catálogo de productos e inventario

---

#### 15. `products` — HOYOS SERRATO ITZA YULIANA

| Columna | Tipo DB | Laravel (migration) | Descripción |
|---|---|---|---|
| `id` | BIGINT UNSIGNED | `$table->id()` | PK |
| `category_id` | BIGINT UNSIGNED | `$table->foreignId('category_id')->constrained('categories')` | Categoría |
| `brand_id` | BIGINT UNSIGNED | `$table->foreignId('brand_id')->constrained('brands')->nullable()` | Marca |
| `supplier_id` | BIGINT UNSIGNED | `$table->foreignId('supplier_id')->constrained('suppliers')->nullable()` | Proveedor |
| `sku` | VARCHAR(60) | `$table->string('sku', 60)->unique()` | SKU |
| `name` | VARCHAR(180) | `$table->string('name', 180)` | Nombre |
| `description` | TEXT NULL | `$table->text('description')->nullable()` | Descripción |
| `price` | DECIMAL(12,2) | `$table->decimal('price', 12, 2)` | Precio |
| `cost` | DECIMAL(12,2) | `$table->decimal('cost', 12, 2)->nullable()` | Costo |
| `stock_min` | INT UNSIGNED | `$table->unsignedInteger('stock_min')->default(0)` | Stock mínimo |
| `is_active` | TINYINT(1) | `$table->boolean('is_active')->default(true)` | Activo |
| `created_at` / `updated_at` | TIMESTAMP | `$table->timestamps()` | Timestamps |
| `deleted_at` | TIMESTAMP NULL | `$table->softDeletes()` | SoftDeletes |

**FK:** `categories.id`, `brands.id`, `suppliers.id`

---

#### 16. `inventories` — HUERFANO ZAMBRANO LAHIYONNEL STEVEN

| Columna | Tipo DB | Laravel (migration) | Descripción |
|---|---|---|---|
| `id` | BIGINT UNSIGNED | `$table->id()` | PK |
| `product_id` | BIGINT UNSIGNED | `$table->foreignId('product_id')->constrained('products')` | Producto |
| `warehouse_id` | BIGINT UNSIGNED | `$table->foreignId('warehouse_id')->constrained('warehouses')` | Bodega |
| `quantity` | INT | `$table->integer('quantity')->default(0)` | Cantidad |
| `last_movement_at` | TIMESTAMP NULL | `$table->timestamp('last_movement_at')->nullable()` | Último movimiento |
| `created_at` / `updated_at` | TIMESTAMP | `$table->timestamps()` | Timestamps |
| `deleted_at` | TIMESTAMP NULL | `$table->softDeletes()` | SoftDeletes |

**FK:** `products.id`, `warehouses.id`  
**Unique:** `['product_id', 'warehouse_id']`

---

#### 17. `addresses` — LEON ALONSO XIMENA

| Columna | Tipo DB | Laravel (migration) | Descripción |
|---|---|---|---|
| `id` | BIGINT UNSIGNED | `$table->id()` | PK |
| `customer_id` | BIGINT UNSIGNED | `$table->foreignId('customer_id')->constrained('customers')` | Cliente |
| `city_id` | BIGINT UNSIGNED | `$table->foreignId('city_id')->constrained('cities')` | Ciudad |
| `label` | VARCHAR(60) | `$table->string('label', 60)->nullable()` | Casa / Trabajo |
| `line1` | VARCHAR(180) | `$table->string('line1', 180)` | Dirección línea 1 |
| `line2` | VARCHAR(180) | `$table->string('line2', 180)->nullable()` | Línea 2 |
| `is_default` | TINYINT(1) | `$table->boolean('is_default')->default(false)` | Predeterminada |
| `created_at` / `updated_at` | TIMESTAMP | `$table->timestamps()` | Timestamps |
| `deleted_at` | TIMESTAMP NULL | `$table->softDeletes()` | SoftDeletes |

**FK:** `customers.id`, `cities.id`

---

#### 18. `carts` — MONTERO HERNANDEZ DANIEL STEVEN

| Columna | Tipo DB | Laravel (migration) | Descripción |
|---|---|---|---|
| `id` | BIGINT UNSIGNED | `$table->id()` | PK |
| `customer_id` | BIGINT UNSIGNED | `$table->foreignId('customer_id')->constrained('customers')` | Cliente |
| `status` | VARCHAR(30) | `$table->string('status', 30)->default('open')` | open / converted |
| `created_at` / `updated_at` | TIMESTAMP | `$table->timestamps()` | Timestamps |
| `deleted_at` | TIMESTAMP NULL | `$table->softDeletes()` | SoftDeletes |

**FK:** `customers.id`

---

#### 19. `cart_items` — NIETO ESPITIA JUAN DAVID

| Columna | Tipo DB | Laravel (migration) | Descripción |
|---|---|---|---|
| `id` | BIGINT UNSIGNED | `$table->id()` | PK |
| `cart_id` | BIGINT UNSIGNED | `$table->foreignId('cart_id')->constrained('carts')` | Carrito |
| `product_id` | BIGINT UNSIGNED | `$table->foreignId('product_id')->constrained('products')` | Producto |
| `quantity` | INT UNSIGNED | `$table->unsignedInteger('quantity')` | Cantidad |
| `unit_price` | DECIMAL(12,2) | `$table->decimal('unit_price', 12, 2)` | Precio unitario |
| `created_at` / `updated_at` | TIMESTAMP | `$table->timestamps()` | Timestamps |
| `deleted_at` | TIMESTAMP NULL | `$table->softDeletes()` | SoftDeletes |

**FK:** `carts.id`, `products.id`  
**Unique:** `['cart_id', 'product_id']`

---

### Fase 5 — Pedidos y postventa (últimas en migrar)

---

#### 20. `orders` — QUIJANO CARDONA JONATHAN OSWALDO

| Columna | Tipo DB | Laravel (migration) | Descripción |
|---|---|---|---|
| `id` | BIGINT UNSIGNED | `$table->id()` | PK |
| `customer_id` | BIGINT UNSIGNED | `$table->foreignId('customer_id')->constrained('customers')` | Cliente |
| `user_id` | BIGINT UNSIGNED | `$table->foreignId('user_id')->constrained('users')->nullable()` | Vendedor / cajero |
| `coupon_id` | BIGINT UNSIGNED | `$table->foreignId('coupon_id')->constrained('coupons')->nullable()` | Cupón |
| `address_id` | BIGINT UNSIGNED | `$table->foreignId('address_id')->constrained('addresses')->nullable()` | Dirección envío |
| `order_number` | VARCHAR(40) | `$table->string('order_number', 40)->unique()` | Número pedido |
| `status` | VARCHAR(30) | `$table->string('status', 30)->default('pending')` | Estado |
| `subtotal` | DECIMAL(12,2) | `$table->decimal('subtotal', 12, 2)` | Subtotal |
| `discount_total` | DECIMAL(12,2) | `$table->decimal('discount_total', 12, 2)->default(0)` | Descuento |
| `total` | DECIMAL(12,2) | `$table->decimal('total', 12, 2)` | Total |
| `ordered_at` | TIMESTAMP | `$table->timestamp('ordered_at')->useCurrent()` | Fecha pedido |
| `created_at` / `updated_at` | TIMESTAMP | `$table->timestamps()` | Timestamps |
| `deleted_at` | TIMESTAMP NULL | `$table->softDeletes()` | SoftDeletes |

**FK:** `customers.id`, `users.id`, `coupons.id`, `addresses.id`

---

#### 21. `order_details` — QUINTERO DUQUE JOHAN ESTIVEN

| Columna | Tipo DB | Laravel (migration) | Descripción |
|---|---|---|---|
| `id` | BIGINT UNSIGNED | `$table->id()` | PK |
| `order_id` | BIGINT UNSIGNED | `$table->foreignId('order_id')->constrained('orders')` | Pedido |
| `product_id` | BIGINT UNSIGNED | `$table->foreignId('product_id')->constrained('products')` | Producto |
| `quantity` | INT UNSIGNED | `$table->unsignedInteger('quantity')` | Cantidad |
| `unit_price` | DECIMAL(12,2) | `$table->decimal('unit_price', 12, 2)` | Precio unitario |
| `line_total` | DECIMAL(12,2) | `$table->decimal('line_total', 12, 2)` | Total línea |
| `created_at` / `updated_at` | TIMESTAMP | `$table->timestamps()` | Timestamps |
| `deleted_at` | TIMESTAMP NULL | `$table->softDeletes()` | SoftDeletes |

**FK:** `orders.id`, `products.id`

---

#### 22. `payments` — ROBAYO YARA LAURA XIOMARA

| Columna | Tipo DB | Laravel (migration) | Descripción |
|---|---|---|---|
| `id` | BIGINT UNSIGNED | `$table->id()` | PK |
| `order_id` | BIGINT UNSIGNED | `$table->foreignId('order_id')->constrained('orders')` | Pedido |
| `method` | VARCHAR(40) | `$table->string('method', 40)` | cash / card / transfer |
| `amount` | DECIMAL(12,2) | `$table->decimal('amount', 12, 2)` | Monto |
| `status` | VARCHAR(30) | `$table->string('status', 30)->default('pending')` | Estado |
| `paid_at` | TIMESTAMP NULL | `$table->timestamp('paid_at')->nullable()` | Fecha pago |
| `reference` | VARCHAR(100) | `$table->string('reference', 100)->nullable()` | Referencia |
| `created_at` / `updated_at` | TIMESTAMP | `$table->timestamps()` | Timestamps |
| `deleted_at` | TIMESTAMP NULL | `$table->softDeletes()` | SoftDeletes |

**FK:** `orders.id`

---

#### 23. `invoices` — SANCHEZ URRIAGO SARA GABRIELA

| Columna | Tipo DB | Laravel (migration) | Descripción |
|---|---|---|---|
| `id` | BIGINT UNSIGNED | `$table->id()` | PK |
| `order_id` | BIGINT UNSIGNED | `$table->foreignId('order_id')->constrained('orders')->unique()` | Pedido |
| `invoice_number` | VARCHAR(40) | `$table->string('invoice_number', 40)->unique()` | Número factura |
| `issued_at` | TIMESTAMP | `$table->timestamp('issued_at')->useCurrent()` | Emisión |
| `tax_total` | DECIMAL(12,2) | `$table->decimal('tax_total', 12, 2)->default(0)` | Impuestos |
| `grand_total` | DECIMAL(12,2) | `$table->decimal('grand_total', 12, 2)` | Total factura |
| `status` | VARCHAR(30) | `$table->string('status', 30)->default('issued')` | Estado |
| `created_at` / `updated_at` | TIMESTAMP | `$table->timestamps()` | Timestamps |
| `deleted_at` | TIMESTAMP NULL | `$table->softDeletes()` | SoftDeletes |

**FK:** `orders.id`

---

#### 24. `shipments` — TRILLERAS JIMÉNEZ JHON JAIRO

| Columna | Tipo DB | Laravel (migration) | Descripción |
|---|---|---|---|
| `id` | BIGINT UNSIGNED | `$table->id()` | PK |
| `order_id` | BIGINT UNSIGNED | `$table->foreignId('order_id')->constrained('orders')` | Pedido |
| `address_id` | BIGINT UNSIGNED | `$table->foreignId('address_id')->constrained('addresses')` | Dirección |
| `carrier` | VARCHAR(80) | `$table->string('carrier', 80)->nullable()` | Transportadora |
| `tracking_code` | VARCHAR(80) | `$table->string('tracking_code', 80)->nullable()` | Guía |
| `status` | VARCHAR(30) | `$table->string('status', 30)->default('pending')` | Estado |
| `shipped_at` | TIMESTAMP NULL | `$table->timestamp('shipped_at')->nullable()` | Envío |
| `delivered_at` | TIMESTAMP NULL | `$table->timestamp('delivered_at')->nullable()` | Entrega |
| `created_at` / `updated_at` | TIMESTAMP | `$table->timestamps()` | Timestamps |
| `deleted_at` | TIMESTAMP NULL | `$table->softDeletes()` | SoftDeletes |

**FK:** `orders.id`, `addresses.id`

---

#### 25. `reviews` — VELÁSQUEZ AROCA SEBASTIAN ALEXANDER

| Columna | Tipo DB | Laravel (migration) | Descripción |
|---|---|---|---|
| `id` | BIGINT UNSIGNED | `$table->id()` | PK |
| `product_id` | BIGINT UNSIGNED | `$table->foreignId('product_id')->constrained('products')` | Producto |
| `customer_id` | BIGINT UNSIGNED | `$table->foreignId('customer_id')->constrained('customers')` | Cliente |
| `rating` | TINYINT UNSIGNED | `$table->unsignedTinyInteger('rating')` | 1–5 |
| `comment` | TEXT NULL | `$table->text('comment')->nullable()` | Comentario |
| `is_approved` | TINYINT(1) | `$table->boolean('is_approved')->default(false)` | Moderación |
| `created_at` / `updated_at` | TIMESTAMP | `$table->timestamps()` | Timestamps |
| `deleted_at` | TIMESTAMP NULL | `$table->softDeletes()` | SoftDeletes |

**FK:** `products.id`, `customers.id`  
**Unique:** `['product_id', 'customer_id']`

---

## Resumen rápido (integrante → entidad)

| # | Integrante | Entidad | Depende de |
|---|---|---|---|
| 1 | AGREDO RIOS CAROL JULIANA | `roles` | — |
| 2 | ALVAREZ SANTOS SNEIDER | `permissions` | — |
| 3 | ARAY RUIZ ISAAC ELIEZER | `document_types` | — |
| 4 | BAZAN MEZONES GHILARY | `countries` | — |
| 5 | CARANTON MARIN MIGUEL ANGEL | `categories` | — |
| 6 | COLOBON MARTINEZ MIGUEL ANGEL | `brands` | — |
| 7 | CUERVO BELTRÁN SANTIAGO | `coupons` | — |
| 8 | ECHEVERRY MABARDI JUAN SEBASTIAN | `departments` | countries |
| 9 | FIGUERA VEGAS CARLOS JAVIER | `role_permission` | roles, permissions |
| 10 | GARCIA CASTELLANOS JHONATAN | `cities` | departments |
| 11 | GARCIA MORA JOHAN SEBASTIAN | `suppliers` | document_types, cities |
| 12 | GARZÓN PARRA JUAN ANDRÉS | `users` | roles, document_types, cities |
| 13 | GODOY GAMBOA MIGUEL ANGEL | `customers` | document_types, cities |
| 14 | GÓMEZ CIFUENTES JOHAN ESTEBAN | `warehouses` | cities |
| 15 | HOYOS SERRATO ITZA YULIANA | `products` | categories, brands, suppliers |
| 16 | HUERFANO ZAMBRANO LAHIYONNEL STEVEN | `inventories` | products, warehouses |
| 17 | LEON ALONSO XIMENA | `addresses` | customers, cities |
| 18 | MONTERO HERNANDEZ DANIEL STEVEN | `carts` | customers |
| 19 | NIETO ESPITIA JUAN DAVID | `cart_items` | carts, products |
| 20 | QUIJANO CARDONA JONATHAN OSWALDO | `orders` | customers, users, coupons, addresses |
| 21 | QUINTERO DUQUE JOHAN ESTIVEN | `order_details` | orders, products |
| 22 | ROBAYO YARA LAURA XIOMARA | `payments` | orders |
| 23 | SANCHEZ URRIAGO SARA GABRIELA | `invoices` | orders |
| 24 | TRILLERAS JIMÉNEZ JHON JAIRO | `shipments` | orders, addresses |
| 25 | VELÁSQUEZ AROCA SEBASTIAN ALEXANDER | `reviews` | products, customers |

---

## Convención de nombres de migraciones

Usar timestamp creciente según el orden anterior, por ejemplo:

```text
2026_10_06_000001_create_roles_table.php
2026_10_06_000002_create_permissions_table.php
2026_10_06_000003_create_document_types_table.php
...
2026_10_06_000025_create_reviews_table.php
```

## Plantilla mínima por modelo

```php
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'slug', 'description', 'is_active'];
}
```

## Diagrama de dependencias (simplificado)

```text
roles ──────────────┐
permissions ──► role_permission
document_types ─────┼──► users
countries ──► departments ──► cities ──► suppliers / warehouses / customers / users
categories ─┐
brands ─────┼──► products ──► inventories
suppliers ──┘         │
                      ├──► cart_items
                      ├──► order_details
                      └──► reviews
customers ──► carts ──► cart_items
customers ──► addresses ──► orders / shipments
coupons ───────────────────► orders
users ─────────────────────► orders
orders ──► order_details / payments / invoices / shipments
```
