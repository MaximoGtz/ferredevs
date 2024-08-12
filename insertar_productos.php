<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir Producto</title>
</head>
<body>
    <h1>Subir Producto</h1>
    <form action="subir_producto.php" method="post" enctype="multipart/form-data">
        <label for="nombre">Nombre del Producto:</label>
        <input type="text" id="nombre" name="nombre" required><br><br>
        
        <label for="categoria">Categoria:</label>
        <input type="text" id="categoria" name="categoria" required><br><br>

        <label for="marca">Marca:</label>
        <input type="text" id="marca" name="marca" required><br><br>

        <label for="codigo">Codigo</label>
        <input type="text" id="codigo" name="codigo" required><br><br>
        
        <label for="existencia">Existencias</label>
        <input type="number" id="existencia" name="existencia" required><br><br>

        <label for="descripcion">Descripción:</label>
        <textarea id="descripcion" name="descripcion" required></textarea><br><br>
        
        <label for="precio_unitario">Precio Unitario:</label>
        <input type="number" step="0.01" id="precio_unitario" name="precio_unitario" required><br><br>
        
        <label for="precio_compra">Precio de Compra:</label>
        <input type="number" step="0.01" id="precio_compra" name="precio_compra" required><br><br>
        
        <label for="imagen">Imagen:</label>
        <input type="file" id="imagen" name="imagen" required><br><br>

        
        
        <input type="submit" value="Subir Producto">
    </form>
</body>
</html>
